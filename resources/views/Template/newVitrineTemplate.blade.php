<!doctype html>
<html  lang="fr">


<!-- Mirrored from quomodosoft.com/html/appro/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jul 2018 20:04:04 GMT -->
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121995084-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-121995084-1');
    </script>
	<script>
(function(I,n,f,o,b,i,p){
I[b]=I[b]||function(){(I[b].q=I[b].q||[]).push(arguments)};
I[b].t=1*new Date();i=n.createElement(f);i.async=1;i.src=o;
p=n.getElementsByTagName(f)[0];p.parentNode.insertBefore(i,p)})
(window,document,'script','https://livechat.infobip.com/widget.js','liveChat');

liveChat('init', '35365e2f-f63a-4c5f-8a8a-0339630c9eed');
</script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield("title")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.jpg" />

    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="css/vitrine/bootstrap.min.css">
    <link rel="stylesheet" href="css/vitrine/owl.carousel.min.css">
    <link rel="stylesheet" href="css/vitrine/themify-icons.css">
    <link rel="stylesheet" href="css/vitrine/animate.css">
    <link rel="stylesheet" href="css/vitrine/magnific-popup.css">

    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="css/vitrine/space.css">
    <link rel="stylesheet" href="css/vitrine/theme.css">
    <link rel="stylesheet" href="css/vitrine/overright.css">
    <link rel="stylesheet" href="css/vitrine/normalize.css">
    <link rel="stylesheet" href="css/vitrine/style.css">
    <link rel="stylesheet" href="css/vitrine/responsive.css">

     <!-- Bootstrap Dropdown Hover CSS -->
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/bootstrap-dropdownhover.min.css" rel="stylesheet">

    @yield("referencement")

    {{--<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link href="lib/animate/animate.min.css" rel="stylesheet">--}}
    {{--<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">--}}
    {{--<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">--}}
    {{--<link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">--}}
    {{--<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">--}}
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="js/vitrine/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vitrine/vendor/modernizr-2.8.3.min.js"></script>




    <style>
    .box {
        padding: 20px;
        margin-bottom: 40px;
        box-shadow: 20px 20px 20px rgba(73, 78, 92, 0.1);
        background: #fff;
        transition: 0.4s;
        height: 350px;
        text-align: center;
    }



    .box:hover {
        box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
        transform: translateY(-10px);
        -webkit-transform: translateY(-10px);
        -moz-transform: translateY(-10px);
    }

    .box .icon i {
        color: #444;
        font-size: 64px;
        transition: 0.5s;
        line-height: 0;
        margin-top: 34px;
    }

    .box .icon i:before {
        background: #0c2e8a;
        background: linear-gradient(45deg, #48b7d8 0%, #69ebe6 100%);
        background-clip: border-box;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .box-conseil {
        padding: 20px;
        margin-bottom: 40px;
        box-shadow: 20px 20px 20px rgba(249, 208, 224, 0.82);
        background: #fff;
        transition: 0.4s;
        height: 200px;
        text-align: center;
    }



    .box-conseil:hover {
        box-shadow: 0px 0px 30px rgba(249, 208, 224, 0.82);
        transform: translateY(-10px);
        -webkit-transform: translateY(-10px);
        -moz-transform: translateY(-10px);
    }

    .box-conseil .icon i {
        color: #444;
        font-size: 64px;
        transition: 0.5s;
        line-height: 0;
        margin-top: 34px;
    }

    .box-conseil .icon i:before {
        background: #0c2e8a;
        background: linear-gradient(45deg, #48b7d8 0%, #69ebe6 100%);
        background-clip: border-box;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .dropdown-menu > li >a{
        color:#444;
        padding: 15px;
    }

    .menu-drop{
        color:#444;
    }


    .box-conseilPratique {
        box-shadow: 20px 20px 20px rgba(73, 78, 92, 0.1);
        background: #fff;
        transition: 0.4s;
        height: auto;
        min-height: 550px;

    }

    .box-conseilPratique > a > img
    {
        width: 100%;
        height: auto;
        max-height: 100%;
    }    

    .box-conseilPratique:hover {
        box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
        transform: translateY(-10px);
        -webkit-transform: translateY(-10px);
        -moz-transform: translateY(-10px);
    }

        /*--------------------------------------------------------------
        # Top Bar
        --------------------------------------------------------------*/
        #topbar {
            background: #fff;
            padding: 5px 0;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        #topbar .contact-info a {
            line-height: 1;
            color: #555;
        }

        #topbar .contact-info a:hover {
            color: #50d8af;
        }

        #topbar .contact-info i {
            color: #50d8af;
            padding: 4px;
        }

        #topbar .contact-info .fa-phone {
            padding-left: 20px;
            margin-left: 20px;
            border-left: 1px solid #e9e9e9;
        }

        #topbar .social-links a {
            color: #555;
            padding: 4px 12px;
            display: inline-block;
            line-height: 1px;
            border-left: 1px solid #e9e9e9;
        }

        #topbar .social-links a:hover {
            color: #50d8af;
        }

        #topbar .social-links a:first-child {
            border-left: 0;
        }

        #topbar .intro-content .btn-get-started, #topbar .intro-content .btn-projects {
            font-family: "Raleway", sans-serif;
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 1px;
            display: inline-block;
            padding: 5px;
            border-radius: 2px;
            transition: 0.5s;
            margin: 10px;
            color: #fff;
            height: auto;
            text-align: center;
        }

        #topbar .intro-content .btn-get-started {
            background: #0c2e8a;
            border: 2px solid #0c2e8a;
        }

        #topbar .intro-content .btn-get-started:hover {
            background: none;
            color: #0c2e8a;
        }

        #topbar .intro-content .btn-projects {
            background: #50d8af;
            border: 2px solid #50d8af;
        }

        #topbar .intro-content .btn-projects:hover {
            background: none;
            color: #50d8af;
        }

    </style>



    <style>
        /* Popup box BEGIN */
        .hover_bkgr_fricc{
            background:rgba(0,0,0,.4);
            cursor:pointer;
            display:none;
            height:100%;
            position:fixed;
            text-align:center;
            top:0;
            width:100%;
            z-index:10000;
        }
        .hover_bkgr_fricc .helper{
            display:inline-block;
            height:100%;
            vertical-align:middle;
        }
        .hover_bkgr_fricc > div {
            background-color: #fff;
            box-shadow: 10px 10px 60px #555;
            display: inline-block;
            height: auto;
            max-width: 551px;
            min-height: 100px;
            vertical-align: middle;
            width: 60%;
            position: relative;
            border-radius: 8px;
            padding: 15px 5%;
        }
        .popupCloseButton {
            background-color: #fff;
            border: 3px solid #999;
            border-radius: 50px;
            cursor: pointer;
            display: inline-block;
            font-family: arial;
            font-weight: bold;
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 25px;
            line-height: 30px;
            width: 30px;
            height: 30px;
            text-align: center;
        }
        .popupCloseButton:hover {
            background-color: #ccc;
        }
        .trigger_popup_fricc {
            cursor: pointer;
            font-size: 20px;
            margin: 20px;
            display: inline-block;
            font-weight: bold;
        }
        /* Popup box BEGIN */
    </style>
