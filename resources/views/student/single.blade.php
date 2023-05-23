@extends('layouts.app')

@section('content')

    <div class="content min-h-screen">

        <h1>{{ $student->firstname }} {{ $student->lastname }}</h1>

        <h4>{{ $student->email }}</h4>

        <hr>

        <div class="mb-3">
            <a href="{{ route('student.sets', ['id' => $student->id]) }}" class="btn btn-outline-light">{{ __('Assign problem sets') }}</a>
            <a href="{{ route('student.answers', ['id' => $student->id]) }}" class="btn btn-outline-light">{{ __('Submitted problems') }}</a>
        </div>

        <h2 class="mb-3">{{ __('Generated problems') }}</h2>

        @foreach ($student->mathProblems as $mathProblem)

            <div class="mb-3">

                <p>{{ $mathProblem->task }}</p>
                @if ($mathProblem->image)
                    <img src="{{ asset('/storage/uploadedImg/' . $mathProblem->image) }}" alt="{{ $mathProblem->id }}">
                @endif

            </div>

        @endforeach

    </div>

@endsection

@section('scripts')
    @parent

    <script src="https://cdn.jsdelivr.net/npm/evaluatex@2.2.0/dist/evaluatex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>

@endsection
