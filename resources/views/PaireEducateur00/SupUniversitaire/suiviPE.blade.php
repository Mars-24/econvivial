@extends("Template.otherTemplate")


@section("title")
    PE universitaires associés
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.supUnivSideProfile")
        <!-- partial -->
            <div class="main-panel" >
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste des PE universitaires associés</h4>
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


                                                <div class="row">
                                                    @if(count($users) > 0)
                                                        <button style="margin-left: 20px;margin-top: 0px;margin-bottom: 20px;" class="btn btn-primary" onclick="printContent('dataTable')">Imprimer</button>
                                                        <button type="button" id="exportExcel" onclick="exportTableToExcel('table', 'Liste PE Univ associée')" style="margin-left: 10px;margin-bottom: 20px;" class="btn btn-success">Exporter en excel</button>
                                                    @endif
                                                </div>

                                                <div id="dataTable">
                                                <table id="table" class="table table-bordered table-condensed table-striped " cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Région</th>
                                                    <th>Téléphone</th>
                                                    <th>Université</th>
                                                    <th>Superviseur Associé</th>
                                                    <th>Etat du compte</th>
                                                    <th>Liste Rapport</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="item{{$user->id}}">
                                                        <td>{{$user->paireducateur->code}}</td>
                                                        <td>{{$user->paireducateur->region->libelle}}</td>
                                                        <td>{{$user->numero}}</td>
                                                        <td>{{$user->paireducateur->ecole->libelle}}</td>
                                                        <td style="text-transform: uppercase;">{{\App\User::where("id", \App\AffectationPE::where("educateur_id", $user->id)->first()->affectant_id)->first()->paireducateur->code}}</td>
                                                        <td>@if($user->actif) <span style="color: green; font-size: 20px;">Actif</span> @else
                                                                <span style="color: red; font-size: 20px;">Non actif</span>@endif</td>
                                                        <td>
                                                            <form action="{{route('rapport-suivi-pe-univ-associe')}}" method="GET">
                                                                <input type="hidden" value="{{$user->id}}" name="ref" />
                                                               {{csrf_field()}}
                                                            <button class="btn btn-outline-primary delete-modal"
                                                                      data-id = "{{$user->id}}">Liste rapport</button>
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