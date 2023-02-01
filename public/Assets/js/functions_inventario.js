var tableEquipos;
$(document).ready(function () {
  $("#liDashboard").removeClass("active");
  $("#liInventario").addClass("active");
  $("#liPrestamos").removeClass("active");
  $("#liIncidencias").removeClass("active");

  listarEquipo();
  nuevoEquipo();
  cancelarNuevo();
  classNuevoForm();

  update();
  cancelarUpdate();
  classNuevoUpd();
});

function listarEquipo() {
  tableEquipos = $("#tableEquipos").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "/petInventario/getAll",
      dataSrc: "",
    },
    columns: [
      { data: "folio" },
      { data: "nombreEquipo" },
      { data: "fechaIngreso" },
      { data: "status" },
      { data: "acciones" },
    ],
    dom: "lBfrtip",
    buttons: [
      {
        extend: "copyHtml5",
        text: "<i class='far fa-copy'></i> Copiar",
        titleAttr: "Copiar",
        className: "btn btn-secondary",
      },
      {
        extend: "excelHtml5",
        text: "<i class='fas fa-file-excel'></i> Excel",
        titleAttr: "Esportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: "<i class='fas fa-file-pdf'></i> PDF",
        titleAttr: "Esportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "csvHtml5",
        text: "<i class='fas fa-file-csv'></i> CSV",
        titleAttr: "Esportar a CSV",
        className: "btn btn-info",
      },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "des"]],
  });
}

function nuevoEquipo() {
  $("#formNuevo").submit(function (event) {
    event.preventDefault();
    if (!valFormNew()) {
      msjAlert("error", "Los campos en rojo son necesarios", "Campos Vacios");
      return;
    } else {
      var formNuevo = new FormData($("#formNuevo")[0]);
      $.ajax({
        method: "POST",
        url: "/petInventario/new",
        data: formNuevo,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          //console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            $("#mdlNewEq").modal("hide");
            $("#formNuevo")[0].reset();
            classNuevoForm();
            tableEquipos.api().ajax.reload();
            msjAlert("success", datos.msg, "Éxito");
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

function valFormNew() {
  var ban = false;
  if ($("#folio").val() == "") {
    $("#divFolio").addClass("has-error");
    $("#folioVal").show();
    ban = false;
  } else {
    $("#divFolio").removeClass("has-error");
    $("#folioVal").hide();
    ban = true;
  }
  if ($("#nomEquipo").val() == "") {
    $("#divNomEqui").addClass("has-error");
    $("#nomEquipoVal").show();
    ban = false;
  } else {
    $("#divNomEqui").removeClass("has-error");
    $("#nomEquipoVal").hide();
    ban = true;
  }
  if ($("#nomEquipo").val() == "") {
    $("#divNomEqui").addClass("has-error");
    $("#nomEquipoVal").show();
    ban = false;
  } else {
    $("#divNomEqui").removeClass("has-error");
    $("#nomEquipoVal").hide();
    ban = true;
  }

  if ($("#desEquipo").val() == "") {
    $("#divDesEquipo").addClass("has-error");
    $("#desEquipoVal").show();
    ban = false;
  } else {
    $("#divDesEquipo").removeClass("has-error");
    $("#desEquipoVal").hide();
    ban = true;
  }

  if ($("#dateIngreso").val() == "") {
    $("#divDateIngreso").addClass("has-error");
    $("#dateIngresoVal").show();
    ban = false;
  } else {
    $("#divDateIngreso").removeClass("has-error");
    $("#dateIngresoVal").hide();
    ban = true;
  }

  return ban;
}

function cancelarNuevo() {
  $("#canNuev").on("click", function () {
    $("#mdlNewEq").modal("hide");
    $("#formNuevo")[0].reset();
    classNuevoForm();
  });
}

function classNuevoForm() {
  $("#divFolio").removeClass("has-error");
  $("#divNomEqui").removeClass("has-error");
  $("#divDesEquipo").removeClass("has-error");
  $("#divDateIngreso").removeClass("has-error");

  $("#folioVal").hide();
  $("#nomEquipoVal").hide();
  $("#desEquipoVal").hide();
  $("#dateIngresoVal").hide();
}

function viewEquipo(folio) {
  $.ajax({
    method: "GET",
    url: "/petInventario/show/"+folio,
    data: { idEquipo: folio },
  })
    .done(function (data) {
      //console.log(data);
      datos = JSON.parse(data);
      $("#mdlViewEq").modal("show");
      $("#viewFolio").text(datos.folio);
      $("#viewNomEq").text(datos.nombreEquipo);
      $("#viewDescripcion").text(datos.descripcionEquipo);
      $("#viewIngreso").text(datos.fechaIngreso);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function viewActualizar(folio) {
  $.ajax({
    method: "GET",
    url: "/petInventario/show/"+folio,
    data: { idEquipo: folio },
  })
    .done(function (data) {
      //console.log(data);
      datos = JSON.parse(data);
      $("#mdlUpdEq").modal("show");
      $("#titleFormUpdate").text("FOLIO: "+datos.folio);
      $("#hupd").val(datos.idEquipo);
      $("#nomEquipoUpd").val(datos.nombreEquipo );
      $("#desEquipoUpd").val(datos.descripcionEquipo);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function update(){
$("#formUpd").submit(function(event){
  event.preventDefault();
  if(!valFormUpd()){
    msjAlert("error", "Los campos en rojo son necesarios", "Campos Vacios");
    return;
  }else{
    var formUpd = new FormData($("#formUpd")[0]);
    var idEquipo = $("#hupd").val();
    formUpd.append("idEquipo",idEquipo);
    $.ajax({
      method: "POST",
      url: "/petInventario/update",
      data: formUpd,
      contentType: false,
      processData: false,
    })
      .done(function (data) {
        //console.log(data);
        var datos = JSON.parse(data);
        if (datos.status == true) {
          $("#mdlUpdEq").modal("hide");
          $("#formUpd")[0].reset();
          classNuevoUpd();
          tableEquipos.api().ajax.reload();
          msjAlert("success", datos.msg, "Éxito");
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

function valFormUpd() {
  var ban = false;
 
  if ($("#nomEquipoUpd").val() == "") {
    $("#divNomEquiUpd").addClass("has-error");
    $("#nomEquipoUpdVal").show();
    ban = false;
  } else {
    $("#divNomEquiUpd").removeClass("has-error");
    $("#nomEquipoUpdVal").hide();
    ban = true;
  }

  if ($("#desEquipoUpd").val() == "") {
    $("#divDesEquipoUpd").addClass("has-error");
    $("#desEquipoUpdVal").show();
    ban = false;
  } else {
    $("#divDesEquipoUpd").removeClass("has-error");
    $("#desEquipoUpdVal").hide();
    ban = true;
  }

  return ban;
}

function cancelarUpdate() {
  $("#canUpd").on("click", function () {
    $("#mdlUpdEq").modal("hide");
    $("#formUpd")[0].reset();
    classNuevoUpd();
  });
}

function classNuevoUpd() {
  $("#divNomEquiUpd").removeClass("has-error");
  $("#divDesEquipoUpd").removeClass("has-error");

  $("#nomEquipoUpdVal").hide();
  $("#desEquipoUpdVal").hide();
}
