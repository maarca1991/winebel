// Custom JS
$( document ).ready(function() {
    // Show-hide password
    $(".show-password").mousedown(function(){
        $(this).parent().find("input").attr("type","text");
    });
    $(".show-password").mouseup(function(){
        $(this).parent().find("input").attr("type","password");
    });

    $(".type-file").click(function(){
        $(this).parent().find("input").click();
        $($(this).parent().find("input")).change(function() {
            var filename = $(this).parent().find("input").val().replace(/C:\\fakepath\\/i, '');
            $(this).parent().find(".type-file").text(filename);
        });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('.language-menu select').niceSelect();

    $(".sidebar-toggle").click(function() {
        if(!$(".sidebar").hasClass("show")) {
            $(".sidebar").addClass("show");
        } else {
            $(".sidebar").removeClass("show");
        }
    });
});