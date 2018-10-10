<style>

img{
	width:100%;
	float:left;
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


	<div class="text-section">
		<img src="{{$post->uploaded_file}}"/>
		<h2>
			{{$post->title}}
		</h2>
		<p>
			{{$post->description_post}}
		</p>
		<p>
			{{$post->long_text}}
		</p>
	</div>