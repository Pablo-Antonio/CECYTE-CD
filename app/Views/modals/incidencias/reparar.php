<!-- Modal -->
<div class="modal fade" id="mdlReparar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-theme03">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Reparar Equipo</h4>
            </div>
            <div class="modal-body">
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <form class="form-horizontal style-form" id="formReparar" autocomplete="off">

                                <input type="hidden" id="hddRe">

                                <div id="divFolio" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio Prestamo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewFolioPR" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div id="divNomEqui" class="form-group ">
                                    <label class="col-sm-2 col-sm-2 control-label">Folio Equipo: </label>
                                    <div class="col-sm-10">
                                        <p id="viewFolioER" style="font-weight: bold"></p>
                                    </div>
                                </div>

                                <div id="divDateReparar" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Fecha Reparacion: </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control round-form" id="dateRep" name="dateRep">
                                        <span class="help-block" id="dateRepVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div id="divDesReparacion" class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Descripcion: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-form" id="desSolucion" name="desSolucion">
                                        <span class="help-block" id="desRepVal">Campo Requerido</span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="cerrarReparar">Cancelar</button>
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