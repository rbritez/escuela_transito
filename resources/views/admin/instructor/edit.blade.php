
<div class="modal fade" id="modal_new_instructor_edit_{{$instructor->instructor_id}}">
    <div class="modal-dialog">
        <div class="modal-content"> <!-- div content --> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Modificar Instructor</h4>
            </div>
            <div class="modal-body">
                    <form action={{route('instructor.update',[$instructor])}} method="POST" class="form-horizontal" >
                            <input name="_method" value="PUT" type="hidden">
                                @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">NOMBRE</label>
                            <div class="col-sm-10">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese un Nombre" value="{{$instructor->name}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">APELLIDO</label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" placeholder="Ingrese un Apellido" value="{{$instructor->last_name}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">DNI</label>
                                <div class="col-sm-10">
                                    <input type="text" name="dni" class="form-control" placeholder="Ingrese un Apellido" value="{{$instructor->dni}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">FECHA DE NACIMIENTO</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date_birth" class="form-control" placeholder="Ingrese un Apellido" value="{{$instructor->date_birth}}" required>
                                    </div>
                                </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">TELEFONO</label>
                            <div class="col-sm-10">
                            <input type="text" name="number_tel" class="form-control" placeholder="Ingrese un Numero de Telefono" value="{{$instructor->number_tel}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">ESTADO</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        @if($instructor->status == 1)
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                            @else
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                        @endif
                                    </select>
                                </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                <button type="submit" class="btn btn-info">Guardar Cambios</button>
            </div>
            </form>
        </div><!-- div content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

