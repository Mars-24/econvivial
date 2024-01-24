@extends("Template.newVitrineTemplate")

@section("title")
    Conseils pratiques
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
                    <h3 class="text-white"><i>Recevez nos conseils pratiques</i></span> </h3>
                
                </div>

            </div>

        </div>
    </header>

    <section>
        <div class="space-100"></div>
        <div class="container">
            <h2 class="text-center">Les différents conseils pratiques en matière de la santé sexuelle </h2>
            <div class="space-50"></div>
            <div class="row">
                @foreach($conseils as $conseil)
                    <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="panel text-center single-blog box-conseilPratique" >
                            <a

                                   
             @if($conseil->titre == 'Infection Sexuellement Transmissible (IST)')
                href="{{route('conseil-ist')}}"

             @elseif($conseil->titre == 'Le VIH / SIDA')
                href="{{route('conseil-vih')}}"

             @elseif($conseil->titre == 'Le dépistage volontaire du VIH')
             href="{{route('conseil-depistage')}}"

             @elseif($conseil->titre == 'Le cycle menstruel')
             href="{{route('conseil-cycle-mesntruel')}}"

             @elseif($conseil->titre == 'Hygiène sexuelle et menstruelle')
             href="{{route('conseil-hygiene-sexuelle')}}"

             @elseif($conseil->titre == 'Grossesse précoce et non désirée')
             href="{{route('conseil-grossesse-precoce')}}"

             @elseif($conseil->titre == 'Le préservatif masculin')
             href="{{route('conseil-preservatif-masculin')}}"

             @elseif($conseil->titre == 'Le préservatif féminin')
             href="{{route('conseil-preservatif-feminin')}}"

             @elseif($conseil->titre == "L’hymen")
             href="{{route('conseil-hymen')}}"

             @elseif($conseil->titre == "L’abstinence sexuelle")
             href="{{route('conseil-abstinence')}}"

             @elseif($conseil->titre == "Le taux de cellules CD4")
             href="{{route('conseil-cellule-cd4')}}"

             @elseif($conseil->titre == "La charge virale")
             href="{{route('conseil-charge-virale')}}"

             @endif
                                    
                             >
                            <img  src="uploads/img/{{$conseil->image}}" class="img-full img img-responsive" width="" alt="">
                            <div class="padding-20">
                                <ul class="list-unstyled list-inline">

                                </ul>
                                <div class="space-10"></div>
                                <h4 style="color: #6eabd1;">{{\Illuminate\Support\Str::limit($conseil->titre, 70)}}</h4>
                                <div class="space-15"></div>
                                <p>{{\Illuminate\Support\Str::limit($conseil->description, 100)}}</p>
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

        <a class="trigger_popup_fricc"></a>

        <div class="hover_bkgr_fricc">
            <span class="helper"></span>
            <div>
                <div class="popupCloseButton">X</div>
                <h3>Connectez-vous pour lire cet article</h3>
                <a class="btn btn-success" href="{{route('connexion')}}">Je me connecte</a>
            </div>
        </div>
    </section>
    @include("Footer.vitrineFooter")
    <!--Footer-area-->

<script>
    /**
     * Popup pour se connecter avant lecture
     */

    function showPopUp(){
        $('.hover_bkgr_fricc').show();

        $('.popupCloseButton').click(function(){
            $('.hover_bkgr_fricc').hide();
        });
    }
</script>
@endsection