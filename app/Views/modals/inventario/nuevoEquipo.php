<!-- Modal -->
<div class="modal fade" id="mdlNewEq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-theme03">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Registrar Nuevo Equipo</h4>
            </div>
            <div class="modal-body">
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <form class="form-horizontal style-form" id="formNuevo" autocomplete="off">

                                <div id="divFolio" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="folio" name="folio">
                                        <span class="help-block" id="folioVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divNomEqui" class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Nombre Equipo: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="nomEquipo" name="nomEquipo">
                                        <span class="help-block" id="nomEquipoVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divDesEquipo" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Descripcion: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="desEquipo" name="desEquipo">
                                        <span class="help-block" id="desEquipoVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divDateIngreso" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Ingreso: </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control round-form" id="dateIngreso" name="dateIngreso">
                                        <span class="help-block" id="dateIngresoVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="canNuev">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- col-lg-12-->
                </div><!-- /row -->
            </div>

        </div>
    </div>
</div>