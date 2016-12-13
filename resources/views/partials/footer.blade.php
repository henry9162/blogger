
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="container">
						<div class="footer-bottom">

						<div class="col-md-4 footer-bottom-cate animated wow fadeInLeft text-center">
							<h6>Categories</h6>
							<ul>
								@foreach($categories as $category)
									<li><a href="{{ route('category.page', $category->id) }}">{{ $category->name }}</a></li>
								@endforeach
						</div>

						<div class="col-md-4 footer-bottom-cate animated wow fadeInRight text-center" data-wow-delay=".5s">
							<h6>Follow me </h6>
							<ul class="social-icons">
								<li><a href="#" class="facebook" title="Go to my Facebook Page"></a></li>
								<li><a href="#" class="twitter" title="Go to my Twitter Account"></a></li>
								<li><a href="#" class="googleplus" title="Go to my Google Plus Account"></a></li>
								<li><a href="#" class="instagram" title="Go to my Instagram Account"></a></li>
							</ul>
							<span class="footer-class"> © 2016 Henimastic@yahoo.com . All Rights Reserved | Design by <a href="/about" target="_blank">Ekwonwa Henry</a></span>
						</div>

						<div class="col-md-4 footer-bottom-cate cate-bottom animated wow fadeInRight text-center" data-wow-delay=".5s">
							<h6>Our Address</h6>
							<ul>
								<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : 12th Avenue, 5th block, <span>Sydney.</span></li>
								<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:info@example.com">henimastic@yahoo.com</a></li>
								<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : +234 81 423 935 85</li>
							</ul>
						</div>

						<div class="clearfix"> </div>
					</div>
					</div>
				</div>

				</div>
			</div>
		<!--footer-->