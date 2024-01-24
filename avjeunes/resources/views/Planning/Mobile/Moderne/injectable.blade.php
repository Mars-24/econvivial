
@extends("Template.newVitrineTemplate")

@section("title")
    Les contraceptifs injectables
@endsection

@section("body")


    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center wow fadeInDown" style="color:#223dff;">Les contraceptifs injectables</h2>
            <div class="space-50"></div>
            <div class="wow fadeInDown">
            <p style="text-align: center;">
                Ce sont des produits liquides contenant de la progestérone, destinés à être
                administrés dans l’organisme de la femme pour empêcher la survenue d’une grossesse.
            </p>

            <h4><b>
                    Comment les contraceptifs injectables agissent-ils pour empêcher la grossesse ?
                </b></h4> <br/>
            <ul style="margin-left: 20px;">
                <li>•	Ils bloquent l’ovulation,</li>
                <li>•	Ils perturbent la paroi utérine qui devient lisse et ne peut recevoir l’œuf,</li>
                <li>•	Ils épaississent la glaire cervicale qui empêche la montée des spermatozoïdes vers l’utérus ;</li>
                <li>•	Comment utilise-t-on les contraceptifs injectables ?</li>
                <li>•	la première injection a lieu entre le premier et le 7ème jour du cycle ou si on est raisonnablement sûr que la femme n’est pas enceinte,</li>
                <li>•	après cette période elle recevra son injection toutes les douze (12) semaines.</li>
            </ul>
            </div>

            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>•	Ils sont très efficaces,</li>
                        <li>•	Leur utilisation est discrète,</li>
                        <li>•	Ils sont disponibles dans les formations sanitaires et les pharmacies,</li>
                        <li>•	La prise est suffisamment espacée et plus supportable,</li>
                        <li>•	Ils sont indépendants de l’activité sexuelle,</li>
                        <li>•	Ils ne provoquent pas d’infection génitale,</li>
                        <li>•	Ils ne gênent pas la production de lait chez la femme allaitante.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInRight"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>•	Leurs effets secondaires</li>
                        <li>•	Ils peuvent entraîner une prise de poids,</li>
                        <li>•	Une absence de règles,</li>
                        <li>•	Des saignements vaginaux, nausées, vertiges, vomissements,</li>
                        <li>•	Une Tension artérielle élevée.</li>
                        <li>•	Leurs inconvénients</li>
                        <li>•	Leur utilisation nécessite un personnel qualifié,</li>
                        <li>•	Ils nécessitent aussi un suivi médical,</li>
                        <li>•	Ils possèdent des effets secondaires,</li>
                        <li>•	Ils peuvent entraîner des troubles du cycle menstruel,</li>
                        <li>•	Le retour de la fertilité est lent,</li>
                        <li>•	Ils ne peuvent pas être prescrits à la nullipare ou à l’adolescente,</li>
                        <li>•	Ne sont pas indiqués pour toutes les femmes,</li>
                        <li>•	Ils ne protègent pas contre les IST/SIDA.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="9" required/>
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


