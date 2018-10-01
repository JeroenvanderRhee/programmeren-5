<h1>News</h1>

<style>
article{
	margin-top:10px;
	margin-bottom:10px;
	border:1px solid black;
}

img{
	max-width:250px;
	float:left;

}
h2{
	font-size: 20pt;
    font-family: "Ar Cena";
    padding: 10px;
    margin: 0px;
    color:#0D8DFF;	
}

p{
	padding:10px;
	font-weight:500;
	margin:0;
	float:right;
	width:calc(100% - 250px);
}

a{
	color:#0D8DFF;	
	font-weight:500;
	text-decoration:none;
	padding:10px;
}

a:hover{
	text-decoration: underline;
}


</style>

<article>
	<img src="http://www.wassenaarders.nl/images/2016/08/11/dory_large.jpg"/>
	<h2>
	{{$title}}
	</h2>
	<p>
		{{$description}}
	</p>

	<a href="/posts/{{$url}}">Read more...</a>
	
</article>
		