<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use PDF;

class TutorialController extends Controller
{

    public function show() {

        return view("layouts.tutorial", []);
    }

    public function download() {

        $view = "tutorial/" . Auth::user()->role->name;

        $pdf = PDF::loadView($view, []);

        return $pdf->download(__('Tutorial') . ".pdf");
    }
}
