<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use DB;

class CategoryController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::orderBy('created_at','desc')->get();
        $name='';
        return view('category.index')->with(array(
            'category' =>$category,
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
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());// to see the request 


        try {
            $messages = [
                'required' => 'هذا الحقل مطلوب ',
                'max' => 'لابد الايزيد عدد اخرف الحقب عن 100 حرف بالمسافات ',
                'category_id.exists' => ' القسم غير موجود ',
                'photo.mimes' => 'لابد من رفع صوره صحيحة الامتداد',
                'unique' => 'الاسم موجود سابقا رجاء ادخال اسم اخر'
            ];

            $validator = Validator::make($request->all(), [
                'name_ar' => 'required|max:100|unique:categories,name_ar',
                'name_en' => 'required|max:100|unique:categories,name_en',
                'photo' => 'required|mimes:jpeg,jpg,png,bmp,gif,svg',
                
            ], $messages);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
         
            if ($request->hasFile('photo')) {
                $filePath = uploadImage('caregorys', $request->photo);
            } else {
                $filePath='no_Image.png';
            }

         $categorys= new Category;
         $categorys->name_ar =$request->input('name_ar');
         $categorys->name_en=$request->input('name_en');
         $categorys->photo= $filePath;
         $categorys->status= 1;
         $categorys->save();//save this is afunction
         
         return  redirect('/user/category')->with('success','success done');
            
        } catch (\Exception $ex) {

         return  redirect('/user/category')->with('error','blace try agien later');
         
        }
        
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
        $category= Category::find($id);

        if (!$category)

        return redirect()->back()->with(['error' => 'هذا القسم غير موجود ']);

        $name='';
            return view('category.edit')->with(array(
                'category' =>$category,
                'name' =>$name
    
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
     
         try {

            $messages = [
                'required' => 'هذا الحقل مطلوب ',
                'max' => 'لابد الايزيد عدد اخرف الحقب عن 100 حرف بالمسافات ',
                'category_id.exists' => ' القسم غير موجود ',
                'unique' => 'الاسم موجود سابقا رجاء ادخال اسم اخر'
            ];

            $validator = Validator::make($request->all(), [
                'name_ar' => 'required|max:100',
                'name_en' => 'required|max:100',
            ], $messages);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }


            $category = Category::find($id);

            if (!$category)
                return redirect()->back()->with(['error' => 'هذا القسم غير موجود ']);
             
               
         


                Category::where('id', $id)
                ->update([
                    'name_ar' =>  $request->name_ar,
                    'name_en' =>  $request->name_en,
                ]);

            // save image

            if ($request->has('photo')) {
                Category::where('id', $id)
                    ->update([
                        'photo' => $request->photo,
                    ]);
            }
            


            return redirect()->back()->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {
          //  return $ex;
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function status($id)
    {
        try {
            $category = Category::find($id);
            if (! $category)
                return redirect()->back()->with(['error' => 'هذا القسم غير موجود ']);

           $status =  $category -> status  == 0 ? 1 : 0;

           $category -> update(['status' =>$status ]);

            return redirect()->back()->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
