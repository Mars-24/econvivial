@extends('Template.otherTemplate')

@section('title', 'Détail du rapport')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.4/css/autoFill.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.1/css/keyTable.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .dataTables_length select {
            padding 0px 20px !important;
        }
    </style>
@endsection
@section('body')
    <div class="container-scroller">
        @include('HeaderNav.adminNav')
        
        <div class="container-fluid page-body-wrapper">
            @include('Profile.adminSideProfil')
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
					                
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">DETAIL RAPPORT MENSUEL D’ACTIVITES / CODE RAPPORT : <b style="color: blue;"> {{\App\RapportConsultation::where("id", $rapportUser->id)->first()->code}}</b></h4>
                     
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
													type="button" id="exportExcel" onclick="exportTableToExcel('dataTable', 'DetailRapportConsultation')">Exporter en excel</button>
                                            </form> <br/>


                                        @endif

                                        <div  class="col-sm-12" id="dataTable"  style="margin: 10px;" >

										<h4 class="card-title">NOM DE LA FORMATION SANITAIRE : <b style="color: blue;"> @foreach($users as $user)
																@if($rapportUser->user_id == $user->id)
																	@foreach($formations as $formation)
																		@if($formation->id == $user->formation_sanitaire_id)
																			{{$formation->libelle}}
																		@endif
																	@endforeach
																@endif
															@endforeach</b></h4>
										
                                            @if($debut != null && $fin != null)
                                                <p  class="text-center">
                                                <h3 style="text-align: center;"><u><b >Fiche périodique de rapport couvrant la période du {{date_format(date_create($debut),"d/m/Y")}} au {{date_format(date_create($fin),"d/m/Y")}}</b></u></h3>
                                                </p>
                                            @endif

                                            <table class="table table-bordered table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date demande</th>
                                                    <th>Code User</th>
                                                    <th>Consultant</th>
                                                    <th>Objet Consulation</th>
                                                    <th>Motif de la consultation</th>
                                                    <th>Nature du traitement</th>
                                                    <th>Syndrome</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($consultations as $consultation)
                                                    <tr>
                                                        <td>{{date_format(date_create($consultation->date_reponse),"d M Y") }}</td>
                                                        <td>{{\App\User::where("id", $consultation->user_id)->first()->codeUser}}</td>
                                                        <td><b>{{\App\User::where("id", $consultation->user_id)->first()->username}}</b></td>
                                                        <td><b>{{\App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle}}</b></td>
                                                        <td>{{$consultation->description}}</td>
                                                        <td><b> {{\App\ResultatConsultation::where("consultation_id", $consultation->id)->first()->natureTraitement}}</b></td>
														<td><b> {{\App\ResultatConsultation::where("consultation_id", $consultation->id)->first()->syndrome}}</b></td>
														
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