
<!-- extend the app to get all information here -->
@extends('layout.app')
             
           @section('content')

           @include('include.sidebar') 
           @include('include.sid') 

           @if(count($posts)>0)
            <div class="content">
                <div class="container">
                <div class="row">
              @foreach($posts as $post)
              
               <div class="col-sm-4">
              <div class="panel panel-primary">
              <div class="panel-heading ">
               <h3 class="panel-title">{{$post->subject}}</h3>
              </div>
              <img src="/storage/post_image/{{$post->post_image}}" alt="image" style="width:50%,height:50%,max-width:50%,:max-height:50%" class="img-thumbnail">
              <div class="panel-body">
               {{$post->body}}
               <span class=" alert-danger">Greated at : {{$post->created_at}} </span>
               <span class=" alert-info"> by : {{$post->user->name}} </span>
               <a class="pull-right" href="/post/{{$post->id}}" >More</a>
                </div>
               </div>
              
               </div>
              @endforeach
             <!-- to make panting 2 can $posts->links() go to antzer page -->
              </div>
                </div>
                 
                   
            </div>
            @else
            <div class="alert alert-dimissible alert-danger"> ops this is no posts</div>
            @endif
            @endsection
           
      