</head>

<body data-spy="scroll" data-target="#mainmenu" data-offset="50">

    @yield("body")




    <script src="js/vitrine/vendor/bootstrap.min.js"></script>
    <!--Plugin JS-->
    <script src="js/vitrine/owl.carousel.min.js"></script>
    <script src="js/vitrine/scrollUp.min.js"></script>
    <script src="js/vitrine/magnific-popup.min.js"></script>
    <script src="js/vitrine/ripples-min.js"></script>
    <script src="js/vitrine/contact-form.js"></script>
    <script src="js/vitrine/spectragram.min.js"></script>
    <script src="js/vitrine/ajaxchimp.js"></script>
    <script src="js/vitrine/wow.min.js"></script>
    <script src="js/vitrine/plugins.js"></script>
    <!--Active JS-->
    <script src="js/vitrine/main.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Dropdown Hover JS -->
    <script src="js/bootstrap-dropdownhover.min.js"></script>
<!-- 
<a href="#top" id="scrollUp"  style="position: fixed; z-index: 2147483647;">
    <span class="fa fa-rocket"></span>
</a> -->
<!--Maps JS-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTS_KEDfHXYBslFTI_qPJIybDP3eceE-A&amp;sensor=false"></script>
<script src="js/vitrine/maps.js"></script>
<script src="js/jquery.min.js"></script>

