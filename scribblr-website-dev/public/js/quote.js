var csrf_token = $('meta[name="_csrf-token"]').attr('content');

$(document).ready(function(){

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
                alert('Ik werk!')
            },
            error: function (data) {
                alert('Error! Something happend while adding something to the database!');
            }
        });

        e.preventDefault();
    })

});
