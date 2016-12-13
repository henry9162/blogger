@extends('main')

@section('title', ' | Search result')

@section('content')
	<div class="row">		
		<div class="col-md-10 col-md-offset-2 articles">

			@if (!$categories->count() && !$tags->count() && !$title->count())
				<h1>Sorry, no result for "{{ Request::input('query') }}" was found</h1>

				@elseif($categories->count() > 0)

					<div class="search-head"><h3>Results for <span class="query">"{{ Request::input('query') }}"</span> :</h3></div>
					<hr>

					@foreach($categories as $category)
						@if($category->posts->count() < 1)
							<h6>Sorry, no content yet for "{{ Request::input('query') }}"... Thank you! </h6>
						@endif
						
						@foreach($category->posts as $post)
						<div class="row">

							<div class="col-md-4">
								<div class="post-image">
									<a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}" alt=""  width="100%" height="100%"  /></a>
								</div>
							</div>

							<div class="col-md-6">
								<div class="post-title">
									@foreach($post->tags as $tag)
										<span class="label label-default"><a href="{{ route('tag.page', $tag->id) }}">{{ $tag->name }}</a></span>
									@endforeach
									<h3><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h3>
									<p class="time">
										<span class="read-more">
											<i>
												{{ date('M j, Y', strtotime($post->created_at)) }} / {{ $post->comments->count() }} comments
												@if($post->likes->count() > 3) 
												/ {{ $post->likes->count() }} likes
												@endif
											</i>
										</span>
									</p>
									<p>{{ substr($post->body, 0, 100) }}<a href="{{ route('blog.single', $post->slug) }}"><span class="read-more">...Continue reading</span></a>
									</p>
								</div>
							</div>

						</div>
						<hr>
						@endforeach
					@endforeach

					<hr>
				
				@elseif($tags->count() > 0)

					<h3>Results for <span class="query">"{{ Request::input('query') }}"</span> :</h3>
					<hr>

					@foreach($tags as $tag)
						@if($tag->posts->count() < 1)
							<h6>Sorry, no content yet for "{{ Request::input('query') }}"... Thank you! </h6>
						@endif

						@foreach($tag->posts as $post)
						<div class="row">

							<div class="col-md-4">
								<div class="post-image">
									<a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}" alt=""  width="100%" height="100%"  /></a>
								</div>
							</div>

							<div class="col-md-6">
								<div class="post-title">
									@foreach($post->tags as $tag)
										<span class="label label-default"><a href="{{ route('tag.page', $tag->id) }}">{{ $tag->name }}</a></span>
									@endforeach
									<h3><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h3>
									<p class="time">
										<span class="read-more">
											<i>
												{{ date('M j, Y', strtotime($post->created_at)) }} / {{ $post->comments->count() }} comments
												@if($post->likes->count() > 3) 
												/ {{ $post->likes->count() }} likes
												@endif
											</i>
										</span>
									</p>
									<p>{{ substr($post->body, 0, 200) }}<a href="{{ route('blog.single', $post->slug) }}"><span class="read-more">...Continue reading</span></a>
									</p>
								</div>
							</div>

						</div>
						<hr>
						@endforeach
					@endforeach

					<hr>

				@elseif ($title->count() > 0)
					@foreach($posts as $post)
						@if ($post->title == Request::input('query'))
						<div class="row">
							<hr>

							<div class="col-md-4">
								<div class="post-image">
									<a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}" alt=""  width="100%" height="100%"  /></a>
								</div>
							</div>

							<div class="col-md-6">
								<div class="post-title">
									@foreach($post->tags as $tag)
										<span class="label label-default"><a href="{{ route('tag.page', $tag->id) }}">{{ $tag->name }}</a></span>
									@endforeach
									<h3><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h3>
									<p class="time">
										<span class="read-more">
											<i>
												{{ date('M j, Y', strtotime($post->created_at)) }} / {{ $post->comments->count() }} comments
												@if($post->likes->count() > 3) 
												/ {{ $post->likes->count() }} likes
												@endif
											</i>
										</span>
									</p>
									<p>{{ substr($post->body, 0, 200) }}<a href="{{ route('blog.single', $post->slug) }}"><span class="read-more">...Continue reading</span></a>
									</p>
								</div>
							</div>

						</div>
						<hr>
						@endif
					@endforeach
			@endif
	</div><!-- End of col-md-10 -->

</div>
@endsection

@section('scripts')
	<script>
		$(document).ready(function(){
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
		});
	</script>
@endsection