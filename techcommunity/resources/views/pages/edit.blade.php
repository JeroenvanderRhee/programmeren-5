 @extends('layouts.app')


@section('content')
<h1>Update page</h1>

<form method="POST" action="{{ route('posts.update', $post['id']) }}" enctype="multipart/form-data">
		@csrf
		{{ method_field('PUT')}}
		<div class="form-group">
			<label>Title:</label>
			<input class="form-control" type="text" name="title" value="{{$post->title}}"/>
		</div>
		
		<div class="form-group">
			<label>Body Text:</label>
			<textarea class="form-control"  id = "article-ckeditor" type="textarea" name="body_text">{{$post->body_text}}</textarea>
		</div>

		<div class="form-group">
			<label>Choose a category:</label>


			<div class="form-check form-check-inline">

				@if($post->categorie == "No Category")

	  				<input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="No Category" checked>

	  			@else

	  				<input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="No Category">

	  			@endif

	 			<label class="form-check-label" for="inlineRadio1">No Category</label>
			</div>

			<div class="form-check form-check-inline">

				@if($post->categorie == "IoT")

	  				<input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="IoT" checked>

	  			@else

	  				<input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="IoT">

	  			@endif

	 			<label class="form-check-label" for="inlineRadio1">IoT</label>
			</div>
			<div class="form-check form-check-inline">

				@if($post->categorie == "Hardware")

	  				<input class="form-check-input" type="radio" name="category" id="inlineRadio3" value="Hardware" checked>

	  			@else

	  				<input class="form-check-input" type="radio" name="category" id="inlineRadio3" value="Hardware">

	  			@endif

	  			<label class="form-check-label" for="inlineRadio3">Hardware</label>
			</div>
			<div class="form-check form-check-inline">

				@if($post->categorie == "Software")

	  				<input class="form-check-input" type="radio" name="category" id="inlineRadio4" value="Software" checked>

	  			@else

	  				<input class="form-check-input" type="radio" name="category" id="inlineRadio4" value="Software">

	  			@endif

	  			<label class="form-check-label" for="inlineRadio4">Software</label>
			</div>
		</div>
		<div class="form-group">
    			<label for="exampleFormControlFile1">Upload a picture</label>
    			<input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadimage">
  			</div>
		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Update</button>
		</div>
	</div>
</form>
@endsection