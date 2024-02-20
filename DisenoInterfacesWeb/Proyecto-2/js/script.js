$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $(".back-to-top").fadeIn("slow");
        document.getElementById("main").focus();
    } else {
        $(".back-to-top").fadeOut("slow");
        document.getElementById("main").focus();
    }
});
$(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500);
    document.getElementById("main").focus();
    return false;
});