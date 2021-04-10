<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap core CSS -->
     <link href={{asset("assets/css/bootstrap.css")}} rel="stylesheet">
     <!--external css-->
     <link href={{asset("assets/font-awesome/css/font-awesome.css")}} rel="stylesheet"/>
     <!-- Custom styles for this template -->
     <link href={{asset("assets/css/style.css")}} rel="stylesheet">
     <link href={{asset("assets/css/style-responsive.css")}} rel="stylesheet">
     <link rel="stylesheet" href="{{asset('assets/css/to-do.css')}}">
     <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
       <script src={{asset("https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js")}}></script>
       <script src={{asset("https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js")}}></script>
     <![endif]-->
    <title>@yield('title', '')| Panel de Administración</title>
</head>
<body>

        <section id="container" >

            <header class="header black-bg">
                @include('admin.templates.partials.nav')

            </header>
            <aside>
                @include('admin.templates.partials.sidebar')
            </aside>

            <section id="main-content">
                <section class="wrapper">
                        @include('flash::message')

                        @yield('content')
                </section>
{{-- MODAL LOGIN--}}
            @include('admin.templates.partials.modals.login')
{{-- MODAL NUEVO CURSO --}}
            @include('courses.create')
{{-- MODAL NUEVO ASPIRANTE --}}
            @include('postulantes.create')
{{-- MODAL NUEVO AUTORIZADO --}}
            @include('postulantes.autorizado')
{{-- MODAL EXAMEN PRACTICO --}}
    @include('admin.templates.partials.modals.exam_p')
            </section>

    <footer class="site-footer">
        @include('admin.templates.partials.footer')
    </footer>

        </section>
    <style>
        table th,td{
            text-align: center;
        }
    </style>
<!-- js placed at the end of the document so the pages load faster -->
<!-- js placed at the end of the document so the pages load faster -->
<script src={{asset("assets/js/jquery.js")}}></script>
<script src={{asset("assets/js/jquery-1.8.3.min.js")}}></script>
<script src={{asset("assets/js/bootstrap.min.js")}}></script>
<script class="include" type="text/javascript" src={{asset("assets/js/jquery.dcjqaccordion.2.7.js")}}></script>
<script src={{asset("assets/js/jquery.scrollTo.min.js")}}></script>
<script src={{asset("assets/js/jquery.nicescroll.js")}} type="text/javascript"></script>
<script src={{asset("assets/js/jquery.sparkline.js")}}></script>

