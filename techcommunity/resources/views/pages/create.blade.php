 @extends('pages.default')


@section('content')
<h1>Create page</h1>
  @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<form method="POST" action="{{ route('posts.store') }}">
		@csrf
		<label>Title:</label>
		<input type="text" name="title"/>
		
		<label>Description:</label>
		<input type="textarea" name="description_post"/>
		
		<label>Body Text:</label>
		<input id = "article-ckeditor" type="textarea" name="long_text"/>
		
		<button type="submit">Create</button>
</form>
@endsection