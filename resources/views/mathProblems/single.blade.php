<h1>Zadanie príkladu</h1>
<div id="content">

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

@include('editor.scripts')
@include('editor.component')

<script>

    async function main() {

        async function getMathProblem() {

            let url = '{{ route("problem.solve", $mathProblem->id) }}';

            let result = null;

            await $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                accepts: {
                    text: "application/json"
                },
                success: function(response) {
                    result = JSON.parse(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            return result;

        }

        let mathProblem = await getMathProblem();

        $(document).ready(() => {

            displayMath(content, mathProblem);

        });

        $('#sendAnswer').on('click', function() {
            var jsonObj = $('.eqEdEquation').data('eqObject').buildJsonObj();
            var latexAnswer = generateLatex(jsonObj);
            sendLatexAnswer(latexAnswer);
        });

    }

    function sendLatexAnswer(latex) {

        $('#answerForm input[name="answer"]').val(latex);

        $('#answerForm').submit();

    }

    main();

</script>
