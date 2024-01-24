@extends("Template.otherTemplate")


@section("title")
    Flux de planning familial
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovPlanningFA")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Flux de planning familial</h4>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group row">
                                                <label class="control-label">CPN :
                                                @if($formationSanitaire != null)
                                                    {{$formationSanitaire->libelle}}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-8"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">

                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                            @if(Session::has('message'))
                                                <div class="form-group">
                                                    <div class="alert alert-success">
                                                        <p>{{Session::pull('message')}} </p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(Session::has('error'))
                                                <div class="form-group">
                                                    <div class="alert alert-danger">
                                                        <p>{{Session::pull('error')}} </p>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col">
                                                <div class="col-sm-4">
                                                    <div class="form-group row">
                                                        <label class="control-label"> Statistique des bénéficiare pour planning familial</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group row">
                                                        <label class="control-label" style="margin-right: 20px;"> SP : SANAYA PRESS  </label>
                                                        <label class="control-label" style="margin-right: 20px;"> P : Pilules</label>
                                                        <label class="control-label" style="margin-right: 20px;"> DIU : Dispositif Intra-Utérin</label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label" style="margin-right: 20px;"> CU : Contraception d’Urgence  </label>
                                                        <label class="control-label" style="margin-right: 20px;"> AS : Abstinence Sexuelle</label>
                                                        <label class="control-label" style="margin-right: 20px;"> MT : Méthode de Température</label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label" style="margin-right: 20px;"> MGC : Méthode de la Glaire Cervicale  </label>
                                                        <label class="control-label" style="margin-right: 20px;"> MJF : Méthode des Jours Fixes</label>
                                                        <label class="control-label" style="margin-right: 20px;"> MT : Méthode d’Allaitement Maternel et de l’Aménorrh</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div id="app">
                                                        {!! $chart->container() !!}
                                                    </div></div>
                                            </div>
                                            <script src="https://unpkg.com/vue"></script>
                                            <script>
                                                var app = new Vue({
                                                    el: '#app',
                                                });
                                            </script>
                                            <script
                                                src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js
                                                charset=utf-8></script>
                                            {!! $chart->script() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html-->
            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection

<style type="text/css">
    /*-- Numerotation table --*/
    /**/
    table {
        counter-reset: case;
    }

    #num:before {
        counter-increment: case;
        content: counter(case);
    }
</style>

