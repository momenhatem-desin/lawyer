<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to"> 
           <div class="container">
              <div class="card">
              <div class="card-header ">
             Edit tag
            </div>
              <div class="card-body">
              <form action="{{route('tags.update',['id'=>$tags->id])}}" method="POST" class="form-group">
                  {{csrf_field()}}
                <div class="form-group">
                <label for="tag">tag_ar</label>
                <input type="text" class="form-control" name="tag_ar" value="{{$tags->tag_ar}}">
                </div>
                <div class="form-group">
                <label for="tag">tag_en</label>
                <input type="text" class="form-control" name="tag_en" value="{{$tags->tag_en}}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>   
              </form>
                   
             </div>
                  

                </div>
               </div>
</div>

           @endsection
