@extends('admin.templates.main')
@section('title','Sitios ')
@section('content')
<h3><i class="fa fa-angle-right"></i> Lista de Sitios</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <div class="row">
                    <div class="col-sm-6">
                        <h4><i class="fa fa-angle-right"></i> Lista de Sitios</h4>
                    </div>
                    <div class="col-sm-4">
                            <form action={{route('sites.index')}} role="search" method="GET">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                            <a href={{route('sites.index')}} type="button" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>
                                            </div>
                                            <input type="text" name="neighborhood" class="form-control" aria-label="..." aria-describedby="search" placeholder="Ingresar Barrio" required>
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default dropdown-toggle"><i class=" fa fa-search"></i></button>
                                            </div><!-- /btn-group -->
                                        </div><!-- /input-group -->
                                    </div><!-- /.col-lg-6 -->
                                </div><!-- / row -->
                            </form>
                        </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_new_site"><i class="fa fa-pencil"></i> Nuevo Sitio </button>
                    </div>
                </div>
                <section id="unseen">
                    <table id="example2" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nombre del Sitio</th>
                                <th>Barrio</th>
                                <th>Calle</th>
                                <th>Nro de Calle</th>
                                <th>Informacion Adicional</th>
                                <th>Estado</th>
                                <th class="numeric">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sites1 as $site)
                            <tr>
                                <td>{{$site->id}}</td>
                                <td>{{$site->name}}</td>
                                <td>{{$site->neighborhood}}</td>
                                <td>{{$site->street}}</td>
                                <td>{{$site->nro_house}}</td>
                                <td>{{$site->info_add}}</td>
                                @if ($site->status == 1)
                                    <td>Activo</td>
                                @else
                                    <td>Inactivo</td>
                                @endif
                           
                                <td class="numeric">
                                <button type="button" class="bt btn-warning" data-toggle="modal" data-target="#modal_site_edit_{{$site->id}}"><i class="fa fa-edit"></i> Modificar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
   @include('admin.sites.create')
   @include('admin.sites.edit')
@endsection