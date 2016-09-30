var csrf_token = $('meta[name="_csrf-token"]').attr('content');

$(document).ready(function(){
    $('#showFormButton').on('click', function(){
        $(this).hide();
        $('#newChildForm').show('fast');
    });

    $('#newChildForm').submit(function (e) {
        var formJSON = JSON.stringify( $('#newChildForm').serializeObject() );

        $.ajax({
            type: 'POST',
            url: '/api/child',
            data: formJSON,
            contentType: 'json',
            headers: {
                'X-CSRF-TOKEN' : csrf_token
            },
            success: function (data) {

            }
        });
        console.log( $('#newChildForm').serializeObject() );

        e.preventDefault();
    })
});
