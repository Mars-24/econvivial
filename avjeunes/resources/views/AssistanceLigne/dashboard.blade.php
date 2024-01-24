@extends("Template.otherTemplate")


@section("title")
    Bienvenue sur eCentre Convivial
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include("HeaderNav.navTeleConseiller")
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

        @include("Profile.teleConseillerSideProfil")
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Assistance d'utilisateurs en ligne</h4>
                                    <div class="row">
                                        <div class="col-sm-10 offset-1">
                                    @include("ChatTemplate.teleconseillerChat")
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="#">Centre Convivial</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed by Drigue <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::get("logged") == true)
            showSwal('success-message');
            $(".swal-title").html("Bonjour {{$utilisateur->username}} . Bienvenue sur eCentre Convivial. Vous etes téléconseillé {{\App\ProfessionConseiller::where("id", $utilisateur->profession_conseiller_id)->first()->libelle}}
                et vous allez aider les utilisateurs en la matière");
            $(".swal-text").hide();
            $(".swal-button").text("Continuer");
            @endif

            {{Session::put("logged", false)}}
        });
    </script>

@endsection