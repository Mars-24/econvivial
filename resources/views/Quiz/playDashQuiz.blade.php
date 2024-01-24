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
        @include("Profile.sideProfil")
        <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 ">

                                        <h2 class="text-center" style="color: #6eabd1;">Participez au Quiz sur le module {{$module->libelle}}</h2>
                                        <div class="space-50"></div>
                                        <h2 class="text-center" style="color: red;">Vous avez <span id="pointTotal">{{$pointTotal != null ? $pointTotal : 0}}</span> point(s) pour ce module</h2>

                                        <span style="display: none;">{{$index = 1}}</span>
                                        @foreach($questions as $question)
                                            <div class="row" id="bloc{{$index}}" @if($index > 1)  style="display: none;" @endif>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="">
                                                            <span style="font-size: 25px; padding: 10px; margin-left : 20px; border-radius: 40%; border: 1px solid black;margin-right: 10px; ">{{$index}}</span>   {{$question->libelle}}
                                                        </div>
                                                    </div>
                                                </div>

                                                @foreach(\App\QuizQuestionDetail::where("quiz_question_id", $question->id)->get() as $reponse)
                                                    <div class="col-12" style="margin-left: 40px;">
                                                        <div class="form-group" style="margin-top: 20px;">
                                                            <div class="col-1"> <input  class="form-check-input reponseQuestion{{$question->id}}" onclick="selectedResponse($(this))"
                                                                                        data-reponse = "{{$reponse->id}}"
                                                                                        data-notification = "{{$reponse->notification}}"
                                                                                        data-trouver = "{{$reponse->isReponse}}"
                                                                                        data-point = "{{$reponse->point}}"
                                                                                        data-question_id = "{{$reponse->quiz_question_id}}"
                                                                                        type="radio"
                                                                                        id="reponse{{$reponse->id}}"
                                                                                        name="reponses{{$question->id}}[]"  /> </div>
                                                            <div class="col-11" style="margin-left: 10px;">
                                                                <label style="margin-top: 5px;" for="reponse{{$reponse->id}}">{{$reponse->libelle}}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                                <div class="col-md-12">
                                                    <div class="row justify-content-center">
                                                        <button style="margin-top: 20px;"
                                                                data-question="{{$question->id}}"
                                                                data-module="{{$question->quiz_module_id}}"
                                                                class="btn btn-outline-success btn-rounded playButton justify-content-center"
                                                                data-index = {{$index}}
                                                                        id="play{{$reponse->id}}">Jouer</button>
                                                    </div>
                                                </div>

                                            </div>


                                            <span style="display: none;">{{$index++}}</span>
                                        @endforeach
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
            <!-- partial -->

    </div>
    <!-- container-scroller -->
        <!-- page-body-wrapper ends -->
    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

        });
        var notification;
        var isReponse;
        var point;
        var reponse;
        var questionID;

        function selectedResponse(me) {
            notification = me.data("notification");
            isReponse = me.data("trouver");
            point = me.data("point");
            reponse = me.data("reponse");
            questionID = me.data("question_id");
    
        }

        $(".playButton").click(function(){

                    @if(Auth::check())
            var idQuestion = $(this).data("question");
            var index  = $(this).data("index");
            var module = $(this).data("module");
            var playButon = $(this);

            if (!$(".reponseQuestion"+idQuestion+":checked").val()) {
                alert('Veuillez sélectionner au moins une réponse');
            }else{

                //alert("Question ==> "+questionID+" and response ==> "+reponse);
                $(this).prop("disabled", true);
                $.ajax({
                    type : "GET",
                    url:"{{route('save-web-quiz-response')}}",
                    data:{
                        '_token': '{{Session::token()}}',
                        'module': module,
                        'question': idQuestion,
                        'reponse': reponse,
                        'trouver': isReponse,
                        'point': point,
                        'type': "NO TYPE",
                    },
                    success: function(data){
                        var total = $("#pointTotal").text();
                        if(data !== "deja"){
                            total = parseInt(total) + point;
                            $("#pointTotal").text(total);
                        }
                        alert(notification);
                        playButon.hide("slow");
                        $("#bloc"+(index+1)).show("slow");
                    },
                    error :function(data){
                        $(this).prop("disabled", false);
                        alert("Une erreur s'est produite, veuillez rejouer.")
                    }
                });

            }
            @else
                window.location.href = "connexion";
            @endif


        });
    </script>
@endsection