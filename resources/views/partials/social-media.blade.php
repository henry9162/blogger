<div class="btn-group">   
    <button type="button" class="btn btn-primary btn-xs">
        <span>F</span>
    </button>
    <button type="button" class="btn btn-primary btn-xs">
        <a href="{{ Share::facebook(route('blog.single', $post->slug), $post->title, $post->image) }}">FACEBOOK</a></button>
</div>

<div class="btn-group">   
    <button type="button" class="btn btn-info btn-xs">
        <span>T</span>
    </button>
    <button type="button" class="btn btn-info btn-xs">
        <a href="{{ Share::twitter(route('blog.single', $post->slug), $post->title, asset('images/' . $post->image)) }}">TWITTER</a></button>
</div>

<div class="btn-group">   
    <button type="button" class="btn btn-primary btn-xs">
        <span>R</span>
    </button>
    <button type="button" class="btn btn-primary btn-xs">
        <a href="{{ Share::reddit(route('blog.single', $post->slug), $post->title, asset('images/' . $post->image)) }}">REDDIT</a></button>
</div>

<div class="btn-group">   
    <button type="button" class="btn btn-danger btn-xs">
        <span>P</span>
    </button>
    <button type="button" class="btn btn-danger btn-xs">
        <a href="{{ Share::pinterest(route('blog.single', $post->slug), asset('images/' . $post->image), $post->title) }}">PINTEREST</a></button>
</div>

<div class="btn-group">   
    <button type="button" class="btn btn-success btn-xs">
        <span>E</span>
    </button>
    <button type="button" class="btn btn-success btn-xs">
        <a href="{{ Share::gmail(route('blog.single', $post->slug), $post->title, asset('images/' . $post->image)) }}">GMAIL</a></button>
</div>