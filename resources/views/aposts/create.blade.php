<!-- extend the app to get all information here -->
@extends('layout.dashing')


             
           @section('content')
         
           <div class="contants-to">

           <div class="container">
           @if(isset($tags) && $tags -> count() > 0 )
              <div class="card">
              <div class="card-header ">
             Create post
            </div>
              <div class="card-body">
              <form action="{{route('aposts.store')}}" method="POST" class="form-group" enctype="multipart/form-data">
                  {{csrf_field()}}
              
                <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                @foreach($category as $categorys)
                <option value="{{$categorys->id}}">@if(get_default_lang()=='ar')
                {{$categorys->name_er}}
                @else
                {{$categorys->name_en}}
                @endif
                </option>
                @endforeach
                </select>
                </div>

                <div class="form-check">
                @foreach($tags as $tag)
                
                <input type="checkbox" class="form-check-input" value="{{$tag->id}}" id="tag" name="tags[]">
                <label for="tag" class="form-check-label">
                @if(get_default_lang()=='ar')
                {{$tag->tag_er}}
                @else
                {{$tag->tag_en}}
                @endif
                </label><br>
                @endforeach
                </div>
                
                <div class="form-group">
                <label for="title">Title_ar</label>
                <input type="text" class="form-control" name="title_ar" placeholder="title" required="required">
                </div>
                <div class="form-group">
                <label for="title">Title_en</label>
                <input type="text" class="form-control" name="title_en" placeholder="title" required="required">
                </div>

                <div class="form-group">
                <label for="content">Description_ar</label>
                <textarea type="text" class="form-control" name="content_ar" placeholder="Description" rows="8" cols="8"></textarea>
                </div>

                <div class="form-group">
                <label for="content">Description_en</label>
                <textarea type="text" class="form-control" name="content_en" placeholder="Description" rows="8" cols="8"></textarea>
                </div>
                
                <div class="form-group">
                <label for="featrued">Photo</label>
                <input type="file" class="form-control-file" name="featrued">
                </div>
            
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-info">delete </button>
              
              </form>
                   
             </div>
            
                </div>
          @else
        
        <div class="alert alert-dimissible alert-danger">sore you mast make thie tags frist</div>
        @endif
               </div>
               
</div>

         
           @endsection
