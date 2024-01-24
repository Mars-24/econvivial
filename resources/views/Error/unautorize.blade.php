@extends("Template.registerTemplate")

@section("title")
    Non autorisé

@endsection

@section("body")

    <div class="container-scroller">

        <div class="navbar-fixed">
            <nav >
                <div class="nav-wrapper" style="background-color: white;">
                    <div class="container">
                        <a href="{{route('accueil')}}" class="brand-logo">
                            <img style="width:175px; margin-left: 0px;" src="dist/img/logo-convivial.jpg" alt="">
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid page-body-wrapper full-page-wrapper" >
            <div class="content-wrapper d-flex align-items-center" style="background: rgba(0,0,0,0.62);text-align: center;margin-top: 0px; ;color: white;">
                <div class="row w-100 justify-content-center" >
                    <h2>Oups!!! Vous n'êtes pas autorisé à accéder à cette page .</h2>
                    <p>
                        <button onclick="goToPrecedent()" class="btn btn-primary go-button"> Revenez à la page précédente !</button>
                    </p>

                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection

<script type="text/javascript">
    function goToPrecedent(){
        window.location.href = 'javascript:history.go(-1)';
    }
</script>