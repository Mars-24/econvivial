@extends("Template.otherTemplate")


@section("title")
    Liste des plaintes utilisateurs
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovPvvihSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste des plaintes utilisateurs</h4>
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

                                            <table id="table" class="table table-bordered table-condensed table-striped" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Ref</th>
                                                    <th>Code</th>
                                                    <th>Date</th>
                                                    <th>Nom</th>
                                                    <th>Téléphone</th>
                                                    <th>Type Plainte</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($plaintes as $plainte)
                                                    <tr class="item{{$plainte->id}}">
                                                        <td>{{$plainte->id}}</td>
                                                        <td>{{$plainte->code}}</td>
                                                        <td>{{date_format(date_create($plainte->created_at),"d M Y")}}</td>
                                                        <td>{{$plainte->nom}}</td>
                                                        <td><b>{{$plainte->telephone}}</b></td>
                                                        <td><b>{{$plainte->typePlainte}}</b></td>
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