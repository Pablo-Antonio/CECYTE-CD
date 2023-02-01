<!-- Modal -->
<div class="modal fade" id="mdlNewRep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-theme04">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Reportar Equipo</h4>
            </div>
            <div class="modal-body">
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <form class="form-horizontal style-form" id="formIncidencia" autocomplete="off">

                                <input type="hidden" id="hddR">
                                <input type="hidden" id="hddF">

                                <div id="divFolio" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio Equipo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewFolioR" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div id="divNomEqui" class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Matricula Alumno: </label>
                                    <div class="col-sm-10">
                                        <p id="viewMtrR" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div id="divDesReporte" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Descripcion: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="desReporte" name="desReporte">
                                        <span class="help-block" id="desRepVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divDateReporte" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Fecha Reporte: </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control round-form" id="dateReporte" name="dateReporte">
                                        <span class="help-block" id="dateReporteVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="canNuevInc">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Reportar</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- col-lg-12-->
                </div><!-- /row -->
            </div>

        </div>
    </div>
</div>