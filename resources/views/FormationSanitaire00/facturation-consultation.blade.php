@extends("Template.otherTemplate")

@section("title")
    Facturation
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
                                    <h4 class="card-title">FACTURATION DE : <b style="color: blue;"> {{\App\FormationSanitaire::where("id", $utilisateur->formation_sanitaire_id)->first()->libelle}}</b></h4>
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

                                        <div class="col-sm-12">

                                            <h4>Générer une facture</h4>

                                            <form action="" method="GET">
                                                <div class="row" style="margin-bottom: 30px;">

                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Période du :</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d')}}" value="{{$debut}}" type="date" name="debut" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">au :</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d')}}" value="{{$fin}}" type="date" name="fin" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Générer le rapport</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>

                                        
										@if($debut != null && $fin != null)
                                            <button style="margin-left: 20px;margin-bottom: 20px;" class="btn btn-primary" onclick="printContent('dataTable')">Imprimer</button>
							
                                            <form action="" method="POST">
                                            <input type="hidden" value="{{$debut}}" name="debut" />
                                            <input type="hidden" value="{{$fin}}" name="fin" />
                                            <input type="hidden" value="{{Session::token()}}" name="_token" />
                                            <button style="margin-left: 10px;margin-bottom: 20px;" class="btn btn-success">Envoyer le rapport</button>
                                            </form> <br/>
                                        @endif

                                        <div  class="col-sm-12" id="dataTable"  style="margin: 10px;" >

                                            @if($debut != null && $fin != null)
                                                <p  class="text-center">
													<h3 style="text-align: center;"><u><b >Facture couvrant la période du {{date_format(date_create($debut),"d/m/Y")}} au {{date_format(date_create($fin),"d/m/Y")}}</b></u></h3>
                                                </p>
                                            @endif
					
											<table class="table table-bordered table-responsive" cellspacing="0">
                                                <thead>
												<tr rowspan="2">
													<th rowspan='2'>Libelle</th>
														<th rowspan='2'>Nombre total de personnes réçu</th> 
														<th rowspan='2'>Coût Unitaire</th> 
														<th rowspan='2'>Montant AV-Jeunes </th> 
												</tr>
                                                </thead>

                                                <tbody>
													<tr>
														<td>Consultation IST</td>  
														<td>{{$nbrePersoIST}}</td>  
														<td>850</td>  
														<td><?php echo $nbrePersoIST*850 ?></td>  
													</tr>
													<tr>
														<td>Contraception</td>  
														<td>{{$nbrePersoContrap}}</td>  
														<td> --- </td>  
														<td> --- </td>  
													</tr>
                                                </tbody>
                                            </table>
                                        </div>
										<hr>
										
										<h4>Montant global à payer : <b style="color: #16c115;"> <?php echo $nbrePersoIST*850 ?> F CFA</b></h4>
										
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