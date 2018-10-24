@section('header')
<style>
/*Navigation*/

nav{
	height: 80px;
}

nav ul{
	float: right;
	margin-right: 5%;
	height:80px;
	list-style:none;
}

nav ul li{
	display: inline-block;
}

nav ul li:first-child{
	display: none;
}

.menu{
	display:none;
}

nav ul li a{
	display: block;
	padding: 25px 30px;
	font-family: 'Ar Cena';
	color: black;
	text-decoration: none;
	font-size: 20px;
	-webkit-transition: all 0.1s ease-in-out;
	-moz-transition: all 0.1s ease-in-out;
	-o-transition: all 0.1s ease-in-out;
	transition: all 0.1s ease-in-out;
}

nav ul li a i{
	margin-right: 5px;
}

nav ul li a.visit{
	font-weight:bold;
	color:rgb(136,188,92);
}

.Logo img{
	float:left;
	height:60px;
	padding:10px;
}

/*Footer*/
.Wrap-Footer{
	background-color:#282828;
	margin-top:20px;	
}

.FooterLeft, .FooterRight{
	background-color:#282828;
}

.FooterLeft{
	float:left;
}

.FooterRight{
	float:right;
}

.bold{
	font-weight:1000;
	color:rgb(136,188,92) !important;
}

.TextFooter{
	padding:10px;
	padding-left:15px;
	padding-right:15px;
	color:#C8C8C8;
	font-size:20px;
	text-align:left;
}

.IconsFooter{
	display:inline-block;
}

.Email{
	height:80px;
	margin:10px;
	margin-right:20px;
}

.Facebook, .Linkedin{
	height:60px;
	margin:20px;
	margin-top:-10px;
}

/*Media queries*/
@media (max-width: 970px){
	.Logo img{
		height:40px !important;
		padding-top:20px;
		padding-bottom:20px;
		padding-right:10px;
		padding-left:10px;
	}
}

@media (max-width: 768px) {
	nav{
	    height: 80px;
	}

	nav ul{
		position: relative;
		z-index: 99;
		right: 0;
		width: 180px;
	}

	nav ul li{
		display: none;

	}

	nav ul li:first-child{
		display: inline-block !important;
		cursor: pointer;
		border: 0px !important;
	}

	nav ul li:first-child a{
		border: 0px;
	}

	nav ul li a{
		display: block;
	    padding: 25px 50px;
	   	text-decoration: none;
	    color: black;
	    background: white;
	    text-align: left;
	}

	nav ul li a:hover{
		color:rgb(136,188,92)
	}

	/*Zijmenu inlogscherm*/
	.Slide{
		width:75px !important;
		font-size:12px !important;
	}
}

@media (max-width: 420px){
	.Logo img{
		height:25px !important;
		padding-top:27px;
		padding-bottom:28px;
		padding-right:10px;
		padding-left:10px;
	}
}

@media (max-width: 420px){
	.Logo img{
		height:20px !important;
		padding-top:30px;
		padding-bottom:30px;
		padding-right:10px;
		padding-left:10px;
	}
}
</style>

<div class="collum ExtraLarge-1">
 	<div class="Logo">
		<a href="index.php">
			<img src="uploads/Logo.png"/>
		</a>
	</div>
	<nav>
		<ul>
			<li class="menu"><a><b>&equiv;</b>  Menu</a></li>
			<li>
				<a href="index.php" class="visit">Home</a>
			</li> 
			<li class="hover">
				<a href="Contact.php">Contact</a>
			</li>
			<li class="hover">
				<a href="Login.php">Login</a>
			</li>
		</ul>
	</nav>
</div>

        @show