<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <!-- Bootstrap core CSS -->
    <link href={{asset("assets/css/bootstrap.css")}} rel="stylesheet">
    <!--external css-->
    <link href={{asset("assets/font-awesome/css/font-awesome.css")}} rel="stylesheet" />
    
    <!-- Custom styles for this template -->
    <link href={{asset("assets/css/style.css")}} rel="stylesheet">
    <link href={{asset("assets/css/style-responsive.css")}} rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src={{asset("https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js")}}></script>
      <script src={{asset("https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js")}}></script>
    <![endif]-->
  </head>

<body onload="getTime()" >
    <div class="row">
        <div class="container">
            <div id="showtime" style="color:black;"></div>
            
                    <div class="col-sm-2 "></div>
	  			    <div class="col-sm-8 ">
	  				    <div class="lock-screen" >
		  				    <h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock" style="color:black;"></i></a></h2>
                              <p style="color:white;">Desbloquear</p>
                        </div><! --/lock-screen -->
                    </div><!-- /col-sm-4 -->
                    <div class="col-sm-2"></div>
        </div>
    </div>	
				          <!-- Modal -->
				          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				              <div class="modal-dialog">
				                  <div class="modal-content">
				                      <div class="modal-header">
				                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                          <h4 class="modal-title">Iniciar Sesion</h4>
				                      </div>
				                      <div class="modal-body">
                                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                                    @csrf
                                          <div class="row">
                                            <div class="col-sm-12">
                                            <p class="centered"><img class="img-circle" width="80" src={{asset('img/usuario_a.png')}}></p>
                                                    <label for=""></label>
                                                    <input id="login" type="login" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus placeholder="Introduce tu Email o Nombre de Usuario">
          
                                                    @if ($errors->has('login'))
                                                        <span class="help-block" role="alert">
                                                            <strong>{{ $errors->first('login') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                            <div class="col-sm-12">
                                                <label for=""></label>
                                                    <div class="form-group-sm">
                                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="********">
            
                                                            @if ($errors->has('password'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                            
                                                      </div>
                                            </div>
                                          </div>
                                      
				                      </div>
				                      <div class="modal-footer centered">
                                      <button  class="btn btn-theme04"><a style="color:white;" href="{{route('courses.index')}}">Volver</a></button>
                                          <button type="submit" class="btn btn-info">
                                                {{ __('Ingresar') }}
                                            </button>
                                      </div>
                                    </form>
				                  </div>
				              </div>
				          </div>
				          <!-- modal -->
</body>
<style>
body{
    background-image: url('img/ciudad_fsa.jpg');
    background-repeat: no-repeat;
    background-position: center; 
    
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src={{asset("assets/js/jquery.js")}}></script>
    <script src={{asset("assets/js/bootstrap.min.js")}}></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src={{asset("assets/js/jquery.backstretch.min.js")}}></script>
    <script>
        $.backstretch("img/ciudad_fsa.jpg", {speed: 500});
    </script>

    <script>
        function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('showtime').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>

  </body>
</html>
