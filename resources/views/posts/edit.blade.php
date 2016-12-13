@extends('main')

@section('title', ' | Edit Post')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
	<div class="row edit-form">

		{!! form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'Put', 'files' => true]) !!}

			<div class="col-md-8">
				<h4>Edit Post</h4>
				<hr>
				{{ form::label('title', 'Title') }}
				{{ form::text('title', null, ['class' => 'form-control']) }}

				{{ form::label('slug', 'Slug') }}
				{{ form::text('slug', null, ['class' => 'form-control']) }}

				{{ form::label('category_id', 'Category') }}
				{{ form::select('category_id', $categoriesss, null, ['class' => 'form-control']) }}

				{{ form::label('tags', 'Tag') }}
				{{ form::select('tags[]', $tagsss, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

				{{ form::label('post_image', 'Image') }}
				{{ form::file('post_image') }}

				{{ form::label('body', 'Body') }}
				{{ form::textarea('body', null, ['class' => 'form-control']) }}
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl>
						<dt>Created at: </dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
					</dl>
					<dl>
						<dt>Updated at: </dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
					</dl>
					<hr>

					<div class="row">
						<div class="col-md-6">
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
						</div>
						<div class="col-md-6">
							{{ form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>
				</div>
			</div>

		{!! form::close() !!}
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	{!! Html::script('js/tinymce/js/tinymce/tinymce.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');

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