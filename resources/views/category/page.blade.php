@extends('main')

@section('title', ' | Blog')

@section('content')
	<div class="row">		
		<div class="col-md-10 col-md-offset-2 articles single-blog">
			<h3>Posted in <span class="single-tag">"{{ $category->name }}"</span></h3>
			<hr>
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
						<p class="time"><span class="read-more"><i>{{ date('M j, Y', strtotime($post->created_at)) }} / 2 comments</i></span></p>
						<p>{{ substr($post->body, 0, 200) }}<a href="{{ route('blog.single', $post->slug) }}"><span class="read-more">...Continue reading</span></a>
						</p>
					</div>
				</div>

			</div>

			<hr>
			@endforeach

			

	</div><!-- End of col-md-10 -->

</div>
@endsection