@extends("Template.otherTemplate")


@section("title")
    Suivi des pairs éducateurs
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
                                    <h4 class="card-title">Suivi des pairs éducateurs <span style="color: blue;"><b>{{$ecole->libelle}}</b></span></h4>
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
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Téléphone</th>
                                                    <th>Ets / Départ...</th>
                                                    <th>Région</th>
                                                    <th>Suivre</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="item{{$user->id}}">
                                                        <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->nom}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->prenom}}</td>
                                                        <td>{{$user->numero}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->ecole->libelle}}</td>
                                                        <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->region->libelle}}</td>
                                                        <td>
                                                            <form action="{{route('suivi-de-pe-sup')}}" method="GET">
                                                                <input type="hidden" name="ref" value="{{$user->id}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <button class="btn btn-outline-success">Suivre</button>
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