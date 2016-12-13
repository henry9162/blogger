@extends('main')

@section('title', ' | All tags')

@section('content')
	<div class="row">
        <div class="col-md-6 col-md-offset-1">
            <h3>Tags</h3>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                  <tr>
                    <td>{{ $tag->id }}</td>
                    <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-default btn-xs btn-block">Edit</a></td>
                    <td>
                    	{{ form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
							{{ form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}
						{{ form::close() }}
                    </td>
                  </tr>
                @endforeach

                </tbody>
            </table>

            <div class="text-center">
            	{!! $tags->links(); !!}
            </div>

        </div>

        <div class="col-md-3 col-md-offset-1">
            <div class="well">
                <h4>New Tag</h4>

                {!! form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

                {{ form::label('name', 'Name') }}
                {{ form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Tag name...']) }}

                {{ form::submit('Create tag', ['class' => 'btn btn-primary btn-block btn-spacing']) }}

                {!! form::close() !!}
            </div>
        </div>

    </div>
@endsection