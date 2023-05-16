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

    public function edit(Request $request, $id) {

        $problemSet = File::findOrFail($id);

        return view('sets.edit', [
            'set' => $problemSet
        ]);

    }

    public function update(Request $request, $id) {

        $problemSet = File::findOrFail($id);

        $request->validate([
            'problemSet' => 'required|file|max:4096|mimes:tex,application/x-tex',
        ]);

        try {
            $file = $request->file('problemSet');

            $filePath = $file->storeAs('problems', $problemSet->title);

        } catch(Exception $e) {
            return redirect()->back()->withErrors(['problemSet' => __('There was an error uploading file.')]);
        }

        $fileContents = Storage::get($filePath);

        $mathProblemController = new MathProblemController();

        $mathProblemController->clear($problemSet->id);

        $mathProblemController->store($problemSet->id, $fileContents);

        return redirect()->route('sets.view', ["id" => $problemSet->id]);

    }

    public function download(Request $request, $id) {

        $problemSet = File::findOrFail($id);

        $path = 'problems\\' . $problemSet->title;

        abort_if(!Storage::exists($path), 404);

        $filePath = storage_path('app\\' . $path);

        return response()->download($filePath);

    }

    public function destroy(Request $request, $id) {

        $problemSet = File::findOrFail($id);

        $mathProblemController = new MathProblemController();
        $mathProblemController->clear($id);

        $filePath = 'problems\\' . $problemSet->title;

        if(Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        $problemSet->delete();

        return redirect()->route('sets.index');

    }

    public function showImages() {

        $images = Storage::disk('public')->files('uploadedImg');
        $fileDetails = [];

        foreach ($images as $file) {
            $fileDetails[] = [
                'path' => $file,
                'timestamp' => Storage::disk('public')->lastModified($file),
            ];
        }

        usort($fileDetails, function ($a, $b) {
            return $b['timestamp'] - $a['timestamp'];
        });

        $images = collect(array_column($fileDetails, 'path'));

        $images = $images->map(function ($image) {
            return (object) [
                "base" => basename($image),
                "name" => pathinfo($image, PATHINFO_FILENAME),
                "path" => $image
            ];
        });

        return view('images.index', [
            "images" => $images
        ]);
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

    public function destroyImage(Request $request, $imageName) {

        $path = 'uploadedImg\\' . $imageName;

        abort_if(!Storage::disk('public')->exists($path), 404);

        Storage::disk('public')->delete($path);

        return redirect()->route('images.index');

    }

}
