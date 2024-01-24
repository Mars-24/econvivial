@extends("Template.otherTemplate")


@section("title")
    Détails bénéficiaire
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @if($menu == 12) @include("Profile.innovSideProfil")  @endif
            @if($menu == 20) @include("Profile.innovAdminProfile")  @endif
            @if($menu == 21) @include("Profile.innovSuperAdminProfile")  @endif

        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Détails bénéficiaire</h4>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-8">

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

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <a href="{{route('generate-detail-pdf', ['ref'=>$beneficiaire->id])}}">
                                                        <button class="btn btn-success btn-rounded"
                                                                type="button">
                                                            Exporter en pdf
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button id="swipeBtn" class="btn btn-primary btn-rounded"
                                                            type="button">
                                                        Suivant
                                                    </button>
                                                </div>
                                                @if($menu == 12)
                                                    <div class="col-sm-3">
                                                        <button
                                                            type="button" id="btrecu"
                                                            data-toggle="modal"
                                                            data-target="#infos"
                                                            class="btn btn-default btn-rounded btrecu"
                                                            data-id="{{$beneficiaire->id}}"
                                                            data-code="{{$beneficiaire->code}}"
                                                            data-num_carnet="{{$beneficiaire->num_carnet}}"
                                                            data-nom="{{$beneficiaire->nom}}"
                                                            data-prenom="{{$beneficiaire->prenom}}"
                                                            data-taille="{{$beneficiaire->taille}}"
                                                            data-date_naissance="{{$beneficiaire->dateNaissance}}"
                                                            data-telephone="{{$beneficiaire->telephone}}"
                                                            data-quartier="{{\App\Quartier::where("id", $beneficiaire->quartier_id)->first()->id}}"
                                                            data-langue="{{$beneficiaire->langue}}"
                                                            data-have_conjoint="{{$beneficiaire->haveConjoint}}"
                                                            data-telephone_conjoint="{{$beneficiaire->telephoneConjoint}}"
                                                            data-nom_conjoint="{{\App\Conjoint::where("beneficiaire_id",$beneficiaire->id)->value('nom')}}"
                                                            data-prenom_conjoint="{{\App\Conjoint::where("beneficiaire_id",$beneficiaire->id)->value('prenom')}}"
                                                            data-rhesus="{{$beneficiaire->reshus}}"
                                                            data-rhesus_conjoint="{{$beneficiaire->conjoint_reshus}}"
                                                            data-ptme="{{$beneficiaire->ptme}}"
                                                            data-date_regle="{{$beneficiaire->dateRegle}}"
                                                            data-duree_grossesse="{{$beneficiaire->dureeGrossese}}"
                                                            data-date_prochainecpn="{{date_format(date_create(\App\CPN_Suivi::where("beneficiaire_id",$beneficiaire->id)->value('dateProchaineCPN')),"d/m/Y")}}"
                                                            data-nb_echo="{{$beneficiaire->nbEcho}}"
                                                            data-nb_cpn="{{\App\CPN_Suivi::where("beneficiaire_id",$beneficiaire->id)->value('nb_cpn')}}"
                                                            data-maladie_grave="{{$antecedant->maladieGrave}}"
                                                            data-maladie_info="{{$antecedant->maladieInfo}}"
                                                            data-operation="{{$antecedant->operation}}"
                                                            data-operation_info="{{$antecedant->operationInfo}}"
                                                            data-obstetrical="{{$antecedant->obstetrical}}"
                                                            data-cesarienne="{{$antecedant->cesarienne}}"
                                                            data-cesarienne_info="{{$antecedant->cesarienneInfo}}"
                                                            data-date_operation="{{$antecedant->dateOperation}}"
                                                            data-traitement_str="{{$antecedant->traitementStr}}"
                                                            data-operation_uterus="{{$antecedant->operationUterus}}"
                                                            data-operation_uterusInfo="{{$antecedant->operationUterusInfo}}"
                                                            data-vat="{{$antecedant->vat}}"
                                                            data-selle_kop="{{$antecedant->selleKOP}}"
                                                            data-commentaire="{{$antecedant->commentaire}}"
                                                            data-score="{{$commentaire_analyses->score}}"
                                                            data-facteur_risque="{{$commentaire_analyses->facteurRisque}}"
                                                            data-decision="{{$commentaire_analyses->decision}}"
                                                            data-reference_lieu="{{$commentaire_analyses->referenceLieu}}"
                                                        >
                                                            <span style="color: deepskyblue">Modifier</span>
                                                        </button>
                                                    </div>
                                                @endif

                                            </div>

                                            <div><br/></div>
                                            <table id="infoGene"
                                                   class="table table-bordered table-condensed table-striped"
                                                   cellspacing="0">

                                                <tbody>

                                                <tr>
                                                    <td colspan="2" style="text-align: center;"><b
                                                            style="font-size: 20px;">Informations générales</b></td>
                                                </tr>

                                                <tr>
                                                    <td><b>Numéro carnet</b></td>
                                                    <td>{{$beneficiaire->num_carnet}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Code du bénéficiaire</b></td>
                                                    <td>{{$beneficiaire->code}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Nom du bénéficiaire</b></td>
                                                    <td>{{$beneficiaire->nom}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Prénom du bénéficiaire</b></td>
                                                    <td>{{$beneficiaire->prenom}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Numéro Téléphone</b></td>
                                                    <td>{{$beneficiaire->telephone}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Date de naissance</b></td>
                                                    <td>{{date_format(date_create($beneficiaire->dateNaissance),"d M Y")}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Taille</b></td>
                                                    <td>{{$beneficiaire->taille}}</td>
                                                </tr>

                                                @if($beneficiaire->quartier_id != null)
                                                    <tr>
                                                        <td><b>Quartier</b></td>
                                                        <td>{{\App\Quartier::where("id", $beneficiaire->quartier_id)->first()->libelle}}</td>
                                                    </tr>
                                                @endif

                                                @if($beneficiaire->region_id != null)
                                                    <tr>
                                                        <td><b>Région</b></td>
                                                        <td>{{\App\Region::where("id", $beneficiaire->region_id)->first()->libelle}}</td>
                                                    </tr>
                                                @endif

                                                @if(\App\LanguePreference::where("beneficiaire_id",$beneficiaire->id )->first() != null)
                                                    <tr>
                                                        <td><b>Langue de préférence</b></td>
                                                        <td>{{\App\LanguePreference::where("beneficiaire_id",$beneficiaire->id )->first()->libelle}}</td>
                                                    </tr>
                                                @endif

                                                <tr>
                                                    <td><b>Patient PTME</b></td>
                                                    <td>@if($beneficiaire->ptme) OUI @else  NON @endif</td>
                                                </tr>

                                                @if($beneficiaire->haveConjoint)
                                                    <span
                                                        style="display: none">{{$conjoint = \App\Conjoint::where("beneficiaire_id",$beneficiaire->id)->first()}}</span>
                                                    <b>Information du conjoint</b>
                                                    <tr>
                                                        <td><b>Nom conjoint</b></td>
                                                        <td>{{$conjoint->nom}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Prénoms conjoint</b></td>
                                                        <td>{{$conjoint->prenom}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Telephone conjoint</b></td>
                                                        <td>{{$conjoint->telephone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Reshus conjoint</b></td>
                                                        <td>{{$conjoint->conjoint_reshus}}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td><b>Information sur le conjoint</b></td>
                                                        <td>Nom fournie</td>
                                                    </tr>
                                                @endif

                                                <tr>
                                                    <td colspan="2" style="text-align: center;"><b
                                                            style="font-size: 20px;">Information sur la grossesse</b>
                                                    </td>
                                                </tr>
                                                <span
                                                    style="display: none">{{$cpn = \App\CPN_Suivi::where("beneficiaire_id",$beneficiaire->id)->first()}}</span>
                                                <tr>
                                                    <td><b>Date dernière règle</b></td>
                                                    <td>{{date_format(date_create($beneficiaire->dateRegle),"d M Y")}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Nombre CPN</b></td>
                                                    <td>{{$cpn->nb_cpn}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Date prochaine CPN</b></td>
                                                    <td>{{date_format(date_create($cpn->dateProchaineCPN),"d M Y")}}</td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <table style="display: none;" id="infoAnte"
                                                   class="table table-bordered table-condensed table-striped"
                                                   cellspacing="0">

                                                <tbody>

                                                <tr>
                                                    <td colspan="2" style="text-align: center;"><b
                                                            style="font-size: 20px;">Informations sur les
                                                            antécédents</b></td>
                                                </tr>

                                                <tr>
                                                    <td><b>A une maladie grave</b></td>
                                                    <td>@if($antecedant->maladieGrave) OUI @else NON @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Information sur la maladie</b></td>
                                                    <td>@if($antecedant->maladieInfo != null) {{$antecedant->maladieInfo}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>A subit une opération</b></td>
                                                    <td>@if($antecedant->operation) OUI @else NON @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Information sur l'opération</b></td>
                                                    <td>@if($antecedant->operationInfo != null) {{$antecedant->operationInfo}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Antécédant Obstétrical</b></td>
                                                    <td>@if($antecedant->obstetrical != null) {{$antecedant->obstetrical}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>A subit césarienne</b></td>
                                                    <td>@if($antecedant->cesarienne) OUI @else NON @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Information sur la césarienne</b></td>
                                                    <td>@if($antecedant->cesarienneInfo != null) {{$antecedant->cesarienneInfo}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Date de opération</b></td>
                                                    <td>@if($antecedant->dateOperation != null) {{date_format(date_create($antecedant->dateOperation),"d M Y")}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Traitement de stérilité</b></td>
                                                    <td>@if($antecedant->traitementStr) OUI @else NON @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Opération sur l'utérus</b></td>
                                                    <td>@if($antecedant->operationUterus) OUI @else NON @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Information sur l'opération</b></td>
                                                    <td>@if($antecedant->operationUterusInfo != null) {{$antecedant->operationUterusInfo}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>VAT</b></td>
                                                    <td>{{$antecedant->vat}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Selle KOP</b></td>
                                                    <td>@if($antecedant->selleKOP != null) {{$antecedant->selleKOP}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Commentaire</b></td>
                                                    <td>@if($antecedant->commentaire != null) {{$antecedant->commentaire}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="text-align: center;"><b
                                                            style="font-size: 20px;">Informations sur la consultation
                                                            prénatale</b></td>
                                                </tr>

                                                <tr>
                                                    <td><b>Score obtenue</b></td>
                                                    <td>@if($commentaire_analyses->score != null) {{$commentaire_analyses->score}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Facteurs de risques retrouvés</b></td>
                                                    <td>@if($commentaire_analyses->facteurRisque != null) {{$commentaire_analyses->facteurRisque}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Decision</b></td>
                                                    <td>@if($commentaire_analyses->decision != null) {{$commentaire_analyses->decision}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Reference, Lieu</b></td>
                                                    <td>@if($commentaire_analyses->referenceLieu != null) {{$commentaire_analyses->referenceLieu}} @else
                                                            Pas d'information @endif</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="modal fade" id="infos">
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
                                <input type="hidden" name="id" id="id"/>

                                <div id="form1" style="display: block; margin: 20px;">
                                    <p style="margin-bottom: 50px; margin-top: 20px;">
                                                        <span
                                                            style="border-radius: 25px; background: #00b0e8; padding: 10px; width: 40px; height: 40px;">Informations générales</span>
                                    </p>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Numéro du carnet
                                                    CPN</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" required type="text"
                                                           name="numCarnet" id="num_carnet"
                                                           value="{{$beneficiaire->num_carnet}}" readonly
                                                           placeholder="Numéro Carnet CPN"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Nom</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="nom" name="name"
                                                           required
                                                           placeholder="Saisir le nom de Famille"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Prénoms</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           name="prenom" id="prenom"
                                                           required placeholder="Saisir le prénoms"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" id="dateNaiss">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Date
                                                    Naissance</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control"
                                                           name="dateNaissance" max="{{date("Y-m-d")}}"
                                                           id="dateNaissance"
                                                           placeholder="Séléctionner la date"
                                                           type="text" onfocus="(this.type='date')"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Date Naissance et Téléphone -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Téléphone</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           name="telephone" id="telephone"
                                                           required
                                                           placeholder="Saisir le numéro de téléphone"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Réshus</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="reshus" id="rhesus" required>
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

                                    <!-- Quartier et langue de préférence -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Quartier</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="quartier" id="quartier"
                                                            required>
                                                        <option selected disabled="true">Sélectionner le
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
                                                <label class="control-label col-sm-3">Taille</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="number"
                                                           name="taille" required id="taille"
                                                           placeholder="Saisir la taille"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Langue de
                                                    préférence</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="langue" id="langue" required>
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
                                                            id="haveConjoint" required>
                                                        <option selected disabled="true">Sélectionner
                                                            votre
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
                                                           name="telephoneConjoint" id="telephoneConjoint"
                                                           placeholder="Saisir le téléphone"/>
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
                                                               name="nomConjoint" id="nomConjoint"
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
                                                               name="prenomConjoint" id="prenomConjoint"
                                                               placeholder="Prénom du conjoint"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="control-label col-sm-3">Réshus du
                                                        conjoint</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control"
                                                                name="conjointReshus"
                                                                id="rhesus_conjoint"
                                                                >
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
                                                    PTME</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" required
                                                            name="typePatient" id="ptme">
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
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="control-label col-sm-3">CPN à
                                                        faire</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control"
                                                                name="cpn" id="nb_cpn">
                                                            <option selected disabled="true">
                                                                Sélectionner le
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
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="control-label col-sm-3">CPN à
                                                        faire</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control"
                                                                name="cpn" id="nb_cpn">
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
                                                        règle</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" required type="date"
                                                               name="dateRegle" max="{{date("Y-m-d")}}"
                                                               id="dateRegle"
                                                               placeholder="Date dernière règle"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="control-label col-sm-3">Âge de la
                                                        grossesse</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" required
                                                               name="dureeGrossesse" id="dureeGrossese"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="control-label col-sm-3">Date Prochaine
                                                        CPN</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" required
                                                               min="{{date("Y-m-d")}}"
                                                               type="text" onfocus="(this.type='date')"
                                                               name="dateNextCPN1" id="dateprochainecpn"
                                                               placeholder="Date Prochaine CPN"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                        </div>
                                    </div>
                                    <!-- CPN field end -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3">Nombre ECHO
                                                    réalisé</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="nbEcho" id="nbEcho"
                                                            required>
                                                        <option selected disabled="true">Sélectionner le
                                                            nombre d'échographie
                                                        </option>
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

                                <div id="form2" style="display: none;  margin: 20px;">
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
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text"
                                                           name="maladieInfo"
                                                           id="maladieInfo"
                                                           placeholder="Information sur la maladie"
                                                           style="display: none;"/>
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
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text"
                                                               name="operationInfo"
                                                               id="operationInfo"
                                                               placeholder="Information sur l'opération"
                                                               style="display: none;"/>
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
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text"
                                                               name="cesarienneInfo"
                                                               id="cesarienneInfo"
                                                               placeholder="Cause de la césarienne"
                                                               style="display: none;"/>
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
                                                    de l'opération</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control"
                                                           name="dateOperation" max="{{date("Y-m-d")}}"
                                                           id="dateOperation"
                                                           placeholder="Séléctionner la date"
                                                           type="text" onfocus="(this.type='date')"
                                                    />
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
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text"
                                                               name="operationUterusInfo"
                                                               id="operationUterusInfo"
                                                               placeholder="Information sur l'opération"
                                                               style="display: none;"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span style="font-size: 18px;">VAT</span>
                                            <div class="form-group row" style="margin-top: 10px;">
                                                <label class="control-label col-sm-3">Dose de
                                                    VAT</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="vat" id="vat"
                                                            required>
                                                        <option selected disabled="true">Sélectionner la
                                                            dose de vat
                                                        </option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <span style="font-size: 18px;">Selles KOP</span>
                                            <div class="form-group row" style="margin-top: 10px;">
                                                <label class="col-sm-3">Résultat</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           name="selleKOP"
                                                           id="selleKOP"
                                                           placeholder="Information sur l'opération"/>
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

                                <div id="form3" style="display: none;  margin: 20px;">
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
                                                        <label class="col-sm-6">Utérus cicatriciel ou césarienne</label>
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
                                                           placeholder="Score obtenu" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row" style="margin-top: 10px;">
                                                <label class="col-sm-3">Facteurs de risque retrouvés</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           name="facteurRisque"
                                                           id="facteurRisque"
                                                           required
                                                           placeholder="Les facteurs de risque"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row" style="margin-top: 10px;">
                                                <label class="col-sm-3">Reference, lieu</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           name="referenceLieu"
                                                           id="referenceLieu"
                                                           required
                                                           placeholder="Réference et lieu"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row" style="margin-top: 10px;">
                                                <label class="col-sm-3">Decision</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           name="decision"
                                                           id="decision"
                                                           required
                                                           placeholder="Commentaires suite aux analyses"/>
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
                                                <button id="saveButton" type="submit"
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

        $("#buttonSuivant").on("click", function () {
            document.getElementById("form1").style.display = "none";
            document.getElementById("form2").style.display = "block";
            document.getElementById("form3").style.display = "none";
        });
        $("#btnPrecedent").on("click", function () {
            document.getElementById("form1").style.display = "block";
            document.getElementById("form2").style.display = "none";
            document.getElementById("form3").style.display = "none";
        });
        $("#buttonSuivant1").on("click", function () {
            document.getElementById("form1").style.display = "none";
            document.getElementById("form2").style.display = "none";
            document.getElementById("form3").style.display = "block";
        });
        $("#btnPrecedent1").on("click", function () {
            document.getElementById("form1").style.display = "none";
            document.getElementById("form2").style.display = "block";
            document.getElementById("form3").style.display = "none";
        });

        $('#infos').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var num_carnet = $(e.relatedTarget).data('num_carnet');
            var nom = $(e.relatedTarget).data('nom');
            var prenom = $(e.relatedTarget).data('prenom');
            var taille = $(e.relatedTarget).data('taille');
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
            var maladieGrave = $(e.relatedTarget).data('maladie_grave');
            var maladieInfo = $(e.relatedTarget).data('maladie_info');
            var operation = $(e.relatedTarget).data('operation');
            var operationInfo = $(e.relatedTarget).data('operation_info');
            var obstetrical = $(e.relatedTarget).data('obstetrical');
            var cesarienne = $(e.relatedTarget).data('cesarienne');
            var cesarienneInfo = $(e.relatedTarget).data('cesarienne_info');
            var dateOperation = $(e.relatedTarget).data('dateOperation');
            var traitementStr = $(e.relatedTarget).data('traitement_str');
            var operationUterus = $(e.relatedTarget).data('operation_uterus');
            var operationUterusInfo = $(e.relatedTarget).data('operation_uterus_info');
            var vat = $(e.relatedTarget).data('vat');
            var selleKOP = $(e.relatedTarget).data('selle_kop');
            var commentaire = $(e.relatedTarget).data('commentaire');
            var score = $(e.relatedTarget).data('score');
            var facteurRisque = $(e.relatedTarget).data('facteur_risque');
            var decision = $(e.relatedTarget).data('decision');
            var referenceLieu = $(e.relatedTarget).data('reference_lieu');
            $('#id').val(id);
            $('#num_carnet').val(num_carnet);
            $('#prenom').val(prenom);
            $('#nom').val(nom);
            $('#dateNaissance').val(dateNaissance);
            $('#telephone').val(telephone);
            $('#rhesus').val(rhesus);
            $('#quartier').val(quartier);
            $('#langue').val(`${langue}`);
            $('#taille').val(taille);
            if (haveConjoint === 1) {
                $('#haveConjoint').val("1");
            } else {
                $('#haveConjoint').val("0");
            }
            $('#telephoneConjoint').val(telephoneConjoint);
            $('#nomConjoint').val(nomConjoint);
            $('#prenomConjoint').val(prenomConjoint);
            $('#rhesus_conjoint').val(rhesus_conjoint);
            if (ptme === 1) {
                $('#ptme').val('1');
            } else {
                $('#ptme').val('0');
            }
            switch (nb_cpn) {
                case 1:
                    $('#nb_cpn').val("1");
                    break;
                case 2:
                    $('#nb_cpn').val("2");
                    break;
                case 3:
                    $('#nb_cpn').val("3");
                    break;
                case 4:
                    $('#nb_cpn').val("4");
                    break;
                case 5:
                    $('#nb_cpn').val("5");
                    break;
                case 6:
                    $('#nb_cpn').val("6");
                    break;
                case 7:
                    $('#nb_cpn').val("7");
                    break;
                case 8:
                    $('#nb_cpn').val("8");
                    break;
            }
            $('#dateRegle').val(dateRegle);
            $('#dateprochainecpn').val(dateProchaineCpn);
            diff_in_week(dateRegle);
            if (nbreSemaine > 41) {
                $("#dureeGrossese").css("color", "red");
                $("#saveButton").prop("disabled", true);
            } else {
                $("#dureeGrossese").css("color", "blue");
                $("#saveButton").prop("disabled", false);
            }
            //$("#dureeGrossese").val(nbreSemaine);
            $("#dureeGrossese").val(nbreSemaine + " Semaines");
            switch (nbEcho) {
                case 0:
                    $('#nbEcho').val("0");
                    break;
                case 1:
                    $('#nbEcho').val("1");
                    break;
                case 2:
                    $('#nbEcho').val("2");
                    break;
                case 3:
                    $('#nbEcho').val("3");
                    break;
            }

            if (maladieGrave === 1) {
                $('#maladieGrave').val('1');
            } else {
                $('#maladieGrave').val('0');
            }
            $("#maladieInfo").val(maladieInfo);
            if (operation === 1) {
                $('#operation').val('1');
            } else {
                $('#operation').val('0');
            }
            $("#operationInfo").val(operationInfo);
            $("#obstetrical").val(obstetrical);
            if (cesarienne === 1) {
                $('#cesarienne').val('1');
            } else {
                $('#cesarienne').val('0');
            }
            $("#cesarienneInfo").val(cesarienneInfo);
            $("#dateOperation").val(dateOperation);
            if (traitementStr === 1) {
                $('#traitementStr').val('1');
            } else {
                $('#traitementStr').val('0');
            }
            if (operationUterus === 1) {
                $('#operationUterus').val('1');
            } else {
                $('#operationUterus').val('0');
            }
            $("#operationUterusInfo").val(operationUterusInfo);
            $("#vat").val(vat);
            $("#selleKOP").val(selleKOP);
            $("#commentaire").val(commentaire);
            $("#score").val(score);
            $("#facteurRisque").val(facteurRisque);
            $("#decision").val(decision);
            $("#referenceLieu").val(referenceLieu);
            var nbreSemaine = 0;
            $("#haveConjoint").on("change", function () {

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
        });

        var score = 0;

        function incrementScrore(point) {
            $("#score").val(score+=point);
        }

        function decrementScrore(point) {
            $("#score").val(score-=point);
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

        $("#swipeBtn").on("click", function () {
            var elem = document.getElementById('swipeBtn');
            if (elem.textContent == "Suivant") {
                elem.textContent = "Précédant";
                document.getElementById("infoGene").style.display = "none";
                document.getElementById("infoAnte").style.display = "table";
            } else {
                elem.textContent = "Suivant";
                document.getElementById("infoGene").style.display = "table";
                document.getElementById("infoAnte").style.display = "none";
            }
        });

    </script>
@endsection
