
@extends("Template.newVitrineTemplate")

@section("title")
    La méthode d’Allaitement Maternel et de l’Aménorrhée (MAMA)
@endsection

@section("body")

    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center wow fadeInDown" style="color:#223dff;"> La méthode d’Allaitement Maternel et de l’Aménorrhée (MAMA)</h2>
            <div class="space-50"></div>

            <p style="text-align: center;"  class="text-center wow fadeInUp" >
            <h2>Comment utilise-t-on cette méthode ?</h2> <br/>

            Il faut que : <br/>

            <ul>
                <li>	L’enfant soit âgé de moins de 6 mois,</li>
                <li>	La mère n’ait pas encore vu ses règles depuis l’accouchement,</li>
                <li>	L’allaitement soit exclusif, à la demande, y compris la nuit.</li>
                <li>	Si ces trois conditions sont réunies la mère n’a pas besoin d’une autre méthode contraceptive.</li>
            </ul>

            </p>

            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>	elle ne coûte pas cher,</li>
                        <li>	elle favorise la pratique de l’allaitement maternel,</li>
                        <li>	elle ne demande pas de médicaments,</li>
                        <li>	elle est acceptée par les religions,</li>
                        <li>	la femme peut avoir une grossesse dès l’arrêt de cette méthode, pas d’effets secondaires etc.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInRight"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>	l’allaitement maternel à la demande, y compris la nuit, est difficile à supporter pour la mère,</li>
                        <li>	la méthode n’est valable que pendant 6 mois,</li>
                        <li>	l’allaitement maternel </li>
                        <li>	l’allaitement maternel exclusif n’est pas encore bien toléré par tous, une ovulation peut intervenir
                            à l’insu de la mère qui pourrait bien tomber en grossesse,</li>
                        <li>	elle ne protège pas contre les IST/SIDA,</li>
                        <li>	n’est pas recommandée chez les femmes qui présentent une maladie débilitante
                            (VIH/SIDA, tuberculose, cancer, cardiopathie sévère.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="20" required/>
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




