@extends("Template.newVitrineTemplate")

@section("title")
Consultation IST
@endsection

@section("referencement")
<meta name="description" content="eCentre Convivial vous offre des services adaptés en matière de la prise en
                                charge des Infections Sexuellement Transmissibles. A travers notre plateforme,
                                vous décrivez le mal dont vous souffrez et vous serez référez vers un centre
                                convivial ou une formation sanitaire la plus proche de votre situation géographique.
                                Un personnel de santé qualité sera aussitôt informé de votre arrivée et vous réservera un
                                accueil convivial." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Consultation IST sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/consultation">
<meta name="robots" content="index, follow">
<meta name="image" content="https://econvivial.org/images/vitrine/img2.png">

<meta property="og:url" content="https://econvivial.org/consultation">
<meta property="og:image" content="https://econvivial.org/images/vitrine/img2.png">


@endsection

@section("body")

<!--Header-Area-->
<header class="blue-bg relative fix" id="home">

    <div class="section-bg overlay-bg dewo ripple"></div>
    <!--Mainmenu-->

    @include("HeaderNav.vitrineNav")
<!--Mainmenu/-->
<div class="space-80"></div>
    <!--Header-Text/-->
</header>

<img class="img img-responsive" src="images/services/consultation.jpg" style="width: 100%;height: 50vh;" alt="">
<!--Header-Area/-->
<section>
    <div class="space-50"></div>
    <div class="container">
        <h2 class="text-center" style="color: #6eabd1;">Consultations IST</h2>
        <div class="space-20"></div>
        <div class="row">
            <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="">
                    <img class="img img-responsive" src="images/vitrine/infirmier.png" style="height: 100%; width: 100%;" />
                </div>
            </div>

            <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                <div class="" style="text-align: justify;">
                    <p>
                        eCentre Convivial vous offre des services adaptés en matière de la prise en charge des Infections Sexuellement Transmissibles. A travers notre plateforme, vous décrivez le mal dont vous souffrez et vous serez référés vers un centre convivial ou une formation sanitaire la plus proche de votre situation géographique. Un personnel de santé qualité sera aussitôt informé de votre arrivée et vous réservera un accueil convivial. 
                    </p>

                    <p>
                        En choisissant un centre convivial ou une formation sanitaire la plus proche de votre situation géographique, vous serez automatiquement informés des différentes prestations des services offerts ainsi que des frais de consultation et de la disponibilité des produits. 
                    </p>
                    <div class="space-20"></div>
                     <div class="row text-center">
         <a href="{{route('do-consultation')}}" class="btn btn-link text-uppercase">Je fais ma consultation</a>
     </div>
                     <div class="space-0"></div>
                </div>
            </div>
        </div>

    
    </div>

</section>
<!--Work-Section-->
    @include("Footer.vitrineFooter")
<!--Footer-area-->


@endsection