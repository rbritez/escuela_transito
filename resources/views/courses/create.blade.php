<div class="modal fade" id="modal_new_course">
    <div class="modal-dialog">
        <div class="modal-content"> <!-- div content -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nuevo Curso</h4>
            </div>
            <div class="modal-body">
                <form action={{route('courses.store')}} class="form-horizontal" onsubmit="return Validarcourse()" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">FECHA DE INICIO</label>
                            <div class="col-sm-10">
                                <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Ingrese un Nombre" >
                                <span class="help-block" id="start_date1" style="display: none"><b style="color:red">Complete este Campo</b></span>
                                <span class="help-block" id="start_date2" style="display: none"><b style="color:red">La fecha debe ser Mayor a la Actual</b></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">FECHA DE FIN</label>
                            <div class="col-sm-10">
                                <input type="date" name="finish_date" id="finish_date" class="form-control" placeholder="Ingrese un Apellido">
                                <span class="help-block" id="finish_date1" style="display: none"><b style="color:red">Complete este Campo</b></span>
                                <span class="help-block" id="finish_date2" style="display: none"><b style="color:red">La fecha debe ser Mayor a la Fecha de Inicio</b></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">HORA</label>
                            <div class="col-sm-10">
                                <input type="time" name="time" id="time" class="form-control">
                                <span class="help-block" id="time1" style="display: none"><b style="color:red">Complete este Campo</b></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">INSTRUCTOR</label>
                            <div class="col-sm-10">
                               <select name="instructor_id" id="instructor" class="form-control" >
                                   <option value="">Seleccionar..</option>
                                    @foreach ($instructors as $instructor)
                                        @if ($instructor->status == 1)
                                        <option value="{{$instructor->id}}">{{$instructor->person->name}} {{$instructor->person->last_name}}</option>
                                        @endif
                                    @endforeach
                               </select>
                               <span class="help-block" id="instructor1" style="display: none"><b style="color:red">Complete este Campo</b></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">LUGAR</label>
                            <div class="col-sm-10">
                                <select name="site_id" id="site" class="form-control" >
                                    <option value="">Seleccionar..</option>
                                    @foreach ($sites as $site)
                                    @if ($site->status == 1)
                                        <option value="{{$site->id}}">{{$site->name}} - {{$site->address->neighborhood}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <span class="help-block" id="site1" style="display: none"><b style="color:red">Complete este Campo</b></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">TIPO DE CURSO</label>
                            <div class="col-sm-10">
                                <input type="text" name="type_course" id="type_course" class="form-control">
                                <span class="help-block" id="site1" style="display: none"><b style="color:red">Complete este Campo</b></span>
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
