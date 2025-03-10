<!-- extend the app to get all information here -->
@extends('layout.dashing')

             @section('content')
             <div class="contants-to">
              <div class="content">
                  <div class="container">
                  <div class="row">
                    <div class="col">
                       <div class="panel panel-primary">
                        <div class="panel-heading ">
                            <h3 class="panel-title">
                            @if(get_default_lang()=='ar')
                            {{$posts->title_ar}}
                            @else
                            {{$posts->title_en}}
                            @endif
                            </h3>
                            @if(Auth::user()->admin)
                            <a class="pull-right" href="{{route('aposts.edit',['id'=>$posts->id])}}" >eidt <i class="fas fa-edit"></i></a>
                            <a class="right confirm" href="{{route('aposts.delete',['id'=>$posts->id])}}">Delete <i class="fas fa-trash-alt"></i></a>
                            @endif
                         </div>
                       <div class="panel-body">
                       <img src="{{$posts->featrued}}" alt="image" style="width:50%,height:50%" class="img-thumbnail">
                      <h2 style="color:blue;">
                      category : 
                      @if(get_default_lang()=='ar')
                      {{$posts->category->name_ar}} 
                      @else
                      {{$posts->category->name_en}} 
                      @endif
                      </h2> 
                      <p>
                      @if(get_default_lang()=='ar')
                      {{$posts->content_ar}} 
                      @else
                      {{$posts->content_en}}
                      @endif
                      </p>
                       <span class=" alert-danger">Greated at : {{$posts->created_at}} </span>
                      
                       <a class="pull-right" href="{{route('aposts.index')}}" >back</a>
                       </div>
                 </div>
                  </div>
               
             
              </div>
                </div>

            </div>
</div>
            @endsection