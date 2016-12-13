<!-- firt side-bar --> 
<div class="row latest-row">
    <div class="container">
        <div class="col-md-10">
            <div class="latest-posts">
                <h4>Latest posts</h4>
                @foreach($posts->take(3) as $post)
                    <div class="row latest-data">
                        <div class="col-md-2">
                            <div class="latest-headings">
                                <div class="latest-image">
                                    <a href="{{ route('blog.single', $post->slug) }}"><img class="img-responsive" src="{{ asset('images/' . $post->image) }}"   width="100%" height="100%"  /></a>
                                </div>
                                <h5><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></h5>
                                <span class="single-title-time"><i>{{ date('M j, Y', strtotime($post->created_at)) }}</i></span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <br>
            </div>
        </div>
    </div>
</div>
<!-- End firt side-bar --> 

<!-- second row -->
<div class="row sidebar-about">
  <div class="sidebar-module sidebar-module-inset">
        <p class="text-center"><img class="img-responsive" src="{{ asset('images/henry-code.jpg') }}" alt=""></p>
        <h3 class="text-center">About</h3>
        <p class="text-center">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur...</p>
        <p class="text-center"><a href="/about" class="btn btn-primary btn-md">More details</a></p>
  </div>
</div>
<!-- End second side-bar --> 