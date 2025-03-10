<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Command;
use App\Apost;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments= Command::orderBy('created_at','desc')->get();
        return view('comments.index')->with(array(
            'comments' =>$comments,

        ));//use with can add thing;

        
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
        $comments = Command::find($id); 
        return view('comments.edit')->with('comments',$comments);
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
            'email'    => 'required',
            'commend'    => 'required',  
        ]);
        $comments= Command::find($id);
        $comments->email =$request->email;
        $comments->commend =$request->commend;
        $comments->save();
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
        $comments= Command::find($id); 
        $comments->destroy($id);
        return redirect()->back();
    }

    public function aprove($id)
    {
        $comments=Command::find($id);
        $comments->aprove=1;
        $comments->save();
        return redirect()->back();
    }
    public function notaprove($id)
    {
        $comments=Command::find($id);
        $comments->aprove=0;
        $comments->save();
        return redirect()->back();
    }
}
