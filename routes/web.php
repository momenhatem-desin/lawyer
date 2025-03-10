<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  //login route

  Route::get('/login','websiteUIcontroller@get_login')->name('login');
  // route user frint end
  Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
  Route::get('/','websiteUIcontroller@index')->name('index');
  Route::get('/category/{id}','websiteUIcontroller@category')->name('category.show');
  Route::get('/contactus','websiteUIcontroller@contact')->name('contactus');
  Route::get('/aboutUs','websiteUIcontroller@aboutUs')->name('aboutUs');
  Route::get('/tags/{id}','websiteUIcontroller@tags')->name('tags.show');
  // route search
  Route::get('/results_en','websiteUIcontroller@results_en')->name('results_en');
  Route::get('/results_ar','websiteUIcontroller@results_ar')->name('results_ar');

    // route for showing single post
   Route::get('/singelPost/{slug}','websiteUIcontroller@showPost')->name('aposts.showui');

     
    
     

  });


Auth::routes();


//Route::get('/','pageController@index');
/*
Route::get('/', function () {
    return view('welcome');
});
*/

 //route dashboard
 Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
 Route::get('/home','HomeController@dashboard')->name('home');
 //commend
 Route::post('/commandh/store','websiteUIcontroller@store')->name('commandh.store');
 //contactus
 Route::post('/contactus','websiteUIcontroller@contacts')->name('contactus');
 //dash
 Route::get('/dash','HomeController@dash')->name('dash');
 //subscribe
 Route::post('/subscribed','websiteUIcontroller@subscrib')->name('subscribed');
 
// use function about<-pagecontoller 
//Route::get('/about','pageController@about');
//lesson
Route::get('/api','LeassonController@index')->name('api');

/*
Route::get('/name/{name}', function ($name) {
    return 'my user name is :' . $name;
});
*/

// use function index<-pagecontoller to get my user name 
//Route::get('/name','pageController@index');
//

//Route::get('/lang','pageController@lang');

//Route::resource('post','PostController');//get = get the page and index i write resoure= get the page and all index 

///next lavel

Route::group([ 'prefix' => 'user','middleware' =>'auth'],function(){//midlwerr to cant anzer admin see
    //posts route
   Route::get('/aposts/create','ApostController@create')->name('aposts.create');
   Route::get('/aposts','ApostController@index')->name('aposts.index');
   Route::get('/aposts/show/{id}','ApostController@show')->name('aposts.show');
   Route::get('/aposts/delete/{id}','ApostController@destroy')->name('aposts.delete');
   Route::get('/aposts/edit/{id}','ApostController@edit')->name('aposts.edit');
   Route::post('/aposts/update/{id}','ApostController@update')->name('aposts.update');
   Route::post('/aposts/store','ApostController@store')->name('aposts.store');
   Route::get('/aposts/search','ApostController@search')->name('aposts.search');
   Route::get('/aposts/trashed','ApostController@trashed')->name('aposts.trashed');
   Route::get('/aposts/restore/{id}','ApostController@restore')->name('aposts.restore');
   Route::get('/aposts/hdelete/{id}','ApostController@hdelete')->name('aposts.hdelete');
  
   //category rout
   
   Route::get('/category/create','CategoryController@create')->name('category.create');
   Route::post('/category/store','CategoryController@store')->name('category.store');
   Route::get('category','CategoryController@index')->name('category');
   Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
   Route::get('/category/delete/{id}','CategoryController@destroy')->name('category.delete');
   Route::get('/category/status/{id}','CategoryController@status')->name('category.status');
   Route::post('/category/update/{id}','CategoryController@update')->name('category.update');
   //tags route
   Route::get('/tags/create','TagController@create')->name('tags.create');
   Route::post('/tags/store','TagController@store')->name('tags.store');
   Route::get('tags','TagController@index')->name('tags');
   Route::get('/tags/edit/{id}','TagController@edit')->name('tags.edit');
   Route::get('/tags/delete/{id}','TagController@destroy')->name('tags.delete');
   Route::post('/tags/update/{id}','TagController@update')->name('tags.update');

   // users route

   Route::get('/users','UserController@index')->name('users.index');
   Route::get('/users/create','UserController@create')->name('users.create');
   Route::post('/users/store','UserController@store')->name('users.store');
   Route::get('/user/delete/{id}','UserController@destroy')->name('user.delete');

   //admin users
   Route::get('/users/admin/{id}','UserController@admin')->name('users.admin');
   Route::get('/users/notAdmin/{id}','UserController@notAdmin')->name('users.notAdmin');
   Route::get('/users/profile/{id}','UserController@profile')->name('users.profile');
   Route::post('/profile/update/{id}','ProfileController@update')->name('profile.update');
   Route::post('/profile/store','ProfileController@store')->name('profile.store');
   //seting
    Route::get('/settings','SettingsController@index')->name('settings');
    Route::post('/settings/update','SettingsController@update')->name('settings.update');
    //comment
    Route::get('/comment','CommandController@index')->name('comment');
    Route::get('/comment/edit/{id}','CommandController@edit')->name('comment.edit');
    Route::get('/comment/delete/{id}','CommandController@destroy')->name('comment.delete');
    Route::post('/comment/update/{id}','CommandController@update')->name('comment.update');
    Route::get('/comment/aprove/{id}','CommandController@aprove')->name('comment.aprove');
    Route::get('/comment/notaprove/{id}','CommandController@notaprove')->name('comment.notaprove');

    //contact
    Route::get('/contact','ContentController@index')->name('contact');
    Route::get('/contact/edit/{id}','ContentController@edit')->name('contact.edit');
    Route::get('/contact/delete/{id}','ContentController@destroy')->name('contact.delete');
    Route::post('/contact/update/{id}','ContentController@update')->name('contact.update');
   
     //subscribe
     Route::get('/subscribe','SubscribController@index')->name('subscribe');
     Route::get('/subscribe/delete/{id}','SubscribController@destroy')->name('subscribe.delete');
  
 //Route::resource('aposts','ApostController');
// Route::resource('category','CategoryController');
});

//Route::group([ 'middleware' =>['role:adminsitrator']],function(){//midlwerr to ca
       
 // Route::resource('users','UserssController@admin');
  //Route::resource('permission','PermissionController@admin');
  //Route::resource('roles','RolesController@admin');


//});

//Route::get('/mahmoud', function () {
  // return App\Category::find(3)->aposts;
  //dd(App\Category::find(1)->aposts());
 //return App\Apost::find(1)->category;
 // return App\Apost::find(1)->tags;
 // return App\User::find(1)->profile;
//})->name('mahmoud');


Route::get('/newrole', function () {
//$owner=new App\Role();
//$owner->name ='owner';
//$owner->display_name ='Project Owner';
//$owner->description ='User is the owner of a given project';

//$admin=new App\Role();
//$admin->name ='admin';
//$admin->display_name ='User Administrator';
//$admin->description ='User is allowed to manage and edit other users';
 // $admin->save();


})->name('newrole');

Route::get('/premission', function () {

  
   // $createPost =new App\Permission();
   // $createPost->name ='create-post';
   // $createPost->display_name ='Create Posts';
  //  $createPost->description ='create new blog posts';

  
      //  $editUser =new App\Permission();
    //    $editUser->name ='edit-user';
    //    $editUser->display_name ='Edit Users';
    //    $editUser->description ='edit existing users';
   //   $editUser->save();
  
  
  })->name('premission');