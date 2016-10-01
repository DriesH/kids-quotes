var csrf_token = $('meta[name="_csrf-token"]').attr('content');

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
                console.log(data.name);
                $('#childrenList').append('<li><a>' + data.name + '</a></li>');

            },
            error: function (data) {
                alert('Error! Something happend while adding something to the database!');
            }
        });

        //console.log( $('#newChildForm').serializeObject() );

        e.preventDefault();
    })
});
