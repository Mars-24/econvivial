@extends("Template.otherTemplate")

@section('title', 'Générer un rapport d\'activités')

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
        @include("HeaderNav.navPairEducateur")

        <div class="container-fluid page-body-wrapper">
            @include("Profile.peUnivSideProfile")

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        RAPPORT MENSUEL D’ACTIVITES DU PAIR EDUCATEUR
                                        {{Auth::user()->paireducateur->code}}
                                    </h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)     <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            
                                            @if(Session::has('message'))
                                                <div class="form-group">
                                                    <div class="alert alert-success">
                                                        <p>{{Session::pull('message')}}</p>
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
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">
                                                                    Générer le rapport
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> @if($debut != null && $fin != null) <button
                                            style="margin-left: 20px;margin-bottom: 20px;" class="btn btn-primary"
                                            onclick="printContent('dataTable')">Imprimer</button>
                                        <form action="{{route('save-rapport-pair-educateur-universitaire')}}" method="POST">
                                            <input type="hidden" value="{{$debut}}" name="debut" /> <input type="hidden"
                                                value="{{$fin}}" name="fin" /> <input type="hidden"
                                                value="{{Session::token()}}" name="_token" /> <button
                                                style="margin-left: 10px;margin-bottom: 20px;"
                                                class="btn btn-success">Envoyer le rapport</button> </form> <br /> @endif
                                        <div class="col-sm-12" id="dataTable" style="margin: 10px;"> @if($debut != null &&
                                            $fin != null) <h3 style="text-align: center;"><u><b>Fiche périodique de rapport
                                                        couvrant la période du {{date_format(date_create($debut),"d/m/Y")}}
                                                        au {{date_format(date_create($fin),"d/m/Y")}}</b></u></h3> @endif
                                            <table class="table table-bordered table-responsive" cellspacing="0">
                                                <thead>
                                                    <tr rowspan="2">
                                                        <th rowspan="2" style="text-align:center;">Statut</th>
                                                        <th rowspan="2" style="text-align:center;">Sexe</th>
                                                        <th colspan="2" style="text-align:center;">Type Activité</th>
                                                        <th colspan="{{count($themes)}}" style="text-align:center;">Thème
                                                            IEC/ECC</th>
                                                        <th colspan="2" style="text-align:center;">Condom distribué</th>
                                                        <th colspan="2" style="text-align:center;">Référé</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Individuel</td>
                                                        <td>Causerie</td> @foreach($themes as $theme) <th>
                                                            {{$theme->libelle}}</th> @endforeach <td>M</td>
                                                        <td>F</td>
                                                        <td>OUI</td>
                                                        <td>NON</td>
                                                    </tr>
                                                </thead> @if($debut != null && $fin != null) <tbody>
                                                    <!-- Nouveau cas -->
                                                    <tr>
                                                        <td rowspan="3">Nouveau cas</td>
                                                        <td> M @foreach($types as $type)
                                                        <th>{{$pair->getStatisticByTypeActivite("Nouveau", "M", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Nouveau", "M", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Nouveau", "M","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Nouveau", "M","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Nouveau", "M","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Nouveau", "M","NON",$debut,$fin, $userID)}}
                                                        </th>
                                                    <tr>
                                                        <td>F</td> @foreach($types as $type) <th>
                                                            {{$pair->getStatisticByTypeActivite("Nouveau", "F", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Nouveau", "F", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Nouveau", "F","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Nouveau", "F","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Nouveau", "F","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Nouveau", "F","NON",$debut,$fin, $userID)}}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>T</td> @foreach($types as $type) <th>
                                                            {{$pair->getStatisticByTypeActivite("Nouveau", "M", $type->id,$debut,$fin, $userID) +                                                            $pair->getStatisticByTypeActivite("Nouveau", "F", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Nouveau", "M", $theme->id,$debut,$fin, $userID) +                                                            $pair->getStatisticByTheme("Nouveau", "F", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Nouveau", "M","condomMasculin",$debut,$fin, $userID) +                                                        $pair->getStatisticByCondom("Nouveau", "F","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Nouveau", "M","condomFeminin",$debut,$fin, $userID) +                                                        $pair->getStatisticByCondom("Nouveau", "F","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Nouveau", "M","OUI",$debut,$fin, $userID) +                                                        $pair->getStatisticByRefere("Nouveau", "F","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <tH>{{$pair->getStatisticByRefere("Nouveau", "M","NON",$debut,$fin, $userID) +                                                        $pair->getStatisticByRefere("Nouveau", "F","NON",$debut,$fin, $userID)}}
                                                        </tH>
                                                    </tr> <!-- Ancien cas -->
                                                    <tr>
                                                        <td rowspan="3">Ancien cas</td>
                                                        <td> M @foreach($types as $type)
                                                        <th>{{$pair->getStatisticByTypeActivite("Ancien", "M", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Ancien", "M", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Ancien", "M","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Ancien", "M","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "M","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "M","NON",$debut,$fin, $userID)}}
                                                        </th>
                                                    <tr>
                                                        <td>F</td> @foreach($types as $type) <th>
                                                            {{$pair->getStatisticByTypeActivite("Ancien", "F", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Ancien", "F", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Ancien", "F","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Ancien", "F","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "F","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "F","NON",$debut,$fin, $userID)}}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>T</td> @foreach($types as $type) <th>
                                                            {{$pair->getStatisticByTypeActivite("Ancien", "M", $type->id,$debut,$fin, $userID) +                                                                $pair->getStatisticByTypeActivite("Ancien", "F", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Ancien", "M", $theme->id,$debut,$fin, $userID) +                                                                $pair->getStatisticByTheme("Ancien", "F", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Ancien", "M","condomMasculin",$debut,$fin, $userID) +                                                            $pair->getStatisticByCondom("Ancien", "F","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Ancien", "M","condomFeminin",$debut,$fin, $userID) +                                                            $pair->getStatisticByCondom("Ancien", "F","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "M","OUI",$debut,$fin, $userID) +                                                            $pair->getStatisticByRefere("Ancien", "F","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <tH>{{$pair->getStatisticByRefere("Ancien", "M","NON",$debut,$fin, $userID) +                                                            $pair->getStatisticByRefere("Ancien", "F","NON",$debut,$fin, $userID)}}
                                                        </tH>
                                                    </tr> <!-- Total -->
                                                    <tr>
                                                        <td rowspan="3">Total</td>
                                                        <td> M @foreach($types as $type)
                                                        <th>{{$pair->getStatisticByTypeActivite("Ancien", "M", $type->id,$debut,$fin, $userID) +                                                            $pair->getStatisticByTypeActivite("Nouveau", "M", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Ancien", "M", $theme->id,$debut,$fin, $userID) +                                                            $pair->getStatisticByTheme("Nouveau", "M", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Ancien", "M","condomMasculin",$debut,$fin, $userID) +                                                        $pair->getStatisticByCondom("Nouveau", "M","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Ancien", "M","condomFeminin",$debut,$fin, $userID) +                                                        $pair->getStatisticByCondom("Nouveau", "M","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "M","OUI",$debut,$fin, $userID) +                                                        $pair->getStatisticByRefere("Nouveau", "M","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "M","NON",$debut,$fin, $userID) +                                                        $pair->getStatisticByRefere("Nouveau", "M","NON",$debut,$fin, $userID)}}
                                                        </th>
                                                    <tr>
                                                        <td>F</td> @foreach($types as $type) <th>
                                                            {{$pair->getStatisticByTypeActivite("Ancien", "F", $type->id,$debut,$fin, $userID) +                                                            $pair->getStatisticByTypeActivite("Nouveau", "F", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Ancien", "F", $theme->id,$debut,$fin, $userID) +                                                            $pair->getStatisticByTheme("Nouveau", "F", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Ancien", "F","condomMasculin",$debut,$fin, $userID) +                                                        $pair->getStatisticByCondom("Nouveau", "F","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Ancien", "F","condomFeminin",$debut,$fin, $userID) +                                                        $pair->getStatisticByCondom("Nouveau", "F","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "F","OUI",$debut,$fin, $userID) +                                                         $pair->getStatisticByRefere("Nouveau", "F","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "F","NON",$debut,$fin, $userID) +                                                        $pair->getStatisticByRefere("Nouveau", "F","NON",$debut,$fin, $userID)}}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>T</td> @foreach($types as $type) <th>
                                                            {{$pair->getStatisticByTypeActivite("Ancien", "M", $type->id,$debut,$fin, $userID) +                                                                $pair->getStatisticByTypeActivite("Ancien", "F", $type->id,$debut,$fin, $userID) +                                                                $pair->getStatisticByTypeActivite("Nouveau", "M", $type->id,$debut,$fin, $userID) +                                                                $pair->getStatisticByTypeActivite("Nouveau", "F", $type->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach @foreach($themes as $theme) <th>
                                                            {{$pair->getStatisticByTheme("Ancien", "M", $theme->id,$debut,$fin, $userID) +                                                                $pair->getStatisticByTheme("Ancien", "F", $theme->id,$debut,$fin, $userID) +                                                                $pair->getStatisticByTheme("Nouveau", "M", $theme->id,$debut,$fin, $userID) +                                                                $pair->getStatisticByTheme("Nouveau", "F", $theme->id,$debut,$fin, $userID)}}
                                                        </th> @endforeach <th>
                                                            {{$pair->getStatisticByCondom("Ancien", "M","condomMasculin",$debut,$fin, $userID) +                                                            $pair->getStatisticByCondom("Ancien", "F","condomMasculin",$debut,$fin, $userID) +                                                            $pair->getStatisticByCondom("Nouveau", "M","condomMasculin",$debut,$fin, $userID) +                                                            $pair->getStatisticByCondom("Nouveau", "F","condomMasculin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByCondom("Ancien", "M","condomFeminin",$debut,$fin, $userID) +                                                            $pair->getStatisticByCondom("Ancien", "F","condomFeminin",$debut,$fin, $userID) +                                                            $pair->getStatisticByCondom("Nouveau", "M","condomFeminin",$debut,$fin, $userID) +                                                            $pair->getStatisticByCondom("Nouveau", "F","condomFeminin",$debut,$fin, $userID)}}
                                                        </th>
                                                        <th>{{$pair->getStatisticByRefere("Ancien", "M","OUI",$debut,$fin, $userID) +                                                            $pair->getStatisticByRefere("Ancien", "F","OUI",$debut,$fin, $userID) +                                                            $pair->getStatisticByRefere("Nouveau", "M","OUI",$debut,$fin, $userID) +                                                            $pair->getStatisticByRefere("Nouveau", "F","OUI",$debut,$fin, $userID)}}
                                                        </th>
                                                        <tH>{{$pair->getStatisticByRefere("Ancien", "M","NON",$debut,$fin, $userID) +                                                            $pair->getStatisticByRefere("Ancien", "F","NON",$debut,$fin, $userID) +                                                            $pair->getStatisticByRefere("Nouveau", "M","NON",$debut,$fin, $userID) +                                                            $pair->getStatisticByRefere("Nouveau", "F","NON",$debut,$fin, $userID)}}
                                                        </tH>
                                                    </tr>
                                                </tbody> @endif
                                            </table> <!-- Indicateur pour le VIH --> @if($debut != null && $fin != null) <h3
                                                class="text-center" style="margin-top:30px;">Indicateurs sur le VIH</h3>
                                            <table class="table table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="text-center">INDACTEURS</th>
                                                        <th colspan="2" class="text-center">Valeurs</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Masculin</th>
                                                        <th>Féminin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td> Nombre de jeunes (Elèves :Etudiants) âgés de 10 à 24 ans ayant reçu
                                                        une formation sur le VIH fondée sur les compétences pratiques en
                                                        milieu scolaire </td>
                                                    <td>{{$pair->getStatisticByVihThemeAndTranche("M", 10,24,$debut,$fin, $userID)}}
                                                    </td>
                                                    <td>{{$pair->getStatisticByVihThemeAndTranche("F", 10,24,$debut,$fin, $userID)}}
                                                    </td>
                                                </tbody>
                                            </table> {{-- <p> </p>--}} <h3>Autre Thème (Préciser)
                                                ...................................................................................
                                            </h3>
                                            <h3>Autre Service de Référence (Préciser)
                                                ..........................................................</h3>
                                            <hr /> @endif
                                            <!-- Indicateur --> @if($debut != null && $fin != null) <h3 class="text-center"
                                                style="margin-top:30px;">Indicateurs par tranche d'âge</h3>
                                            <hr />
                                            <h4 style="margin-bottom: 30px;margin-top: 30px;">Nombre de jeunes par tranche
                                                d'âge ayant reçu une formation sur les différents thèmes</h4>
                                            <div class="row" style="margin-left: 10%;">
                                                <!-- Tranche d'age nouveau cas -->
                                                <div class="col-sm-5">
                                                    <div class="form-group row">
                                                        <table class="table table-bordered ">
                                                            <thead>
                                                                <th>Nouveau cas</th>
                                                                <th>10 - 14</th>
                                                                <th>15 - 19</th>
                                                                <th>20 - 24</th>
                                                                <th>+25</th>
                                                                <th>Total</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>M</th>
                                                                    <th>{{$val1A = $pair->getStatisticByThemeAndTranche("M", 10,14,"Nouveau",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val2A = $pair->getStatisticByThemeAndTranche("M", 15,19,"Nouveau",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val3A = $pair->getStatisticByThemeAndTranche("M", 20,24,"Nouveau",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val4A = $pair->getStatisticByThemeAndTranche("M", 25,100,"Nouveau",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val1A + $val2A + $val3A + $val4A}}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>F</th>
                                                                    <th>{{$val1B = $pair->getStatisticByThemeAndTranche("F", 10,14,"Nouveau",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val2B = $pair->getStatisticByThemeAndTranche("F", 15,19,"Nouveau",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val3B = $pair->getStatisticByThemeAndTranche("F", 20,24,"Nouveau",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val4B = $pair->getStatisticByThemeAndTranche("F", 25,100,"Nouveau",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val1B + $val2B + $val3B + $val4B}}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>T</th>
                                                                    <th>{{$val1C = $val1A + $val1B}}</th>
                                                                    <th>{{$val2C = $val2A + $val2B}}</th>
                                                                    <th>{{$val3C = $val3A + $val3B}}</th>
                                                                    <th>{{$val4C = $val4A + $val4B}}</th>
                                                                    <th>{{$val1C + $val2C + $val3C + $val4C}}</th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> <!-- Tranche d'age ancien cas -->
                                                <div class="col-sm-5" style="margin-left: 20px;">
                                                    <div class="form-group row">
                                                        <table class="table table-bordered ">
                                                            <thead>
                                                                <th>Ancien cas</th>
                                                                <th>10 - 14</th>
                                                                <th>15 - 19</th>
                                                                <th>20 - 24</th>
                                                                <th>+25</th>
                                                                <th>Total</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>M</th>
                                                                    <th>{{$val1A = $pair->getStatisticByThemeAndTranche("M", 10,14,"Ancien",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val2A = $pair->getStatisticByThemeAndTranche("M", 15,19,"Ancien",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val3A = $pair->getStatisticByThemeAndTranche("M", 20,24,"Ancien",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val4A = $pair->getStatisticByThemeAndTranche("M", 25,100,"Ancien",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val1A + $val2A + $val3A + $val4A}}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>F</th>
                                                                    <th>{{$val1B = $pair->getStatisticByThemeAndTranche("F", 10,14,"Ancien",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val2B = $pair->getStatisticByThemeAndTranche("F", 15,19,"Ancien",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val3B = $pair->getStatisticByThemeAndTranche("F", 20,24,"Ancien",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val4B = $pair->getStatisticByThemeAndTranche("F", 25,100,"Ancien",$debut,$fin, $userID)}}
                                                                    </th>
                                                                    <th>{{$val1B + $val2B + $val3B + $val4B}}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>T</th>
                                                                    <th>{{$val1C = $val1A + $val1B}}</th>
                                                                    <th>{{$val2C = $val2A + $val2B}}</th>
                                                                    <th>{{$val3C = $val3A + $val3B}}</th>
                                                                    <th>{{$val4C = $val4A + $val4B}}</th>
                                                                    <th>{{$val1C + $val2C + $val3C + $val4C}}</th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html --> @include("Footer.dashboardFooter")
                <!-- partial -->
            </div> <!-- main-panel ends -->
        </div> <!-- page-body-wrapper ends -->
    </div>
@endsection