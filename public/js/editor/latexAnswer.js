$('#toLatex').on('click', function() {
    var jsonObj = $('.eqEdEquation').data('eqObject').buildJsonObj();
    var latexAnswer = generateLatex(jsonObj);
    $('#ContentLatex').html(latexAnswer);
});