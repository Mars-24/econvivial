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

    <title>Contact | eCentre Convivial</title>

<meta name="description" content="" />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Contactez-nous">
<meta name="distribution" content="global">
<meta name="identifier-url" content="http://www.e-centreconvivial.org/contact">
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
                    <li class="active"><a href="{{route('contact')}}">contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="nav-bg-fostrap">
        <div class="navbar-fostrap"> <span></span> <span></span> <span></span> </div>
        <a href="" class="title-mobile">e-centre convivial</a>
    </div>
</nav>

<div id="contact__page" class="page__wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="dist\img\Image.png" alt="">
            </div>
            <div class="col-md-7">
                <div class="contact__page__title">
                    <h2>Contactez-nous</h2>
                </div>
                <div class="contact__page__text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam volutpat ligula augue, in posuere justo aliquam a. In vitae porttitor velit. Quisque vel volutpat quam. Nulla ultrices urna in nulla venenatis lobortis. Integer venenatis
                        euismod viverra. Mauris eget sem neque. Integer vestibulum tincidunt arcu eu lobortis. Aenean sit amet luctus ipsum, placerat sollicitudin libero. Nam magna magna, imperdiet quis neque et, consequat mollis nulla. Donec sollicitudin
                        nisl turpis, vel blandit mi commodo eget. Etiam varius felis eget leo porttitor dapibus. Aenean vel aliquam elit.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact__page__title">
                            <h4>Adresse</h4>
                        </div>
                        <div class="contact__page__text">
                            <p> 169, Boulevard du 13 janvier, Lomé-TOGO</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact__page__title">
                            <h4>Phone</h4>
                        </div>
                        <div class="contact__page__text">
                            <p> +228 92 39 11 71</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact__page__title">
                            <h4>Email</h4>
                        </div>
                        <div class="contact__page__text">
                            <p> contacts@avjeunes.org</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 insec__text text-center">
                <h1>ENVOYEZ-NOUS UN MESSAGE</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact__form__wrapper">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputNom">Nom</label>
                                    <input type="text" class="form-control" id="inputNom">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 insec__text text-center">
                <h1>LOCALISATION</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact__map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.81499642836!2d1.210257!3d6.1369166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1023e1eeb714a33f%3A0xb97a31ae86404c2d!2sBanque+Togolaise+du+Commerce+et+de+l&#39;Industrie!5e0!3m2!1sfr!2stg!4v1519408522050" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                            <input type="password" id=pass" placeholder="Votre mot de passe">
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
                            <input type="text" placeholder="Date de naissance">
                        </div>
                    </div>
                    <div class="row signup__group">
                        <div class="col-md-6 signup__input">
                            <span class="fas fa-genderless"></span>
                            <select>
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
                            <select>
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
