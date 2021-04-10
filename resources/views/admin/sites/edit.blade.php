@foreach ($sites1 as $item)
<div class="modal fade" id="modal_site_edit_{{$item->id}}">
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
                                <form action={{route('sites.update',$item->id)}} class="form-horizontal " method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">NOMBRE DEL SITIO</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" value="{{$item->name}}" placeholder="Nombre del Sitio">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">BARRIO</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="neighborhood" class="form-control" value="{{$item->neighborhood}}" placeholder="Nombre del Barrio" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                    <div class="form-group">
                                                            <label class="col-sm-4 col-sm-4 control-label">CALLE</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="street" class="form-control" value="{{$item->street}}" placeholder="Nombre de la calle" required>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="col-sm-6">
                                                    <div class="form-group">
                                                            <label class="col-sm-4 col-sm-4 control-label">NUMERO</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="nro_house" class="form-control" value="{{$item->nro_house}}" placeholder="Numero del sitio" required>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">INFO ADICIONAL</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="info_add" class="form-control" rows="5" style="resize: none;">{{$item->info_add}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">ESTADO</label>
                                            <div class="col-sm-10">
                                                <select name="status" class="form-control">
                                                    @if($item->status == 1)
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
@endforeach