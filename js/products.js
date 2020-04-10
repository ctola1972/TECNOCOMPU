$(document).ready(function () {
  $(".gifLoader").hide();
  $(document).on("submit", "#agregar_productos_form", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $(".gifLoader").show();
    $.ajax({
      type: "POST",
      url: "../../controllers/ControllerProducts.php",
      contentType: false,
      processData: false,
      data: formData,
      cache: false,
      success: function (result) {
        $(".gifLoader").hide();
        if (result == 0) {
          $("#toast-status").attr("href", "../../css/toast-red.css");
          var toastHTML = '<span id="toast">OCURRIO UN ERROR INESPERADO</span>';
          M.toast({
            html: toastHTML,
            classes: "rounded",
          });
        } else {
          $("#toast-status").attr("href", "../../css/toast-green.css");
          var toastHTML = '<span id="toast">' + result + "</span>";
          M.toast({
            html: toastHTML,
            classes: "rounded",
          });

          $("#agregar_productos_form")[0].reset();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
      },
    });
  });
});
