<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')
           <div class="contants-to"> 
           <div class="container">
              <div class="card">
              <div class="card-header ">
             Edit Comment
            </div>
              <div class="card-body">
              <form action="{{route('comment.update',['id'=>$comments->id])}}" method="POST" class="form-group">
                  {{csrf_field()}}
                <div class="form-group">
                <label for="tag">email</label>
                <input type="text" class="form-control" name="email" value="{{$comments->email}}">
                </div>
                <div class="form-group">
                <label for="commend">comment</label>
                <input type="text" class="form-control" name="commend" value="{{$comments->commend}}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>   
              </form>
                   
             </div>
                  

                </div>
               </div>
               
</div>
           @endsection
