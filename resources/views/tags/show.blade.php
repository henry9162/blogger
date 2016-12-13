@extends('main')

@section('title', ' | View Tag')

@section('content')
	<div class="row tag-head">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
		</div>
	</div>

	<div class="row tag-table">
		<div class="col-md-8 col-md-offset-2">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tag->posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>
							@foreach ($post->tags as $tag)
								<span class="label label-default">{{ $tag->name }}</span>
							@endforeach
						</td>
						<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs btn-block">View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection