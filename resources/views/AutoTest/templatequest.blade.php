<!DOCTYPE html>
<!-- saved from url=(0039)https://maladiecoronavirus.fr/se-tester -->
<html lang="fr"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>eCentre Convivial - Auto Test COVID-19 | Questionnaire</title>

    <meta property="og:url" content="https://testogo.econvivial.org">
    <meta property="og:type" content="website">
    <meta property="og:title" content="COVID-19 : Auto Test eConvivial">
    <meta property="og:description" content="Testez vos symptômes de Coronavirus COVID-19 sur l'application eCentre Convivial.">

    <meta property="og:image:alt" content="Logo MaladieCoronavirus.fr">


    <meta name="description" content="Testez-vous : questionnaire">


    <meta name="msapplication-TileColor" content="#C0C0C0">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="/data/main.css">


    <link rel="stylesheet" href="/data/all.css">



    <script type="text/javascript" src="/data/packed.js.téléchargement" crossorigin="anonymous"></script>



</head>

<body class="d-flex flex-column h-100">


<header class="header">
    <!-- <div class="header-container header-container">
        <a href="https://maladiecoronavirus.fr/" class="header-container-logo">
            <img src="/data/logo.svg" alt="Logo MaladieCoronavirus">
        </a>
    </div>!-->
</header>




<main role="main" class="flex-shrink-0">


    <div class="stepper">
        <div class="step">
            <div class="step-circle">
                <p>1</p>
            </div>
            <p class="step-title">Informations</p>
        </div>
        <div class="step active">
            <div class="step-circle">
                <p>2</p>
            </div>
            <p class="step-title">Questionnaire</p>
        </div>
        <div class="step">
            <div class="step-circle">
                <p>3</p>
            </div>
            <p class="step-title">Résultats</p>
        </div>
    </div>


            @yield('question')









            <input type="hidden" name="current_step" value="step_fever">
            <input type="hidden" name="current_context" value="version=1.10,session_started_at=2020-03-31T11:25:53.091092,user_fingerprint=2ccbc92af186c0955e707d3f8cb61ee84e790cdbcfc4d3857a3942311f3e0c066639d44d83eb4a60f265028a792276dc,session_signature=8044a7a4e52ba880d180ec733e02a10b9e4f1f2de849434122b5c461448c05049b8fea47aa22304928b95385e348f14c">
            <input type="hidden" name="current_sign" value="75fcc4d50aade70436549e9e618cd377a83c0be978a48ff8c3553c9a7f15ec524e6abe2b34a514ff922a3800a23e6de1">
            <input type="hidden" name="current_question_number" value="">

        </div>

        @yield('conseil')



        <div class="question-submit">

           <button class="button button-disabled" tabindex="32767"> <a class="btn btn-primary btn-lg buttonRetake">Continuer</a>

            


            </button>

        </div>
    </form>


</main>

<footer class="footer-menu">
    <div class="footer-menu-container">
        <div class="footer-menu-column">
            <h3>Contacts utiles</h3>
            <a href="tel:111">111 - (appel gratuit)</a>
            <a class="gov-link" href="covid19.gouv.tg" target="_blank">covid19.gouv.tg</a>
        </div>
        <!--
        <div class="footer-menu-column">
            <h3>Navigation</h3>
            <p>
                <a href="https://maladiecoronavirus.fr/">Accueil</a>
            </p>
            <p>
                <a href="https://maladiecoronavirus.fr/mentions-legales">Mentions légales</a>
            </p>
            <p>
                <a href="https://maladiecoronavirus.fr/partenaires">Partenaires</a>
            </p>
            <p>
                <a href="https://maladiecoronavirus.fr/presse">Presse</a>
            </p>
        </div>--!>
        <div class="footer-menu-colum footer-legal">
            <p class="text-legal">
                @yield('foot')
        </div>
    </div>
</footer>



</body></html>
