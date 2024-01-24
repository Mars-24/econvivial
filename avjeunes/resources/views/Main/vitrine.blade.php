@extends("Template.newVitrineTemplate")

@section('title', 'Bienvenue sur eCentre Convivial')

@section("referencement")
    <meta name="description" content="Favoriser l’accès des adolescents et des jeunes aux informations et aux services de soins et de santé en matière de la Santé Sexuelle.   Oeuvrer pour une Afrique où les jeunes et adolescents, en particulier les jeunes filles, accèdent facilement aux services adaptés en matière de la sexualité responsable et construisent leur équilibre." />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
    <meta name="category" content="Bienvenue sur eCentre Convivial">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org">
    <meta name="robots" content="index, follow">
    
    <meta name="image" content="https://econvivial.org/images/vitrine/img3.png"/>

<meta property="og:url" content="https://econvivial.org">
<meta property="og:image" content="https://econvivial.org/images/vitrine/img3.png">
    @endsection
@section("body")

<style>
    .list_screen_slide .item img{
       
        width: 150px;
        height: 100%;
        position: center;
        vertical-align: center;
        float: top;
    }
</style>
<!--Header-Area-->
<header class="blue-bg relative fix" id="home"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <div class="section-bg overlay-bg dewo ripple"></div>
    <!--Mainmenu-->


    @include("HeaderNav.vitrineNav")

<div class="space-10"></div>

<div class="container text-white">
    <div class="row">
        <div class="space-70"></div>
        <div class="col-xs-12 col-md-7">
            <div class="wow fadeInLeft" data-wow-delay="1s">
                <div class="item"><img src="images/vitrine/img3.png" alt="" style=" width: 100%;"></div>
            </div>
        </div>

        <div class="col-xs-12 col-md-5 wow fadeInUp" data-wow-delay="1.5s" >
            <div class="space-50"></div>
            <p><img src="images/vitrine/logo-second.png"></p>
            <!-- <h1>Bienvenue sur <br /> eCentre Convivial</h1> -->
            <h4 class="text-white" style="text-align: center;"><i>Toute une équipe de professionnels de la Santé Sexuelle et de la Reproduction pour vous offrir les meilleurs services en la matière. </i></h4>

            </div>

        </div>

    </div>
    <!--Header-Text/-->
</header>
<!--Header-Area/-->
<section id="services">
    <div class="space-80"></div>
    <div class="container">
        <h2 class="text-center">Que proposons-nous ?</h2>
        <div class="space-50"></div>
        <div class="row">
            <div class=" col-xs-12 col-md-4 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="box text-center">
                    <a href="{{route('consultation')}}">
                    <p class="icon md-icon text-center"><i class="fa fa-stethoscope"></i></p>
                    <div class="space-10"></div>
                    <h5 class="text-uppercase">Consultation IST</h5>
                    <p>eCentre Convivial vous offre des services adaptés en matière de la prise en charge des infections sexuellement transmissibles
                    et du dépistage du VIH. </p>
                    <p>
                        En décrivant les maux dont vous souffrez,
                        vous serez automatiquement référés vers une formation sanitaire la
                        plus proche pour une consultation approfondie.
                    </p>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="box text-center">
                    <a href="{{route('suiviGrossesse')}}">
                    <p class="md-icon icon text-center"><i class="fa fa-female"></i></p>
                    <div class="space-10"></div>
                    <h5 class="text-uppercase">Suivi de la grossesse</h5>
                    <p>Notre service organise le suivi de la grossesse, l’information et
                        l’accompagnement des futurs mères et des futurs pères pour tout ce qui concerne
                        l'évolution du foetus et l’accueil de l’enfant. Des sages-femmes proposent des informations,
                    ainsi qu'une assistance en ligne et d’échanges pour les futurs parents et les jeunes parents.</p>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 wow fadeInRight" data-wow-delay="0.2s">
                <div class="box text-center">
                    <a href="planning-familial">
                    <p class="md-icon icon"><i class="fa fa-user"></i></p>
                    <div class="space-10"></div>
                    <h5 class="text-uppercase">Planning familial</h5>
                    <p>Envie d'éviter des grossesses précoces ou non désirées?
                        Désirez-vous opter  pour une méthode contraceptive et planifier votre grossesse? eCentre Convivial vous offre toutes les opportunités nécessaires et vous met en relation avec une formation sanitaire la plus proche pour qui vous aidera à faire un choix éclairé.</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class=" col-xs-12 col-md-4 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="box text-center">
                    <a href="{{route('assistance-en-ligne')}}">
                    <p class="md-icon icon"><i class="fa fa-user-md"></i></p>
                    <div class="space-10"></div>
                    <h5 class="text-uppercase">Assistance en ligne</h5>
                    <p>Notre équipe de téléconseiller est à votre disposition 7j/7 et 24h/24 pour repondre à toutes vos questions et preoocupations. Désirez-vous adresser à un médecin, Gynécologue, Sage-femme et Conseillers, Sociologue, Psychologue ou à un Animateur IEC?  Accédez au menu et écrivez au téléconseiller de votre choix.</p>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="box text-center">
                    <a href="{{route('suivi-cycle-menstruel')}}">
                    <p class="md-icon icon"><i class="fa fa-gg-circle"></i></p>
                    <div class="space-10"></div>
                    <h5 class="text-uppercase">Suivi du cycle menstruel</h5>
                    <p> Nous assistons les femmes, surtout les jeunes filles scolaires et extrascolaires dans la gestion de leur cycle menstruel et hygiène  menstruels. Enregistrez la date de votre dernière règle et recevez des notifications pour vos prochaines menstrues et ovulations.</p>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 wow fadeInRight" data-wow-delay="0.2s">
                <div class="box text-center">
                    <a href="{{route('quiz')}}">
                    <p class="md-icon icon"><i class="fa fa-gamepad"></i></p>
                    <div class="space-10"></div>
                    <h5 class="text-uppercase">Quiz</h5>
                    <p>eCentre Convivial vous propose des quiz pouvant vous permettre de gagner des prix. </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-80"></div>
