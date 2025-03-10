          
<!-- extend the app to get all information here -->
@extends('layout.app')
             
             @section('content')
  
           
              <div class="content">
                  <div class="container">
                  <div class="row">
                    <div class="col">
                       <div class="panel panel-primary">
                        <div class="panel-heading ">
                            <h3 class="panel-title">{{$posts->fristname}} - {{$posts->lastname}}</h3>
                            @if(!Auth::guest())
                            @if(Auth::user()->id==$posts->user_id)
                            <a class="pull-right" href="/post/{{$posts->id}}/edit" >eidt</a>
                            <a>
                        {!! Form::open(['action' => ['PostController@destroy',$posts->id],'method' =>'POST']) !!}
                       {{ Form::hidden('_method','DELETE')}}
                        {{ Form::submit('Delete',['class'=>'right'])}}
                        {!! Form::close() !!}
                            </a>
                            @endif
                            @endif
                         </div>
                       <div class="panel-body">
                       <img src="/storage/post_image/{{$posts->post_image}}" alt="image" style="width:50%,height:50%" class="img-thumbnail">
                      <h2>{{$posts->subject}}</h2> 
                      <p> {{$posts->body}} </p>
                       <span class=" alert-danger">Greated at : {{$posts->created_at}} </span>
                      
                       <a class="pull-right" href="/post" >back</a>
                       </div>
                 </div>
                  </div>
        
             
              </div>
                </div>

            </div>
          
            @endsection
           