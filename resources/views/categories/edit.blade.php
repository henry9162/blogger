@extends('main')

@section('title', ' | Edit Category')

@section('content')
	<div class="row edit-form">
		<div class="col-md-8 col-md-offset-2">
			{!! form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
				<h4>Edit Category</h4>
				<hr>
				{{ form::label('name', 'Name') }}
				{{ form::text('name', null, ['class' => 'form-control']) }}

				{{ form::submit('Edit Category', ['class' => 'btn btn-primary btn-block btn-spacing']) }}

			{!! form::close() !!}
		</div>
	</div>
@endsection