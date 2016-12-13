@extends('main')

@section('title', '| Home')

@section('content')
	<div class="row">	
		<div class="col-md-8 articles">
			<h3>Latest Articles</h3>
			<hr>
			@foreach($posts as $post)
			<div class="row">

				<div class="col-md-4">
					<div class="post-image">
						<a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}" alt=""  width="100%" height="100%"  /></a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="post-title">
						@if($post->tags->count() > 0)
							@foreach($post->tags as $tag)
								<span class="label"><a href="{{ route('tag.page', $tag->id) }}">{{ $tag->name }}</a></span>
							@endforeach
						@endif
						<h3><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h3>
						<p class="time">
							<span class="read-more">
								<i>{{ date('M j, Y', strtotime($post->created_at)) }} / {{ $post->comments->count() }} comments 
									@if ($post->likes->count() > 3)
									/ {{ $post->likes->count() }} likes
									@endif
								</i>
							</span>
						</p>
						<p id="postBody">{{ substr(strip_tags($post->body), 0, 150) }}<a href="{{ route('blog.single', $post->slug) }}"><span class="read-more">...Continue reading</span></a>
						</p>
					</div>
				</div>

			</div>

			<hr>
			@endforeach

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>

		</div><!-- End of col-md-8 -->

		<div class="col-md-3 blog-sidebar">

			<!-- First row: side-bar -->
			<div class="row sidebar-about">
	          <div class="sidebar-module sidebar-module-inset">
		          	<p class="text-center"><a href="/about"><img class="img-responsive" src="{{ asset('images/henry-code.jpg') }}" alt=""></a></p>
		            <h4 class="text-center"><u>Ekwonwa Henry</u></h4>
		            <p class="text-center">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum...</p>
		            <p class="text-center"><a href="/about" class="btn btn-primary btn-md">More details...</a></p>
	          </div>
	  		</div>
	  		<br>

	  		<!-- Most porrpular -->
	        <div class="container-fluid porpular-container">
	        	<div class="col-md-12 ">
			        <div class="row porpular-space">
		    			<h4>Most Porpular</h4>   
		    			<div id="pop-contain">
			    			@foreach( $porpular as $value )  
			    				<?php $post_count = str_replace('article:', '', $value) ?>

			    				@foreach($postssss as $post)
			    					@if($post->id == $post_count)
			    						<div class="row" id="porpular">
				    						<div class="col-md-6 porpular-image">
							    				<div class="post-image">
													<a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}" alt=""  width="100%" height="100%"  /></a>
												</div>
							    			</div>

							    			<div class="col-md-6 porpular-title">
							    				<div class="post-title">
													<h6><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h5>
												</div>
							    			</div>
							    		</div>
			    					@endif
			    				@endforeach
			    			@endforeach				
		    			</div>
			    	</div>    
		        </div>
	  		</div>


	  		<!-- Categories -->
	  		<div class="row">
		        <div class="sidebar-module sidebar-module-inset categories">
		            <h4>Categories</h4>
		            <ul>
			            @foreach($categories as $category)
			            	<li><h5><a href="{{ route('category.page', $category->id) }}">{{ $category->name }}</a> <span class="badge">{{ $category->posts->count() }}</span></h5></li>
			            @endforeach
			        </ul>
 				</div>
	        </div><br><!-- End of categories -->

	        <!-- Tags row -->
	        <div class="container-fluid tags">
	        	<div class="col-md-12 ">
			        <div class="row tags-space">
		    			<h4>Tags</h4>   			
		    			@foreach($tags as $tag)
		    				<span class="label label-default"><a href="{{ route('tag.page', $tag->id) }}">{{ $tag->name }}</a></span>
		    			@endforeach
			    	</div>    
		        </div>
	  		</div>

	  		<!-- Newsletter row -->
	        <div class="container-fluid newsletter-body" style="display:none;">
	        	<div class="col-md-12 newsletter">
	    			<h4>Subscribe to my Newsletter!</h4>

	    			{!! form::open(['route' => 'subscribersLog', 'method' => 'POST']) !!}

	                {{ form::text('email', null, ['class' => 'form-control', 'name' => 'email', 'placeholder' => 'Your email address...']) }}

	                {{-- {{ form::hidden('token', Session::token() ) }} --}}

	                {{ form::submit('Subscribe', ['class' => 'btn btn-primary btn-block btn-newsletter submit-btn']) }}

	                {!! form::close() !!} 
	                <div class="alert alert-success" role="alert" style="display:none"></div>
	                <div class="alert alert-danger" role="alert" style="display:none"></div>
		        </div>
	  		</div>

	  	</div><!-- End of Blog side bar -->

	</div>

@endsection

@section('scripts')
	<script>
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

		$(document).ready(function(){
			$('div.alert').hide();
			var token = '{{ Session::token() }}';
			var subUrl = '{{ route('subscribersLog') }}';

			$('ul > li > .inline').click(function(event){

				var search = $(this).html();
				var input = $('#search-me');
				var form = document.getElementById('searchForm');

				var clicked = input.val( input.val() + search );

				if( clicked ){
					form.submit();
				}
				event.preventDefault();
			});


			/*$('.submit-btn').on('click', function(event){
				event.preventDefault();
				var form_data = $(event.target).closest("form").serializeArray();

				$.ajax({
		            method:'POST',
		            url: subUrl,
		            data: form_data,
		            success: function(data){
		                $('div.alert-success').show().html('Subscription was successful!').fadeIn('slow');
		            },
		            error: function(data){	       	
		               $('div.alert-danger').show().html('An error just occurred, please try again').fadeIn('slow');
		            }
		        });
			});*/

		});
	</script>
@endsection