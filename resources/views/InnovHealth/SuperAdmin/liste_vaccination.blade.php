@extends("Template.otherTemplate")


@section("title")
    @if($page == 'admin-principal-fs-vaccination-en-cours')
        Liste vaccination en cours
        @else
        Liste vaccination à terme
    @endif

@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovSuperAdminProfile")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        @if($page == 'admin-principal-fs-vaccination-en-cours')
                                            Suivi vaccination en cours
                                        @else
                                            Suivi vaccination à terme
                                        @endif
                                    </h4>

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
                                                    <th>Date Acouchement</th>
                                                    <th>Age bébé</th>
                                                    <th>Nom bébé</th>
                                                    <th>Vaccin</th>
                                                    <th>Date prochain vaccin</th>
                                                    <th>Statu</th>
                                                    <th>Reçu</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($grossesses as $grossesse)
                                                    <tr class="item{{$grossesse['id']}}">
                                                        <td id="num"></td>
                                                        <td>{{$grossesse['code']}}</td>
                                                        <td>{{$grossesse['num_carnet']}}</td>
                                                        <td><b>{{$grossesse['telephone']}}</b></td>
                                                        <td><b>{{$grossesse['dateAccouchement']}}</b></td>
                                                        <td><b>{{$grossesse['ageBebe']}} mois</b></td>
                                                        <td><b>{{$grossesse['nomBebe']}}</b></td>
                                                        <td>{{$grossesse['vaccin']}}</td>
                                                        <td>{{$grossesse['dateprochain_vaccin']}}</td>
                                                        <td>
                                                            @if($grossesse['dateprochain_vaccin'] == "Pas encore programmé")
                                                                <label
                                                                    class="badge badge-success badge-pill">{{$grossesse['dateprochain_vaccin']}}</label>
                                                            @else
                                                                @if((Carbon\Carbon::parse(date_format(date_create($grossesse['dateprochain_vaccin']),"d M Y"))) ->greaterThan(Carbon\Carbon::now()))
                                                                    <label class="badge badge-success badge-pill">En
                                                                        Attente</label>
                                                                @else
                                                                    <label class="badge badge-danger badge-pill">En
                                                                        Attente</label>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button
                                                                type="button" id="btrecu"
                                                                data-toggle="modal"
                                                                data-target="#modificationModal"
                                                                class="btn btn-primary btn-rounded"
                                                                data-id="{{$grossesse['id']}}"
                                                                data-code="{{$grossesse['code']}}"
                                                                data-num_carnet="{{$grossesse['num_carnet']}}">
                                                                Détails
                                                            </button>
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


                            <form action="{{route("beneficiaire-recu")}}" method="POST">
                                <input type="hidden" name="id" id="form-update-id"/>
                                <input type="hidden" name="nb_cpn" id="form-update-nb_cpn"/>
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

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Rhesus</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-update-rhesus"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Rhesus conjoint</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-update-rhesus_conjoint"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextCPN">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Date Prochaine CPN</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" min="{{date("Y-m-d")}}"
                                                       name="dateNextCPN1" id="dateNextCPN1"
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

                                            <label class="control-label col-sm-4">Dernier CPN</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="checkbox" name="dernier"
                                                       id="dernier"/>
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

                                            <label class="control-label col-sm-4">Terminer CPN</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="checkbox" name="estFinis"
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

                <div class="modal fade" id="terminerCpn">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close closeX" data-dismiss="modal" style="color: white;">
                                &times;
                            </button>
                            <div class="EnteteInfo modal-header"
                                 style="height:40px !important; min-height: 0 !important;">
                                <strong>Terminer la consultation prénatale</strong>
                            </div>
                            <br/>
                            <form action="{{route("terminer-cpn")}}" method="POST">
                                <input type="hidden" name="id" id="form-terminer-id"/>
                                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                <input type="hidden" name="page" value="liste"/>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Code</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-terminer-code"></label>

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
                                                <label class="control-label" id="form-terminer-numCarnet"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Rhesus</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-terminer-rhesus"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Rhesus conjoint</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-terminer-rhesus_conjoint"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Terminer CPN</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="checkbox" name="estFinis"
                                                       id="dernier" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary">Terminer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="transfertModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close closeX" data-dismiss="modal" style="color: white;">
                                &times;
                            </button>
                            <div class="EnteteInfo modal-header"
                                 style="height:40px !important; min-height: 0 !important;">
                                <strong>Transferer un bénéficiare à un autre centre de formation </strong>
                            </div>
                            <br/>


                            <form action="{{route("transfert-beneficiaire")}}" method="POST">
                                <input type="hidden" name="id" id="form-transfer-id"/>
                                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                <input type="hidden" name="page" value="liste"/>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Numéro carnet</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-transfer-numCarnet"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Nom</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-transfer-nom"></label>
                                                <label class="control-label" id="form-transfer-prenom"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Formation sanitaire</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="formationSanitaire" required>
                                                    <option selected disabled="true">Sélectionner
                                                    </option>
                                                    @foreach($users as $user)
                                                        <option
                                                            value="{{$user->id}}">{{\App\FormationSanitaire::where("id",$user->formation_sanitaire_id)->value('libelle')}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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

                <div class="modal fade" id="modificationModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <button type="button" class="close closeX" data-dismiss="modal" style="color: white;">
                                &times;
                            </button>
                            <div class="EnteteInfo modal-header"
                                 style="height:40px !important; min-height: 0 !important;">
                                <strong>Modification du bénéficiaire</strong>
                            </div>
                            <br/>

                            <form id="addBeneficiary" class="form"
                                  action="{{route('update-suivi-grossesse-beneficiaire')}}" method="POST">
                                <input name="optionSuivi" value="Suivi de la grossesse" hidden>
                                <input type="hidden" name="id" id="form-modifier-id"/>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Numéro du carnet
                                                CPN</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" required type="text"
                                                       name="numCarnet" id="form-modifier-numCarnet"
                                                       placeholder="Numéro Carnet CPN"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Nom</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="form-modifier-nom"
                                                       name="name"
                                                       required placeholder="Nom du bénéficiaire"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Prénoms</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="form-modifier-prenom"
                                                       name="prenom"
                                                       required placeholder="Prénom du bénéficiaire"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5" id="dateNaiss">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Date Naissance</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="date"
                                                       name="dateNaissance" max="{{date("Y-m-d")}}"
                                                       id="form-modifier-dateNaissance" placeholder="Date Naissance"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <!-- Date Naissance et Téléphone -->
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Téléphone</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="form-modifier-telephone"
                                                       name="telephone"
                                                       required
                                                       placeholder="Téléphone du bénéficiaire sans indicatif"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Réshus</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="form-modifier-rhesus" name="reshus"
                                                        required>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <!-- Quartier et langue de préférence -->
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Quartier</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="form-modifier-quartier" name="quartier"
                                                        required>
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
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Langue de
                                                préférence</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="form-modifier-langue" name="langue"
                                                        required>
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
                                    <div class="col-sm-1"></div>
                                </div>

                                <!-- Information sur le conjoint début -->
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Avez-vous un
                                                conjoint?</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="form-modifier-haveConjoint"
                                                        name="haveconjoint"
                                                        required>
                                                    <option selected disabled="true">Sélectionner votre
                                                        choix
                                                    </option>
                                                    <option value="1">OUI</option>
                                                    <option value="0">NON</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5" id="telConjoint" style="display: none;">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">N° Tel
                                                Conjoint</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text"
                                                       id="form-modifier-telephoneConjoint"
                                                       name="telephoneConjoint"
                                                       placeholder="Téléphone du conjoint"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div id="conjoint" style="display: none;">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Nom
                                                    Conjoint</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           id="form-modifier-nomConjoint"
                                                           name="nomConjoint"
                                                           placeholder="Nom du conjoint"/>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-5">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Prénom
                                                    Conjoint</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           id="form-modifier-prenomConjoint"
                                                           name="prenomConjoint"
                                                           placeholder="Prénom du conjoint"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Réshus du
                                                    conjoint</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="form-modifier-rhesus_conjoint"
                                                            name="conjointReshus"
                                                    >
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Information sur le conjoint fin -->

                                <!-- Type patient et Type CPN suivit -->
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Patient
                                                PTME</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="form-modifier-ptme" required
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
                                    @if($typeCpn == 4)
                                        <div class="col-sm-5">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">CPN à
                                                    faire</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control"
                                                            name="cpn">
                                                        <option selected disabled="true">Sélectionner le
                                                            CPN
                                                        </option>
                                                        <option value="1">CPN1</option>
                                                        <option value="2">CPN2</option>
                                                        <option value="3">CPN3</option>
                                                        <option value="4">CPN4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-5">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">CPN à
                                                    faire</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control"
                                                            id="form-modifier-cpn"
                                                            name="cpn">
                                                        <option selected disabled="true">Sélectionner le
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
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-sm-1"></div>
                                </div>

                                <!-- CPN field begin -->
                                <div id="cpnForm">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Date dernière
                                                    règle</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" required type="date"
                                                           name="dateRegle" max="{{date("Y-m-d")}}"
                                                           id="form-modifier-dateRegle"
                                                           placeholder="Date dernière règle"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Âge de la
                                                    grossesse</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" required
                                                           name="dureeGrossese" id="dureeGrosse"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Date Prochaine CPN</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" required type="date"
                                                           name="dateNextCPN1" id="form-modifier-dateProchaineCpn"
                                                           placeholder="Date Prochaine CPN"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- CPN field end -->
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3">Nombre ECHO réalisé</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="form-modifier-nbEcho" name="nbEcho"
                                                        required>
                                                    <option selected disabled="true">Sélectionner le
                                                        nombre d'échographie
                                                    </option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
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

                <div class="modal fade" id="migrerModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close closeX" data-dismiss="modal" style="color: white;">
                                &times;
                            </button>
                            <div class="EnteteInfo modal-header"
                                 style="height:40px !important; min-height: 0 !important;">
                                <strong>Terminer la consultation prénatale</strong>
                            </div>
                            <br/>
                            <form action="{{route("migrer-beneficiare")}}" method="POST">
                                <input type="hidden" name="id" id="form-migrer-id"/>
                                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                <input type="hidden" name="page" value="liste"/>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Code</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-migrer-code"></label>
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
                                                <label class="control-label" id="form-migrer-numCarnet"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Rhesus</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-migrer-rhesus"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Rhesus conjoint</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-migrer-rhesus_conjoint"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Migrer vers</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="typeMigration" required>
                                                    <option selected disabled="true">Sélectionner
                                                    </option>
                                                    <option value="VC">Vaccination</option>
                                                    <option value="PF">Planing Familial</option>
                                                    <option value="ALL">Les deux</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary">Terminer</button>
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

