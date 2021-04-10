@extends('admin.templates.main')
@section('title','Cursos ')
@section('content')
<h3><i class="fa fa-angle-right"></i> Lista de Cursos</h3>
    <div class="row mt">
        <div class="col-lg-12 col-sm-12">
            <div class="content-panel">
                <div class="row">
                        <div class="col-lg-4">
                            <h4><i class="fa fa-angle-right"></i> Lista de Cursos</h4>
                        </div>
                        
                        <div class="col-lg-6">
                            <form action={{route('courses.index')}} class="form-inline" method="GET" role="form">             
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                                    <a type="button" class="btn btn-theme btn-info" href={{route('courses.index')}}><i class="glyphicon glyphicon-refresh"></i></a>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" name="date_1"  class="form-control" >
                                                <input type="date" name="date_2" class="form-control">
                                            </div>
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-theme"><i class=" fa fa-search"></i></button>
                                            </div>
                                        </div>
                            </form>                    
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_new_course"><i class="fa fa-pencil"></i> Nuevo Curso </button>
                        </div>
                </div>
                <section id="unseen">
                    <table id="example2"class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de fin</th>
                                <th>Hora</th>
                                <th>Tipo</th>
                                <th>Instructor</th>
                                <th>Nombre del Sitio</th>
                                <th>Barrio</th>

                                <th class="numeric">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses1 as $course1)
                            <tr>
                                    <td>{{$course1->id}}</td>
                                    <td>{{$newDate = date("d/m/Y", strtotime($course1->start_date))}}</td>
                                    <td>{{$newDate2 = date("d/m/Y", strtotime($course1->finish_date))}}</td>
                                    <td>{{$course1->time}} Hr</td>
                                    <td>{{$course1->type_course}}</td>
                                    <td>{{$course1->name}} {{$course1->last_name}}</td>
                                    <td>{{$course1->lugar}}</td>
                                    <td>{{$course1->neighborhood}}</td>
                                    <td class="numeric">
                                        <button class="btn-info"><a type="button" style="color:aliceblue" href="{{route('courses.list',$course1->id)}}"><i class="glyphicon glyphicon-list-alt"></i>  Lista de Aspirantes</a></button>
                                    <button type="button" data-toggle="modal" data-target="#modal_edit_course_{{$course1->id}}"class="btn-warning"><i class="fa fa-edit"></i> Modificar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
    {{-- MODAL MODIFICAR CURSO --}}
    @foreach ($courses1 as $c)
    <div class="modal fade" id="modal_edit_course_{{$c->id}}">
            <div class="modal-dialog">
                <div class="modal-content"> <!-- div content --> 
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Nuevo Curso</h4>
                    </div>
                    <div class="modal-body">
                        <form action={{route('courses.update',[$c])}} class="form-horizontal " method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$c->id}}">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">FECHA DE INICIO</label>
                                    <div class="col-sm-10">
                                    <input type="date" name="start_date" class="form-control"  value="{{$c->start_date}}"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">FECHA DE FIN</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="finish_date" class="form-control" value="{{$c->finish_date}}"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">HORA</label>
                                    <div class="col-sm-10">
                                        <input type="time" name="time" class="form-control" value="{{$c->time}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">TIPO</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="type_course" class="form-control" value="{{$c->type_course}}" required>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">INSTRUCTOR</label>
                                    <div class="col-sm-10">
                                       <select name="instructor_id" class="form-control"  required>
                                            <option value="{{$c->instructor_id}}">{{$c->name}} {{$c->last_name}}</option>
                                            @foreach ($instructors as $instructor)
                                                @if ($instructor->id <> $c->instructor_id)
                                                @if ($instructor->status ==1)
                                                <option value="{{$instructor->id}}">{{$instructor->person->name}} {{$instructor->person->last_name}}</option>
                                                @endif
                                                @endif
                                                
                                            @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">LUGAR</label>
                                    <div class="col-sm-10">
                                        <select name="site_id" class="form-control" required>
                                        <option value="{{$c->site_id}}">{{$c->lugar}} - {{$c->neighborhood}}</option>
                                            @foreach ($sites as $site)
                                                @if ($site->id <> $c->site_id)
                                        <option value="{{$site->id}}">{{$site->name}} - {{$site->address->neighborhood}}</option>
                                                @endif
                                            @endforeach
                                        </select>
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
        @endforeach
@endsection