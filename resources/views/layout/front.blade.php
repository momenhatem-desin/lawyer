@include('include.header')

<!-- PAGE HEADER -->
<div class="page-header">
			<div class="page-header-bg" style="background-image: url('{{$posts->featrued}}');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{$posts->title}} </h1>
						@if(LaravelLocalization::getCurrentLocale()=="en")
						<p class="lead">{{$posts->category->name_en}}</p>
						@else
						<p class="lead">{{$posts->category->name_ar}}</p>
						@endif
						

					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->

</header>
	<!-- /HEADER -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">{{$posts->title}}</h3>
						</div>
						<h1>{{$posts->created_at->diffForHumans()}}</h1>
						<p>{{$posts->content}}</p>
						
                        @foreach($posts->tags as $tag)
						@if(LaravelLocalization::getCurrentLocale()=="en")
						<a href="{{route('tags.show',['id'=>$tag->id])}}" class="badge badge-pill badge-warning" style="background-color:#ee4266">{{$tag->tag_en}}</a>
						@else
						<a href="{{route('tags.show',['id'=>$tag->id])}}" class="badge badge-pill badge-warning" style="background-color:#ee4266">{{$tag->tag_ar}}</a>
						@endif
						
                         @endforeach
					</div>
					
					<div class="section-row">
						<div class="section-title">
							<br>
						<h1>{{__('messages.All Tags')}}</h1>
						</div>
						@foreach($tags as $tag)
						<a href="{{route('tags.show',['id'=>$tag->id])}}" class="badge badge-pill badge-warning" style="background-color:#ee4266">{{$tag->tag}}</a>
                         @endforeach
		        	
					</div>

					<div class="section-row">
						<div class="section-title">
						
						</div>
						<br>
						@if($prev)
				    	<a href="{{route('aposts.showui',['slug' => $prev->slug ])}}" class="badge badge-pill badge-warning" style="background-color:#ee4266">Next =>
						@if(LaravelLocalization::getCurrentLocale()=="en")
						{{$prev->title_en}}
						@else
						{{$prev->title_ar}}
						@endif
						 </a>	
					    @endif
						@if($next)
				    	<a href="{{route('aposts.showui',['slug' => $next->slug ])}}" class="badge badge-pill badge-warning" style="background-color:#ee4266">Prev =>
						@if(LaravelLocalization::getCurrentLocale()=="en")
						{{$next->title_en}}
						@else
						{{$next->title_ar}}
						@endif
						 </a>	
					    @endif
		        	
					</div>
            <!-- start commend -->
			<div class="container ">
         <div class="row">
        <div class="col-md-8">
            <div class="commend" id="myGroup">
            @if(count($posts->comments)>0)
			@foreach($posts->comments()->orderBy('created_at','desc')->take(5)->get() as $comment)
                <div class="row">
                    <div class="col-md-1"><img class="" src="{{asset('images/avatar/avatar.png')}}" width="40">
					</div>
					<div class="col-md-11"><span class="d-block font-weight-bold name">{{$comment->email}} </span><span class="date text-black-50"> Shared publicly - {{$comment->created_at->diffForHumans()}}</span>
								<div class="">
									<p class="">{{$comment->commend}}</p>
								</div>
					</div>
                </div>
			@endforeach
		    @else   
		   <p>{{__('messages.No Comments')}}</p>
			@endif
                <div class="subscript">
                    <div class="">
                        <span class="like  cursor action-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1"><i class="fa fa-commenting-o"></i><span class="ml-1 comment-to">{{__('messages.comment')}}</span></span>
                        <span class="like  cursor action-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-2" href="#collapse-2"><i class="fa fa-share"></i><span class="ml-1 share-to">{{__('messages.Share')}}</span></span>
                    </div>
                </div>
                <div id="collapse-1" class="comment-add" data-parent="#myGroup">
                    <div class="row">
					<form action="{{route('commandh.store')}}" method="POST">
					{{csrf_field()}}
						<div class="col-md-1"><img class="rounded-circle" src="{{asset('images/avatar/avatar.png')}}" width="40"></div>
						<div class="col-md-2">
						<input class="form-control" type="hidden"  name="post_id" value="{{$posts->id}}" >
						<input class="form-control" type="text" placeholder="{{__('messages.Enter Your Email')}},{{__('messages.Name')}}" name="email" >
						</div>
						<div class="col-md-9"><textarea class="form-control" placeholder="{{__('messages.your comment')}}" name="commend"></textarea>
						<div class="text-right command-button"><button class="btn btn-primary btn-sm shadow-none" type="submit">{{__('messages.Post comment')}}</button><button class="btn btn-primary btn-sm ml-1 shadow-none" type="reset" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-1" href="#collapse-1">Cancel</button></div>
					 </form>
					    </div>
						
					</div>
                  
                </div>
                <div id="collapse-2" class="share" data-parent="#myGroup" aria-expanded="false" >
                    <div class="links">
					<a href="{{$setting->facebook}}" class="fa fa-facebook border p-3 rounded mr-1"></a>
					<a href="{{$setting->twitter}}" class="fa fa-twitter border p-3 rounded mr-1"></a>
					<a href="{{$setting->githup}}" class="fa fa-google-plus"></a>
					 </div>
                </div>
            </div>
        </div>
    </div>
</div>
			<!-- end  commend -->
			

				</div>

				<div class="col-md-4">
					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">{{__('messages.Social Media')}}</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="{{$setting->facebook}}" class="social-facebook">
										<i class="fa fa-facebook"></i>
									<!--	<span>21.2K<br>Followers</span>  -->
									</a>
								</li>
								<li>
									<a href="{{$setting->twitter}}" class="social-twitter">
										<i class="fa fa-twitter"></i>
									<!--	<span>10.2K<br>Followers</span>  -->
									</a>
								</li>
								<li>
									<a href="{{$setting->githup}}" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
									<!--	<span>5K<br>Followers</span>  -->
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">{{__('messages.subscribed')}}</h2>
						</div>
						<div class="newsletter-widget">
						<form action="{{route('subscribed')}}" method="POST">
							{{csrf_field()}}
								<p>{{__('messages.subscribe_with_us_to_receive_all_new')}}.</p>
								<input class="input" name="email" placeholder="{{__('messages.Enter Your Email')}}">
								<button type="submit" class="primary-button">{{__('messages.Subscribe')}}</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	@include('include.footer')

</body>

</html>
