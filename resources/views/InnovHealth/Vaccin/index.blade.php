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
        @include("Profile.innovVacciProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nouvel Enregistrement</h4>
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
                                                        <p>{{Session::pull('error')}} </p>
                                                    </div>
                                                </div>
                                            @endif

                                            <form class="form" action="{{route('save-suivi-beneficiaire')}}" method="POST">

                                                <input name="optionSuivi" value="Suivi vaccinal" hidden>

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
                                                                <input class="form-control" type="text" name="telephone" required placeholder="Téléphone du bénéficiaire sans indicatif" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
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
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Langue de préférence</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="langue"  required>
                                                                    <option selected disabled="true">Sélectionner la langue de préférence</option>
                                                                    @foreach($langues as $langue)
                                                                        <option value="{{$langue->id_langue}}">{{$langue->libelle_langue}}</option>
                                                                    @endforeach
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
                                                                <select class="form-control" name="haveconjoint" id="haveconjoint"  required>
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
                                                        <div class="form-group row" id="carnetVacci">
                                                            <label class="control-label col-sm-3">Numéro du carnet Vaccination</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="numCarnet"  id="numCarnet"
                                                                       placeholder="Numéro Carnet CPN" />
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

                                                <div class="row">
                                                    <div class="col-sm-6" id="dateVaccin" >
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Date prochaine vaccination</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="date" name="dateVaccin" min="{{date("Y-m-d")}}" id="dateVaccin" placeholder="Date d'accouchement de l'enfant" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Type vaccin</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" id="typeVaccin" name="typeVaccin" required>
                                                                    <option selected disabled="true">Sélectionner le vaccin</option>
                                                                    @foreach($VaccinNats as $VN)
                                                                        <option value="{{$VN->code_vacci_typ}}">{{$VN->lib_vacci_typ}} {{$VN->code_vacci_typ}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6" id="dateAccouchement" >
                                                        <div class="form-group row" >
                                                            <label class="control-label col-sm-3">Date Accouchement</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="date" name="dateAccouchement" max="{{date("Y-m-d")}}" id="dateaccouchementBebe" placeholder="Date d'accouchement de l'enfant" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-6" id="infoBebeOne">
                                                        <div class="form-group row"  >
                                                            <label class="control-label col-sm-3">Age du Bébé</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="hidden" name="ageBebe" id="ageBeb"   />
                                                                <input class="form-control" type="text" onfocus="$(this).blur()" id="ageBebe"
                                                                       placeholder="Age du nouveau né"  style="color: blue;font-size: 20px;height: 45px;" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" id="infoBebeTwo" >
                                                        <div class="form-group row" id="nomBebeBloc">
                                                            <label class="control-label col-sm-3">Nom du Bébé</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="nomBebe"  id="nomBebe"
                                                                       placeholder="Nom du nouveau né"   />
                                                            </div>
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


        $(document).ready(function(){
			$('#typePat').on('change',function(){
				var selVal = $("#typePat option:selected").val();

				choixPTME(selVal);
			});
        });


        // Requête Ajax pour les villes
        function choixPTME(vaccinId) {
            // `{{ url('list-Vaccin-PTME') }}/'+ vaccinId + ""
            $.get(`{{ url('list-Vaccin-PTME') }}/${vaccinId}`, function(data) {
                $('#vaccinTyp').html('');

                $.each(data, function(index, listVaccinPTME) {
                    // $('#vaccinTyp').append($('<tr><td><span class="check"><input type="checkbox"', {
                    //     value: listVaccinPTME.code_vacci_typ,
                    //     text : listVaccinPTME.lib_vacci_typ
                    // }));

                    $('#vaccinTyp').append(`<span class="check">
                            <input type="checkbox" name="" class="checked" value="${listVaccinPTME.code_vacci_typ}" /> ${listVaccinPTME.lib_vacci_typ}
                        </span><br>`
                    )
                });

                // if(vaccin_typ_id) {
                //     $('#vaccinTyp').val(vaccin_typ_id).prop('checked', true);
                // }
            });
        }



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

        var nbreSemaine = 0;
        function diff_in_week_vaccination(dateAccouchement) {
            var dateJour = new Date();
            var dateAccouchementObject = new Date(dateAccouchement);
            var diff = (dateJour.getTime() - dateAccouchementObject.getTime()) / 1000;
            diff /= (60 * 60 * 24 * 7);
            nbreSemaine = Math.abs(Math.round(diff));
            return nbreSemaine;
        }



        $("#dateaccouchementBebe").on("change", function () {

            diff_in_week_vaccination($(this).val());

            $("#ageBebe").val(nbreSemaine + " semaine(s)");
            $("#ageBeb").val(nbreSemaine);

        });

    </script>

@endsection
