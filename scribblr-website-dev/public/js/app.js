var csrf_token = $('meta[name="_csrf-token"]').attr('content');
var alertSuccess = '<div class="alert alert-success" id="successAlert"><strong>Success!</strong></div>';

$(document).ready(function(){

    $(".modal-transparent").on('show.bs.modal', function () {
        setTimeout( function() {
            $(".modal-backdrop").addClass("modal-backdrop-transparent");
        }, 0);
    });

    $(".modal-transparent").on('hidden.bs.modal', function () {
        $(".modal-backdrop").addClass("modal-backdrop-transparent");
    });


    $('#newChildForm').submit(function (e) {
        var formJSON = JSON.stringify( $('#newChildForm').serializeObject() );
        console.log('test');
        $.ajax({
            type: 'POST',
            url: '/api/child',
            data: formJSON,
            contentType: 'json',
            headers: {
                'X-CSRF-TOKEN' : csrf_token
            },
            success: function (data) {
                $('#dashboardMainRow').before(alertSuccess);
                $('#successAlert').delay(1000).fadeOut('fast', function(){
                    $(this).remove();
                });
            },
            error: function (data) {
                alert('Error! Something happend while adding something to the database!');
            }
        });

        //console.log( $('#newChildForm').serializeObject() );

        e.preventDefault();
    })


    $('#newQuoteForm').submit(function (e) {
        var formJSON = JSON.stringify( $('#newQuoteForm').serializeObject() );

        $.ajax({
            type: 'POST',
            url: '/api/quote',
            data: formJSON,
            contentType: 'json',
            headers: {
                'X-CSRF-TOKEN' : csrf_token
            },
            success: function (data) {
                $('#dashboardMainRow').before(alertSuccess);
                $('#successAlert').delay(1000).fadeOut('fast', function(){
                    $(this).remove();
                });
            },
            error: function (data) {
                alert('Error! Something happend while adding something to the database!');
            }
        });

        //console.log( $('#newChildForm').serializeObject() );

        e.preventDefault();
    })

});
