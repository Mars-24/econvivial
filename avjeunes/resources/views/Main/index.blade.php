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


<meta name="description" content="Favoriser l’accès des adolescents et des jeunes aux informations et aux services de soins et de santé en matière de la Santé Sexuelle.   Oeuvrer pour une Afrique où les jeunes et adolescents, en particulier les jeunes filles, accèdent facilement aux services adaptés en matière de la sexualité responsable et construisent leur équilibre." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
<meta name="category" content="Bienvenue sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="http://www.e-centreconvivial.org">
<meta name="robots" content="index, follow">

<!-- <style type="text/css">
    .overlay__text{
        margin-top: 72px;
    }
</style> -->
<title>Bienvenue dans eCentre Convivial</title>
<script src="dist/js/jquery-3.1.1.min.js"></script>
<script src="dist/js/jquery.waypoints.min.js"></script>
<script src="dist/js/aos.js"></script>
<script src="dist/js/wow.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/slider.js"></script>
<script src="dist/js/slick.js"></script>
<script src="dist/js/main.js"></script>
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
                            <div class="myLogo">
                            <img style="width:175px"   src="dist/img/logo-convivial.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <ul>
                        <li class="active"><a href="{{route('accueil')}}">accueil</a></li>
                        <li><a href="{{route('web-tv')}}">web tv</a></li>
                        <li><a href="{{route('conseils')}}">conseils pratiques</a></li>
                        <li><a href="javascript:void(0)">Services<span class="glyphicon glyphicon-chevron-down down-ar"></span></a>
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
            <a href="{{route('accueil')}}" class="title-mobile"><img style="width:175px;margin-top:-10px;"  src="dist/img/logo-convivial.jpg"  alt=""></a>
        </div>
    </nav>

    <!-- HERO SLIDER -->

    <div class="slider-container slider-container--hero " data-aos="fade-down">
        <div class="slider">
            <div class="slider__item">
                <img src="dist/img/2.jpg" alt="" >
                <span class="slider__caption " data-aos="fade-right">
                    <h3>
                        CENTRE D'ECOUTE ET D'ORIENTATION <br>
                        DES JEUNES EN MATIERE DE LA <br>
                        SANTE SEXUELLE
                    </h3>
                </span>
            </div>
            <div class="slider__item">
                <img src="dist/img/1.jpg" alt="" >
                <span class="slider__caption">
                    <h3>
                       Favoriser l’accès des adolescents et des jeunes aux informations et aux services de soins et de santé en matière de la Santé Sexuelle
                   </h3>
               </span>
           </div>
           <div class="slider__item">
            <img src="dist/img/3.jpg" alt="" >
            <span class="slider__caption">
                <h3>
                   Oeuvrer pour une Afrique où les jeunes et adolescents, en particulier les jeunes filles, accèdent facilement aux services adaptés en matière de la sexualité responsable et construisent leur équilibre.
               </h3>
           </span>
       </div>
   </div>
   <div class="slider__switch slider__switch--prev" data-ikslider-dir="prev">
    <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.89 17.418c.27.272.27.71 0 .98s-.7.27-.968 0l-7.83-7.91c-.268-.27-.268-.706 0-.978l7.83-7.908c.268-.27.7-.27.97 0s.267.71 0 .98L6.75 10l7.14 7.418z"/></svg></span>
</div>
<div class="slider__switch slider__switch--next" data-ikslider-dir="next">
    <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.25 10L6.11 2.58c-.27-.27-.27-.707 0-.98.267-.27.7-.27.968 0l7.83 7.91c.268.27.268.708 0 .978l-7.83 7.908c-.268.27-.7.27-.97 0s-.267-.707 0-.98L13.25 10z"/></svg></span>
</div>
</div>

