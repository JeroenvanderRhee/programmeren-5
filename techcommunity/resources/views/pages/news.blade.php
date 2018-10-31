@extends('layouts.app')
@section('content')

<h1>{{$posts->pagetitle}}</h1>

@if($posts->pagetitle == "Posts")

<form method="get" action="http://localhost/programmeren-5/techcommunity/public/searching">
	@csrf
	<div class="form-group">
		<input class="form-control" type="text" name="search" placeholder="Search..."/><br>
	</div>
	<div class="form-group">
		<label>Filter category:</label>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="No Category" name="cb1" checked>
		  <label class="form-check-label" for="inlineCheckbox1">No Category</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="IoT" name="cb2" checked >
		  <label class="form-check-label" for="inlineCheckbox2">IoT</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Hardware" name="cb3" checked>
		  <label class="form-check-label" for="inlineCheckbox3">Hardware</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Software" name="cb4" checked>
		  <label class="form-check-label" for="inlineCheckbox4">Software</label>
		</div>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Search</button>
	</div>

</form>

@endif

	@if(count($posts) >= 1)

		@foreach($posts as $post)

			<div class="post-div">
				<img src="{{ asset($post->image)}}"/>
				
				<div class="text-section">
					<h2>
						{{$post->title}}
					</h2>
					<p>
						{{$post->body_text}}
					</p>
					<a href="posts/{{$post->id}}">Read more...</a>
				</div>
			</div>

		@endforeach

	@else


		<p>No Posts found</p>
	@endif

@endsection		