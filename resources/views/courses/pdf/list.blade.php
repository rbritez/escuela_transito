<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTA DE POSTULANTE POR CURSO</title>
    <style>
        @page {
            margin-top: 3.5em;
            margin-left: 2.5em;
            margin-bottom: 5.5em;
        }
        table{
            font-size: 12px;
        }
        table td{
            text-transform: capitalize;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <table align="center" width="100%">
                    <tr>
                        <td>
                        <img src="{{asset('img/logo_transito_pdf.png')}}" width="45" height="70">
                        </td>
                        <td>
                                MUNICIPALIDAD DE LA CIUDAD DE FORMOSA<br>
                                DIRECCIÓN DE TRÁNSIO<br>
                                ESCUELA DE CONDUCTORES
                        </td>
                        <td>
                                SALA: "A" <br>
                                CLASE: {{$course->type_course}}<br>
                                HORA: {{$course->time}}
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            LUGAR: {{$course->site->name}}
                        </td>
                        <td>
                            INICIA: {{$newDate1 = date("d/m/Y", strtotime($course->start_date))}}
                        </td>
                        <td>
                            FINALIZA: {{$newDate2 = date("d/m/Y", strtotime($course->finish_date))}}
                        </td>
                    </tr>
                </table>
    </div>
    </header>
    <section>
            <table align="center" border="1" width="100%">
                    <thead align="center">
                        <tr>
                            <th>N°</th>
                            <th>APELLIDOS</th>
                            <th>NOMBRES</th>
                            <th>DNI</th>
                            <th>N° TELEFONO</th>
                            <th COLSPAN={{$nro}}>ASISTENCIAS
                            <table style="margin:0;padding:0;border-color:black 1px;">
                                <tr> 
                                    @while ($data_ass <= $nro)
                                        <td>Dia {{$data_ass++}}</td>
                                    @endwhile
                                    <?php
                                    $data_ass=1;
                                    ?>
                                </tr>
                            </table>
                            </th>
                            <th>LICENCIA SOLICITADA</th>
                            <th>CODIGO</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @foreach ($postulantes as $item)
                        <tr>
                            <td>{{$nro_p++}}</td>
                            <td>{{$item->last_name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->dni}}</td>
                            <td>{{$item->number_tel}}</td>
                            @while ($data_ass <= $nro)
                                <td id="{{$data_ass++}}"></td>
                            @endwhile
                            <?php $data_ass = 1;?>
                            <td>{{$item->tipo_licencia}}</td>
                        <td></td>        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </section>
    <footer>
    </footer>
</body>
<script type="text/php">
    if ( isset($pdf) ) {

        $x = 260;
        $y = 750;
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
<style>
    header{
        margin-bottom:10px;
    }
    </style>
</html>
