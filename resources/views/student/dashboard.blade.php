@extends('layouts.app')

@section('content')

    <div class="content min-h-screen w-100">

        <a class="btn btn-outline-light w-100" href="{{ route('problems.pick') }}">{{ __('Generate math problems') }}</a>
        
        <div class="card border-primary w-100 mt-3">
            <div class="card-header">
                {{ __('Assigned problems') }}
            </div>
            <div class="card-body">
                @foreach ($student->unsubmittedMathProblems as $mathProblem)
                    <div>
                        <h4>Zadanie:</h4>
                        <p>{{ $mathProblem->task }}</p>
                        @if ($mathProblem->image)
                            <img src="{{ asset('storage/uploadedImg/' . $mathProblem->image) }}" alt="">
                        @endif
                    </div>
                    <a href="{{ route('problem.solve', $mathProblem->id) }}" class="btn btn-primary mt-2 mb-3">{{ __('Solve') }}</a>
                @endforeach
            </div> 
        </div>

        <div class="card border-primary w-100 mt-3">
            <div class="card-header">
                {{ __('Handed in problems') }}
            </div>
            <div class="card-body">
                @foreach ($student->submittedMathProblems as $mathProblem)
                    <div>
                        <h4>Zadanie:</h4>
                        <p>{{ $mathProblem->task }}</p>
                        @if ($mathProblem->image)
                            <img src="{{ asset('storage/uploadedImg/' . $mathProblem->image) }}" alt="">
                        @endif
                    </div>
                @endforeach
            </div> 
        </div>
    </div>

@endsection

@section('scripts')
    @parent

    <script src="https://cdn.jsdelivr.net/npm/evaluatex@2.2.0/dist/evaluatex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>

@endsection
