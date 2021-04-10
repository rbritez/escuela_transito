<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Lista de Aspirantes-({{$date}})</title>
<style>
    @page {
            margin-top: 3.5em;
            margin-left: 2.5em;
            margin-bottom: 5.5em;
        }
    .autor{
        color:lightsteelblue;
        font-family: Garamond;
        font-style:italic
    }
 .title_1{
     font-size: 28px;
     text-align:center;
     border: solid darkgrey 6px;
     padding: 20px;
 }
 .title_1 b{
     font-size: 20px;
     font-weight: lighter;
 }
 .img_logo{
    width: 70px;
    top: -13px;
    position: absolute;
 }
.img_muni{
    position: absolute;
    top: 48px;
    width: 50px;
    right: 45px;
}
 table thead{
    border: black;
    background-color:lightblue;
    border-top-width: 3px;
    border-right-width: 3px;
    border-bottom-width: 3px;
    border-left-width: 3px;
 }
 table tbody td{
     text-transform: capitalize;
 }
</style>
</head>
<body>
    <small class="autor">Autor: Gerardo Britez - A.S</small>
    <div class="title_1">
        <div class="img_logo">
        <img src="{{asset('img/escuela_conductores.png')}}" width="90px" alt="50" sizes="50" srcset="">
        </div>
        <div class="img_muni">
            <img src="{{asset('img/logo_muni_top.png')}}" width="105px" alt="50" sizes="50" srcset="">
        </div>
        <strong>ESCUELA DE CONDUCTORES</strong><br>
            <b>Lista de Aspirantes {{$date}}</b>
    </div>
 
    <table align="center" border="1" width="100%">
        <thead align="center">
                <tr>
                        <td>APELLIDOS</td>
                        <td>NOMBRES</td>
                        <td>DNI</td>
                        <td>TELEFONO</td>
                        <td>BARRIO</td>
                        <td>DIRECCIÓN</td>
                        <td>AUTORIZADO</td>
                </tr>
        </thead>
        <tbody align="center">
                    @foreach($aspirantes as $item)
                    <tr>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->dni}}</td>
                    <td>{{$item->number_tel}}</td>
                    <td>{{$item->neighborhood}}</td>
                    <td>{{$item->info_add}}</td>
                    <td>{{$item->autorizado}}</td>
                    </tr>
                    @endforeach
        </tbody>
       
    </table>
    
</body>
<script type="text/php">
    if ( isset($pdf) ) {

        $x = 260;
        $y = 780;
        $text = "Pagína {PAGE_NUM} de {PAGE_COUNT}";
        $font = $fontMetrics->get_font("Arial", "bold");
        $size = 12;
        $color = array(0,0,0);
        $word_space = 0.0;  // default
        $char_space = 0.0;  // default
        $angle = 0.0;   // default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
       
    }
</script> 
</html>