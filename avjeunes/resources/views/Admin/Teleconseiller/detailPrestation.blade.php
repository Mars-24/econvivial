@extends("Template.otherTemplate")


@section("title")
    Détail de prestation téléconseiller
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-body" id="fiche">
                                    <button type="button" class="btn btn-outline-success" style="margin-left: 45px;" id="print" onclick="printContent('fiche')">Imprimer</button>
                                    <a href="javascript:history.go(-1)" id="retour" class="btn btn-outline-danger" style="margin-left: 45px;"  >Retour</a>
                                    <h3 class="card-title" style="text-align: center;margin-top: 30px;"><u>Détail de la fiche de présence du {{date_format(date_create($presence->created_at), "d M Y")}}</u></h3>
                                    <div class="row" style="padding: 45px;">
                                        <div class="col-sm-12">


                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nom</label>
                                                        <div class="col-sm-9" style="margin-top: 12px;">
                                                            <label><b >{{$presence->nom}}</b></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6" style="float: right;text-align: right;">
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label">Date et heure arrivé</label>
                                                        <div class="col-sm-6" style="margin-top: 12px;">
                                                            <label><b>{{$presence->created_at}}</b></label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Prénom</label>
                                                        <div class="col-sm-9" style="margin-top: 12px;">
                                                            <label><b >{{$presence->prenom}}</b></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6" style="float: right;text-align: right;">
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label">Date et heure départ</label>
                                                        <div class="col-sm-6" style="margin-top: 12px;">
                                                            <label><b>{{$presence->heureDepart}}</b></label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Fonction</label>
                                                        <div class="col-sm-9" style="margin-top: 12px;">
                                                            <label><b >{{$presence->fonction}}</b></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6" style="float: right; text-align: right;">
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label">Période</label>
                                                        <div class="col-sm-6" style="margin-top: 12px;">
                                                            <label><b >{{$presence->periode}}</b></label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <table  class="table table-bordered table-condensed table" cellspacing="0">

                                                <thead>
                                                    <th>Intitulé prestation</th>
                                                    <th>Sexe Masculin</th>
                                                    <th>Sexe Féminin</th>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td><b>Nombre de personnes reçu :</b></td>
                                                        <td><b>{{$presence->recuMasculin}}</b></td>
                                                        <td><b>{{$presence->recuFeminin}}</b></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Nombre de personnes conseillées :</b></td>
                                                        <td><b>{{$presence->conseillerMasculin}}</b></td>
                                                        <td><b>{{$presence->conseillerFeminin}}</b></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Nombre de personnes référées :</b></td>
                                                        <td><b>{{$presence->refererMasculin}}</b></td>
                                                        <td><b>{{$presence->refererFeminin}}</b></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Nombre d’incidents survenu au cours de votre journée :</b></td>
                                                        <td colspan="2"><b>{{$presence->incident}}</b></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Commentaire :</b></td>
                                                        <td colspan="2"><b>{{$presence->commentaire}}</b></td>
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

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script>
        function printContent(id){
           $("#print").hide();
           $("#retour").hide();
            var restorepage = document.body.innerHTML;
            var printContent = document.getElementById(id).innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = restorepage;
            $("#print").show();
            $("#retour").show();
        }
    </script>
@endsection