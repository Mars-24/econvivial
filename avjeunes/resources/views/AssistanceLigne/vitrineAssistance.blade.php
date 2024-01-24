@extends("Template.newVitrineTemplate")

@section("title")
   Assistance en ligne
@endsection

@section("referencement")
    <meta name="description" content="eCentre Convivial dispose d’une équipe de Téléconseillers composée de Médecins,
                            Gynécologues, Sages-femmes, Psychologues, Sociologues, Animateurs IEC et des Pairs
                            éducateurs qui sont à votre dispositions 24h/7j pour répondre à toutes vos préoccupations et
                            vous fournir les informations nécessaires en matière de la Santé Sexuelle et de la Reproduction." />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique">
    <meta name="category" content="Assistance en ligne sur eCentre Convivial">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/assistance-en-ligne">
    <meta name="robots" content="index, follow">
    
    <meta name="image" content="https://econvivial.org/images/vitrine/img4.png"/>

<meta property="og:url" content="https://econvivial.org/assistance-en-ligne">
<meta property="og:image" content="https://econvivial.org/images/vitrine/img4.png">

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
    <img class="img img-responsive" src="images/services/assistance.jpg" style="width: 100%;height: 50vh;" alt="">
    <!--Header-Area/-->
    <section>
        <div class="space-50"></div>
        <div class="container">
            <h2 class="text-center" style="color: #6eabd1;">Assistance en ligne</h2>
            <div class="space-20"></div>
            <div class="row">
                <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="">
                        <img class="img img-responsive" src="images/vitrine/img4.png" style="height: 100%; width: 100%;" />
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                    <div class="" style="text-align: justify;">
                        <p>

                            eCentre Convivial dispose d’une équipe de Téléconseillers composée de Médecins,
                            Gynécologues, Sages-femmes, Psychologues, Sociologues, Animateurs IEC et des Pairs
                            éducateurs qui sont à votre dispositions 24h/7j pour répondre à toutes vos préoccupations et
                            vous fournir les informations nécessaires en matière de la Santé Sexuelle et de la Reproduction.

                        </p>

                        <p>
                            Quelle que soit la nature de votre problème, un professionnel de la santé vous répond.
                            Il suffit alors de sélectionner le prestataire de votre choix et de lui décrire
                            votre problème. Vous aurez la réponse aussitôt ou dans les minutes qui suivent.
                        </p>
                        <div class="space-20"></div>
                        <div class="row text-center">
                            <a href="{{route('assistance-medecin')}}" class="btn btn-link text-uppercase">J'écris à mon téléconseiller</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    
    </section>
    <!--Work-Section-->
    @include("Footer.vitrineFooter")
    <!--Footer-area-->


@endsection