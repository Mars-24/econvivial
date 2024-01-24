@extends("Template.otherTemplate")

@section("title")
    Attente de validation
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
                                    <h4 class="card-title">Liste des enrégistrements en attente de validation</h4>
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
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Téléphone</th>
                                                        <th>Langue</th>
                                                        <th>Type Plainte</th>
                                                        <th>Action</th>
                                                        <th>Statut</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($pvvihs as $pvvih)
                                                        <tr class="item{{$pvvih->id}}">
                                                            <td>{{$pvvih->id}}</td>
                                                            <td>{{$pvvih->code}}</td>
                                                            <td>{{$pvvih->nom}}</td>
                                                            <td>{{$pvvih->prenom}}</td>
                                                            <td><b>{{$pvvih->telephone}}</b></td>
                                                            <td><b>{{$pvvih->langue}}</b></td>
                                                            <td><b>{{$pvvih->typePlainte}}</b></td>
                                                            <td><b>{{$pvvih->action}}</b></td>
                                                            <td><b>@if(!$pvvih->validation1)
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