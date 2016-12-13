@include('partials.head')

    <body>
    	@include('partials.header')
    	@include('partials.nav')

    	<!-- Boody for posts -->
		<div class="container posts">
			@include('partials.message')	
			
			@yield('content')
	    </div>

	    @include('partials.footer')
    	
         	
	    @include('partials.javascripts')
		@yield('scripts')
    </body>
</html>