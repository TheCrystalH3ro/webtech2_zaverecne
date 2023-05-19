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

    private function isAnswerCorrect($userAnswer, MathProblem $mathProblem) {

        return $userAnswer == $mathProblem->solution;
    }

    public function submitAnswer(Request $request, $id) {

        $mathProblem = Auth::user()->mathProblems()->findOrFail($id);

        abort_if($mathProblem->pivot->is_submitted, 404);

        $request->validate([
            'answer' => 'required|string'
        ]);

        $isCorrect = $this->isAnswerCorrect($request->input('answer'), $mathProblem);

        Auth::user()->mathProblems()->updateExistingPivot($id, ['is_submitted' => true, 'is_correct' => $isCorrect]);

        return redirect('/');
    }

}
