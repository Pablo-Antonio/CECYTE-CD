var tablePrestamos;
$(document).ready(function () {
  $("#liDashboard").removeClass("active");
  $("#liInventario").removeClass("active");
  $("#liPrestamos").addClass("active");
  $("#liIncidencias").removeClass("active");

  listarPrestamos();

  nuevoPrestamo();
  valFormNew();
  classNewPres();
  cancelarNuevo();

  cerrarViewPres();
  cerrarViewDev();

  guardarIncidencia();
  valFormInc();
  classNewInc();
  cancelarIncidencia();
});

function listarPrestamos() {
  tablePrestamos = $("#tablePrestamos").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "/petPrestamos/getAll",
      dataSrc: "",
    },
    columns: [
      { data: "idPrestamo" },
      { data: "matricula" },
      { data: "folio" },
      { data: "fechaPrestamo" },
      { data: "status" },
      { data: "acciones" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[5, "desc"]],
  });
}

function viewPrestamo(idPrestamo) {
  $.ajax({
    method: "GET",
    url: "/petPrestamos/show/"+idPrestamo,
    data: { idPrestamo: idPrestamo },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      $("#mdlViewPres").modal("show");
      $("#viewFolio").text(datos.folio);
      $("#viewMtr").text(datos.matricula);
      $("#viewAlum").text(datos.alumno);
      $("#viewGraGru").text(datos.gradoGrupo);
      $("#viewFePres").text(datos.fechaPrestamo);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function cerrarViewPres() {
  $("#cloViewPres").on("click", function () {
    $("#mdlViewPres").modal("hide");
  });
}

function nuevoPrestamo() {
  $("#formNuevoPres").submit(function (event) {
    event.preventDefault();

    if (!valFormNew()) {
      msjAlert("error", "Los campos en rojo son necesarios", "Campos Vacios");
      return;
    } else {
      var formNuevoPres = new FormData($("#formNuevoPres")[0]);

      var time = new Date();
      var hora =
        time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
      var datePrestamo = $("#datePres").val();
      datePrestamo += " " + hora;
      //console.log("Fecha Prestamo: "+prestamo);

      formNuevoPres.append("datePrestamo", datePrestamo);

      $.ajax({
        method: "POST",
        url: "/petPrestamos/new",
        data: formNuevoPres,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          //console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            $("#formNuevoPres")[0].reset();
            classNewPres();
            $("#mdlNewPres").modal("hide");
            tablePrestamos.api().ajax.reload();
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

  if ($("#matricula").val() == "") {
    $("#divMatr").addClass("has-error");
    $("#matrVal").show();
    ban = false;
  } else {
    $("#divMatr").removeClass("has-error");
    $("#matrVal").hide();
    ban = true;
  }

  if ($("#nomAlum").val() == "") {
    $("#divNomAlum").addClass("has-error");
    $("#nomAlumVal").show();
    ban = false;
  } else {
    $("#divNomAlum").removeClass("has-error");
    $("#nomAlumVal").hide();
    ban = true;
  }

  if ($("#graGru").val() == "") {
    $("#divGraGru").addClass("has-error");
    $("#graGruVal").show();
    ban = false;
  } else {
    $("#divGraGru").removeClass("has-error");
    $("#graGruVal").hide();
    ban = true;
  }

  if ($("#datePres").val() == "") {
    $("#divDatePres").addClass("has-error");
    $("#datePresVal").show();
    ban = false;
  } else {
    $("#divDatePres").removeClass("has-error");
    $("#datePresVal").hide();
    ban = true;
  }

  return ban;
}

function classNewPres() {
  $("#divFolio").removeClass("has-error");
  $("#divMatr").removeClass("has-error");
  $("#divNomAlum").removeClass("has-error");
  $("#divGraGru").removeClass("has-error");
  $("#divDatePres").removeClass("has-error");

  $("#folioVal").hide();
  $("#matrVal").hide();
  $("#nomAlumVal").hide();
  $("#graGruVal").hide();
  $("#datePresVal").hide();
}

function cancelarNuevo() {
  $("#canNuevPres").on("click", function () {
    classNewPres();
    $("#formNuevoPres")[0].reset();
    $("#mdlNewPres").modal("hide");
  });
}

function devolver(idPrestamo) {
  $.ajax({
    method: "GET",
    url: "/petPrestamos/show/"+idPrestamo,
    data: { idPrestamo: idPrestamo },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      Swal.fire({
        title: "¿Estás seguro?",
        text: "¿Desea devolver el equipo con FOLIO : " + datos.folio + "?",
        type: "warning",
        allowOutsideClick: false, //para que no se cierra al dar clic afuera
        //allowEnterKey:true, //cuando pulse la letra enter podra quitar el mensaje
        showCancelButton: true,
        confirmButtonText: "Sí, devolver",
        cancelButtonText: "No, cancelar",
      }).then((resultado) => {
        if (resultado.value) {
          var date = new Date();
          var entrega = "";
          entrega =
            date.getFullYear() +
            "-" +
            (date.getMonth() + 1) +
            "-" +
            date.getDate() +
            " " +
            date.getHours() +
            ":" +
            date.getMinutes() +
            ":" +
            date.getSeconds();
          devolverEquipo(datos, entrega);
        } else {
          msjAlert("error", "", "Devolución Cancelada");
        }
      });
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function devolverEquipo(datos, fechaDevolucion) {
  $.ajax({
    method: "POST",
    url: "/petPrestamos/update",
    data: {
      idPrestamo: datos.idPrestamo,
      folio: datos.folio,
      dateDevolucion: fechaDevolucion,
    },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      if (datos.status == true) {
        tablePrestamos.api().ajax.reload();
        msjAlert("success", datos.msg, "Éxito");
      } else {
        msjAlert("error", datos.msg, "Error");
      }
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function viewDevolucion(idPrestamo) {
  $.ajax({
    method: "GET",
    url: "/petPrestamos/show/"+idPrestamo,
    data: { idPrestamo: idPrestamo },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      $("#mdlViewDev").modal("show");
      $("#viewIdD").text(datos.idPrestamo);
      $("#viewFolioD").text(datos.folio);
      $("#viewMtrD").text(datos.matricula);
      $("#viewAlumD").text(datos.alumno);
      $("#viewGraGruD").text(datos.gradoGrupo);
      $("#viewFePresD").text(datos.fechaPrestamo);
      $("#viewFeDevD").text(datos.fechaDevolucion);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function cerrarViewDev() {
  $("#cloViewDev").on("click", function () {
    $("#mdlViewDev").modal("hide");
  });
}

function reportar(idPrestamo) {
  $.ajax({
    method: "GET",
    url: "/petPrestamos/show/"+idPrestamo,
    data: { idPrestamo: idPrestamo },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      Swal.fire({
        title: "¿Estás seguro?",
        text: "¿ Desea reportar el equipo con FOLIO : " + datos.folio + " ?",
        type: "warning",
        allowOutsideClick: false, //para que no se cierra al dar clic afuera
        //allowEnterKey:true, //cuando pulse la letra enter podra quitar el mensaje
        showCancelButton: true,
        confirmButtonText: "Sí, reportar",
        cancelButtonText: "No, cancelar",
      }).then((resultado) => {
        if (resultado.value) {
          $("#mdlNewRep").modal("show");
          $("#hddR").val(datos.idPrestamo);
          $("#hddF").val(datos.folio);
          $("#viewFolioR").text(datos.folio);
          $("#viewMtrR").text(datos.matricula);
        } else {
          msjAlert("error", "", "Incidencia Cancelada");
        }
      });
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function guardarIncidencia() {
  $("#formIncidencia").submit(function (event) {
    event.preventDefault();
    if (!valFormInc()) {
      msjAlert("error", "Los campos en rojo son necesarios", "Campos Vacios");
      return;
    } else {
      var formIncidencia = new FormData($("#formIncidencia")[0]);

      var time = new Date();
      var hora =
        time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
      var dateReporte = $("#dateReporte").val();
      dateReporte += " " + hora;
      var idPrestamo = $("#hddR").val();
      var folio = $("#hddF").val();

      formIncidencia.append("dateReporte", dateReporte);
      formIncidencia.append("idPrestamo", idPrestamo);
      formIncidencia.append("folio", folio);

      $.ajax({
        method: "POST",
        url: "/petIncidencias/new",
        data: formIncidencia,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            classNewInc();
            $("#formIncidencia")[0].reset();
            $("#mdlNewRep").modal("hide");
            tablePrestamos.api().ajax.reload();
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

function cancelarIncidencia() {
  $("#canNuevInc").on("click", function () {
    classNewInc();
    $("#formIncidencia")[0].reset();
    $("#mdlNewRep").modal("hide");
  });
}

function valFormInc() {
  var ban = false;

  if ($("#desReporte").val() == "") {
    $("#divDesReporte").addClass("has-error");
    $("#desRepVal").show();
    ban = false;
  } else {
    $("#divDesReporte").removeClass("has-error");
    $("#desRepVal").hide();
    ban = true;
  }

  if ($("#dateReporte").val() == "") {
    $("#divDateReporte").addClass("has-error");
    $("#dateReporteVal").show();
    ban = false;
  } else {
    $("#divDateReporte").removeClass("has-error");
    $("#dateReporteVal").hide();
    ban = true;
  }

  return ban;
}

function classNewInc() {
  $("#divDesReporte").removeClass("has-error");
  $("#divDateReporte").removeClass("has-error");

  $("#desRepVal").hide();
  $("#dateReporteVal").hide();
}
