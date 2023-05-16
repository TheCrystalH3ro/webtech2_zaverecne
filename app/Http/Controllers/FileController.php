<?php

namespace App\Http\Controllers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function create() {

        return view('upload.set', []);
    }

    public function store(Request $request) {

        $request->validate([
            'problemSet' => 'required|file|max:4096|mimes:tex,application/x-tex',
        ]);

        try {
            $file = $request->file('problemSet');
            $fileName = $file->getClientOriginalName();

            if(File::where('title', $fileName)->first()) {
                return redirect()->back()->withErrors(['problemSet' => __('Problem set with this name already exists.')]);
            }

            $filePath = $file->storeAs('problems', $fileName);

        } catch(Exception $e) {
            return redirect()->back()->withErrors(['problemSet' => __('There was an error uploading file.')]);
        }

        $problemSet = File::create([
            'title' => $fileName
        ]);

        $fileContents = Storage::get($filePath);

        $mathProblemController = new MathProblemController();
        $mathProblemController->store($problemSet->id, $fileContents);

    }

    public function addImage() {

    }

    public function storeImage() {

    }
}
