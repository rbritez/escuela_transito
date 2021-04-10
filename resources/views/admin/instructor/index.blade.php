@extends('admin.templates.main')
@section('title','Instructores ')
@section('content')
<h3><i class="fa fa-angle-right"></i> Lista de Instructores</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-sm-5">
                        <h4><i class="fa fa-angle-right"></i> Lista de Instructores</h4>
                    </div>
                    <div class="col-sm-4">
                        <form action={{route('instructor.index')}} role="search" method="GET">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                        <a href={{route('instructor.index')}} type="button" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>
                                        </div>
                                        <input type="text" name="dni" class="form-control" aria-label="..." aria-describedby="search" placeholder="Ingresar DNI" onkeypress="return event.charCode >=48 && event.charCode <= 57">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default dropdown-toggle"><i class=" fa fa-search"></i></button>
                                        </div><!-- /btn-group -->
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- / row -->
                        </form>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_new_instructor"><i class="fa fa-pencil"></i> Nuevo Instructor</button>
                    </div>
                </div>
                <section id="unseen">
                    <table id="example2" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Documento</th>
                                <th>Edad</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Telefono</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($instructors1 as $instructor)
                            <tr>
                            <td>{{$instructor->instructor_id}}</td>
                            <td>{{$instructor->name}}</td>
                            <td>{{$instructor->last_name}}</td>
                            <td>{{$instructor->dni}}</td>
                            <td>{{ $edad = floor( (time() - strtotime($instructor->date_birth)) / 31556926) }}</td>
                            <td>{{$newDate = date("d/m/Y", strtotime($instructor->date_birth))}}</td>
                            <td>{{$instructor->number_tel}}</td>
                            <td>
                                @if($instructor->status == 1)
                                Activo
                                    @else
                                Inactivo
                                @endif
                                </td>
                                    <td class="numeric">
                                            <button type="button" class="bt btn-warning" data-toggle="modal" data-target="#modal_new_instructor_edit_{{$instructor->instructor_id}}"><i class="fa fa-edit"></i>Modificar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
    @include('admin.instructor.create')
    @foreach ($instructors1 as $instructor)
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
                        <form action={{route('instructor.update',$instructor->instructor_id)}} method="POST" class="form-horizontal" >
                                    @csrf
                            <input name="_method" value="PUT" type="hidden">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">NOMBRE</label>
                                <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{$instructor->name}}" required>
                
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">APELLIDO</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" class="form-control"  value="{{$instructor->last_name}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">DNI</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="dni" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <= 57" value="{{$instructor->dni}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">FECHA DE NACIMIENTO</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="date_birth" class="form-control" value="{{$instructor->date_birth}}" required>
                                        </div>
                                    </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">TELEFONO</label>
                                <div class="col-sm-10">
                                <input type="text" name="number_tel" class="form-control" value="{{$instructor->number_tel}}" onkeypress="return event.charCode >=48 && event.charCode <= 57" required>
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
    @endforeach
@endsection