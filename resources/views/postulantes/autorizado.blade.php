<div class="modal fade" id="modal_new_autorizado">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- div content --> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Nuevo Autorizado</h4>
                </div>
                <div class="modal-body">
                    <form action={{route('postulantes.store')}} class="form-horizontal" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="null">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">NOMBRE</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Ingrese un Nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">APELLIDO</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" class="form-control" placeholder="Ingrese un Apellido" required>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">DNI</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="dni" class="form-control" placeholder="Ingrese Documento" required>
                                        <span class="help-block">Solo números, sin puntos o guiones</span>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">TELEFONO</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="number_tel" class="form-control" placeholder="Ingrese Documento" required>
                                        <span class="help-block">Solo números, sin puntos o guiones</span>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">FECHA DE NACIMIENTO</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date_birth" class="form-control" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">BARRIO</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="neighborhood" class="form-control" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">DIRECCIÓN</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="info_add" class="form-control" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">TIPO DE LICENCIA</label>
                                <div class="col-sm-10">
                                   <input type="text" name="tipo_licencia" class="form-control"  required>
                                   <span class="help-block">Ej: A1, B1, A1.2-B1</span>
                                </div>
                            </div>
                </div>        
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-arrow-left"></i> Volver</button>
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>   Guardar</button>
                </div>
                </form>
            </div><!-- div content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->