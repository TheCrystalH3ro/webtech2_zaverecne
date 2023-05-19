<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class EditorController extends Controller
{
    public function show(): View
    {
        return view('editor');
    }

}