<!-- PAGE CONTENT -->
<div class="page__wrapper">
    <div class="container">
        <section id="services">
            <!-- SERVICES TITLE -->
            <div class="section__title " data-aos="fade-down">
                <h2>services</h2>
            </div>

            <!-- SERVICES CONTENT  -->
            <div class="row">
                <div class="col-md-3">
                    <div class="services__content__title" data-aos="fade-down">
                        <i class="fas fa-stethoscope"></i>
                        <span>Consultation</span>
                    </div>
                    <div class="services__content__desc" data-aos="fade-down">
                        <p>
                            Le Centre Convivial vous offre des services adaptés en matière de la prise en charge des infections sexuellement transmissible et du dépistage du VIH. En décrivant les maux dont vous souffrez, vous serez automatiquement référés vers une formation sanitaire
                            la plus proche pour une consultation approfondie, un personnel qualifié serrait immédiatement informé de votre arrivée et vous accordera une attention particulière
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="services__content__title " data-aos="fade-down">
                        <i class="fas fa-female"></i>
                        <span>Suivi de grossesse</span>
                    </div>
                    <div class="services__content__desc" data-aos="fade-down">
                        <p>
                            Notre service organise le suivi de la grossesse, l’information et l’accompagnement des futurs mères et des futurs pères pour tout ce qui concerne l'évolution du foetus et l’accueil de l’enfant. Des sages-femmes proposent des informations, ainsi qu'une
                            assistance en ligne et d’échanges pour les futurs parents et les jeunes parents.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="services__content__title " data-aos="fade-down">
                        <i class="fas fa-users"></i>
                        <span>Planning familial</span>
                    </div>
                    <div class="services__content__desc" data-aos="fade-down">
                        <p>
                            Envi d'éviter des grossesses précoces ou non désirées? Désire d'opter pour une méthode contraceptive et planifier sa grossesse? Le Centre Convivial vous offre toutes les méthodes contraceptives nécessaires et vous met en relation avec une formation sanitaire
                            la plus proche pour qui vous aidera à faire un choix éclairé et vous m'aider à sous la méthode convenable.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="services__content__title" data-aos="fade-down">
                        <i class="fas fa-user-md"></i>
                        <span>Assitance en ligne</span>
                    </div>
                    <div class="services__content__desc " data-aos="fade-down">
                        <p>
                            Notre personnel de santé est à votre disposition 7j/7 pour repondre à toutes vos questions et preoocupations. Vous désirez vous adresser à un Conseiller Psychosocial, à une Sage-femme, à un infirmier ou à un Médecin? Accédez au menu et écrivez au personnel
                            de votre choix.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services__more" data-aos="fade-down">
                        <a href="{{route('consultation')}}">Lire la suite</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services__more" data-aos="fade-down">
                        <a href="{{route('suiviGrossesse')}}">Lire la suite</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services__more" data-aos="fade-down">
                        <a href="{{route('planning-familial')}}">Lire la suite</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services__more" data-aos="fade-down">
                        <a href="{{route('assistance-en-ligne')}}">Lire la suite</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-md-6">
                <section id="webtv">
                    <!-- WEB TV TITLE -->
                    <div class="section__title " data-aos="fade-down">
                        <h2>web tv</h2>
                    </div>

                    <div class="section__videos" data-aos="fade-down">
                        <div class="row">
                            <div class="col-md-12">
                                <iframe width="100%" height="415" src="https://www.youtube.com/embed/F4RyKgQuSik" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
