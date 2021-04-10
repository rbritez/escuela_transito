<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\site;
use App\address;
use App\instructor;
use App\course;

class SitesController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $sites1 = site::join('address','address.id','=','sites.address_id')->select('sites.id','sites.name','address.neighborhood','address.street','address.nro_house','address.info_add','sites.status')->where('neighborhood','LIKE',"%$request->neighborhood%")->get();
        return view('admin.sites.index',['courses'=>$courses,'sites'=>$sites,'date_now'=>$date_now,'instructors'=>$instructors,'sites1'=>$sites1]);
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
        $address = new address($request->all());
        $address->save();

        $site = new site();
        $site->name = $request->name;
        $site->address()->associate($address);
        $site->save();

        return redirect()->route('sites.index');

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
        $site = site::find($id);
        $site->status=$request->status;
        $site->save();
        $address= address::find($site->address_id);
        $address->update($request->all());
        flash("Se ha Modificado con Exito el Sitio")->important()->success();
        return redirect()->route('sites.index');
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
