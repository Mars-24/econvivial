@extends("Template.otherTemplate")


@section("title")
    Souscriptions au suivi de grossesse annulées
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Souscriptions au suivi de grossesse annulées</h4>
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


                                            <table id="table" class="table table-bordered table-condensed table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date annulation</th>
                                                    <th>Nom utilisateur</th>
                                                    <th>Email</th>
                                                    <th>N° Téléphone</th>
                                                    <th>Motif</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($annulations as $annulation)
                                                    <tr >
                                                        <td><b>{{date_format(date_create($annulation->created_at),"d M Y")}}</b></td>
                                                        <td><b>{{\App\User::where("id", $annulation->user_id)->first()->username}}</b></td>
                                                        <td><b>{{\App\User::where("id", $annulation->user_id)->first()->email}}</b></td>
                                                        <td><b>(+228) {{\App\User::where("id", $annulation->user_id)->first()->numero}}</b></td>
                                                        <td><b>{{$annulation->motif}}</b></td>
                                                        <td>
                                                            <label class="badge badge-danger badge-pill">Souscription annulée</label>
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

@endsection