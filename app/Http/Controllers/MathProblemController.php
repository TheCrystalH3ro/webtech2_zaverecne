<?php

namespace App\Http\Controllers;

use App\Models\MathProblem;
use Illuminate\Http\Request;

class MathProblemController extends Controller
{
    //
    public function create(Request $request) {

        $dirPath = storage_path('app/problems');

        $this->store(1, '');
    }

    public function store($fileId, $content) {

        $mathProblem = MathProblem::create([
            'task' => 'xyxyy',
            'image' => 'sas',
            'solution' => 'ddsd',
            'file_id' => $fileId
        ]);

        dump($mathProblem);
    }
}
