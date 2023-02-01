<div class="modal fade" id="mdlUpdEq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header twitter-panel">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Equipo</h4>
                <h4 class="modal-title" id="titleFormUpdate"></h4>
            </div>
            <div class="modal-body">
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <form class="form-horizontal style-form" id="formUpd" autocomplete="off">
                                <input type="hidden" id="hupd">

                                <div id="divNomEquiUpd" class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Nombre Equipo: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="nomEquipoUpd" name="nomEquipoUpd">
                                        <span class="help-block" id="nomEquipoUpdVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divDesEquipoUpd" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Descripcion: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="desEquipoUpd" name="desEquipoUpd">
                                        <span class="help-block" id="desEquipoUpdVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="canUpd">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- col-lg-12-->
                </div><!-- /row -->
            </div>

        </div>
    </div>
</div>