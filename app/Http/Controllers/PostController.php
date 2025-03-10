<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use App\User;
use Illuminate\Support\Facades\storage;//to get the storage

class PostController extends Controller
{


    public function __construct(){
       // $this->middleware('auth',['except'=>['index']]);
        $this->middleware('auth',['except'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts= Post::all();// = select all 
       $posts= Post::orderBy('created_at','desc')->get();//sord select all
      // $posts = DB::select('SELECT * FROM `posts` ');
      // $posts= Post::orderBy('created_at','desc')->take(1)->get();//get 1 recourd
       //$posts= Post::orderBy('created_at','desc')->paginate(3);// to get 2 posts only
       $user_id = auth()->user()->id;
       $user = User::find($user_id);
        $name='';
            return view('posts.index')->with(array(
                'posts' =>$user->posts,
                'name' =>$name
    
            ));//use with can add thing;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts='';
        return view('posts.create')->with('posts',$posts);//use with can add thing;
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

            'subject'    => 'required',
            'fristname'  =>'required',
            'lastname'   =>'required',
            'body'       =>'required',
            'post_image' =>'image|nullable|max:1024',
            
        ]);
        if ($request->hasFile('post_image')) {
            $filenameWithExtention =$request->file('post_image')->getClientOriginalName();
            $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
            $extension=$request->file('post_image')->getClientOriginalExtension();
            $fileNameStore= $fileName . '_' . time() . '.' . $extension;
            $path =$request->file('post_image')->storeAs('public/post_image',$fileNameStore);
        } else {
            $fileNameStore='no_Image.png';
        }
        

        $posts= new Post;
        $posts->subject =$request->input('subject');
        $posts->fristname=$request->input('fristname');
        $posts->lastname=$request->input('lastname');
        $posts->body=$request->input('body');
        $posts->user_id=auth()->user()->id;
        $posts->post_image= $fileNameStore;
        $posts->save();//save this is afunction
        return  redirect('/post')->with('success','Done Success');//redirect to rutern the page post


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      $posts= Post::find($id); // to find the post = sellect  where id = ?
      $name='';
            return view('posts.show')->with(array(
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
        $posts= Post::find($id); 
        if (auth()->user()->id !==$posts->user_id) {
            return redirect('/post')->with('error','none');//use with can add thing;
        }else{
            
            $name='';
            return view('posts.edit')->with(array(
                'posts' =>$posts,
                'name' =>$name
    
            ));//use with can add thing;
        }
    
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

            'subject'    => 'required',
            'fristname'  =>'required',
            'lastname'   =>'required',
            'body'       =>'required',
        ]);

        if ($request->hasFile('post_image')) {
            $filenameWithExtention =$request->file('post_image')->getClientOriginalName();
            $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
            $extension=$request->file('post_image')->getClientOriginalExtension();
            $fileNameStore= $fileName . '_' . time() . '.' . $extension;
            $path =$request->file('post_image')->storeAs('public/post_image',$fileNameStore);
        } 

        $posts=  Post::Find($id);
        $posts->subject =$request->input('subject');
        $posts->fristname=$request->input('fristname');
        $posts->lastname=$request->input('lastname');
        if ($request->hasFile('post_image')) {
        
            $posts->post_image= $fileNameStore;

        } 
        
        $posts->body=$request->input('body');
        $posts->save();//save this is afunction
        return  redirect('/post')->with('success','Done Success');//redirect to rutern the page post
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=  Post::Find($id);
        if (auth()->user()->id !==$posts->user_id) {
            return redirect('/post')->with('error','none');//use with can add thing;
        }
        
        if ($posts->post_image !='no_Image.png') {
            storage::delete('public/post_image/' .$posts->post_image);
        }
        $posts->delete();
        return  redirect('/post')->with('success','Done Success');//redirect to rutern the page post
        
    }
  
     
    
}

