@extends('layout.dashing')
             
           @section('content')
           <div class="contants-to"> 
           @if(count($tags)>0)
            <div class="content">
                 <div class="container">
                     <div class="card">
                       <div class="card-header ">
                           tags
                       </div>
                      <div class="card-body">
            
                      
              
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">name_ar</th>
                        <th scope="col">name_en</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                        <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->tag_ar}}</td>
                        <td>{{$tag->tag_en}}</td>
                        @if(Auth::user()->admin)
                        <td><a href="{{route('tags.edit',['id'=>$tag->id])}}">Eidt</a> <i class="fas fa-edit"></i></td>
                        <td><a href="{{route('tags.delete',['id'=>$tag->id])}}" class="confirm">Delete</a> <i class="fas fa-trash-alt"></i></td>
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
            <div class="alert alert-dimissible alert-danger"> ops this is no posts</div>
            @endif
</div>
            @endsection