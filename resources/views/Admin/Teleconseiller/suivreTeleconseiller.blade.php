@extends("Template.otherTemplate")


@section("title")
    Téléconseiller - Médécin
@endsection


@section("body")
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="padding-top: -10px;">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Discussions avec les utilisateurs</h4>
                                    <div class="row">
                                        <div class="col-sm-10 offset-1">
                                            @include("ChatTemplate.adminConseillerChat")
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

@endsection