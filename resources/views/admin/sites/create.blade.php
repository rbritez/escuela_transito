
<div class="modal fade" id="modal_new_site">
    <div class="modal-dialog">
        <div class="modal-content"> <!-- div content --> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nuevo Sitio</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                            <form action={{route('sites.store')}} class="form-horizontal " onsubmit="return validarSite()" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">NOMBRE DEL SITIO</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del Sitio">
                                            <span class="help-block" id="name1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">BARRIO</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="neighborhood" class="form-control" id="barrio" placeholder="Nombre del Barrio">
                                            <span class="help-block" id="barrio1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">CALLE</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="street" id="street"class="form-control" placeholder="Nombre de la calle">
                                                            <span class="help-block" id="street1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">NUMERO</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="nro_house" id="nro" class="form-control" placeholder="Numero del sitio">
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">INFO ADICIONAL</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="info_add" class="form-control" rows="5" style="resize: none;">Detalle la ubicacion del sitio</textarea>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Guardar</button>
            </div>
            </form>
        </div><!-- div content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
