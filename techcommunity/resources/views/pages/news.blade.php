<h1>News</h1>

<style>
.post-div{
	margin-top:10px;
	margin-bottom:10px;
	-webkit-box-shadow: 2px 2px 20px -4px rgba(0,0,0,0.67);
	-moz-box-shadow: 2px 2px 20px -4px rgba(0,0,0,0.67);
	box-shadow: 2px 2px 20px -4px rgba(0,0,0,0.67);

	height:150px;
}

img{
	max-width:230px;
	float:left;
	max-height:120px;
	padding:10px;
}

.text-section{
	width:calc(100% - 250px);
	float:right;
}
h2{
	font-size: 20pt;
    font-family: "Ar Cena";
    padding: 10px !important;
    margin: 0px;
    color:#0D8DFF;	
}

p{
	padding:10px;
	font-weight:500;
	margin:0px;
}

a{
	color:#0D8DFF;	
	font-weight:500;
	text-decoration:none;
	padding:10px;
	padding-top:40px;
}

a:hover{
	text-decoration: underline;
}


</style>



	@if(count($posts) >= 1)

		@foreach($posts as $post)

			<div class="post-div">
				<img src="{{$post->uploaded_file}}"/>
				
				<div class="text-section">
					<h2>
						{{$post->title}}
					</h2>
					<p>
						{{$post->description_post}}
					</p>
					<a href="posts/{{$post->id}}">Read more...</a>
				</div>
			</div>

		@endforeach

	@else

		<p>No Posts found</p>

	@endif




		