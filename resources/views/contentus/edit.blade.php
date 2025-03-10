<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to"> 
           <div class="container">
              <div class="card">
              <div class="card-header ">
             Edit Contant
            </div>
              <div class="card-body">
              <form action="{{route('contact.update',['id'=>$contacts->id])}}" method="POST" class="form-group">
                  {{csrf_field()}}
                <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name" value="{{$contacts->name}}">
                </div>

                <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" name="email" value="{{$contacts->email}}">
                </div>
                 
                <div class="form-group">
                <label for="subject">email</label>
                <input type="text" class="form-control" name="subject" value="{{$contacts->subject}}">
                </div>

                <div class="form-group">
                <label for="message">message</label>
                <textarea type="text" class="form-control" name="message"  rows="8" cols="8" required="required">{{$contacts->message}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>   
              </form>
                   
             </div>
                  

                </div>
               </div>
</div>

           @endsection