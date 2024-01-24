@extends("Template.mainTemplate")


@section("title")
    Jouez au QUIZ
@endsection


@section("body")

    <style type="text/css">
        .widget-card-1{
            height: 220px;
        }
    </style>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.nav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">


                    <div class="row">

                        <!-- card1 end -->
                        <!-- card1 start -->
                        @foreach($modules as $module)
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <a href="">
                                    <div class="card-block-small">
                                        <a href="play-dash-quiz?ref={{$module->id}}&token={{Session::token()}}" >
                                            <i class="icofont icofont-warning-alt bg-googleplus card1-icon">
                                                <span class="fa fa-gamepad"></span>
                                            </i>
                                            <span class="text-googleplus f-w-600">{{$module->libelle}}</span>
                                            <h4></h4>
                                            <div>
                      <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>{{$module->description}}
                      </span><br/>
                                                @foreach(DB::select("select SUM(point) as point from quiz_results where user_id = ".Auth::user()->id." and quiz_module_id = ".$module->id) as $total)
                                                    <span class="f-left m-t-10 text-muted" style="color: red; font-size: 15px;">
                        Vous avez {{ $total->point != null ? $total->point : 0 }} point(s) pour ce QUIZ</span>
                                                @endforeach

                                            </div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- card1 end -->
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

@endsection