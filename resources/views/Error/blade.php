@extends("Template.registerTemplate")

@section("title")
 Une erreur s'est produit

    @endsection

@section("body")

    <div class="container-scroller">

<div class="navbar-fixed">
  <nav >
    <div class="nav-wrapper" style="background-color: white;">
        <div class="container">
      <a href="http://e-centreconvivial.org" class="brand-logo">
          <img style="width:175px; margin-left: 0px;" src="dist/img/logo-convivial.jpg" alt="">
      </a>
        </div>
    </div> 
  </nav> 
</div>

        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center">
                <div class="row w-100">
                            <h2>Oups!!! La page que vous essayez d'accéder n'existe pas</h2>
                                <p>
                                    <a class="btn btn-primary" href="window.location.href ='javascript:history.go(-1)'"> Revenir à la page précédente</a>
                                </p>

                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @endsection