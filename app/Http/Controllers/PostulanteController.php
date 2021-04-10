<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\postulante;
use App\person;
use App\course;
use App\coursexpostulante;
use App\address;
use App\instructor;
use App\site;
use App\form_assistence;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
class PostulanteController extends Controller
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
        $instructors= instructor::all();
        $sites = site::all();
        $courses = course::all();
        $aspirante = postulante::leftjoin('coursexpostulante','coursexpostulante.postulante_id','=', 'postulante.id')
        ->leftjoin('persons','persons.id','=','postulante.person_id')
        ->leftjoin('courses','courses.id','=','coursexpostulante.course_id')
        ->leftjoin('sites','sites.id','=','courses.site_id')
        ->leftjoin('address','address.id','=','persons.address_id')
        ->select('postulante.id','persons.name AS nombre',
        'persons.last_name',
        'persons.dni',
        'persons.date_birth',
        'persons.number_tel', 
        'sites.name AS lugar',
        'postulante.created_at',
        'courses.start_date',
        'postulante.tipo_licencia',
        'address.neighborhood',
        'address.info_add',
        'courses.time')
        ->where('persons.dni','LIKE',"%$request->dni%")
        ->orderBy('courses.start_date','ASC')->get();
        $total_result = 0;
        
        foreach($aspirante as $item){
            $total_result++;
        }

        $assistences= form_assistence::join('coursexpostulante','coursexpostulante.id','=', 'form_assistences.coursexpostulante_id')
        ->join('postulante','postulante.id','=','coursexpostulante.postulante_id')
        ->join('persons','persons.id','=','postulante.person_id')
        ->select('postulante.id','form_assistences.date_assistence','form_assistences.assistance')
        ->where('persons.dni','LIKE',"%$request->dni%")->get(); 

        return view('postulantes.index',[
            'total_result'=>$total_result,
            'aspirante'=>$aspirante,
            'date_now'=>$date_now,
            'courses'=>$courses,
            'sites'=>$sites,
            'instructors'=>$instructors,
            'assistences'=>$assistences
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $courses = course::all();

        return view('postulantes.create',['courses'=>$courses]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->course_id == "null"){
            $address= new address();
            $address->neighborhood = $request->neighborhood;
            $address->info_add = $request->info_add;
            $address->save();
          
            $person = new person($request->all());
            $person->address()->associate($address);
            $person->save();
    
            $postulante = new postulante();
            $postulante->person()->associate($person);
            $postulante->tipo_licencia = $request->tipo_licencia;
            $postulante->autorizado = "SI";
            $postulante->save();
            flash('Se ha creado el Autorizado de manera exitosa !!')->important()->success();
            return redirect()->route('courses.index');
        }else{
            $address= new address();
            $address->neighborhood = $request->neighborhood;
            $address->info_add = $request->info_add;
            $address->save();
        
            $person = new person($request->all());
            $person->address()->associate($address);
            $person->save();

            $postulante = new postulante();
            $postulante->person()->associate($person);
            $postulante->tipo_licencia = $request->tipo_licencia;
            $postulante->save();
            $cxp = new coursexpostulante();
            $cxp->course_id = $request->course_id;
            $cxp->postulante()->associate($postulante);
            $cxp->save();
    
            $course= course::find($request->course_id);
            // CALCULO PARA SACAR LA CANTIDAD DE DIAS QUE DURA EL CURSO
            $suma=date("d-m-Y",strtotime($course->start_date));
            $diaf= date("d-m-Y",strtotime($course->finish_date."+ 1 days"));
            $nan="n/a";
           
            while($suma <> $diaf)
            {   
                $sumanew= date("Y-m-d",strtotime($suma));
                $asistencia = new form_assistence();
                $asistencia->coursexpostulante()->associate($cxp);
                $asistencia->date_assistence= $sumanew;
                $asistencia->assistance= $nan; 
                $asistencia->save();
    
                $suma= date("d-m-Y",strtotime($suma."+ 1 days"));
            }
        }
       

        flash('Se ha creado el Postulante de manera exitosa !!')->important()->success();
        return redirect()->route('courses.list',['id'=>$request->course_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $carbon = new \Carbon\Carbon();
        $date_now = $carbon->now();
        $instructors= instructor::all();
        $sites = site::all();
        $courses = course::all();
        $postulante = coursexpostulante::find($id);
        $postulante->each(function($postulante){
            $postulante->postulante();
            $postulante->course();
        });
        $assistence = coursexpostulante::join('form_assistences','form_assistences.coursexpostulante_id','=','coursexpostulante.id')
        ->select(
            'form_assistences.assistance',
            'form_assistences.date_assistence')
        ->where('coursexpostulante.id','=',"$id")->get();
            return view('postulantes.show',['date_now'=>$date_now,'assistence'=>$assistence,'postulantes'=>$postulante,'courses'=>$courses,'sites'=>$sites,'instructors'=>$instructors]);
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
       
        $postulante =  postulante::find($id);
        $person = person::find($postulante->person_id);
        $person->name = $request->name;
        $person->last_name = $request->last_name;
        $person->dni = $request->dni;
        $person->date_birth = $request->date_birth;
        $postulante->tipo_licencia = $request->tipo_licencia;
        $person->save();
        $postulante->save();


        if( $person->address_id == null ){
           
            $address= new address();
            $address->neighborhood = $request->neighborhood;
            $address->info_add = $request->info_add;
            $address->save();

            $person = person::find($postulante->person_id);
            $person->address()->associate($address);
            $person->save();

        }else{
            $address= address::find($person->address_id);
            $address->neighborhood = $request->neighborhood;
            $address->info_add = $request->info_add;
            $address->save();
        }
        $cxp = coursexpostulante::find($request->cxp_id);
        $cxp->course_id= $request->course_id;
        $cxp->save();

       
        flash("Se ha Modificado el Postulante con Exito!")->important()->success();
        return redirect()->route("courses.list",$request->course_id);
    }
    public function pdf(){

        $date = date('Y-m-d');
        $aspirante= postulante::join('persons','persons.id','=','postulante.person_id')
        ->join('address','address.id','=','persons.address_id')
        ->select('persons.last_name', 'persons.name', 'persons.dni', 'persons.number_tel', 'address.neighborhood', 'address.info_add', 'postulante.autorizado')
        ->where('postulante.created_at','LIKE',"%$date%")->orderBy('persons.last_name','ASC')->get();
        $date= date('d-m-Y');
        // $pdf = PDF::loadView('postulantes.pdf.list',['fecha_actual'=>$date, 'aspirantes'=>$aspirante]);
        // return  $pdf->download('lista_aspirantes.pdf');
        $pdf = \App::make('dompdf.wrapper');
        $pdf = new Dompdf();
        $pdf->set_option("isPhpEnabled", true);

        // $pdf->loadHTML('<h1>Test</h1>');
        $pdf = PDF::loadView('postulantes.pdf.list',['date'=>$date, 'aspirantes'=>$aspirante]);
        return $pdf->stream();

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
    public function codigo(Request $request, $id)
    {
        $postulante = postulante::find($id);
        $postulante->codigo_teorico = $request->codigo_teorico;
        $postulante->save();
        flash('Se ha cargado el Codigo de Examen de Manera <strong>exitosa</strong> !!')->important()->success();
        return redirect()->route('courses.list',$request->course_id);
    }
}
