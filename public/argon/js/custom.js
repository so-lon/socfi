$(this).scroll(function () {
    $("#navbar-main").last().addClass("headroom");
    if ($(this).scrollTop()  <= 0 ) {
      $("#navbar-main").removeClass("headroom");
    }
});
$(window).on('load', function () {
    if ($(this).scrollTop() > 0) {
        $("#navbar-main").last().addClass("headroom");
    } else {
    // do nothing
    }
});
$(function() {
    $(".dropdown-menu .dropdown-item").click(function(e) {
        const tmp = $(this).parent().parent().attr('id');
        const id = tmp.replace("dd", "dropdown");
        $("#" + id).text($(this).text());
        $("#" + id).val($(this).val());
    });
});
