@extends("Template.otherTemplate")


@section("title")
   Valider le compte d'un élève / étudiant
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
                                    <h4 class="card-title">Liste des inscriptions en attentes de validation ( <span style="color: blue;"><b>{{$ecole->libelle}}</b></span>)</h4>
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
                                                    <th>Code élève / étudiant</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Téléphone</th>
                                                    <th>Date Naissance</th>
                                                    <th>Ets Scolaire</th>
                                                    <th>Statut</th>
                                                    <th>Valider</th>
                                                    <th>Rejeter</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="item{{$user->id}}">
                                                        <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->code}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->nom}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->prenom}}</td>
                                                        <td>{{$user->numero}}</td>
                                                        <td>{{$user->datenaissance}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->ecole->libelle}}</td>
                                                        <td>
                                                            <label class="badge badge-danger badge-pill">Attente</label>
                                                        </td>

                                                        <td>
                                                            <form action="{{route('postValideUserPeInscription')}}" method="POST">
                                                            <input type="hidden" name="id" value="{{$user->id}}" />
                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <button class="btn btn-outline-primary">Valider l'inscription</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                           <button class="btn btn-outline-danger rejet-modal" data-id="{{$user->id}}">Rejeter l'inscription</button>
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


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('postRejectUserPeInscription')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Motif de rejet d'une inscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:red;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Motif de rejet de l'inscription</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="motif" placeholder="Le motif du rejet de l'inscription"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="user-id" name="id" />
                        <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}" />
                        <button type="submit" class="btn btn-danger">Rejeter l'inscription</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(".rejet-modal").on("click", function (event) {
            event.preventDefault();
            $("#user-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });
    </script>
@endsection