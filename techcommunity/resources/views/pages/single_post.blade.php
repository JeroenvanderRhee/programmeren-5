@extends('layouts.app')

@section('content')

	<div class="single_post">
		@if($post['0']->image != "uploads/No-image.jpg")
			<img class="xl-1-3 xl-center" src="{{ asset($post['0']->image)}}"/>
		@endif

		<h1>
			{{$post['0']->title}}
		</h1>
		<p>
			{!! $post['0']->body_text !!}
		</p>
	</div>
	
	<h3>Comments</h3>

	@auth
	<div class="comment_section">
		<form method="POST" action="../comments">
			<div class="form-group">
				@csrf
				<input type="hidden" name="post_id" value="{{$post['0']->id}}"/>
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
	
	



	@if(count($post['0']->comments) >= 1)

		@foreach($post['0']->comments as $comment)

			<div class="alert alert-dark" role="alert">
				<p class="comment">
					{{$comment->comment_text}}
				</p>
				<p class="meta comment">
					{{$comment->username}} | {{$comment->created_at_date}}
				</p>
			</div>

		@endforeach

	@else

	<div class="alert alert-info" role="alert">
  		No comments found!
	</div>

	@endif






@endsection

