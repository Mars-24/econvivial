@extends("Template.newVitrineTemplate")

@section("title")
Quiz | eCentre Convivial
@endsection

@section("referencement")
<meta name="description" content="Le Centre Convivial vous propose des jeux Puzzle et des questions Quizz pouvant vous permettre de gagner des prix. " />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
<meta name="category" content="Suivi de grossesse">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/quiz">
<meta name="robots" content="index, follow">
@endsection

@section("body")

<!--Header-Area-->
<header class="blue-bg relative fix" id="home">

    <div class="section-bg overlay-bg dewo ripple"></div>
    <!--Mainmenu-->

    @include("HeaderNav.vitrineNav")
    <!--Mainmenu/-->
    <div class="space-80"></div>
    <!--Header-Text/-->
</header>
<!--Header-Area/-->

<img class="img img-responsive" src="images/services/jeux.jpg" style="width: 100%;height: 50vh;" alt="">
<section>
    <div class="space-50"></div>
    <div class="container">
        <h2 class="text-center" style="color: #6eabd1;">Participez au Quiz</h2>
        <div class="space-20"></div>
        <div class="space-50"></div>
        <div class="row">
            @foreach($modules as $module)
            <div class=" col-xs-12 col-md-4 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="box text-center">
                    <a href="play-quiz?ref={{$module->id}}&token={{Session::token()}}" >
                        <div class="space-10"></div>
                        <h2 class="text-uppercase">{{$module->libelle}}</h2>
                        <p style="margin-top: 40px;">{{$module->description}}</p>
                       
                    </a>
                </div>
            </div>
            @endforeach

        </div>


    </div>
</section>
<!--Work-Section-->

@include("Footer.vitrineFooter")
<!--Footer-area-->


