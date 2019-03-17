/*$(document).ready(function() {
    $("#list_user a").click(function () {
        $(this).addClass("active");
        $("#list_user a").not(this).removeClass("active");
    });
});*/

$(function () {
    $('[data-toggle="popover"]').popover()
});
  
$('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    startDate: '-3d'
});