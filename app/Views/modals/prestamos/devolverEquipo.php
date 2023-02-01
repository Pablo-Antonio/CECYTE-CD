<!-- Modal -->
<div class="modal fade" id="mdlViewDev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header twitter-panel">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Detalles Devolución</h4>
            </div>
            <div class="modal-body">
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <form class="form-horizontal style-form" id="formNuevoPres" autocomplete="off">

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio Prestamo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewIdD" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio Equipo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewFolioD" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Matricula: </label>
                                    <div class="col-sm-10">
                                        <p id="viewMtrD" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Nombre Alumno: </label>
                                    <div class="col-sm-10">
                                        <p id="viewAlumD" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Grado y Grupo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewGraGruD" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Fecha/Hora Prestamo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewFePresD" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Fecha/Hora Devolucion: </label>
                                    <div class="col-sm-10">
                                        <p id="viewFeDevD" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="cloViewDev">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- col-lg-12-->
                </div><!-- /row -->
            </div>

        </div>
    </div>
</div>