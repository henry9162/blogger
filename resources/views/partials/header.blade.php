<div class="row">
	<div class="col-md-12">
		<div class="container-fluid header">
			<h1 class="text-center" id="animate-header">Welcome To My Blog</h1>
			<p class="text-center" id="animate-para">I am Ekwonwa Henry</p>
			<img class="img-responsive" id="animate-image" src="{{ asset('images/henry-code.jpg') }}" alt="author-image">   

			<!-- Search input -->
			<div class="col-md-8 col-md-offset-2 search">
				{!! form::open(['route' => 'search.results', 'role' => 'search', 'id' => 'searchForm', 'method' => 'GET']) !!}
					<div class="input-group">
						<div class="input-group-btn">
							<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"> Hint 
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li class="dropdown-header">Categories</li>
								<li role="presentation" class="divider"></li>
								@if($categories->count() > 0 )
									@foreach($categories->take(5) as $category)
										<li><a href="#" class="inline">{{ $category->name }}</a></li>
									@endforeach
								@else
									@foreach($cats->take(5) as $cat)
										<li><a href="#" class="inline">{{ $cat->name }}</a></li>
									@endforeach
								@endif
									<li role="presentation" class="divider"></li>
									<li class="dropdown-header">Tags</li>
									<li role="presentation" class="divider"></li>
								@if($tags->count() > 0)
									@foreach($tags->take(10) as $tag)
										<li><a href="#" class="inline">{{ $tag->name }}</a></li>
									@endforeach
								@else
									@foreach($tagss->take(10) as $tags)
										<li><a href="#" class="inline">{{ $tags->name }}</a></li>
									@endforeach
								@endif
							</ul>
						</div>

						{{ form::text('query', null, ['class' => 'form-control', 'id' => 'search-me', 'placeholder' => 'search blog...']) }}
						<div class="input-group-btn">
							{{ form::submit('Search', ['class' => 'btn btn-primary dropdown-toggle']) }}
						</div>
					</div>
				{!! form::close() !!}
				
			</div>
			<!-- End of searching -->

		</div>
	</div>
</div>

