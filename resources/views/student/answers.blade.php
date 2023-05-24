@extends('layouts.app')

@section('content')

    <div class="content min-h-screen w-100">

        <h1>{{ __('Submitted math problems') }}</h1>
        @foreach ($student->submittedMathProblems as $mathProblem)

            <div class="card mt-4 mb-4">
                <div class="card-body">

                    <div class="mb-3">
                        <p>{{ $mathProblem->task }}</p>
            
                        @if ($mathProblem->image)
                            <img class="img-fluid" src="{{ asset('/storage/uploadedImg/' . $mathProblem->image) }}" alt="{{ $mathProblem->id }}">
                        @endif
                    </div>
            
                    <div class="d-flex gap-1">
            
                        <p>{{ __('STUDENT\'S ANSWER:') }}</p>
                        <p>{{ $mathProblem->pivot->answer }}</p>
            
                    </div>
            
                    <p class="badge bg-primary">{{ ($mathProblem->pivot->is_correct ? __('CORRECT') : __('INCORRECT')) . ", " . ($mathProblem->pivot->is_correct ? $mathProblem->file->points : "0") . "b" }}</p>

                </div>
            </div>
        
        @endforeach

    </div>

@endsection

@section('scripts')
    @parent

    <script src="https://cdn.jsdelivr.net/npm/evaluatex@2.2.0/dist/evaluatex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>

@endsection
