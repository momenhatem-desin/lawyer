@include('include.header')

 <!-- PAGE HEADER -->
<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{__('messages.Contact Us')}}</h1>
						<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
							<h2 class="title">Contact Information</h2>
						</div>
						<p>Malis debet quo et, eam an lorem quaestio. Mea ex quod facer decore, eu nam mazim postea. Eu deleniti pertinacia ius. Ad elitr latine eam, ius sanctus eleifend no, cu primis graecis comprehensam eum. Ne vim prompta consectetuer, etiam signiferumque ea eum.</p>
						<ul class="contact">
							<li><i class="fa fa-phone"></i> {{$setting->phone_number}}</li>
							<li><i class="fa fa-envelope"></i> <a href="#">{{$setting->blog_email}}</a></li>
							<li><i class="fa fa-map-marker"></i> {{$setting->address}}</li>
						</ul>
					</div>

					<div class="section-row">
						<div class="section-title">
							<h2 class="title">{{__('messages.Mail us')}}</h2>
						</div>
						<form action="{{route('contactus')}}" method="POST" class="form-group">
						{{csrf_field()}}
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="{{__('messages.Email')}}" required="required">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" name="subject" placeholder="{{__('messages.Subject')}}">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" name="message" placeholder="{{__('messages.Message')}}" required="required"></textarea>
									</div>
									<button  type="submit" class="primary-button">{{__('messages.Submit')}}</button>
								</div>
							</div>
						</form>
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
									<!--	<span>21.2K<br>Followers</span> -->
									</a>
								</li>
								<li>
									<a href="{{$setting->twitter}}" class="social-twitter">
										<i class="fa fa-twitter"></i>
									<!--		<span>10.2K<br>Followers</span> -->
									</a>
								</li>
								<li>
									<a href="{{$setting->githup}}" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
									<!--		<span>5K<br>Followers</span> -->
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