</section>
<!--Work-Section-->

<section class="green-bg" id="work" style="text-align: justify;">
    {{--<div class="space-80"></div>--}}
    <div class="container" >

        <div class="row" >
            <div class="space-20"></div>
            <div class="col-sm-7 wow fadeInUp" data-wow-delay="0.2s" style="padding-left: 0px;position: center;">
                <img class="img img-responsive" src="images/vitrine/img4.png" style="margin-top:0px;height: 100%;" width=80%" alt="">
            </div>
            <div class="col-sm-5 wow fadeInUp" data-wow-delay="0.4s" style="margin-top: 5%;position: center;text-align: center;">
                <div class="row wow fadeInUp">
                    <div class="space-10"></div>
                    <div class="col-md-12  text-center">
                        <h3 class="text-uppercase text-white">Comment ça marche ?</h3>
                    </div>
                </div>
                <div class="text-white">
                    <div class="space-20"></div>
                    <h5>
                        <i>Vous souhaitez une discussion anonyme ou une consultation sur votre santé sexuelle? Il suffit d'ouvrir votre compte et de vous adresser à notre équipe de téléconseiller qui est disponible 24 h/24 et 7jrs / 7 pour répondre à toutes vos questions.
                        </i>
                    </h5>


                    <div class="space-20"></div>

                    <h5><i>.</i></h5>

                    <div class="space-20"></div>
                    <h5><i>
                            Qu’attendez vous ? ll vous suffit d'ouvrir un compte</i>
                    </h5>
                    <div class="space-10"></div>
                    <a href="{{route('register')}}" class="big-button" style="text-align: center;">
                        <span class="big-button-icon">
                            <span class="fa fa-user"></span>
                        </span>
                        <strong style="font-weight: bold;">J'ouvre mon compte</strong>
                    </a>
                </div>
            </div>
        </div>
   
    </div>
</section>

