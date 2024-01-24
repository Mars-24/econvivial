@extends("Template.otherTemplate")


@section("title")
    Détail rapport consultation
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

										<h4 class="card-title">NOM DE LA FORMATION SANITAIRE : <b style="color: blue;"> {{\App\FormationSanitaire::where("id", $utilisateur->formation_sanitaire_id)->first()->libelle}}</b></h4>
										
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
														<td><b>@foreach($syndromes as $syndrome) 		
																	@if($consultation->syndrome==$syndrome->id)
																		{{$syndrome->libelle}} 
																	@endif
																@endforeach</b></td>
														
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