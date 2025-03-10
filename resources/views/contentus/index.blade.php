@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to"> 
           @if(count($contacts)>0)
            <div class="content">
                 <div class="container">
                     <div class="card">
                       <div class="card-header ">
                           ALL Contact
                       </div>
                      <div class="card-body">
            
                      
              
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th scope="col">email</th>
                        <th scope="col">subject</th>
                        <th scope="col">message</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->subject}}</td>
                        <td>{{$contact->message}}</td>
                        @if(Auth::user()->admin)
                        <td><a href="{{route('contact.edit',['id'=>$contact->id])}}">Eidt</a> <i class="fas fa-edit"></i></td>
                        <td><a href="{{route('contact.delete',['id'=>$contact->id])}}" class="confirm">Delete</a> <i class="fas fa-trash-alt"></i></td>
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
            <div class="alert alert-dimissible alert-danger"> ops this is no mail</div>
            @endif
</div>
            @endsection