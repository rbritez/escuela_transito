<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\course;
use App\instructor;
use App\site;
use App\coursexpostulante;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carbon = new \Carbon\Carbon();
        $date_now = $carbon->now(); 
        $courses = course::all();
        $instructors= instructor::all();
        $sites = site::all();
        if ($request->date_1 == "") {
        $co1 = course::join('instructor','instructor.id','=','courses.instructor_id')
        ->join('persons','persons.id','=','instructor.person_id')
        ->join('sites','sites.id','=','courses.site_id')
        ->join('address','address.id','=','sites.address_id')
        ->select('courses.id','courses.start_date',
        'courses.finish_date', 'courses.time',
        'courses.type_course','persons.name',
        'persons.last_name','sites.name AS lugar',
        'sites.id AS site_id',
        'instructor.id AS instructor_id',
        'address.neighborhood')->orderBy('start_date','ASC')->get();
        }else{
        $co1 = course::join('instructor','instructor.id','=','courses.instructor_id')
        ->join('persons','persons.id','=','instructor.person_id')
        ->join('sites','sites.id','=','courses.site_id')
        ->join('address','address.id','=','sites.address_id')
        ->select('courses.id','courses.start_date',
        'courses.finish_date', 'courses.time',
        'courses.type_course','persons.name',
        'persons.last_name','sites.name AS lugar',
        'sites.id AS site_id',
        'instructor.id AS instructor_id',
        'address.neighborhood')->whereBetween('courses.start_date',["$request->date_1","$request->date_2"])->orderBy('start_date','ASC')->get();
        }
       
       return view('courses.index',
       [
        'courses'=>$courses,
        'courses1'=>$co1,
        'instructors'=>$instructors,
        'sites'=>$sites,
        'date_now'=>$date_now
       ]);
    }
    public function index1(Request $request)
    {
        $carbon = new \Carbon\Carbon();
        $date_now = $carbon->now(); 
        $courses = course::all();
        $instructors= instructor::all();
        $sites = site::all();
        if ($request->date_1 == "") {
        $co1 = course::join('instructor','instructor.id','=','courses.instructor_id')
        ->join('persons','persons.id','=','instructor.person_id')
        ->join('sites','sites.id','=','courses.site_id')
        ->join('address','address.id','=','sites.address_id')
        ->select('courses.id','courses.start_date',
        'courses.finish_date', 'courses.time',
        'courses.type_course','persons.name',
        'persons.last_name','sites.name AS lugar',
        'sites.id AS site_id',
        'instructor.id AS instructor_id',
        'address.neighborhood')->orderBy('start_date','ASC')->get();
        }else{
        $co1 = course::join('instructor','instructor.id','=','courses.instructor_id')
        ->join('persons','persons.id','=','instructor.person_id')
        ->join('sites','sites.id','=','courses.site_id')
        ->join('address','address.id','=','sites.address_id')
        ->select('courses.id','courses.start_date',
        'courses.finish_date', 'courses.time',
        'courses.type_course','persons.name',
        'persons.last_name','sites.name AS lugar',
        'sites.id AS site_id',
        'instructor.id AS instructor_id',
        'address.neighborhood')->whereBetween('courses.start_date',["$request->date_1","$request->date_2"])->orderBy('start_date','ASC')->get();
        }
       
       return view('courses.index',
       [
        'courses'=>$courses,
        'courses1'=>$co1,
        'instructors'=>$instructors,
        'sites'=>$sites,
        'date_now'=>$date_now
       ]);
    }
    public function list(Request $request,$id)
    {   
        $carbon = new \Carbon\Carbon();
        $date_now = $carbon->now();
        $nro=1;
        $instructors= instructor::all();
        $sites = site::all();
        $courses = course::all();
        $start_date = course::find($id);
        $instructor= course::find($id);
        $instructor->each(function($instructor)
        {
            $instructor->person;
        });

        $assistences=coursexpostulante::join('form_assistences','form_assistences.coursexpostulante_id','=','coursexpostulante.id')
        ->join('courses','courses.id','=','coursexpostulante.course_id')
        ->join('postulante','postulante.id','=','coursexpostulante.postulante_id')
        ->select(
            'form_assistences.id',
            'form_assistences.date_assistence',
            'assistance',
            'postulante.id AS postulante_id'
            )
        ->where('coursexpostulante.course_id','=',"$id")->get();
        if ($request->dni =="") {
            $postulantes= coursexpostulante::join('courses','courses.id','=','coursexpostulante.course_id')
            ->join( 'postulante','postulante.id','=','coursexpostulante.postulante_id')
            ->join('persons','persons.id','=','postulante.person_id')
            ->leftjoin('address','address.id','=','persons.address_id')
            ->select(
                'coursexpostulante.id AS cxp_id',
                'persons.number_tel',
                'persons.date_birth',
                'postulante.id',
                'persons.name',
                'persons.last_name',
                'persons.dni',
                'address.neighborhood',
                'address.info_add',
                'postulante.tipo_licencia',
                'postulante.codigo_teorico')
            ->where('coursexpostulante.course_id','=',"$id")
            ->orderBy('persons.last_name','ASC')->get();
        } else {
            $postulantes= coursexpostulante::join('courses','courses.id','=','coursexpostulante.course_id')
            ->join( 'postulante','postulante.id','=','coursexpostulante.postulante_id')
            ->join('persons','persons.id','=','postulante.person_id')
            ->leftjoin('address','address.id','=','persons.address_id')

            ->select(
                'coursexpostulante.id AS cxp_id',
                'persons.number_tel',
                'postulante.id',
                'persons.name',
                'persons.last_name',
                'persons.dni',
                'persons.date_birth',
                'address.neighborhood',
                'address.info_add',
                'postulante.tipo_licencia',
                'postulante.codigo_teorico')
            ->where('coursexpostulante.course_id','=',"$id")
            ->where('persons.dni','LIKE',"%$request->dni%")
            ->orderBy('persons.last_name','ASC')->get();
            flash('Estos son los resultados de tu busqueda')->important()->warning();
        }
       return view('courses.list',
       [
           'date_now'=>$date_now,
           'courses'=>$courses,
           'postulantes'=>$postulantes,
           'id'=>$id,
           'start_date'=>$start_date,
           'instructor'=>$instructor,
           'sites'=>$sites,
           'instructors'=>$instructors,
           'nro'=>$nro,
           'assistences'=> $assistences
        ]);
    }
    
    public function pdf($id)
    {   
        $course= course::find($id);
        // CALCULO PARA SACAR LA CANTIDAD DE DIAS QUE DURA EL CURSO
        $nro=0;
        $nro_p=1;
        $data_ass =1;
        $suma=date("d-m-Y",strtotime($course->start_date));
        $diaf= date("d-m-Y",strtotime($course->finish_date."+ 1 days"));
        while($suma <> $diaf)
        {   
            $nro++;
            $sumanew= date("Y-m-d",strtotime($suma));
            $suma= date("d-m-Y",strtotime($suma."+ 1 days"));
        }
        


        $postulantes= coursexpostulante::join('courses','courses.id','=','coursexpostulante.course_id')
        ->join( 'postulante','postulante.id','=','coursexpostulante.postulante_id')
        ->join('persons','persons.id','=','postulante.person_id')
        ->select('persons.number_tel','persons.date_birth','postulante.id','persons.name','persons.last_name','persons.dni','postulante.tipo_licencia')->where('coursexpostulante.course_id','=',"$id")->orderBy('persons.last_name','ASC')->get();
        $pdf = new Dompdf();
        $pdf->set_option("isPhpEnabled", true);
        $pdf = \App::make('dompdf.wrapper');
         $pdf = PDF::loadView('courses.pdf.list',['data_ass'=>$data_ass,'postulantes'=>$postulantes, 'id'=>$id,'course'=>$course,'nro'=>$nro,'nro_p'=>$nro_p]);
        return  $pdf->stream('list.pdf');
    }

    public function lista_cargada($id)
    {   
        $course= course::find($id);
        // CALCULO PARA SACAR LA CANTIDAD DE DIAS QUE DURA EL CURSO
        $nro=0;
        $nro_p=1;
        $data_ass =1;
        $suma=date("d-m-Y",strtotime($course->start_date));
        $diaf= date("d-m-Y",strtotime($course->finish_date."+ 1 days"));
        while($suma <> $diaf)
        {   
            $nro++;
            $sumanew= date("Y-m-d",strtotime($suma));
            $suma= date("d-m-Y",strtotime($suma."+ 1 days"));
        }
        


        $postulantes= coursexpostulante::join('courses','courses.id','=','coursexpostulante.course_id')
        ->join( 'postulante','postulante.id','=','coursexpostulante.postulante_id')
        ->join('persons','persons.id','=','postulante.person_id')
        ->select('persons.number_tel','persons.date_birth','postulante.id','postulante.codigo_teorico','persons.name','persons.last_name','persons.dni','postulante.tipo_licencia')->where('coursexpostulante.course_id','=',"$id")->orderBy('persons.last_name','ASC')->get();
        
        $assistences=coursexpostulante::join('form_assistences','form_assistences.coursexpostulante_id','=','coursexpostulante.id')
        ->join('courses','courses.id','=','coursexpostulante.course_id')
        ->join('postulante','postulante.id','=','coursexpostulante.postulante_id')
        ->select(
            'form_assistences.id',
            'form_assistences.date_assistence',
            'assistance',
            'postulante.id AS postulante_id'
            )
        ->where('coursexpostulante.course_id','=',"$id")->get();
        $pdf = new Dompdf();
        $pdf->set_option("isPhpEnabled", true);
        $pdf = \App::make('dompdf.wrapper');
         $pdf = PDF::loadView('courses.pdf.lista_cargada',['data_ass'=>$data_ass,'assc'=>$assistences,'postulantes'=>$postulantes, 'id'=>$id,'course'=>$course,'nro'=>$nro,'nro_p'=>$nro_p]);
        return  $pdf->stream('lista_cargada.pdf');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $courses= new course($request->all());
        $courses->save();
        flash('Se ha creado el curso de manera exitosa !!')->important()->success();
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($start = strtotime($request->start_date) > $finish = strtotime($request->finish_date)){
            flash("Modificación <strong>No realizada</strong>, Cuidado!! La fecha de inicio no puede ser mayor a la fecha de finalizacion. ")->important()->error();
            return redirect()->route('courses.index',$id);
        }
        $course = course::find($id);
        $course->start_date = $request->start_date;
        $course->finish_date = $request->finish_date;
        $course->time = $request->time;
        $course->type_course = $request->type_course;
        $course->instructor_id = $request->instructor_id;
        $course->site_id = $request->site_id;
        $course->save();
        flash('Se ha modificado el curso con Exito !!')->important()->success();
        return redirect()->route('courses.index',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
