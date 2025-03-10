<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingsController extends Controller
{
   
    
    public function __construct(){

        $this->middleware('auth');
        
    }

    public function index(){

    $settings= Setting::first();
     return view('settings.index')->with('settings',$settings);//use with can add thing;

    }

    public function update(Request $request){
        $setting= Setting::first();

        $this->validate($request,[
            'blog_name'       => 'required',
            'phone_number'     =>'required',
            'blog_email' =>'required',
            'address' =>'required'
        ]);

        $setting->blog_name =$request->input('blog_name');
        $setting->phone_number=$request->input('phone_number');
        $setting->blog_email=$request->input('blog_email');
        $setting->address=$request->input('address');
        $setting->facebook =$request->input('facebook');
        $setting->twitter=$request->input('twitter');
        $setting->githup =$request->input('githup');
        $setting->save();
        return redirect()->route('settings');
    }
}
