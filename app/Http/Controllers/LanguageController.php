<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{

    public function changeLanguage(Request $request, $language) {

        abort_if(!in_array($language, ['en', 'sk']), 400);

        session()->put('lang', $language);

        return redirect()->back();

    }

}
