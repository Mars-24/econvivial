<?php
session_start();

if (!isset($_SESSION['psd'])){
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="favicon.jpg" />

    <!--HTML5 shiv and Respond.js IE8 support of HTML5 and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudfare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script scr="https://cdnjs.cloudfare.com/ajax/libs/respond.min.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!--stylesheet-->
    <link rel="stylesheet" href="dist/css/basic.css">

    <title>e-centre convivial</title>
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
                            <div class="sign-up-link">
                                <i class="fas fa-user-plus"></i>
                                <a href="#" data-toggle="modal" data-target="#signupModal">s'inscrire</a>
                            </div>
                            <div class="login-link">
                                <i class="fas fa-sign-in-alt"></i>
                                <a href="#" data-toggle="modal" data-target="#loginModal">se connecter</a>
                            </div>
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
                        <a href="/">
                            <img style="width:50px" src="dist/img/logo-alt.jpg" alt="">
                            <span>CENTRE CONVIVIAL</span>
                        </a>
                    </div>
                    <ul>
                        <li class="active"><a href="index.html">accueil</a></li>
                        <li><a href="">web tv</a></li>
                        <li><a href="conseils-pratiques.html">conseils pratiques</a></li>
                        <li><a href="javascript:void(0)">Services<span class="glyphicon glyphicon-chevron-down down-ar"></span></a>
                            <ul class="dropdown">
                                <li><a href="">consultation</a></li>
                                <li><a href="">suivi de grossesse</a></li>
                                <li><a href="">planning familial</a></li>
                                <li><a href="">assistance en ligne</a></li>
                            </ul>
                        </li>
                        <li><a href="">agenda</a></li>
                        <li><a href="">jeux</a></li>
                        <li><a href="">contact</a></li>
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

    <div class="slider-container slider-container--hero " data-aos="fade-down">
        <div class="slider">
            <div class="slider__item">
                <img src="dist/img/2.jpg" alt="">
                <span class="slider__caption " data-aos="fade-right">
                    <h3>
                        CENTRE D'ECOUTE ET D'ORIENTATION <br>
                        DES JEUNES EN MATIERE DE LA <br>
                        SANTE SEXUELLE
                    </h3>
                </span>
            </div>
            <div class="slider__item">
                <img src="dist/img/1.jpg" alt="">
                <span class="slider__caption">
                    <h3>
                         Favoriser l�acc�s des adolescents et des jeunes aux informations et aux services de soins et de sant� en mati�re de la Sant� Sexuelle
                    </h3>
                </span>
            </div>
            <div class="slider__item">
                <img src="dist/img/3.jpg" alt="">
                <span class="slider__caption">
                    <h3>
                         Oeuvrer pour une Afrique o� les jeunes et adolescents, en particulier les jeunes filles, acc�dent facilement aux services adapt�s en mati�re de la sexualit� responsable et construisent leur �quilibre.
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
                                Le Centre Convivial vous offre des services adapt�s en mati�re de la prise en charge des infections sexuellement transmissible et du d�pistage du VIH. En d�crivant les maux dont vous souffrez, vous serez automatiquement r�f�r�s vers une formation sanitaire
                                la plus proche pour une consultation approfondie, un personnel qualifi� serrait imm�diatement inform� de votre arriv�e et vous accordera une attention particuli�re
                            </p>
                        </div>
                        <div class="services__more">
                            <a href="">Lire plus</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="services__content__title " data-aos="fade-down">
                            <i class="fas fa-female"></i>
                            <span>Suivi de grossesse</span>
                        </div>
                        <div class="services__content__desc" data-aos="fade-down">
                            <p>
                                Notre service organise le suivi de la grossesse, l�information et l�accompagnement des futurs m�res et des futurs p�res pour tout ce qui concerne l'�volution du foetus et l�accueil de l�enfant. Des sages-femmes proposent des informations, ainsi qu'une
                                assistance en ligne et d��changes pour les futurs parents et les jeunes parents.
                            </p>
                        </div>
                        <div class="services__more">
                            <a href="">Lire plus</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="services__content__title " data-aos="fade-down">
                            <i class="fas fa-users"></i>
                            <span>Planning familial</span>
                        </div>
                        <div class="services__content__desc" data-aos="fade-down">
                            <p>
                                Envi d'�viter des grossesses pr�coces ou non d�sir�es? D�sire d'opter pour une m�thode contraceptive et planifier sa grossesse? Le Centre Convivial vous offre toutes les m�thodes contraceptives n�cessaires et vous met en relation avec une formation sanitaire
                                la plus proche pour qui vous aidera � faire un choix �clair� et vous m'aider � sous la m�thode convenable.
                            </p>
                        </div>
                        <div class="services__more">
                            <a href="">Lire plus</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="services__content__title" data-aos="fade-down">
                            <i class="fas fa-user-md"></i>
                            <span>Assitance en ligne</span>
                        </div>
                        <div class="services__content__desc " data-aos="fade-down">
                            <p>
                                Notre personnel de sant� est � votre disposition 7j/7 pour repondre � toutes vos questions et preoocupations. Vous d�sirez vous adresser � un Conseiller Psychosocial, � une Sage-femme, � un infirmier ou � un M�decin? Acc�dez au menu et �crivez au personnel
                                de votre choix.
                            </p>
                        </div>
                        <div class="services__more">
                            <a href="">Lire plus</a>
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
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/F4RyKgQuSik" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="row">
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
                            </div>
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

                                                        <div class="overlay__text">
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
                                                            <p>D�pistage VIH</p>
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
                                                            <p>Hygi�ne sexuelle</p>
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
                                                            <p>Grossesse Pr�coce et non d�sir�e</p>
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
                                        <div class="card card__one ">
                                            <figure class="card__img">
                                                <a href="#">
                                                        <img src="dist/img/conseils/preservatif_masculin.jpg" width="340" height="280" />

                                                        <div class="overlay__text">
                                                            <p> Le pr�servatif masculin </p>
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
                                                            <p>Le preservatif f�minin</p>
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
                            
                       <!--     <div class="thumb__item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card__one ">
                                            <figure class="card__img">
                                                <a href="#">
                                                        <img src="dist/img/photo1 copie.png" width="340" height="280" />

                                                        <div class="overlay__text">
                                                            <p> VIH/Sida </p>
                                                        </div>
                                                    </a>
                                            </figure>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card__one">
                                            <figure class="card__img">
                                                <a href="#">
                                                        <img src="dist/img/photo1 copie 2.png" width="340" height="280" />

                                                        <div class="overlay__text">
                                                            <p>D�pistage du VIH</p>
                                                        </div>
                                                    </a>
                                            </figure>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card__one">
                                            <figure class="card__img">
                                                <a href="#">
                                                        <img src="dist/img/photo1 copie 3.png" width="340" height="280" />

                                                        <div class="overlay__text">
                                                            <p>M�nopause pr�coce</p>
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
                                                        <img src="dist/img/photo1 copie 6.png" width="340" height="280" />

                                                        <div class="overlay__text">
                                                            <p>Pr�servatif f�minin</p>
                                                        </div>
                                                    </a>
                                            </figure>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card__one">
                                            <figure class="card__img">
                                                <a href="#">
                                                        <img src="dist/img/photo1 copie 5.png" width="340" height="280" />

                                                        <div class="overlay__text">
                                                            <p>Hygi�ne menstruelle</p>
                                                        </div>
                                                    </a>
                                            </figure>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card__one">
                                            <figure class="card__img">
                                                <a href="#">
                                                        <img src="dist/img/photo1 copie 4.png" width="340" height="280" />

                                                        <div class="overlay__text">
                                                            <p>Cycle menstruel</p>
                                                        </div>
                                                    </a>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
                                    Rester � l'�coute de tous les �v�nements dans votre pays, en Afrique ou dans le monde en lien avec la sant� sexuelle et de la reproduction ou connexe. Vous avez �galement la possibilit� de programmer vos activit�s ou rendez-vous.
                                </p>
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
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services__content__title wow fadeInDown" data-wow-delay="0.3s">
                                <i class="fas fa-user-plus"></i>
                                <span>Inscription</span>
                            </div>
                            <div class="services__content__desc wow fadeInDown" data-wow-delay="0.5s">
                                <p>
                                    L'acc�s aux services offerts par le Centre Convivial necessite l'ouverture d'un compte. Le Web TV et les Conseils pratiques peuvent �tre consult�s sans ouverture de compte par tout utilisateur non inscrit ou non r�sident dans l'un des pays que couvre
                                    le Centre Convivial.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer__title">
                        Derniers articles sur la SSR
                    </div>
                    <div class="footer__content">
                        <div class="row">
                            <!-- <div class="col-md-3">
                                <img src="dist/img/photo.png" alt="">
                            </div> -->
                            <div class="col-md-12">
                                <div class="footer__text">
                                    <ul>
                                        <li>
                                            <a href="#"> Notion de la Sant� Sexuelle et de la Reproduction</a>
                                        </li>
                                        <li>
                                            <a href="#"> D�finition du Sexe</a>
                                        </li>
                                        <li>
                                            <a href="#"> D�finition de la Sexualit�</a>
                                        </li>
                                        <li>
                                            <a href="#"> Organe g�nital de l�homme</a>
                                        </li>
                                        <li>
                                            <a href="#"> Organe g�nital de la femme</a>
                                        </li>
                                        <li>
                                            <a href="#"> Hymen</a>
                                        </li>
                                        <li>
                                            <a href="#"> Hygi�ne sexuelle</a>
                                        </li>
                                        <li>
                                            <a href="#"> Toilette intime</a>
                                        </li>
                                        <li>
                                            <a href="#"> Hygi�ne corporelle</a>
                                        </li>
                                        <li>
                                            <a href="#"> Grossesses pr�coces</a>
                                        </li>
                                        <li>
                                            <a href="#"> Grossesses non d�sir�es</a>
                                        </li>
                                        <li>
                                            <a href="#"> Test de grossesse</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="footer__link">
                                    <a href="#" class="footer__button">
                                        <i class="fas fa-download"></i>
                                        <span>T�l�charger</span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer__title">
                        T�l�charger l'App mobile
                    </div>

                    <div class="footer__content">
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom:10px">
                                <img src="dist/img/play.png" alt="">
                            </div>
                        </div>

                        <div class="footer__title">
                            Contactez-nous
                        </div>

                        <div class="contact__wrapper">
                            <div class="number">
                                <span><i style="transform: perspective(200px) rotateY(215deg)" class="fas fa-phone"></i></span>
                                <span><a href="tel:+228 90 92 39 11 71">+228 92 39 11 71</a></span>
                            </div>

                            <div class="mail">
                                <span><i class="fas fa-envelope"></i></span>
                                <span><a href="mailto:contacts@avjeunes.org">contacts@avjeunes.org</a></span>
                            </div>

                            <div class="address">
                                <span><i class="fas fa-home"></i></span>
                                <span>
                                    <a target="_blank" href="https://www.google.tg/maps/place/Banque+Togolaise+du+Commerce+et+de+l'Industrie/@6.1369166,1.210257,15z/data=!4m8!1m2!2m1!1sBTCI!3m4!1s0x1023e1eeb714a33f:0xb97a31ae86404c2d!8m2!3d6.1359974!4d1.2260188">169, Boulevard du 13 janvier, Lom�-TOGO</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 wow">
                    <div class="footer__title">
                        Activit�s des partenaires
                    </div>

                    <div class="footer__content">
                        <div class="row third">
                            <!-- <div class="col-md-2">
                                <img width="60px" src="dist/img/photo.png" alt="">
                            </div> -->
                            <div class="col-md-12">
                                <div class="footer__text" style="padding-left:8px">
                                    <div class="partner__name">
                                        UNFPA TOGO:
                                    </div>
                                    <div class="article__content">
                                        <a href="">CRL YALI DAKAR : D�marrage de la session 9 de la formation en Leadership</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner__footer">
            <div class="container">
                <div class="container__inner">
                    <div class="social__icons">
                        <a href="#">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-google-plus-square"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube-square"></i>
                        </a>
                    </div>
                    <div class="rights">
                        &copy; 2018 Centre Convivial.&nbsp; Tous Droits R�serv�s
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal 
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle">Site en construction</h1>
                </div>
                <div class="modal-body">
                    Le site est actuellement en Construction. A cet effet, les liens et autres �l�ments dynamiques ne fonctionneront pas
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>  -->

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
                                <a href="">Mot de passe oubli� ?</a>
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
    <!-- Derni�re �tape -->
    <div class="modal fade" id="etape" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Derni�re �tape</h3>
                </div>
                <div class="modal-body">
                    <p align="center">
                     
                    </p>
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
                <div class="modal-body" id="inscription">
                    <form id="register_form" onsubmit="return false;">
                        <div class="row signup__group">
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-user"></span>
                                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"><br/>
								<small id="output_checkpseudo"></small>
                            </div>
							
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-user"></span>
                                <input type="text"  name="datenais" id="datenais" placeholder=""><br/>
								<small id="output_checkdatenais"></small>
                            </div>
                        </div>
                        <div class="row signup__group">
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-genderless"></span>
                                <select name="sexe" id="sexe">
                                    <option selected>Sexe</option>
                                    <option value="1">Homme</option>
                                    <option value="2">Femme</option>
                                </select>
                            </div>
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-envelope"></span>
                                <input type="email" name="email" id="email" placeholder="Email">
								<small id="output_checkemail"></small>
                            </div>
                        </div>
                        <div class="row signup__group">
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-phone"></span>
                                <input type="text" name="telephone" id="telephone" placeholder="T�l�phone">
								<small id="output_checktel"></small>
                            </div>
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-map-marker"></span>
                                <input type="text"  id="pays" name="pays" placeholder="Pays">
                            </div>
                        </div>
                        <div class="row signup__group">
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-lock"></span>
                                <input type="password" id="pass1" name="pass1" placeholder="Mot de passe">
								<small id="output_pass1"></small>
                            </div>
                            <div class="col-md-6 signup__input">
                                <span class="fas fa-lock"></span>
                                <input type="password" id="pass2" name="pass2" placeholder="Confirmer mot de passe">
								<small id="output_pass2"></small>
                            </div>
                        </div>
						<div id="status">
                            Veuillez remplir tous les champs s'il vous plait
                        </div>
                        <div class="row signup__validate">
						   <input type="submit" name="submit" id="bRegister" value="Valider" class="signup__submit">
                            <!--<button type="submit" name="submit" id="bRegister" value="Valider" class="signup__submit">
                                <i class="fas fa-check"></i> Valider
                            </button>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<script src="dist/js/jquery-3.1.1.min.js"></script>
    <script>
	  $(document).ready(function(){
	    $("#register_form input").focus(function(){
		  $("#status").fadeOut(800);
		});
	    $("#pseudo").keyup(function(){
		 //on verifie si le pseudo est ok
		  check_pseudo();
		});
		$("#telephone").keyup(function(){
		 //on verifie si le pseudo est ok
		  check_telephone();
		});
		//verfication du pass 1
		$("#pass1").keyup(function(){
		 //on verifie si le pass1 est ok
		  if($(this).val().length <8){
		    $("#output_pass1").css("color","red").html("<br/>Trop court(maximum 8 caracteres) ");
		  } else if ($("#pass2").val() != "" && $("#pass2").val() !=  $("#pass1").val()){
		    $("#output_pass1").html("<br/>Les deux mots de pass sont differents!");
			$("#output_pass2").html("<br/>Les deux mots de pass sont differents!");
		  } else{
		   $("#output_pass1").html('<img src="dist/img/check.png" class="small_image">');
		   if ($("#pass2").val() != ""){
		     $("#output_pass2").html('<img src="dist/img/check.png" class="small_image">');
		   }
		  }
		});
		 //fonction de verification du pass2
		$("#pass2").keyup(function(){
		 check_password();
		});
		$("#email").keyup(function(){
		 check_email();
		});
	  
	  //fonction de verification du nom
	  function check_pseudo(){
	   $.ajax({
	    type : "post",
		url: "register.php",
		data:{
		  'pseudo_check': $("#pseudo").val()
		},
		success:  function(data){
		  if (data == "success"){
		    $("#output_checkpseudo").html('<img src="dist/img/check.png" class="small_image">');
		    return true;
		  } else{
		   $("#output_checkpseudo").css("color","red").html(data);
		  }
		}
		
	   });
	  }
	  //fonction de verification du telephone
	  function check_telephone(){
	   $.ajax({
	    type : "post",
		url: "register.php",
		data:{
		  'telephone_check': $("#telephone").val()
		},
		success:  function(data){
		  if (data == "success"){
		    $("#output_checktel").html('<img src="dist/img/check.png" class="small_image">');
		    return true;
		  } else{
		   $("#output_checktel").css("color","red").html(data);
		  }
		}
		
	   });
	  }
	  //fonction de verification du mail
	  function check_email(){
	   $.ajax({
	    type : "post",
		url: "register.php",
		data:{
		  'email_check': $("#email").val()
		},
		success:  function(data){
		  if (data == "success"){
		    $("#output_checkemail").html('<img src="dist/img/check.png" class="small_image">');
		  } else{
		   $("#output_checkemail").css("color","red").html(data);
		  }
		}
		
	   });
	  }
	  //fonction de verification du pass2
	  function check_password(){
	   $.ajax({
	    type : "post",
		url: "register.php",
		data:{
		  'pass1_check': $("#pass1").val(),
		  'pass2_check': $("#pass2").val()
		},
		success:  function(data){
		  if (data == "success"){
		    $("#output_pass2").html('<img src="dist/img/check.png" class="small_image"/>');
			$("#output_pass1").html('<img src="dist/img/check.png" class="small_image"/>');
		  } else{
		   $("#output_pass2").css("color","red").html(data);
		  }
		}
		
	   });
	  }
	  //traitment du formulaire
	  $("#register_form").submit(function(){
	    var status = $("#status");
		var pseudo = $("#pseudo").val();
		var datenais = $("#datenais").val();
		var telephone = $("#telephone").val();
		var pays = $("#pays").val();
		var pass1 = $("#pass1").val();
		var pass2 = $("#pass2").val();
		var sexe = $("#sexe").val();
		var email = $("#email").val();
		
		if (pseudo == "" ||  datenais == ""  || telephone == "" || pays == "" || pass1 == "" || pass2 == "" ||  sexe == "" || email == ""){
		  status.html("Veuillez remplir tous les champs !").fadeIn(400);
		} else if (pass1 != pass2){
		   status.html("Les deux mots de pass sont differents !").fadeIn(400);
		} else {
		  $.ajax({
		    type:"post",
			url:"register.php",
			data:
			{
			  'pseudo' : pseudo,
			  'datenais' : datenais,
			  'telephone' : telephone,
			  'pays' : pays,
			  'pass1' : pass1,
			  'pass2' : pass2,
			  'email' : email,
			  'sexe' : sexe,
			  
			},
			 beforeSend: function(){
			    $("#bRegister").attr("value","En cours...");	
			 },
			 success:function(data){
			    if (data != "register_success"){
				 status.html(data).fadeIn(400);
				 $("#bRegister").attr("value","Valider");
				 //$("#bRegister").addClass("value","Valider");
				} else {
				  $("#signupModal h3").html("Derni�re �tape");
				  //$("#etape").show();
				  $("#inscription").html("<strong>Juste une derniere etape"+ prenom + "&nbsp;"+ nom  +"</strong><br/>Un lien d'activation vient de vous �tre envoy� � l'adresse �lectronique indiqu�e de l'inscription.<br/>Veuillez tout simplement cliquer sur ce lien pour confirmer votre inscription<br/><em>(V�rifiez vos spams ou courries ind�sirables si vous ne voyez pas ce mail dans votre bo�te de r�ception)</em><br/>").css("width","inherit").fadeIn(500);
				  
				}
			 }
		  });
		}
	  });
	  
	  });
	  
	</script>
    <script src="dist/js/jquery.waypoints.min.js"></script>
    <script src="dist/js/aos.js"></script>
    <script src="dist/js/wow.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/slider.js"></script>
    <script src="dist/js/slick.js"></script>
    <script src="dist/js/main.js"></script>
</body>

</html>
