
@extends("Template.newVitrineTemplate")

@section("title")
    Le Norplant
@endsection

@section("body")


    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center wow fadeInDown" style="color:#223dff;">Le Norplant </h2>
            <div class="space-50"></div>

            <div class="wow fadeInUp">
            <p style="text-align: center;">
                C’est une méthode contraceptive composée de capsules fines et flexibles remplies de
                lévonorgestrel (progestérone). Il existe trois types de norplant : le norplant avec 6
                capsules, le norplant avec 2 capsules, le norplant avec une capsule, ces deux derniers
                types n’existent pas au Togo.
            </p>



            <h3><b>Comment le norplant agit-il pour empêcher la grossesse ?</b></h3><br/>
            <ul style="margin-left: 20px;">
                <li>•	Il bloque l’ovulation,</li>
                <li>•	Il perturbe l’utérus en le rendant incapable d’accueillir l’oeuf fécondé,</li>
                <li>•	Il épaissit la glaire cervicale pour empêcher l’entrée des spermatozoïdes dans l’utérus.</li>
            </ul>

            <br/>

            <h3><b>Comment utilise-t-on le Norplant ?</b></h3><br/>
            <ul style="margin-left: 20px;">
                <li>•	Il doit être placé entre le premier et le septième jour du cycle ou quand on est sûr que la femme n’est pas enceinte,</li>
                <li>•	On fait une petite incision sur la peau, à la face interne du bras, puis on place les six tubes sous la peau,</li>
                <li>•	On referme la petite plaie et on la soigne jusqu’à la guérison (au bout de 5 à 6 jours on enlève le pansement),</li>
                <li>•	Pour enlever les tubes il faut encore une petite incision.</li>
            </ul>
            </div>

            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>•	Il est très efficace (98 à 99% de taux de réussite),</li>
                        <li>•	Il est discret,</li>
                        <li>•	Son action peut durer jusqu’à 5 ans,</li>
                        <li>•	Sa protection est continue,</li>
                        <li>•	Il est indépendant de l’activité sexuelle,</li>
                        <li>•	Il n’y a pas d’oubli possible,</li>
                        <li>•	Il n’entraîne pas d’infection génitale chez la femme,</li>
                        <li>•	La femme peut avoir une grossesse peu après le retrait du Norplant.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInRight"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>•	Saignements,</li>
                        <li>•	Absence de règles,</li>
                        <li>•	Nausées,</li>
                        <li>•	Vertiges,</li>
                        <li>•	Nervosité,</li>
                        <li>•	Expulsion de capsule,</li>
                        <li>•	Infection du site d’insertion,</li>
                        <li>•	Prise ou perte de poids,</li>
                        <li>•	Tension mammaire.</li>
                        <li>•	Ses inconvénients</li>
                        <li>•	Son insertion et son retrait nécessitent un personnel qualifié,</li>
                        <li>•	Il ne peut pas être inséré à toutes les femmes,</li>
                        <li>•	Il ne protège pas contre les IST/VIH/SIDA,</li>
                        <li>•	Il ne peut être administré que par les agents de santé.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="10" required/>
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



