@extends('main')

@section('title', ' | Blog')

@section('content')
	<div class="row">		
		<div class="col-md-10 col-md-offset-2 articles">
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
						<p>{{ substr(strip_tags($post->body), 0, 250) }}<a href="{{ route('blog.single', $post->slug) }}"><span class="read-more">...Continue reading</span></a>
						</p>
					</div>
				</div>

			</div>

			<hr>
			@endforeach

			

	</div><!-- End of col-md-10 -->

</div>
@endsection

@section('scripts')
    <script>
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

        });
    </script>
@endsection