<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg" />

    <!--HTML5 shiv and Respond.js IE8 support of HTML5 and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudfare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script scr="https://cdnjs.cloudfare.com/ajax/libs/respond.min.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--stylesheet-->
    <link rel="stylesheet" href="dist/css/basic.css">

    <title> Suivi de grossesse </title>

<meta name="description" content="Notre objectif est de vous fournir des informations crédibles, rassurantes
                            et qui vous serviront tout au long de votre grossesse. Un suivi accessible et
                            personnalisé" />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
<meta name="category" content="Suivi de grossesse">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/suiviGrossesse">
<meta name="robots" content="index, follow">

</head>

<body>

<!-- top navbar -->
<nav>
    <div class="nav-fostrap" data-aos="fade-down">
        <div class="container">
            <div class="top-bar-container">
                <ul class="left-menu">

                </ul>
                <div class="right-menu">
                    <div class="wrap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="Rechercher...">
                            <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="login-menu">
                        @if(!Auth::check())
                            <div class="sign-up-link">
                                <i class="fas fa-user-plus"></i>
                                <a href="{{route('register')}}" >s'inscrire</a>
                            </div>
                            <div class="login-link">
                                <i class="fas fa-sign-in-alt"></i>
                                <a href="{{route('connexion')}}" >se connecter</a>
                            </div>
                        @else
                            <div class="login-link">
                                <i class="fa fa-user-circle"></i>
                                <a href="{{route('espacemembre')}}" >Mon espace membre</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- second navbar -->
<nav>
    <div class="nav-fostrap menu-bar" data-aos="fade-down">
        <div class="container">
            <div class="menu-bar-container">
                <div class="head-logo">
                    <a href="http://e-centreconvivial.org">
                        <img style="width:175px" src="dist/img/logo-convivial.jpg" alt="">
                        {{--<span>CENTRE </span>--}}
                    </a>
                </div>
                <ul>
                    <li ><a href="{{route('accueil')}}">accueil</a></li>
                    <li><a href="{{route('web-tv')}}">web tv</a></li>
                    <li ><a href="{{route('conseils')}}">conseils pratiques</a></li>
                    <li  class="active"><a href="javascript:void(0)">Services<span class="glyphicon glyphicon-chevron-down down-ar"></span></a>
                        <ul class="dropdown">
                            <li><a href="{{route('consultation')}}">consultation</a></li>
                            <li><a href="{{route('suiviGrossesse')}}">suivi de grossesse</a></li>
                             <li><a href="{{route('suivi-cycle-menstruel')}}">suivi du cycle menstruel</a></li>
                            <li><a href="{{route('planning-familial')}}">planning familial</a></li>
                            <li><a href="{{route('assistance-en-ligne')}}">assistance en ligne</a></li>
                        </ul>
                    </li>
                    <li><a href="">agenda</a></li>
                    <li><a href="">jeux</a></li>
                    <li><a href="{{route('contact')}}">contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="nav-bg-fostrap">
        <div class="navbar-fostrap"> <span></span> <span></span> <span></span> </div>
        <a href="" class="title-mobile">eCentre Convivial</a>
    </div>
</nav>

<!-- HERO SLIDER -->

<div class="slider-container slider-container--hero " data-aos="fade-down" style="height: auto;">
    <div class="slider">
        <div class="slider__item">
            <img src="images/services/grossesse.jpg" alt="" style="height: 350px;">
            <span class="slider__caption " data-aos="fade-right">
                <h3>Suivi de la Grossesse</h3>
                </span>
        </div>

    </div>
    <!--     <div class="slider__switch slider__switch--prev" data-ikslider-dir="prev">
            <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.89 17.418c.27.272.27.71 0 .98s-.7.27-.968 0l-7.83-7.91c-.268-.27-.268-.706 0-.978l7.83-7.908c.268-.27.7-.27.97 0s.267.71 0 .98L6.75 10l7.14 7.418z"/></svg></span>
        </div>
        <div class="slider__switch slider__switch--next" data-ikslider-dir="next">
            <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.25 10L6.11 2.58c-.27-.27-.27-.707 0-.98.267-.27.7-.27.968 0l7.83 7.91c.268.27.268.708 0 .978l-7.83 7.908c-.268.27-.7.27-.97 0s-.267-.707 0-.98L13.25 10z"/></svg></span>
        </div> -->
</div>

<div id="conseils__page__wrapper" class="page__wrapper">
    <div class="container">
        <section id="services">
            <!-- SERVICES TITLE -->
            <div class="section__title " data-aos="fade-down">
                <h2><i class="fas fa-female"></i> Suivi de la Grossesse</h2>
            </div>

            <!-- SERVICES CONTENT  -->
            <div class="row">
                <div class="col-md-12">
                    {{--<div class="services__content__title" data-aos="fade-down">--}}
                    {{--<i class="fas fa-stethoscope"></i>--}}
                    {{--<span>Consultation</span>--}}
                    {{--</div>--}}
                    <div class="services__content__desc" data-aos="fade-down">
                        <p>
                            Notre service organise le suivi de la grossesse, l’information et
                            l’accompagnement des futurs mères et des futurs pères pour tout ce qui
                            concerne l'évolution du fœtus et l’accueil de l’enfant. Des sages-femmes
                            proposent des informations, ainsi qu'une assistance en ligne et d’échanges pour les
                            futurs parents et les jeunes parents.
                        </p>

                        <p>
                            Notre objectif est de vous fournir des informations crédibles, rassurantes
                            et qui vous serviront tout au long de votre grossesse. Un suivi accessible et
                            personnalisé dans lequel vous retrouverez :
                        </p>

                        <p >

                            <ol style="margin-left:5%;">
                                <li>•	l'évolution de votre grossesse mois par mois (changements de votre corps,
                                    courbe de prise de poids pendant la grossesse)… Et celle de votre bébé : découvrez comment votre tout-petit grandit
                                    (taille et prise de poids) en vous, notamment grâce à des photos in utero ;</li>

                                <li>•	les conseils beauté, bien-être, sexo, santé pour profiter un maximum de ces neuf mois ;</li>

                                <li>•	tout ce qu’il faut savoir pour être prête le jour de l’accouchement (on vous expliquera
                                    les contractions, la péridurale, la délivrance etc.) ;</li>

                                <li>•	des astuces pour soulager les maux et les symptômes de grossesse (on s’en passerait bien de ces vilaines nausées,
                                    des vergetures, du masque de grossesse…) et pour rester à l’écoute de son corps ;</li>
                            </ol>
                        </p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="services__more" data-aos="fade-down" style="text-align: center;">
                        <a class="btn btn-primary" style="background: white; border : blue solid 1px; color: blue;" href="{{route('suivi-de-grossesse')}}">Suivre ma grossesse</a>
                    </div>
                </div>
            </div>
        </section>


    </div>
</div>

@include("Footer.footer")

</body>

</html>