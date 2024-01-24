@extends("Template.otherTemplate")


@section("title")
    Modules de Quiz
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
                                    <h4 class="card-title">Questions sur le QUIZ
                                        <span style="color: blue;font-size: 20px;">{{$module->libelle}}</span></h4>
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

                                                <div class="col-sm-12">
                                                    <form action="{{route('save-new-quiz-question')}}" method="POST">
                                                        <div class="row" style="margin-bottom: 30px;">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-sm-3">Question</label>
                                                                        <div class="col-sm-9">
                                                                            <input class="form-control" type="text" name="question" placeholder="Saisir une nouvelle question" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row justify-content-center">
                                                            <div class="form-group">
                                                                <div class="col-sm-6"  >
                                                                    <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                    <input type="hidden" name="quizModule" value="{{$quizModule}}" />
                                                                    <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            <br/>

                                            <table  class="table table-bordered table-condensed table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Question</th>
                                                    <th>Ajouter un élement de réponse</th>
                                                    <th>Supprimer la question</th>
                                                    <th>Elément de réponse</th>
                                                    <th>Notifications</th>
                                                    <th>Est une réponse ?</th>
                                                    <th>Point</th>
                                                    <th>Supprimer l'elmt Rpse</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($questions as $question)
                                                    <tr class="item{{$question->id}}">
                                                        <span style="display: none;">{{$reponses =  \App\QuizQuestionDetail::where("quiz_question_id", $question->id)->get()}}</span>
                                                        <span style="display: none;">{{$nbre =  count($reponses)}}</span>

                                                        <td rowspan="{{$nbre +1 }}">{{$question->id}}</td>
                                                        <td rowspan="{{$nbre +1}}">{{$question->libelle}}</td>
                                                        <td rowspan="{{$nbre +1}}">
                                                            <button class="btn btn-outline-primary add-question"
                                                                    data-id = "{{$question->id}}"
                                                                    data-label = "{{$question->libelle}}"

                                                            >Ajouter Elmt Répse</button>
                                                        </td>

                                                        <td rowspan="{{$nbre +1}}">
                                                            <button class="btn btn-outline-danger delete-modal" data-id = "{{$question->id}}">Suprimmer</button>
                                                        </td>


                                                                @foreach($reponses as  $reponse)
                                                                    <tr>
                                                                        <td>{{$reponse->libelle}}</td>
                                                                        <td>{{$reponse->notification}}</td>
                                                                        <td>{{$reponse->isReponse ? "OUI" : "NON"}}</td>
                                                                        <td> {{$reponse->point}} </td>

                                                                        <td>
                                                                            <button class="btn btn-outline-danger delete-reponse-modal" data-id = "{{$reponse->id}}" >Supprimer</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                    </tr>
                                                @endforeach
                                                </tbody>
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

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un QUIZ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cette question  ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="question-id" />
                    <button type="button" class="btn btn-danger delete-module">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteReponseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('delete-element-reponse')}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un  élément de réponse</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cet élément de réponse ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="reponse-id" name="id" />
                    <input type="hidden" name="_token" value="{{Session::token()}}" />
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addRpseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('save-alement-reponse')}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Ajouter un élement de réponse</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-sm-12">
                        <div class="form-group row">
                           <h4 style="color: blue;" id="questionLabel"></h4>
                        </div>
                    </div>
                    <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="control-label col-sm-3">Réponse</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" type="text" name="reponse" rows="5" required placeholder="Saisir un élément de réponse" ></textarea>
                                </div>
                            </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Est-il la bonne réponse ?</label>
                            <div class="col-sm-9">
                               <select class="form-control" name="choixReponse" required>
                                   <option selected disabled>Faites un choix</option>
                                   <option value="1">OUI</option>
                                   <option value="0">NON</option>
                               </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Point affecté</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="point" required>
                                    <option selected disabled>Choisir le point</option>
                                    <option value="0">0</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Notification à l'utilisateur</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" type="text" name="notification" rows="5" required placeholder="Notification à l'utilisateur" ></textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="hidden" id="questionAssocier" name="questionID" />
                    <button type="submit" class="btn btn-success">Enrégistrer</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>

                </form>
            </div>
        </div>
    </div>

    <script>


        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#question-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-reponse-modal").on("click", function (event) {
            event.preventDefault();
            $("#reponse-id").val($(this).data("id"));
            $("#deleteReponseModal").modal("show");
        });

        $(".add-question").on("click", function (event) {
            event.preventDefault();
            $("#questionAssocier").val($(this).data("id"));
            $("#questionLabel").text("Question : "+$(this).data("label")+" ?");
            $("#addRpseModal").modal({backdrop: 'static', keyboard: false});
        });

        $(".delete-module").on("click", function () {
            var id =  $("#question-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('delete-new-quiz-question')}}",
                data:{
                    '_token': '{{Session::token()}}',
                    'id': id
                },
                success: function(data){

                    $("#deleteModal").modal("hide");
                    $('.item'+ id).remove();

                },
                error :function(data){
                    $("#deleteModal").modal("hide");
                    alert("Une erreur s'est produite, impossible de supprimer ce QUIZ")
                }
            });
        });

    </script>

@endsection