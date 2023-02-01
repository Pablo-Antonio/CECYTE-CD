<!-- Modal -->
<div class="modal fade" id="mdlBaja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-theme04">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Dar Equipo de Baja</h4>
            </div>
            <div class="modal-body">
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <form class="form-horizontal style-form" id="formBaja" autocomplete="off">

                                <input type="hidden" id="hddBa">

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio Prestamo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewFolioPB" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio Equipo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewFolioEB" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div id="divDateBaja" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Fecha Baja: </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control round-form" id="dateBaja" name="dateBaja">
                                        <span class="help-block" id="dateBajaVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divDesB" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Descripcion: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="desSolB" name="desSolB">
                                        <span class="help-block" id="desSolBVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="cerrarBaja">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Dar Baja</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- col-lg-12-->
                </div><!-- /row -->
            </div>

        </div>
    </div>
</div>