<!--                             <div class="row">
                                <div class="col-md-4">
                                    <div class="video-container">
                                        <iframe width="33.33%" src="https://www.youtube.com/embed/agAtPbPKams" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="video-container">
                                        <iframe width="33.33%" src="https://www.youtube.com/embed/kQXNlLA42DI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="video-container">
                                        <iframe width="33.33%" src="https://www.youtube.com/embed/Lm1eGU3DXXo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </section>
                </div>

                <div class="col-md-6">
                    <section id="conseils">
                        <!-- CONSEILS TITLE -->
                        <div class="section__title " data-aos="fade-down">
                            <h2>conseils pratiques</h2>
                        </div>

                        <!-- CONSEILS CONTENT -->
                        <div class="thumbs" data-aos="fade-down">

                           <div class="thumb__item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card__one ">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/ist.jpg" width="340" height="280" />

                                                <div class="overlay__text"  >
                                                    <p> IST </p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/sida.gif" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>VIH/Sida</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/depistage.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>Dépistage VIH</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card__one ">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/preservatif_masculin.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p> Le préservatif masculin </p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/preservatif_feminin.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>Le preservatif féminin</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/hymen.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>L'hymen</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="thumb__item">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/cycle_mentru.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>Cycle Menstruel</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/hygiene_sex.png" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>Hygiène sexuelle</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/grossesse_precoce.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>Grossesse Précoce et non désirée</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/abstinence_sexuelle.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>Abstinence Sexuelle</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/cd4.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>Le taux de cellules CD4</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card__one">
                                        <figure class="card__img">
                                            <a href="#">
                                                <img src="dist/img/conseils/charge_virale.jpg" width="340" height="280" />

                                                <div class="overlay__text">
                                                    <p>La charge virale</p>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>
                </div>
            </div>

            <section id="partenaires">

                <!-- PARTNAIR TITLE -->
                <div class="section__title wow fadeInDown">
                    <h2>partenaires</h2>
                </div>

                <!-- PARTNER SLIDER -->
                <div class="partner__container">
                    <div class="partner__slider wow fadeInDown">
                        <div>
                            <img src="dist/img/logos/CNLS.jpg">
                        </div>
                        <div style="margin-top:3%">
                            <img src="dist/img/logos/Logo AVJeunes.jpg">
                        </div>
                        <div>
                            <img src="dist/img/logos/UNFPA.jpg">
                        </div>
                        <div>
                            <img src="dist/img/logos/ONUSIDA.png">
                        </div>
                        <div style="margin-top:3%">
                            <img src="dist/img/logos/CRL.jpg">
                        </div>
                        <div>
                            <img src="dist/img/logos/m6informatique.jpg">
                        </div>
                        <div>
                            <img src="dist/img/logos/drapeau-etats-unis-usa.jpg">
                        </div>
                    </div>
                </div>

                <div class="info__row">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="services__content__title wow fadeInDown" data-wow-delay="0.3s">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Agenda</span>
                            </div>
                            <div class="services__content__desc wow fadeInDown" data-wow-delay="0.5s">
                                <p>
                                    Rester à l'écoute de tous les événements dans votre pays, en Afrique ou dans le monde en lien avec la santé sexuelle et de la reproduction ou connexe. Vous avez également la possibilité de programmer vos activités ou rendez-vous.
                                </p>
                                <p><a href="{{route('agenda')}}">Lire la suite</a></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services__content__title wow fadeInDown" data-wow-delay="0.3s">
                                <i class="fas fa-gamepad"></i>
                                <span>Jeux</span>
                            </div>
                            <div class="services__content__desc wow fadeInDown" data-wow-delay="0.5s">
                                <p>
                                    Le Centre Convivial vous propose des jeux Puzzle et des questions Quizz pouvant vous permettre de gagner des prix.
                                </p>
                                   <p><a href="{{route('jeux')}}">Lire la suite</a></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services__content__title wow fadeInDown" data-wow-delay="0.3s">
                                <i class="fas fa-user-plus"></i>
                                <span>Inscription</span>
                            </div>
                            <div class="services__content__desc wow fadeInDown" data-wow-delay="0.5s">
                                <p>
                                    L'accès aux services offerts par le Centre Convivial necessite l'ouverture d'un compte. Le Web TV et les Conseils pratiques peuvent être consultés sans ouverture de compte par tout utilisateur non inscrit ou non résident dans l'un des pays que couvre
                                    le Centre Convivial.
                                </p>
                                   <p><a href="{{route('inscription')}}">Lire la suite</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>

    @include("Footer.footer")

    <!-- Modal --><!-- 
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle">Site en construction</h1>
                </div>
                <div class="modal-body">
                    Le site est actuellement en Construction. A cet effet, les liens et autres éléments dynamiques ne fonctionneront pas
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Connectez-vous</h3>
                </div>
                <div class="modal-body">
                    <form class="" action="javascript:void(0)" method="post">
                        <div class="row">
                            <div class="col-md-12 input__container">
                                <span class="fas fa-user"></span>
                                <input type="email" id="user" placeholder="Votre email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 input__container">
                                <span class="fas fa-lock"></span>
                                <input type="password" id="pass" placeholder="Votre mot de passe">
                            </div>
                        </div>
                        <div class="login__info">
                            <div class="login__check">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Se souvenir de moi</label>
                                </div>
                            </div>
                            <div class="login__pass">
                                <a href="">Mot de passe oublié ?</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 input__container">
                                <button type="submit" class="login__submit">
                                    <i class="fas fa-sign-in-alt"></i> Se connecter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Inscrivez-vous</h3>
                </div>
                <div class="modal-body">
                    <form class="" action="javascript:void(0)" method="post">
                        <div class="row signup__group">
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-user"></span>
                                <input type="text" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-calendar-alt"></span>
                                <input type="text"  placeholder="Date de naissance">
                            </div>
                        </div>
                        <div class="row signup__group">
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-genderless"></span>
                                <select >
                                    <option selected>Sexe</option>
                                    <option value="1">Homme</option>
                                    <option value="2">Femme</option>
                                </select>
                            </div>
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-envelope"></span>
                                <input type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row signup__group">
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-phone"></span>
                                <input type="text" placeholder="Téléphone">
                            </div>
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-map-marker"></span>
                                <select >
                                    <option selected>Pays</option>
                                    <option value="1">Bénin</option>
                                    <option value="2">Togo</option>
                                </select>
                            </div>
                        </div>
                        <div class="row signup__group">
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-lock"></span>
                                <input type="password" placeholder="Mot de passe">
                            </div>
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-lock"></span>
                                <input type="password" placeholder="Confirmer mot de passe">
                            </div>
                        </div>
                        <div class="row signup__validate">
                            <button type="submit" class="signup__submit">
                                <i class="fas fa-check"></i> Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
