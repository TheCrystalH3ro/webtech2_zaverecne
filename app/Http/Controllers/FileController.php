<?php

namespace App\Http\Controllers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index() {

        $problemSets = File::get();

        return view('sets.index', [
            'sets' => $problemSets
        ]);

    }

    public function show(Request $request, $id) {

        $problemSet = File::findOrFail($id);

        return view('sets.single', [
            'set' => $problemSet
        ]);
    }

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

        return redirect()->back();

    }

    public function addImages() {

        return view('upload.image', []);
    }

    public function storeImages(Request $request) {

        $request->validate([
            'images.*' => 'required|file|max:4096|mimes:jpeg,png',
        ]);

        try {

            $uploadedFiles = $request->file('images');

            foreach ($uploadedFiles as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('uploadedImg', $fileName, 'public');
            }

        } catch(Exception $e) {
            return redirect()->back()->withErrors(['images.*' => __('There was an error uploading images.')]);
        }

        return redirect()->back();

    }

}
