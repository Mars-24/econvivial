<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/plus/jquery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 10:20:51 GMT -->
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124602412-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());


  gtag('config', 'UA-124602412-1');

</script>

  <title>@yield("title")</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="css/perfect-scrollbar/css/perfect-scrollbar.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="node_modules/jvectormap/jquery-jvectormap.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/card-style.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="css/bootstrap-fileupload.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
  <script src="js/bootstrap-fileupload.js"></script>
  <!-- End custom js for this page-->

  <!-- Custom js for this page-->
  <script src="js/alerts.js"></script>
  <script src="js/avgrund.js"></script>
  <script src="js/datatables.net/jquery.dataTables.js"></script>
  <script src="js/datatables.net/dataTables.bootstrap4.js"></script>

  <script src="js/tooltips.js"></script>
  <script src="js/popover.js"></script>
  <style>
    .content-wrapper {
      background: #d5ecf2;
    }

    .form-control{
      background-color: #fff;
      background-image: none;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      border: 1px solid rgba(0,0,0,.15);
      border-radius: .25rem;
      box-shadow: inset 0 1px 1px rgba(5, 255, 246, 0.1);
    }
    .nav-item{

    }
    .sidebar .nav .nav-item .nav-link {
      color: #210505; }

    .main-panel{
      margin-top: 55px;
    }
    .sidebar{
      margin-top: 30px;
    }
  </style>
</head>
<body >

@yield("body")


@include("Theme.script")
<script>

    $(document).ready(function(){
        $('#table').DataTable({
            "order": [[ 0, "desc" ]],
            "oLanguage": {
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst":      "Premier",
                    "sPrevious":   "Pr&eacute;c&eacute;dent",
                    "sNext":       "Suivant",
                    "sLast":       "Dernier"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            }
        });
    });

</script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/plus/jquery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 10:21:36 GMT -->
</html>
