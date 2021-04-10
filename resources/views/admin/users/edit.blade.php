<div class="modal fade" id="modal_new_edit_perfil">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- div content --> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Editar Datos</h4>
                </div>
                <div class="modal-body">
                <form action={{route('users.update',$user)}} method="POST" onsubmit="return Validaruser()" class="form-horizontal" >
                    <input name="_method" value="PUT" type="hidden">
                        @csrf
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                                    <span class="help-block" id="name1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{$user->last_name}}">
                                    <span class="help-block" id="last_name1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nombre de Usuario</label>
                                <div class="col-sm-10">
                                <input type="text" name="username" id="username" value="{{$user->username}}" class="form-control">
                                <span class="help-block" id="username1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Correo Electronico</label>
                                <div class="col-sm-10">
                                   <input type="text" value="{{$user->email}}" id="email" name="email" class="form-control">
                                   <span class="help-block" id="email2" style="display: none"><b style="color:red">Email invalido</b> </span>
                                   <span class="help-block" id="email1" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                    <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                </div>
                </form>
            </div><!-- div content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->