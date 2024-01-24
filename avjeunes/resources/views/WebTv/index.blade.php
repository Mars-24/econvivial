<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="favicon.jpg" />

    <!--HTML5 shiv and Respond.js IE8 support of HTML5 and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudfare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script scr="https://cdnjs.cloudfare.com/ajax/libs/respond.min.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!--stylesheet-->
    <link rel="stylesheet" href="dist/css/basic.css">

    <title>Web Tv | eCentre Convivial</title>

    <meta name="description" content="Visulaiser nos séries sur eCentre Convivial" />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
<meta name="category" content="Web TV">
<meta name="distribution" content="global">
<meta name="identifier-url" content="http://www.e-centreconvivial.org/web-tv">
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
                        {{--<span>CENTRE CONVIVIAL</span>--}}
                    </a>
                </div>
                <ul>
                    <li ><a href="{{route('accueil')}}">accueil</a></li>
                    <li class="active"><a href="{{route('web-tv')}}">web tv</a></li>
                    <li><a href="{{route('conseils')}}">conseils pratiques</a></li>
                    <li><a href="javascript:void(0)">Services<span class="glyphicon glyphicon-chevron-down down-ar"></span></a>
                        <ul class="dropdown">
                            <li><a href="{{route('consultation')}}">consultation</a></li>
                            <li><a href="{{route('suiviGrossesse')}}">suivi de grossesse</a></li>
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


    <div id="webtv__page__wrapper" class="page__wrapper">
        <div class="container">
            <div class="row items__row">
                <div class="col-md-8">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/3YVOZYpTyAE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row first__item__spacing" data-aos="fade-down">
                        <div class="col-md-12">
                            <div class="video-container">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/jWZFsLdD6lY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" data-aos="fade-down">
                            <div class="video-container">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/lkpq96ngKOc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row items__row">
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/kQXNlLA42DI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/agAtPbPKams" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/nXEczG8klVk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row items__row">
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/F4RyKgQuSik" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/JEFvz1xe6Ic" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/gIxUHd6Zxjo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row items__row">
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/3UeLwOUBrqU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/p-r6NJ_qwpg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/z4Q9loUsIdU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
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
                                <input type="password" id "pass" placeholder="Votre mot de passe">
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
