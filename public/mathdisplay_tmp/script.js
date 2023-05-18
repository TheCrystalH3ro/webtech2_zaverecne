function onLoad() {

    var content = document.getElementById('content');
    // prevent the default form submission
    $.ajax({
        url: "index.php",
        type: "GET",
        success: function (data) {
            // console.log("Data Loaded: " + data);
            data = JSON.parse(data);
            displayMath(content, data);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log("Status: " + textStatus + " ERROR: " + errorThrown + "\n");
        }
    });


}

function displayMath(content, data) {

    data.forEach(element => {
        var div = document.createElement('div');
        var p = document.createElement('p');
        div.innerHTML = element.task;
        div.style.width = "max-content";
        div.appendChild(p);

        if(element.image != undefined && element.image) {
            var img = document.createElement('img');
            img.setAttribute('src', window.image_path + element.image);
            div.appendChild(img);
        }
        content.appendChild(div);
        MathJax.typeset();
    });
    MathJax.typeset();

}
