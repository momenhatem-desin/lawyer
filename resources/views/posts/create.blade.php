
<!-- extend the app to get all information here -->
@extends('layout.app')
             
           @section('content')

           

              <div class="container">
              <div class="panel panel-primary">
              <div class="panel-heading ">
               <h3 class="panel-title text-center">create Post</h3>
                </div>
              <div class="panel-body">

                    {!! Form::open(['action' => 'PostController@store','method' =>'POST','enctype'=>'multipart/form-data']) !!}
                        
                        <div class="form-group">
                        {{Form::label('subject', 'Subject')}}
                        {{Form::text('subject','',['class'=>'form-control','placeholder'=>'Subject'])}}
                        </div>
                        <div class="form-group">
                        {{Form::label('fristname', 'FristName')}}
                        {{Form::text('fristname','',['class'=>'form-control','placeholder'=>'fristname'])}}
                        </div>
                        <div class="form-group">
                        {{Form::label('lastname', 'LastName')}}
                        {{Form::text('lastname','',['class'=>'form-control','placeholder'=>'LastName'])}}
                        </div>
                        <div class="form-group">
                        {{Form::label('lastname', 'LastName')}}
                        {{Form::textarea('body','',['class'=>' form-control','placeholder'=>'discrption'])}}
                        <!--in use chikedir add id => article-ckeditor-->
                        </div>
                        
                        <div class="form-group">
                        {{Form::file('post_image',[ 'class'=>'form-control' ])}}
                       
                        <!--in use chikedir add id => article-ckeditor-->
                        </div>
                       
                       {{ Form::submit('Create',['class'=>'btn btn-primary btn-lg'])}}
                        
                        
                        {!! Form::close() !!}
                        </div>
                  

                </div>
               </div>
               
                
            @endsection
           
      