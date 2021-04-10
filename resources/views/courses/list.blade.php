@extends('admin.templates.main')
@section('title','Cursos ')
@section('content')
<h3>
    <i class="fa fa-angle-right"></i>
    Curso del {{$newDate = date("d/m/Y", strtotime($start_date->start_date))}} de las {{$start_date->time}}h
</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-lg-3">
                        <h4><i class="fa fa-angle-right"></i> Lista de Postulantes</h4>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-sm-6 pull-right">
                                <a href={{route('courses.pdf',$id)}} target="_blank" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-download-alt"></i> Lista para Asistencia</a>
                            </div>
                            <div class="col-sm-6 pull-left">
                                    <a href={{route('courses.lista_cargada',$id)}} target="_blank" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-download-alt"></i> Lista Cargada</a>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <form role="search" action={{route('courses.list', $id)}} method="get">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <a href={{route('courses.list',$id)}} type="button" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>
                                        </div>
                                        <input type="text" name="dni" class="form-control" aria-label="..." placeholder="Ingrese DNI" required>
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default dropdown-toggle"><i class=" fa fa-search"></i></button>
                                        </div><!-- /btn-group -->
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- / row -->
                        </form>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_newlist"><i class="fa fa-pencil"></i> Nuevo Aspirante </button>
                    </div>
                </div>
                <section id="unseen">
                        <table id="example2" class="table table-bordered table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>APELLIDO</th>
                                    <th>NOMBRE</th>
                                    <th>DNI</th>
                                    <th>EDAD</th>
                                    <th>TELEFONO</th>
                                    <th>LICENCIA SOLICITADA</th>

                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postulantes as $postulante)
                                    <tr>
                                    <td>{{$nro++}}</td>
                                    <td style="text-transform: capitalize">{{$postulante->last_name}}</td>
                                    <td style="text-transform: capitalize">{{$postulante->name}}</td>
                                    <td>{{$postulante->dni}}</td>
                                    <td>{{$edad = floor( (time() - strtotime($postulante->date_birth)) / 31556926) }}</td>
                                    <td>{{$postulante->number_tel}}</td>
                                    <td>{{$postulante->tipo_licencia}}</td>
                                    <td>
                                        <button class="btn-info"><a href={{route('postulantes.show',$postulante->cxp_id)}} class=" btn-info" type="button"><i class="glyphicon glyphicon-share"></i> Ver Info Completa</a></button>
                                        <button type="button" class="btn-success" data-toggle="modal" data-target="#modal_new_assistence_{{$postulante->id}}"><i class="glyphicon glyphicon-calendar"></i> Asistencias</button>
                                        <button type="button" class="btn-primary" data-toggle="modal" data-target="#modal_new_teorico_{{$postulante->id}}"><i class="glyphicon glyphicon-list"></i> Cod. Examen</button>
                                        {{-- <button type=""><i class="fa fa-car"></i> Cargar Practico</button> --}}
                                    <button type="button" class="btn-warning" data-toggle="modal" data-target="#modal_edit_postulante_{{$postulante->id}}" ><i class="fa fa-edit"></i> Modificar</button>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </section>
                </div>
            </div>
        </div>
    @include('courses.newlist')
    @foreach ($postulantes as $postulante)<!-- MODAL ASISTENCIAS -->
    <div class="modal fade" id="modal_new_teorico_{{$postulante->id}}">
            <div class="modal-dialog">
                <div class="modal-content"> <!-- div content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <h4 class="modal-title">EXAMEN TEORICO de <b>{{$postulante->name}},{{$postulante->last_name}}</b></h4>
                    </div>
                    <div class="modal-body">
                        <form action={{(route('postulantes.codigo',['id'=> $postulante->id]))}} class="form-horizontal" method="POST">
                             @csrf

                            <input type="hidden" name="course_id" value="{{$id}}">
                            <input type="hidden" value="PUT" name="_method">
                            <input type="hidden" value="{{$postulante->id}}" name="id">

                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">CODIGO DE EXAMEN</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="codigo_teorico"  value="{{$postulante->codigo_teorico}}"class="form-control" >
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

    @foreach ($postulantes as $postulante)<!-- MODAL ASISTENCIAS -->
    <div class="modal fade" id="modal_new_assistence_{{$postulante->id}}">
            <div class="modal-dialog">
                <div class="modal-content"> <!-- div content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <h4 class="modal-title">Asistencia de <b>{{$postulante->name}}, {{$postulante->last_name}}</b></h4>
                    </div>
                    <div class="modal-body">
                        <form action={{(route('assistences.update',['id'=> $postulante->cxp_id]))}} class="form-horizontal" method="POST">
                             @csrf
                        @foreach ($assistences as $item1)
                            @if ($postulante->id == $item1->postulante_id)
                            <input type="hidden" name="course_id" value="{{$id}}">
                            <input type="hidden" value="PUT" name="_method">
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">DIA {{$date_ass = date("d/m/Y", strtotime($item1->date_assistence))}}</label>
                                            <div class="col-sm-8">
                                                <select name="assistances[{{$item1->id}}]"  class="form-control" required>
                                                    @if ($item1->assistance =="n/a")
                                                        <option value="">{{$item1->assistance}}</option>
                                                        <option value="P">PRESENTE</option>
                                                        <option value="A">AUSENTE</option>
                                                    @endif
                                                    @if ($item1->assistance <>"n/a")
                                                        @if ($item1->assistance == "P")
                                                            <option value="{{$item1->assistance}}">PRESENTE</option>
                                                            <option value="A">AUSENTE</option>
                                                        @endif
                                                        @if ($item1->assistance=="A")
                                                            <option value="{{$item1->assistance}}">AUSENTE</option>
                                                            <option value="P">PRESENTE</option>
                                                        @endif
                                                    @endif
                                                </select>
                                            </div>
                                    </div>
                                @endif
                        @endforeach
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
    @foreach ($postulantes as $postulante)<!-- MODAL EDIT POSTULANTE -->
    <div class="modal fade" id="modal_edit_postulante_{{$postulante->id}}">
            <div class="modal-dialog">
                <div class="modal-content"> <!-- div content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <h4 class="modal-title">Asistencia de <b>{{$postulante->name}}, {{$postulante->last_name}}</b></h4>
                    </div>
                    <div class="modal-body">
                        <form action={{(route('postulantes.update',[$postulante]))}} class="form-horizontal" method="POST">
                             @csrf
                            <input type="hidden" name="id" value="{{$postulante->id}}">
                            <input type="hidden" name="course_id" value="{{$id}}">
                        <input type="hidden" name="cxp_id" value="{{$postulante->cxp_id}}">
                            <input type="hidden" value="PUT" name="_method">
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">NOMBRE</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" value="{{$postulante->name}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">APELLIDO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="last_name" value="{{$postulante->last_name}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">DNI</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="dni" value="{{$postulante->dni}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">FECHA NACIMIENTO</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="date_birth" value="{{$date_ass = date("Y-m-d", strtotime($postulante->date_birth))}}" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">TELEFONO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="number_tel" value="{{$postulante->number_tel}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">BARRIO</label>
                                        <div class="col-sm-8">
                                        <input type="text" name="neighborhood" class="form-control" value="{{$postulante->neighborhood}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">DIRECCIÓN</label>
                                        <div class="col-sm-8">
                                        <input type="text" name="info_add" class="form-control" value="{{$postulante->info_add}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">TIPO LICENCIA</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="tipo_licencia" value="{{$postulante->tipo_licencia}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">CAMBIAR DE CURSO</label>
                                        <div class="col-sm-8">
                                            <select name="course_id" class="form-control"  required>


                                                @foreach ($courses as $courseitem)
                                                    @if ($courseitem->id == $id)
                                                        <option value="{{$courseitem->id}}">{{$newDate1 = date("d/m/Y", strtotime($courseitem->start_date))}} {{$courseitem->time}} - {{$courseitem->site->name}} - {{$courseitem->type_course}}</option>
                                                    @endif
                                                    @if ($course_date = strtotime($courseitem->start_date) > $newDate = strtotime($date_now))
                                                        @if ($courseitem->id <> $id)
                                                        <option value="{{$courseitem->id}}">{{$newDate1 = date("d/m/Y", strtotime($courseitem->start_date))}} {{$courseitem->time}} - {{$courseitem->site->name}} - {{$courseitem->type_course}}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
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

@endsection