<section id="conseils" class="wow fadeInUp">
    <div class="container">
        <div class="space-50"></div>
        <h2 class="text-center">Découvrez nos conseils pratiques</h2>
        <div class="space-50"></div>
        <div class="col-sm-6">
            <div class="section-header">
                <h2></h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <iframe width="100%" height="415" src="https://www.youtube.com/embed/EQYfmxwuA6w" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="">
                <h2></h2>
                <div class="col-md-12">
                    <div id="conseils">
                        <div class=" pull-right" style="margin-top: -30px;">
                         <a class="fa fa-chevron-circle-left" id="leftConseil" onclick="showItem1()"  style="margin-right: 10px;  font-size: 30px;" ></a>

                         <a class="fa fa-chevron-circle-right right" id="rightConseil" onclick="showItem2()" style="font-size: 30px;"> </a></div>
                     </div>
                     <div class="row">
                        <div class="" id="item1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-ist')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/ist.jpg"  />
                                            <div class="space-10"></div>
                                            <p> IST </p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-vih')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/sida.gif" />
                                            <div class="space-10"></div>
                                            <p>VIH/Sida</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-depistage')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/depistage.jpg" />
                                            <div class="space-10"></div>
                                            <p>Dépistage VIH</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-preservatif-masculin')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/preservatif_masculin.jpg"  />
                                            <div class="space-10"></div>
                                            <p> Le préservatif masculin </p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-preservatif-feminin')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/preservatif_feminin.jpg"/>
                                            <div class="space-10"></div>
                                            <p>Le preservatif féminin</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-hymen')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/hymen.jpg"  />
                                            <div class="space-10"></div>
                                            <p>L'hymen</p>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="thumb__item" id="item2" style="display: none">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-cycle-mesntruel')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/cycle_mentru.jpg"  />
                                            <div class="space-10"></div>
                                            <p>Cycle Menstruel</p>

                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-hygiene-sexuelle')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/hygiene_sex.png" />
                                            <div class="space-10"></div>
                                            <p>Hygiène sexuelle</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="box-conseil">
                                        <a href="{{route('conseil-grossesse-precoce')}}">
                                            <img class="img img-responsive img-resp" src="dist/img/conseils/grossesse_precoce.jpg"  />
                                            <div class="space-10"></div>
                                            <p>Grossesse Précoce et 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="box-conseil">
                                            <a href="{{route('conseil-abstinence')}}">
                                                <img  class="img img-responsive img-resp" src="dist/img/conseils/abstinence_sexuelle.jpg"  />
                                                <div class="space-10"></div>
                                                <p>Abstinence Sexuelle</p>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="box-conseil">
                                            <a href="{{route('conseil-cellule-cd4')}}">
                                                <img class="img img-responsive img-resp" src="dist/img/conseils/cd4.jpg" />
                                                <div class="space-10"></div>
                                                <p>Le taux de cellules CD4</p>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="box-conseil">
                                            <a href="{{route('conseil-charge-virale')}}">
                                                <img  class="img img-responsive img-resp" src="dist/img/conseils/charge_virale.jpg"  />
                                                <div class="space-10"></div>
                                                <p>La charge virale</p>
                                            </a>
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
<!--Feature-Section-->
<section class="fix green-light-bg">
    <div class="container" id="feature" >
        <div class="space-50"></div>
        <div class="row wow fadeInUp">
            <div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
                <h3 class="text-uppercase">Nos services depuis votre Smartphone</h3>
            </div>
        </div>
        <div class="space-20"></div>

        <div class="row">
            <div class="col-sm-4 green-gradient-bg">
                <div class="space-60"></div>
                <a href="#feature1" data-toggle="tab">
                    <div class="media single-feature">
                        <div class="media-body text-right">
                            <h5 style="text-transform: uppercase;">Conseils Pratiques</h5>
                            <p>Recevez des conseils pratiques sur différentes thématiques en matière de la santé sexuelle et de la reproduction.</p>
                        </div>
                        <div class="media-right">
                            <div class="border-icon">
                                <span class="fa fa-list-alt"></span>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="space-30"></div>
                <a href="#feature2" data-toggle="tab">
                    <div class="media single-feature">
                        <div class="media-body text-right">
                            <h5>CONSULTATION IST</h5>
                            <p>eCentre Convivial vous offre des services adaptés en matière de la Consultation IST en vue d'une référence.</p>
                        </div>
                        <div class="media-right">
                            <div class="border-icon">
                                <span class="fa fa-stethoscope"></span>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="space-30"></div>
                <a href="#feature3" data-toggle="tab">
                    <div class="media single-feature">
                        <div class="media-body text-right">
                            <h5>PLANNING FAMILIAL</h5>
                            <p>Promouvoir l’espacement de naissance et éviter des grossesses précoces ou non désirées, tel est notre objectif à eCentre Convivial.</p>
                        </div>
                        <div class="media-right">
                            <div class="border-icon">
                                <span class="fa fa-users"></span>
                            </div>
                        </div>
                    </div>
                </a>


                <div class="space-80"></div>
            </div>

            <div class="col-sm-4">
                <img class="img img-responsive" style="text-align: center;margin-top: 0px;margin-left: 12%;" src="images/vitrine/mobile2.png" alt="">
                <div class="screen_image tab-content">
                    <div id="feature1" class="tab-pane fade in active">
                        {{--<img src="images/vitrine/smart.png" alt="">--}}
                    </div>
                </div>
            </div>

            <div class="col-sm-4 green-gradient-bg">
                <div class="space-60"></div>
                <a href="#feature4" data-toggle="tab">
                    <div class="media single-feature">
                        <div class="media-left">
                            <div class="border-icon">
                                <span class="fa fa-gg-circle"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h5>SUIVI DU CYCLE MENSTRUEL</h5>
                            <p>Nous assistons les femmes, surtout les jeunes filles scolaires et extrascolaires dans la gestion de leur cycle et hygiène menstruels.</p>
                        </div>
                    </div>
                </a>
                <div class="space-30"></div>
                <a href="#feature5" data-toggle="tab">
                    <div class="media single-feature">
                        <div class="media-left">
                            <div class="border-icon">
                                <span class="fa fa-user-md"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h5>ASSISTANCE EN LIGNE</h5>
                            <p>Discuter 24h/24 et 7j/7 avec nos Téléconseillers  pour tous vos problèmes de sexualité.</p>
                        </div>
                    </div>
                </a>
                <div class="space-30"></div>


                <a href="#feature6" data-toggle="tab">
                    <div class="media single-feature">
                        <div class="media-left">
                            <div class="border-icon">
                                <span class="fa fa-female"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h5>SUIVI DE GROSSESSE </h5>
                            <p>Notre service organise le suivi de la grossesse, l’information et l’accompagnement des futures mères et des futurs pères grâce à notre équipe de sage-femmes.</p>
                        </div>
                    </div>
                </a>

                <div class="space-80"></div>
            </div>
        </div>

     <div class="row text-center">
         <div class="col-sm-4 col-sm-offset-4">
         <a href="https://drive.google.com/open?id=1PFZ4NZOez7bfzeZDBLVVCd2RViZ53xoD" target="_blank" class="big-button aligncenter">
                        <span class="big-button-icon">
                            <span class="ti-android"></span>
                        </span>
             <span>TELECHARGER</span>
             <br>
             <strong>MAINTENANT</strong>
         </a>
         </div>
     </div>
     <div class="space-60"></div>
 </div>
