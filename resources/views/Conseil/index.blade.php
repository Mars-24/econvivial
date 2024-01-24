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

    <title> Conseils Pratiques | eCentre Convivial</title>

<meta name="description" content="Le test de dépistage est une analyse de sang qui permet de connaître son statut sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Conseils pratiques sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/conseils">
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
                    <li  class="active"><a href="{{route('conseils')}}">conseils pratiques</a></li>
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
        <a href="" class="title-mobile">e-centre convivial</a>
    </div>
</nav>

    <!-- HERO SLIDER -->

    <div class="slider-container slider-container--hero " data-aos="fade-down" style="height: auto;">
        <div class="slider">
            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE1.jpg" alt="" style="height: 350px;">
                <span class="slider__caption " data-aos="fade-right">
<!--                     <h3>
                        CENTRE D'ECOUTE ET D'ORIENTATION <br>
                        DES JEUNES EN MATIERE DE LA <br>
                        SANTE SEXUELLE
                    </h3> -->
                </span>
            </div>
            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE2.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
<!--                     <h3>
                         Favoriser l’accès des adolescents et des jeunes aux informations et aux services de soins et de santé en matière de la Santé Sexuelle
                    </h3> -->
                </span>
            </div>
            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE3.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div>

            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE4.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div>

<!--             <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE5.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div> 

            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE6.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div> -->

<!--             <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE7.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div>  

            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE8.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div> 

            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE9.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div> 

            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE10.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div> 

            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE11.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div>

            <div class="slider__item">
                <img src="dist/img/banniere_conseils/MODULE12.jpg" alt="" style="height: 350px;">
                <span class="slider__caption">
                </span>
            </div>  -->     
        </div>
        <div class="slider__switch slider__switch--prev" data-ikslider-dir="prev">
            <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.89 17.418c.27.272.27.71 0 .98s-.7.27-.968 0l-7.83-7.91c-.268-.27-.268-.706 0-.978l7.83-7.908c.268-.27.7-.27.97 0s.267.71 0 .98L6.75 10l7.14 7.418z"/></svg></span>
        </div>
        <div class="slider__switch slider__switch--next" data-ikslider-dir="next">
            <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.25 10L6.11 2.58c-.27-.27-.27-.707 0-.98.267-.27.7-.27.968 0l7.83 7.91c.268.27.268.708 0 .978l-7.83 7.908c-.268.27-.7.27-.97 0s-.267-.707 0-.98L13.25 10z"/></svg></span>
        </div>
    </div>
    <div id="conseils__page__wrapper" class="page__wrapper">
        <div class="container">

            <h3 class="text-center" style="text-transform: uppercase;margin-bottom: 20px;">Les différents conseils pratiques en matière de la santé sexuelle</h3>
