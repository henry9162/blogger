@extends('main')

@section('title', ' | posts/create')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
	<div class="row create-form">
		<div class="col-md-8 col-md-offset-2">
			<h4>Create Post</h4>
			<hr>

			{!! form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
				{{ form::label('title', 'Title') }}
				{{ form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '70']) }}

				{{ form::label('slug', 'Slug') }}
				{{ form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5']) }}

				{{ form::label('category_id', 'Category') }}
				<select class="form-control" name="category_id">
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				{{ form::label('tags', 'Tags') }}
				<select class="form-control label-spacing-down select2-multi" name="tags[]" multiple="multiple">
					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>

				{{ form::label('post_image', 'Image') }}
				{{ form::file('post_image') }}

				{{ form::label('body', 'Body') }}
				{{ form::textarea('body', null, ['class' => 'form-control', 'minlength' => '20']) }}

				{{ form::submit('Create Post', ['class' => 'btn btn-primary btn-block btn-spacing']) }}
			{!! form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}
	{!! Html::script('js/tinymce/js/tinymce/tinymce.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();

		var editor_config = {
		    path_absolute : "/",
		    selector: "textarea",
		    plugins: [
		      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		      "searchreplace wordcount visualblocks visualchars code fullscreen",
		      "insertdatetime media nonbreaking save table contextmenu directionality",
		      "emoticons template paste textcolor colorpicker textpattern"
		    ],
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
		    relative_urls: false,
		    file_browser_callback : function(field_name, url, type, win) {
		      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
		      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

		      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
		      if (type == 'image') {
		        cmsURL = cmsURL + "&type=Images";
		      } else {
		        cmsURL = cmsURL + "&type=Files";
		      }

		      tinyMCE.activeEditor.windowManager.open({
		        file : cmsURL,
		        title : 'Filemanager',
		        width : x * 0.8,
		        height : y * 0.8,
		        resizable : "yes",
		        close_previous : "no"
		      });
		    }
		  };

		  tinymce.init(editor_config);
	</script>
@endsection