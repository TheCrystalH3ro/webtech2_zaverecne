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
        $filePath = $dirPath . '/blokovka01pr.tex';
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
            $solutionContent = preg_replace('/\\\\includegraphics(?:\[.*?\])?\{(.*?)\}/', '', $solutionContent);

            // Find and extract the equation content from task content
            preg_match('/\$([^$]+)\$/', $matchedContent, $equationMatch);
            if (!empty($equationMatch[1])) {
                $equationContent = $equationMatch[1];
                $matchedContent = str_replace($equationMatch[0], '\begin{equation*}' . $equationContent . '\end{equation*}', $matchedContent);
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

}
