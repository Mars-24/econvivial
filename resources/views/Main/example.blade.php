<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg" />


<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
<title>Bienvenue dans eCentre Convivial</title>

<meta name="description" content="Favoriser l’accès des adolescents et des jeunes aux informations et aux services de soins et de santé en matière de la Santé Sexuelle.   Oeuvrer pour une Afrique où les jeunes et adolescents, en particulier les jeunes filles, accèdent facilement aux services adaptés en matière de la sexualité responsable et construisent leur équilibre." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
<meta name="category" content="Bienvenue sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="http://www.e-centreconvivial.org">
<meta name="robots" content="index, follow">

<script
src="dist/js/jquery-3.1.1.min.js"></script>


</head>

<style type="text/css">

	html, body{
		margin: 0;
		padding: 0;
		width: 100%;
	}
	body{
		font-family: Quicksand;
	}
	header{
		width: 100%;
		height: 100vh;
		background: url('images/7.jpg') no-repeat 50% 50%;
		background-size: cover;
	}

	.content{
		width: 90%;
		margin: 4em auto;
		font-size: 20px;
		line-height: 30px;
		text-align: justify;
	}

	.logo{
		position: fixed;
		float: left;
		margin: 16px 36px;
		color: #fff;
		font-weight: bold;
		font-size: 24px;
	}

	nav{
		position: fixed;
		width: 100%;
	}

	nav ul{
		list-style: none;
		background: rgb(0,0,0,0);
		overflow: hidden;
		color: #fff;
		padding: 0;
		text-align: center;
		margin: 0;
		transition: 1s;
	}

	nav.black ul{
		background:#000;
	}


	nav ul li{
		display: inline-block;
		padding: 20px;
	}

	nav ul li a{
		text-decoration: none;
		color: #fff;
		font-size: 20px;
	}

	.menu-icon{
		width: 100%;
		background: #000;
		text-align: right;
		box-sizing: border-box;
		padding: 15px 24px;
		cursor: pointer;
		color: #fff;
		display: none;
	}

	@media(max-width: 580px){
		.logo{
			position: fixed;
			top: 0;
			margin-top: 16px;
		}

		nav ul{
			max-height: 0px;
			background: #000;

		}

		nav.black ul{
			background: #000;
		}

		.showing{
			max-width: 70em;
		}

		nav ul li{
			box-sizing: border-box;
			width: 100%;
			padding: 24px 0;
			text-align: center;
		}

		.menu-icon{
			display: block;
		}
	}
</style>
<body>


<div class="wrapper">
	<header>
		<nav>
			<div class="menu-icon">
					<i class="fa fa-bars fa-2x"></i>
			</div>

			<div class="logo">
					LOGO
			</div>

			<div class="menu">
				                <ul>
                    <li class="active"><a href="{{route('accueil')}}">accueil</a></li>
                    <li><a href="{{route('web-tv')}}">web tv</a></li>
                    <li><a href="{{route('conseils')}}">conseils pratiques</a></li>
                    <li><a href="javascript:void(0)">Services<span class="glyphicon glyphicon-chevron-down down-ar"></span></a>
<!--                         <ul class="dropdown">
                            <li><a href="{{route('consultation')}}">consultation</a></li>
                            <li><a href="{{route('suiviGrossesse')}}">suivi de grossesse</a></li>
                            <li><a href="{{route('suivi-cycle-menstruel')}}">suivi du cycle menstruel</a></li>
                            <li><a href="{{route('planning-familial')}}">planning familial</a></li>
                            <li><a href="{{route('assistance-en-ligne')}}">assistance en ligne</a></li>
                        </ul> -->
                    </li>
                    <li><a href="">agenda</a></li>
                    <li><a href="">jeux</a></li>
                    <li><a href="{{route('contact')}}">contact</a></li>
                </ul>
			</div>
		</nav>
	</header>

	<div class="content">
		  <p>
                            Le Centre Convivial vous offre des services adaptés en matière de la prise en charge des infections sexuellement transmissible et du dépistage du VIH. En décrivant les maux dont vous souffrez, vous serez automatiquement référés vers une formation sanitaire
                            la plus proche pour une consultation approfondie, un personnel qualifié serrait immédiatement informé de votre arrivée et vous accordera une attention particulière
                        </p>
	</div>
</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){

		$(".menu-icon").on("click", function(){

				$("nav ul").toggleClass("showing");

		});

		$(window).on("scroll", function(){
			if($(window).scrollTop()){
				$("nav").addClass("black");
			}else{
				$("nav").removeClass("black");
			}
		});

	});
</script>
</html>