<!-- Modal -->
<div class="modal fade" id="mdlNewPres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-theme03">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Registrar Prestamo</h4>
            </div>
            <div class="modal-body">
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <form class="form-horizontal style-form" id="formNuevoPres" autocomplete="off">

                                <div id="divFolio" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="folio" name="folio">
                                        <span class="help-block" id="folioVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divMatr" class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Matricula: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="matricula" name="matricula">
                                        <span class="help-block" id="matrVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divNomAlum" class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Nombre Completo: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="nomAlum" name="nomAlum">
                                        <span class="help-block" id="nomAlumVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divGraGru" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Grado y Grupo: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="graGru" name="graGru">
                                        <span class="help-block" id="graGruVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divDatePres" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Fecha Prestamo: </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control round-form" id="datePres" name="datePres">
                                        <span class="help-block" id="datePresVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="canNuevPres">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Prestar</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- col-lg-12-->
                </div><!-- /row -->
            </div>

        </div>
    </div>
</div>