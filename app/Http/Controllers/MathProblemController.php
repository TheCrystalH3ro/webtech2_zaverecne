<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\MathProblem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MathProblemController extends Controller
{
    //
    public function create(Request $request)
    {

        $dirPath = storage_path('app/problems');
        $filePath = $dirPath . '/odozva02pr.tex';
        $content = file_get_contents($filePath);

        // var_dump($content);

        $this->store(1, $content);
    }

    public function store($fileId, $content)
    {
        $taskTag = 'task'; // Replace with the desired task tag name
        $solutionTag = 'solution'; // Replace with the desired solution tag name

        // Define the regular expression patterns to match the tags
        $taskPattern = '/\\\\begin\{' . $taskTag . '\}(.*?)\\\\end\{' . $taskTag . '\}/s';
        $solutionPattern = '/\\\\begin\{' . $solutionTag . '\}(.*?)\\\\end\{' . $solutionTag . '\}/s';

        // Find all task matches
        preg_match_all($taskPattern, $content, $taskMatches);
        $tasks = $taskMatches[1]; // Contains the contents of all matched task tags

        // Find all solution matches
        preg_match_all($solutionPattern, $content, $solutionMatches);
        $solutions = $solutionMatches[1]; // Contains the contents of all matched solution tags

        // Process the matched contents
        foreach ($tasks as $index => $matchedContent) {
            // Find and remove \includegraphics commands in task content
            preg_match_all('/\\\\includegraphics(?:\[.*?\])?\{(.*?)\}/', $matchedContent, $taskGraphicsMatches);
            $taskImages = (!empty($taskGraphicsMatches[1])) ? $taskGraphicsMatches[1][0] : null;
            // var_dump($taskImages);
            $matchedContent = preg_replace('/\\\\includegraphics(?:\[.*?\])?\{(.*?)\}/', '', $matchedContent);

            // Find and remove \includegraphics commands in solution content
            $solutionContent = (!empty($solutions[$index])) ? $solutions[$index] : '';

            // Find and extract the equation content from task content
            preg_match_all('/\$([^$]+)\$/', $matchedContent, $equationMatches);
            foreach ($equationMatches[1] as $equationMatch) {
                $equationContent = $equationMatch;
                $matchedContent = str_replace('$' . $equationContent . '$', '\begin{equation*}' . $equationContent . '\end{equation*}', $matchedContent);
            }
        
            preg_match_all('/\$([^$]+)\$/', $solutionContent, $solutionMatches);
            foreach ($solutionMatches[1] as $solutionMatch) {
                $equationContent = $solutionMatch;
                $solutionContent = str_replace('$' . $equationContent . '$', '\begin{equation*}' . $equationContent . '\end{equation*}', $solutionContent);
            }

            $parts = explode('/', $taskImages);
            if(count($parts) == 1){
                $parts = explode('\\', $taskImages);
            }

            // Store the math problem
            $mathProblem = MathProblem::create([
                'task' => trim($matchedContent),
                'image' => end($parts),
                'solution' => trim($solutionContent),
                'file_id' => $fileId
            ]);

            dump($mathProblem);
        }
    }

    public function clear($fileId) {

        $mathProblems = MathProblem::where('file_id', $fileId)->get();

        foreach($mathProblems as $mathProblem) {
            $mathProblem->delete();
        }

    }

    public function generate(File $problemSet, User $user) {


        $mathProblemCount = $problemSet->mathProblems()->count();

        $index = rand(0, $mathProblemCount - 1);

        $mathProblem = $problemSet->mathProblems->get($index);

        $user->mathProblems()->attach($mathProblem, ['is_submitted' => false]);

        return $mathProblem;

    }

    public function show(Request $request, $id) {

        $mathProblem = Auth::user()->mathProblems()->findOrFail($id);

        abort_if($mathProblem->pivot->is_submitted, 404);

        if($request->wantsJson()) {
            return response()->json(json_encode([$mathProblem]));
        }

        return view('mathProblems.single', [
            'mathProblem' => $mathProblem
        ]);
    }

    private function isAnswerCorrect($answer, MathProblem $mathProblem) {
        $modifiedString = str_replace(
            ['\\begin{equation*}', '\\end{equation*}'],
            '',
            $mathProblem->solution
        );
        
        $solution = preg_replace(
            ['/(\\\\)dfrac/', '/(\\\\)tfrac/', '/\\s/'],
            ['\\frac', '\\frac', ''],
            $modifiedString,
            -1,
        );
        $answer = str_replace(' ', '', $answer);
        if($answer == $solution) {
            return true;
        }
        $solutionOperandsCount = $this->countOperands($solution);
        $answerOperandsCount = $this->countOperands($answer);
        if ($solutionOperandsCount != -1 || $answerOperandsCount != -1) {
            if ($answerOperandsCount === $solutionOperandsCount) {
                $correctCount = 0;
                $answerPosition = 0;
                for ($i = 0; $i < strlen($solution); $i++) {
                    if ($solution[$i] === '\\' && $solution[$i + 1] === 'f') {  // \frac{}{}
                        for ($j = $i + 1; $j < strlen($solution); $j++) {
                            if ($solution[$j] === '{') {                   // need to find first bracket in \\frac
                                $answerPosition += strlen('\frac{');
                                $closingBracketIndexSolution = $this->findClosingBracketIndex($solution, $j);
                                $closingBracketIndexAnswer = $this->findClosingBracketIndex($answer, $answerPosition);
                                if ($closingBracketIndexSolution == -1 && $closingBracketIndexAnswer == -1) {
                                    return false; // syntax error
                                }
                                if (substr($solution, $i, $closingBracketIndexSolution) === substr($answer, $answerPosition, $closingBracketIndexAnswer)) {
                                    return false;
                                }
                                $solutionOperation = substr($solution, $j + 1, $closingBracketIndexSolution);
                                $solutionNumbers = $this->extractNumbersFromFrac($solutionOperation);
                                $answerOperation = substr($answer, $answerPosition, $closingBracketIndexAnswer);
                                $answerNumbers = $this->extractNumbersFromFrac($answerOperation);
                                if (count($solutionNumbers) === count($answerNumbers)) {
                                    $answerDivisor = 0;
                                    $answerCount = 0;
                                    $solutionDivisor = 0;
                                    $solutionCount = 0;
                                    for ($n = 0; $n < count($solutionNumbers); $n++) {
                                        if (floor($solutionNumbers[$n] / $answerNumbers[$n]) === (float)$solutionNumbers[$n] / $answerNumbers[$n]) {
                                            if ($n > 0 && $answerDivisor != $solutionNumbers[$n] / $answerNumbers[$n]) {
                                                break;
                                            }
                                            $answerDivisor = $solutionNumbers[$n] / $answerNumbers[$n];
                                            $answerCount++;
                                        }
                                        if (floor($answerNumbers[$n] / $solutionNumbers[$n]) === (float)$answerNumbers[$n] / $solutionNumbers[$n]) {
                                            if ($n > 0 && $solutionDivisor != $answerNumbers[$n] / $solutionNumbers[$n]) {
                                                break;
                                            }
                                            $solutionDivisor = $answerNumbers[$n] / $solutionNumbers[$n];
                                            $solutionCount++;
                                        }
                                    }
                                    if ($solutionCount == count($solutionNumbers) || $answerCount == count($solutionNumbers)) {
                                        $correctCount++;
                                    } else {
                                        return false;
                                    }
                                } else {
                                    return false;
                                }

                                $j = strlen($solution);
                                $i = $closingBracketIndexSolution;
                                $answerPosition = $closingBracketIndexAnswer + 1;
                            }
                        }
                    } elseif ($solution[$i] === '^') {
                        if ($solution[$i + 1] === '{') {
                            $closingBracketIndex = $this->findClosingBracketIndex($solution, $i + 1);
                                if ($closingBracketIndex == -1) {
                                    return false; // syntax error
                            }
                            $i = $closingBracketIndex;
                            $answerPosition = $closingBracketIndex + 1;
                        } elseif (preg_match('/[a-zA-Z0-9]/', $solution[$i + 1])) {
                            $i++;
                            $answerPosition++;
                            if (preg_match('/[a-zA-Z0-9]/', $solution[$i + 1])) {
                                $i++;
                                $answerPosition++;
                            }
                            $answerPosition++;
                        }
                        $correctCount++;
                    } elseif (!is_numeric($solution[$i])) {
                        $number = '' . $solution[$i];
                        for ($o = $i + 1; $o < strlen($solution); $o++) {
                            if (is_numeric($solution[$o])) {
                                $number .= $solution[$o];
                            } elseif ($solution[$o] === '.') {
                                $number .= $solution[$o];
                            } else {
                                break;
                            }
                        }
                        if (substr($answer, $answerPosition, strlen($number)) == $number) { // if it's a number
                            $correctCount++;
                            $i += strlen($number) - 1;
                            $answerPosition += strlen($number);
                        } else {
                            return false;
                        }
                    } elseif ($solution[$i] == '+' || $solution[$i] == '-') { // if it's an operator
                        if ($solution[$i] == $answer[$answerPosition]) {
                            $correctCount++;
                            $answerPosition++;
                        } else {
                            return false;
                        }
                    } elseif (!is_numeric($solution[$i])) { // if it's a character
                        if (!is_numeric($answer[$answerPosition])) {
                            $correctCount++;
                            $answerPosition++;
                        } else {
                            return false;
                        }
                    }
                }
                if ($correctCount == $this->countOperands($solution)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        return false; // syntax error
    }


    function extractNumbersFromFrac($operation) {
        $numbers = array();
        for ($k = 0; $k < strlen($operation); $k++) {
            if (is_numeric($operation[$k])) {
                $number = $operation[$k];
                for ($m = $k + 1; $m < strlen($operation); $m++) {
                    if (is_numeric($operation[$m])) {
                        $number .= $operation[$m];
                        $k++;
                    } elseif ($operation[$m] === '.') {
                        $number .= $operation[$m];
                    } else {
                        $k = $m - 1;
                        break;
                    }
                }
                if ($m == strlen($operation)) {
                    $k = $m - 1;
                }
                $numbers[] = $number;
            } elseif ($operation[$k] === '\\') {
                for ($l = $k; $l < strlen($operation); $l++) {
                    if ($operation[$l] === '{') {
                        // extract upper number from frac
                    }
                    // set k to the end of frac
                }
            } elseif ($operation[$k] === '^') {
                if ($operation[$k + 1] === '{') {
                    $closingBracketIndex2 = $this->findClosingBracketIndex($operation, $k + 1);
                    if ($closingBracketIndex2 == -1) {
                        return array(); // syntax error
                    }
                    $k = $closingBracketIndex2;
                } elseif (preg_match('/[+\-0-9a-zA-Z]/', $operation[$k + 1])) {
                    $k++;
                    if (preg_match('/^[a-zA-Z0-9]$/', $operation[$k + 1])) {
                        $k++;
                        if (preg_match('/^[a-zA-Z0-9]$/', $operation[$k + 1])) {
                            $k++;
                        }
                    }
                }
            } elseif (preg_match('/^[a-zA-Z]$/', $operation[$k]) && ($k === 0 || !is_numeric($operation[$k - 1]))) {
                $numbers[] = '1';
            }
        }
        return $numbers;
    }



    function countOperands($input) {
        $count = 0;
        for ($i = 0; $i < strlen($input); $i++) {
            if ($input[$i] === '\\') { // \sqrt{} or \frac{}{}
                for ($j = $i; $j < strlen($input); $j++) {
                    if ($input[$j] === '{') {
                        $closingBracketIndex = $this->findClosingBracketIndex($input, $j);
                        if ($closingBracketIndex == -1) {
                            return -1; // syntax error
                        }
                        $i = $closingBracketIndex;
                        $count++;
                        break;
                    }
                }
            } elseif ($input[$i] === '^') {
                if ($input[$i + 1] === '{') {
                    $closingBracketIndex = $this->findClosingBracketIndex($input, $i + 1);
                    if ($closingBracketIndex == -1) {
                        return -1; // syntax error
                    }
                    $i = $closingBracketIndex;
                } elseif (preg_match('/[a-zA-Z0-9]/', $input[$i + 1])) {
                    $i++;
                    if (preg_match('/[a-zA-Z0-9]/', $input[$i + 2])) {
                        $i++;
                    }
                }
                $count++;
            } elseif (is_numeric($input[$i])) {
                $number = '' . $input[$i];
                for ($m = $i + 1; $m < strlen($input); $m++) {
                    if (is_numeric($input[$m])) {
                        $number .= $input[$m];
                        $i++;
                    } elseif ($input[$m] === '.') {
                        $number .= $input[$m];
                    } else {
                        $i = $m - 1;
                        break;
                    }
                }
                $count++;
            } else { // if(/[+\-=a-zA-Z0-9]/.test(input[i])) { // if its number, character or operator
                $count++;
            }
        }
        return $count;
    }


    function findClosingBracketIndex($input, $openingIndex) {
        $counter = 0;
    
        for ($i = $openingIndex + 1; $i < strlen($input); $i++) {
            if ($input[$i] === "{") {
                $counter++;
            } elseif ($input[$i] === "}") {
                if ($counter === 0) {
                    if($i === strlen($input) - 1) {
                        return $i;
                    }
                    if ($input[$i + 1] === "{") {
                        $i++;
                        continue;
                    }
                    return $i;
                }
                $counter--;
            }
        }
        return -1;
    }


    function findCharacterWithSurroundingSymbols($str) {
        $regex = '/[^a-zA-Z]([a-zA-Z])[^a-zA-Z]/';
        if (preg_match($regex, $str, $matches) && count($matches) > 1) {
            return $matches[1];
        }
        return null;
    }




    public function submitAnswer(Request $request, $id) {

        $mathProblem = Auth::user()->mathProblems()->findOrFail($id);

        abort_if($mathProblem->pivot->is_submitted, 404);

        $request->validate([
            'answer' => 'required|string'
        ]);

        $answer = $request->input('answer');

        $isCorrect = $this->isAnswerCorrect($answer, $mathProblem);

        Auth::user()->mathProblems()->updateExistingPivot($id, ['is_submitted' => true, 'is_correct' => $isCorrect, 'answer' => $answer]);

        return redirect('/');
    }

}
