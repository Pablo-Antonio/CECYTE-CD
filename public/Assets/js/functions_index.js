$(document).ready(function () {
  valLogin();
  //console.log("entando login");
});

function valLogin() {
  $("#formLogueo").submit(function (event) {
    event.preventDefault();

    if ($("#usr").val() == "" || $("#pass").val() == "") {
      msjAlert("error", "Todos los campos son requeridos", "Campos Vacios");
      return;
    } else {
      var formLogueo = new FormData($("#formLogueo")[0]);

      $.ajax({
        method: "POST",
        url: "/logIn",
        data: formLogueo,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          //console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            $(location).attr("href", "/Inventario");
            //msjAlert("success", datos.msg, "Éxito");
          } else {
            msjAlert("error", datos.msg, "Error");
          }
        })
        .fail(function () {
          msjAlert("error", "Error con el Servidor", "Error");
        });
    }
  });
}
