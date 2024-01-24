@extends("Template.otherTemplate")


@section("title")
    Détail rapport facturation
@endsection



@section("body")

    <style>
        .special {
            border-collapse: collapse;
        }

        .special tr:first-child td {
            border-top: 0;
        }
        .special tr td:first-child {
            border-left: 0;
            height: 100%;
        }
        .special tr:last-child td {
            border-bottom: 0;
        }
        .special tr td:last-child {
            border-right: 0;
            height: 100%;
        }
    </style>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navFormationSanitaire")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include("Profile.formationSideProfil")

            <div class="main-panel">
                <div class="content-wrapper">
					                
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">DETAIL RAPPORT MENSUEL DES CONSULTATIONS / CODE RAPPORT : <b style="color: blue;"> {{\App\RapportConsultation::where("id", $rapportUser->id)->first()->code}}</b></h4>
                     
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
											
											<div class="col-sm-12"> </div>

                                            @if($debut != null && $fin != null)
												
                                            <button style="margin-left: 20px;margin-bottom: 20px;" class="btn btn-primary" onclick="printContent('dataTable')">Imprimer</button>

                                            <form action="" method="POST">
                                                <input type="hidden" value="{{$debut}}" name="debut" />
                                                <input type="hidden" value="{{$fin}}" name="fin" />
                                                <input type="hidden" value="{{Session::token()}}" name="_token" />
                                                <button style="margin-left: 10px;margin-bottom: 20px;" class="btn btn-success"
													type="button" id="exportExcel" onclick="exportTableToExcel('dataTable', 'DetailRapportFacturation')">Exporter en excel</button>
                                            </form> <br/>


                                        @endif

                                        <div  class="col-sm-12" id="dataTable"  style="margin: 10px;" >

										<h4 class="card-title">NOM DE LA FORMATION SANITAIRE : <b style="color: blue;"> {{\App\FormationSanitaire::where("id", $utilisateur->formation_sanitaire_id)->first()->libelle}}</b></h4>
										
                                            @if($debut != null && $fin != null)
                                                <p  class="text-center">
                                                <h3 style="text-align: center;"><u><b >Fiche périodique de rapport couvrant la période du <?php echo date('d-m-Y', strtotime($debut))?> au <?php echo date('d-m-Y', strtotime($fin))?></b></u></h3>
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
														<td>Consultation IST (Ecoulement Urétral)</td>  
														<td>{{$nbrePersoIST1}}</td>  
														<td>850</td>  
														<td><?php echo $nbrePersoIST1*850 ?></td>  
													</tr>
													<tr>
														<td>Consultation IST (Ecoulement vaginal : Cervicite)</td>  
														<td>{{$nbrePersoIST2}}</td>  
														<td>850</td>  
														<td><?php echo $nbrePersoIST2*850 ?></td>  
													</tr>
													<tr>
														<td>Consultation IST (Ecoulement vaginal : Vaginite)</td>  
														<td>{{$nbrePersoIST3}}</td>  
														<td>850</td>  
														<td><?php echo $nbrePersoIST3*850 ?></td>  
													</tr>
													<tr>
														<td>Consultation IST (SIP ou DAB : 1<sup>er</sup> choix)</td>  
														<td>{{$nbrePersoISTCH1}}</td>  
														<td>1500</td>  
														<td><?php echo $nbrePersoISTCH1*1500 ?></td>  
													</tr>
													<tr>
														<td>Consultation IST  (SIP ou DAB : 2<sup>ème</sup> choix)</td>  
														<td>{{$nbrePersoISTCH2}}</td>  
														<td>1750</td>  
														<td><?php echo $nbrePersoISTCH2*1750 ?></td>  
													</tr>
													<tr>
														<td>Contraception</td>  
														<td>{{$nbrePersoContrap}}</td>  
														<td> --- </td>  
														<td> --- </td>  
													</tr>
                                                </tbody>
                                            </table>
											<hr>
										
										<h4>Montant global à payer : <b style="color: #16c115;"> 
										<?php echo $nbrePersoIST1*850 + $nbrePersoIST2*850 + $nbrePersoIST3*850 + $nbrePersoISTCH1*1500 + $nbrePersoISTCH2*1750 ?> F CFA</b></h4>
										
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    @include("Footer.dashboardFooter")
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

@endsection