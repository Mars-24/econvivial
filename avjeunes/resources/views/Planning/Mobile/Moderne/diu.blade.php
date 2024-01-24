

@extends("Template.newVitrineTemplate")

@section("title")
    Le dispositif intra-utérin (DIU))
@endsection

@section("body")

    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        <div class="space-70"></div>
        <div class="container">

            <div class="wow fadeInLeft">
            <h2 class="text-center" style="color:#223dff;">Le dispositif intra-utérin (DIU)) </h2>
            <div class="space-50"></div>
            <p style="text-align: center;">
                C’est un petit appareil qu’on introduit dans la cavité de l’utérus pour
                éviter la grossesse. On l’appelle également stérilet. Il existe plusieurs types dont le DIU
                libérateur d’hormones et le DIU au cuivre (le plus couramment au Togo).
            </p>

            <h3><b>Comment agit le DIU au cuivre pour empêcher la grossesse ?</b></h3><br/>
            <ul style="margin-left: 20px;">
                <li>•	Il immobilise les spermatozoïdes pour les empêcher de monter dans les trompes,</li>
                <li>•	Il perturbe l’utérus et le rend incapable d’accueillir l’oeuf fécondé,</li>
                <li>•	Il accélère le passage de l’ovule dans la trompe.</li>
            </ul>

            <br/>
            <h3><b>Comment l’utilise-t-on?</b></h3><br/>
            <ul style="margin-left: 20px;">
                <li>•	Le DIU doit être placé de préférence pendant les règles ou quand on est sûr que la femme n’est pas enceinte,</li>
                <li>•	Il est introduit dans la cavité de l’utérus et les fils restent visibles dans le vagin,</li>
                <li>•	Il ne peut être placé que par les agents de santé formés à cet effet,</li>
                <li>•	La femme doit se faire contrôler régulièrement à la formation sanitaire,</li>
                <li>•	Le retrait peut intervenir dès que la porteuse le demande.</li>
            </ul>
            </div>
            <div class="space-50"></div>
            <div class="row">
                <div class="col-sm-6 wow fadeInRight" style="padding: 20px; border-right: 1px solid black;">
                    <h4 style="color: green;"><u>Avantages</u> </h4>
                    <ul>
                        <li>•	Il est très efficace (99% pour le DIU au cuivre)</li>
                        <li>•	Il est discret,</li>
                        <li>•	Il évite les effets secondaires de la pilule,</li>
                        <li>•	Il est indépendant de l’activité sexuelle,</li>
                        <li>•	Il n’y a pas d’oubli possible,</li>
                        <li>•	Il ne gêne pas la production de lait chez la femme allaitante,</li>
                        <li>•	La femme peut avoir une grossesse dès le retrait du DIU,</li>
                        <li>•	Son effet peut durer dix (10) ans.</li>
                    </ul>

                </div>

                <div class="col-sm-6 wow fadeInUp"  style="color:#3F729B;padding: 20px;">
                    <h4 style="color: #ff4081;"><u>Inconvenients</u></h4>
                    <ul>
                        <li>•	Saignements abondants,</li>
                        <li>•	Douleurs au bas ventre,</li>
                        <li>•	Perte des fils,</li>
                        <li>•	Infection génitale.</li>
                        <li>•	Sa pose et son retrait nécessitent un personnel formé,</li>
                        <li>•	Il ne peut pas être placé chez une femme qui n’a pas encore accouché,</li>
                        <li>•	Il ne protège pas contre les IST/VIH/SIDA,</li>
                        <li>•	Examen quelques fois nécessaire,</li>
                        <li>•	Peut s’expulser spontanément.</li>
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
                            <input class="form-control" type="hidden" id="planning" value="11" required/>
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