<script>
    function saveConseilRead(conseil){
        $.ajax({
            type : "POST",
            url:"{{route('saveReadConseilPratique')}}",
            data:{
                '_token': '{{Session::token()}}',
                'conseil': conseil,
            },
            success: function(data){
                //alert("Like stocké avec succès");
            },
            error :function(data){
               // alert("Une erreur s'est produite");
            }
        });
    }
    
      function saveConseilReadSecond(conseil, telephone, sexe, age, profession, region){

        $.ajax({
            type : "POST",
            url:"{{route('saveReadConseilPratique')}}",

            data:{
                '_token': '{{Session::token()}}',
                'conseil': conseil,
                'telephone' : telephone,
                'sexe' : sexe,
                'age' : age,
                'profession' : profession,
                'region' : region,
            },
            success: function(data){
               //alert("Like stocké avec succès");
            },
            error :function(data){
              // alert("Une erreur s'est produite");
            }
        });
    }
    
    $("#modernesouscription").click(function(){
        var userID = $("#identifiant").val();
        var planningID = $("#planning").val();
        var dureeContrace = $("#duree").val();
        var dateContrace = $("#dateContraception").val();

        if(dateContrace.length === 0 ){
            alert("Veuillez remplir tous les champs");
        } else if (dureeContrace.length === 0){
            alert("Veuillez remplir tous les champs");
        }else {
            $.ajax({
                type: "POST",
                url: "{{route('save-mobile-planning-souscription')}}",
                data: {
                    '_token': '{{Session::token()}}',
                    'duree': dureeContrace,
                    'date': dateContrace,
                    'planning': planningID,
                    'userID': userID,
                    'methode': "moderne",
                },
                success: function (data) {
                    if (data === "success") {
                        alert("Souscription effectuée avec succès");
                    } else {
                        alert("Vous avez déjà souscris à ce planning");
                    }
                },
                error: function (data) {
                    $("#souscrire" + ressourceID).prop("disabled", false);
                    alert("Une erreur s'est produite, veuillez réessayer.")
                }
            });
        }
    });

    $("#naturelSouscription").click(function(){
        var userID = $("#identifiant").val();
        var planningID = $("#planning").val();
        var dureeContrace = $("#duree").val();
        var dateContrace = $("#dateContraception").val();

        $.ajax({
            type : "POST",
            url:"{{route('save-mobile-planning-souscription')}}",
            data:{
                '_token': '{{Session::token()}}',
                'duree': dureeContrace,
                'date': dateContrace,
                'planning': planningID,
                'userID': userID,
                'methode': "naturelle",
            },
            success: function(data){
                if(data === "success"){
                    alert("Souscription effectuée avec succès");
                }else{
                    alert("Vous avez déjà souscris à ce planning");
                }
            },
            error :function(data){
                $("#souscrire"+ressourceID).prop("disabled", false);
                alert("Une erreur s'est produite, veuillez réessayer.")
            }
        });
    });
</script>
</body>


<!-- Mirrored from quomodosoft.com/html/appro/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jul 2018 20:04:06 GMT -->
</html>