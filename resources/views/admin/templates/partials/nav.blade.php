<div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
  <!--logo start-->
<a href="" class="logo"><img src="{{asset('img/logo_muni_top.png')}}" title="Municipalidad de Formosa" width="70"></a>
  <!--logo end-->
    <div class="nav notify-row" id="top_menu">
      <!--  notification start -->
        <ul class="nav top-menu">
          <li>
              <div>
                  <a href="{{route('postulantes.pdf')}}" target="_blank" type="button" class="btn btn-danger pull-right" style="font-size: 12px;"><i class="glyphicon glyphicon-download-alt"></i> Inscriptos de Hoy</a>
              </div> 
          </li>
        </ul>
    </div>
  <div class="top-menu">
      <ul class="nav pull-right top-menu">
        @guest
            <li class="nav-item">
            <button type="button" class="logout" data-toggle="modal" data-target="#modal-login"><i class="fa fa-sign-in "></i> Iniciar Sesion</button> <!-- cambiar el nombre del data-target para llamar al modal -->
            {{-- <li class="nav-item">
                <a class="logout" href="{{ route('login') }}"><i class="fa fa-user "></i>  LOGIN</a>
            </li> --}}
            </li>
        @else
        <li class="nav-item">
            <a class="logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            Cerrar Sesion  <i class="fa fa-sign-out" style="font-size: 15px"></i>
            </a>
            <form id="logout-form" class="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @endguest
      </ul>
  </div>
