<div class="modal fade" id="modal_newlist">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- div content --> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Nuevo Aspirante</h4>
                </div>
                <div class="modal-body">
                        <form action={{route('postulantes.store')}} onsubmit="return validarAspirante()"class="form-horizontal" method="POST">
                                @csrf
                                <input type="hidden" name="course_id" value="{{$start_date->id}}">
                   
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">APELLIDO</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="last_name" name="last_name" class="form-control">
                                            <span class="help-block" id="last_name1" style="display: none"><b style="color:red">Complete este campo</b> </span>

                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">NOMBRE</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" id="name" class="form-control" >
                                            <span class="help-block" id="name1" style="display: none"><b style="color:red">Complete este campo</b> </span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">DNI</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="dni" id="dni" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <= 57">
                                                <span class="help-block" id="dni1" style="display: none"><b style="color:red">Complete este campo</b> </span>

                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">TELEFONO</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="number_tel" class="form-control" id="number_tel" onkeypress="return event.charCode >=48 && event.charCode <= 57" >
                                                <span class="help-block" id="number_tel1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">FECHA DE NACIMIENTO</label>
                                            <div class="col-sm-10">
                                                <input type="date" data-date="" data-date-format="DD MMMM YYYY" name="date_birth" class="form-control" id="date_birth">
                                                <span class="help-block" id="date_birth1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                                <span class="help-block" id="date_birth2" style="display: none"><b style="color:red">La persona NO posee la edad necesaria para adquirir licencia</b> </span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">BARRIO</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="neighborhood" class="form-control" required>
                                                <span class="help-block" id="neig_1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">DIRECCIÓN</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="info_add" class="form-control" required>
                                                <span class="help-block" id="info_add1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">TIPO DE LICENCIA</label>
                                        <div class="col-sm-10">
                                           <input type="text" name="tipo_licencia" class="form-control" id="type_licence" >
                                            <span class="help-block" id="type_licence1" style="display: none"><b style="color:red">Complete este campo</b> </span>

                                        </div>
                                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                    <button type="submit" class="btn btn-info"><i class=" fa fa-save"></i>  Guardar</button>
                </div>
                </form>
            </div><!-- div content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->