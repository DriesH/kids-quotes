$(function() {

    $(document).on("click", "#btnSave", function() {
        html2canvas($("#widget"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                document.body.appendChild(canvas);

                // Convert and download as image
                //Canvas2Image.saveAsPNG(canvas);
                $("#img-out").append(canvas);
                // Clean up
                //document.body.removeChild(canvas);
            }
        });

    });

    $('[data-toggle="tooltip"]').tooltip(); 

});
