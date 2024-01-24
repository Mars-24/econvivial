@extends("Template.newVitrineTemplate")

@section("title")
   Contact | eCentre Convivial
@endsection

@section("referencement")
    <meta name="description" content="" />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
    <meta name="category" content="Contactez-nous">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/contact">
    <meta name="robots" content="index, follow">
@endsection

@section("body")

    <!--Header-Area-->
    <header class="blue-bg relative fix" id="home"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <div class="section-bg overlay-bg dewo ripple"></div>
        <!--Mainmenu-->

    @include("HeaderNav.vitrineNav")
    <!--Mainmenu/-->
        <div class="space-80"></div>
        <!--Header-Text/-->
    </header>


    <div id="contact"></div>
    <div id="maps"></div>

    <div class="row">
    <div class="container">
        <div class="offset-top">
            <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="well well-lg">
                    <h3>Laissez-nous un message</h3>
                    <div class="space-20"></div>
                    <form action="http://quomodosoft.com/html/appro/demo/process.php" id="contact-form" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="form-name" class="sr-only">Nom</label>
                                    <input type="text" class="form-control" id="form-name" name="form-name" placeholder="Nom" required>
                                </div>
                                <div class="space-10"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="form-email" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="form-email" name="form-email" placeholder="Email" required>
                                </div>
                                <div class="space-10"></div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-subject" class="sr-only">Email</label>
                                    <input type="text" class="form-control" id="form-subject" name="form-subject" placeholder="Objet" required>
                                </div>
                                <div class="space-10"></div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-message" class="sr-only">comment</label>
                                    <textarea class="form-control" rows="6" id="form-message" name="form-message" placeholder="Message" required></textarea>
                                </div>
                                <div class="space-10"></div>
                                <button class="btn btn-link no-round text-uppercase" type="submit">Envoyez le message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="well well-lg">
                    <h3>Adresse</h3>
                    <div class="space-20"></div>
                    <p> </p>
                    <div class="space-25"></div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <div class="border-icon sm"><span class="ti-headphone-alt"></span></div>
                            </td>
                            <td><a href="callto:+22890306374">(+228) 90306374</a></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="border-icon sm"><span class="ti-email"></span></div>
                            </td>
                            <td>
                                <a href="mailto:togo@econvivial.org">togo@econvivial.org</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="border-icon sm"><span class="ti-location-pin"></span></div>
                            </td>
                            <td>
                                <address>AGOE LOGOPE, RUE CEDEAO </address>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include("Footer.vitrineFooter")
    <!--Footer-area-->


@endsection