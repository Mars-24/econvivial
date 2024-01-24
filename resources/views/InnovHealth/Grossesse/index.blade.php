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
                                                        <p>{{Session::pull('error')}}</p>
                                                    </div>
                                                </div>
                                            @endif


                                            <form id="addBeneficiary" class="form"
                                                  action="{{route('save-suivi-beneficiaire')}}"
                                                  method="POST">

                                                <div id="form1" style="display: block;">
                                                    <p style="margin-bottom: 50px; margin-top: 20px;">
                                                        <span
                                                            style="border-radius: 25px; background: #00b0e8; padding: 10px; width: 40px; height: 40px;">Informations générales</span>
                                                    </p>

                                                    <input name="optionSuivi" value="Suivi de la grossesse" hidden>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Numéro du carnet
                                                                    CPN</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"
                                                                           name="numCarnet" id="numCarnet"
                                                                           value="{{$lastBenef ."/21"}}" readonly
                                                                           placeholder="Numéro Carnet CPN"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Nom <span
                                                                        style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text" id="name"
                                                                           name="name"
                                                                           placeholder="Saisir le nom de Famille"/>
                                                                    <span style="color: red" id="nameError"></span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Prénoms <span
                                                                        style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           name="prenom" id="prenom"
                                                                           placeholder="Saisir le prénoms"/>
                                                                    <span style="color: red" id="prenomError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6" id="dateNaiss">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Date
                                                                    Naissance <span style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <input class="form-control"
                                                                           name="dateNaissance" id="dateNaissance"
                                                                           max="{{date("Y-m-d")}}"
                                                                           placeholder="Séléctionner la date"
                                                                           type="date" onfocus="(this.type='date')"/>
                                                                    <span style="color: red"
                                                                          id="dateNaissanceError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Date Naissance et Téléphone -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">
                                                                    Téléphone <span style="color: red">*</span>
                                                                </label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           name="telephone" id="telephone"
                                                                           placeholder="Saisir le numéro de téléphone"/>
                                                                    <span style="color: red" id="telephoneError"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">
                                                                    Réshus <span style="color: red">*</span>
                                                                </label>
                                                                <div class="col">
                                                                    <select class="form-control" id="reshus"
                                                                            name="reshus">
                                                                        <option selected disabled="true">Sélectionner le
                                                                            réshus
                                                                        </option>
                                                                        <option>A-</option>
                                                                        <option>A+</option>
                                                                        <option>O-</option>
                                                                        <option>O+</option>
                                                                        <option>B-</option>
                                                                        <option>B+</option>
                                                                        <option>AB-</option>
                                                                        <option>AB+</option>
                                                                    </select>
                                                                    <span style="color: red" id="reshusError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Quartier et langue de préférence -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">
                                                                    Quartier <span style="color: red">*</span>
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control" id="quartier"
                                                                            name="quartier"
                                                                    >
                                                                        <option selected disabled="true">Sélectionner le
                                                                            quartier
                                                                        </option>
                                                                        @foreach($quartiers as $quartier)
                                                                            <option
                                                                                value="{{$quartier->id}}">{{$quartier->libelle}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span style="color: red" id="quartierError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">
                                                                    Taille <span style="color: red">*</span>
                                                                </label>
                                                                <div class="col">
                                                                    <input class="form-control" type="number"
                                                                           name="taille" id="taille"
                                                                           placeholder="Saisir la taille"/>
                                                                    <span style="color: red" id="tailleError"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Langue de
                                                                    préférence <span style="color: red">*</span>
                                                                </label>
                                                                <div class="col">
                                                                    <select class="form-control" name="langue"
                                                                            id="langue">
                                                                        <option selected disabled="true">Sélectionner la
                                                                            langue
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
                                                                    <span style="color: red" id="langueError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6" id="telConjoint">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">N° Tel
                                                                    Conjoint <span style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           name="telephoneConjoint"
                                                                           id="telephoneConjoint"
                                                                           placeholder="Saisir le téléphone"/>
                                                                    <span style="color: red"
                                                                          id="telephoneConjointError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Information sur le conjoint début -->

                                                    <div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Nom
                                                                        Conjoint <span
                                                                            style="color: red">*</span></label>
                                                                    <div class="col">
                                                                        <input class="form-control" type="text"
                                                                               name="nomConjoint" id="nomConjoint"
                                                                               placeholder="Nom du conjoint"/>
                                                                        <span style="color: red"
                                                                              id="nomConjointError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Prénom
                                                                        Conjoint <span
                                                                            style="color: red">*</span></label>
                                                                    <div class="col">
                                                                        <input class="form-control" type="text"
                                                                               name="prenomConjoint" id="prenomConjoint"
                                                                               placeholder="Prénom du conjoint"/>
                                                                        <span style="color: red"
                                                                              id="prenomConjointError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Réshus du
                                                                        conjoint <span
                                                                            style="color: red">*</span></label>
                                                                    <div class="col">
                                                                        <select class="form-control"
                                                                                name="conjointReshus"
                                                                                id="conjointReshus">
                                                                            <option selected disabled="true">
                                                                                Sélectionner le
                                                                                réshus
                                                                            </option>
                                                                            <option>A-</option>
                                                                            <option>A+</option>
                                                                            <option>O-</option>
                                                                            <option>O+</option>
                                                                            <option>B-</option>
                                                                            <option>B+</option>
                                                                            <option>AB-</option>
                                                                            <option>AB+</option>
                                                                        </select>
                                                                        <span style="color: red"
                                                                              id="conjointReshusError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Information sur le conjoint fin -->

                                                    <!-- Type patient et Type CPN suivit -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Patient
                                                                    PTME <span style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <select class="form-control"
                                                                            name="typePatient" id="typePatient">
                                                                        <option selected disabled="true">Sélectionner le
                                                                            type de patient
                                                                        </option>
                                                                        <option value="1">OUI</option>
                                                                        <option value="0">NON</option>
                                                                    </select>
                                                                    <span style="color: red"
                                                                          id="typePatientError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($typeCpn == 4)
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">CPN à
                                                                        faire</label>
                                                                    <div class="col">
                                                                        <select class="form-control"
                                                                                name="cpn" id="cpn">
                                                                            <option selected disabled="true">
                                                                                Sélectionner le
                                                                                CPN
                                                                            </option>
                                                                            <option value="1">CPN1</option>
                                                                            <option value="2">CPN2</option>
                                                                            <option value="3">CPN3</option>
                                                                            <option value="4">CPN4</option>
                                                                        </select>
                                                                        <span style="color: red" id="cpnError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">CPN à
                                                                        faire <span style="color: red">*</span></label>
                                                                    <div class="col">
                                                                        <select class="form-control"
                                                                                name="cpn" id="cpn">
                                                                            <option selected disabled="true">
                                                                                Sélectionner le
                                                                                CPN
                                                                            </option>
                                                                            <option value="1">CPN1</option>
                                                                            <option value="2">CPN2</option>
                                                                            <option value="3">CPN3</option>
                                                                            <option value="4">CPN4</option>
                                                                            <option value="5">CPN5</option>
                                                                            <option value="6">CPN6</option>
                                                                            <option value="7">CPN7</option>
                                                                            <option value="8">CPN8</option>
                                                                        </select>
                                                                        <span style="color: red" id="cpnError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- CPN field begin -->
                                                    <div id="cpnForm">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Date dernière
                                                                        règle <span style="color: red">*</span></label>
                                                                    <div class="col">
                                                                        <input class="form-control" type="date"
                                                                               name="dateRegle" max="{{date("Y-m-d")}}"
                                                                               id="dateRegle"
                                                                               placeholder="Date dernière règle"/>
                                                                        <span style="color: red"
                                                                              id="dateRegleError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Âge de la
                                                                        grossesse</label>
                                                                    <div class="col">
                                                                        <input class="form-control"
                                                                               name="dureeGrossesse" id="dureeGrosse"/>
                                                                        <span style="color: red"
                                                                              id="dureeGrosseError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Date Prochaine
                                                                        CPN <span style="color: red">*</span></label>
                                                                    <div class="col">
                                                                        <input class="form-control" type="date"
                                                                               name="dateNextCPN1" id="dateNextCPN1"
                                                                               placeholder="Date Prochaine CPN"/>
                                                                        <span style="color: red"
                                                                              id="dateNextCPN1Error"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Nombre ECHO
                                                                        réalisé <span
                                                                            style="color: red">*</span></label>
                                                                    <div class="col">
                                                                        <select class="form-control" name="nbEcho"
                                                                                id="nbEcho">
                                                                            <option selected disabled="true">
                                                                                Sélectionner le
                                                                                nombre d'échographie
                                                                            </option>
                                                                            <option>0</option>
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                        </select>
                                                                        <span style="color: red"
                                                                              id="nbEchoError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- CPN field end -->

                                                    <div class="row justify-content-center">
                                                        <div class="form-group">
                                                            <div class="col-sm-6">
                                                                <button id="buttonSuivant" type="button"
                                                                        style="width: 250px;"
                                                                        class="btn btn-outline-success btn-rounded">
                                                                    Suivant
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div id="form2" style="display: none;">
                                                    <p style="margin-bottom: 50px; margin-top: 20px;">
                                                        <span
                                                            style="border-radius: 25px; background: #00b0e8; padding: 10px; width: 40px; height: 40px;">Antécédents</span>
                                                    </p>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <span style="font-size: 18px;">Médical</span>
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="col-sm-3">Maladie grave</label>
                                                                <div class="col-sm-1">
                                                                    <input type="checkbox"
                                                                           name="maladieGrave" id="maladieGrave"/>
                                                                </div>
                                                                <div class="col"
                                                                     id="maladieInfo" style="display: none"><span
                                                                        style="color: red">*</span>
                                                                    <input class="form-control" type="text"
                                                                           name="maladieInfo" id="maladieInfoInput"
                                                                           placeholder="Information sur la maladie"
                                                                    />
                                                                    <span style="color: red"
                                                                          id="maladieInfoError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <span style="font-size: 18px;">Obstetrical</span>
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="col-sm-3">Opération</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"
                                                                           name="obstetrical"
                                                                           id="obstetrical"
                                                                           placeholder="Information sur l'opération"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <span style="font-size: 18px;">Chirugical</span>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">Opération</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="operation" id="operation"/>
                                                                    </div>
                                                                    <div class="col"
                                                                         id="operationInfo" style="display: none">
                                                                        <span style="color: red">*</span>
                                                                        <input class="form-control" type="text"
                                                                               name="operationInfo"
                                                                               id="operationInfoInput"
                                                                               placeholder="Information sur l'opération"/>
                                                                        <span style="color: red"
                                                                              id="operationInfoError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">Césarienne</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="cesarienne" id="cesarienne"/>
                                                                    </div>
                                                                    <div class="col"
                                                                         id="cesarienneInfo" style="display: none;">
                                                                        <span style="color: red">*</span>
                                                                        <input class="form-control" type="text"
                                                                               name="cesarienneInfo"
                                                                               id="cesarienneInfoInput"
                                                                               placeholder="Cause de la césarienne"
                                                                        />
                                                                        <span style="color: red"
                                                                              id="cesarienneInfoError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="dateOperation" class="row"
                                                         style="margin-top: 10px; display: none;">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Date
                                                                    de l'opération <span
                                                                        style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <input class="form-control"
                                                                           name="dateOperation" id="dateOperationInput"
                                                                           max="{{date("Y-m-d")}}"
                                                                           placeholder="Séléctionner la date"
                                                                           type="text" onfocus="(this.type='date')"
                                                                    />
                                                                    <span style="color: red"
                                                                          id="dateOperationError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <span style="font-size: 18px;">Gynécologique</span>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">Traitement de
                                                                        stérilité</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="traitementStr" id="traitementStr"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3">Opération sur
                                                                        l'uterus</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="operationUterus"
                                                                               id="operationUterus"/>
                                                                    </div>
                                                                    <div class="col-sm-8"
                                                                         id="operationUterusInfo"
                                                                         style="display: none;">
                                                                        <span style="color: red">*</span>
                                                                        <input class="form-control" type="text"
                                                                               name="operationUterusInfo"
                                                                               id="operationUterusInfoInput"
                                                                               placeholder="Information sur l'opération"/>
                                                                        <span style="color: red"
                                                                              id="operationUterusInfoError"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <span style="font-size: 18px;">VAT</span>
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="control-label col-sm-3">
                                                                    Dose de VAT
                                                                    <span style="color: red;">*</span>
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control" name="vat" id="vat">
                                                                        <option selected disabled="true">Sélectionner la
                                                                            dose de vat
                                                                        </option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                    </select>
                                                                    <span style="color: red" id="vatError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <span style="font-size: 18px;">Selles KOP</span>
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="col-sm-3">Résultat
                                                                    <span style="color: red;">*</span>
                                                                </label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           name="selleKOP"
                                                                           id="selleKOP"
                                                                           placeholder="Résultat de l'analyse"/>
                                                                    <span style="color: red" id="selleKOPError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <span style="font-size: 18px;">Commentaire</span>
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="col-sm-3">Résultats analyses
                                                                    complémentaires</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"
                                                                           name="commentaire"
                                                                           id="commentaire"
                                                                           placeholder="Commentaires suite aux analyses"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="form-group">
                                                            <div class="row-cols-sm-6">
                                                                <button id="btnPrecedent" type="button"
                                                                        style="width: 250px; margin-right:30px;"
                                                                        class="btn btn-outline-success btn-rounded">
                                                                    Précédent
                                                                </button>
                                                                <button id="buttonSuivant1" type="button"
                                                                        style="width: 250px;"
                                                                        class="btn btn-outline-success btn-rounded">
                                                                    Suivant
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div id="form3" style="display: none;">
                                                    <p style="margin-bottom: 50px; margin-top: 20px;">
                                                        <span
                                                            style="border-radius: 25px; background: #00b0e8; padding: 10px; width: 40px; height: 40px;">
                                                            Consultation prénatale</span>
                                                    </p>

                                                    <div>
                                                        <span style="font-size: 18px;">Antecedents Pathologiques</span>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Age < 18 ans</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="ageInf18" id="ageInf18"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Age > 35 ans</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="ageSup35" id="ageSup35"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">Primigeste âgée > 35
                                                                        ans</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="primiSup35" id="primiSup35"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">Poids < 40kg ou >
                                                                        90kg</label>
                                                                    <input class="col-sm-1" type="checkbox"
                                                                           name="poid40A90" id="poid40A90"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Taille < 150 cm</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="tailleInf150" id="tailleInf150"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Traitement
                                                                        d’infertilité</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="traitementInfert"
                                                                               id="traitementInfert"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">Multipare > 4
                                                                        enfants</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="multipareSup4" id="multipareSup4"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">Hypertension
                                                                        artérielle</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="hyperTensArte" id="hyperTensArte"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Diabète</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="diabete" id="diabete"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Drépanocytose en
                                                                        traitement</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="drepaEnTrait" id="drepaEnTrait"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">Rh-</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="rhMoins" id="rhMoins"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Tuberculose en
                                                                        traitement</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="tubEnTrait" id="tubEnTrait"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Grossesse prolongée</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="grossProl" id="grossProl"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">Maladies rénales</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="mldieRenal" id="mldieRenal"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">Maladies cardiaques</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="mldieCardiak" id="mldieCardiak"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Enfant décédé avant 8 jours
                                                                        au dernier accouchement</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="enfMortAvt8jr" id="enfMortAvt8jr"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Prématuré au dernier
                                                                        accouchement</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="premat" id="premat"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">Hémorragie grave au dernier
                                                                        accouchement</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="hemo" id="hemo"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">TPHA+</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="tpha" id="tpha"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <div class="row" style="margin-top: 10px;">
                                                                <div class="col-sm-3">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-8">Dernier accouchement
                                                                            moins de 2 ans</label>
                                                                        <div class="col-sm-1">
                                                                            <input type="checkbox"
                                                                                   name="dernAccMoins2"
                                                                                   id="dernAccMoins2"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-">Convulsions pendant la
                                                                            dernière grossesse</label>
                                                                        <div class="col-sm-1">
                                                                            <input type="checkbox"
                                                                                   name="convulsion" id="convulsion"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-6">Utérus cicatriciel ou
                                                                            césarienne</label>
                                                                        <div class="col-sm-1">
                                                                            <input type="checkbox"
                                                                                   name="uterCica" id="uterCica"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-6">Albuminurie +</label>
                                                                        <div class="col-sm-1">
                                                                            <input type="checkbox"
                                                                                   name="albu" id="albu"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Déformation du basin
                                                                        (boiterie)</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="dformatBassin" id="dformatBassin"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Plus de 2 avortements
                                                                        successifs précédents la grossesse
                                                                        actuelle</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="plus2Avrt" id="plus2Avrt"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Mort-né au dernier
                                                                        accouchement ou plusieurs morts nés</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="neMort" id="neMort"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <span style="font-size: 18px;">SIGNES DE DANGER RETROUVES</span>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Anémie (Pâleur des téguments
                                                                        ou taux d’Hb</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="anemie" id="anemie"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Vomissements graves avec
                                                                        déshydratation</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="vomGrav" id="vomGrav"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Hémorragie génitale</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="hemoGenital" id="hemoGenital"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Fièvre >38°C</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="fievre" id="fievre"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Tension Artérielle
                                                                        supérieure ou égale à 140/90 mm Hg</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="tensArteSup" id="tensArteSup"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Albuminurie (+)</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="albuSDR" id="albuSDR"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Œdème des M1 ou
                                                                        généralisé </label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="oedem" id="oedem"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Pertes liquidiennes autres
                                                                        que les urines</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="perte" id="perte"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Obésité</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="obesite" id="obesite"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Maux de tête ou Céphalées
                                                                        Intenses </label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="mauxTete" id="mauxTete"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Grossesse actuelle
                                                                        gémellaire ou multiple</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="grsGeme" id="grsGeme"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-8">Sérologie VIH+</label>
                                                                    <div class="col-sm-1">
                                                                        <input type="checkbox"
                                                                               name="serologie" id="serologie"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="col-sm-3">Score total</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="number"
                                                                           name="score"
                                                                           id="score"
                                                                           value="0"
                                                                           placeholder="Score obtenu" readonly/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="col-sm-3">Facteurs de risque
                                                                    retrouvés <span style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           name="facteurRisque"
                                                                           id="facteurRisque"
                                                                           placeholder="Les facteurs de risque"/>
                                                                    <span style="color: red;" id="facteurRisqueError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="col-sm-3">Reference, lieu
                                                                    <span style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           name="referenceLieu"
                                                                           id="referenceLieu"
                                                                           placeholder="Réference et lieu"/>
                                                                    <span style="color: red;" id="referenceLieuError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group row" style="margin-top: 10px;">
                                                                <label class="col-sm-3">Decision
                                                                    <span style="color: red">*</span></label>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           name="decision"
                                                                           id="decision"
                                                                           placeholder="Commentaires suite aux analyses"/>
                                                                    <span style="color: red;" id="decisionError"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center" style="margin-top: 20px;">
                                                        <div class="form-group">
                                                            <div class="row-cols-sm-6">
                                                                <button id="btnPrecedent1" type="button"
                                                                        style="width: 250px; margin-right:30px;"
                                                                        class="btn btn-outline-success btn-rounded">
                                                                    Précédent
                                                                </button>
                                                                <input type="hidden" name="_token"
                                                                       value="{{Session::token()}}"/>
                                                                <button id="saveButton" type="button"
                                                                        style="width: 250px;"
                                                                        class="btn btn-outline-success btn-rounded">
                                                                    Enregistrer
                                                                </button>
                                                            </div>
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

        function validateInfoGenerale() {
            var errorField = 0;
            if ($('#name').val() === "") {
                $('#name').css('border-color', 'red');
                document.getElementById("nameError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#name').css('border-color', 'green');
                document.getElementById("nameError").textContent = "";
                errorField--
            }
            if ($('#prenom').val() === "") {
                $('#prenom').css('border-color', 'red');
                document.getElementById("prenomError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#prenom').css('border-color', 'green');
                document.getElementById("prenomError").textContent = "";
                errorField--
            }
            if ($('#telephone').val() === "" || Number.isInteger(+$('#telephone').val())) {
                $('#telephone').css('border-color', 'red');
                document.getElementById("telephoneError").textContent = "Ce champ est obligatoire et ne doit contenir que des chiffres";
                errorField++
            } else {
                $('#telephone').css('border-color', 'green');
                document.getElementById("telephoneError").textContent = "";
                errorField--
            }
            if (!$('#dateNaissance').val()) {
                $('#dateNaissance').css('border-color', 'red');
                document.getElementById("dateNaissanceError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#dateNaissance').css('border-color', 'green');
                document.getElementById("dateNaissanceError").textContent = "";
                errorField--
            }
            if (!$('#reshus').val()) {
                $('#reshus').css('border-color', 'red');
                document.getElementById("reshusError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#reshus').css('border-color', 'green');
                document.getElementById("reshusError").textContent = "";
                errorField--
            }
            if (!$('#quartier').val()) {
                $('#quartier').css('border-color', 'red');
                document.getElementById("quartierError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#quartier').css('border-color', 'green');
                document.getElementById("quartierError").textContent = "";
                errorField--
            }
            if ($('#taille').val() === "") {
                $('#taille').css('border-color', 'red');
                document.getElementById("tailleError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#taille').css('border-color', 'green');
                document.getElementById("tailleError").textContent = "";
                errorField--
            }
            if (!$('#langue').val()) {
                $('#langue').css('border-color', 'red');
                document.getElementById("langueError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#langue').css('border-color', 'green');
                document.getElementById("langueError").textContent = "";
                errorField--
            }
            if ($('#telephoneConjoint').val() === "") {
                $('#telephoneConjoint').css('border-color', 'red');
                document.getElementById("telephoneConjointError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#telephoneConjoint').css('border-color', 'green');
                document.getElementById("telephoneConjointError").textContent = "";
                errorField--
            }
            if ($('#nomConjoint').val() === "") {
                $('#nomConjoint').css('border-color', 'red');
                document.getElementById("nomConjointError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#nomConjoint').css('border-color', 'green');
                document.getElementById("nomConjointError").textContent = "";
                errorField--
            }
            if ($('#prenomConjoint').val() === "") {
                $('#prenomConjoint').css('border-color', 'red');
                document.getElementById("prenomConjointError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#prenomConjoint').css('border-color', 'green');
                document.getElementById("prenomConjointError").textContent = "";
                errorField--
            }
            if (!$('#conjointReshus').val()) {
                $('#conjointReshus').css('border-color', 'red');
                document.getElementById("conjointReshusError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#conjointReshus').css('border-color', 'green');
                document.getElementById("conjointReshusError").textContent = "";
                errorField--
            }
            if (!$('#typePatient').val()) {
                $('#typePatient').css('border-color', 'red');
                document.getElementById("typePatientError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#typePatient').css('border-color', 'green');
                document.getElementById("typePatientError").textContent = "";
                errorField--
            }
            if (!$('#cpn').val()) {
                $('#cpn').css('border-color', 'red');
                document.getElementById("cpnError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#cpn').css('border-color', 'green');
                document.getElementById("cpnError").textContent = "";
                errorField--
            }
            if (!$('#dateRegle').val()) {
                $('#dateRegle').css('border-color', 'red');
                document.getElementById("dateRegleError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                diff_in_week($('#dateRegle').val());
                if (nbreSemaine > 41) {
                    $('#dateRegle').css('border-color', 'red');
                    document.getElementById("dateRegleError").textContent = "La date de dernier règle n'est pas correcte";
                    errorField++
                    //$("#saveButton").prop("disabled", true);
                } else {
                    $("#dureeGrosse").val(nbreSemaine + " Semaines");
                    $('#dateRegle').css('border-color', 'green');
                    document.getElementById("dateRegleError").textContent = "";
                    errorField--
                }
            }
            if (!$('#dateNextCPN1').val()) {
                $('#dateNextCPN1').css('border-color', 'red');
                document.getElementById("dateNextCPN1Error").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                if (new Date().getTime() > new Date($('#dateNextCPN1').val())) {
                    $('#dateNextCPN1').css('border-color', 'red');
                    document.getElementById("dateNextCPN1Error").textContent = "La date doit être supérieur à la date d'aujourd'hui";
                    errorField++
                } else {
                    $('#dateNextCPN1').css('border-color', 'green');
                    document.getElementById("dateNextCPN1Error").textContent = "";
                    errorField--
                }
            }
            if (!$('#nbEcho').val()) {
                $('#nbEcho').css('border-color', 'red');
                document.getElementById("nbEchoError").textContent = "Ce champ est obligatoire";
                errorField++
            } else {
                $('#nbEcho').css('border-color', 'green');
                document.getElementById("nbEchoError").textContent = "";
                errorField--
            }
            return errorField;
        }

        function validateInfoAntecedant() {

            var fieldTest = false;
            if ($('#maladieGrave').is(":checked")) {
                if ($('#maladieInfoInput').val() === "") {
                    $('#maladieInfoInput').css('border-color', 'red');
                    document.getElementById("maladieInfoError").textContent = "Ce champ est obligatoire";
                    fieldTest = true
                } else {
                    $('#maladieInfoInput').css('border-color', 'green');
                    document.getElementById("maladieInfoError").textContent = "";
                    fieldTest = (fieldTest === true)
                }
            } else {
                document.getElementById("maladieInfoError").textContent = "";
                fieldTest = (fieldTest === true)
            }

            if ($('#operation').is(":checked")) {
                if ($('#operationInfoInput').val() === "") {
                    $('#operationInfoInput').css('border-color', 'red');
                    document.getElementById("operationInfoError").textContent = "Ce champ est obligatoire";
                    fieldTest = true
                } else {
                    $('#operationInfoInput').css('border-color', 'green');
                    document.getElementById("operationInfoError").textContent = "";
                    fieldTest = (fieldTest === true)
                }
            } else {
                document.getElementById("operationInfoError").textContent = "";
                fieldTest = (fieldTest === true)
            }

            if ($('#cesarienne').is(":checked")) {
                if ($('#cesarienneInfoInput').val() === "") {
                    $('#cesarienneInfoInput').css('border-color', 'red');
                    document.getElementById("cesarienneInfoError").textContent = "Ce champ est obligatoire";
                    fieldTest = true
                } else {
                    $('#cesarienneInfoInput').css('border-color', 'green');
                    document.getElementById("cesarienneInfoError").textContent = "";
                    fieldTest = (fieldTest === true)
                }
                if (!$('#dateOperationInput').val()) {
                    $('#dateOperationInput').css('border-color', 'red');
                    document.getElementById("dateOperationError").textContent = "Ce champ est obligatoire";
                    fieldTest = true
                } else {
                    $('#dateOperationInput').css('border-color', 'green');
                    document.getElementById("dateOperationError").textContent = "";
                    fieldTest = (fieldTest === true)
                }
            } else {
                document.getElementById("cesarienneInfoError").textContent = "";
                document.getElementById("dateOperationError").textContent = "";
                fieldTest = (fieldTest === true)
            }

            if ($('#operationUterus').is(":checked")) {
                if ($('#operationUterusInfoInput').val() === "") {
                    $('#operationUterusInfoInput').css('border-color', 'red');
                    document.getElementById("operationUterusInfoError").textContent = "Ce champ est obligatoire";
                    fieldTest = true
                } else {
                    $('#operationUterusInfoInput').css('border-color', 'green');
                    document.getElementById("operationUterusInfoError").textContent = "";
                    fieldTest = (fieldTest === true)
                }
            } else {
                document.getElementById("operationUterusInfoError").textContent = "";
                fieldTest = (fieldTest === true)
            }

            if (!$('#vat').val()) {
                $('#vat').css('border-color', 'red');
                document.getElementById("vatError").textContent = "Ce champ est obligatoire";
                fieldTest = true
            } else {
                $('#vat').css('border-color', 'green');
                document.getElementById("vatError").textContent = "";
                fieldTest = (fieldTest === true)
            }
            if ($('#selleKOP').val() === "") {
                $('#selleKOP').css('border-color', 'red');
                document.getElementById("selleKOPError").textContent = "Ce champ est obligatoire";
                fieldTest = true
            } else {
                $('#selleKOP').css('border-color', 'green');
                document.getElementById("selleKOPError").textContent = "";
                fieldTest = (fieldTest === true)
            }
            return fieldTest;
        }

        function validateInfoConsultation(){
            var fieldTest;
            if ($('#facteurRisque').val() === "") {
                $('#facteurRisque').css('border-color', 'red');
                document.getElementById("facteurRisqueError").textContent = "Ce champ est obligatoire";
                fieldTest = true
            } else {
                $('#facteurRisque').css('border-color', 'green');
                document.getElementById("facteurRisqueError").textContent = "";
                fieldTest = (fieldTest === true)
            }
            if ($('#referenceLieu').val() === "") {
                $('#referenceLieu').css('border-color', 'red');
                document.getElementById("referenceLieuError").textContent = "Ce champ est obligatoire";
                fieldTest = true
            } else {
                $('#referenceLieu').css('border-color', 'green');
                document.getElementById("facteurRisqueError").textContent = "";
                fieldTest = (fieldTest === true)
            }
            if ($('#decision').val() === "") {
                $('#decision').css('border-color', 'red');
                document.getElementById("decisionError").textContent = "Ce champ est obligatoire";
                fieldTest = true
            } else {
                $('#decision').css('border-color', 'green');
                document.getElementById("decisionError").textContent = "";
                fieldTest = (fieldTest === true)
            }
            return fieldTest;
        }

        $("#buttonSuivant").on("click", function () {
            if (validateInfoGenerale() === -17 || validateInfoGenerale() === 0) {
                document.getElementById("form1").style.display = "none";
                document.getElementById("form2").style.display = "block";
                document.getElementById("form3").style.display = "none";
            }
        });
        $("#btnPrecedent").on("click", function () {
            document.getElementById("form1").style.display = "block";
            document.getElementById("form2").style.display = "none";
            document.getElementById("form3").style.display = "none";
        });
        $("#buttonSuivant1").on("click", function () {
            alert(validateInfoAntecedant())
            if (validateInfoAntecedant() === false) {
                document.getElementById("form1").style.display = "none";
                document.getElementById("form2").style.display = "none";
                document.getElementById("form3").style.display = "block";
            }
        });
        $("#btnPrecedent1").on("click", function () {
            document.getElementById("form1").style.display = "none";
            document.getElementById("form2").style.display = "block";
            document.getElementById("form3").style.display = "none";
        });

        $("#saveButton").on("click", function () {
            if (validateInfoConsultation() === false) {
                document.getElementById("addBeneficiary").submit();
            }
        });
        $("#maladieGrave").click(function () {
            if ($(this).is(":checked")) {
                document.getElementById("maladieInfo").style.display = "block";
            } else {
                document.getElementById("maladieInfo").style.display = "none";
            }
        });

        $("#operation").click(function () {
            if ($(this).is(":checked")) {
                document.getElementById("operationInfo").style.display = "block";
            } else {
                document.getElementById("operationInfo").style.display = "none";
            }
        });

        $("#cesarienne").click(function () {
            if ($(this).is(":checked")) {

                document.getElementById("cesarienneInfo").style.display = "block";
                document.getElementById("dateOperation").style.display = "block";
            } else {
                document.getElementById("cesarienneInfo").style.display = "none";
                document.getElementById("dateOperation").style.display = "none";
            }
        });

        $("#operationUterus").click(function () {
            if ($(this).is(":checked")) {
                document.getElementById("operationUterusInfo").style.display = "block";
            } else {
                document.getElementById("operationUterusInfo").style.display = "none";
            }
        });

        var score = 0;

        function incrementScrore(point) {
            $("#score").val(score += point);
        }

        function decrementScrore(point) {
            $("#score").val(score -= point);
        }

        $("#ageInf18").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#ageSup35").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#primiSup35").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#poid40A90").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#tailleInf150").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#traitementInfert").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(3);
            } else {
                decrementScrore(3);
            }
        });
        $("#multipareSup4").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#hyperTensArte").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#diabete").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#drepaEnTrait").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#rhMoins").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#tubEnTrait").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#grossProl").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#mldieRenal").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#mldieCardiak").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#dformatBassin").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(3);
            } else {
                decrementScrore(3);
            }
        });
        $("#plus2Avrt").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#neMort").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#enfMortAvt8jr").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#premat").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(1);
            } else {
                decrementScrore(1);
            }
        });
        $("#hemo").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#dernAccMoins2").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(1);
            } else {
                decrementScrore(1);
            }
        });
        $("#uterCica").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#convulsion").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#tpha").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#albu").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#anemie").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(1);
            } else {
                decrementScrore(1);
            }
        });
        $("#vomGrav").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#hemoGenital").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#fievre").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(1);
            } else {
                decrementScrore(1);
            }
        });
        $("#tensArteSup").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#albuSDR").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(1);
            } else {
                decrementScrore(1);
            }
        });
        $("#oedem").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(1);
            } else {
                decrementScrore(1);
            }
        });
        $("#oedem").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#perte").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#mauxTete").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#grsGeme").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });
        $("#serologie").click(function () {
            if ($(this).is(":checked")) {
                incrementScrore(2);
            } else {
                decrementScrore(2);
            }
        });

    </script>

@endsection
