<!DOCTYPE html>
<html>
<head>
	<title>Bookyourcar.nl</title>
	
	<!--Important for the mediaqueries-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="http://localhost/programmeren-5/techcommunity/public/css/default.css" rel="stylesheet"/>
	<link href="http://localhost/programmeren-5/techcommunity/public/css/flexible.css" rel="stylesheet"/>

<body charset="UTF-8">
	@include('includes.header')
	<div class="wrap xl-center">
		<div class="col xl-8-10 xl-left">
			@yield('content')
		</div>
	</div>
	
	<!--Javascript loads behind the page for the loading speed-->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="../vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script>
   		CKEDITOR.replace( 'article-ckeditor' );
	</script> -->
</body>
</html>

