@extends('layouts.app')
@section('content')

<h1>News</h1>

	@if(count($posts) >= 1)

		@foreach($posts as $post)

			<div class="post-div">
				<img src="{{$post->uploaded_file}}"/>
				
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