<div class="modal fade" id="istModal" role="dialog" style="margin-top: 10vh;" >
    <div class="modal-dialog modal-lg" role="document" style="width: 90%; height: 90%;">
        <div class="modal-content" style="background-color: white;">
            <div class="modal-header" style="text-align: center;">
                <h5 class="modal-title" id="exampleModalLabel-2">QUIZ IST </h5>
                <h3 style="color:red;"> <span id="point">0</span> Point(s) </h3>    
                <button type="button" onclick="window.location.href=''" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="text-align: center">
              <div class="row" id="question1">
                  <h2>Qu’est-ce qu’une IST</h2>
                  <div class="col-sm-6 col-sm-offset-3">

                    <table class="table">
                        <tbody>

                            <tr>
                                <td><input type="radio" id="rep1" name="ist1" /></td>
                                <td> C’est une Maladie Sexuellement Transmissible</td>
                                <td><b class="indicator" style="font-size: 25px;color: red;">X</b></td>
                            </tr>

                            <tr>
                                <td><input type="radio" id="rep2" name="ist1"  /></td>
                                <td> C’est une Infection Sexuellement Transmissible</td>
                                <td><b class="indicator" style="font-size: 25px;color: green;">X</b></td>
                            </tr>

                            <tr>
                                <td><input type="radio" id="rep3"  name="ist1"  /></td>
                                <td>C’est une Maladie de la Peau</td>
                                <td><b class="indicator" style="font-size: 25px;color: red;">X</b></td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>

            <div class="row" >
                <a href="#" style="margin-top: 20px;" class="btn btn-link text-uppercase" id="jouer1">Jouer</a>

                <a href="#" style="margin-top: 20px; display: none;" class="btn btn-link text-uppercase" id="suivant1">Suivant</a>
            </div>


            <div class="row" id="question2" style="display: none;">
              <h2>Quels sont les différents types d’IST ?</h2>


              <div class="row">
                <div class="col-sm-4">
                    <label>  <input type="radio" id="ist1" name="ist1"  />  A <b class="indicator" style="font-size: 25px;color: red;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li> Gonococcie</li>
                            <li> Syphilis</li>
                            <li> Paludisme  </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>  <input type="radio" id="ist2" name="ist1"  />  B <b class="indicator" style="font-size: 25px;color: red;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li>Herpès génital </li>
                            <li>Chancre mou ou chancrelle </li>
                            <li>Tuberculose  </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>  <input type="radio" id="ist3" name="ist1"  />  C <b class="indicator" style="font-size: 25px;color: green;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li> Gonococcie</li>
                            <li> Chancre mou ou chancrelle </li>
                            <li> Gale  </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row" >
                <a href="#" style="margin-top: 20px;" class="btn btn-link text-uppercase" id="jouer2">Jouer</a>

                <a href="#" style="margin-top: 20px; display: none;" class="btn btn-link text-uppercase" id="suivant2">Suivant</a>
            </div>
        </div>



                    <div class="row" id="question3" style="display: none;">
              <h2>Quels sont les modes  de  transmission  des  IST ?</h2>


              <div class="row">
                <div class="col-sm-4">
                    <label>  <input type="radio" id="mode1" name="ist1"  />  A <b class="indicator" style="font-size: 25px;color: green;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li>   Voie sexuelle</li>
                            <li>   Voie sanguine</li>
                            <li>   Voie non sexuelle  </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>  <input type="radio" id="mode2" name="ist1"  />  B <b class="indicator" style="font-size: 25px;color: red;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li>   Voie sexuelle</li>
                            <li>   Voie aérien</li>
                            <li>   Voie non sexuelle  </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>  <input type="radio" id="mode3" name="ist1"  />  C <b class="indicator" style="font-size: 25px;color: red;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li>   Voie sexuelle</li>
                            <li>   Voie aérien</li>
                            <li>   Voie terrestre  </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row" >
                <a href="#" style="margin-top: 20px;" class="btn btn-link text-uppercase" id="jouer3">Jouer</a>

                <a href="#" style="margin-top: 20px; display: none;" class="btn btn-link text-uppercase" id="suivant3">Suivant</a>
            </div>
        </div>


            <div class="row" id="question4" style="display: none;">
              <h2>Mesures  préventives  des  IST</h2>


              <div class="row">
                <div class="col-sm-4">
                    <label>  <input type="radio" id="mesure1" name="ist1"  />  A <b class="indicator" style="font-size: 25px;color: red;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li>   Abstinence  sexuelle </li>
                            <li>   Partenaires  multiples et bonne  fidélité  </li>
                            <li>   Utilisation  correcte et systématique des  préservatifs (condom, fémidom)</li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>  <input type="radio" id="mesure2" name="ist1"  />  B <b class="indicator" style="font-size: 25px;color: red;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li>   Eviter les toilettes intimes intempestives avec des antiseptiques</li>
                            <li>   Partenaires  multiples et bonne  fidélité  </li>
                            <li>   Désinfecter et faire bouillir les caleçons et les sous-vêtements </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>  <input type="radio" id="mesure3" name="ist1"  />  C <b class="indicator" style="font-size: 25px;color: green;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li>   Partenaire  unique et bonne  fidélité  </li>
                            <li>   Eviter les toilettes intimes intempestives avec des antiseptiques</li>
                            <li>   Désinfecter et faire bouillir les caleçons et les sous-vêtements </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row" >
                <a href="#" style="margin-top: 20px;" class="btn btn-link text-uppercase" id="jouer4">Jouer</a>

                <a href="#" style="margin-top: 20px; display: none;" class="btn btn-link text-uppercase" id="suivant4">Suivant</a>
            </div>
        </div>


                    <div class="row" id="question5" style="display: none;">
              <h2>Quelles sont les conduites à tenir en  cas  d’IST ?</h2>


              <div class="row">
                <div class="col-sm-4">
                    <label>  <input type="radio" id="conduite1" name="ist1"  />  A <b class="indicator" style="font-size: 25px;color: green;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li> Consulter les services de santé les plus proches et le plus rapidement possible </li>
                            <li> Suivre le traitement jusqu’au bout en respectant la dose et la durée. </li>
                            <li> Faire traiter les partenaires</li>
                            <li>  Désinfecter et faire bouillir les slips.</li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>  <input type="radio" id="conduite2" name="ist1"  />  B <b class="indicator" style="font-size: 25px;color: red;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                           <li>  Consulter les services de santé les plus proches et le plus rapidement possible </li>
                            <li>  Suivre le traitement au moins à 3 jours de traitement</li>
                            <li>  Faire traiter les partenaires </li>
                            <li>  Désinfecter et faire bouillir les slips.</li>

                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>  <input type="radio" id="conduite3" name="ist1"  />  C <b class="indicator" style="font-size: 25px;color: red;margin-left: 10px;">X</b></label>
                    <div class="row">
                        <ul>
                            <li>  Consulter les services de santé les plus proches et le plus rapidement possible </li>
                            <li>  Suivre le traitement jusqu’au bout en respectant la dose et la durée.</li>
                            <li>  Se faire traiter tout(te) seul (e) </li>
                            <li>  Désinfecter et faire bouillir les slips.</li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row" >
                <a href="#" style="margin-top: 20px;" class="btn btn-link text-uppercase" id="jouer5">Jouer</a>

                <a href="#" style="margin-top: 20px; display: none;" class="btn btn-link text-uppercase" id="terminer">Terminer</a>
            </div>
        </div>


    </div>

    <div class="modal-footer">
        <button class="btn btn-danger" onclick="window.location.href=''">Quitter le jeux</button>
    </div>
