@extends("Template.newVitrineTemplate")

@section("title")
    Agenda | {{$agenda->titre}}
@endsection

@section("referencement")
    <meta name="description" content="Agenda d'évènement sur eCentre Centre convivial. " />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
    <meta name="category" content="Agenda | {{$agenda->titre}}">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="http://www.e-centreconvivial.org/detailAgenda">
    <meta name="robots" content="index, follow">


    <meta name="image" content="http://www.e-centreconvivial.org/public/uploads/agenda/{{$agenda->imageAgenda}}"/>

    <meta property="og:url" content="http://www.e-centreconvivial.org/detailAgenda">
    <meta property="og:image" content="http://www.e-centreconvivial.org/public/uploads/agenda/{{$agenda->imageAgenda}}">
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

    @if($agenda->banniereAgenda != null)
    <img class="img img-responsive" src="public/uploads/agenda/{{$agenda->banniereAgenda}}" style="width: 100%;height: 50vh;" alt="">
    @else
        <img class="img img-responsive" src="images/services/banniere_rose_bleu.jpg" style="width: 100%;height: 50vh;" alt="">
    @endif

    <section>
        <div class="space-50"></div>
        <div class="container">
            <h2 class="text-center" style="color: #6eabd1;">{{$agenda->titre}}</h2>
            <div class="space-20"></div>
            <div class="row">
                <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="">
                        <img class="img img-responsive" width="50%" src="public/uploads/agenda/{{$agenda->imageAgenda}}" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 0vh;">
                    <div class="" style="text-align: justify;">
                        <p>
                            {{$agenda->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
    </section>
    <!--Work-Section-->

    @include("Footer.vitrineFooter")
    <!--Footer-area-->


@endsection