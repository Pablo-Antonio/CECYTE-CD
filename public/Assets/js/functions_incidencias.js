var tableIncidencias;
$(document).ready(function () {
  $("#liDashboard").removeClass("active");
  $("#liInventario").removeClass("active");
  $("#liPrestamos").removeClass("active");
  $("#liIncidencias").addClass("active");

  listarIncidencias();
  cerrarViewIncidencia();

  guardarReparar();
  classReparar();
  cerarFormReparar();

  guardarBaja();
  cerarBaja();
  classBaja();

  closeViewReparado();
  closeViewNoReparado();
});

function viewReparado(idIncidencia) {
  $.ajax({
    method: "GET",
    url: "/petIncidencias/show/"+idIncidencia,
    data: { idIncidencia: idIncidencia },
  })
    .done(function (data) {
      //console.log(data);
      datos = JSON.parse(data);
      $("#mdlViewReparado").modal("show");
      $("#titleReparado").text("DETALLES REPARACION: " + datos[0].idIncidencia);
      $("#viewFolioPR").text(datos[0].idPrestamo);
      $("#viewFolioER").text(datos[0].folio);
      $("#viewMtrR").text(datos[0].matricula);
      $("#viewAlumR").text(datos[0].alumno);
      $("#viewGraGruR").text(datos[0].gradoGrupo);
      $("#viewFePresR").text(datos[0].fechaPrestamo);
      $("#viewFeRepR").text(datos[0].fechaReporte);
      $("#viewDesRepR").text(datos[0].desReporte);
      $("#viewFeSolR").text(datos[0].fechaSolucion);
      $("#viewSolR").text(datos[0].desSolucion);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function closeViewReparado() {
  $("#cloViewR").on("click", function () {
    $("#mdlViewReparado").modal("hide");
  });
}

function viewNoReparado(idIncidencia) {
  $.ajax({
    method: "GET",
    url: "/petIncidencias/show/"+idIncidencia,
    data: { idIncidencia: idIncidencia },
  })
    .done(function (data) {
      //console.log(data);
      datos = JSON.parse(data);
      $("#mdlViewNoReparado").modal("show");
      $("#titleNoReparado").text("DETALLES BAJA: " + datos[0].idIncidencia);
      $("#viewFolioPNR").text(datos[0].idPrestamo);
      $("#viewFolioENR").text(datos[0].folio);
      $("#viewMtrNR").text(datos[0].matricula);
      $("#viewAlumNR").text(datos[0].alumno);
      $("#viewGraGruNR").text(datos[0].gradoGrupo);
      $("#viewFePresNR").text(datos[0].fechaPrestamo);
      $("#viewFeRepNR").text(datos[0].fechaReporte);
      $("#viewDesRepNR").text(datos[0].desReporte);
      $("#viewFeSolNR").text(datos[0].fechaSolucion);
      $("#viewSolNR").text(datos[0].desSolucion);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function closeViewNoReparado() {
  $("#cloViewNR").on("click", function () {
    $("#mdlViewNoReparado").modal("hide");
  });
}

function listarIncidencias() {
  tableIncidencias = $("#tableIncidencias").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "/petIncidencias/getAll",
      dataSrc: "",
    },
    columns: [
      { data: "idIncidencia" },
      { data: "folio" },
      { data: "fechaReporte" },
      { data: "status" },
      { data: "acciones" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[3, "desc"]],
  });
}

function viewIncidencia(idIncidencia) {
  $.ajax({
    method: "GET",
    url: "/petIncidencias/show/"+idIncidencia,
    data: { idIncidencia: idIncidencia },
  })
    .done(function (data) {
      //console.log(data);
      datos = JSON.parse(data);
      $("#mdlViewInc").modal("show");
      $("#viewFolioP").text(datos[0].idPrestamo);
      $("#viewFolioE").text(datos[0].folio);
      $("#viewMtr").text(datos[0].matricula);
      $("#viewAlum").text(datos[0].alumno);
      $("#viewGraGru").text(datos[0].gradoGrupo);
      $("#viewFePres").text(datos[0].fechaPrestamo);
      $("#viewFeRep").text(datos[0].fechaReporte);
      $("#viewDes").text(datos[0].desReporte);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function cerrarViewIncidencia() {
  $("#cloViewInc").on("click", function () {
    $("#mdlViewInc").modal("hide");
  });
}

function viewReparar(idIncidencia) {
  $.ajax({
    method: "GET",
    url: "/petIncidencias/show/"+idIncidencia,
    data: { idIncidencia: idIncidencia },
  })
    .done(function (data) {
      //console.log(data);
      datos = JSON.parse(data);
      $("#mdlReparar").modal("show");
      $("#hddRe").val(idIncidencia);
      $("#viewFolioPR").text(datos[0].idPrestamo);
      $("#viewFolioER").text(datos[0].folio);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function guardarReparar() {
  $("#formReparar").submit(function (event) {
    event.preventDefault();

    if (!valFormReparar()) {
      msjAlert("error", "Los campos en rojo son necesarios", "Campos Vacios");
      return;
    } else {
      var formReparar = new FormData($("#formReparar")[0]);

      var time = new Date();
      var hora =
        time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
      var dateSolucion = $("#dateRep").val();
      dateSolucion += " " + hora;
      var idIncidencia = $("#hddRe").val();

      formReparar.append("dateSolucion", dateSolucion);
      formReparar.append("opcion", 1);
      formReparar.append("idIncidencia", idIncidencia);

      $.ajax({
        method: "POST",
        url: "/petIncidencias/update",
        data: formReparar,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          //console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            $("#formReparar")[0].reset();
            classReparar();
            $("#mdlReparar").modal("hide");
            tableIncidencias.api().ajax.reload();
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

function valFormReparar() {
  var ban = false;

  if ($("#dateRep").val() == "") {
    $("#divDateReparar").addClass("has-error");
    $("#dateRepVal").show();
    ban = false;
  } else {
    $("#divDateReparar").removeClass("has-error");
    $("#desRepVal").hide();
    ban = true;
  }

  if ($("#desSolucion").val() == "") {
    $("#divDesReparacion").addClass("has-error");
    $("#desRepVal").show();
    ban = false;
  } else {
    $("#divDesReparacion").removeClass("has-error");
    $("#desRepVal").hide();
    ban = true;
  }

  return ban;
}

function classReparar() {
  $("#divDateReparar").removeClass("has-error");
  $("#divDesReparacion").removeClass("has-error");

  $("#dateRepVal").hide();
  $("#desRepVal").hide();
}

function cerarFormReparar() {
  $("#cerrarReparar").on("click", function () {
    $("#formReparar")[0].reset();
    classReparar();
    $("#mdlReparar").modal("hide");
  });
}

function viewBaja(idIncidencia) {
  $.ajax({
    method: "GET",
    url: "/petIncidencias/show/"+idIncidencia,
    data: { idIncidencia: idIncidencia },
  })
    .done(function (data) {
      //console.log(data);
      datos = JSON.parse(data);
      $("#mdlBaja").modal("show");
      $("#hddBa").val(idIncidencia);
      $("#viewFolioPB").text(datos[0].idPrestamo);
      $("#viewFolioEB").text(datos[0].folio);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function guardarBaja() {
  $("#formBaja").submit(function (event) {
    event.preventDefault();

    if (!valFormBaja()) {
      msjAlert("error", "Los campos en rojo son necesarios", "Campos Vacios");
      return;
    } else {
      var formBaja = new FormData($("#formBaja")[0]);

      var time = new Date();
      var hora =
        time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
      var dateSolucion = $("#dateBaja").val();
      dateSolucion += " " + hora;
      var idIncidencia = $("#hddBa").val();

      formBaja.append("dateSolucion", dateSolucion);
      formBaja.append("opcion", 2);
      formBaja.append("idIncidencia", idIncidencia);
      formBaja.append("desSolucion", $("#desSolB").val());

      $.ajax({
        method: "POST",
        url: "/petIncidencias/update",
        data: formBaja,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            $("#formBaja")[0].reset();
            classBaja();
            $("#mdlBaja").modal("hide");
            tableIncidencias.api().ajax.reload();
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

function valFormBaja() {
  var ban = false;

  if ($("#dateBaja").val() == "") {
    $("#divDateBaja").addClass("has-error");
    $("#dateBajaVal").show();
    ban = false;
  } else {
    $("#divDateBaja").removeClass("has-error");
    $("#dateBajaVal").hide();
    ban = true;
  }

  if ($("#desSolB").val() == "") {
    $("#divDesB").addClass("has-error");
    $("#desSolBVal").show();
    ban = false;
  } else {
    $("#divDesB").removeClass("has-error");
    $("#desSolBVal").hide();
    ban = true;
  }

  return ban;
}

function classBaja() {
  $("#divDateBaja").removeClass("has-error");
  $("#divDesB").removeClass("has-error");

  $("#dateBajaVal").hide();
  $("#desSolBVal").hide();
}

function cerarBaja() {
  $("#cerrarBaja").on("click", function () {
    $("#formBaja")[0].reset();
    classBaja();
    $("#mdlBaja").modal("hide");
  });
}
