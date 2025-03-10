<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')

           <div class="contants-to">  
           <div class="container">
              <div class="card">
              <div class="card-header ">
             Create category
            </div>
              <div class="card-body">
              <form action="{{route('category.store')}}" method="POST" class="form-group" enctype="multipart/form-data">
                  {{csrf_field()}}
                <div class="form-group">
                <label for="name">Name_ar</label>
                <input type="text" class="form-control" name="name_ar" placeholder="name" required="required">
                </div>
                <div class="form-group">
                <label for="name">Name_en</label>
                <input type="text" class="form-control" name="name_en" placeholder="name" required="required">
                </div>
                <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control-file" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              
              </form>
                   
             </div>
                  

                </div>
               </div>
               
</div>
           @endsection