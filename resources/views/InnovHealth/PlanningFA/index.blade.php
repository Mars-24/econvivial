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
        @include("Profile.innovPlanningFA")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Suivi Planning familial</h4>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group row">
                                                <label class="control-label">CPN :
                                                @if($formationSanitaire != null)
                                                    {{$formationSanitaire->libelle}}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-8"></div>
                                    </div>
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

                                                <input name="optionSuivi" value="Suivi PFA" hidden>
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

                                                <!-- Téléphone et Quartier -->
                                                <div class="row">
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
                                                </div>

                                                <!-- Langue de préférence et Type de planning -->
                                                <div class="row">
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
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Type de
                                                                planning</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="methode" required>
                                                                    <option selected disabled="true">Sélectionner une
                                                                        méthode
                                                                    </option>
                                                                    @foreach($plannings as $planning)
                                                                        <option
                                                                            value="{{$planning->id}}">{{$planning->titre}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Date cotraception et Durée contraception -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Date
                                                                    contraception</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" required type="date"
                                                                           name="datePF" max="{{date("Y-m-d")}}"
                                                                           id="dateRegle"
                                                                           placeholder="Date dernière règle"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Durée
                                                                    contraception</label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control" name="dureePF"
                                                                            required>
                                                                        <option selected disabled="true">Sélectionner un
                                                                            quartier
                                                                        </option>
                                                                        <option>3 mois</option>
                                                                        <option>6 mois</option>
                                                                        <option>2 ans</option>
                                                                        <option>5 ans</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <input type="hidden" name="_token"
                                                                   value="{{Session::token()}}"/>
                                                            <button id="saveButton" type="submit"
                                                                    style="width: 250px;"
                                                                    class="btn btn-outline-success btn-rounded">
                                                                Enregistrer
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


        function diff_in_week(dateRegle) {
            var dateJour = new Date();
            var dateRegleObject = new Date(dateRegle);
            var diff = (dateJour.getTime() - dateRegleObject.getTime()) / 1000;
            diff /= (60 * 60 * 24 * 7);
            nbreSemaine = Math.abs(Math.round(diff));
            return nbreSemaine;
        }


        function convertDate(dateRegle, semaineCPN) {
            var newDate = new Date(dateRegle.getFullYear(), dateRegle.getMonth(), dateRegle.getDate() + semaineCPN);
            var month = newDate.getMonth() + 1;
            var day = newDate.getDate();
            var output = (day < 10 ? '0' : '') + day + '/' +
                (month < 10 ? '0' : '') + month + '/' + newDate.getFullYear();
            return output;
        }
    </script>

@endsection
