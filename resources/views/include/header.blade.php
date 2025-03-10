<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>{{$blog_name}}</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

	<!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" />
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('public/css/app.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('public/css/style.css')}}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">
					<!-- social -->
					<ul class="nav-social">
                        <li><a href="{{route('index')}}"><h1>{{$blog_name}}</h1></a></li>
						<li><a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
						<li><a href="{{$setting->githup}}"><i class="fa fa-google-plus"></i></a></li>
					</ul>
					<!-- /social -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
						@if(LaravelLocalization::getCurrentLocale()=="en")
							<form method="Get" action="{{route('results_en')}}">
							@else
							<form method="Get" action="{{route('results_ar')}}">
							@endif
						     	{{csrf_field()}}
								<input class="input" name="search" placeholder="{{__('messages.Enter Your Search')}}...">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<ul class="nav-menu">
						<li class="has-dropdown">
							<a href="{{route('index')}}">{{__('messages.Home')}}</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										<li><a href="{{route('aboutUs')}}">{{__('messages.About Us')}}</a></li>
										<li><a href="{{route('contactus')}}">{{__('messages.Contact Us')}}</a></li>
										<li><a href="{{route('login')}}">{{__('messages.Log In')}}</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="has-dropdown megamenu">
							<a>{{__('messages.Categories')}}</a>
							<div class="dropdown tab-dropdown">
								<div class="row">
									<div class="col-md-2">
										<ul class="tab-nav">
									  @if(isset($category) && $category -> count() > 0 )
										 <li class="active"><a data-toggle="tab" href="#tab1">{{$frist_category->name}}</a></li>
										 @if(isset($second_category) && $second_category -> count() > 0 )  
											<li><a data-toggle="tab" href="#tab2">{{$second_category->name}}</a></li>
										@endif	
										@if(isset($third_category) && $third_category -> count() > 0 )
											<li><a data-toggle="tab" href="#tab3">{{$third_category->name}}</a></li>
											@endif	
											@if(isset($four_category) && $four_category -> count() > 0 )
											<li><a data-toggle="tab" href="#tab4">{{$four_category->name}}</a></li>
											@endif

										@endif
										</ul>
									</div>
									<div class="col-md-10">
										<div class="dropdown-body tab-content">
										
											<!-- tab1 -->
											<div id="tab1" class="tab-pane fade in active">
											@if(isset($posts) && $posts -> count() > 0 )

												<div class="row">  
                                                       	<!-- post -->
													@foreach($frist_category->aposts()->Selection()->orderBy('created_at','desc')->take(3)->get() as $post)
													<div class="col-md-4">
														<div class="post post-sm">
															<a class="post-img" href="{{route('aposts.showui',['slug' => $post->slug ])}}"><img src="{{$post->featrued}}" alt=""></a>
															<div class="post-body">
																<div class="post-category">
																	<a href="category.html">{{$post->category->name}}</a>
																</div>
																<h3 class="post-title title-sm"><a href="blog-post.html">{{$post->content}}</a></h3>
																<ul class="post-meta">
																	<li><a href="author.html">{{$post->title}}</a></li>
																	<li>{{$post->created_at->diffForHumans()}}</li>
																</ul>
															</div>
														</div>
													</div>
													@endforeach
													<!-- /post -->
													
												</div>
											</div>
											<!-- /tab1 -->

											<!-- tab2 -->
											<div id="tab2" class="tab-pane fade in">
												<div class="row">
												@if(isset($second_category) && $second_category -> count() > 0 )  
														<!-- post -->
														@foreach($second_category->aposts()->Selection()->orderBy('created_at','desc')->take(3)->get() as $post)
													<div class="col-md-4">
														<div class="post post-sm">
															<a class="post-img" href="{{route('aposts.showui',['slug' => $post->slug ])}}"><img src="{{$post->featrued}}" alt=""></a>
															<div class="post-body">
																<div class="post-category">
																	<a href="category.html">{{$post->category->name}}</a>
																</div>
																<h3 class="post-title title-sm"><a href="blog-post.html">{{$post->content}}</a></h3>
																<ul class="post-meta">
																	<li><a href="author.html">{{$post->title}}</a></li>
																	<li>{{$post->created_at->diffForHumans()}}</li>
																</ul>
															</div>
														</div>
													</div>
													@endforeach
													<!-- /post -->	
                                                   @endif
												
												</div>
											</div>
											<!-- /tab2 -->
												<!-- tab3 -->
												<div id="tab3" class="tab-pane fade in">
												<div class="row">
												@if(isset($third_category) && $third_category -> count() > 0 ) 
													<!-- post -->
													@foreach($third_category->aposts()->Selection()->orderBy('created_at','desc')->take(3)->get() as $post)
													<div class="col-md-4">
														<div class="post post-sm">
															<a class="post-img" href="{{route('aposts.showui',['slug' => $post->slug ])}}"><img src="{{$post->featrued}}" alt=""></a>
															<div class="post-body">
																<div class="post-category">
																	<a href="category.html">{{$post->category->name}}</a>
																</div>
																<h3 class="post-title title-sm"><a href="blog-post.html">{{$post->content}}</a></h3>
																<ul class="post-meta">
																	<li><a href="author.html">{{$post->title}}</a></li>
																	<li>{{$post->created_at->diffForHumans()}}</li>
																</ul>
															</div>
														</div>
													</div>
													@endforeach
													<!-- /post -->
													@endif

													
												</div>
											</div>
											<!-- /tab3 -->
												<!-- tab4 -->
												<div id="tab4" class="tab-pane fade in">
												<div class="row">
												@if(isset($four_category) && $four_category -> count() > 0 )
													<!-- post -->
													@foreach($four_category->aposts()->Selection()->orderBy('created_at','desc')->take(3)->get() as $post)
													<div class="col-md-4">
														<div class="post post-sm">
															<a class="post-img" href="{{route('aposts.showui',['slug' => $post->slug ])}}"><img src="{{$post->featrued}}" alt=""></a>
															<div class="post-body">
																<div class="post-category">
																	<a href="category.html">{{$post->category->name}}</a>
																</div>
																<h3 class="post-title title-sm"><a href="blog-post.html">{{$post->content}}</a></h3>
																<ul class="post-meta">
																	<li><a href="author.html">{{$post->title}}</a></li>
																	<li>{{$post->created_at->diffForHumans()}}</li>
																</ul>
															</div>
														</div>
													</div>
													@endforeach
													<!-- /post -->
													@endif
													
													@endif	
												</div>
											</div>
											<!-- /tab4 -->

											
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="has-dropdown megamenu">
							<a>{{__('messages.Sections')}}</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<div class="row">
										<div class="col-md-3">
											<h4 class="dropdown-heading">{{__('messages.Categories')}}</h4>
										
										@if(isset($category) && $category -> count() > 0 )							 
												<!-- /category -->
												<ul class="dropdown-list">
													@foreach($category as $categorys)
													<li><a href="{{route('category.show',['id'=>$categorys->id])}}">{{$categorys -> name}}</a></li>
													@endforeach

												</ul>
											</div>
											@foreach($category as $categorys)
											<div class="col-md-3">
												<h4 class="dropdown-heading">{{$categorys->name}}</h4>
												@foreach($categorys->aposts()->Selection()->orderBy('created_at','desc')->take(3)->get() as $post)

												<ul class="dropdown-list">

													<li><a href="{{route('aposts.showui',['slug' => $post->slug ])}}">{{$post->title}}</a></li>
													
												</ul>
												@endforeach
											</div>
											@endforeach
											<!-- /end category -->
									   @endif
									
									</div>
								</div>
							</div>
						</li>

						@if(isset($category) && $category -> count() > 0 )

                        @foreach($category as $categorys)
                       
                        <li><a href="{{route('category.show',['id'=>$categorys->id])}}">{{$categorys->name}}</a></li>
						
                        @endforeach
						@endif
					</ul>
					<!-- /nav -->
				</div>
			</div>
			<!-- /Main Nav -->
			<!-- Aside Nav -->
			<div id="nav-aside">
				<ul class="nav-aside-menu">
					<li><a href="{{route('index')}}">{{__('messages.Home')}}</a></li>
					<li class="has-dropdown"><a>{{__('messages.Categories')}}</a>
				     	<ul class="dropdown">
					 @if(isset($categorysAll) && $categorysAll -> count() > 0 )
					   @foreach($categorysAll as $categorys)
                       <li><a href="{{route('category.show',['id'=>$categorys->id])}}">{{$categorys->name}}</a></li>
                       @endforeach
					   @endif
						</ul>
					</li>
					<li><a href="{{route('aboutUs')}}">{{__('messages.About Us')}}</a></li>
					<li><a href="{{route('contactus')}}">{{__('messages.Contact Us')}}</a></li>
					<li class="has-dropdown"><a>{{__('messages.lang')}}</a>
						<ul class="dropdown">
							@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
							<li class="nav-item active">
							<a class="nav-link"
							href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
						<span class="sr-only">(current)</span></a>
								</li>
							@endforeach
					</ul>
					</li>
					<li><a href="{{route('login')}}">{{__('messages.Log In')}}</a></li>
					
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->

		 <!-- ? Preloader Start -->
	 <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('public/img/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div> 
    <!-- Preloader Start-->
	@include('include.message')
