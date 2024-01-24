@extends("Template.mainTemplate")


@section("title")
Planning famillial | Méthode Moderne
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
                <a href="#" data-toggle="modal" data-target="#modalCondomMasculin">
                  <i class="icofont icofont-ui-home bg-c-blue card1-icon ">
                    {{--<img src="images/icons/consultation.png" alt="No image" />--}}
                    <span class="fa  fa-spoon"></span>
                  </i>
                  <span class="text-c-blue f-w-600">Condom masculin ou <br/> capote </span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>
                      C’est une mince enveloppe en caoutchouc ou produit naturel qu’on place sur le pénis en érection avant les rapports sexuels pour empêcher le sperme d’être en contact avec les voies génitales de la femme ...
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
                <a href="#" data-toggle="modal" data-target="#modalCondomFeminin">
                  <i class="icofont icofont-warning-alt bg-c-green card1-icon">

                  </i>
                  <span class="text-c-green f-w-600">Le condom féminin</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="icofont icofont-ui-home text-c-green card1-icon">
                        {{--<img  class="fa fa-stethoscope" src="images/icons/planning.png" alt="No image" />--}}
                        <span class="fa  fa-star-half-empty "></span>
                      </i>
                      Le condom féminin est une méthode de barrière pour se protéger des IST/VIH/SIDA et des grossesses non désirées ...
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
                <a href="#" data-toggle="modal" data-target="#modalPillule">
                  <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                  <span class="text-c-yellow f-w-600">Les pilules</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="card1-icon text-c-yellow  icofont icofont-ui-home">
                        <span class="fa fa-shield"></span>
                      </i>
                      <p><b> La pilule combinée </b>
C’est un comprimé composé de deux hormones (la progestérone et l’oestrogène).
</p>

              <p>
               <b> La pilule progestative </b>

C’est un comprimé composé uniquement de progestérone.

              </p>
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
                <a href="#" data-toggle="modal" data-target="#modalInjectable">
                  <i class="icofont icofont-pie-chart   bg-c-pink card1-icon">
                    <span class="fa  fa-magic"></span>
                  </i>
                  <span class=" text-c-pink f-w-600">Les contraceptifs <br/> injectables</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                     Ce sont des produits liquides contenant de la progestérone, destinés à être administrés dans l’organisme de la femme pour empêcher la survenue d’une grossesse ...

                    </span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalNorplan">
                  <i class="icofont icofont-pie-chart bg-viber card1-icon">
                    <span class="fa fa-gg-circle "></span>
                  </i>
                  <span class="text-viber f-w-600">Le Norplant</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                      C’est une méthode contraceptive composée de capsules fines et flexibles remplies de lévonorgestrel (progestérone). Il existe trois types de norplant  ...
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
                <a href="#" data-toggle="modal" data-target="#modalDIU">
                  <i class="icofont icofont-ui-home bg-c-yellow card1-icon">
                    {{--<img src="images/icons/assistance.png" style="color: orange;" alt="No image" />--}}
                    <span class="fa fa-toggle-up "></span>
                  </i>
                  <span class="text-c-yellow f-w-600">Le dispositif <br/>intra-utérin (DIU)</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>
                      C’est un petit appareil qu’on introduit dans la cavité de l’utérus pour éviter la grossesse. On l’appelle également stérilet ...
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
              <a href="">
                <div class="card-block-small">
                  <a href="#" data-toggle="modal" data-target="#modalLigature">
                    <i class="icofont icofont-warning-alt bg-googleplus card1-icon">
                      <span class="fa  fa-times-circle-o"></span>
                    </i>
                    <span class="text-googleplus f-w-600">La ligature de trompes</span>
                    <h4></h4>
                    <div>
                      <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                        C’est une technique qui consiste à fermer les deux trompes par ligature et section pour empêcher les spermatozoïdes d’atteindre l’ovule et l’ovule de rencontrer les spermatozoïdes ...
                      </span>
                    </div>
                  </a>
                </div>
              </a>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalObstruction">
                  <i class="icofont icofont-social-twitter bg-instagram card1-icon">
                    <span class="fa  fa-tree"></span>
                  </i>
                  <span class="text-instagram f-w-600">L’obstruction des <br/> trompes </span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10 card1-icon">
                        {{--<img src="images/icons/agenda.png" style="color: orange;" alt="No image" />--}}

                      </i>
                      Avec les nouvelles technologies une autre méthode consiste à poser des clips pour obstruer les trompes le plus près possible de l’utérus. Cette technique a l’avantage ...
                    </span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- card1 end -->
        </div>



                <div class="row" style="margin-bottom: 30px;">
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalVasectomie">
                  <i class="icofont icofont-pie-chart bg-viber card1-icon">
                    <span class="fa  fa-lemon-o"></span>
                  </i>
                  <span class="text-viber f-w-600">La vasectomie</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                      C’est une technique qui consiste à fermer les deux canaux déférents par ligature et section pour empêcher le passage des spermatozoïdes vers les vésicules séminales ...
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
                <a href="#" data-toggle="modal" data-target="#modalContraception">
                  <i class="icofont icofont-ui-home bg-c-yellow card1-icon">
                    {{--<img src="images/icons/assistance.png" style="color: orange;" alt="No image" />--}}
                    <span class="fa  fa-level-down"></span>
                  </i>
                  <span class="text-c-yellow f-w-600">La contraception d’urgence</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>
                      La contraception d’urgence est l’administration d’une méthode contraceptive suite à un rapport sexuel non protégé à une période du cycle où le risque de survenue d’une grossesse non désirée est élevé (période de fécondité)  ...
                    </span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <!-- card1 end -->
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

  @include("Planning.moderne.condomMasculin")
  @include("Planning.moderne.condomFeminin")
  @include("Planning.moderne.pillule")
  @include("Planning.moderne.injectable")
  @include("Planning.moderne.norplan")
  @include("Planning.moderne.diu")
  @include("Planning.moderne.ligature")
  @include("Planning.moderne.obstruction")
  @include("Planning.moderne.vasectomie")
  @include("Planning.moderne.contraception")



<script src="js/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        appendRessource("6");
        appendRessource("7");
        appendRessource("8");
        appendRessource("9");
        appendRessource("10");
        appendRessource("11");
        appendRessource("12");
        appendRessource("13");
        appendRessource("14");
        appendRessource("15");
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
                    'methode': "moderne"
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