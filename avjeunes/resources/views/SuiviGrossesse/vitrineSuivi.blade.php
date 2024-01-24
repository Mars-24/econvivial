@extends("Template.newVitrineTemplate")

@section("title")
   Suivi de grossesse
@endsection

@section("referencement")
    <meta name="description" content="Notre objectif est de vous fournir des informations crédibles, rassurantes
                            et qui vous serviront tout au long de votre grossesse. Un suivi accessible et
                            personnalisé" />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
    <meta name="category" content="Suivi de grossesse">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/suiviGrossesse">
    <meta name="robots" content="index, follow">
    
    <meta name="image" content="https://econvivial.org/images/vitrine/img5.png"/>

<meta property="og:url" content="https://econvivial.org/suiviGrossesse">
<meta property="og:image" content="https://econvivial.org/images/vitrine/img5.png">
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
    <!--Header-Area/-->

    <img class="img img-responsive" src="images/services/grossesse.jpg" style="width: 100%;height: 50vh;" alt="">
    <section>
        <div class="space-50"></div>
        <div class="container">
            <h2 class="text-center" style="color: #6eabd1;">Suivi de la grossesse</h2>
            <div class="space-20"></div>
            <div class="row">
                <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="">
                        <img class="img img-responsive" width="50%" src="images/vitrine/img5.png" />
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 0vh;">
                    <div class="" style="text-align: justify;">
                        <p>
                            Notre service organise le suivi de la grossesse, l’information et
                            l’accompagnement des futurs mères et des futurs pères pour tout ce qui
                            concerne l'évolution du fœtus et l’accueil de l’enfant. Des sages-femmes
                            proposent des informations, ainsi qu'une assistance en ligne et d’échanges pour les
                            futurs parents et les jeunes parents.
                        </p>

                        <p>
                            Notre objectif est de vous fournir des informations crédibles, rassurantes
                            et qui vous serviront tout au long de votre grossesse. Un suivi accessible et
                            personnalisé dans lequel vous retrouverez :
                        </p>

                        <p >

                        <ol style="margin-left:5%;">
                            <li>	l'évolution de votre grossesse mois par mois (changements de votre corps,
                                courbe de prise de poids pendant la grossesse)… Et celle de votre bébé : découvrez comment votre tout-petit grandit
                                (taille et prise de poids) en vous, notamment grâce à des photos in utero ;</li>

                            <li>	les conseils beauté, bien-être, sexo, santé pour profiter un maximum de ces neuf mois ;</li>

                            <li>	tout ce qu’il faut savoir pour être prête le jour de l’accouchement (on vous expliquera
                                les contractions, la péridurale, la délivrance etc.) ;</li>

                            <li>	des astuces pour soulager les maux et les symptômes de grossesse (on s’en passerait bien de ces vilaines nausées,
                                des vergetures, du masque de grossesse…) et pour rester à l’écoute de son corps ;</li>
                        </ol>
                        </p>
                        <div class="space-20"></div>
                        <div class="row text-center">
                            <a href="{{route('suivi-de-grossesse')}}" class="btn btn-link text-uppercase">Suivre ma grossesse</a>
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