<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Apost;
use App\Tag;
use DB;
use App\User;
use Illuminate\Support\Facades\storage;//to get the storage

class ApostController extends Controller
{


      //  public function __construct(){
            
     //       $this->middleware('auth');
            
      //  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Apost::orderBy('created_at','desc')->get();
        return view('aposts.index')->with(array(
            'posts' =>$posts,

        ));//use with can add thing;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categorys=Category::all();
        if (count($categorys)==0) {
         return  redirect()->route('category.create')->with('error','you not have any categarys');//redirect to rutern the page post
        } else {
            return view('aposts.create')->with(array(
                'category' => $categorys,
                'tags' =>Tag::all()
    
            ));//use with can add thing;
        }
        

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());// to see the request 
      
        $this->validate($request,[

            'title_ar'    => 'required',
            'title_en'    => 'required|max:100|unique:aposts,title_en',
            'content_ar'     =>'required',
            'content_en'     =>'required',
            'category_id' =>'required',
            'tags' =>'required',
            'featrued'    =>'image|nullable|max:1024',
        ]);

        if ($request->hasFile('featrued')) {
            $filePath = uploadImage('posts', $request->featrued);
        } else {
            $filePath='no_Image.png';
        }

        $posts= new Apost;
        $posts->title_ar =$request->input('title_ar');
        $posts->title_en =$request->input('title_en');
        $posts->content_ar=$request->input('content_ar');
        $posts->content_en=$request->input('content_en');
        $posts->category_id=$request->input('category_id');
        $posts->featrued= $filePath;
        $posts->slug=$request->input('title_en');
        $posts->user_id=auth()->user()->id;
        $posts->save();//save this is afunction
        $posts->tags()->attach($request->input('tags'));
      return redirect('user/aposts');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $posts= Apost::find($id); // to find the post = sellect  where id = ?
      $name='';
            return view('aposts.show')->with(array(
                'posts' =>$posts,
                'name' =>$name
    
            ));//use with can add thing;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts= Apost::Find($id);

        return view('aposts.edit')->with(array(
            'category' =>Category::all(),
            'posts' =>$posts,
            'tags' =>Tag::all()

        ));//use with can add thing;
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

            'title_en'       => 'required',
            'title_ar'       => 'required',
            'content_en'     =>'required',
            'content_ar'     =>'required',
            'category_id' =>'required',
            'featrued'    =>'image|nullable|max:1024',
        ]);
        if ($request->hasFile('featrued')) {
         $filePath = uploadImage('posts', $request->featrued);
        }

        $posts= Apost::Find($id);
        $posts->title_en =$request->input('title_en');
        $posts->title_ar =$request->input('title_ar');
        $posts->content_en=$request->input('content_en');
        $posts->content_ar=$request->input('content_ar');
        $posts->category_id=$request->input('category_id');
        if ($request->hasFile('featrued')) {
        
            $posts->featrued= $filePath;

        } 
        $posts->save();//save this is afunction
        $posts->tags()->sync($request->input('tags'));
        return redirect()->route('aposts.index')->with('success','Done Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=  Apost::Find($id);
        if ($posts->featrued !='no_Image.png') {
            storage::delete('public/apost_image/' .$posts->featrued);
        }
        $posts->delete();
        return  redirect('/user/aposts')->with('success','Done Success');//redirect to rutern the page post
    }
    public function trashed()
    {
        $posts=  Apost::onlyTrashed()->get();

        return view('aposts.softdeleted')->with('posts',$posts);
    }
    public function hdelete($id)
    {
        $posts=  Apost::onlyTrashed()->where('id',$id)->first();;
        $posts->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $posts=  Apost::onlyTrashed()->where('id',$id)->first();
        $posts->restore();
        return redirect()->back();
    }

    public function search()
    {
        $posts = Apost::where('title_en','like', '%' . request('search') . '%')->get();
        return view('aposts.search')
        ->with('posts', $posts )
        ->with('title_en', 'Result : ' . request('search') )
        ->with('query', request('search') );
        
    }
    

}
