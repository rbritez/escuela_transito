<div class="modal fade" id="modal_new_instructor">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- div content --> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Nuevo Instructor</h4>
                </div>
                <div class="modal-body">
                    <form action={{route('instructor.store')}} class="form-horizontal" onsubmit="return validarInstructor()" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">NOMBRE</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese un Nombre">
                                    <span class="help-block" id="name1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">APELLIDO</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Ingrese un Apellido">
                                    <span class="help-block" id="last_name1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">DNI</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="dni" id="dni" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <= 57" placeholder="Ingrese DNI" >
                                        <span class="help-block">Solo Números, Sin Puntos o guiones</span>
                                        <span class="help-block" id="dni1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                        <span class="help-block" id="dni1" style="display: none"><b style="color:red">Solo se permite números</b> </span>

                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">FECHA DE NACIMIENTO</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="date_birth" id="date_birth" class="form-control">
                                            <span class="help-block" id="date_birth1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                            <span class="help-block" id="date_birth2" style="display: none"><b style="color:red">Fecha ingresada invalida</b> </span>
                                        </div>
                                    </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">TELEFONO</label>
                                <div class="col-sm-10">
                                    <input type="text" name="number_tel" id="number_tel" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <= 57" placeholder="Ingrese un Numero de Telefono" >
                                    <span class="help-block">Solo números, sin puntos o guiones</span>
                                    <span class="help-block" id="number_tel1" style="display: none"><b style="color:red">Complete este campo</b> </span>
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