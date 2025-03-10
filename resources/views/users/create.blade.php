<!-- extend the app to get all information here -->
@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to"> 
           @if(Auth::user()->admin)
           <div class="container">
              <div class="card">
              <div class="card-header ">
             Create user
            </div>
              <div class="card-body">
              <form action="{{route('users.store')}}" method="POST" class="form-group">
                  {{csrf_field()}}
                <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name" placeholder="name">
                </div>

                <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" name="email" placeholder="your email">
                </div>

                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control password" name="password" placeholder="your password">
                <i class="show-pass fa fa-eye fa-2x"></i>
                </div>
               
                
                
            
                <button type="submit" class="btn btn-primary">Save</button>
              
              </form>
                   
             </div>
                  

                </div>
               </div>
               @else
              
             <h1>cant see this page</h1>
  
              @endif
</div>
           @endsection
