@extends('layout.dashing')
             
           @section('content')

  <div class="content-wrapper">
    <div class="container-fluid">

  <!--Start Dashboard Content-->
  <?php $total =  $posts_cound + $categories_cound + $user_cound + $contact_cound +$tags_cound + $comment_cound + $trashed_cound + $subscrib_cound;
  ?>

	<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">{{$posts_cound}}<span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font"><a href="{{route('aposts.index')}}"> Total Posts  </a> <span class="float-right"><?php $m= $posts_cound /$total *100; echo round($m);?>%  <i class="fas fa-upload"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">{{$categories_cound}} <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font"><a href="{{route('category')}}"> Total categories </a> <span class="float-right"><?php $m= $categories_cound /$total *100; echo round($m);?>%  <i class="fas fa-book"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">{{$user_cound}} <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font"> <a href="{{route('users.index')}}"> Total User </a> <span class="float-right"><?php $m= $user_cound /$total *100; echo round($m);?>% <i class="fas fa-user-friends"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">{{$contact_cound}} <span class="float-right"><i class="fa fa-envira"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font"> <a href="{{route('contact')}}"> Messages </a> <span class="float-right"><?php $m= $contact_cound /$total *100; echo round($m);?>% <i class="fas fa-inbox"></i></span></p>
                </div>
            </div>
        </div>
    </div>
 </div>  


 <div class="card mt-3">
  <div class="card-content">
      <div class="row row-group m-0">
          <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">{{$tags_cound}} <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
                  <div class="progress my-3" style="height:3px;">
                     <div class="progress-bar" style="width:55%"></div>
                  </div>
                <p class="mb-0 text-white small-font"><a href="{{route('tags')}}">Total Tags</a> <span class="float-right"><?php $m= $tags_cound /$total *100; echo round($m);?>%  <i class="fas fa-tags"></i></span></p>
              </div>
          </div>
          <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">{{$comment_cound}} <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                  <div class="progress my-3" style="height:3px;">
                     <div class="progress-bar" style="width:55%"></div>
                  </div>
                <p class="mb-0 text-white small-font"><a href="{{route('comment')}}">Total Comment </a><span class="float-right"><?php $m= $comment_cound /$total *100; echo round($m);?>% <i class="far fa-comment"></i></span></p>
              </div>
          </div>
          <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">{{$trashed_cound}} <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                  <div class="progress my-3" style="height:3px;">
                     <div class="progress-bar" style="width:55%"></div>
                  </div>
                <p class="mb-0 text-white small-font"><a href="{{route('aposts.trashed')}}">Trashed Post</a> <span class="float-right"><?php $m= $trashed_cound /$total *100; echo round($m);?>% <i class="fas fa-trash-alt"></i></span></p>
              </div>
          </div>
          <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">{{$subscrib_cound}} <span class="float-right"><i class="fa fa-envira"></i></span></h5>
                  <div class="progress my-3" style="height:3px;">
                     <div class="progress-bar" style="width:55%"></div>
                  </div>
                <p class="mb-0 text-white small-font"><a href="{{route('subscribe')}}">Subscribs</a> <span class="float-right"><?php $m= $subscrib_cound /$total *100; echo round($m);?>% <i class="fas fa-user-friends"></i></span></p>
              </div>
          </div>
      </div>
  </div>
</div>  

	  

      <!--End Dashboard Content-->
	  
      @endsection