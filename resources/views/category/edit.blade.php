<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')

           <div class="contants-to">  
           <div class="container">
              <div class="card">
              <div class="card-header ">
             Edit category {{$category->name}}
            </div>
              <div class="card-body">
              <form action="{{route('category.update',['id'=>$category->id])}}" method="POST" class="form-group">
              {{csrf_field()}}

              <div class="form-group">
                <label for="name">Name_ar</label>
                <input type="text" class="form-control" name="name_ar" value="{{$category->name_ar}}" required="required">
                </div>
                <div class="form-group">
                <label for="name">Name_en</label>
                <input type="text" class="form-control" name="name_en"  required="required" value="{{$category->name_en}}">
                </div>
                <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control-file" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              
              </form>
                   
             </div>
                  

                </div>
               </div>
               
</div>
           @endsection