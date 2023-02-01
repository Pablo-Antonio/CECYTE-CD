function msjAlert(tipo, msj, titulo) {
  Swal.fire({
    position: "top-end",
    type: tipo,
    title: titulo,
    text: msj,
    showConfirmButton: false,
    timer: 1550,
  });
}
