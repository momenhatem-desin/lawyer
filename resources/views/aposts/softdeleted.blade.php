<!-- extend the app to get all information here -->
@extends('layout.dashing')
<div class="contants-to">   
           @section('content')
           @if(count($posts)>0)
            <div class="content">
                <div class="container">
                soft delete
                <div class="row">
              @foreach($posts as $post)
               <div class="col-sm-4">
              <div class="panel panel-primary">
              <div class="panel-heading ">
               <h3 class="panel-title">
             @if(get_default_lang()=='ar')
              {{$post->title_ar}}
               @else
             {{$post->title_en}}
              @endif
               </h3>
              </div>
              <img src="{{$post->featrued}}" alt="image"  class="img-thumbnail img-past">
              <div class="panel-body">
              @if(get_default_lang()=='ar')
               {{$post->content_ar}} 
                 @else
               {{$post->content_en}}
                @endif
                       
               <span class=" alert-danger">Greated at : {{$post->created_at}} </span>
               <a class="pull-a" href="{{route('aposts.restore',['id'=>$post->id])}}" >restore</a>
               <a class="pull-right" href="{{route('aposts.hdelete',['id'=>$post->id])}}" >delete</a>
                </div>
               </div>
              
               </div>
              @endforeach
             <!-- to make panting 2 can $posts->links() go to antzer page -->
              </div>
                </div>
                 
                   
            </div>
            @else
            <div class="alert alert-dimissible alert-danger"> ops this is no posts delete</div>
            @endif
</div>
            @endsection