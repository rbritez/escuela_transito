@extends('admin.templates.main')
@section('title','Cursos ')
@section('content')
<h3><i class="fa fa-angle-right"></i> Informacion Completa de <b style="text-transform: capitalize">{{$postulantes->postulante->person->last_name}},{{$postulantes->postulante->person->name}}</b></h3>

<div class="row mt mb" >
    <div class="col-md-12">
        <div class="col-md-2"></div>
        <div class="col-md-8">
                <div class="col-md-2"></div>
                <section class="task-panel tasks-widget">
                    <div class="row">
                        <div class="col-sm-12">
                                <div class="panel-heading centered">
                                <div class="pull-center">
                                    <h5 style="font-size:25px; text-transform:capitalize">
                                    <b>{{$postulantes->postulante->person->name}}, {{$postulantes->postulante->person->last_name}}</b>
                                    </h5>
                                    <img src="{{asset("img/usuario_a.png")}}" class="img-circle" width="90" height="">
                                </div>
                                    <br>
                                </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel-body">
                                <div class="task-content">
                                    <ul id="sortable" class="task-list">
                                        <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">DNI: </span>
                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                        {{$postulantes->postulante->person->dni}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">FECHA DE NACIMIENTO: </span>
                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                        {{$newDate = date("d/m/Y", strtotime($postulantes->postulante->person->date_birth))}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">EDAD: </span>
                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                        {{$edad = floor( (time() - strtotime($postulantes->postulante->person->date_birth)) / 31556926) }} AÑOS
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">TELEFONO: </span>
                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                        {{$postulantes->postulante->person->number_tel}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">BARRIO: </span>
                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB;text-transform:uppercase;">
                                                        {{$postulantes->postulante->person->address->neighborhood}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">DIRECCIÓN: </span>
                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB;text-transform:uppercase;">
                                                        {{$postulantes->postulante->person->address->info_add}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">CURSÓ EL DIA: </span>
                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                        {{$start_date = date("d/m/Y", strtotime($postulantes->course->start_date))}} 
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">HORA DEL CURSO: </span>
                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                        {{$postulantes->course->time}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-primary">
                                                    <div class="task-title">
                                                        <span style="font-size:25px;">LUGAR DEL CURSO: </span>
                                                        <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB; text-transform:capitalize">
                                                            {{$postulantes->course->site->name}}
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-primary">
                                                    <div class="task-title">
                                                        <span style="font-size:25px;">TIPO DE LICENCIA: </span>
                                                        <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB; text-transform:capitalize">
                                                            {{$postulantes->postulante->tipo_licencia}}
                                                        </div>
                                                    </div>
                                                </li>
                                            <li class="list-primary">
                                                <div class="task-title">
                                                    <span style="font-size:25px;">ASISTENCIAS EN EL CURSO: </span>
                                                    <table class="pull-right">
                                                        <?php $ps= $postulantes->id; ?>
                                                        @foreach ($assistence as $item)
                                                       
                                                        <tr>
                                                            <td>
                                                                <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                    Dia {{$start_date = date("d/m/Y", strtotime($item->date_assistence))}} -
                                                                    @if ($item->assistance =="n/a")
                                                                        NO CARGADO
                                                                    @endif
                                                                    @if ($item->assistance == "P")
                                                                        PRESENTE
                                                                    @endif
                                                                    @if ($item->assistance =="A")
                                                                        AUSENTE
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    
                                                        @endforeach    
                                                    </table>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                        </div>
                    </div>
                </section>
            </div><!--/col-md-12 -->
        </div><!-- /row -->
        </div>
@endsection