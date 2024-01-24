
@extends("Template.newVitrineTemplate")

@section("title")
    L’obstruction des trompes
@endsection

@section("body")

    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center wow fadeInDown" style="color:#223dff;">L’obstruction des trompes</h2>
            <div class="space-50"></div>
            <p style="text-align: center;" class="wow fadeInUp">
                Avec les nouvelles technologies une autre méthode consiste à poser des clips pour obstruer les trompes le plus près possible de l’utérus. Cette technique a l’avantage de moins affecter les trompes de Fallope tout en ayant la même efficacité, une reconstitution des trompes permet à la femme d’être de nouveau
                fertile.

            </p>


            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>•	Elles sont très efficaces,</li>
                        <li>•	Il n’y a pas de risque d’oubli,</li>
                        <li>•	Elles sont indépendantes de l’activité sexuelle,</li>
                        <li>•	Leur action est durable,</li>
                        <li>•	Elles sont discrètes,</li>
                        <li>•	Elles possèdent peu de contre-indications,</li>
                        <li>•	Elles ont peu d’effets secondaires,</li>
                        <li>•	Elles conservent les capacités sexuelles de l’homme et de la femme.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInRight"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>•	Elles nécessitent un personnel qualifié,</li>
                        <li>•	Elles ne sont pas disponibles dans toutes les formations sanitaires,</li>
                        <li>•	Des infections de la plaie opératoire sont possibles,</li>
                        <li>•	Cette méthode est irréversible,</li>
                        <li>•	Elles sont très peu acceptées au Togo pour le moment,</li>
                        <li>•	Elles ne protègent pas contre les IST/VIH/SIDA.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="13" required/>
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

@endsection




