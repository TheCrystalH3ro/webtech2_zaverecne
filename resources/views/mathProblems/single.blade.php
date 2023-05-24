@extends('layouts.app')

@section('content')

    <div class="content min-h-screen w-100">

        <h1>Zadanie príkladu</h1>
        <div id="content" class="mt-4 mb-4">
            <p>{{ $mathProblem->task }}</p>
            @if ($mathProblem->image)
                <img class="img-fluid" src="{{ asset('storage/uploadedImg/' . $mathProblem->image) }}" alt="">
            @endif
        </div>

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

    <script defer>

        function sendLatexAnswer(latex) {
            $('#answerForm input[name="answer"]').val(latex);
            $('#answerForm').submit();
        }

        $(document).ready(() => {

            $('#sendAnswer').on('click', function() {
                var answerJsonObj = $('.eqEdEquation').data('eqObject').buildJsonObj();
                var latexAnswer = generateLatex(answerJsonObj);
                sendLatexAnswer(latexAnswer);
            });

        });
    </script>

@endsection
