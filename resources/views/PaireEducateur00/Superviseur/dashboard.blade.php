@extends("Template.otherTemplate")


@section("title")
    Entretiens en attentes de validation | Superviseur
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navSuperviseur")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.superviseurSideProfil")
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
                                                    <th>Ets Scolaire</th>
                                                    <th>Code élève / étudiant</th>
                                                    <th>PE</th>
                                                    <th>Type d'entretien</th>
                                                    <th>Contenu entretien</th>
                                                    <th>Difficulté</th>
                                                    <th>Statut</th>
                                                    <th>Valider</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($entretiens as $entretien)
                                                    <tr class="item{{$entretien->id}}">
                                                        <td>{{$entretien->created_at}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $entretien->user_id)->first()->ecole->libelle}}</td>
                                                        <td><b>{{\App\PairEducateur::where('id', $entretien->user_id)->first()->code}}</b></td>
                                                        <td><b>{{\App\PairEducateur::where('id', $entretien->pair_educateur_id)->first()->nom }}
                                                            {{\App\PairEducateur::where('id', $entretien->pair_educateur_id)->first()->prenom }}</b></td>

                                                        <td>{{\App\ContenuEntretien::where("id", $entretien->contenu_entretien_id)->first()->typeentretien->libelle}}</td>
                                                        <td>{{\App\ContenuEntretien::where("id", $entretien->contenu_entretien_id)->first()->contenu}}</td>

                                                        <td>{{$entretien->difficulte}}</td>
                                                        <td>{{$entretien->statut}}</td>
                                                        <td>
                                                            <form action="{{route('postValidationSuperviseur')}}" method="POST">
                                                                <input type="hidden" name="id" value="{{$entretien->id}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <button type="submit"  class="btn btn-primary">Valider</button>
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