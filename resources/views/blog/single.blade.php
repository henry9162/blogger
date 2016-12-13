@include('partials.single-fullHead')
@include('partials.nav')

    <div class="container posts">
        <div class="row">
            <div class="col-md-9 single-image-col">
                <div class="col-md-10 col-md-offset-1">
                    <div class="single-content">
                        <h3>{{ $post->title }}</h3>
                        <p><span class="single-title-time">
                            {{ date('M j, Y', strtotime($post->created_at)) }} / {{ $post->comments->count() }} {{ str_plural('comment', $post->comments->count()) }} / 
                            {{ $post->likes->count() }} {{ str_plural('like', $post->likes->count()) }} / {{ $views }} {{ str_plural('view', $views) }}</span></p>
                        <img class="img-responsive" src="{{ asset('images/' . $post->image) }}" width="100%" height="100%"  />
                        <span class="post-ref">Share this post:</span> 
                            @include('partials.social-media')
                        </p>
                        <p>{!! $post->body !!}</p>
                        <hr>

                        <div class="post-ref" data-postid = "{{ $post->id }}">
                            <p>
                                Posted in: <span id="categoryColor">{{ $post->category->name }}</span> 
                                <i id="likeThisPost">like this post:</i> <span id="comment-post-name" class="comment-post-name"><i id="count">
                                <a href="#" id="postLikes"><span class="glyphicon glyphicon-hand-right"></span></a>&nbsp; &nbsp; 
                                <span id="likeCount">@include('postLikeCount')</span></i></span>
                            </p>

                            <p>
                             @if($post->tags->count() < 1)
                                Tags: No tag.
                             @elseif($post->tags->count() > 0)
                                Tagged in:<BR>
                                @foreach($post->tags as $tag)
                                    <span class="label label-warning" id="labelTag"><a href="{{ route('tag.page', $tag->id) }}">{{ $tag->name }}</a></span> 
                                @endforeach
                            </p>
                            @endif
                        </div>
                    </div>

                    <div class="row row-eq-height">
                        <div class="container">
                            <h4 style="color:grey;">You may also like..</h4>
                        </div>

                        @foreach($postss as $post)
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                <div class="related-image">

                                    <a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}" width="100%" height="100%" /></a>
                                    <h6 class="related-header"><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }} <br> [The best 3 ways]</a></h6>
                                    <span class="related-post-name"><i>{{ date('M j, Y', strtotime($post->created_at)) }} / {{ $post->comments->count() }} {{ str_plural('comment', $post->comments->count()) }}</i></span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    

                    <!-- Comment row -->
                    <div class="row" data-postid = "{{ $post->id }}">
                        <div class="container comment-head">
                            <h4 class="comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments->count() }} Comments</h4>
                        </div> 

                        <div class="col-md-12">
                            <div id="loop">
                                @each('commentsLoop', $post->comments, 'comment')
                            </div>
                                @include('partials.comment-box')
                        </div><!-- End of col-md-12 -->
                    </div><!-- End of row-comment -->

                </div>
            </div>

            <div class="col-md-3"> 
                @include('partials.single-sideBar')
            </div>

        </div>
    </div>

        @include('partials.footer')
        @include('partials.javascripts')
        
        {!! Html::script('js/ajax.js') !!}

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).ready(function() {
                $('.reply_form').hide();
                    $('.show_hide').click(function(event) {
                        event.preventDefault();
                    $(this).next('.reply_form').slideToggle(function()
                        {
                            $('.show_hide').text(
                                $(this).is(':visible') ? "Hide" : "reply" 
                            );
                        });
                });
            });

            var token = '{{ Session::token() }}';
            var url = '{{ route('comments') }}';
            var urlReply = '{{ route('replies') }}';
            var likeUrl = '{{ route('postLikes') }}';
            var commentUrl = '{{ route('commentLikes') }}';
            var replyUrl = '{{ route('replyLikes') }}';
        </script>

    </body>
</html>