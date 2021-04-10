@extends('admin.templates.main')
@section('title','Cursos ')
@section('content')
    @if ($total_result == "")
    <h3><i class="fa fa-angle-right"></i> Resultados NO encontrados</h3>
    @else
    <h3><i class="fa fa-angle-right"></i> Resultados Encontrados ({{$total_result}})</h3>
    @foreach ($aspirante as $as)
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
                                            <b>{{$as->nombre}}, {{$as->last_name}}</b>
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
                                                                {{$as->dni}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">FECHA DE NACIMIENTO: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                {{$newDate = date("d/m/Y", strtotime($as->date_birth))}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">EDAD: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                {{$edad = floor( (time() - strtotime($as->date_birth)) / 31556926) }} AÑOS
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">TELEFONO: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                {{$as->number_tel}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">BARRIO: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB;text-transform:uppercase">
                                                                {{$as->neighborhood}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">DIRECCIÓN: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB; text-transform:uppercase">
                                                                {{$as->info_add}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                    @if ($as->start_date == null)
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;"> CURSO  <span style="color:red">NO REALIZADO</span>: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                ASPIRANTE TIPO AUTORIZADO
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;"> FECHA DE TRAMITE: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                {{$newDate = date("d/m/Y", strtotime($as->created_at))}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">TIPO DE LICENCIA: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB; text-transform:capitalize">
                                                                {{$as->tipo_licencia}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @else
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">CURSÓ EL DIA: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                {{$start_date = date("d/m/Y", strtotime($as->start_date))}} 
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">HORA DEL CURSO: </span>
                                                            <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                {{$as->time}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-primary">
                                                            <div class="task-title">
                                                                <span style="font-size:25px;">LUGAR DEL CURSO: </span>
                                                                <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB; text-transform:capitalize">
                                                                    {{$as->lugar}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-primary">
                                                            <div class="task-title">
                                                                <span style="font-size:25px;">TIPO DE LICENCIA: </span>
                                                                <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB; text-transform:capitalize">
                                                                    {{$as->tipo_licencia}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">ASISTENCIAS EN EL CURSO: </span>
                                                            <table class="pull-right">
                                                                <?php $ps= $as->id; ?>
                                                                @foreach ($assistences as $item)
                                                                @if ($item->id == $as->id)
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
                                                                @endif
                                                                @endforeach    
                                                            </table>
                                                        </div>
                                                    </li>
                                                    @endif
                                                 

                                                    {{-- <li class="list-primary">
                                                        <div class="task-title">
                                                            <span style="font-size:25px;">CORREO ELECTRONICO: </span>
                                                            @if ($user->email == "")
                                                                <div class="pull-right hidden-phone" style="font-size:25px;color:red;">
                                                                    CORREO NO INGRESADO</div>
                                                                    @else
                                                                    <div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
                                                                    {{$user->email}}</div>
                                                                @endif
                                                        </div>
                                                    </li>	 --}}
                                                </ul>
                                            </div>
                                </div>
                            </div>
                        </section>
                    </div><!--/col-md-12 -->
                </div><!-- /row -->
                </div>
        @endforeach
    @endif
@endsection