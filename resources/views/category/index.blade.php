@extends('layout.dashing')
             
           @section('content')
           <div class=" contants-to">  
           @if(count($category)>0)
            <div class="content">
                 <div class="container">
                     <div class="card">
                       <div class="card-header ">
                           category
                       </div>
                      <div class="card-body">
            
                      
              
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">name_ar</th>
                        <th scope="col">name_en</th>
                        <th scope="col">photo</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                        <th scope="col">Cound Posts</th>
                        <th scope="col">Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $categorys)
                        <tr>
                        <th scope="row">{{$categorys->id}}</th>
                        <td>{{$categorys->name_ar}}</td>
                        <td>{{$categorys->name_en}}</td>
                        <td> <img src="{{$categorys->photo}}" alt="image"  class="" style="height:52px;width:73px;border-radius:50%; "></td>
                        @if(Auth::user()->admin)
                        <td><a href="{{route('category.edit',['id'=>$categorys->id])}}">Eidt</a> <i class="fas fa-edit"></i></td>
                        @if($categorys->aposts()->count()>0)
                        <td>Can`t Delete</td>
                        @else
                        <td><a href="{{route('category.delete',['id'=>$categorys->id])}}" class="confirm">Delete</a> <i class="fas fa-trash-alt"></i></td>
                        @endif
                        @endif
                        <td>{{$categorys->aposts()->count()}}</td>
                       <th>
                        <a href="{{route('category.status',$categorys -> id)}}"
                                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    @if($categorys -> status == 0)
                                                                       Activation
                                                                        @else
                                                                        cancel Activation
                                                                    @endif
                                                                </a>
                         </th>                                      
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