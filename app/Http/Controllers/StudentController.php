<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard() {

        return view('student.dashboard', [
            'student' => Auth::user()
        ]);
    }

    public function pickProblemSets() {

        return view('student.generate', [
            'student' => Auth::user()
        ]);
    }

    public function generateMathProblems() {

    }
}
