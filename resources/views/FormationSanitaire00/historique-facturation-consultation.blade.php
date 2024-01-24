@extends("Template.otherTemplate")

@section("title")
    Historique des Facturations
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
                                    <h4 class="card-title">HISTORIQUE DES FACTURATIONS </h4>
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

											<table class="table table-bordered table-responsive" cellspacing="0">
                                                <thead>
												<tr rowspan="2">
													<th rowspan="2"  style="text-align:center;">Rapport du</th>
                                                    <th rowspan="2"  style="text-align:center;">Rapport au</th>
                                                    <th rowspan="2"  style="text-align:center;">N° Rapport</th>
													<th rowspan='2'>Libelle</th>
													<th rowspan='2'>Nombre total de personnes réçu</th> 
													<th rowspan='2'>Coût Unitaire</th> 
													<th rowspan='2'>Montant AV-Jeunes </th> 
												</tr>
                                                </thead>

                                                <tbody>
													<tr>
														<td></td>  
														<td></td>  
														<td></td>  
														<td></td>
														<td></td>  
														<td></td>  
														<td></td> 
													</tr>
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