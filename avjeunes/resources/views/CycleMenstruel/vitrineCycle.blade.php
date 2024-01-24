@extends("Template.newVitrineTemplate")

@section("title")
   Suivi du cycle menstruel
@endsection

@section("referencement")
    <meta name="description" content="Nous assistons les femmes, surtout les jeunes filles dans la gestion de leur cycle menstruel et de l’hygiène menstruelle. En optant pour cette option, eCentre Convivial reste à votre écoute, vous assiste et vous informe des moments probable de votre menstruation et de la période d’ovulation. " />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
    <meta name="category" content="Suivi du cycle menstruel">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/suivi-cycle-menstruel">
    <meta name="robots" content="index, follow">
      
    <meta name="image" content="https://econvivial.org/images/vitrine/img7.png"/>

<meta property="og:url" content="https://econvivial.org/suivi-cycle-menstruel">
<meta property="og:image" content="https://econvivial.org/images/vitrine/img7.png">
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

    <img class="img img-responsive" src="images/services/regle.jpg" style="width: 100%;height: 50vh;" alt="">
    <!--Header-Area/-->
    <section>
        <div class="space-50"></div>
        <div class="container">
            <h2 class="text-center" style="color: #6eabd1;">Suivi du cycle menstruel</h2>
            <div class="space-20"></div>
            <div class="row">
                <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="">
                        <img class="img img-responsive" src="images/vitrine/img7.png" style="height: 100%; width: 100%;" />
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                    <div class="" style="text-align: justify;">
                        <p>
                            Nous assistons les femmes, surtout les jeunes filles dans la gestion de leur cycle menstruel et de l’hygiène menstruelle. En optant pour cette option, eCentre Convivial reste à votre écoute, vous assiste et vous informe des moments probables de votre menstruation et de la période d’ovulation.
                        </p>

                        <p>
                            Vous recevrez alors périodiquement des notifications à quelques jours de votre menstruation et de votre ovulation. Retenez que ce sont des probabilités et que les données peuvent varier en fonction des changements biologiques qui pourraient intervenir dans la vie de la femme ou de la jeune fille. En cas de changement du cycle, il vous suffit de régler les paramètres du Cycle menstruel.
                        </p>
                        <div class="space-5"></div>
                        <div class="row text-center">
                            <a href="{{route('suivi-de-regle')}}" class="btn btn-link text-uppercase">à quand ma prochaine règle</a>
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