<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        @guest

        @else
        <p class="centered"><a href="#"><img src="{{asset("img/usuario_a.png")}}" class="img-circle" width="80" height=""></a></p>
        <h5 class="centered">{{ Auth::user()->username }}</h5>
        <p class="centered">
        <a href="{{route('users.show', auth::user()->id)}}" class="">
                <i class="fa fa-edit"></i> Ver Perfil
            </a>
        </p>
        <hr>                          
        <li class="sub-menu " >
            <a class="active" href="javascript:;">
                <i class="fa fa-dashboard"></i>
                <span>Administracion</span>
            </a>
            <ul class="sub">
                {{-- <li><a Class="" href="#"><i class="fa fa-circle-o"></i>Usuarios</a></li> --}}
                <li class="" ><a href={{route('instructor.index')}}><i class="fa fa-circle-o"></i> Instructores</a></li>
                <li><a Class="" href={{route('sites.index')}}><i class="fa fa-circle-o"></i> Sitios</a></li>
            </ul>
        </li>
        @endguest
            <li class="sub-menu">
                <a href="#" class="active" href="javascript:;" >
                    <i class="fa fa-building"></i>
                    <span>Curso</span>
                </a>
                <ul class="sub">
                    <li><a href={{route('courses.index')}}><i class="fa fa-circle-o"></i> Ver Cursos</a></li>
                    <li class="menu"><a type="button" data-toggle="modal" data-target="#modal_new_course" style="cursor:pointer;"><i class="fa fa-circle-o"></i> Crear Cursos</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="#" class="active" href="javascript:;" >
                    <i class="fa fa-group"></i>
                    <span>Aspirantes</span>
                </a>
                <ul class="sub">
                    <li>
                        <a type="button" data-toggle="modal" data-target="#modal_new_postulante"  style="cursor:pointer;"><i class="fa fa-circle-o"></i>Nuevo Aspirante</a>
                    </li>
                    <li>
                            <a type="button" data-toggle="modal" data-target="#modal_new_autorizado"  style="cursor:pointer;"><i class="fa fa-circle-o"></i>Nuevo Autorizado</a>
                        </li>
                    <li> 
                    <form class="form-inline" action="{{route('postulantes.index')}}" role="form" method="GET">
                        @csrf
                            <div class="form-group">
                                <a><i class="fa fa-circle-o"></i> Buscar Aspirante</a>
                            </div>
                            <div class="input-group">
                                <input type="text" name="dni" class="form-control" placeholder="Ingrese DNI" aria-label="...">
                                <div class="input-group-btn" >
                                    <button type="submit" class="btn btn-default dropdown-toggle"><i class=" fa fa-search"></i></button>
                                </div><!-- /btn-group -->
                            </div><!-- /input-group -->
                        </form>
                    </li>
                </ul>
            </li>
    </ul>
    <!-- sidebar menu end-->
</div>
