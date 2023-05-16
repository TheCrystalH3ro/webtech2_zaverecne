function onLoad() {

    var content = document.getElementById('content');
    // prevent the default form submission
    $.ajax({
        url: "index.php",
        type: "GET",
        success: function (data) {
            // console.log("Data Loaded: " + data);
            data = JSON.parse(data);
            data.forEach(element => {
                var div = document.createElement('p');
                div.innerHTML = element.task;
                div.style.width = "max-content";
                content.appendChild(div);
                if(element.images.length != 0) {
                    element.images.forEach(image =>{
                        var img = document.createElement('img');
                        img.setAttribute('src', image);
                        content.appendChild(img);
                    })
                }
                MathJax.typeset();
            });
            MathJax.typeset();
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log("Status: " + textStatus + " ERROR: " + errorThrown + "\n");
        }
    });


}