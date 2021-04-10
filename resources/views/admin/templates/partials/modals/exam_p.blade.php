<div class="modal fade" id="modal_new_exam_p">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- div content --> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Cargar Examen Practico</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal " method="get">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">FECHA DE EXAMEN</label>
                                <div class="col-sm-10">
                                    <input type="date" name="folio" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                                <label class="col-sm-4 col-sm-4 control-label">FOLIO</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="folio" class="form-control" required>
                                                </div>
                                            </div>
                                </div>
                                <div class="col-sm-6">
                                        <div class="form-group">
                                                <label class="col-sm-4 col-sm-4 control-label">LIBRO</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="last_name" class="form-control" required>
                                                </div>
                                            </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">APARTADO</label>
                                <div class="col-sm-10">
                                    <input type="time" name="time" class="form-control"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">TIPO DE VEHICULO</label>
                                <div class="col-sm-10">
                                   <input type="text" name="vehiculo" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label class="col-sm-4 col-sm-4 control-label">MARCA</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="folio" class="form-control" required>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label class="col-sm-4 col-sm-4 control-label">PATENTE</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="last_name" class="form-control" required>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                    <button type="submit" class="btn btn-info">Crear</button>
                </div>
                </form>
            </div><!-- div content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->