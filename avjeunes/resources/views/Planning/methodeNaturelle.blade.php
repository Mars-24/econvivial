@extends("Template.mainTemplate")


@section("title")
    Conseils pratiques | Planning famillial
@endsection


@section("body")

    <style type="text/css">
        .widget-card-1{
            height: 220px;
        }
    </style>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.nav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.sideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="#" data-toggle="modal" data-target="#modalAbstinence">
                                        <i class="icofont icofont-ui-home bg-c-blue card1-icon ">
                                            {{--<img src="images/icons/consultation.png" alt="No image" />--}}
                                            <span class="fa fa-female"></span>
                                        </i>
                                        <span class="text-c-blue f-w-600">L’abstinence</span>
                                        <h4></h4>
                                        <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Dans cette méthode l’homme et la femme n’ont aucun rapport sexuel ...
                    </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="#" data-toggle="modal" data-target="#modalTemperature">
                                        <i class="icofont icofont-warning-alt bg-c-green card1-icon">

                                        </i>
                                        <span class="text-c-green f-w-600">La méthode de <br/> température</span>
                                        <h4></h4>
                                        <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="icofont icofont-ui-home text-c-green card1-icon">
                        {{--<img  class="fa fa-stethoscope" src="images/icons/planning.png" alt="No image" />--}}
                          <span class="fa  fa-fire"></span>
                      </i>Sachant que la température du corps diminue de 0,5°C avant l’ovulation et augmente de 0,2 à 0,5° C au moment de l’ovulation, la femme doit prendre sa température chaque matin au réveil ...
                    </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="#" data-toggle="modal" data-target="#modalTemperature">
                                        <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                                        <span class="text-c-yellow f-w-600">La méthode de la glaire cervicale </span>
                                        <h4></h4>
                                        <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="card1-icon text-c-yellow  icofont icofont-ui-home">
                        <span class="fa fa-minus-square"></span>
                      </i>• Dans l’application de cette méthode, la femme doit tâter sa glaire chaque matin au réveil. Elle doit éviter des rapports sexuels dès qu’elle constate que la glaire est ...
                    </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->

                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="#" data-toggle="modal" data-target="#modalJourFixe">
                                        <i class="icofont icofont-pie-chart   bg-c-pink card1-icon">
                                            <span class="fa  fa-paw"></span>
                                        </i>
                                        <span class=" text-c-pink f-w-600">La méthode des jours <br/> fixes (MJF)ou Cllier</span>
                                        <h4></h4>
                                        <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                    La méthode des jours fixes (MJF) appelée collier du cycle est une méthode naturelle basée sur la connaissance du cycle menstruel ...

                    </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 col-xl-12">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="#" data-toggle="modal" data-target="#modalAllaitement">
                                        <i class="icofont icofont-pie-chart bg-viber card1-icon">
                                            <span class="fa  fa-rocket "></span>
                                        </i>
                                        <span class="text-viber f-w-600">La méthode d’Allaitement Maternel et de l’Aménorrhée (MAMA)</span>
                                        <h4></h4>
                                        <div style="float: right;">
                    <span class="f-left m-t-12 text-muted">
                      <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                      <ul>
                          <li> L’enfant soit âgé de moins de 6 mois,</li>
                          <li> La mère n’ait pas encore vu ses règles depuis l’accouchement</li>
                          <li> L’allaitement soit exclusif, à la demande, y compris la nuit.</li>
                          <li> Si ces trois conditions sont réunies la mère n’a pas besoin d’une autre méthode contraceptive.</li>
                      </ul>
                    </span>
                                        </div>
                                    </a>
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

@include("Planning.natural.abstinence")
@include("Planning.natural.temperature")
@include("Planning.natural.glaire")
@include("Planning.natural.jourFixe")
@include("Planning.natural.allaitement")



    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            appendRessource("16");
            appendRessource("17");
            appendRessource("18");
            appendRessource("19");
            appendRessource("20");
        });

        function submitSouscription(){

        }

        function appendRessource(ressourceID){
            //   if( $('#'+ressourceID).is(':empty') ) {
            $("#" + ressourceID).append(' <div class="col-sm-12"  >\n' +
                '                                <form action=""  method="POST">\n' +
                '                                    <div class="row">\n' +
                '                                        <div class="col-md-6">\n' +
                '                                            <div class="form-group row">\n' +
                '                                                <label class="col-sm-3 col-form-label">Date contraception</label>\n' +
                '                                                <div class="col-sm-9">\n' +
                '                                                    <input class="form-control" type="date" id="dateContraception' + ressourceID + '" name="dateContraception' + ressourceID + '" placeholder="Date de la contraception" required />\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '\n' +
                '                                        <div class="col-md-6">\n' +
                '                                            <div class="form-group row">\n' +
                '                                                <label class="col-sm-3 col-form-label">Durée contraception</label>\n' +
                '                                                <div class="col-sm-9">\n' +
                '                                                    <select class="form-control" name="duree' + ressourceID + '"  id="duree'+ressourceID +'" required>\n' +
                '                                                        <option disabled selected>Sélectionnez la durée</option>\n' +
                '                                                        <option value="3 mois">3 mois</option>\n' +
                '                                                        <option value="6 mois">6 mois</option>\n' +
                '                                                        <option value="2 ans">2 ans</option>\n' +
                '                                                        <option value="5 ans">5 ans</option>\n' +
                '                                                    </select>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="col-md-12" style="margin-bottom: 10px;">\n' +
                '                                        <div class="row justify-content-center">\n' +
                '                                            <button style="margin-top: 20px;"\n' +
                '                                                    type="button"   onclick="souscrire('+ressourceID+')" \n ' +

                '                                                    id="souscrire' + ressourceID + '"\n' +
                '                                                    class="btn btn-outline-primary btn-rounded playButton justify-content-center">Souscrire</button>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </form>\n' +
                '                            </div>');
            //    }
        }

        function souscrire(ressourceID){
            $("#souscrire"+ressourceID).prop("disabled", true);
            if($("#dateContraception"+ressourceID).val().length === 0 ){
                alert("Veuillez remplir tous les champs");
            } else if ($("#duree"+ressourceID).val().length === 0){
                alert("Veuillez remplir tous les champs");
            }else{
                var duree = $("#duree"+ressourceID).val();
                var date = $("#dateContraception"+ressourceID).val() ;

                $.ajax({
                    type : "POST",
                    url:"{{route('save-planning-souscription')}}",
                    data:{
                        '_token': '{{Session::token()}}',
                        'duree': duree,
                        'date': date,
                        'planning': ressourceID,
                        'methode': "naturelle",
                    },
                    success: function(data){
                        if(data === "success"){
                            alert("Souscription effectuée avec succès");
                        }else{
                            alert("Vous avez déjà souscris à ce planning");
                        }
                    },
                    error :function(data){
                        $("#souscrire"+ressourceID).prop("disabled", false);
                        alert("Une erreur s'est produite, veuillez réessayer.")
                    }
                });
            }
        }
    </script>


@endsection