<script src={{asset("assets/js/common-scripts.js")}}></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script><script src={{asset("assets/js/tasks.js")}} type="text/javascript"></script>
<script type="text/javascript" src={{asset("assets/js/gritter/js/jquery.gritter.js")}}></script>
<script type="text/javascript" src={{asset("assets/js/gritter-conf.js")}}></script>
<script src={{asset("assets/js/sparkline-chart.js")}}></script>
<script src={{asset("assets/js/zabuto_calendar.js")}}></script>
<!-- DataTables -->
<script src={{asset("assets/datatables.net/js/jquery.dataTables.min.js")}}></script>
<script src={{asset("assets/datatables.net-bs/js/dataTables.bootstrap.min.js")}}></script>
<script>
        $(function () {
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
      </script>
<script>
        jQuery(document).ready(function() {
            TaskList.initTaskWidget();
        });

        $(function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();
        });

      </script>

    <!--script for this page-->
    <script src={{asset("assets/js/sparkline-chart.js")}}></script>
	<script src={{asset("assets/js/zabuto_calendar.js")}}></script>

	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
    {{-- UNLOCK --}}
    <script type="text/javascript" src={{asset("assets/js/jquery.backstretch.min.js")}}></script>
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
    <script type="text/javascript">
    function validarAspirante(){

        var name = document.getElementById("name").value;
        var last_name = document.getElementById("last_name").value;
        var dni = document.getElementById("dni").value;
        var number_tel = document.getElementById("number_tel").value;
        var date_birth = document.getElementById("date_birth").value;
        var type_licence = document.getElementById("type_licence").value;
        var hoy = new Date();
        hoy.setHours(0,0,0,0);

        if(name.length == 0 ){
            document.getElementById("name1").style.display = "block";
            return false;
        }
        if(last_name.length == 0 ){
            document.getElementById("name1").style.display = "none";
            document.getElementById("last_name1").style.display = "block";
            return false;
        }
        if(dni.length == 0){
            document.getElementById("name1").style.display = "none";
            document.getElementById("last_name1").style.display ="none";
            document.getElementById("dni1").style.display = "block";
            return false;
        }
        if(number_tel == 0){
            document.getElementById("name1").style.display = "none";
            document.getElementById("last_name1").style.display ="none";
            document.getElementById("dni1").style.display = "none";
            document.getElementById("number_tel1").style.display = "block";
            return false;
        }
        if(date_birth == 0){
            document.getElementById("name1").style.display = "none";
            document.getElementById("last_name1").style.display ="none";
            document.getElementById("dni1").style.display = "none";
            document.getElementById("number_tel1").style.display = "none";
            document.getElementById("date_birth1").style.display = "block";
            return false;
        }
        mayor = hoy.setMonth(hoy.getMonth() - 192);
        fecham = new Date(mayor);
        fechain = new Date(date_birth);

        if(fechain > fecham){
            document.getElementById("name1").style.display = "none";
            document.getElementById("last_name1").style.display ="none";
            document.getElementById("dni1").style.display = "none";
            document.getElementById("number_tel1").style.display = "none";
            document.getElementById("date_birth1").style.display = "none";
            document.getElementById("date_birth2").style.display = "block";
            return false;
        }
        if(type_licence == 0){
            document.getElementById("name1").style.display = "none";
            document.getElementById("last_name1").style.display ="none";
            document.getElementById("dni1").style.display = "none";
            document.getElementById("number_tel1").style.display = "none";
            document.getElementById("date_birth1").style.display = "none";
            document.getElementById("type_licence1").style.display = "block";
            document.getElementById("date_birth2").style.display = "none";
            return false;
        }
        return true;
    }
        function validarSite(){
            var name = document.getElementById("name").value;
            var barrio = document.getElementById("barrio").value;
            var street = document.getElementById("street").value;
            if(name.length == 0 ){
                document.getElementById("name1").style.display = "block";
                return false;
               }
            if(barrio.length == 0 ){
            document.getElementById("name1").style.display = "none";
            document.getElementById("barrio1").style.display = "block";
            return false;
            }
            if(street.length == 0 ){
            document.getElementById("name1").style.display = "none";
            document.getElementById("barrio1").style.display = "none";
            document.getElementById("street1").style.display = "block";
            return false;
            }
            return true;
        }
        function validarInstructor(){
            var name = document.getElementById("name").value;
            var last_name = document.getElementById("last_name").value;
            var dni = document.getElementById("dni").value;
            var date_birth = document.getElementById("date_birth").value;
            var number_tel = document.getElementById("number_tel").value;
            var hoy = new Date();
            var fechaNac = new Date(date_birth);
            var mayor = 0;
            hoy.setHours(0,0,0,0);

            mayor = date_birth.setMonth(date_birth.getMonth() - 17);
            console.log(date_birth);
            return false;

            if(name.length == 0 ){
                document.getElementById("name1").style.display = "block";
                return false;
               }
            if(last_name.length == 0 ){
                document.getElementById("name1").style.display = "none";
                document.getElementById("last_name1").style.display = "block";
                return false;
               }
            if(dni.length == 0 ){
                document.getElementById("name1").style.display = "none";
                document.getElementById("last_name1").style.display = "none";
                document.getElementById("dni1").style.display = "block";
                return false;
                }
            if(date_birth.length == 0 ){
                document.getElementById("name1").style.display = "none";
                document.getElementById("last_name1").style.display = "none";
                document.getElementById("dni1").style.display = "none";
                document.getElementById("date_birth1").style.display = "block";
                return false;
                }
            if(fechaNac > hoy ){
                document.getElementById("name1").style.display = "none";
                document.getElementById("last_name1").style.display = "none";
                document.getElementById("dni1").style.display = "none";
                document.getElementById("date_birth1").style.display = "none";
                document.getElementById("date_birth2").style.display = "block";
                return false;
                }
            if(number_tel.length == 0 ){
                document.getElementById("name1").style.display = "none";
                document.getElementById("last_name1").style.display = "none";
                document.getElementById("dni1").style.display = "none";
                document.getElementById("date_birth1").style.display = "none";
                document.getElementById("date_birth2").style.display = "none";
                document.getElementById("number_tel1").style.display = "block";

                return false;
                }
                return true;
        }
        function vN(event){
            if(event.charCode >= 48 && event.charCode <= 57){
                return true;
            }

        }

        function Validaruser(){
                var name = document.getElementById("name").value;
                var last_name = document.getElementById("last_name").value;
                var username = document.getElementById("username").value;
                var email = document.getElementById("email").value;
                var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                if(name.length == 0 ){

                    document.getElementById("name1").style.display = "block";
                    return false;
                }
                if(last_name.length == 0 ){
                    document.getElementById("name1").style.display = "none";
                    document.getElementById("last_name1").style.display = "block";

                    return false;
                }
                if(username.length == 0 ){
                    document.getElementById("last_name1").style.display = "none";
                    document.getElementById("username1").style.display = "block";

                    return false;
                }
                if(email.length == 0 ){
                    document.getElementById("username1").style.display = "none";
                    document.getElementById("email1").style.display = "block";

                    return false;
                }
                if(emailRegex.test(email)){
                    } else {
                    document.getElementById("email1").style.display = "none";
                    document.getElementById("email2").style.display = "block";
                    return false;
                }
                return true;
            }
    </script>
    {{-- VALIDAR PASSWORD --}}
    <script type="text/javascript">
            function ValidarPasswd(){
                var p1 = document.getElementById("ps1").value;
                var p2 = document.getElementById("ps2").value;
                var p0 = document.getElementById("pas").value;

                if(p0.length ==0 ){
                    document.getElementById("pas0").style.display = "block";
                    return false;
                }
                if(p1.length == 0 ){
                    document.getElementById("pas0").style.display = "none";
                    document.getElementById("pas111").style.display = "block";

                    return false;
                }
                if(p1.length < 6 ){
                    document.getElementById("pas111").style.display = "none";
                    document.getElementById("pas11").style.display = "block";

                    return false;
                }
                // VALIDAR CAMPOS IGUALES
                if(p1 != p2){
                    document.getElementById("pas111").style.display = "none";
                    document.getElementById("pas11").style.display = "none";
                    document.getElementById("pas2").style.display = "block";
                    document.getElementById("pas1").style.display = "block";
                    return false;
                }else{
                    document.getElementById("pas2").style.display = "none";
                    document.getElementById("pas1").style.display = "none";
                    return true;
                }
            }
        </script>
        <script type="text/javascript">
            function Validarcourse(){
                var hoy = new Date();
                hoy.setHours(0,0,0,0);
                var start_date = document.getElementById("start_date").value;
                var finish_date = document.getElementById("finish_date").value;
                var time = document.getElementById("time").value;
                var instructor = document.getElementById("instructor").value;
                var site = document.getElementById("site").value;
                var type_course = document.getElementById("type_course").value;
                console.log(hoy);
                var fechaInicio = new Date(start_date);
                var fechaFin = new Date(finish_date);

                if(start_date.length ==0 ){
                    document.getElementById("start_date1").style.display = "block";
                    return false;
                }
                if(fechaInicio < hoy ){
                    document.getElementById("start_date1").style.display = "none";
                    document.getElementById("start_date2").style.display = "block";
                    return false;
                }
                if(finish_date.length == 0 ){
                    document.getElementById("start_date1").style.display = "none";
                    document.getElementById("start_date2").style.display = "none";
                    document.getElementById("finish_date1").style.display = "block";
                    return false;
                }
                if(fechaInicio >= fechaFin){
                    document.getElementById("start_date1").style.display = "none";
                    document.getElementById("start_date2").style.display = "none";
                    document.getElementById("finish_date1").style.display = "none";
                    document.getElementById("finish_date2").style.display = "block";

                    return false;
                }
                if(time.length == 0){
                    document.getElementById("start_date1").style.display = "none";
                    document.getElementById("start_date2").style.display = "none";
                    document.getElementById("finish_date1").style.display = "none";
                    document.getElementById("finish_date2").style.display = "none";
                    document.getElementById("time1").style.display = "block";
                    return false;
                }
                if(instructor.length == 0){
                    document.getElementById("start_date1").style.display = "none";
                    document.getElementById("start_date2").style.display = "none";
                    document.getElementById("finish_date1").style.display = "none";
                    document.getElementById("finish_date2").style.display = "none";
                    document.getElementById("time1").style.display = "none";
                    document.getElementById("instructor1").style.display = "block";
                    return false;
                }
                if(site.length == 0){
                    document.getElementById("start_date1").style.display = "none";
                    document.getElementById("start_date2").style.display = "none";
                    document.getElementById("finish_date1").style.display = "none";
                    document.getElementById("finish_date2").style.display = "none";
                    document.getElementById("time1").style.display = "none";
                    document.getElementById("instructor1").style.display = "none";
                    document.getElementById("site1").style.display = "block";
                    return false;
                }
                if(type_course.length == 0){
                    document.getElementById("start_date1").style.display = "none";
                    document.getElementById("start_date2").style.display = "none";
                    document.getElementById("finish_date1").style.display = "none";
                    document.getElementById("finish_date2").style.display = "none";
                    document.getElementById("time1").style.display = "none";
                    document.getElementById("instructor1").style.display = "none";
                    document.getElementById("site1").style.display = "none";
                    document.getElementById("type_course1").style.display = "block";
                    return false;
                }
                console.log(site);
            }
        </script>

</body>
</html>
