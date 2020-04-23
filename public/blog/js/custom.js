$("#btn-subscribe-us").click(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $('#form-subscribe-us');
    var url = form.attr('action');

    $.ajax({
        type: form.attr('method'),
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function (data)
        {
            $("#subscribe-us-msg").text("Thankyou for subscribing us!");
            $("#subscribe-us-email").val("");
        },
        error: function (errors)
        {
            $("#subscribe-us-msg").text("You entered invalid email id");
        }
    });
    return false;
});

$("#btn-post-search").click(function (e) {
    $("#search-error").hide();
    if ($("#q").val().trim() != "") {
        var uri = $("#search-form").attr('action') + "?q=" + $("#q").val().trim();
        location.href = uri;
        return false;
    } else {
        $("#search-error").show();
        return false;
    }
});

$("#btn-read-comments").click(function (e) {
    $("#read-comments").removeClass('hidden');
    $(this).addClass('hidden');
});

$(".reply").on('click', function(e){
    $("#comment-parent-id").val($(this).data('comment-id'));
});