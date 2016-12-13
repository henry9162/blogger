<nav class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">                 
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>                       
            <a class="navbar-brand" href="/">S.O.C Blog</a>
        </div>
        
        <div  class="collapse navbar-collapse nav-center"  id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
                <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Blog</a></li>
                <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">contact</a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                    @include('partials.nav-signedin')
                @elseif(!Auth::user())
                    @include('partials.nav-not-signedin')
                @endif
            </ul>
        </div><!-- /navbar collaspe --> 
    </div><!-- /navbar fluid -->
</nav><!-- end of navbar -->







