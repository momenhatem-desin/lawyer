<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::all();
        return view('tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
            'tag_ar'    => 'required|max:100|unique:tags,tag_ar',
            'tag_en'    => 'required|max:100|unique:tags,tag_en',
        ]);


        $tags= new Tag;
        $tags->tag_ar =$request->input('tag_ar');
        $tags->tag_en =$request->input('tag_en');
        $tags->save();//save this is afunction
        return redirect()->back()->with(['success' => 'تم الانشاء بنجاح']);
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
        $tags = Tag::find($id); 
        return view('tags.edit')->with('tags',$tags);
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
            'tag_ar'    => 'required|max:100',
            'tag_en'    => 'required|max:100',  
        ]);
        $tags= Tag::find($id);
        $tags->tag_ar =$request->tag_ar;
        $tags->tag_en =$request->tag_en;
        $tags->save();
        return redirect()->back()->with(['success' => 'تم ألتحديث بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags= Tag::find($id); 
        $tags->destroy($id);
        return redirect()->back();
    }
}
