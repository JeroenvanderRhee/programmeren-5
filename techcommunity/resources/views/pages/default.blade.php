<!DOCTYPE html>
<html>
<head>
	<title>Bookyourcar.nl</title>
	
	<!--Important for the mediaqueries-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Declare lettertypes-->
	<link href="https://fonts.googleapis.com/css?family=Karla|Source+Sans+Pro" rel="stylesheet">

	<!--Declare CSS-->
	<!-- <link rel="stylesheet" href="css/blocks .css">
	<link rel="stylesheet" href="css/nav.css">
	<link rel="stylesheet" href="css/home.css"> -->
</head>
<body charset="UTF-8">
	<div class="container">
		@include('includes.header')

		@yield('content')


		<!--Javascript loads behind the page for the loading speed-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	</div>
</body>
</html>

