	<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget"> 
						<p>{{$setting->blog_name}}<br><ul> <li><i class="fa fa-phone"></i> {{$setting->phone_number}}<br><li><i class="fa fa-envelope"></i> {{$setting->blog_email}} <br><li><i class="fa fa-map-marker"></i> {{$setting->address}} </ul> </p>
						<ul class="contact-social">
							<li><a href="{{$setting->facebook}}" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="{{$setting->twitter}}" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="{{$setting->githup}}" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">{{__('messages.Categories')}}</h3>
						<div class="category-widget">
							<ul>
							
                                @foreach($category as $categorys)
                               <li><a href="{{route('category.show',['id'=>$categorys->id])}}">{{$categorys->name}} <span>{{$categorys->aposts()->count()}}</span></a></li>
                               @endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">{{__('messages.Tags')}}</h3>
						<div class="tags-widget">
							<ul>
                                @foreach($tags as $tag)
								<li><a href="{{route('tags.show',['id'=>$tag->id])}}">{{$tag->tag}}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">{{__('messages.subscribed')}}</h3>
						<div class="newsletter-widget">
							<form action="{{route('subscribed')}}" method="POST">
							{{csrf_field()}}
								<p>{{__('messages.subscribe_with_us_to_receive_all_new')}}.</p>
								<input class="input" name="email" placeholder="{{__('messages.Enter Your Email')}}">
								<button type="submit" class="primary-button">{{__('messages.Subscribe')}}</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->

			<!-- row -->
		
				<div class="col-md-12">
					<div class="footer-copyright">
						
Copyright &copy;<script>document.write(new Date().getFullYear());</script>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{asset('public/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/js/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('public/js/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('public/js/main.js')}}"></script>
