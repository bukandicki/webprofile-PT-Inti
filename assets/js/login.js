$(document).ready(function () {
  $("#submit").on("click", function () {
    $.post($("#form_login").attr("action"),
           $("#form_login :input").serializeArray(),
           function (data) {
            $("#keterangan").html(data);
           });

    $("#form_login").submit(function(){
      return false;
    });
  });
});
