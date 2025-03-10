<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Apost;
use App\Tag;
use DB;
use App\Command;
use App\Contact;
use App\Subscrib;
use LaravelLocalization;


class websiteUIcontroller extends Controller
{
  

    public function get_()
    {
        return view("auth.");
    }


    public function index()
    {
    
        return view('index')->with('blog_name',Setting::first()->blog_name)
                            ->with('category',Category::Selection()->orderBy('created_at','desc')->get()->take(5))
                            ->with('categorysAll',Category::Selection()->orderBy('created_at','desc')->get())
                            ->with('frist_post',Apost::Selection()->orderBy('created_at','desc')->get()->first())
                            ->with('posts',Apost::Selection()->orderBy('created_at','desc')->get())
                            ->with('second_post',Apost::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('third_post',Apost::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            ->with('frist_category',Category::Selection()->orderBy('created_at','desc')->get()->first())
                            ->with('second_category',Category::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('third_category',Category::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            ->with('four_category',Category::Selection()->orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
                            ->with('tags',Tag::Selection()->get())
                            ->with('setting',Setting::first());
                           
                           
    }
    public function showPost($slug)
    {
        $posts=Apost::Selection()->where('slug',$slug)->first();
        $next_page =Apost::where('id','>',$posts->id)->min('id');   
        $prev_page =Apost::where('id','<',$posts->id)->max('id');
        return view('aposts.showui')->with('posts',$posts)
                                 ->with('next',Apost::find($next_page))
                                 ->with('prev',Apost::find($prev_page))
                                 ->with('title',$posts->title)
                                 ->with('category',Category::Selection()->orderBy('created_at','desc')->get()->take(5) )
                                 ->with('categorysAll',Category::Selection()->orderBy('created_at','desc')->get())
                                 ->with('comments',Command::orderBy('created_at','desc')->take(5)->get())
                                 ->with('tags',Tag::Selection()->get())
                                 ->with('frist_post',Apost::Selection()->orderBy('created_at','desc')->get()->first())
                                 ->with('second_post',Apost::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_post',Apost::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                 ->with('frist_category',Category::Selection()->orderBy('created_at','desc')->get()->first())
                                 ->with('second_category',Category::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_category',Category::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                 ->with('four_category',Category::Selection()->orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
                                 ->with('setting',Setting::first())
                                 ->with('blog_name',Setting::first()->blog_name);
    }

    public function category($id)
    {
        $categorys=Category::Selection()->get()->find($id);

        return view('category.show')->with('categorys',$categorys)
                                 ->with('category',Category::Selection()->orderBy('created_at','desc')->get()->take(5) )
                                 ->with('categorysAll',Category::Selection()->orderBy('created_at','desc')->get())
                                 ->with('tags',Tag::Selection()->get())
                                 ->with('posts',Apost::Selection()->orderBy('created_at','desc')->get())
                                 ->with('frist_post',Apost::Selection()->orderBy('created_at','desc')->get()->first())
                                 ->with('second_post',Apost::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_post',Apost::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                 ->with('frist_category',Category::Selection()->orderBy('created_at','desc')->get()->first())
                                 ->with('second_category',Category::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_category',Category::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                 ->with('four_category',Category::Selection()->orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
                                 ->with('setting',Setting::first())
                                 ->with('blog_name',Setting::first()->blog_name);
    }

    public function tags($id)
    {
        $tags=Tag::Selection()->get()->find($id);

        return view('tags.show')->with('tag_find',$tags)
                                 ->with('category',Category::Selection()->orderBy('created_at','desc')->get()->take(5) )
                                 ->with('categorysAll',Category::Selection()->orderBy('created_at','desc')->get())
                                 ->with('tags',Tag::Selection()->get())
                                 ->with('posts',Apost::Selection()->orderBy('created_at','desc')->get())
                                 ->with('frist_post',Apost::Selection()->orderBy('created_at','desc')->get()->first())
                                 ->with('second_post',Apost::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_post',Apost::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                 ->with('frist_category',Category::Selection()->orderBy('created_at','desc')->get()->first())
                                 ->with('second_category',Category::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_category',Category::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                 ->with('four_category',Category::Selection()->orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
                                 ->with('setting',Setting::first())
                                 ->with('blog_name',Setting::first()->blog_name);
    }

    public function contact()
    {
       

        return view('contact')
                                 ->with('category',Category::Selection()->orderBy('created_at','desc')->get()->take(5) )
                                 ->with('categorysAll',Category::Selection()->orderBy('created_at','desc')->get())
                                 ->with('tags',Tag::Selection()->get())
                                 ->with('posts',Apost::Selection()->orderBy('created_at','desc')->get())
                                 ->with('frist_category',Category::Selection()->orderBy('created_at','desc')->get()->first())
                                 ->with('second_category',Category::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_category',Category::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                 ->with('four_category',Category::Selection()->orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
                                 ->with('setting',Setting::first())
                                 ->with('blog_name',Setting::first()->blog_name);
    }

    public function aboutUs()
    {
       

        return view('aboutUs')
                                 ->with('category',Category::Selection()->orderBy('created_at','desc')->get()->take(5) )
                                 ->with('categorysAll',Category::Selection()->orderBy('created_at','desc')->get())
                                 ->with('tags',Tag::Selection()->get())
                                 ->with('posts',Apost::Selection()->orderBy('created_at','desc')->get())
                                 ->with('frist_category',Category::Selection()->orderBy('created_at','desc')->get()->first())
                                 ->with('second_category',Category::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_category',Category::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                 ->with('four_category',Category::Selection()->orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
                                 ->with('setting',Setting::first())
                                 ->with('blog_name',Setting::first()->blog_name);
    }
   
    public function results_en()
    {

        $posts = Apost::Selection()->where('title_en','like', '%' . request('search') . '%')->get();

        return view('results')
            ->with('posts', $posts )
            ->with('title_en', 'Result : ' . request('search') )
            ->with('query', request('search') )
            ->with('categorysAll',Category::Selection()->orderBy('created_at','desc')->get())
            ->with('category',Category::Selection()->orderBy('created_at','desc')->get()->take(5) )
            ->with('tags',Tag::Selection()->get())
            ->with('frist_post',Apost::Selection()->orderBy('created_at','desc')->get()->first())
            ->with('second_post',Apost::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_post',Apost::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('frist_category',Category::Selection()->orderBy('created_at','desc')->get()->first())
            ->with('second_category',Category::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_category',Category::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('four_category',Category::Selection()->orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
            ->with('setting',Setting::first())
            ->with('blog_name',Setting::first()->blog_name);
    }

    public function results_ar()
    {

        $posts = Apost::Selection()->where('title_ar','like', '%' . request('search') . '%')->get();

        return view('results')
            ->with('posts', $posts )
            ->with('title_ar', 'Result : ' . request('search') )
            ->with('query', request('search') )
            ->with('categorysAll',Category::Selection()->orderBy('created_at','desc')->get())
            ->with('category',Category::Selection()->orderBy('created_at','desc')->get()->take(5) )
            ->with('tags',Tag::Selection()->get())
            ->with('frist_post',Apost::Selection()->orderBy('created_at','desc')->get()->first())
            ->with('second_post',Apost::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_post',Apost::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('frist_category',Category::Selection()->orderBy('created_at','desc')->get()->first())
            ->with('second_category',Category::Selection()->orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_category',Category::Selection()->orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('four_category',Category::Selection()->orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
            ->with('setting',Setting::first())
            ->with('blog_name',Setting::first()->blog_name);
    }


    public function store(Request $request)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $formErrors = array();
             $commend       =filter_var($_POST['commend'],FILTER_SANITIZE_STRING);
              $email       =filter_var($_POST['email'],FILTER_SANITIZE_STRING);
                if (empty($commend)) {
                    $formErrors[] = 'Item commend cant be empty and must be string';
                }
                if (empty($email)) {
                    $formErrors[] = 'Item email cant be empty and must be string';
                }
                foreach ($formErrors as $error ) {
                        
                    echo "<div class='btn btn-danger'>" .  $error . "</div>" ;
                
                } 

            }


        if (empty($formErrors)) {

                $this->validate($request,[

                    'email'      => 'required|string',
                    'commend'    => 'required|string',
                ]);

                $comments = new Command;
                $comments->apost_id = $request->input('post_id');
                $comments->aprove = 0;
                $comments->email = $request->input('email');
                $comments->commend = $request->input('commend');
                $comments->save();//save this is afunction
                return  redirect()->back()->with( ['success' => __('messages.successful_send')]);
                
            }
     }


     public function contacts(Request $request)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $formErrors = array();
            
             $message    =filter_var($_POST['message'],FILTER_SANITIZE_STRING);
               
                if (empty($message)) {
                    $formErrors[] = 'Item message cant be empty and must be string';
                }
                foreach ($formErrors as $error ) {
                        
                    echo "<div class='btn btn-danger'>" .  $error . "</div>" ;
                
                } 

            }


        if (empty($formErrors)) {

                $this->validate($request,[

                    'email'      => 'required|email',
                    'message'    => 'required',
                ]);

                $comments = new Contact;
                $comments->email = $request->input('email');
                $comments->name = 'null';
                $comments->subject = $request->input('subject');
                $comments->message = $request->input('message');
                $comments->save();//save this is afunction
                return  redirect()->back()->with( ['success' => __('messages.successful_send')]);
                
            }
     }



     public function subscrib(Request $request)
     {
                 $this->validate($request,[
 
                     'email'      => 'required|email|unique:subscribs,email',
                 ]);
 
                 $subscribs = new Subscrib;
                 $subscribs->email = $request->input('email');
                 $subscribs->save();//save this is afunction
                 return  redirect()->back()->with( ['success' => __('messages.successful_subscription')] );
                 
             
      }

     
  
    
    
}
