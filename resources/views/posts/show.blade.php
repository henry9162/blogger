@include('partials.single-fullHead')
    @include('partials.nav')

    <div class="container posts">
        @include('partials.message')

        <div class="row">
            <div class="col-md-8 single-image-col">
                <div class="col-md-10 col-md-offset-1">
                    <div class="single-content">
                        <h3>{{ $post->title }}</h3>
                        <p>
                            <span class="single-title-time">
                                {{ date('M j, Y h:ia', strtotime($post->created_at)) }} / {{ $post->comments->count() }} Comments 
                                / {{ $post->likes->count() }} {{ str_plural('like', $post->likes->count()) }}
                            </span>
                        </p>
                        <img class="img-responsive" src="{{ asset('images/' .$post->image) }}" width="100%" height="100%"  />
                        <p>
                            <span class="post-ref">Share this post:</span> 
                            @include('partials.social-media')
                        </p>
                        <p>{!! $post->body !!}</p> 
                        <hr>

                        <div class="post-ref">
                            <p>
                                Posted in: {{ $post->category->name }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                <i>This post has:</i> <span class="comment-post-name"><i> {{ $post->likes->count() }} {{ str_plural('like', $post->likes->count()) }}</i> .</span>
                            </p>

                            @if($post->tags->count() > 0)
                                <p>
                                    Tags: 
                                    @foreach($post->tags as $tag)
                                        <span class="label label-default"><a href="{{ route('tag.page', $tag->id) }}">{{ $tag->name }}</a></span> 
                                    @endforeach
                                </p>
                            @endif
                        </div>
                    </div>  

                </div>
            </div>

            <div class="col-md-4"> 
                <!-- firt side-bar --> 
                <div class="well">
                    <dl class="dl-horizontal">
                        <label>Url:</label>
                        <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a ></p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Category:</label>
                        <p><strong>{{ $post->category->name }}</strong></p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Create At:</label>
                        <p><strong>{{ date('M j, Y @ h:ia', strtotime($post->created_at)) }}</strong></p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Last Updated:</label>
                        <p style="background:black;color:#fff;padding-left:10px;"><strong>{{ date('M j, Y @ h:ia', strtotime($post->updated_at)) }}</strong></p>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
                        </div>
                        <div class="col-sm-6">
                            {!! form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                                {{ form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm("Are you sure?")']) }}

                            {!! form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('posts.index') }}" class="btn btn-default btn-block btn-all-posts"><< see all posts</a>
                        </div>
                    </div>

                </div>
                <!-- second row -->
                <div class="row sidebar-about">
                  <div class="sidebar-module sidebar-module-inset">
                        <p class="text-center"><img class="img-responsive" src="{{asset('images/henry-code.jpg')}}" alt=""></p>
                        <h3 class="text-center">About</h3>
                        <p class="text-center">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur</p>
                        <p class="text-center"><a href="/about" class="btn btn-primary btn-sm">Read More...</a></p>
                  </div>
                </div>

            </div>
        </div>
       

        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                 <hr>
                <div class="row">
                     <h3>Comments <small>{{ $post->comments->count() }} comments</h3>
                    <table class="table table-striped table-comment">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Replies</th>
                            <th>Created_at</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($post->comments as $comment)
                          <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                @if($comment->replies->count() > 0)
                                    <a href="{{ route('comments.show', $comment->id) }}">{{ $comment->replies->count() }}</a>
                                @elseif($comment->replies->count() < 1)
                                    {{ $comment->replies->count() }}
                                @endif
                            </td>
                            <td>{{ date('M j, Y', strtotime($comment->created_at)) }}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                            <td>
                                {!! form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

                                    {{ form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-xs', 'onclick' => 'return confirm("Are you sure?")']) }}

                                {!! form::close() !!}
                            </td>co
                          </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


        @include('partials.footer')
        @include('partials.javascripts')
    </body>
</html>