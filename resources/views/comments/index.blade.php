@extends('layout.dashing')
             
           @section('content')
           <div class="contants-to"> 
           @if(count($comments)>0)
            <div class="content">
                 <div class="container">
                     <div class="card">
                       <div class="card-header ">
                           Comments
                       </div>
                      <div class="card-body">
            
                      
              
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th scope="col">title</th>
                        <th scope="col">email</th>
                        <th scope="col">comment</th>
                        <th scope="col">aprove</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr>
                        <th scope="row">{{$comment->apost->title_en}}</th>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->commend}}</td>
                        <td>
                        @if($comment->aprove >0)
                        <a href="{{route('comment.notaprove',['id'=>$comment->id])}}">delete aprove </a>
                        @else
                        <a href="{{route('comment.aprove',['id'=>$comment->id])}}">Aprove </a>
                        @endif
                        </td>
                        @if(Auth::user()->admin)
                        <td><a href="{{route('comment.edit',['id'=>$comment->id])}}">Eidt</a> <i class="fas fa-edit"></i></td>
                        <td><a href="{{route('comment.delete',['id'=>$comment->id])}}" class="confirm">Delete</a> <i class="fas fa-trash-alt"></i></td>
                        @endif
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        
                        
                  </div>
                </div>   
            </div>
            </div>
            @else
            <div class="alert alert-dimissible alert-danger"> ops this is no comments</div>
            @endif
</div>
            @endsection