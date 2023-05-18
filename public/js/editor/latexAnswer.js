let taskSolution;

function onLoad() {

    var content = document.getElementById('content');
    // prevent the default form submission
    $.ajax({
        url: "/mathTasks",
        type: "GET",
        success: function (data) {
            var div = document.createElement('p');
            taskSolution = data[0].solution
            div.innerHTML = taskSolution;
            div.style.width = "max-content";
            content.appendChild(div);
            // data.forEach(element => {
            //     var div = document.createElement('p');
            //     div.innerHTML = element.solution;
            //     console.log(element.solution);
            //     div.style.width = "max-content";
            //     content.appendChild(div);
            //     // if(element.images.length != 0) {
            //     //     element.images.forEach(image =>{
            //     //         var img = document.createElement('img');
            //     //         img.setAttribute('src', image);
            //     //         content.appendChild(img);
            //     //     })
            //     // }
            //     MathJax.typeset();
            // });
            MathJax.typeset();
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log("Status: " + textStatus + " ERROR: " + errorThrown + "\n");
        }
    });


}

$('#sendAnswer').on('click', function() {
    var jsonObj = $('.eqEdEquation').data('eqObject').buildJsonObj();
    var latexAnswer = generateLatex(jsonObj);
    $('#ContentLatex').html(isAnswerCorrect(latexAnswer.toString().trim()));
});

function isAnswerCorrect(answer) {
    let latexSolution = taskSolution.replace("\\begin{equation*}", '').replace("\\end{equation*}", '').replace("\\dfrac", "\\frac").replace("\\tfrac", "\\frac").trim();
    let variable = findCharacterWithSurroundingSymbols(answer);
    if(variable != null) {
        fn = evaluatex(answer, {variable: 1}, {latex: true});
    } else {
        fn = evaluatex(answer, {}, { latex: true });
    }
    let result = fn();
    if(result === latexSolution) {
        return "correct";
    } else {
        return "false";
    }
}

function findCharacterWithSurroundingSymbols(str) {
    const regex = /[^a-zA-Z]([a-zA-Z])[^a-zA-Z]/;
    const match = str.match(regex);
    if (match && match.length > 1) {
      return match[1];
    }
    return null;
  }