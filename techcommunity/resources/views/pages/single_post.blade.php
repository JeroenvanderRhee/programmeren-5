@extends('layouts.app')

@section('content')

	<div class="single_post">

		@if($post->image != "uploads/No-image.jpg")
			<img class="xl-1-8" src="{{ asset($post->image)}}"/>
		@endif

		<h1>
			{{$post->title}}
		</h1>
		<p>
			{{$post->body_text}}
		</p>
	</div>
	
	<h3>Comments</h3>

	@auth
	<div class="comment_section">
		<form method="post" action="{{ route('comments.store') }}">
			<div class="form-group">
				@csrf
				<input type="hidden" name="post_id" value="{{$post->id}}"/>
				<input class="form-control" type="text" name="comment" placeholder="Create comment"/><br>
				<button type="submit" class="btn btn-primary">Place Comment</button>
			</div>
		</form>
	</div>
	@endauth

	@guest
		<p class="bold">
			Please <a href="{{ route('register') }}">register</a> or <a href="{{ route('login') }}">login</a> to place a comment.
		</p>
	@endguest



	@if(count($post->comment) >= 1)

		@foreach($post->comment as $comment)

			<div class="alert alert-dark" role="alert">
				<p class="comment">
					{{$comment->comment_text}}
				</p>
				<p class="meta comment">
					{{$comment->created_by_user}} | {{$comment->created_at_date}}
				</p>
			</div>

		@endforeach

	@else

	<div class="alert alert-info" role="alert">
  		No comments found!
	</div>

	@endif

@endsection

