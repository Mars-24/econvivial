@extends("Template.newVitrineTemplate")

@section("title")
    Agenda | eCentre Convivial
@endsection

@section("referencement")
    <meta name="description" content="Le Centre Convivial vous propose des jeux Puzzle et des questions Quizz pouvant vous permettre de gagner des prix. " />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
    <meta name="category" content="Suivi de grossesse">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/agenda">
    <meta name="robots" content="index, follow">
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

    <img class="img img-responsive" src="images/services/banniere_rose_bleu.jpg" style="width: 100%;height: 50vh;" alt="">

    {{--<section>--}}
        {{--<div class="space-50"></div>--}}
        {{--<div class="container">--}}
            {{--<h2 class="text-center" style="color: #6eabd1;">Agenda du eCentre Convivial</h2>--}}
            {{--<div class="space-20"></div>--}}
            {{--<div class="row">--}}
                {{--<div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">--}}
                    {{--<div class="">--}}

                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 30vh;">--}}
                    {{--<div class="" style="text-align: justify;">--}}

                        {{--<div class="space-20"></div>--}}
                        {{--<div class="row text-center">--}}
                            {{--<a href="{{route('suivi-de-grossesse')}}" class="btn btn-link text-uppercase">Suivre ma grossesse</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


    <section>
        <div class="space-50"></div>
        <div class="container">
            <h2 class="text-center">Agenda eCentre Convivial </h2>
            <div class="space-50"></div>
            <div class="row">
                @foreach($agendas as $agenda)
                    <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="panel text-center single-blog box-conseilPratique" >
                            <a @if($agenda->titre == "Spéciale Soirée Roz'Bleu") href="{{route('soiree-rose-bleue')}}" @else href="/detailAgenda?ref={{$agenda->id}}&_token={{Session::token()}}"  @endif>
                                <img  src="uploads/agenda/{{$agenda->imageAgenda}}" class="img-full img img-responsive" width="100%" alt="">
                                <div class="padding-20">
                                    <ul class="list-unstyled list-inline">

                                    </ul>
                                    <div class="space-10"></div>
                                    <h4 style="color: #6eabd1;">{{\Illuminate\Support\Str::limit($agenda->titre, 70)}}</h4>
                                    <div class="space-15"></div>
                                    <p>{{\Illuminate\Support\Str::limit($agenda->description, 100)}}</p>
                                    <div class="space-20"></div>
                                    Lire la suite
                                    <div class="space-20"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="space-80"></div>
    </section>
    <!--Work-Section-->


    @include("Footer.vitrineFooter")
    <!--Footer-area-->


@endsection