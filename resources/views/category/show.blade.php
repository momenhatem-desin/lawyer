@include('include.header')

<!-- PAGE HEADER -->
<div class="page-header">
			<div class="page-header-bg" style="background-image: url('{{$categorys->photo}}');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{$categorys->name}} </h1>
					
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
                        <div class="row">
                            <br>
                         @foreach($categorys->aposts()->Selection()->orderBy('created_at','desc')->get() as $post)
                        <div class="col-md-6 hot-post-right">
                            <div class="post post-thumb">
                                <a class="post-img" href="{{route('aposts.showui',['slug' => $post->slug ])}}"><img src="{{$post->featrued}}" alt="" style="width:100%;height:100%;min-width:100%;min_height:100%"></a>
                                <div class="post-body">
                                    <h3 class="post-title"><a href="blog-post.html"></a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">{{$post->title}}</a></li>
                                        <li>{{$post->created_at->diffForHumans()}}</li>
                                    </ul>
                                </div>
                            </div>
                      </div> 
                      @endforeach      
                    </div>
                 
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
									<!--	<span>10.2K<br>Followers</span> -->
									</a>
								</li>
								<li>
									<a href="{{$setting->githup}}" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
									<!--	<span>5K<br>Followers</span> -->
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