<!--             <div class="row items__row">
                <div class="col-md-8">
                    <div class="conseils-slider slider-container--hero " data-aos="fade-down">
                        <div class="slider">
                            <div class="slider__item">
                                <img src="dist/img/slider2.jpg" alt="">
                                <span class="slider__caption">
                                    <h4>
                                         Favoriser l’accès des adolescents et des jeunes aux informations et aux services de soins et de santé en matière de la Santé Sexuelle
                                    </h4>
                                </span>
                            </div>
                            <div class="slider__item">
                                <img src="dist/img/slider1.jpg" alt="">
                                <span class="slider__caption">
                                    <h4>
                                         Oeuvrer pour une Afrique où les jeunes et adolescents, en particulier les jeunes filles, accèdent facilement aux services adaptés en matière de la sexualité responsable et construisent leur équilibre.
                                    </h4>
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
                </div>
                <div class="col-md-4">
                    <div class="row first__item__spacing" data-aos="fade-down">
                        <div class="col-md-12">
                            <a href="#" class="card__link" >
                                <div class="card">
                                    <div class="img-wrapper">
                                        <img src="dist/img/conseils/preso.jpg" alt="Avatar"  >
                                    </div>
                                    <div class="card__desc">
                                        <span>Préservatif masculin</span>
                                        <span>446</span>
                                    </div>
                                    <div class="card__top__caption">
                                        Préservatif masculin
                                    </div> 
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" data-aos="fade-down">
                            <a href="#" class="card__link">
                                <div class="card">
                                    <div class="img-wrapper">
                                        <img src="dist/img/conseils/vih.jpg" alt="Avatar"  >
                                    </div>
                                    <div class="card__desc">
                                        <span>VIH/SIDA</span>
                                        <span>446</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="row">
                @foreach($conseils as $conseil)
                <div class="col-md-4" data-aos="fade-down" style="margin-top:30px; margin-bottom: 30px;">
                    <a href="description-conseil-pratique?ref={{$conseil->id}}&token={{Session::token()}}" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="public/uploads/img/{{$conseil->image}}" alt="Aucune image trouvée"  >
                            </div>
                            <div class="card__desc">
                                <span>{{\Illuminate\Support\Str::limit($conseil->description, 100)}} (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                                <span>{{\Illuminate\Support\Str::limit($conseil->titre, 50)}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                    @endforeach
            </div>

            <div class="row items__row">
                <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/ist.jpg" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>C'est une contamination/contraction de microbes pathogènes lors des rapports sexuels non protégés avec un partenaire infecté ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Infection Sexuellement Transmissible (IST)</span> 
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/sida.gif" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>Le Sida (maladie) est un ensemble de signes dû à la destruction du système immunitaire par le VIH (virus). Une personne infectée par le VIH peut développer les IO  ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Le VIH / SIDA</span> 
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/depistage.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>Le test de dépistage est une analyse de sang qui permet de connaître son statut sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Le dépistage volontaire du VIH</span> 
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row items__row">
                <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/cycle_mentru.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>Le cycle menstruel va du 1er jour des règles jusqu'au dernier jour qui précède les règles suivantes. Il peut varier entre 21 à 35 jours ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Le cycle menstruel</span> 
                            </div>
                        </div>
                    </a>
                </div>
               <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/hygiene_sex.png" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>L’hygiène sexuelle ce sont les soins et entretiens à apporter aux parties intimes que l’on soit garçon ou fille. Chez les garçons que vous soyez circoncis ou pas ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Hygiène sexuelle et menstruelle</span> 
                            </div>
                        </div>
                    </a>
                </div>
               <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/grossesse_precoce.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span> Une grossesse non désirée est une grossesse qui survient au moment où l’on ne s’y attend pas. Très tard après 18 ans, l’on peut se confronter à une grossesse ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Grossesse précoce et non désirée</span> 
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row items__row">
               <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/preservatif_masculin.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>Le préservatif masculin (condom ou capote) est un étui mince et souple imperméable au sang ainsi qu’au sperme et sécrétions vaginales ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Le préservatif masculin</span> 
                            </div>
                        </div>
                    </a>
                </div>
               <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/preservatif_feminin.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>C’est un tube pré-lubrifié, comme un préservatif masculin. Mais, au lieu de recouvrir le pénis, il tapisse la paroi vaginale pour créer une ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Le préservatif féminin</span> 
                            </div>
                        </div>
                    </a>
                </div>
               <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/hymen.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>L'hymen est la membrane qui se trouve à l'entrée du vagin et est déchirée généralement lors du premier rapport sexuel. ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>L’hymen</span> 
                            </div>
                        </div>
                    </a>
                </div>
            </div>

                       <div class="row items__row">
               <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/abstinence_sexuelle.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>C’est l’action de se dispenser, de s'empêcher ou de se priver, notamment d'aliments, de boissons ou de plaisirs sexuels. C’est l’action de se priver ou de se retenir de  ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>L’abstinence sexuelle</span> 
                            </div>
                        </div>
                    </a>
                </div>
               <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/cd4.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>Les cellules CD4, ou lymphocytes T, sont des globules blancs qui organisent la réponse du système immunitaire contre les infections. ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>Le taux de cellules CD4</span> 
                            </div>
                        </div>
                    </a>
                </div>
               <div class="col-md-4" data-aos="fade-down">
                    <a href="#" class="card__link">
                        <div class="card">
                            <div class="img-wrapper" style="margin-top: 25px;">
                                <img src="dist/img/conseils/charge_virale.jpg" width="100%" alt="Avatar"  >
                            </div>
                            <div class="card__desc">
                                <span>La charge virale est le terme utilisé pour décrire la quantité de VIH qui se trouve dans votre sang. Plus vous avez de VIH dans le sang ... (Lire la suite)</span>
                            </div>
                            <div class="card__top__caption" style="width: 100%;">
                               <span>La charge virale</span> 
                            </div>
                        </div>
                    </a>
                </div>
            </div> 
        </div>
    </div>


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


@include("Footer.footer")


</body>

</html>