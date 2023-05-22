<h1>{{ __('Submitted math problems') }}</h1>
@foreach ($student->submittedMathProblems as $mathProblem)
    <p>{{ $mathProblem->task }}</p>
    @if ($mathProblem->image)
        <img src="{{ asset('/storage/uploadedImg/' . $mathProblem->image) }}" alt="{{ $mathProblem->id }}">
    @endif
    <p>{{ __('Student\'s answer:') }}</p>
    <p>{{ $mathProblem->pivot->answer }}</p>
    <p>{{ ($mathProblem->pivot->is_correct ? __('Correct') : __('Incorrect')) . ", " . ($mathProblem->pivot->is_correct ? $mathProblem->file->points : "0") . "b" }}</p>
@endforeach
