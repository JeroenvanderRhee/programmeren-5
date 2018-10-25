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

@endsection