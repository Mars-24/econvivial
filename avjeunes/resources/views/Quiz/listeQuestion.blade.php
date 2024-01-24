@extends("Template.newVitrineTemplate")

@section("title")
    Quiz | eCentre Convivial
@endsection

@section("referencement")
    <meta name="description" content="Le Centre Convivial vous propose des jeux Puzzle et des questions Quizz pouvant vous permettre de gagner des prix. " />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
    <meta name="category" content="Suivi de grossesse">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/quiz">
    <meta name="robots" content="index, follow">
@endsection

@section("body")

    <!--Header-Area-->
    <header class="blue-bg relative fix" id="home">

        <div class="section-bg overlay-bg dewo ripple"></div>
        <!--Mainmenu-->

    @include("HeaderNav.vitrineNav")
    <!--Mainmenu/-->
        <div class="space-80"></div>
        <!--Header-Text/-->
    </header>
    <!--Header-Area/-->

    <img class="img img-responsive" src="images/services/jeux.jpg" style="width: 100%;height: 50vh;" alt="">
    <section>
        <div class="space-50"></div>
        <div class="container">

            <h2 class="text-center" style="color: #6eabd1;">Participez au Quiz sur le module {{$module->libelle}}</h2>

            <div class="space-50"></div>

            <span style="display: none;">{{$index = 1}}</span>
                @foreach($questions as $question)

                <div class="row" id="bloc{{$index}}" @if($index > 1)  style="display: none;" @endif>

                    <div class=" col-xs-12  ">
                        <div class="">
                        <span style="font-size: 25px; padding: 10px; border-radius: 40%; border: 1px solid black;margin-right: 10px; ">{{$index}}</span>   {{$question->libelle}}
                        </div>
                    </div>

                    @foreach(\App\QuizQuestionDetail::where("quiz_question_id", $question->id)->get() as $reponse)
                    <div class=" col-xs-12" style="margin-top: 20px;">
                        <div class="">

                            <div class="col-sm-1"> <input  class="reponseQuestion{{$question->id}}" onclick="selectedResponse($(this))"
                                                           data-reponse = "{{$reponse->id}}"
                                                           data-notification = "{{$reponse->notification}}"
                                                           data-trouver = "{{$reponse->isReponse}}"
                                                           data-point = "{{$reponse->point}}"
                                                           data-question_id = "{{$reponse->quiz_question_id}}"
                                                           type="radio"
                                                           id="reponse{{$reponse->id}}"
                                                           name="reponses{{$question->id}}[]"  />
                            </div>

                            <div class="col-sm-11">
                                    <label for="reponse{{$reponse->id}}">{{$reponse->libelle}}</label>
                            </div>

                        </div>
                    </div>

                    @endforeach
                    <div class="row text-center" style="margin-bottom: 15px;">
                        <button style="margin-top: 20px;"
                                data-question="{{$question->id}}"
                                data-module="{{$question->quiz_module_id}}"
                                class="btn btn-link text-uppercase playButton"
                                data-index = {{$index}}
                                id="play{{$reponse->id}}">Jouer</button>
                    </div>
                </div>


                <span style="display: none;">{{$index++}}</span>
                @endforeach

        </div>
    </section>
    <!--Work-Section-->

    @include("Footer.vitrineFooter")
    <!--Footer-area-->



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