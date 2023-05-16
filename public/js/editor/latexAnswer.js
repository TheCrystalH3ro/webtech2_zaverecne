function onLoad() {

    var content = document.getElementById('content');
    // prevent the default form submission
    $.ajax({
        url: "/mathTasks",
        type: "GET",
        success: function (data) {
            data.forEach(element => {
                var div = document.createElement('p');
                div.innerHTML = element.solution;
                div.style.width = "max-content";
                content.appendChild(div);
                // if(element.images.length != undefined || element.images.length != 0) {
                //     element.images.forEach(image =>{
                //         var img = document.createElement('img');
                //         img.setAttribute('src', image);
                //         content.appendChild(img);
                //     })
                // }
                MathJax.typeset();
            });
            MathJax.typeset();
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log("Status: " + textStatus + " ERROR: " + errorThrown + "\n");
        }
    });


}

$('#toLatex').on('click', function() {
    var jsonObj = $('.eqEdEquation').data('eqObject').buildJsonObj();
    var latexAnswer = generateLatex(jsonObj);
    $('#ContentLatex').html(latexAnswer);
});