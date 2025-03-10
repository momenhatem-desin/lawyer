@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to"> 
           @if(count($subscribs)>0)
            <div class="content">
                 <div class="container">
                     <div class="card">
                       <div class="card-header ">
                           ALL subscribs
                       </div>
                      <div class="card-body">
            
                      
              
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th scope="col">email</th>
                        <th scope="col">delete</th>
                        <th scope="col">date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribs as $subscrib)
                        <tr>
                        <th scope="row">{{$subscrib->email}}</th>
                        @if(Auth::user()->admin)
                        <td><a href="{{route('subscribe.delete',['id'=>$subscrib->id])}}" class="confirm">Delete</a> <i class="fas fa-trash-alt"></i></td>
                        @endif
                        <th>{{$subscrib->created_at->diffForHumans()}}</th>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        
                        
                  </div>
                </div>   
            </div>
            </div>
            @else
            <div class="alert alert-dimissible alert-danger"> ops this is no subscripe</div>
            @endif
</div>
            @endsection