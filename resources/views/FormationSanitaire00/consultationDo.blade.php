@extends("Template.otherTemplate")


@section("title")
   Les consultations effectuées aux utilisateurs
@endsection


@section("body")

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
                                    <h4 class="card-title">Consultations effectuées  <b style="color: blue;"> {{\App\FormationSanitaire::where("id", $utilisateur->formation_sanitaire_id)->first()->libelle}}</b></h4>
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

                                            <table id="table" class="table table-bordered table-striped table-responsive"  cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Code User</th>
                                                    <th>Consultant</th>
                                                    <th>Objet Consulation</th>
                                                    <th>Motif de la consultation</th>
                                                    <th>Résultat de la consultation</th>
                                                    <th>Status</th>
                                                    <th>Attachez le résultat</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($consultations as $consultation)
                                                    <tr>
                                                        <td>{{date_format(date_create($consultation->created_at),"d M Y") }}</td>
                                                        <td>{{\App\User::where("id", $consultation->user_id)->first()->codeUser}}</td>
														<td><b>{{\App\User::where("id", $consultation->user_id)->first()->username}}</b></td>
                                                        <td><b>{{\App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle}}</b></td>
                                                        <td>{{$consultation->description}}</td>
                                                        <td><b> @if(!$consultation->result) <span style="color: red;"> Non défini</span> @else  <a class="btn btn-outline-success" href="#" target="_blank">Voir</a>  @endif</b></td>
                                                        <td>
                                                            <label class="badge badge-success badge-pill">Reçu</label>
                                                        </td>
                                                        <td>
                                                                <button class="btn btn-outline-success attach-button"
                                                                data-id="{{$consultation->id}}">Attachez le résultat</button>
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
                <footer class="footer">
                  @include("Footer.dashboardFooter");
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <div class="modal fade"  id="attachModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 50%;">

            <div class="modal-content" style="background-color: white;">
                <form class="form" action="{{route('send-result-to-user')}}" id="medocForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Envoyer le résultat de la consultation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 style="color: red;text-align: center;">Veuillez bien vérifier les informations du formulaire avant de l'envoyer. Il n'est plus possible de revenir en arrière après l'envoie.</h4>
                        
						<div class="row" id="">
								<div class="col-sm-12">
									<div class="form-group">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Nature du traitement <span style="color:red;font-size:15px;">*</span></label>
											<div class="col-sm-8">
												<div class="row">
												<div class="col-sm-5">
											<label class="col-sm-2 col-form-label"> <input id="noOrdonnance" type="checkbox" value="false"  name="noOrdonnance" /></label>
                                        <div class="col-sm-10">
                                            <label for="noOrdonnance" ><b style="color: red;margin-top: 10px;">Conseils pratiques</b></label>
                                        </div>
										</div>
										<div class="col-sm-3">
											<label class="col-sm-2 col-form-label"> <input id="consultationIST" type="checkbox" value="false"  name="consultationIST" /></label>
											<div class="col-sm-10">
												<label for="consultationIST" ><b style="color: red;margin-top: 10px;">Consulation IST</b></label>
											</div>
										</div>
										<div class="col-sm-4">
											<label class="col-sm-2 col-form-label"> <input id="contraception" type="checkbox" value="false"  name="contraception" /></label>
											<div class="col-sm-10">
												<label for="contraception" ><b style="color: red;margin-top: 10px;">Contraception</b></label>
											</div>
										</div>
                                    </div>
											</div>
										</div>
									</div>
								</div>
						</div>

						<div class="row" id="traitementISTRow" class="hidden">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Syndrome <span style="color:red;font-size:15px;">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="" name="syndrome">
                                                <option selected disabled="true">Sélectionner le syndrome</option>
                                            @for($i = 1 ; $i <= 4; $i++)
												<option value="@if($i == 1)
													   Ecoulement Urétral
													@elseif($i == 2)
															Ecoulement Vaginal Cervicite
													@elseif($i == 3)
															Ecoulement Vaginal Vaginite
													@else
													   SIP ou DAB
													@endif">
													@if($i == 1)
													   Ecoulement Urétral
													@elseif($i == 2)
															Ecoulement Vaginal : Cervicite
													@elseif($i == 3)
															Ecoulement Vaginal : Vaginite
													@else
													   SIP ou DAB
													@endif
												</option>
												@endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="row" id="contraceptionRow" class="hidden">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Syndrome <span style="color:red;font-size:15px;">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="" name="syndrome">
                                                <option selected disabled="true">Sélectionner le syndrome</option>
                                            @for($i = 1 ; $i <= 5; $i++)
												<option value="@if($i == 1)
													   Mycrogynon
													@elseif($i == 2)
															Sayana Press
													@elseif($i == 3)
															Jadelle
													@elseif($i == 4)
													   DIU
													@else
														Norplan
													@endif">
													@if($i == 1)
													    Mycrogynon
													@elseif($i == 2)
															Sayana Press
													@elseif($i == 3)
															Jadelle
													@elseif($i == 4)
													   DIU
													@else
														Norplan
													@endif
												</option>
												@endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="row" id="traitement" class="hidden">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Ordonnance <span style="color:red;font-size:15px;">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="nbreMedoc">
                                                <option selected disabled="true">Sélectionner le nombre de médicament</option>
                                            @for($i = 2 ; $i <= 3; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						<div class="row" id="traitementContra" class="hidden">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Ordonnance <span style="color:red;font-size:15px;">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="" name="medicament">
                                                <option selected disabled="true">Sélectionner le nombre d'année</option>
                                            @for($i = 2 ; $i <= 6; $i++)
                                                <option value="{{$i}}">{{$i}} ans</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                        <div class="row" id="blocMedoc" class="hidden">

                        </div>
						
						<div class="row" id="blocAnnee" class="hidden">

                        </div>
						
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="id" name="id" />
                        <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}" />
                        <button type="button" class="btn btn-success submit-button">Envoyer</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade"  id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 50%;">

            <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmer l'envoie du résultat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 style="text-align: center;	color: #1C2331;"><b>Voulez-vous vraiment envoyer le résultat à l'utilisateur ? Aucune annulation ou modification n'est possible après envoie.</b></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success send-button">OUI</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">NON</button>
                    </div>
            </div>
        </div>
    </div>
	<?php
		
	?>
    <script>
        $(".attach-button").on("click", function () {
            $("#id").val($(this).data("id"));
            $("#attachModal").modal("show");
        })

        /**
         * Aucune ordonnance à attacher
         */

        $("#noOrdonnance").on("change", function () {
           var x = document.getElementById("noOrdonnance").checked;
           if(x === true){
               $("#traitementISTRow").hide("slow");
               $("#contraceptionRow").hide("slow");
               $("#traitement").hide("slow");
               $("#traitementContra").hide("slow");
               $("#ordonnaceRow").hide("slow");
               $("#blocMedoc").hide("slow");
               $("#blocAnnee").hide("slow");
           }else{
               $("#traitementISTRow").show("slow");
               $("#contraceptionRow").show("slow");
               $("#traitement").show("slow");
               $("#traitementContra").show("slow");
               $("#ordonnaceRow").show("slow");
               $("#blocMedoc").show("slow");
               $("#blocAnnee").show("slow");
               $("#noOrdonnance").val(false);
           }
        });
		
		/**
         * consultation IST
         */
		$("#consultationIST").on("change", function () {
           var x = document.getElementById("consultationIST").checked;
           if(x === true){
               $("#traitementISTRow").show("slow");
               $("#contraceptionRow").hide("slow");
               $("#traitement").show("slow");
               $("#traitementContra").hide("slow");
               $("#ordonnaceRow").show("slow");
               $("#blocMedoc").show("slow");
               $("#blocAnnee").hide("slow");
               $("#consultationIST").val(true);
           }else{
			   $("#traitementISTRow").show("slow");
               $("#contraceptionRow").show("slow");
               $("#traitement").show("slow");
               $("#traitementContra").show("slow");
               $("#ordonnaceRow").show("slow");
               $("#blocMedoc").show("slow");
               $("#blocAnnee").show("slow");
               $("#contraception").val(false);
           }
        });
		
		/**
         * contraception IST
         */
		$("#contraception").on("change", function () {
           var x = document.getElementById("contraception").checked;
           if(x === true){
               $("#traitementISTRow").hide("slow");
               $("#contraceptionRow").show("slow");
               $("#traitement").hide("slow");
               $("#traitementContra").show("slow");
               $("#ordonnaceRow").show("slow");
               $("#blocMedoc").hide("slow");
               $("#blocAnnee").show("slow");
               $("#contraception").val(true);
           }else{
			   $("#traitementISTRow").show("slow");
               $("#contraceptionRow").show("slow");
               $("#traitement").show("slow");
               $("#traitementContra").show("slow");
               $("#ordonnaceRow").show("slow");
               $("#blocMedoc").show("slow");
               $("#blocAnnee").show("slow");
               $("#contraception").val(false);
           }
        });
		
		
		
		
		

        $(".submit-button").on("click", function () {
            $("#confirmModal").modal("show");
        });

        $(".send-button").on("click", function () {
            $("#medocForm").submit();
        });
		
		$("#nbreMedoc").on("click", function () {

            $nbre = $(this).val();
            $("#blocMedoc").empty();
            for(var i = 1; i <= $nbre ; i++){
                var bloc = "  <div class='col-sm-12'>\n" +
                    "                                <div class='form-group'>\n" +
                    "                                    <div class='form-group row'>\n" +
                    "                                        <label class='col-sm-4 col-form-label'>Molécule "+i+" <span style='color:red;font-size:15px;'>*</span></label>\n" +
                    "                                        <div class='col-sm-8'>\n" +
                    "                                         <select class='form-control' id='nbreMedoc' name='medicament[]'>  " +
					"											<option selected disabled='true'>Nom du médicament</option> " +
					"											@foreach($produits as $produit) " +
					"													<option value='{{$produit->id}}'>{{$produit->molecules  }}   =>  ({{    $produit->nombre_kit}} Kits)</option> " +
					"													@endforeach " +
					"										 </select> " +
					"										</div>\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                            </div>";
                $("#blocMedoc").append(bloc);
            }
        });
		
		$("#nbreAnnee").on("click", function () {

            $nbre = $(this).val();
            $("#blocAnnee").empty();
            for(var i = 1; i <= $nbre ; i++){
                var bloc = "  <div class='col-sm-12'>\n" +
                    "                                <div class='form-group'>\n" +
                    "                                    <div class='form-group row'>\n" +
                    "                                        <label class='col-sm-4 col-form-label'>Nombre d'année <span style='color:red;font-size:15px;'>*</span></label>\n" +
                    "                                        <div class='col-sm-8'>\n" +
                    "                                         <select class='form-control' id='nbreAnnee' name='medicament[]'>  " +
					"											<option selected disabled='true'>Choisir le nombre d'années</option> " +
					"											@for($i = 2 ; $i <= 3; $i++) " +
					"												<option value='{{$i}}'>{{$i}}</option> " +
					"											@endfor " +
					"										 </select> " +
					"										</div>\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                            </div>";
                $("#blocAnnee").append(bloc);
            }
        });

        
    </script>
@endsection