@extends("Template.newVitrineTemplate")

@section("title")
    Le dépistage volontaire du VIH
@endsection

@section("referencement")

    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/rapport-pe">
    <meta name="robots" content="index, follow">

    <meta name="image" content="https://econvivial.org/dist/img/conseils/depistage.jpg"/>

@endsection

@section("body")

    <section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
        
                  <div class="space-20"></div>
            <div class="row text-center">
                <div class="col-sm-3" >
                    <a href="images/conseils/PDF/M3.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>
                </div>

                <div class="col-sm-3">
                    <b>Ecouter l'audio éwé</b> <br/>
                    <audio controls>
                        <source src="images/conseils/EWE/M3.mp3" type="audio/mpeg">
                        Votre navigateur ne supporte pas les contenues audio
                    </audio>
                </div>

                <div class="col-sm-3">
                    <b>Ecouter l'audio kabyè </b> <br/>
                    <audio controls>
                        <source src="images/conseils/KABYE/M3.mp3" type="audio/mpeg">
                        Votre navigateur ne supporte pas les contenues audio
                    </audio>
                </div>

                <div class="col-sm-3">
                    <b> Ecouter l'audio français </b> <br/>
                    <audio controls>
                        <source src="images/conseils/FRANCAIS/M3.mp3" type="audio/mpeg">
                        Votre navigateur ne supporte pas les contenues audio
                    </audio>
                </div>

            </div>
            
        <div class="space-70"></div>
        <div class="container">
            <h2 class="text-center" style="color:#ff4081;">Le dépistage volontaire du VIH </h2>
            <div class="space-50"></div>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 text-center">
                    <p style="color:#3F729B;">
                        <i class="fa fa-caret-right" style="font-size: 45px;margin-top: 10px;color:#ff4081;"></i>
                        Le test de dépistage est une analyse de sang qui permet de connaître son statut
                        sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">

                    <p>
                    <h4 style="color: #007E33;"><i class=""></i> AVANTAGES DE DEPISTAGE DU VIH</h4>
                    <ul>
                        <li>Connaître son statut sérologique permet de
                            changer de comportement</li>
                        <li>Etre rassuré et préserver son statut si on est
                            séronégatif</li>
                        <li>Se faire prendre en charge rapidement</li>
                        <li>Permettre un suivi médical</li>
                        <li>Etre rassuré avant le mariage</li>
                        <li>Vivre positivement.</li>
                    </ul>
                    </p>

                    <p>
                    <h4 style="color: red; text-transform: uppercase;">NOTEZ BIEN</h4>

                    <ul>
                        <li>Si vous êtes séronégatif, continuez à prendre
                            des mesures pour ne pas être infecté et refaire le
                            test après 1 mois</li>
                        <li>Si vous êtes séropositif vous devez vous
                            protéger pour éviter de vous réinfecter ou
                            infecter d'autres personnes</li>
                        <li>Vous devez protéger vos partenaires</li>
                        <li>Les femmes enceintes doivent se faire consulter
                            pour éviter de transmettre le virus à leurs bébés</li>
                        <li>Le séropositif ou la PVVIH doit respecter les
                            règles d'hygiène de vie pour rester en bonne
                            santé le plus longtemps possible.</li>
                    </ul>
                    </p>
                </div>
                <div class="col-sm-6 wow fadeInRight" style="padding-left :20px;">
                    <div class="row">
                        <p >
                            <img class="img img-responsive" src="dist/img/conseils/depistage.jpg" >
                        </p>

                    </div>

                    <div style="border: 3px solid red; border-radius: 20px;padding: 20px;text-align: center;">
                        <p>
                        <h4 style="color:red;">
                            CENTRES DE DEPISTAGE
                        </h4>
                        <p>
                            Aujourd'hui, dans presque tous les Centres
                            de Santé publics à Lomé et à l'intérieur du pays :
                        </p>
                        </p>
                    </div>

                </div>
            </div>

  
        </div>
        <div class="space-80"></div>
    </section>


@endsection