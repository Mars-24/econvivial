<html>

<head>
    <title>Bénéficiaire</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 1.5cm;
            margin-bottom: 20px;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        }
    </style>

</head>

<body>
<header>
    <div style="
            margin-bottom: 200px;">
        Centre de santé : {{$formation}}
    </div>
</header>

<div>
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

        <span
            style="display: none">{{$conjoint = \App\Conjoint::where("beneficiaire_id",$beneficiaire->id)->first()}}</span>
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

    <table id="infoAnte"
           class="table table-bordered table-condensed table-striped"
           cellspacing="0">

        <tbody>

        <tr>
            <td colspan="2" style="text-align: center;"><b
                    style="font-size: 20px;">Informations sur les
                    antécédents</b></td>
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

<footer class="footer">

    <div class="container">
        <p class="text-center">Copyright @2021 | Par le ministère de la Santé <a href="#">eConvivial CPN
                / {{$formation}}</a></p>
    </div>

</footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<!-- Footer -->
</body>
</html>
