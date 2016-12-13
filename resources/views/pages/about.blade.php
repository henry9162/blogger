@include('partials.head-about')

    <body>
    	@include('partials.header-about')

        @include('partials.nav')

        <div class="container about-me">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="my-details">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?
                            </p>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!
                            </p>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et.
                            </p>
                        </div>
                    </div>

                    <div class="row row-eq-height">
                        <div class="row row-eq-height">
                            <div class="container">
                                <h4>Recent Posts</h4>
                            </div>
                            @foreach($posts as $post)
                                <div class="col-md-3">
                                    <div class="latest-image">
                                        <a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}" width="100%" height="100%" /></a>
                                        <h6 class="latest-header"><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h6>
                                        <span class="latest-post-name"><i>{{ date('M j, Y', strtotime($post->created_at)) }}</i></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!-- End of latest-row -->

                </div>
            </div>
        </div>

        @include('partials.footer')
        
        @include('partials.javascripts')
        
    </body>
</html>