<!-- start slider -->
<div class="container">
    <div class="slider siderl">   
      <div id="main-silder" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#main-silder" data-slide-to="0" class="active" data-class="carousel-one"></li>
        @foreach($posts as $post)
        <li data-target="#main-silder" data-slide-to="{{$post->id}}" class="" data-class="carousel-{{$post->subject}}"></li>
        @endforeach
      </ol>

      <div class="carousel-inner text-center"> 
          <div class="overlay"> </div>
        <div class="carousel-item carousel-one active" data-class="carousel-one" >
          <img src="{{asset('img/1.jpg')}}" class="" />
        </div>
        @foreach($posts as $post)
          <div class="carousel-item carousel-{{$post->subject}} " data-class="carousel-{{$post->subject}}" >
          <img src="/storage/post_image/{{$post->post_image}}" alt="image">
          </div>
          @endforeach
      

        </div>
      </div>
      </div>
  </div>
   <!-- end  slider -->
        