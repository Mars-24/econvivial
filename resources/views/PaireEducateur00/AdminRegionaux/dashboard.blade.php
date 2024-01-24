@extends("Template.otherTemplate")

@section("title")
    Rapport des M&E ONG
@endsection

@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.adminRegSideProfil")
        <!-- partial -->
            <div class="main-panel" >
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">RAPPORT MENSUEL D’ACTIVITES DES M&E ONG </h4>
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

                                            @if($debut != null && $fin != null && count($rapports) > 0)
                                                <button style="margin-left: 20px;margin-top: 30px;" class="btn btn-primary" onclick="printContent('dataTable')">Imprimer</button>
                                                <form style="display: none;" action="{{route('generer-rapport-superviseur-universitaire')}}" method="POST">
                                                    <input type="hidden" value="{{$debut}}" name="debut" />
                                                    <input type="hidden" value="{{$fin}}" name="fin" />
                                                    <input type="hidden" value="{{Session::token()}}" name="_token" />
                                                    <button style="margin-left: 10px;margin-bottom: 20px;" class="btn btn-success">Envoyer le rapport</button>
                                                </form> <br/>
                                            @endif

                                            <div class="col-sm-12">

                                                <h4>Générer un rapport mensuel</h4>

                                                <form action="" method="GET">
                                                    <div class="row" style="margin-bottom: 30px;">

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Période du :</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d')}}" value="{{$debut}}" type="date" name="debut" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">au :</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d')}}" value="{{$fin}}" type="date" name="fin" required />
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Générer le rapport</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>

                                            <div  class="col-sm-12" id="dataTable"  style="margin: 10px;" >
                                                <p  class="text-center">
                                                <h3 style="text-align: center;"><u><b >Fiche périodique des rapports reçu @if($debut != null && $fin != null) <span> du {{date_format(date_create($debut),"d/m/Y")}} au {{date_format(date_create($fin),"d/m/Y")}}</span> @endif </b></u></h3>
                                                </p>

                                                <table  class="table table-bordered table-responsive" cellspacing="0">
                                                    <thead>

                                                    <tr rowspan="2">
                                                        <th rowspan="2"  style="text-align:center;">Rapport du</th>
                                                        <th rowspan="2"  style="text-align:center;">Rapport au</th>
                                                        <th rowspan="2"  style="text-align:center;">N° Rapport</th>
                                                        <th rowspan="2"  style="text-align:center;">Code PE</th>
                                                        <th colspan="2" style="text-align:center;">Type Activité</th>
                                                        <th colspan="{{count($themes)}}"  style="text-align:center;">Thème IEC/ECC</th>
                                                        <th colspan="2"  style="text-align:center;">Condom distribué</th>
                                                        <th colspan="2"  style="text-align:center;">Référé</th>
                                                        <th rowspan="2"  style="text-align:center;">Détail</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Individuel</td>
                                                        <td>Causerie</td>

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
                                                            <td>{{$rapport->ABS}}</td>
                                                            <td>{{$rapport->AUTRE}}</td>
                                                            <td>{{$rapport->CDV}}</td>
                                                            <td>{{$rapport->GP}}</td>
                                                            <td>{{$rapport->HS}}</td>
                                                            <td>{{$rapport->IST}}</td>
                                                            <td>{{$rapport->PLF}}</td>
                                                            <td>{{$rapport->PF}}</td>
                                                            <td>{{$rapport->PM}}</td>
                                                            <td>{{$rapport->CM}}</td>

                                                            <td>{{$rapport->condomMasculin}}</td>
                                                            <td>{{$rapport->condomFeminin}}</td>

                                                            <td>{{$rapport->ouiRefere}}</td>
                                                            <td>{{$rapport->nonRefere}}</td>
                                                            <td>
                                                                <form action="{{route('detail-rapport-superviseur-universitaire')}}" method="GET">
                                                                    <input type="hidden" value="{{Session::token()}}" name="token" />
                                                                    <input type="hidden" value="{{$rapport->id}}" name="id" />
                                                                    <input type="hidden" value="Sup Univ" name="type" />
                                                                    <button class="btn btn-outline-primary">Détail</button>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                    </tbody>

                                                </table>
                                            </div>
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