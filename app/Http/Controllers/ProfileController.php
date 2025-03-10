<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        $profile= new Profile;
        $profile->user_id =$request->input('user_id');
        $profile->save();//save this is afunction
        return redirect()->back();
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
        $this->validate($request,[
            'about' =>'required',
            'avatar'    =>'image|nullable|max:500',
           
        ]);

        if ($request->hasFile('avatar')) {
            $filePath = uploadImage('avatar', $request->avatar);
        } else {
            $filePath='avatar';
        }

        $profile= Profile::Find($id);
        $profile->facebook =$request->input('facebook');
        $profile->twitter=$request->input('twitter');
        $profile->githup =$request->input('githup');
        $profile->about=$request->input('about');
        if ($request->hasFile('avatar')) {
        
            $profile->avatar=  $filePath;

        } 
       
        $profile->save();//save this is afunction
        return redirect()->back();
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
