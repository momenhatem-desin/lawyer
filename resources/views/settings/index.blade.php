<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to"> 
           @if(Auth::user()->admin)
         
           <div class="container">
              <div class="card">
              <div class="card-header ">
             Edit Settings
            </div>
              <div class="card-body">
              <form action="{{route('settings.update')}}" method="POST" class="form-group">
                  {{csrf_field()}}
                <div class="form-group">
                <label for="blog_name">blog name</label>
                <input type="text" class="form-control" name="blog_name" value="{{$settings->blog_name}}">
                </div> 
              
                <div class="form-group">
                <label for="phone_number">phone_number</label>
                <input type="text" class="form-control" name="phone_number" value="{{$settings->phone_number}}">
                </div>

                <div class="form-group">
                <label for="blog_email">blog_email</label>
                <input type="text" class="form-control" name="blog_email" value="{{$settings->blog_email}}">
                </div>

                <div class="form-group">
                <label for="address">address</label>
                <input type="text" class="form-control" name="address" value="{{$settings->address}}">
                </div>
               
                <div class="form-group">
                <label for="facebook">facebook</label>
                <input type="text" class="form-control" name="facebook" value="{{$settings->facebook}}">
                </div>

                <div class="form-group">
                <label for="twitter">twitter</label>
                <input type="text" class="form-control" name="twitter" value="{{$settings->twitter}}">
                </div>

                <div class="form-group">
                <label for="githup">githup</label>
                <input type="text" class="form-control" name="githup" value="{{$settings->githup}}">
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
              
              </form>
              <div class="cookes">
                <form action="{{route('settings')}}" method='GET'>
                  <input type="color" name="color">
                  <input type="submit" value="color-body" class="btn btn-primary ">
                </form>
              </div>
               <div class="cookes">
                  <form action="{{route('settings')}}" method='GET'>
                    <input type="color" name="color_nav">
                    <input type="submit" value="color---nav" class="btn btn-primary ">
                  </form>
              </div>
              <div class="cookes">
                  <form action="{{route('settings')}}" method='GET'>
                  <input type="hidden" name="delete">
                    <input type="submit" value="delete_color" class="btn btn-primary last ">
                  </form>
              </div>
                   
             </div>
                  

                </div>
               </div>
               @else
              
              <h1>cant see this page</h1>
   
               @endif
</div>
           @endsection