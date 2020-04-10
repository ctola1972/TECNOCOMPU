$(document).ready(function () {
  $(".fixed-action-btn").hide();
  $(".preloader-wrapper").hide();
  $(document).on("submit", "#formLogin", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $(".preloader-wrapper").show();
    $.ajax({
      type: "POST",
      url: "./controllers/ControllerLogin.php",
      contentType: false,
      processData: false,
      data: formData,
      cache: false,
      success: function (result) {
        if (result == 0) {
          $(".preloader-wrapper").hide();
          $("#toast-status").attr("href", "./css/toast-red.css");
          var toastHTML = '<span id="toast">Credenciales Incorrectas</span>';
          M.toast({
            html: toastHTML,
            classes: "rounded",
          });
        } else if (result == 1) {
          window.location = "./constants/sessionControl.php?login=true";
        }
      },
      error: function () {
        $(".preloader-wrapper").hide();
        $("#toast-status").attr("href", "./css/toast-red.css");
        var toastHTML = '<span id="toast">Error Inesperado</span>';
        M.toast({
          html: toastHTML,
          classes: "rounded",
        });
      },
    });
  });
});
