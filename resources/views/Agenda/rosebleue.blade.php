@extends("Template.newVitrineTemplate")

@section("title")
    Spéciale Soirée Roz'Bleu
@endsection

@section("referencement")
    <meta name="description" content=" S’il vous est arrivé une fois d’avoir eu honte de vous intéresser d’un peu trop près à la vie sexuelle des autres, vous serez peut-être soulagé d’apprendre que le proverbe « la curiosité est un vilain défaut » ne s’applique pas en toutes circonstances. " />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
    <meta name="category" content="Spéciale Soirée Roz'Bleu">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/soiree-rose-bleue">
    <meta name="robots" content="index, follow">


    <meta name="image" content="https://econvivial.org/images/services/rose_bleue_logo_small.jpg"/>

    <meta property="og:url" content="https://econvivial.org/soiree-rose-bleue">
    <meta property="og:image" content="https://econvivial.org/images/services/rose_bleue_logo_small.jpg">
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


        <img class="img img-responsive" src="images/services/banniere_rose_bleu.jpg" style="width: 100%;height: 70vh;" alt="">

    <section style="font-size: 16px;">
        <div class="space-50"></div>
        <div class="container">
            <h2 class="text-center" style="color: #6eabd1;"><i> Soirée Spéciale <span style="color: #1ba7ff">Roz'</span>
                    <span style="color: #ff45aa">Bleu</span></i></h2>
            <div class="space-20"></div>
            <div class="row">
                <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="">
                        <img class="img img-responsive" width="50%" src="images/services/rose_bleue_logo.jpg" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 0vh;">
                    <div class="" style="text-align: justify;">
                        <p>
                            S’il vous est arrivé une fois d’avoir eu honte de vous intéresser d’un peu trop près à
                            la vie sexuelle des autres, vous serez peut-être soulagé d’apprendre que le proverbe
                            « la curiosité est un vilain défaut » ne s’applique pas en toutes circonstances.
                            Ce qui motive les gens, c’est le plaisir de parler de ce qui se passe dans nos chambres à
                            coucher (ou n’importe où ailleurs).
                        </p>

                        <p>
                            Nous avons décidé d’alimenter l’appétit dévorant du public pour ce genre de sujet avec eCentre Convivial en parlant des
                            problèmes les plus courants que vous rencontrez dans votre sexualité. C’est la soirée Cocktail Roz' Bleu.
                        </p>

                        <p>
                            Soirée « Cocktail en Roz'Bleu » est une soirée organisée par eCentre Convivial et regroupe des jeunes, femmes, hommes et couples autour d’un groupe de professionnel de la santé (Médecin, Gynécologue et Sage-femme) pour discuter des
                            sujet liés à l’épanouissement sexuel dans les couples, avec en ligne de mire une échographie à prix promotionnel.
                        </p>

                        <p>
                            Au cours de cette première édition, Soirée Cocktail Roz’Bleu débattra de trois thèmes à savoir :
                                <span>
                                    <ol>
                                        <li>	Le myome, pourvoyeurs d’infertilité chez la femme ;</li>
                                        <li>	Les IST de la jeunesse, facteurs d’infertilité dans le futur ;</li>
                                        <li>	La participation de l’homme dans l’épanouissement sexuelle de la femme.</li>

                                    </ol>
                                </span>
                        </p>

                        <p>
                            <b>Cocktail <span style="color: #1ba7ff">Roz'</span>  <span style="color: #ff45aa">Bleu</span></b>,  c’est une soirée cocktail au cours de laquelle toutes
                            les femmes sont habillées en rose et les hommes en bleu. La Soirée Cocktail en Roz' Bleu c’est le samedi 24 novembre 2018 à 18h00 au Centre Espérance Loyola (CEL) sis à Agoè-Nyivé chez les Jésuites, non loin du Camp Fir.
                            Les frais de participation s’élèvent à 5000 FCFA par personne avec échographie sur place offerte à toutes les dames à un prix spécial de 3000 FCFA.

                        </p>

                        <div class="row text-center">
                            <button  class="btn btn-link text-uppercase" id="inscription">Je m'inscris</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
    </section>
    <!--Work-Section-->

    @include("Footer.vitrineFooter")
    <!--Footer-area-->

  
    <div class="modal fade" id="modalRoseBleue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header" style=" background-color: #ff5daa; color: white;text-transform: uppercase;font-size: 18px;">
                 <b>Inscription à la spéciale soirée <span style="color: #293aff">Roz'</span>
                     <span style="">Bleu</span> </b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form form-horizontal" action="{{route('inscription-rose-bleue')}}" method="POST">
                <div class="modal-body" style="margin: 20px;">


                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                        <div class="form-group">
                            <div class="col-sm-4"><label for="nom">Nom</label></div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nom" required placeholder="Votre nom" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4"><label for="prenom">Prénom(s)</label></div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="prenom" required placeholder="Votre prénom" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4"><label for="telephone">Téléphone(whatsapp)</label></div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="telephone" required id="telephone" placeholder="Votre numéro de téléphone joignable" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4"><label for="type_inscription">Type d'inscription</label></div>
                            <div class="col-sm-8">
                                <select class="form-control" id="type_inscription" name="typeInscription" required>
                                    <option disabled="true" selected>Veuillez choisir le type d'inscription</option>
                                    <option value="Célibataire">Seul(e)</option>
                                    <option value="En couple">En couple</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4"><label for="frais">Frais d'inscription</label></div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" required  name="frais" id="frais" onfocus="$(this).blur()" placeholder="Frais d'inscription" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4"><label for="echo"><b>Echographie sur place (3000 FCFA)</b></label></div>
                            <div class="col-sm-8">
                                <div class="col-sm-6">
                                    <label for="yesEcho"><input type="radio" name="echo" value="1" id="yesEcho" class="form-control"   /> OUI</label>
                                </div>

                                <div class="col-sm-6">
                                    <label for="noEcho"><input type="radio" name="echo" value="0" checked id="noEcho"  class="form-control"   /> NON</label>
                                </div>

                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col-sm-4"><label for="frais">TOTAL A PAYER</label></div>
                        <div class="col-sm-8">
                            <label><h1 style="color: red;" ><span id="total">0</span></h1></label>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                    <button type="submit" class="btn btn-primary">Je m'inscris</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header" style=" background-color: #ff5daa; color: white;text-transform: uppercase;font-size: 18px;">
                    <b>Inscription à la spéciale soirée <span style="color: #293aff">Roz'</span>
                        <span style="">Bleu</span> </b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" style="margin: 20px;">
                        <h3>{{\Illuminate\Support\Facades\Session::get("inscris-message")}}</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

            </div>
        </div>
    </div>
  
    <script type="text/javascript">

        jQuery(document).ready(function(){
            @if($inscris != true)
           /// $("#modalRoseBleue").modal("show");
            @endif

            @if(Session::get("inscris-alerte") == true)
            $("#modalMessage").modal("show");
            {{Session::put("inscris-alerte", false)}}
            @endif
        });
        
        $("#inscription").click(function(){
            $("#modalRoseBleue").modal("show");
        });

        $("#type_inscription").change(function(){

            var valeur = $(this).val();
            var frais;
            var total = $("#total").text();

            var yesEcho = document.getElementById("yesEcho").checked;
            var noEcho = document.getElementById("noEcho").checked;

            var echo = 0;
            if(yesEcho === true){
                echo = 3000;
            }else{
                echo = 0;
            }

            if(valeur === "Célibataire"){
                frais = "5000";
            }
            if(valeur === "En couple"){
                frais = "10000";
            }

            total = parseInt(echo) + parseInt(frais);

            $("#total").text(total);
            $("#frais").val(frais);

        });

        $("#yesEcho").click(function(){
            var total = $("#total").text();
            $("#total").text(parseInt(total) + 3000);
        });

        $("#noEcho").click(function(){
            var total = $("#total").text();
            if(total >= 8000){
                $("#total").text(parseInt(total) - 3000);
            }else{
            }
        });


    </script>

@endsection