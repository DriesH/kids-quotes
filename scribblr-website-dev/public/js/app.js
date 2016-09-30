var csrf_token = $('meta[name="_csrf-token"]').attr('content');

$(document).ready(function(){
    $('#showFormButton').on('click', function(){
        $(this).hide();
        $('#newChildForm').show('fast');
    });
    $('#newChildForm').submit(function (e) {
        $.ajax({
            type: "POST",
            url: "/api/child",
            data: JSON.stringify($('#newChildForm').serializeArray()),
            contentType: "jsonp",
            headers: {
                'X-CSRF-TOKEN' : csrf_token
            },
            success: function (data) {
                console.log(data);
            }
        });
        console.log( $('#newChildForm').serializeArray());

        e.preventDefault();
    })
});
