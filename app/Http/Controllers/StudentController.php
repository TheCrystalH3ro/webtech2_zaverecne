<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\MathProblem;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard() {

        return view('student.dashboard', [
            'student' => Auth::user()
        ]);
    }

    public function show(Request $request, $id) {

        $user = User::findOrFail($id);

        abort_if($user->role->name != Role::$STUDENT, 404);

        return view('student.single', [
            'student' => $user
        ]);
    }

    public function manageSets(Request $request, $id) {

        $user = User::findOrFail($id);

        abort_if($user->role->name != Role::$STUDENT, 404);

        $sets = File::whereDoesntHave('users', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->get();

        return view('student.sets', [
            'student' => $user,
            'sets' => $sets
        ]);
    }

    public function assignSet(Request $request, $id) {

        $user = User::findOrFail($id);

        abort_if($user->role->name != Role::$STUDENT, 404);

        $request->validate([
            'problemSet' => 'integer|exists:files,id'
        ]);

        $problemSet = File::findOrFail($request->input('problemSet'));

        if($user->sets()->where('id', $problemSet->id)->exists()) {
            return redirect()->back()->withErrors(['email' => __('This student has already assigned this file set.')]);
        }

        $user->sets()->attach($problemSet);

        return redirect()->route('student.sets', ["id" => $id]);
    }

    public function unassignSet(Request $request, $id, File $set) {

        $user = User::findOrFail($id);

        abort_if($user->role->name != Role::$STUDENT, 404);
        abort_if(!$user->sets()->where('id', $set->id)->exists(), 404);

        $user->sets()->detach($set->id);

        return redirect()->route('student.sets', ["id" => $id]);
    }

    public function pickProblemSets() {

        return view('student.generate', [
            'student' => Auth::user()
        ]);
    }

    public function generateMathProblems(Request $request) {

        $request->validate([
            'problemSets.*' => 'integer|exists:files,id'
        ]);

        $mathProblemController = new MathProblemController();

        $user = Auth::user();

        foreach($request->input('problemSets') as $id) {

            if(!$user->availableSets()->find($id)) {
                return redirect()->back()->withErrors(['problemSets.*' => __('This student can\'t assign problems from this set.')]);
            }

            $problemSet = File::findOrFail($id);

            if($problemSet->hasAssignedMathProblem($user)) {
                return redirect()->back()->withErrors(['problemSets.*' => __('This student has already assigned problem from this file set.')]);
            }

            $mathProblemController->generate($problemSet, $user);

        }

        return redirect('/');

    }
}
