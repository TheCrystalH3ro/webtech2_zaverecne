<?php

namespace App\Http\Controllers;

use App\Models\MathProblem;
use Illuminate\Http\Request;

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

    public function parseInput($input){
        
        if (strpos($input, '\begin{equation*}') === false && strpos($input, '\end{equation*}') === false) {
            $parsedInput = '\begin{equation*}' . $input . '\end{equation*}';
        }
        else {
            $parsedInput = $input;
        }
    
        return $parsedInput;
    }

}