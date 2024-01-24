
@extends("Template.newVitrineTemplate")

@section("title")
    La méthode de la glaire cervicale
@endsection

@section("body")

    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center wow fadeInDown" style="color:#223dff;"> La méthode de la glaire cervicale </h2>
            <div class="space-50"></div>
            <p style="text-align: center;" class="wow fadeInUp">
                On sait que :
            </p>

            <p>
            <ul>
                <li>	La glaire cervicale est peu abondante avant l’ovulation,</li>
                <li>	Pendant la période féconde du cycle menstruel la glaire est abondante dans le vagin. Elle est filante et gluante pendant la période féconde,</li>
                <li>	Après l’ovulation, la glaire devient peu abondante, épaisse et collante.</li>
                <li>	Dans l’application de cette méthode, la femme doit tâter sa glaire
                    chaque matin au réveil. Elle doit éviter des rapports sexuels dès
                    qu’elle constate que la glaire est abondante et filante c’est-à-dire
                    qu’elle est gluante et élastique. Elle peut reprendre les rapports sexuels
                    quand cette glaire redeviendra peu abondante et collante.</li>
            </ul>
            </p>

            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>	Elle ne demande pas de médicaments,</li>
                        <li>	Elle n’a pas de coût sur le plan financier,</li>
                        <li>	Elle permet à la femme de mieux connaître le fonctionnement de son corps,</li>
                        <li>	Elle permet à la femme de mieux connaître le fonctionnement de son corps,</li>
                        <li>	Elle n’a pas d’effets secondaires indésirables sur la femme,</li>
                        <li>	La femme peut avoir une grossesse dès l’arrêt de la méthode.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInRight"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>	Elle a beaucoup d’échecs,</li>
                        <li>	Elle nécessite un long apprentissage,</li>
                        <li>	Elle exige une période d’abstinence plus ou moins longue,</li>
                        <li>	Elle ne protège pas contre les IST/SIDA,</li>
                        <li>	Il y a un risque d’infection.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="18" required/>
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