</div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script>

    $("#showIstModal").click(function(){
        $("#istModal").modal("show");
    });

    $(document).ready(function(){
        $(".indicator").hide();
        $("#suivant1").hide();
    });

    $("#jouer1").on("click", function(){

       var rep1 = document.getElementById("rep1").checked;   
       var rep2 = document.getElementById("rep2").checked;   
       var rep3 = document.getElementById("rep3").checked; 

       var totalPoint = $("#point").text();

       if(rep1 === false && rep2 === false && rep3 === false){
        alert("Veuillez sélectionner une réponse");
    }else{
        var point = 0;

        if(rep2 === true){
            point = 5; 
            alert("Super ! vous obtenez 5 points") ; 
        }else{
            point = 0;
             alert("Oups… mauvaise réponse. \n la réponse à la question est :  C’est une Infection Sexuellement Transmissible");
        }

        $("#point").text(parseInt(totalPoint) + parseInt(point));
        $(".indicator").show("slow");
        $("#suivant1").show("slow");
        $("#jouer1").hide();
    }

});

    $("#suivant1").on("click", function(){
        $(this).hide();
        $(".indicator").hide();
        $("#question1").hide();
        $("#question2").show("slow");
    });

    //Question 2

    $("#jouer2").on("click", function(){

     var rep1 = document.getElementById("ist1").checked;   
     var rep2 = document.getElementById("ist2").checked;   
     var rep3 = document.getElementById("ist3").checked; 

     var totalPoint = $("#point").text();

       if(rep1 === false && rep2 === false && rep3 === false){
        alert("Veuillez sélectionner une réponse");
        }else{
        var point = 0;

        if(rep3 === true){
            point = 5; 
            alert("Super ! vous obtenez 5 points") ; 
        }else{
            point = 0;
            alert("Oups… mauvaise réponse. \n la réponse à la question est le choix C");
        }

        $("#point").text(parseInt(totalPoint) + parseInt(point));
        $(".indicator").show("slow");
        $("#suivant2").show("slow");
        $("#jouer2").hide();
    }

    });

    $("#suivant2").on("click", function(){
        $(this).hide();
        $(".indicator").hide();
        $("#question1").hide();
        $("#question2").hide();
        $("#question3").show("slow");
    });


        //Question 3

    $("#jouer3").on("click", function(){

     var rep1 = document.getElementById("mode1").checked;   
     var rep2 = document.getElementById("mode2").checked;   
     var rep3 = document.getElementById("mode3").checked; 

     var totalPoint = $("#point").text();

       if(rep1 === false && rep2 === false && rep3 === false){
        alert("Veuillez sélectionner une réponse");
        }else{
        var point = 0;

        if(rep1 === true){
            point = 5; 
            alert("Super ! vous obtenez 5 points") ; 
        }else{
            point = 0;
            alert("Oups… mauvaise réponse. \n la réponse à la question est le choix A");
        }

        $("#point").text(parseInt(totalPoint) + parseInt(point));
        $(".indicator").show("slow");
        $("#suivant3").show("slow");
        $("#jouer3").hide();
    }

    });

    $("#suivant3").on("click", function(){
        $(this).hide();
        $(".indicator").hide();
        $("#question3").hide();
        $("#question4").show("slow");
    });


            //Question 4

    $("#jouer4").on("click", function(){

     var rep1 = document.getElementById("mesure1").checked;   
     var rep2 = document.getElementById("mesure2").checked;   
     var rep3 = document.getElementById("mesure3").checked; 

     var totalPoint = $("#point").text();

       if(rep1 === false && rep2 === false && rep3 === false){
        alert("Veuillez sélectionner une réponse");
        }else{
        var point = 0;

        if(rep3 === true){
            point = 5; 
            alert("Super ! vous obtenez 5 points") ; 
        }else{
            point = 0;
            alert("Oups… mauvaise réponse. \n la réponse à la question est le choix C");
        }

        $("#point").text(parseInt(totalPoint) + parseInt(point));
        $(".indicator").show("slow");
        $("#suivant4").show("slow");
        $("#jouer4").hide();
    }

    });

    $("#suivant4").on("click", function(){
        $(this).hide();
        $(".indicator").hide();
        $("#question4").hide();
        $("#question5").show("slow");
    });



            //Question 4

    $("#jouer5").on("click", function(){

     var rep1 = document.getElementById("conduite1").checked;   
     var rep2 = document.getElementById("conduite2").checked;   
     var rep3 = document.getElementById("conduite3").checked; 

     var totalPoint = $("#point").text();

       if(rep1 === false && rep2 === false && rep3 === false){
        alert("Veuillez sélectionner une réponse");
        }else{
        var point = 0;

        if(rep1 === true){
            point = 5; 
            alert("Super ! vous obtenez 5 points") ; 
        }else{
            point = 0;
            alert("Oups… mauvaise réponse. \n la réponse à la question est le choix A");
        }

        $("#point").text(parseInt(totalPoint) + parseInt(point));
        $(".indicator").show("slow");
        $("#terminer").show("slow");
        $("#jouer5").hide();
    }

    });

    $("#terminer").on("click", function(){
        alert("Merci d'avoir participer au quiz sur les Infections Sexuellement Transmissibles. \n Passez à pésent au module suivant.");
        $("#istModal").modal("hide");
    });
</script>
@endsection