 @extends('layouts.app')


@section('content')
<h1>Create page</h1>
  @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Title:</label>
			<input class="form-control" type="text" name="title"/>
		</div>
		
		<div class="form-group">
			<label>Body Text:</label>
			<textarea class="form-control" name="body_text">
			</textarea>
		</div>

		<div class="form-group">
			<label>Choose a category:</label>

			<div class="form-check form-check-inline">
	  			<input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="No Category">
	 			<label class="form-check-label" for="inlineRadio1">No Category</label>
			</div>

			<div class="form-check form-check-inline">
	  			<input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="IoT">
	 			<label class="form-check-label" for="inlineRadio1">IoT</label>
			</div>
			<div class="form-check form-check-inline">
	  			<input class="form-check-input" type="radio" name="category" id="inlineRadio3" value="Hardware">
	  			<label class="form-check-label" for="inlineRadio3">Hardware</label>
			</div>
			<div class="form-check form-check-inline">
	  			<input class="form-check-input" type="radio" name="category" id="inlineRadio4" value="Software">
	  			<label class="form-check-label" for="inlineRadio4">Software</label>
			</div>
			<div class="form-group">
    			<label for="exampleFormControlFile1">Upload a picture</label>
    			<input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadimage">
  			</div>
		</div>
		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Create</button>
		</div>
	</div>
</form>

@endsection