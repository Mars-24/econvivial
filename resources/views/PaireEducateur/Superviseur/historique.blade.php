@extends("Template.otherTemplate")


@section("title")
    Historiques de rapports
@endsection



@section("body")

    <style>
        .special {
            border-collapse: collapse;
        }

        .special tr:first-child td {
            border-top: 0;
        }
        .special tr td:first-child {
            border-left: 0;
            height: 100%;
        }
        .special tr:last-child td {
            border-bottom: 0;
        }
        .special tr td:last-child {
            border-right: 0;
            height: 100%;
        }
    </style>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navPairEducateur")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.peSideProfil")
        <!-- partial -->
            <div class="main-panel" >
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Historique d'envoie de rapport d'activités</h4>
                                    <div class="row">
                                        <div class="col-sm-12">

                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                            @if(Session::has('message'))
                                                <div class="form-group">
                                                    <div class="alert alert-success">
                                                        <p>{{Session::pull('message')}} </p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(Session::has('error'))
                                                <div class="form-group">
                                                    <div class="alert alert-danger">
                                                        <p>{{Session::pull('error')}} </p>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="col-sm-12">

                                            <h4>Liste des rapports envoyés</h4>

                                        </div>

                                        <button style="margin-left: 20px;margin-bottom: 20px;margin-top: 30px;" class="btn btn-primary" onclick="printContent('dataTable')">Imprimer</button>

                                        <div  class="col-sm-12" id="dataTable"  style="margin: 10px;" >

                                                <p  class="text-center">
                                                <h3 style="text-align: center;"><u><b >Fiche périodique des rapports envoyés </b></u></h3>
                                                </p>

                                            <table class="table table-bordered table-responsive" cellspacing="0">
                                                <thead>

                                                <tr rowspan="2">
                                                    <th rowspan="2"  style="text-align:center;">Rapport du</th>
                                                    <th rowspan="2"  style="text-align:center;">Rapport au</th>
                                                    <th rowspan="2"  style="text-align:center;">N° Rapport</th>
                                                    <th rowspan="2"  style="text-align:center;">Code PE</th>
                                                    <th colspan="3" style="text-align:center;">Type Activité</th>
                                                    <th colspan="{{count($themes)}}"  style="text-align:center;">Thème IEC/ECC</th>
                                                    <th colspan="2"  style="text-align:center;">Condom distribué</th>
                                                    <th colspan="2"  style="text-align:center;">Référé</th>
                                                    <th rowspan="2"  style="text-align:center;">Détail</th>
                                                </tr>
                                                <tr>
                                                    <td>Individuel</td>
                                                    <td>Causerie</td>
                                                    <td>Autres</td>

                                                    @foreach($themes as $theme)
                                                        <th>{{$theme->libelle}}</th>
                                                    @endforeach

                                                    <td>M</td>
                                                    <td>F</td>

                                                    <td >OUI</td>
                                                    <td >NON</td>

                                                </tr>

                                                </thead>

                                                    <tbody>

                                                    <!-- Nouveau cas -->

                                                    <!-- Ancien cas -->

                                                    <!-- Total -->
                                                    @foreach($rapports as $rapport)
                                                        <tr>

                                                            <td>{{date_format(date_create($rapport->debut),"d/m/Y")}}</td>
                                                            <td>{{date_format(date_create($rapport->fin),"d/m/Y")}}</td>
                                                            <td>{{$rapport->codeRapport}}</td>
                                                            <td>{{$rapport->codePE}}</td>
                                                            <td>{{$rapport->individuel}}</td>
                                                            <td>{{$rapport->causerie}}</td>
                                                            <td>{{$rapport->autres}}</td>
                                                            <td>{{$rapport->ABS}}</td>
                                                            <td>{{$rapport->ASSIS2}}</td>
                                                            <td>{{$rapport->AUTRE}}</td>
                                                            <td>{{$rapport->CDV}}</td>
                                                            <td>{{$rapport->GP}}</td>
                                                            <td>{{$rapport->HS}}</td>
                                                            <td>{{$rapport->IST}}</td>
                                                            <td>{{$rapport->PLF}}</td>
                                                            <td>{{$rapport->PF}}</td>
                                                            <td>{{$rapport->PM}}</td>
                                                            <td>{{$rapport->CM}}</td>
                                                            <td>{{$rapport->TELEC}}</td>
                                                            <td>{{$rapport->WEBS}}</td>

                                                            <td>{{$rapport->condomMasculin}}</td>
                                                            <td>{{$rapport->condomFeminin}}</td>

                                                            <td>{{$rapport->ouiRefere}}</td>
                                                            <td>{{$rapport->nonRefere}}</td>

                                                            <td>
                                                                <form action="{{route('detail-rapport-superviseur-educateur-ecole')}}" method="GET">
                                                                <input type="hidden" value="{{Session::token()}}" name="token" />
                                                                <input type="hidden" value="{{$rapport->id}}" name="id" />
                                                                <input type="hidden" value="Sup" name="type" />
                                                                <button class="btn btn-outline-primary">Détail</button>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    
                                                    </tbody>

                                            </table>

                                            <!-- Indicateur -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

@endsection