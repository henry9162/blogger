@extends('main')

@section('title', ' | Posts')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <h3>All Posts</h3>
        </div>

        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
        </div>

        <div class="row post-table">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created_at</th>
                        <th width="150px"></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                      <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr(strip_tags($post->body), 0, 150) }}{{ strlen(strip_tags($post->body)) > 150 ? "..." : "" }}</td>
                        <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> 
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a> 
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                {!! $posts->links(); !!}
            </div>

        </div>

    </div>
@endsection

            


        
