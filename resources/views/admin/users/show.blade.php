@extends('admin.templates.main')
@section('title','Perfil ')
@section('content')
<h3><i class="fa fa-angle-right"></i>Tus Datos de Usuario</h3>

<div class="row mt mb" >
	<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-8">
				<div class="col-md-2"></div>
				<section class="task-panel tasks-widget">
					<div class="row">
						<div class="col-sm-12">
								<div class="panel-heading centered">
									<div class="pull-center"> <h5 style="font-size:25px;"><b>Tu Perfil</b></h5><img src="{{asset("img/usuario_a.png")}}" class="img-circle" width="90" height=""></div>
									<br>
								</div>
						</div>
						<div class="col-sm-12">
							<div class="panel-body">
									<div class="task-content">
										<ul id="sortable" class="task-list">
										<li class="list-primary">
												<div class="task-title">
													<span style="font-size:25px;">NOMBRE DE USUARIO: </span>
														@if ($user->username == "")
															<div class="pull-right hidden-phone" style="font-size:25px;color:red;">
																USUARIO NO INGRESADO</div>
																@else
																<div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
																{{$user->username}}</div>
														@endif
														
														{{-- <button class="btn btn-success btn-xs fa fa-check"></button>
														<button class="btn btn-primary btn-xs fa fa-pencil"></button>
														<button class="btn btn-danger btn-xs fa fa-trash-o"></button> --}}
												</div>
											</li>
											<li class="list-primary">
												<div class="task-title">
													<span style="font-size:25px;">NOMBRE: </span>
														@if ($user->name == "")
														<div class="pull-right hidden-phone" style="font-size:25px;color:red;">
															NOMBRE NO INGRESADO</div>
															@else
															<div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
															{{$user->name}}</div>
														@endif
												</div>
											</li>
											<li class="list-primary">
												<div class="task-title">
													<span style="font-size:25px;">APELLIDO: </span>
													@if ($user->last_name == "")
														<div class="pull-right hidden-phone" style="font-size:25px;color:red;">
															APELLIDO NO INGRESADO</div>
															@else
															<div class="pull-right hidden-phone" style="font-size:25px;color:#00AECB">
															{{$user->last_name}}</div>
														@endif
												</div>
											</li>
											<li class="list-primary">
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
											</li>	
										</ul>
									</div>
									<div class=" add-task-row">
											<button type="button" class="btn btn-info pull-left" data-toggle="modal" data-target="#modal_new_edit_pass"><i class="fa fa-pencil"></i> Cambiar Contraseña </button>
			
									<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal_new_edit_perfil"><i class="fa fa-pencil"></i> Editar Informacion </button>
									</div>
								</div>
						</div>
					</div>
				  
					
				</section>
			</div><!--/col-md-12 -->
		</div><!-- /row -->
		</div>
		{{-- MODAL EDIT PERFIL --}}
		@include('admin.users.edit')
		  {{-- MODAL EDIT PASS --}}
		  @include('admin.users.edit_pass')
		  
@endsection