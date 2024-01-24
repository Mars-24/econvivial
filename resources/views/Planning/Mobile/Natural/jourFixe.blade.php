
@extends("Template.newVitrineTemplate")

@section("title")
    La méthode des jours fixes (MJF)ou Collier
@endsection

@section("body")

    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center wow fadeInDown" style="color:#223dff;"> La méthode des jours fixes (MJF)ou Collier</h2>
            <div class="space-50"></div>

            <div class="wow fadeInUp">
            <p style="text-align: center;">
                La méthode des jours fixes (MJF) appelée collier du cycle est une méthode naturelle basée sur la connaissance du cycle menstruel.
            </p>

            <p>
            <h2>Description du collier du cycle :</h2> <br/>

            C’est un collier de perles de couleurs différentes qui
            représentent chaque jour du cycle menstruel de la femme,
            il peut aider la femme à savoir quand elle peut tomber enceinte à la suite de
            rapports sexuels non protégés. <br/> <br/>

            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <ul>
                        <li>	Les perles blanches marquant les jours où vous pouvez tomber enceinte,</li>
                        <li>	Les perles marron marquant les jours où il est peu probable que vous tombez enceinte,</li>
                        <li>	Un cylindre noir avec une flèche qui indique dans quel sens déplacer l’anneau.</li>
                    </ul>
                </div>

                <div class="col-sm-6 wow fadeInDown">
                    Comment utiliser le collier du cycle <br/>
                    <ul>
                        <li>	Le premier jour de vos règles, mettez l’anneau sur la perle rouge,</li>
                        <li>	Marquez le premier jour de vos règles sur votre calendrier. Vous devez connaître ce
                            jour au cas où vous oubliez de déplacer l’anneau,</li>
                        <li>	Chaque matin, déplacez l’anneau dans la direction de la flèche sur le cylindre,</li>
                        <li>	Continuez à déplacer l’anneau chaque jour, d’une perle à l’autre, même les jours où vous avez vos règles,</li>
                        <li>	Le jour où vos prochaines règles viennent, mettez à nouveau l’anneau sur la perle ROUGE. S’il vous reste des perles marron, sautez-les,</li>
                        <li>	Quand l’anneau est sur une perle BLANCHE, vous pouvez tomber enceinte à la suite de rapports sexuels sans protection,</li>
                        <li>	Quand l’anneau est sur une perle MARRON, il est peu probable que vous tombiez enceinte à la suite de rapports sexuels sans protection.</li>
                    </ul>
                </div>
            </div>


            </p>

            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>    C’est une méthode naturelle, elle n’a aucun effet secondaire <br/>
                        <li>	Ne demande pas de prise de médicaments ou autre intervention chirurgicale,</li>
                        <li>	Méthode simple, facile à enseigner, à utiliser,</li>
                        <li>	Méthode efficace 95% (quand elle est utilisée correctement) elle réduit de manière
                            considérable la probabilité d’une grossesse non désirée,</li>
                        <li>	Méthode à très faible coût,</li>
                        <li>	Fait participer les deux partenaires en offrant les possibilités d’améliorer la communication au sein du couple.</li>
                        <li>	La femme peut avoir une grossesse dès l’arrêt de la méthode.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInRight"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>	Ne protège pas contre les IST/VIH/SIDA,</li>
                        <li>	Abstinence sexuelle les jours de fécondité ou utilisation d’une méthode de barrière efficace.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="19" required/>
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





