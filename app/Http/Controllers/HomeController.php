<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Apost;
use App\Tag;
use App\User;
use App\Command;
use App\Contact;
use App\Subscrib;

class HomeController extends Controller
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
        
    }


    //dash

    public function dashboard()
    {
        return view('dash.index')
        ->with('posts_cound',Apost::all()->count())
        ->with('user_cound',User::all()->count() )
        ->with('categories_cound',Category::all()->count() )
        ->with('tags_cound',Tag::all()->count())
        ->with('comment_cound',Command::all()->count())
        ->with('contact_cound',Contact::all()->count())
        ->with('subscrib_cound',Subscrib::all()->count())
        ->with('trashed_cound',Apost::onlyTrashed()->get()->count() );
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
        //
    }

    
}
