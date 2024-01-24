@extends("Template.otherTemplate")


@section("title")
    Détail rapport
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Détail {{$rapport->description}} du {{date_format(date_create($rapport->created_at), "d M Y")}}</h4>
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

                                            <table id="table" class="table table-bordered table-condensed" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Nom utilisateur</th>
                                                    <th>Date dernière règle</th>
                                                    <th>Durée du cycle</th>
                                                    <th>
                                                        @if($rapport->typeAlerte == "Regle")
                                                        Date probable prochaine règle
                                                            @else
                                                            Date probable prochaine ovulation
                                                        @endif
                                                    </th>
                                                    <th>SMS Reçu</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($details as $detail)
                                                    <tr>
                                                        <td><b>{{\App\User::where("id", $detail->user_id)->first()->username}}</b></td>
                                                        <td>{{date_format(date_create(\App\Menstruation::where("id", $detail->menstru_id)->first()->dateRegle),"d M Y") }}</td>
                                                        <td>{{\App\Menstruation::where("id", $detail->menstru_id)->first()->dureeCycle}}</td>
                                                        <td><b>
                                                                @if($rapport->typeAlerte == "Regle")
                                                                    {{date_format(date_create(\App\Menstruation::where("id", $detail->menstru_id)->first()->dateProchainRegle),"d M Y")}}
                                                                @else
                                                                    {{date_format(date_create(\App\Menstruation::where("id", $detail->menstru_id)->first()->dateProchainOvulation),"d M Y")}}
                                                                @endif
                                                            </b></td>
                                                        <td>
                                                            @if(!$detail->recu)
                                                                <label class="badge badge-danger badge-pill">NON</label>
                                                            @else
                                                                <label class="badge badge-success badge-pill">OUI</label>
                                                            @endif
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