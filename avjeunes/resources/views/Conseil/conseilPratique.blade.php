@extends("Template.mainTemplate")


@section("title")
Conseils pratiques
@endsection


@section("body")

<style type="text/css">
.widget-card-1{
  height: 250px;
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
                <a href="#" data-toggle="modal" data-target="#modalIST">
                  <i class="icofont icofont-ui-home bg-c-blue card1-icon ">
                    {{--<img src="images/icons/consultation.png" alt="No image" />--}}
                    <span class="fa fa-stethoscope"></span>
                  </i>
                  <span class="text-c-blue f-w-600"> IST</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>C'est une contamination/contraction de microbes pathogènes lors des rapports sexuels non protégés avec un partenaire infecté. ...
                    </span>
                  </div>
                </a>
               <p style="float: bottom;">

                <div class="text-center">
                  <button  class="btn btn-primary" onclick="module1()" style="margin-top: 10px; float: bottom;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
               </p>
              </div>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalVIH">
                  <i class="icofont icofont-warning-alt bg-c-green card1-icon">

                  </i>
                  <span class="text-c-green f-w-600">VIH / SIDA</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="icofont icofont-ui-home text-c-green card1-icon">
                        {{--<img  class="fa fa-stethoscope" src="images/icons/planning.png" alt="No image" />--}}
                        <span class="fa  fa-tint"></span>
                      </i>Le Sida (maladie) est un ensemble de signes dû à la destruction du système immunitaire par le VIH (virus). Une personne infectée par le VIH peut développer les IO ...
                    </span>
                  </div>
                </a>
                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-success" onclick="module2()" style="margin: 10px;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>
              </div>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalDepistage" >
                  <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                  <span class="text-c-yellow f-w-600">Le dépistage volontaire <br/>du VIH </span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="card1-icon text-c-yellow  icofont icofont-ui-home">
                        <span class="fa fa-female"></span>
                      </i>Le test de dépistage est une analyse de sang qui permet de connaître son statut sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas ...
                    </span>
                  </div>
                </a>

                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-warning" onclick="module3()" style="margin: 10px;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>

              </div>
            </div>
          </div>
          <!-- card1 end -->

          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalCycle">
                  <i class="icofont icofont-pie-chart   bg-c-pink card1-icon">
                    <span class="fa  fa-dot-circle-o"></span>
                  </i>
                  <span class=" text-c-pink f-w-600">Le cycle menstruel</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                      Le cycle menstruel va du 1er jour des règles jusqu'au dernier jour qui précède les règles suivantes. Il peut varier entre 21 à 35 jours ...

                    </span>
                  </div>
                </a>

                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-pink" onclick="module4()" style="margin: 10px; background-color: #FC6180;color: white;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalHygiene">
                  <i class="icofont icofont-pie-chart bg-viber card1-icon">
                    <span class="fa  fa-female"></span>
                  </i>
                  <span class="text-viber f-w-600">Hygiène sexuelle <br/> et menstruelle</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                      L’hygiène sexuelle ce sont les soins et entretiens à apporter aux parties intimes que l’on soit garçon
                      ou fille. Chez les garçons que vous soyez circoncis ou pas.
                    </span>
                  </div>
                </a>

                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-success" onclick="module5()" style="margin: 10px;color: white;background-color: #7B519D;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>

              </div>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalGrossesse">
                  <i class="icofont icofont-ui-home bg-c-yellow card1-icon">
                    {{--<img src="images/icons/assistance.png" style="color: orange;" alt="No image" />--}}
                    <span class="fa fa-user-md"></span>
                  </i>
                  <span class="text-c-yellow f-w-600">Grossesse précoce et <br/> non désirée</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>
                      Une grossesse non désirée est une grossesse qui survient au moment où l’on ne s’y attend pas.
                      Très tard après 18 ans, l’on peut se confronter à une grossesse ...
                    </span>
                  </div>
                </a>
                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-warning" onclick="module6()" style="margin: 10px;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>
              </div>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <a href="">
                <div class="card-block-small">
                  <a href="#" data-toggle="modal" data-target="#modalPreservMasc" >
                    <i class="icofont icofont-warning-alt bg-googleplus card1-icon">
                      <span class="fa  fa-male"></span>
                    </i>
                    <span class="text-googleplus f-w-600">Le préservatif masculin</span>
                    <h4></h4>
                    <div>
                      <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Le préservatif masculin (condom ou capote) est un étui mince et souple imperméable au sang ainsi qu’au sperme et sécrétions vaginales ...
                      </span>
                    </div>
                  </a>

                  <p style="float: bottom;">
                  <div class="text-center">
                    <button  class="btn btn-success" onclick="module7()" style="margin: 10px;color:white;background-color: #C73E2E;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                  </div>
                  </p>
                </div>
              </a>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalPresFem">
                  <i class="icofont icofont-social-twitter bg-instagram card1-icon">
                    <span class="fa fa-female"></span>
                  </i>
                  <span class="text-instagram f-w-600">Le préservatif féminin </span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10 card1-icon">
                        {{--<img src="images/icons/agenda.png" style="color: orange;" alt="No image" />--}}

                      </i>
                      C’est un tube pré-lubrifié, comme un préservatif masculin. Mais, au lieu de recouvrir le pénis, il tapisse la paroi vaginale pour créer une ...
                    </span>
                  </div>
                </a>

                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-defaut" onclick="module8()" style="margin: 10px;color: white; background-color: #AA7C62;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>
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
                <a href="#" data-toggle="modal" data-target="#modalHymen">
                  <i class="icofont icofont-pie-chart bg-c-pink card1-icon">
                    <span class="fa  fa-lemon-o "></span>
                  </i>
                  <span class="text-c-pink f-w-600">L’hymen</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                      L'hymen est la membrane qui se trouve à l'entrée du vagin et est déchirée généralement lors du premier rapport sexuel. ...
                    </span>
                  </div>
                </a>

                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-default" onclick="module9()" style="margin: 10px;background-color: #FC6180;color: white;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>

              </div>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalAbstinence">
                  <i class="icofont icofont-ui-home bg-c-blue card1-icon">
                    {{--<img src="images/icons/assistance.png" style="color: orange;" alt="No image" />--}}
                    <span class="fa  fa-child"></span>
                  </i>
                  <span class="text-c-blue f-w-600">L’abstinence sexuelle</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>
                      C’est l’action de se dispenser, de s'empêcher ou de se priver, notamment d'aliments, de boissons ou de plaisirs sexuels. C’est l’action de se priver ou de se retenir de  ...
                    </span>
                  </div>
                </a>

                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-primary"  onclick="module10()" style="margin: 10px;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>

              </div>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <a href="">
                <div class="card-block-small">
                  <a href="#" data-toggle="modal" data-target="#modalCellule" >
                    <i class="icofont icofont-warning-alt bg-viber card1-icon">
                      <span class="fa  fa-hospital-o"></span>
                    </i>
                    <span class="text-vider f-w-600">Le taux de cellules <br/> CD4</span>
                    <h4></h4>
                    <div>
                      <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Les cellules CD4, ou lymphocytes T, sont des globules blancs qui organisent la réponse du système immunitaire contre les infections. ...
                      </span>
                    </div>
                  </a>

                  <p style="float: bottom;">
                  <div class="text-center">
                    <button  class="btn btn-default" onclick="module11()" style="margin: 10px;color: white;background-color: #7B519D;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                  </div>
                  </p>
                </div>
              </a>
            </div>
          </div>
          <!-- card1 end -->
          <!-- card1 start -->
          <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
              <div class="card-block-small">
                <a href="#" data-toggle="modal" data-target="#modalCharge" >
                  <i class="icofont icofont-social-twitter bg-c-green card1-icon">
                    <span class="fa  fa-user-md"></span>
                  </i>
                  <span class="text-c-green f-w-600">La charge virale</span>
                  <h4></h4>
                  <div>
                    <span class="f-left m-t-10 text-muted">
                      <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10 card1-icon">
                        {{--<img src="images/icons/agenda.png" style="color: orange;" alt="No image" />--}}

                      </i>
                      La charge virale est le terme utilisé pour décrire la quantité de VIH qui se trouve dans votre sang. Plus vous avez de VIH dans le sang ...
                    </span>
                  </div>
                </a>

                <p style="float: bottom;">
                <div class="text-center">
                  <button  class="btn btn-success" onclick="module12()" style="margin: 10px;" data-toggle="tooltip" data-placement="bottom" title="Télécharger le pdf ou écouter l'audio">Télécharger</button>
                </div>
                </p>
              </div>
            </div>
          </div>
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
@include("Conseil.Modal.modalIST")
@include("Conseil.Modal.modalVIH")
@include("Conseil.Modal.modalDepistage")
@include("Conseil.Modal.modalCycleMenstruel")

@include("Conseil.Modal.modalHygiene")
@include("Conseil.Modal.modalGrossesse")
@include("Conseil.Modal.modalPreservatifMasc")
@include("Conseil.Modal.modalPreservatifFem")

@include("Conseil.Modal.modalHymen")
@include("Conseil.Modal.modalAbstinence")
@include("Conseil.Modal.modalCellule")
@include("Conseil.Modal.modalCharge")


    <script>

        $("#swal-modal").css("width", "50%");
        function module1() {
            showSwal('title-and-text')
            $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M1.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M1.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'> Kabyè <audio controls> <source src='images/conseils/KABYE/M1.mp3' > </audio></div>  " +
                " <div class='col-sm-6'> Français <audio controls> <source src='images/conseils/FRANCAIS/M1.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module2(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M2.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M2.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè <audio controls> <source src='images/conseils/KABYE/M2.mp3' > </audio></div>  " +
                " <div class='col-sm-6'> Français <audio controls> <source src='images/conseils/FRANCAIS/M2.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module3(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M3.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'>Ewé <br/><audio controls> <source src='images/conseils/EWE/M3.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè <audio controls> <source src='images/conseils/KABYE/M3.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français<audio controls> <source src='images/conseils/FRANCAIS/M3.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module4(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M4.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M4.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè <audio controls> <source src='images/conseils/KABYE/M4.mp3' > </audio></div>  " +
                " <div class='col-sm-6'> Français<audio controls> <source src='images/conseils/FRANCAIS/M4.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module5(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M5.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M5.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'> Kabyè<audio controls> <source src='images/conseils/KABYE/M5.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français<audio controls> <source src='images/conseils/FRANCAIS/M5.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module6(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M6.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M6.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè <audio controls> <source src='images/conseils/KABYE/M6.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français <audio controls> <source src='images/conseils/FRANCAIS/M6.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module7(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M7.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'>Ewé <br/><audio controls> <source src='images/conseils/EWE/M7.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè <audio controls> <source src='images/conseils/KABYE/M7.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français <audio controls> <source src='images/conseils/FRANCAIS/M7.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module8(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M8.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'>  Ewé <br/><audio controls> <source src='images/conseils/EWE/M8.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'> Kabyè<audio controls> <source src='images/conseils/KABYE/M8.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français <audio controls> <source src='images/conseils/FRANCAIS/M8.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module9(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M9.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M9.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè<audio controls> <source src='images/conseils/KABYE/M9.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français<audio controls> <source src='images/conseils/FRANCAIS/M9.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module10(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M10.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M10.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè<audio controls> <source src='images/conseils/KABYE/M10.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français<audio controls> <source src='images/conseils/FRANCAIS/M10.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module11(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M11.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M11.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè<audio controls> <source src='images/conseils/KABYE/M11.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français<audio controls> <source src='images/conseils/FRANCAIS/M11.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }

        function module12(){
            showSwal('title-and-text')
        $(".swal-title").html("Télécharger le pdf ou écouter l'audio");
            $(".swal-text").text("");
            $(".swal-text").append("<div class='row'> <div class='col-sm-6'><a href='images/conseils/PDF/M12.pdf' target='_blank' class='btn btn-primary' style='width:100%;margin-top:22px;'>PDF</a></div>   " +
                "<div class='col-sm-6'> Ewé <br/><audio controls> <source src='images/conseils/EWE/M12.mp3' > </audio></div> </div>" +
                " <div class='row'> <div class='col-sm-6'>Kabyè<audio controls> <source src='images/conseils/KABYE/M12.mp3' > </audio></div>  " +
                " <div class='col-sm-6'>Français<audio controls> <source src='images/conseils/FRANCAIS/M12.mp3' > </audio></div>  </div>");
            $(".swal-modal").css("width", "50%");
            $(".swal-button").text("Fermer");
        }


    </script>
   @endsection