</section>

<section>
    <div class="space-80"></div>
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
                <h3 class="text-uppercase">Nos partenaires</h3>
            </div>
        </div>
        <div class="space-30"></div>
        <div class="row wow fadeIn" style="vertical-align: middle;">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <div class="space-60"></div>
                <div class="list_screen_slide">
                    <div class="item">
                        <a href="dist/img/logos/CNLS.jpg" class="work-popup">
                            <img src="dist/img/logos/CNLS.jpg" sty alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="dist/img/logos/fm.png" class="work-popup">
                            <img src="dist/img/logos/fm.png" style="margin-top: 40px;" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="dist/img/logos/ONUSIDA.png" class="work-popup">
                            <img class="img img-responsive" src="dist/img/logos/ONUSIDA.png" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="dist/img/logos/UNFPA.jpg" class="work-popup">
                            <img class="img img-responsive" src="dist/img/logos/UNFPA.jpg" alt="" style="margin-top: 20px;">
                        </a>
                    </div>
                    
                    <div class="item">
                        <a href="dist/img/logos/logo-innovup.jpg" class="work-popup">
                            <img class="img img-responsive" src="dist/img/logos/logo-innovup.jpg" alt="" style="margin-top: 20px;">
                        </a>
                    </div>
                    
                    <div class="item">
                        <a href="dist/img/logos/plateforme.jpg" class="work-popup">
                            <img class="img img-responsive" src="dist/img/logos/plateforme.jpg" alt="" style="margin-top: 20px;">
                        </a>
                    </div>
                    <div class="item">
                        <a href="dist/img/logos/CRL.jpg" class="work-popup">
                            <img class="img img-responsive" src="dist/img/logos/CRL.jpg" alt="" style="margin-top: 40px;">
                        </a>
                    </div>
                    <div class="item">
                        <a href="dist/img/logos/m6informatique.jpg" class="work-popup">
                            <img class="img img-responsive" src="dist/img/logos/m6informatique.jpg"  alt="">
                        </a>
                    </div>
                    
                     <div class="item">
                        <a href="dist/img/logos/armoirie.jpg" class="work-popup">
                            <img class="img img-responsive" src="dist/img/logos/armoirie.jpg"  alt="">
                        </a>
                    </div>
                    
                     <div class="item">
                        <a href="dist/img/logos/undp.png" class="work-popup">
                            <img class="img img-responsive" width="50" height="50" src="dist/img/logos/undp.png"  alt="">
                        </a>
                    </div>

                </div>
                <div class="space-40"></div>
            </div>
        </div>
    </div>
    <div class="space-80"></div>
</section>

    @include("Footer.vitrineFooter")
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script>
        function showItem2(){
            $("#item1").hide();
            $("#item2").show("slow");
        }

        function showItem1(){
            $("#item2").hide();
            $("#item1").show("slow");
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() > 250) {
                $('.plateforme-logo').removeClass('hidden');
            } else {
                $('.plateforme-logo').addClass('hidden');
            }
        });
    </script>
@endsection