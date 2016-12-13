<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    {{ Auth::user()->name }} <span class="caret"></span>
    </a>                            
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('posts.index') }}">Posts</a></li>
        <li><a href="{{ route('categories.index') }}">Categories</a></li>
        <li><a href="{{ route('tags.index') }}">Tags</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="{{ route('signout') }}">Signout</a></li>

    </ul>
</li>