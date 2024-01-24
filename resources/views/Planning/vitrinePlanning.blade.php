@extends("Template.newVitrineTemplate")

@section("title")
   Planning Familial
@endsection

@section("referencement")
    <meta name="description" content="Promouvoir l’espacement de naissance et éviter des grossesses précoces ou non désirées, tel est notre objectif. eCentre Convivial vous offre des informations détaillées sur les
                            méthodes contraceptives nécessaires et vous met en relation avec des professionnels de la santé." />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
    <meta name="category" content="Planning familial">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/planning-familial">
    <meta name="robots" content="index, follow">
    
    <meta name="image" content="https://econvivial.org/images/vitrine/img6.png"/>

<meta property="og:url" content="https://econvivial.org/planning-familial">
<meta property="og:image" content="https://econvivial.org/images/vitrine/img6.png">
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

    <img class="img img-responsive" src="images/services/grossesse.jpg" style="width: 100%;height: 50vh;" alt="">
    <!--Header-Area/-->
    <section>
        <div class="space-50"></div>
        <div class="container">
            <h2 class="text-center" style="color: #6eabd1;">Planning Familial</h2>
            <div class="space-5"></div>
            <div class="row">
                <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="">
                        <img class="img img-responsive" src="images/vitrine/img6.png" style="height: 100%; width: 100%;" />
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 10px;">
                    <div class="" style="text-align: justify;">
                        <p>

                            Promouvoir l’espacement de naissance et éviter des grossesses précoces ou non désirées,
                            tel est notre objectif. eCentre Convivial vous offre des informations détaillées sur les
                            méthodes contraceptives nécessaires et vous met en relation avec des professionnels de la santé.

                        </p>

                        <p>
                            Vous avez la possibilité d’interagir sur chaque méthode et de poser des questions à nos
                            Téléconseillers disponibles 24h/24 et 7j/7 pour répondre à vos préoccupations. ils vous
                            informeront des détails sur chaque méthodes et vous dirigeront vers les formations sanitaires
                            adaptées à vos besoins.
                        </p>

                        <div class="space-5"></div>
                        <div class="row text-center">
                            <a href="{{route('methode-naturelle')}}" class="btn btn-link text-uppercase">Découvrez nos méthodes</a>
                        </div>
                        <div class="space-10"></div>
                    </div>
                </div>
            </div>

        </div>
    
    </section>
    <!--Work-Section-->
    @include("Footer.vitrineFooter")
    <!--Footer-area-->


@endsection