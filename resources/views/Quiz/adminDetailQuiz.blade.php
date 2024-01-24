@extends("Template.otherTemplate")


@section("title")
   Détail des résultats des Quiz
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
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
                                    <h4 class="card-title">Quiz de l'utilisateur {{\App\User::where("id", $userID)->first()->username}}</h4>
                                    <div class="row">
                                        <div class="col-sm-12">


                                            <table class="table table-bordered table-condensed " cellspacing="0">

                                                @foreach($modules as $module)
                                                <thead>
                                                <tr>
                                                    <th colspan="5" class="text-center">{{$module->libelle}}</th>
                                                </tr>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Question</th>
                                                    <th>Réponse</th>
                                                    <th>Point gagné</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(\App\QuizResult::where("user_id", $userID)->where("quiz_module_id", $module->id)->orderBy("id", "asc")->get() as $quiz)
                                                    <tr>
                                                        <td>{{$quiz->question}}</td>
                                                        <td>{{$quiz->getQuizQuestion($quiz->question, $module->id) }}</td>
                                                        <td>@if($quiz->trouver) <b style="color: green">Bonne réponse</b> @else
                                                                <b style="color: red">Mauvaise réponse</b> @endif</td>
                                                        <td><b style="color: black;font-size: 20px;">{{$quiz->point}}</b></td>
                                                        <td> {{date_format(date_create($quiz->created_at), "d/m/y")}} </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                @endforeach

                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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