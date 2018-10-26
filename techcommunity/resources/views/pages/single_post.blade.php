@extends('pages.default')

@section('content')

	<div class="single_post">
		<img class="xl-1-1" src="{{$post->uploaded_file}}"/>
		<h2 class="col xl-1-1">
			{{$post->title}}
		</h2>
		<p class="col xl-1-1">
			{{$post->body_text}}
		</p>
	</div>

	<div class="comment_section">
		<h3>Comments</h3>
		<form method="post" action="{{ route('comments.store') }}">
			@csrf
			<input type="hidden" name="post_id" value="{{$post->id}}"/>
			<input type="textarea" name="comment" placeholder="Create comment"/>
			<button type="submit">Place Comment</button>
		</form>
	</div>

	@if(count($post->comment) >= 1)

		@foreach($post->comment as $comment)

			<div class="comment">
				<p>
					{{$comment->comment_text}}
				</p>
				<p>
					{{$comment->date_created_at}}
				</p>
			</div>

		@endforeach

	@else
		<p>No comments found</p>

	@endif

@endsection

