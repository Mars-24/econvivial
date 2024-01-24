

@extends("Template.newVitrineTemplate")

@section("title")
    Le condom masculin
@endsection

@section("body")

    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center wow fadeInUp" style="color:#223dff;"> Condom masculin ou capote </h2>
            <div class="space-50"></div>
            <p style="text-align: center;" class="wow fadeInDown">
                C’est une mince enveloppe en caoutchouc ou produit naturel
                qu’on place sur le pénis en érection avant les rapports sexuels pour
                empêcher le sperme d’être en contact avec les voies génitales de la femme.
            </p>
            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>•	Elle ne coûte pas cher,</li>
                        <li>•	Elle est disponible partout sur le marché,</li>
                        <li>•	Elle a peu d’effets secondaires,</li>
                        <li>•	Elle protège contre les IST et le VIH/SIDA,</li>
                        <li>•	Elle convient aux rapports sexuels occasionnels,</li>
                        <li>•	Elle protège contre les grossesses non désirées et les IST/VIH/SIDA,</li>
                        <li>•	Elle n’a pas besoin d’ordonnance,</li>
                        <li>•	Elle engage l’homme dans la planification familiale,</li>
                        <li>•   Elle est efficace immédiatement,</li>
                        <li>•	Elle n’affecte pas l’allaitement,</li>
                        <li>•	Peut être utilisé en plus d’autres méthodes.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInRight"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>•	La capote diminue la sensibilité du gland,</li>
                        <li>•	Certains hommes ne peuvent pas maintenir l’érection pour porter la capote,</li>
                        <li>•	Il faut interrompre les préliminaires pour porter la capote,</li>
                        <li>•	Utilisation une seule capote lors de chaque rapport sexuel,</li>
                        <li>•	L’efficacité dépend de la volonté à suivre les conseils.</li>
                    </ul>
                </div>
            </div>


            <div class="space-20"></div>
            
                <div class="col-sm-12">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date contraception</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="date" id="dateContraception"
                                           name="dateContraception"
                                           placeholder="Date de la contraception" required/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Durée contraception</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="duree" id="duree" required>
                                        <option disabled selected>Sélectionnez la durée</option>
                                        <option value="3 mois">3 mois</option>
                                        <option value="6 mois">6 mois</option>
                                        <option value="2 ans">2 ans</option>
                                        <option value="5 ans">5 ans</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <div class="row justify-content-center">
                            <input class="form-control" type="hidden" id="identifiant" name="userID" required/>
                            <input class="form-control" type="hidden" id="planning" value="6" required/>
                            <button style="margin-top: 20px;"
                                    type="button" onclick=""
                                    id="modernesouscription"
                                    class="btn btn-outline-primary btn-rounded playButton justify-content-center">
                                Souscrire
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        <div class="space-80"></div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script>
      
    </script>
@endsection


