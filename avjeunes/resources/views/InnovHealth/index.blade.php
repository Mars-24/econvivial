@extends("Template.otherTemplate")


@section("title")
    Enrégistrer un nouveau bénéficiaire
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Suivi de la grossesse</h4>
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

                                            <form class="form" action="{{route('save-suivi-beneficiaire')}}" method="POST">

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Nom</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="name" required placeholder="Nom du bénéficiaire" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Prénom</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="prenom" required placeholder="Prénom du bénéficiaire" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												
												<div class="row">
													
													<div class="col-sm-6"  id="dateNaiss" >
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Date Naissance</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="date" name="dateNaissance" max="{{date("Y-m-d")}}" id="dateNaissance" placeholder="Date Naissance" />
                                                            </div>
                                                        </div>
                                                    </div>
													
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Profession</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="name" required placeholder="Profession" />
                                                            </div>
                                                        </div>
                                                    </div>                                                
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Téléphone</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="telephone" required placeholder="Téléphone du bénéficiaire sans indicatif" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Quartier</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="quartier">
                                                                    <option selected disabled="true">Sélectionner un quartier</option>
                                                                    @foreach($quartiers as $quartier)
                                                                        <option value="{{$quartier->id}}">{{$quartier->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Langue de préférence</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="langue"  required>
                                                                    <option selected disabled="true">Sélectionner la langue de préférence</option>
                                                                    @foreach($langues as $langue)
                                                                        <option value="{{$langue->id_langue}}">{{$langue->libelle_langue}}</option>
                                                                    @endforeach
                                                                    <!--<option value="Français">Français</option>
                                                                    <option value="Ewe">Ewe</option>
                                                                    <option value="Kabyè">Kabyè</option>
                                                                    <option value="Moba">Moba</option>-->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Patient PTME</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="typePatient"  required>
                                                                    <option selected disabled="true">Sélectionner le type de patient</option>
                                                                    <option value="1">OUI</option>
                                                                    <option value="0">NON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Avez-vous un conjoint?</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="conjoint" id="haveconjoint"  required>
                                                                    <option selected disabled="true">Sélectionner votre choix</option>
                                                                    <option value="1">OUI</option>
                                                                    <option value="0">NON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="col-sm-6"  id="telConjoint" style="display: none;">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">N° Tel Conjoint</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text" name="telephoneConjoint" placeholder="Téléphone du conjoint" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>

                                                <div id="conjoint" style="display: none;">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Nom Conjoint</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="nomConjoint" placeholder="Nom du conjoint" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Prénom Conjoint</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="prenomConjoint" placeholder="Prénom du conjoint" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
												
												
												
												<div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row" id="CPN">
                                                            <label class="control-label col-sm-3">Numéro du carnet CPN</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="numCarnet"  id="numCarnet"
                                                                       placeholder="Numéro Carnet CPN" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6"  id="dateLastRegle" >
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Age de la grossesse</label>
                                                            <div class="col-sm-9">
                                                               <select class="form-control" name="conjoint" id="Agegrossesse"  required>
                                                                    <option selected disabled="true">Sélectionner Age</option>
                                                                     
																    @for($i =8; $i <= 37 ; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" id="natSuiviCPN" >
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Nature suivi</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="conjoint" id="natSuivi">
                                                                    <option selected disabled="true">Sélectionner Nature</option>
                                                                    <option value="1">PTME-N</option>
                                                                    <option value="0">PTME-O</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											
											

                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Option de suivi</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="optionSuivi" id="optionSuivi"  required>
                                                                    <!-- <option selected disabled="true">Sélectionner l'option de suivi</option>-->
                                                                    <option selected  value="Suivi de la grossesse">Suivi de la grossesse</option>
                                                                    <option value="Suivi vaccinal">Suivi vaccinal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6"  id="dateLastRegle"  style="display: none;">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Date dernière règle</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="date" name="dateRegle" max="{{date("Y-m-d")}}" id="dateRegle" placeholder="Date dernière règle" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" id="dateAccouchement" style="display: none;">
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Date Accouchement</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="date" name="dateAccouchement" max="{{date("Y-m-d")}}" id="dateaccouchementBebe" placeholder="Date d'accouchement de l'enfant" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-6" id="dureeGrossesseBloc"  style="display: none;">
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Durée grossesse</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="hidden" name="dureeGrossesse" id="dureeGrosse"  />
                                                                <input class="form-control" type="text"  onfocus="$(this).blur()" id="dureeGrossesse"
                                                                       placeholder="Durée de la grossesse"  style="color: blue;font-size: 20px;height: 45px;" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6" id="infoBebeOne" style="display: none;">
                                                        <div class="form-group row"  >
                                                            <label class="control-label col-sm-3">Age du Bébé</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="hidden" name="ageBebe" id="ageBeb"   />
                                                                <input class="form-control" type="text" onfocus="$(this).blur()" id="ageBebe"
                                                                       placeholder="Age du nouveau né"  style="color: blue;font-size: 20px;height: 45px;" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" id="infoBebeTwo" style="display: none;">
                                                        <div class="form-group row" id="nomBebeBloc">
                                                            <label class="control-label col-sm-3">Nom du Bébé</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="nomBebe"  id="nomBebe"
                                                                       placeholder="Nom du nouveau né"   />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>


                                                <div class="row" id="rowDateCpn" style="display: none;">

                                                    <div class="col-sm-10" style="margin-left: 8%;">
                                                        <div class="form-group row">
                                                            <h3 style="text-align: center;">Dates probables de CPN</h3>

                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                <th>Ieme CPN</th>
                                                                <th>Date probable CPN</th>
                                                                </thead>

                                                                <tbody id="dateCPN">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row" id="rowDateVaccination" style="display: none;">

                                                    <div class="col-sm-10" style="margin-left: 8%;">
                                                        <div class="form-group row">
                                                            <h3 style="text-align: center;">Dates probables de vaccination</h3>

                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                <th>Ieme semaine</th>
                                                                <th>Date probable Vaccination</th>
                                                                <th>Vaccin</th>
                                                                </thead>

                                                                <tbody id="datevaccination">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
											
											<!--CPN-->
											<h5 class="card-title">Suivi CPN</h4>
                                                <div class="row">	
												<div class="col-sm-6" id="typCPN" >
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Type de CPN</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="typeCPN" id="TypCPN">
                                                                    <option selected disabled="true">Sélectionner CPN</option>
                                                                    <option value="1">4 CPN</option>
                                                                    <option value="2">8 CPN</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
													
													<div class="col-sm-6"  id="dateNextCPN" >
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Date Prochaine CPN</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="date" name="dateNextCPN1"  id="dateNextCPN1" placeholder="Date Prochaine CPN" />
                                                            </div>
                                                        </div>
                                                    </div>
													
													<div class="col-sm-6" id="nbCPN0" >
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Nombre CPN déjà réalisé</label>
															
                                                            <div class="col-sm-9" >
                                                                <select class="form-control" ></select>
															
                                                            </div>
                                                        </div>
                                                    </div>
											
													<div class="col-sm-6" id="nbCPN4" style="display: none;">
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Nombre CPN déjà réalisé</label>
															
                                                            <div class="col-sm-9" >
                                                                <select class="form-control" name="nbCPN" id="nbCPN">
                                                                    <option selected disabled="true">Sélectionner Nombre CPN</option>
																	@if(isset($maxCPN)) $maxCPN @else $maxCPN= 2 @endif 
                                                                     @for($i =1; $i <=4 ; $i++)
                                                                    	<option value="{{$i}}">{{$i}}</option>
                                                                    @endfor                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
													
													<div class="col-sm-6" id="nbCPN8" style="display: none;">
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Nombre CPN déjà réalisé</label>
															
                                                            <div class="col-sm-9" >
                                                                <select class="form-control" name="nbCPN" id="nbCPN">
                                                                    <option selected disabled="true">Sélectionner Nombre CPN</option>
																	@if(isset($maxCPN)) $maxCPN @else $maxCPN= 2 @endif 
                                                                     @for($i =1; $i <=8 ; $i++)
                                                                    	<option value="{{$i}}">{{$i}}</option>
                                                                    @endfor                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>										
                                                </div>

												
                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6"  >
                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <button type="submit" id="saveButton" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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

    <script>
        var nbreSemaine = 0;
        $("#haveconjoint").on("change",function(){

            var valeur = $(this).val();

            if(valeur === "1"){
                $("#conjoint").show("slow");
                $("#telConjoint").show("slow");
            }else{
                $("#conjoint").hide("slow");
                $("#telConjoint").hide("slow");
            }
        });

        $("#dateRegle").on("change", function(){
          //  alert("DUréee grossesse ==> "+diff_in_week($(this).val())+" semaines");
            diff_in_week($(this).val());
            if(nbreSemaine > 41){
                $("#dureeGrossesse").css("color", "red");
                $("#saveButton").prop("disabled", true);
            }else{
                $("#dureeGrossesse").css("color", "blue");
                $("#saveButton").prop("disabled", false);
            }
            $("#dureeGrosse").val(nbreSemaine);
            $("#dureeGrossesse").val(nbreSemaine+" Semaines");
        });
		
//		//Choix du nombre de CPN		
		$(document).ready(function(){
			$('#typCPN').on('change',function(){
				var selVal = $("#typCPN option:selected").val();
				
				if(selVal === "1"){
					$("#nbCPN8").hide();
					$("#nbCPN0").hide();
					$("#nbCPN4").show();
					
				}else if(selVal === "2"){
					$("#nbCPN0").hide();
					$("#nbCPN4").hide();
					$("#nbCPN8").show();
				}
				else{
					$("#nbCPN4").hide();
					$("#nbCPN8").hide();
					$("#nbCPN0").show();
			}
			});
		});
		

        function diff_in_week(dateRegle){
            var dateJour = new Date();
            var dateRegleObject = new Date(dateRegle);
            var diff = (dateJour.getTime() - dateRegleObject.getTime()) / 1000;
            diff /= (60 * 60 * 24 * 7);
            nbreSemaine = Math.abs(Math.round(diff));
            showDateCpn(dateRegle);
            return nbreSemaine;
        }

        function showDateCpn(dateRegle){
           // $("#rowDateCpn").hide();
            var dateRegleObject = new Date(dateRegle);
            $("#dateCPN").find("tr").remove().end();
          //  alert("Nombre semaine ===> "+nbreSemaine);
            if(nbreSemaine <= 12){
                $("#dateCPN").append("<tr><td>CPN 1</td> <td> "+convertDate(dateRegleObject,7*12)+"</td></tr>")
            }
            if(  nbreSemaine <= 20){
                $("#dateCPN").append("<tr><td>CPN 2</td> <td> "+convertDate(dateRegleObject,7*20)+"</td></tr>")
            }

            if(  nbreSemaine <= 26){
                $("#dateCPN").append("<tr><td>CPN 3</td> <td> "+convertDate(dateRegleObject,7*26)+"</td></tr>")
            }

            if( nbreSemaine <= 30){
                $("#dateCPN").append("<tr><td>CPN 4</td> <td> "+convertDate(dateRegleObject,7*30)+"</td></tr>")
            }

            if( nbreSemaine <= 34){
                $("#dateCPN").append("<tr><td>CPN 5</td> <td> "+convertDate(dateRegleObject,7*34)+"</td></tr>")
            }

            if( nbreSemaine < 36){
                $("#dateCPN").append("<tr><td>CPN 6</td> <td> "+convertDate(dateRegleObject,7*36)+"</td></tr>")
            }

            if( nbreSemaine <= 38){
                $("#dateCPN").append("<tr><td>CPN 7</td> <td> "+convertDate(dateRegleObject,7*38)+"</td></tr>")
            }

            if( nbreSemaine <= 40){
                $("#dateCPN").append("<tr><td>CPN 8</td> <td> "+convertDate(dateRegleObject,7*40)+"</td></tr>")

                $("#dateCPN").append("<tr><td ><b style='font-size: 25px;'>Date probable accouchement</b></td> <td><b style='color: red;font-size: 25px;'>Semaine du "+convertDate(dateRegleObject,7*41)+"</b></td></tr>")

            }

            if(nbreSemaine <= 41){
                $("#rowDateCpn").show("slow");
            }else{
                alert("La date probable d'accouchement est dépassé. Veuillez renseigner des informations valides");
            }

        }

        function convertDate(dateRegle, semaineCPN){
            var newDate = new Date(dateRegle.getFullYear(),dateRegle.getMonth(), dateRegle.getDate() + semaineCPN);
            var month = newDate.getMonth()+1;
            var day = newDate.getDate();
            var output =  (day<10 ? '0' : '') + day +'/' +
                (month<10 ? '0' : '') + month + '/'+newDate.getFullYear()   ;
            return output;
        }


        $("#optionSuivi").change(function(){

            if($(this).val() === "Suivi de la grossesse"){
                $("#infoBebeOne").hide();
                $("#infoBebeTwo").hide();
                $("#dateAccouchement").hide();
                $("#rowDateVaccination").hide();

                $("#dureeGrossesseBloc").show();
                $("#dateLastRegle").show();

                $("#dateRegle").val("");
                $("#dureeGrossesse").val("");
               // $("#rowDateCpn").hide();

            }else if($(this).val() === "Suivi vaccinal"){

                $("#dureeGrossesseBloc").hide();
                $("#dateLastRegle").hide();
                $("#rowDateCpn").hide();

                $("#dateaccouchementBebe").val("");
                $("#nomBebe").val("");
                $("#ageBebe").val("");

                $("#dateAccouchement").show("slow");
                $("#infoBebeOne").show("slow");
                $("#infoBebeTwo").show("slow");
            }

            $("#dateaccouchementBebe").on("change",function(){

                diff_in_week_vaccination($(this).val());

                $("#ageBebe").val(nbreSemaine+" semaine(s)");
                $("#ageBeb").val(nbreSemaine);

            });

            function diff_in_week_vaccination(dateAccouchement){
                var dateJour = new Date();
                var dateAccouchementObject = new Date(dateAccouchement);
                var diff = (dateJour.getTime() - dateAccouchementObject.getTime()) / 1000;
                diff /= (60 * 60 * 24 * 7);
                nbreSemaine = Math.abs(Math.round(diff));
                showDateProbableVaccination(dateAccouchement);
                return nbreSemaine;
            }

            function showDateProbableVaccination(dateAccouchement){

                var dateAccouchementObject = new Date(dateAccouchement);

                $("#datevaccination").find("tr").remove().end();

                $("#datevaccination").append("<tr><td>Date accouchement</td> <td><b>"+$("#dateaccouchementBebe").val()+"</b></td> <td><b style='color:blue;'>Polio + BCG</b></td></tr>");

                $("#datevaccination").append("<tr><td>6ème semaine </td> <td><b>"+convertDate(dateAccouchementObject, 7*6)+"</b></td> <td><b style='color:blue;'>Penta 1 + Pneumo 1 + Rota 1 + Polio 1</b></td></tr>");

                $("#datevaccination").append("<tr><td>10ème semaine  </td> <td><b>"+convertDate(dateAccouchementObject, 7*10)+"</b></td> <td><b style='color:blue;'>Penta 2 + Pneumo 2 + Rota 2 + Polio 2</b></td></tr>");

                $("#datevaccination").append("<tr><td>14ème semaine </td> <td><b>"+convertDate(dateAccouchementObject, 7*14)+"</b></td> <td><b style='color:blue;'>Penta 3 + Pneumo 3 + Rota 3  + Polio 3</b></td></tr>");

                $("#datevaccination").append("<tr><td>9ème mois  </td> <td><b>"+convertDate(dateAccouchementObject, 7*41)+"</b></td> <td><b style='color:blue;'>RR & VAA</b></td></tr>");

                $("#rowDateVaccination").show("slow");
            }
        });

    </script>

@endsection