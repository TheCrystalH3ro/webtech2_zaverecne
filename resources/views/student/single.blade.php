<h1>{{ $student->firstname }} {{ $student->lastname }}</h1>

<h4>{{ $student->email }}</h4>

<hr>

<a href="{{ route('student.sets', ['id' => $student->id]) }}">{{ __('Assign problem sets') }}</a>

<a href="{{ route('student.answers', ['id' => $student->id]) }}">{{ __('Submitted problems') }}</a>

<h2>{{ __('Generated problems') }}</h2>

@foreach ($student->mathProblems as $mathProblem)
    <p>{{ $mathProblem->task }}</p>
    @if ($mathProblem->image)
        <img src="{{ asset('/storage/uploadedImg/' . $mathProblem->image) }}" alt="{{ $mathProblem->id }}">
    @endif
@endforeach
