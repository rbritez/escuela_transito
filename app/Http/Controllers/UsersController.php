<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\site;
use App\instructor;
use App\course;

class UsersController extends Controller
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
    public function index()
    {   
        $courses= course::all();
        $instructors= instructor::all();
        $sites = site::all();
        return view('admin.users.index',['courses'=>$courses,'sites'=>$sites,'instructors'=>$instructors]);
    }
   
    public function profile()
    {   
        $courses= course::all();
        $instructors= instructor::all();
        $sites = site::all();
        return view('admin.users.profile',['courses'=>$courses,'sites'=>$sites,'instructors'=>$instructors]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $instructors= instructor::all();
        $sites = site::all();
        return view('admin.users.create',['sites'=>$sites,'instructors'=>$instructors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::find($id);
       $courses= course::all();
       $instructors= instructor::all();
       $sites = site::all();
       $carbon = new \Carbon\Carbon();
       $date_now = $carbon->now();
       return view('admin.users.show',['date_now'=>$date_now,'user'=>$user,'courses'=>$courses,'sites'=>$sites,'instructors'=>$instructors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
      
        $user = User::find($id);
        $user->name= $request->name;
        $user->last_name= $request->last_name;
        $user->username= $request->username;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('users.show',$id);
    }
    public function updatePass(Request $request, $id)
    {
        // dd($request->all());
        $user= User::find($id);
        $newpass= Hash::check($request->psa , $user->password);
      
        if($newpass == false){
            flash('La contraseña ingresada <strong>no coincide</strong> con la actual, Por favor vuelva a intentarlo!')->important()->error();
            return redirect()->route('users.show',$id);
        }else{
            $user->password = $newpass;
            $user->save();
            flash('Has cambiado la contraseña de manera exitosa !!')->important()->success();
            return redirect()->route('users.show',$id);
        }
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
