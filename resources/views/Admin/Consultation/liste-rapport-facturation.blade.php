@extends('Template.otherTemplate')

@section('title', 'Historique des facturations')

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
            <div class="main-panel" >
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Historique d'envoie des rapports de facturations</h4>
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

                                            <h4>Liste des rapports envoyés</h4>

                                        </div>

                                        <button style="margin-left: 20px;margin-bottom: 20px;margin-top: 30px;" class="btn btn-primary" onclick="printContent('dataTable')">Imprimer</button>

                                        <div  class="col-sm-12" id="dataTable"  style="margin: 10px;" >

                                                <p  class="text-center">
                                                <h3 style="text-align: center;"><u><b >Fiche périodique des rapports envoyés </b></u></h3>
                                                </p>

											<table class="table table-bordered table-responsive" cellspacing="0">
                                                <thead>
													<tr rowspan="2">
														<th rowspan="2"  style="text-align:center;">Rapport du</th>
														<th rowspan="2"  style="text-align:center;">Rapport au</th>
														<th rowspan="2"  style="text-align:center;">N° Rapport</th>
														<th rowspan="2"  style="text-align:center;">Formation sanitaire</th>
														<th rowspan="2"  style="text-align:center;">Détail facture</th>
														<th rowspan="2"  style="text-align:center;">Etat facture</th>
													</tr>
                                                </thead>
                                                <tbody>
												@foreach($rapports as $rapport)
													<tr class="item{{$rapport->id}}">
														<td>{{date_format(date_create($rapport->debut),"d/m/Y")}}</td>
														<td>{{date_format(date_create($rapport->fin),"d/m/Y")}}</td>
														<td>{{$rapport->code}}</td>
														<td>
														@foreach($users as $user)
																@if($rapport->user_id == $user->id)
																	@foreach($formations as $formation)
																		@if($formation->id == $user->formation_sanitaire_id)
																			{{$formation->libelle}}
																		@endif
																	@endforeach
																@endif
															@endforeach
														</td>
														<td>
															<form action="{{route('detail-rapport-facturations')}}" method="GET">
																<input type="hidden" value="{{Session::token()}}" name="token" />
																<input type="hidden" value="{{$rapport->id}}" name="id" />
																<button class="btn btn-outline-primary">Détail</button>
															</form>
														</td>
														<td>
														@if($rapport->etat==0)
														<form action="{{route('payerFacturationConsultation')}}" method="POST">
															<input type="hidden" value="{{Session::token()}}" name="token" />
															<input type="hidden" value="{{$rapport->id}}" name="id" />
															<button class="btn btn-outline-danger">En attente</button>
														</form>
														@else
															<label class="badge badge-success badge-pill">Déjà payer</label>
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