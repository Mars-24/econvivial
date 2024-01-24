@extends("Template.otherTemplate")


@section("title")
    Entretiens en attentes de validation
@endsection


@section("body")

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
                                    <h4 class="card-title">Entretiens en attentes de validation</h4>
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


                                            <table id="table" class="table table-bordered table-condensed table-striped table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date et Heure</th>
                                                    <th>Ets / Départ...</th>
                                                    <th>Code élève / étudiant</th>
                                                    <th>Type d'activité</th>
                                                    <th>Objet d'entretien</th>
                                                    <th>Contenu entretien</th>
                                                    <th>Difficulté</th>
                                                    <th>Statut</th>
                                                    <th>Rapport</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($entretiens as $entretien)
                                                    <tr class="item{{$entretien->id}}">
                                                        <td>{{$entretien->created_at}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $entretien->user_id)->first()->ecole->libelle}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $entretien->user_id)->first()->code}}</td>
                                                        <td><b>Entretien Individuel</b></td>
                                                        <td>{{$entretien->contenuentretien->typeentretien->libelle}}</td>
                                                        <td>{{$entretien->contenuentretien->contenu}}</td>
                                                        <td>{{$entretien->difficulte}}</td>
                                                        <td><b>{{$entretien->statut}}</b></td>
                                                        <td><b>@if(!$entretien->supValidation)
                                                                    <label class="badge badge-danger badge-pill">Attente</label>
                                                                   @else
                                                                    <label class="badge badge-success badge-pill">Validé</label>
                                                                @endif
                                                            </b></td>
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