$(document).ready(function () {
  $("#form-up").hide();

  $(document).on("submit", "#update-products-form", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $codProduct = $("#codProduct").val();
    $.ajax({
      type: "POST",
      url: "../../controllers/ControllerProducts.php",
      processData: false,
      contentType: false,
      data: formData,
      cache: false,
      dataType: "json",
      success: function (r) {
        $("#form-find").hide();

        $("#form-up").show();
        $("#codigo_producto").val(r[0]["COD_PRDUCTO"]);
        $("#nombre_producto").val(r[0]["NOMBRE_PRODUCTO"]);
        $("#descripcion_producto").val(r[0]["DESCRIPCION"]);
        $("#precio").val(r[0]["PRECIO"]);
        $("#codigo_producto").focus();
        $("#nombre_producto").focus();
        $("#descripcion_producto").focus();
        $("#precio").focus();
      },
      error: function (r) {},
    });
  });
});
