@extends('layout.dashing')
<div class=" contants-to"> 
           @section('content')
           <div class="container">
              <div class="card">
              <div class="card-header ">
              profile
            </div>
              <div class="card-body">
              @if($user->profile)
              <form action="{{route('profile.update',['id'=>$user->profile->id])}}" method="POST" class="form-group"  enctype="multipart/form-data">
                  {{csrf_field()}}

              
                <div class="form-group">
                <label for="email"></label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                </div>

               
                <div class="form-group">
                <label for="facebook">facebook</label>
                <input type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}">
                </div>

                <div class="form-group">
                <label for="twitter">twitter</label>
                <input type="text" class="form-control" name="twitter" value="{{$user->profile->twitter}}">
                </div>

                <div class="form-group">
                <label for="githup">githup</label>
                <input type="text" class="form-control" name="githup" value="{{$user->profile->githup}}">
                </div>


                <div class="form-group">
                <label for="about">about</label>
                <textarea type="text" class="form-control" name="about"  rows="8" cols="8">{{$user->profile->about}}</textarea>
                </div>
            
                <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control-file" name="avatar">
                </div>
               
                
                
            
                <button type="submit" class="btn btn-primary">Save</button>
              
              </form>
                   @else
                   <h1>you are not have profile</h1>
                   <form action="{{route('profile.store')}}" method="POST" class="form-group">
                   {{csrf_field()}}
                   <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
                   <button type="submit" class="btn btn-primary">Make Profile</button>
                  </form>
                   @endif
             </div>
                  

                </div>
               </div>
</div>
           @endsection