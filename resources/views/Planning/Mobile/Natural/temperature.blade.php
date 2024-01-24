
@extends("Template.newVitrineTemplate")

@section("title")
    La méthode de température
@endsection

@section("body")

    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center wow fadeInDown" style="color:#223dff;"> La méthode de température</h2>
            <div class="space-50"></div>
            <p style="text-align: center;" class="wow fadeInUp">
                Sachant que la température du corps diminue de 0,5°C avant l’ovulation et
                augmente de 0,2 à 0,5° C au moment de l’ovulation, la femme doit prendre
                sa température chaque matin au réveil à la même heure et la noter sur une courbe.
                Elle doit guetter le jour où la température va dépasser 37°. A partir de ce moment,
                elle sait qu’elle est dans la période d’ovulation donc de fécondité.
                Elle reste dans sa période féconde jusqu’au troisième jour après l’ovulation.
                Avec cette méthode, la femme ne doit pas avoir des rapports sexuels du premier
                jusqu’au troisième jour après la montée de la température.
            </p>
            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>	Elle ne demande pas de médicament,</li>
                        <li>	Elle ne coûte pas cher,</li>
                        <li>	Son efficacité est bonne (94 % à 97 %),</li>
                        <li>	Elle est acceptée par les religions,</li>
                        <li>	La femme peut avoir une grossesse dès l’arrêt de la méthode, etc.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInDown"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>	Elle est mal acceptée par les couples à cause d’une abstinence plus ou</li>
                        <li>	moins longue,</li>
                        <li>	Elle n’est pas applicable chez la femme illettrée,</li>
                        <li>	Elle s’applique difficilement chez la femme qui travaille la nuit,</li>
                        <li>	Elle s’applique difficilement si la femme fait de la fièvre pour raison de maladie (fièvre, infection…),</li>
                        <li>	Elle ne protège pas contre les IST/SIDA.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="17" required/>
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





