<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    
    public function index(){

      //  return "mahmoud"; return string
      $name= 'index';
      return view('pages.index')->with('name',$name);//return page 


    }
    public function about () {
        $name= 'about';
        return view('pages.about')->with('name',$name);
    }
    public function lang () {
        //can be use array too example:
        $name='program lang';
        $lang = array(
            'p' => 'php',
            'h' => 'html5',
            'c' => 'css3',
            'j' => 'jquery'
        );
        return view('pages.proLing')->with(array(
            'lang' =>$lang,
            'name' =>$name

        ));//use with can add thing;
        
        
    }
    

}
