<div class="modal fade" id="modal_new_edit_pass">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- div content --> 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Editar Contraseña</h4>
                </div>
                <div class="modal-body">
                    <form action={{route('users.updatePass',$user)}} onsubmit="return ValidarPasswd()" name="form_pass" class="form-horizontal " method="POST">
                            <input name="_method" value="PUT" type="hidden">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Contraseña Actual</label>
                                <div class="col-sm-10">
                                    <input id="pas" type="password" class="form-control" name="psa">
                                    <span class="help-block" id="pas0" style="display: none"><b style="color:red"> Complete este campo</b></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Contraseña Nueva</label>
                                <div class="col-sm-10">
                                    <input type="password" name="ps1" id="ps1" class="form-control" placeholder="********" >
                                    <span class="help-block" id="pas1" style="display: none"><b style="color:red"> Las Contraseñas no coinciden</b></span>
                                    <span class="help-block" id="pas11" style="display: none"><b style="color:red">Minimo 6 caracteres</b> </span>
                                    <span class="help-block" id="pas111" style="display: none"><b style="color:red">Complete este campo</b> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Confirmar Contraseña</label>
                                <div class="col-sm-10">
                                    <input type="password" id="ps2" name="ps2" class="form-control" placeholder="********">
                                    <span class="help-block" id="pas2" style="display: none"><b style="color:red"> Las Contraseñas no coinciden</b></span>
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
    