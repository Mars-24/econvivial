@extends("Template.vitrineTemplate")


@section("title")
Bienvenue sur eCentre Convivial
@endsection


@section("body")

    <!--==========================
  Top Bar
============================-->

    <section id="topbar" class="d-none d-lg-block" style="">
        <div class="container clearfix">
            <div class="intro-content pull-right">
                <div>
                    <a href="#"  class="btn-get-started scrollto"><i class="fa fa-lock"></i> Se connecter</a>
                    <a href="#"  class="btn-projects scrollto"><i class="fa fa-user-circle"></i> S'inscrire</a>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Header
    ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                {{--<h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1>--}}
                <h1><a href="#body" class="scrollto"><img style="width:175px;"  src="dist/img/logo-convivial.jpg"  alt=""></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#body">Accueil</a></li>
                    <li><a href="#">Web Tv</a></li>
                    <li><a href="#">Conseils pratiques</a></li>
                    <li class="menu-has-children"><a href="">Services</a>
                        <ul>
                            <li><a href="#">CONSULTATION</a></li>
                            <li><a href="#">SUIVI DE GROSSESSE</a></li>
                            <li><a href="#">SUIVI DU CYCLE MENSTRUEL</a></li>
                            <li><a href="#">PLANNAING FAMILIAL</a></li>
                            <li><a href="#">ASSISTANCE EN LIGNE</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Agenda</a></li>
                    <li><a href="#">Jeux</a></li>
                    <li><a href="{{route("newcontact")}}">Contact</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <!--==========================
      Intro Section
    ============================-->
    <section id="intro">

        {{--<div class="intro-content">--}}
            {{--<h2>Making <span>your ideas</span><br>happen!</h2>--}}
            {{--<div>--}}
                {{--<a href="#about" class="btn-get-started scrollto">Get Started</a>--}}
                {{--<a href="#portfolio" class="btn-projects scrollto">Our Projects</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div id="intro-carousel" class="owl-carousel" >
            <div class="item" style="background-image: url('dist/img/2.jpg');"></div>
            <div class="item" style="background-image: url('dist/img/1.jpg');"></div>
            <div class="item" style="background-image: url('dist/img/3.jpg');"></div>
        </div>

    </section><!-- #intro -->

    <main id="main">

        <!--==========================
          About Section
        ============================-->
        <section id="about" class="wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 about-img">
                        <img src="img/about-img.jpg" alt="">
                    </div>

                    <div class="col-lg-6 content">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                        <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>

                        <ul>
                            <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul>

                    </div>
                </div>

            </div>
        </section><!-- #about -->

        <!--==========================
          Services Section
        ============================-->
        <section id="services">
            <div class="container">
                <div class="section-header">
                    <h2>Services</h2>
                    {{--<p>export irure minim illum fore</p>--}}
                </div>

                <div class="row">

                    <div class="col-lg-6">
                           <a>
                        <div class="box wow fadeInLeft" style="height: 320px;">
                            <div class="icon"><i class="fa fa-stethoscope"></i></div>
                            <h4 class="title"><a href="">Consultation</a></h4>
                            <p class="description">
                                Le Centre Convivial vous offre des services adaptés en matière d
                                e la prise en charge des infections sexuellement transmissible
                                et du dépistage du VIH. En décrivant les maux dont vous souffrez,
                                vous serez automatiquement référés vers une formation sanitaire la
                                plus proche pour une consultation approfondie, un personnel qualifié
                                serrait immédiatement informé de votre arrivée et vous accordera une attention particulière.
                            </p>
                        </div>
                           </a>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight"style="height: 320px;">
                            <div class="icon"><i class="fa fa-female"></i></div>
                            <h4 class="title"><a href="">Suivi de grossesse</a></h4>
                            <p class="description">Notre service organise le suivi de la grossesse, l’information et
                                l’accompagnement des futurs mères et des futurs pères pour tout ce qui concerne
                                l'évolution du foetus et l’accueil de l’enfant. Des sages-femmes proposent des informations,
                                ainsi qu'une assistance en ligne et d’échanges pour les futurs parents et les jeunes parents. .</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft" data-wow-delay="0.2s" style="height: 320px;">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <h4 class="title"><a href="">Planning familial</a></h4>
                            <p class="description"> Envie d'éviter des grossesses précoces ou non désirées? Désire d'opter pour une méthode contraceptive et planifier sa grossesse? Le Centre Convivial vous offre toutes les méthodes contraceptives nécessaires et vous met en relation avec une formation sanitaire
                                la plus proche pour qui vous aidera à faire un choix éclairé et vous m'aider à sous la méthode convenable.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight" data-wow-delay="0.2s" style="height: 320px;">
                            <div class="icon"><i class="fa fa-user-md"></i></div>
                            <h4 class="title"><a href="">Assitance en ligne</a></h4>
                            <p class="description">Notre personnel de santé est à votre disposition 7j/7 pour repondre à toutes vos questions et preoocupations. Vous désirez vous adresser à un Conseiller Psychosocial, à une Sage-femme, à un infirmier ou à un Médecin? Accédez au menu et écrivez au personnel
                                de votre choix.</p>
                        </div>
                    </div>

                </div>


            </div>
        </section><!-- #services -->

        <section id="testimonials" class="wow fadeInUp">
            <div class="container">


                <div class="col-sm-6">
                    <div class="section-header">
                        <h2>Web Tv</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <iframe width="100%" height="415" src="https://www.youtube.com/embed/F4RyKgQuSik" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="section-header">
                        <h2>Conseils Pratiques</h2>
                        <div class="col-md-12">
                            <div id="conseils">
                                <div class="pull-right">
                                    <button class="slick-next slick-arrow slick-disabled"  aria-label="Next" type="button" aria-disabled="true"></button>
                                    <button class="slick-prev slick-arrow slick-disabled" aria-label="Previous" type="button" aria-disabled="true"></button>
                                </div>
                                <div class="thumbs">
                                    <div class="thumb__item" id="item1">
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
                                    <div class="thumb__item" id="item2" style="display: none">

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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #testimonials -->


        <section id="services">
            <div class="container">
                <div class="section-header">
                    <h2>Autres services</h2>
                    {{--<p>export irure minim illum fore</p>--}}
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <a>
                            <div class="box wow fadeInLeft" style="height: 320px;">
                                <div class="icon"><i class="fa fa-calendar-alt"></i></div>
                                <h4 class="title"><a href="">Agenda</a></h4>
                                <p class="description">
                                    Rester à l'écoute de tous les événements dans votre pays, en Afrique ou dans le monde en
                                    lien avec la santé sexuelle et de la reproduction ou connexe.
                                    Vous avez également la possibilité de programmer vos activités ou rendez-vous.
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight"style="height: 320px;">
                            <div class="icon"><i class="fa fa-gamepad"></i></div>
                            <h4 class="title"><a href="">Jeux</a></h4>
                            <p class="description">
                                Le Centre Convivial vous propose des jeux Puzzle et des questions
                                Quizz pouvant vous permettre de gagner des prix..</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft" data-wow-delay="0.2s" style="height: 320px;">
                            <div class="icon"><i class="fa fa-user-plus"></i></div>
                            <h4 class="title"><a href="">Inscription</a></h4>
                            <p class="description">
                                L'accès aux services offerts par le Centre Convivial necessite l'ouverture d'un compte. Le Web TV et les Conseils pratiques peuvent être consultés sans ouverture de compte par tout utilisateur non inscrit ou non résident dans l'un des pays que couvre
                                le Centre Convivial.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight" data-wow-delay="0.2s" style="height: 320px;">
                            <div class="icon"><i class="fa fa-user-md"></i></div>
                            <h4 class="title"><a href="">Assitance en ligne</a></h4>
                            <p class="description">Notre personnel de santé est à votre disposition 7j/7 pour repondre à toutes vos questions et preoocupations. Vous désirez vous adresser à un Conseiller Psychosocial, à une Sage-femme, à un infirmier ou à un Médecin? Accédez au menu et écrivez au personnel
                                de votre choix.</p>
                        </div>
                    </div>

                </div>


            </div>
        </section><!-- #services -->

        <!--==========================
          Clients Section
        ============================-->
        <section id="clients" class="wow fadeInUp" style="background-color: #fff">
            <div class="container">
                <div class="section-header">
                    <h2>Partenaires</h2>
                </div>

                <div class="owl-carousel clients-carousel" style="vertical-align: center;">
                    <img src="dist/img/logos/CNLS.jpg" style="margin: 5px;horiz-align: center;text-align: center;">
                    <img src="dist/img/logos/Logo AVJeunes.jpg" style="margin: 5px;horiz-align: center;text-align: center;">
                    <img src="dist/img/logos/UNFPA.jpg" style="margin: 5px;horiz-align: center;text-align: center;">
                    <img src="dist/img/logos/ONUSIDA.png" style="margin: 5px;horiz-align: center;text-align: center;">
                    <img src="dist/img/logos/CRL.jpg" style="margin: 5px;horiz-align: center;text-align: center;">
                    <img src="dist/img/logos/m6informatique.jpg" style="margin: 5px;horiz-align: center;text-align: center;">
                    <img src="dist/img/logos/drapeau-etats-unis-usa.jpg" style="margin: 5px;horiz-align: center;text-align: center;">
                </div>

            </div>
        </section><!-- #clients -->




        <!--==========================
          Call To Action Section

        <!--==========================
          Our Team Section
        ============================-->
        {{--<section id="team" class="wow fadeInUp">--}}
            {{--<div class="container">--}}
                {{--<div class="section-header">--}}
                    {{--<h2>Our Team</h2>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-3 col-md-6">--}}
                        {{--<div class="member">--}}
                            {{--<div class="pic"><img src="img/team-1.jpg" alt=""></div>--}}
                            {{--<div class="details">--}}
                                {{--<h4>Walter White</h4>--}}
                                {{--<span>Chief Executive Officer</span>--}}
                                {{--<div class="social">--}}
                                    {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-3 col-md-6">--}}
                        {{--<div class="member">--}}
                            {{--<div class="pic"><img src="img/team-2.jpg" alt=""></div>--}}
                            {{--<div class="details">--}}
                                {{--<h4>Sarah Jhinson</h4>--}}
                                {{--<span>Product Manager</span>--}}
                                {{--<div class="social">--}}
                                    {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-3 col-md-6">--}}
                        {{--<div class="member">--}}
                            {{--<div class="pic"><img src="img/team-3.jpg" alt=""></div>--}}
                            {{--<div class="details">--}}
                                {{--<h4>William Anderson</h4>--}}
                                {{--<span>CTO</span>--}}
                                {{--<div class="social">--}}
                                    {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-3 col-md-6">--}}
                        {{--<div class="member">--}}
                            {{--<div class="pic"><img src="img/team-4.jpg" alt=""></div>--}}
                            {{--<div class="details">--}}
                                {{--<h4>Amanda Jepson</h4>--}}
                                {{--<span>Accountant</span>--}}
                                {{--<div class="social">--}}
                                    {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                                    {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</section><!-- #team -->--}}



    </main>

    @include("Footer.newFooter")

    <script>
        $(".slick-next").on("click", function(){
            $("#item1").hide("slow");
            $("#item2").show("slow");
        });

        $(".slick-prev").on("click", function(){
            $("#item2").hide("slow");
            $("#item1").show("slow");
        });
    </script>
    @endsection