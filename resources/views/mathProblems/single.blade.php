@extends('layouts.app')

@section('content')
    
    <div class="content min-h-screen w-100">

        <h1>Zadanie príkladu</h1>
        <div id="content">
            <p>{{ $mathProblem->task }}</p>
            @if ($mathProblem->image)
                <img src="{{ asset('storage/uploadedImg/' . $mathProblem->image) }}" alt="" class="mb-3">
            @endif
        </div>

        <script>
            window.image_path = '{{ asset("storage/uploadedImg") }}' + '/';
        </script>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="{{ asset('mathdisplay_tmp/script.js') }}"></script>

        <form id="answerForm" action="{{ route("problem.solve", $mathProblem->id) }}" method="post">
            @csrf
            <input type="hidden" name="answer">
        </form>

        @include('editor.component')

    </div>

@endsection

@section('scripts')
    @parent

    <script src="https://cdn.jsdelivr.net/npm/evaluatex@2.2.0/dist/evaluatex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>

    @include('editor.scripts')

@endsection
