<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use DB;


class UserController extends Controller
{



    public function __construct(){

         $this->middleware('auth');
         
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name'       => 'required',
            'email'     =>'required',
            'password' =>'required',
        ]);
        $user = User::create([
       'name' =>$request->name,
       'email' =>$request->email,
       'password' =>Hash::make($request['password']),
      // 'password' =>bcrypt('password'),
        ]);

       $profile = Profile::create([
       'user_id'=>$user->id

       ]);
        
       return redirect()->route('users.index');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = DB::delete('DELETE FROM `users` where id=:id',['id'=>$id]);
        //$user= User::find($id); 
        //$user->destroy($id);
        return redirect()->back();
    }
    public function admin($id)
    {
        $user=User::find($id);
        $user->admin=1;
        $user->save();
        return redirect()->route('users.index');
    }
    public function notAdmin($id)
    {
        $user=User::find($id);
        $user->admin=0;
        $user->save();
        return redirect()->route('users.index');
    }

    public function profile($id)
    {
        $user= User::find($id);

        return view('users.profile')->with('user',$user);
        
    }
    
    
}
