@extends("Template.otherTemplate")


@section("title")
    Générer un rapport de consultation
@endsection




@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navFormationSanitaire")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include("Profile.formationSideProfil")
        <!-- partial -->
            <div class="main-panel" >
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">HISTORIQUE DES RAPPORTS DES CONSULTATIONS</h4>
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

                                        </div>

                                        <div  class="col-sm-12" id="dataTable"  style="margin: 10px;" >

											<table class="table table-bordered table-responsive" cellspacing="0">
                                                <thead>

													<tr rowspan="2">
														<th rowspan="2"  style="text-align:center;">Date</th>
														<th rowspan="2"  style="text-align:center;">Code_User</th>
														<th rowspan="2" style="text-align:center;">Nature traitement</th>
														<th rowspan="2" style="text-align:center;">Syndrome</th>
														<th rowspan="2"  style="text-align:center;">Traitement</th>
														<th rowspan="2"  style="text-align:center;">Montant total</th>
													</tr>
												

                                                </thead>

                                                <tbody>

                                                    @foreach($consultations as $consultation)
														<tr>
															<td>{{date_format(date_create($consultation->created_at),"d M Y") }}</td>
															<td>{{\App\User::where("id", $consultation->user_id)->first()->codeUser}}</td>
															<td> {{\App\ResultatConsultation::where("consultation_id", $consultation->id)->first()->natureTraitement}}</td>
															<td>{{\App\ResultatConsultation::where("consultation_id", $consultation->id)->first()->syndrome}}</td>
															<td>{{\App\ResultatConsultation::where("consultation_id", $consultation->id)->first()->traitement}}</td>
															<td> </td>
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