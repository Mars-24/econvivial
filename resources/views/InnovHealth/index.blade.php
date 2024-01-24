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
                                                        <p>{{Session::pull('error')}}</p>
                                                    </div>
                                                </div>
                                            @endif

                                            <form id="addBeneficiary" class="form"
                                                  action="{{route('save-suivi-beneficiaire')}}" method="POST">

                                                <!--Nom et prénoms-->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Nom</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="name"
                                                                       required placeholder="Nom du bénéficiaire"/>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Prénoms</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="prenom"
                                                                       required placeholder="Prénom du bénéficiaire"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Date Naissance et Téléphone -->
                                                <div class="row">
                                                    <div class="col-sm-6" id="dateNaiss">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Date Naissance</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="date"
                                                                       name="dateNaissance" max="{{date("Y-m-d")}}"
                                                                       id="dateNaissance" placeholder="Date Naissance"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Téléphone</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="telephone"
                                                                       required
                                                                       placeholder="Téléphone du bénéficiaire sans indicatif"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Quartier et langue de préférence -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Quartier</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="quartier" required>
                                                                    <option selected disabled="true">Sélectionner un
                                                                        quartier
                                                                    </option>
                                                                    @foreach($quartiers as $quartier)
                                                                        <option
                                                                            value="{{$quartier->id}}">{{$quartier->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Langue de
                                                                préférence</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="langue" required>
                                                                    <option selected disabled="true">Sélectionner la
                                                                        langue de préférence
                                                                    </option>
                                                                    @foreach($langues as $langue)
                                                                        <option
                                                                            value="{{$langue->libelle_langue}}">{{$langue->libelle_langue}}</option>
                                                                @endforeach
                                                                <!--<option value="Français">Français</option>
                                                                    <option value="Ewe">Ewe</option>
                                                                    <option value="Kabyè">Kabyè</option>
                                                                    <option value="Moba">Moba</option>-->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Information sur le conjoint début -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Avez-vous un
                                                                conjoint?</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="haveconjoint"
                                                                        id="haveconjoint" required>
                                                                    <option selected disabled="true">Sélectionner votre
                                                                        choix
                                                                    </option>
                                                                    <option value="1">OUI</option>
                                                                    <option value="0">NON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" id="telConjoint" style="display: none;">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">N° Tel
                                                                Conjoint</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text"
                                                                       name="telephoneConjoint"
                                                                       placeholder="Téléphone du conjoint"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="conjoint" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Nom
                                                                    Conjoint</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"
                                                                           name="nomConjoint"
                                                                           placeholder="Nom du conjoint"/>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Prénom
                                                                    Conjoint</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"
                                                                           name="prenomConjoint"
                                                                           placeholder="Prénom du conjoint"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Information sur le conjoint fin -->

                                                <!-- Option suivit -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Option de
                                                                suivi</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="optionSuivi"
                                                                        id="optionSuivi">
                                                                    <option selected disabled="true">Sélectionner
                                                                        l'option de suivi
                                                                    </option>
                                                                    <option value="Suivi de la grossesse">Suivi de la
                                                                        grossesse
                                                                    </option>
                                                                    <option value="Suivi vaccinal">Suivi vaccinal
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Patient
                                                                PTME</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" required
                                                                        name="typePatient">
                                                                    <option selected disabled="true">Sélectionner le
                                                                        type de patient
                                                                    </option>
                                                                    <option value="1">OUI</option>
                                                                    <option value="0">NON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- CPN field begin -->
                                                <div id="cpnForm">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Numéro du carnet
                                                                    CPN</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" required type="text"
                                                                           name="numCarnet" id="numCarnet"
                                                                           placeholder="Numéro Carnet CPN"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Date dernière
                                                                    règle</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" required type="date"
                                                                           name="dateRegle" max="{{date("Y-m-d")}}"
                                                                           id="dateRegle"
                                                                           placeholder="Date dernière règle"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Durée
                                                                    grossesse</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" required
                                                                           name="dureeGrossesse" id="dureeGrosse"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Date Prochaine
                                                                    CPN</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" required type="date"
                                                                           name="dateNextCPN1" id="dateNextCPN1"
                                                                           placeholder="Date Prochaine CPN"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                    </div>
                                                </div>
                                                <!-- CPN field end -->

                                                <!-- Vaccination form begin -->
                                                <div id="vaccinationForm">
                                                    <div class="row">
                                                        <div class="col-sm-6" id="dateAccouchement">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Date
                                                                    Accouchement</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="date"
                                                                           name="dateAccouchement"
                                                                           max="{{date("Y-m-d")}}"
                                                                           id="dateaccouchementBebe"
                                                                           placeholder="Date d'accouchement de l'enfant"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6" id="infoBebeTwo">
                                                            <div class="form-group row" id="nomBebeBloc">
                                                                <label class="control-label col-sm-3">Nom du
                                                                    Bébé</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"
                                                                           name="nomBebe" id="nomBebe"
                                                                           placeholder="Nom du nouveau né"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Age du Bébé</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="hidden" name="ageBebe"
                                                                       id="ageBeb"/>
                                                                <input class="form-control" type="text"
                                                                       onfocus="$(this).blur()" id="ageBebe"
                                                                       placeholder="Age du nouveau né"
                                                                       style="color: blue;font-size: 20px;height: 45px;"/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- Vaccination form end -->

                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <input type="hidden" name="_token"
                                                                   value="{{Session::token()}}"/>
                                                            <button id="saveButton" type="button"
                                                                    style="width: 250px;"
                                                                    class="btn btn-outline-success btn-rounded"
                                                                    onclick="makeValidation();">Enregistrer
                                                            </button>
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
        var suiviGrossesse = false;
        var suiviVaccinal = false;
        $("#haveconjoint").on("change", function () {

            var valeur = $(this).val();

            if (valeur === "1") {
                $("#conjoint").show("slow");
                $("#telConjoint").show("slow");
            } else {
                $("#conjoint").hide("slow");
                $("#telConjoint").hide("slow");
            }
        });

        $("#dateRegle").on("change", function () {
            //  alert("DUréee grossesse ==> "+diff_in_week($(this).val())+" semaines");
            diff_in_week($(this).val());
            if (nbreSemaine > 41) {
                $("#dureeGrossesse").css("color", "red");
                $("#saveButton").prop("disabled", true);
            } else {
                $("#dureeGrossesse").css("color", "blue");
                $("#saveButton").prop("disabled", false);
            }
            $("#dureeGrosse").val(nbreSemaine);
            $("#dureeGrossesse").val(nbreSemaine + " Semaines");
        });

        $("#cpnForm").hide();
        $("#vaccinationForm").hide();
        $("#nbCPN4").hide();
        $("#nbCPN8").hide();

        //		//Choix du nombre de CPN
        /*$('#typeCPN').on('change', function () {
            var selVal = $(this).val();

            if (selVal === "1") {
                $("#nbCPN8").hide();
                $("#nbCPN0").hide();
                $("#nbCPN4").show();

            } else if (selVal === "2") {
                $("#nbCPN0").hide();
                $("#nbCPN4").hide();
                $("#nbCPN8").show();
            } else {
                $("#nbCPN4").hide();
                $("#nbCPN8").hide();
                $("#nbCPN0").show();
            }
        });*/


        function diff_in_week(dateRegle) {
            var dateJour = new Date();
            var dateRegleObject = new Date(dateRegle);
            var diff = (dateJour.getTime() - dateRegleObject.getTime()) / 1000;
            diff /= (60 * 60 * 24 * 7);
            nbreSemaine = Math.abs(Math.round(diff));
            showDateCpn(dateRegle);
            return nbreSemaine;
        }

        function showDateCpn(dateRegle) {
            // $("#rowDateCpn").hide();
            var dateRegleObject = new Date(dateRegle);
            $("#dateCPN").find("tr").remove().end();
            //  alert("Nombre semaine ===> "+nbreSemaine);
            if (nbreSemaine <= 12) {
                $("#dateCPN").append("<tr><td>CPN 1</td> <td> " + convertDate(dateRegleObject, 7 * 12) + "</td></tr>")
            }
            if (nbreSemaine <= 20) {
                $("#dateCPN").append("<tr><td>CPN 2</td> <td> " + convertDate(dateRegleObject, 7 * 20) + "</td></tr>")
            }

            if (nbreSemaine <= 26) {
                $("#dateCPN").append("<tr><td>CPN 3</td> <td> " + convertDate(dateRegleObject, 7 * 26) + "</td></tr>")
            }

            if (nbreSemaine <= 30) {
                $("#dateCPN").append("<tr><td>CPN 4</td> <td> " + convertDate(dateRegleObject, 7 * 30) + "</td></tr>")
            }

            if (nbreSemaine <= 34) {
                $("#dateCPN").append("<tr><td>CPN 5</td> <td> " + convertDate(dateRegleObject, 7 * 34) + "</td></tr>")
            }

            if (nbreSemaine < 36) {
                $("#dateCPN").append("<tr><td>CPN 6</td> <td> " + convertDate(dateRegleObject, 7 * 36) + "</td></tr>")
            }

            if (nbreSemaine <= 38) {
                $("#dateCPN").append("<tr><td>CPN 7</td> <td> " + convertDate(dateRegleObject, 7 * 38) + "</td></tr>")
            }

            if (nbreSemaine <= 40) {
                $("#dateCPN").append("<tr><td>CPN 8</td> <td> " + convertDate(dateRegleObject, 7 * 40) + "</td></tr>")

                $("#dateCPN").append("<tr><td ><b style='font-size: 25px;'>Date probable accouchement</b></td> <td><b style='color: red;font-size: 25px;'>Semaine du " + convertDate(dateRegleObject, 7 * 41) + "</b></td></tr>")

            }

            if (nbreSemaine <= 41) {
                $("#rowDateCpn").show("slow");
            } else {
                alert("La date probable d'accouchement est dépassé. Veuillez renseigner des informations valides");
            }

        }

        function convertDate(dateRegle, semaineCPN) {
            var newDate = new Date(dateRegle.getFullYear(), dateRegle.getMonth(), dateRegle.getDate() + semaineCPN);
            var month = newDate.getMonth() + 1;
            var day = newDate.getDate();
            var output = (day < 10 ? '0' : '') + day + '/' +
                (month < 10 ? '0' : '') + month + '/' + newDate.getFullYear();
            return output;
        }


        $("#optionSuivi").change(function () {

            if ($(this).val() === "Suivi de la grossesse") {
                console.log("toto");
                $("#cpnForm").show("slow");
                $("#vaccinationForm").hide();
                suiviGrossesse = true;
                suiviVaccinal = false;
            } else if ($(this).val() === "Suivi vaccinal") {
                $("#vaccinationForm").show("slow");
                $("#cpnForm").hide();
                suiviVaccinal = true;
                suiviGrossesse = false;
            }

            $("#dateaccouchementBebe").on("change", function () {

                diff_in_week_vaccination($(this).val());

                $("#ageBebe").val(nbreSemaine + " semaine(s)");
                $("#ageBeb").val(nbreSemaine);

            });

            function diff_in_week_vaccination(dateAccouchement) {
                var dateJour = new Date();
                var dateAccouchementObject = new Date(dateAccouchement);
                var diff = (dateJour.getTime() - dateAccouchementObject.getTime()) / 1000;
                diff /= (60 * 60 * 24 * 7);
                nbreSemaine = Math.abs(Math.round(diff));
                showDateProbableVaccination(dateAccouchement);
                return nbreSemaine;
            }

            function showDateProbableVaccination(dateAccouchement) {

                var dateAccouchementObject = new Date(dateAccouchement);

                $("#datevaccination").find("tr").remove().end();

                $("#datevaccination").append("<tr><td>Date accouchement</td> <td><b>" + $("#dateaccouchementBebe").val() + "</b></td> <td><b style='color:blue;'>Polio + BCG</b></td></tr>");

                $("#datevaccination").append("<tr><td>6ème semaine </td> <td><b>" + convertDate(dateAccouchementObject, 7 * 6) + "</b></td> <td><b style='color:blue;'>Penta 1 + Pneumo 1 + Rota 1 + Polio 1</b></td></tr>");

                $("#datevaccination").append("<tr><td>10ème semaine  </td> <td><b>" + convertDate(dateAccouchementObject, 7 * 10) + "</b></td> <td><b style='color:blue;'>Penta 2 + Pneumo 2 + Rota 2 + Polio 2</b></td></tr>");

                $("#datevaccination").append("<tr><td>14ème semaine </td> <td><b>" + convertDate(dateAccouchementObject, 7 * 14) + "</b></td> <td><b style='color:blue;'>Penta 3 + Pneumo 3 + Rota 3  + Polio 3</b></td></tr>");

                $("#datevaccination").append("<tr><td>9ème mois  </td> <td><b>" + convertDate(dateAccouchementObject, 7 * 41) + "</b></td> <td><b style='color:blue;'>RR & VAA</b></td></tr>");

                $("#rowDateVaccination").show("slow");
            }
        });

        function makeValidation() {
            if (!suiviGrossesse && !suiviVaccinal) {
                swal({
                    title: 'Erreur',
                    text: 'Pas de type de suivis choisi',
                    timer: 2000,
                    icon: 'warning',
                    button: false
                })
            }
            if (suiviVaccinal) {
                document.getElementById("addBeneficiary").submit();
            }
            if (suiviGrossesse) {
                document.getElementById("addBeneficiary").submit();
            }
        }

    </script>

@endsection
