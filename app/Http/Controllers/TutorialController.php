<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    
    public function show() {

        return view("layouts.tutorial", []);
    }
}
