@extends('layout.dashing')
@section('content')

<div class="contants-to">        
<div class="container">
   <div class="card">
   <div class="card-header ">
    Edit post ( {{$posts->title_en}} )
 </div>
   <div class="card-body">
   <form action="{{route('aposts.update',['id'=>$posts->id])}}" method="POST" class="form-group" enctype="multipart/form-data">
       {{csrf_field()}}
   
     <div class="form-group">
     <label for="category">Category</label>
     <select name="category_id" id="category" class="form-control">
     @foreach($category as $categorys)
     <option value="{{$categorys->id}}" <?php 

      if ($posts->category_id == $categorys->id) {echo 'selected';}

     ?>>{{$categorys->name_en}}</option>
     @endforeach
     </select>
     </div>


     <div class="form-check">
         @foreach($tags as $tag)
        <label for="tag" class="form-check-label">
        <input type="checkbox"
        @foreach ($posts->tags as $ta)
        @if($tag->id == $ta->id)
        checked
        @endif
        @endforeach 
        class="form-check-input" value="{{$tag->id}}" id="tag"  name="tags[]">
        {{$tag->tag_en}}  </label><br>
        @endforeach
      </div>


     <div class="form-group">
     <label for="title">Title_en</label>
     <input type="text" class="form-control" name="title_en"  value="{{$posts->title_en}}" required="required">
     </div>
     <div class="form-group">
     <label for="title">Title_ar</label>
     <input type="text" class="form-control" name="title_ar"  value="{{$posts->title_ar}}" required="required">
     </div>
     <div class="form-group">
     <label for="content">Description_en</label>
     <textarea type="text" class="form-control" name="content_en"  rows="8" cols="8" required="required">{{$posts->content_en}}</textarea>
     </div>
     <div class="form-group">
     <label for="content">Description_ar</label>
     <textarea type="text" class="form-control" name="content_ar"  rows="8" cols="8" required="required">{{$posts->content_ar}}</textarea>
     </div>
     <div class="form-group">
     <label for="featrued">Photo</label>
     <input type="file" class="form-control-file" name="featrued">
     </div>
 
     <button type="submit" class="btn btn-primary">Update</button>
   
   </form>
        
  </div>
       

     </div>
    </div>
    
</div>
@endsection
