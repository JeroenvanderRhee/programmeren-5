  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

<h1>Create page</h1>

<form method="POST" action="{{ route('posts.store') }}">
		@csrf
		<label>Title:</label>
		<input type="text" name="title"/>
		
		<label>Description:</label>
		<input type="textarea" name="description_post"/>
		
		<label>Body Text:</label>
		<input type="textarea" name="long_text"/>
		
		<button type="submit">Create</button>
</form>

