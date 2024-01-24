@extends("Template.newVitrineTemplate")

@section("title")
    Activité eConvivial | {{$activites->titre}}
@endsection

@section("referencement")
    <meta name="description" content="Agenda d'évènement sur eCentre Centre convivial. " />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
    <meta name="category" content="Activité | {{$activites->titre}}">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="http://www.e-centreconvivial.org/detailActivite">
    <meta name="robots" content="index, follow">


    <meta name="image" content="http://www.e-centreconvivial.org/uploads/img/{{$activites->image}}"/>

    <meta property="og:url" content="http://www.e-centreconvivial.org/detailActivite">
    <meta property="og:image" content="http://www.e-centreconvivial.org/uploads/img/{{$activites->imageActivites}}">
@endsection

@section("body")

    <header class="blue-bg relative fix" id="home">

        <div class="section-bg overlay-bg dewo ripple"></div>

    @include("HeaderNav.vitrineNav")

        <div class="space-70"></div> 
        <div class="space-20 hidden-xs"></div>

        <div class="container text-white">
            <div class="row">

                <div class="col-xs-12 col-md-4">
                    <div class="wow fadeInLeft" data-wow-delay="1s">
                        <div class="item"><img src="images/vitrine/img3.png" alt="" style=" width: 100%;"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-8 wow fadeInUp" data-wow-delay="1.5s" >
                    <div class="space-100"></div>
                    <div class="space-10"></div>
                    <h3 class="text-white"><i>Détail de l'activité</i></span> </h3>
                
                </div>

            </div>

        </div>
    </header>

    <section>
        <div class="space-50"></div>
        <div class="container">
            <h2 class="text-center" style="color: #6eabd1;">{{$activites->titre}}</h2>
            <div class="space-20"></div>
            <div class="row">
                <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="">
                        <img class="img img-responsive" width="50%" src="{{$activites->image}}" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 0vh;">
                    <div class="" style="text-align: justify;">
                        <p>
                            {{$activites->description}}
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