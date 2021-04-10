<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\instructor;
use App\person;
use App\instructorsView;
use Carbon\Carbon;
use App\course;
use App\site;




class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
      { 
        $carbon = new \Carbon\Carbon();
        $date_now = $carbon->now();
        $instructors= instructor::all();
        $sites = site::all();
        $courses = course::all();  
        $instructors1 = instructor::join('persons','persons.id','=','instructor.person_id')->select('instructor.id AS instructor_id','persons.name','persons.last_name','persons.dni','persons.date_birth','persons.number_tel','instructor.status')->where('persons.dni','LIKE',"%$request->dni%")->orderBy('instructor.id','DESC')->get();
        $date= Carbon::now()->toDateString();
        $date= strtotime($date) ;
        return view('admin.instructor.index',['sites'=>$sites,'instructors'=>$instructors,'date_now'=>$date_now,'courses'=>$courses,'instructors1'=>$instructors1, 'date'=>$date]);
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

        $person= new person();
        $person->name = $request->name;
        $person->last_name= $request->last_name;
        $person->dni = $request->dni;
        $person->date_birth = $request->date_birth;
        $person->number_tel = $request->number_tel;
        $person->save();

        $instructor = new instructor();
        $instructor->person()->associate($person);
        $instructor->save();
        flash('Has creado un instructor de manera exitosa !!')->important()->success();
        return redirect()->route('instructor.index');
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
        $instructor = instructor::find($id);
        $instructor->status = $request->status;
        $instructor->save();
        $person = person::find($instructor->person_id);
        $person->update($request->all());
        flash("Se ha Modificado los datos de manera Exitosa !!")->important()->success();
        return redirect()->route('instructor.index');
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
