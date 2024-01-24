<!DOCTYPE html>
<html lang="fr">


<!-- Mirrored from www.bootstrapdash.com/demo/plus/jquery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 10:20:51 GMT -->
<head>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121995084-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-121995084-1');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield("title")</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="node_modules/jvectormap/jquery-jvectormap.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.jpg" />

    <!-- plugins:js -->
    <script src="js/jquery.min.js"></script>



    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="js/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery.avgrund/jquery.avgrund.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->

    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/todolist.js"></script>
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->

    <!-- Custom js for this page-->
    <script src="js/alerts.js"></script>
    <script src="js/avgrund.js"></script>
</head>
<body>

@yield("body")

<script type="text/javascript">
    $(document).ready(function(){
        window.setTimeout(function(){
            $(".alert-success").fadeTo(3000,500).slideUp(500, function(){
                $(this).remove();
            });

            $(".alert-danger").fadeTo(3000,500).slideUp(500, function(){
                $(this).remove();
            });
        });
    });
</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/plus/jquery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 10:21:36 GMT -->
</html>
