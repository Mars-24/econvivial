@extends("Template.newVitrineTemplate")

@section("title")
   Activités eConvivial
@endsection

@section("referencement")

    <meta name="description" content="Le test de dépistage est une analyse de sang qui permet de connaître son statut sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas." />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
    <meta name="category" content="Conseils pratiques sur eCentre Convivial">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/conseilspratiques">
    <meta name="robots" content="index, follow">
@endsection

@section("body")

    <!--Header-Area-->
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
                    <h3 class="text-white"><i>Consulter nos activités </i></span> </h3>
                
                </div>

            </div>

        </div>
    </header>

    <section>
        <div class="space-100"></div>
        <div class="container">
            <h2 class="text-center">Les différents activités au sein eConvivial </h2>
            <div class="space-50"></div>
            <div class="row">
                @foreach($activites as $activite)
                    <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="panel text-center single-blog box-conseilPratique" >
                           <a href="/detailActivite?ref={{$activite->id}}&_token={{Session::token()}}">
                            <img  src="{{$activite->image}}" style="width:100%; height:250px" class="img-responsive"  alt="">
                            <div class="padding-20">
                                <ul class="list-unstyled list-inline">

                                </ul>
                                <div class="space-10"></div>
                                <h4 style="color: #6eabd1;">{{\Illuminate\Support\Str::limit($activite->titre, 70)}}</h4>
                                <div class="space-15"></div>
                                <p>{{\Illuminate\Support\Str::limit($activite->description, 110)}}</p>
                                <div class="space-20"></div>
                            </div>
                            </a>
                        </div>
                    </div>  
                @endforeach
            </div>
        </div>
        <div class="space-80"></div>

        <a class="trigger_popup_fricc"></a>

    </section>
    @include("Footer.vitrineFooter")
    <!--Footer-area-->

@endsection