
@extends("Template.newVitrineTemplate")

@section("title")
   Le condom féminin
@endsection

@section("body")
                <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
                    <div class="space-70"></div>
                    <div class="container">
                        <h2 class="text-center wow fadeInUp" style="color:#223dff;">Le condom féminin </h2>
                        <div class="space-50"></div>
                        <p style="text-align: center;" class="wow fadeInDown">
                            Le condom féminin est une méthode de barrière pour se protéger des IST/VIH/SIDA et des grossesses non désirées.
                        </p>
                        <div class="space-50"></div>
                        <div class="row">
                            <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                                <h4 style="color: green;"><u>Avantages</u> </h4>
                                <ul>
                                    <li>•	Efficace immédiatement,</li>
                                    <li>•	Solide et résistant (ne se déchire pas facilement),</li>
                                    <li>•	Pas d’allergie, </li>
                                    <li>•	La femme est autonome et responsable de sa sexualité,</li>
                                    <li>•	S’adapte à toutes les tailles de vagin,</li>
                                    <li>•	Recouvre tout le vagin et la vulve de la femme elle-même,</li>
                                    <li>•	Peut être porté 8 heures avant les rapports sexuels,</li>
                                    <li>•	Pas d’interruption de l’ambiance sexuelle comme le condom masculin</li>
                                    <li>•	(peut être inséré 8 heures avant le rapport sexuel),</li>
                                    <li>•	Utilisation facile après plusieurs essaies,</li>
                                    <li>•	Permet aux partenaires de rester un peu plus longtemps enlacés après l’acte sexuel,</li>
                                    <li>•	Ne demande aucune ordonnance,</li>
                                    <li>•	Protège contre les IST/SIDA et les grossesses non désirées,</li>
                                    <li>•	N’affecte pas l’allaitement maternel,</li>
                                    <li>•	Peut être contrôlé par la femme.</li>
                                </ul>

                            </div>

                            <div class="col-sm-6 wow fadeInRight"  style="color:#3F729B;padding: 20px;">
                                <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                                <ul>
                                    <li>•	Coût élevé par rapport au condom masculin,</li>
                                    <li>•	Difficulté d’insertion lors de la première utilisation,</li>
                                    <li>•	Position sexuelle réduite. Seule la position dite du missionnaire met à
                                        l’aise. C’est une position où la femme est couchée sur le dos, les
                                        jambes écartées et l’homme à plat ventre, la pénètre entre les jambes,</li>
                                    <li>•	Utilisable une seule fois lors de chaque rapport sexuel,</li>
                                    <li>•	L’efficacité dépend de la volonté à suivre les instructions.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="7" required/>
                            <button style="margin-top: 20px;"
                                    type="button" 
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