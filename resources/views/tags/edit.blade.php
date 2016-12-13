@extends('main')

@section('title', ' | Edit Tag')

@section('content')
	<div class="row edit-form">
		<div class="col-md-8 col-md-offset-2">
			{!! form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
				<h4>Edit Tag</h4>
				<hr>
				{{ form::label('name', 'Name') }}
				{{ form::text('name', null, ['class' => 'form-control']) }}

				{{ form::submit('Edit Tag', ['class' => 'btn btn-primary btn-block btn-spacing']) }}

			{!! form::close() !!}
		</div>
	</div>
@endsection