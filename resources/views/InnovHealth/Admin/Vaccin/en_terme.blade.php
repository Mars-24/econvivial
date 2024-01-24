@extends("Template.otherTemplate")


@section("title")
    List des bénéficiaires
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovAdminProfile")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Suivi de vaccination en cours</h4>

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

                                            <table id="table"
                                                   class="table table-bordered table-condensed table-striped table-responsive"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Code</th>
                                                    <th>Numéro Carnet</th>
                                                    <th>Téléphone</th>
                                                    <th>Date accouchement</th>
                                                    <th>Âge bébé</th>
                                                    <th>Nom bébé</th>
                                                    <th>Vaccin</th>
                                                    <th>Date prochaine vaccin</th>
                                                    <th>Statut</th>
                                                    <!--<th>Action</th>-->
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($grossesses as $grossesse)
                                                    <tr class="item{{$grossesse->id}}">
                                                        <td id="num"></td>
                                                        <td><b>{{$grossesse->code}}</b></td>
                                                        <td><b>{{$grossesse->num_carnet}}</b></td>
                                                        <td><b>{{$grossesse->telephone}}</b></td>
                                                        <td>
                                                            <b>{{date_format(date_create($grossesse->dateAccouchement),"d M Y")}}</b>
                                                        </td>
                                                        <td><b>{{$grossesse->ageBebe}}</b></td>
                                                        <td><b>{{$grossesse->nomBebe}}</b></td>
                                                        <td><b>{{$grossesse->code_vacci_typ}}</b></td>
                                                        <td>
                                                            <b>{{date_format(date_create($grossesse->dateprochain_vaccin),"d M Y")}}</b>
                                                        </td>
                                                        <td>
                                                            @if((Carbon\Carbon::parse(date_format(date_create($grossesse->dateprochain_vaccin),"d M Y"))) ->greaterThan(Carbon\Carbon::now()))
                                                                <label class="badge badge-success badge-pill">En
                                                                    Attente</label>
                                                            @else
                                                                <label class="badge badge-danger badge-pill">En
                                                                    Attente</label>
                                                            @endif
                                                        </td>
                                                        <!--<td>
                                                            <button
                                                                type="button" id="btrecu" data-toggle="modal"
                                                                data-target="#infos"
                                                                class="btn btn-primary btn-rounded btrecu"
                                                                data-id="{{$grossesse->id}}"
                                                                data-code="{{$grossesse->code}}"
                                                                data-num_carnet="{{$grossesse->num_carnet}}"
                                                            >Reçu
                                                            </button>
                                                        </td>-->
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

                <!-- fenetre modale -->
                <div class="modal fade" id="infos">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close closeX" data-dismiss="modal" style="color: white;">
                                &times;
                            </button>
                            <div class="EnteteInfo modal-header"
                                 style="height:40px !important; min-height: 0 !important;">
                                <strong>Nouvelle Date Prochaine CPN</strong>
                            </div>
                            <br/>


                            <form action="{{route("beneficiaire-recu-vaccin")}}" method="POST">
                                <input type="hidden" name="id" id="form-update-id"/>
                                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                <input type="hidden" name="page" value="liste"/>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Code</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-update-code"></label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Num&eacute;ro Carnet</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-update-numCarnet"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Type de vaccin</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="typeVaccin" name="typeVaccin" required>
                                                    <option selected disabled="true">Sélectionner le vaccin</option>
                                                    @foreach($VaccinNats as $VN)
                                                        <option
                                                            value="{{$VN->code_vacci_typ}}">{{$VN->lib_vacci_typ}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Date Prochaine CPN</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" min="{{date("Y-m-d")}}"
                                                       name="dateNextVac" id="dateNextVac"
                                                       placeholder="Date Naissance"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Dernier vaccin</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="checkbox" name="dernier"
                                                       id="dernier"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html-->
            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script>
        $(document).ready(function () {

            $('#infos').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var nb_cpn = $(e.relatedTarget).data('nb_cpn');
                var rhesus = $(e.relatedTarget).data('rhesus');
                var rhesus_conjoint = $(e.relatedTarget).data('rhesus_conjoint');
                var code = $(e.relatedTarget).data('code');
                var num_carnet = $(e.relatedTarget).data('num_carnet');
                $('#form-update-id').val(id);
                $('#form-update-nb_cpn').val(nb_cpn);
                $('#form-update-rhesus').text(rhesus);
                $('#form-update-rhesus_conjoint').text(rhesus_conjoint);
                $('#form-update-code').text(code);
                $('#form-update-numCarnet').text(num_carnet);
            });

            $('#terminerCpn').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var rhesus = $(e.relatedTarget).data('rhesus');
                var rhesus_conjoint = $(e.relatedTarget).data('rhesus_conjoint');
                var code = $(e.relatedTarget).data('code');
                var num_carnet = $(e.relatedTarget).data('num_carnet');
                $('#form-terminer-id').val(id);
                $('#form-terminer-rhesus').text(rhesus);
                $('#form-terminer-rhesus_conjoint').text(rhesus_conjoint);
                $('#form-terminer-code').text(code);
                $('#form-terminer-numCarnet').text(num_carnet);
            });
            $('#migrerModal').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var rhesus = $(e.relatedTarget).data('rhesus');
                var rhesus_conjoint = $(e.relatedTarget).data('rhesus_conjoint');
                var code = $(e.relatedTarget).data('code');
                var num_carnet = $(e.relatedTarget).data('num_carnet');
                $('#form-migrer-id').val(id);
                $('#form-migrer-rhesus').text(rhesus);
                $('#form-migrer-rhesus_conjoint').text(rhesus_conjoint);
                $('#form-migrer-code').text(code);
                $('#form-migrer-numCarnet').text(num_carnet);
            });

            $('#transfertModal').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var nom = $(e.relatedTarget).data('nom');
                var prenom = $(e.relatedTarget).data('prenom');
                var num_carnet = $(e.relatedTarget).data('num_carnet');
                $('#form-transfer-id').val(id);
                $('#form-transfer-nom').text(nom);
                $('#form-transfer-prenom').text(prenom);
                $('#form-transfer-numCarnet').text(num_carnet);
            });

            $('#modificationModal').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var num_carnet = $(e.relatedTarget).data('num_carnet');
                var nom = $(e.relatedTarget).data('nom');
                var prenom = $(e.relatedTarget).data('prenom');
                var dateNaissance = $(e.relatedTarget).data('date_naissance');
                var telephone = $(e.relatedTarget).data('telephone');
                var quartier = $(e.relatedTarget).data('quartier');
                var langue = $(e.relatedTarget).data('langue');
                var haveConjoint = $(e.relatedTarget).data('have_conjoint');
                var telephoneConjoint = $(e.relatedTarget).data('telephone_conjoint');
                var nomConjoint = $(e.relatedTarget).data('nom_conjoint');
                var prenomConjoint = $(e.relatedTarget).data('prenom_conjoint');
                var rhesus = $(e.relatedTarget).data('rhesus');
                var rhesus_conjoint = $(e.relatedTarget).data('rhesus_conjoint');
                var ptme = $(e.relatedTarget).data('ptme');
                var dateRegle = $(e.relatedTarget).data('date_regle');
                var dureeGrossese = $(e.relatedTarget).data('duree_grossesse');
                var dateProchaineCpn = $(e.relatedTarget).data('date_prochainecpn');
                var nb_cpn = $(e.relatedTarget).data('nb_cpn');
                var nbEcho = $(e.relatedTarget).data('nb_echo');
                $('#form-modifier-id').val(id);
                $('#form-modifier-numCarnet').val(num_carnet);
                $('#form-modifier-nom').val(nom);
                $('#form-modifier-prenom').val(prenom);
                $('#form-modifier-dateNaissance').val(dateNaissance);
                $('#form-modifier-telephone').val(telephone);
                $('#form-modifier-rhesus').val(rhesus);
                $('#form-modifier-quartier').val(quartier);
                $('#form-modifier-langue').val(`${langue}`);
                if (haveConjoint == 1) {
                    $('#form-modifier-haveConjoint').val("1");
                } else {
                    $('#form-modifier-haveConjoint').val("0");
                }
                $('#form-modifier-telephoneConjoint').val(telephoneConjoint);
                $('#form-modifier-nomConjoint').val(nomConjoint);
                $('#form-modifier-prenomConjoint').val(prenomConjoint);
                $('#form-modifier-rhesus_conjoint').val(rhesus_conjoint);
                if (ptme == 1) {
                    $('#form-modifier-ptme').val('1');
                } else {
                    $('#form-modifier-ptme').val('0');
                }
                switch (nb_cpn) {
                    case 1:
                        $('#form-modifier-cpn').val("1");
                        break;
                    case 2:
                        $('#form-modifier-cpn').val("2");
                        break;
                    case 3:
                        $('#form-modifier-cpn').val("3");
                        break;
                    case 4:
                        $('#form-modifier-cpn').val("4");
                        break;
                    case 5:
                        $('#form-modifier-cpn').val("5");
                        break;
                    case 6:
                        $('#form-modifier-cpn').val("6");
                        break;
                    case 7:
                        $('#form-modifier-cpn').val("7");
                        break;
                    case 8:
                        $('#form-modifier-cpn').val("8");
                        break;
                }
                $('#form-modifier-dateRegle').val(dateRegle);
                diff_in_week(dateRegle);
                if (nbreSemaine > 41) {
                    $("#dureeGrossese").css("color", "red");
                    $("#saveButton").prop("disabled", true);
                } else {
                    $("#dureeGrossese").css("color", "blue");
                    $("#saveButton").prop("disabled", false);
                }
                $("#dureeGrosse").val(nbreSemaine);
                $("#dureeGrossese").val(nbreSemaine + " Semaines");
                $('#form-modifier-dateProchaineCpn').val(dateProchaineCpn);
                switch (nbEcho) {
                    case 0:
                        $('#form-modifier-nbEcho').val("0");
                        break;
                    case 1:
                        $('#form-modifier-nbEcho').val("1");
                        break;
                    case 2:
                        $('#form-modifier-nbEcho').val("2");
                        break;
                    case 3:
                        $('#form-modifier-nbEcho').val("3");
                        break;
                }
            });
        });
        var nbreSemaine = 0;
        $("#form-modifier-haveConjoint").on("change", function () {

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
                $("#dureeGrossese").css("color", "red");
                $("#saveButton").prop("disabled", true);
            } else {
                $("#dureeGrossese").css("color", "blue");
                $("#saveButton").prop("disabled", false);
            }
            $("#dureeGrosse").val(nbreSemaine);
            $("#dureeGrossese").val(nbreSemaine + " Semaines");
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

<style type="text/css">
    /*-- Numerotation table --*/
    /**/
    table {
        counter-reset: case;
    }

    #num:before {
        counter-increment: case;
        content: counter(case);
    }
</style>

