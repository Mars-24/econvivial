@extends("Template.otherTemplate")


@section("title")
    Enrégistrer un entretien | eCentre Convivial


@endsection



@section("body")

    <style>
        .special {
            border-collapse: collapse;
        }

        .special tr:first-child td {
            border-top: 0;
        }
        .special tr td:first-child {
            border-left: 0;
            height: 100%;
        }
        .special tr:last-child td {
            border-bottom: 0;
        }
        .special tr td:last-child {
            border-right: 0;
            height: 100%;
        }
    </style>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navPairEducateur")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.peSideProfil")
        <!-- partial -->
            <div class="main-panel" >
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nouvelle activit&eacute;</h4>
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
                                        </div>

                                        <div  class="col-sm-12" id="dataTable" >
                                            <table id="table" class="table table-bordered table-condensed table-responsive " cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Code Bénéficiaire</th>
                                                    <th>Statut</th>
                                                    <th>Type Activité</th>
                                                    <th>Thème IEC/ECC</th>
                                                    <th>Condom distribué</th>
                                                    <th>Référé</th>
                                                    <th>Profession</th>
                                                    <th>Région</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($entretiens as $entretien)
                                                    <tr class="item{{$entretien->id}}">

                                                        <td style="padding: 0px;">
                                                            <table class="special" style="margin: 0px; width: 100%;border-top: none !important;border-bottom: 0px;">
                                                                @foreach(\App\EntretienParticipant::where("entretien_pair_id", $entretien->id)->get() as $participant)
                                                                    <tr><td>{{$participant->code}} </td></tr>
                                                                @endforeach
                                                            </table>
                                                        </td>

                                                        <td style="padding: 0px;">
                                                            <table  class="special" style="margin: 0px; width: 100%;border-top: none !important;border-bottom: 0px;">
                                                                @foreach(\App\EntretienParticipant::where("entretien_pair_id", $entretien->id)->get() as $participant)
                                                                    <tr><td>{{$participant->statut. " cas"}} </td></tr>
                                                                @endforeach
                                                            </table>
                                                        </td>

                                                        <td>{{$entretien->typeactivite->libelle}}</td>

                                                        <td>{{$entretien->typeentretien->libelle}}</td>

                                                        <td style="padding: 0px;">
                                                            <table  class="special"  style="margin: 0px; width: 100%; border-top: 0px;border-bottom: 0px;">
                                                                <tbody >
                                                                <tr>
                                                                    <td>Masculin</td>
                                                                    <td>{{$entretien->condomMasculin}}</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Féminin</td>
                                                                    <td>{{$entretien->condomFeminin}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>

                                                        <td>{{$entretien->referer}}</td>

                                                        <td>
                                                            <table  class="special" style="margin: 0px; width: 100%;border-top: none !important;border-bottom: 0px;">
                                                                @foreach(\App\EntretienParticipant::where("entretien_pair_id", $entretien->id)->get() as $participant)
                                                                    <tr><td>{{$participant->profession != null ? $participant->profession : "Non Défini"}} </td></tr>
                                                                @endforeach
                                                            </table>
                                                        </td>

                                                        <td>
                                                            <table  class="special" style="margin: 0px; width: 100%;border-top: none !important;border-bottom: 0px;">
                                                                @foreach(\App\EntretienParticipant::where("entretien_pair_id", $entretien->id)->get() as $participant)
                                                                    <tr><td>{{$participant->region != null ? $participant->region->libelle : "Non Défini"}} </td></tr>
                                                                @endforeach
                                                            </table>
                                                        </td>

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


    <script>

        function changeValue(valeur) {
            $.ajax({

                type : "POST",
                url : "{{route('getInfoUserByCode')}}",
                data :{
                    "code" : valeur,
                    "_token" : "{{Session::token()}}",
                },
                success:function (data) {
                    if(data != "false"){
                        $("#nom").val(data["nom"]);
                        $("#prenom").val(data["prenom"]);
                        $("#nameBloc").show("slow");
                    }else{
                        $("#nameBloc").hide("slow");
                        alert("Elève ou étudiant inexistant");
                    }
                },
                error:function (data) {
                    $("#nameBloc").hide("slow");
                    alert("Elève ou étudiant inexistant");
                }
            });
        }


        $("#type").change(function(){

            var value = $(this).val();

            if(value == 2){

                $("#infoContent").empty();
                $("#infoMultiParticipant").hide();

                $("#typeBloc").removeClass("col-sm-6");
                $("#typeBloc").addClass("col-sm-4");

                $("#themeBloc").removeClass("col-sm-6");
                $("#themeBloc").addClass("col-sm-4");

                $("#partBloc").show();

            }else{

                showMutiUserInfo(1);

                $("#typeBloc").removeClass("col-sm-4");
                $("#typeBloc").addClass("col-sm-6");

                $("#themeBloc").removeClass("col-sm-4");
                $("#themeBloc").addClass("col-sm-6");

                $("#partBloc").hide();
            }
        });

        $("#typeEntretien").on("click", function(){

            var typeEntretien = $(this).val();
            $.ajax({

                type : "POST",
                url : "{{route('getContenuEntretienByType')}}",
                data :{
                    "id" : typeEntretien,
                    "_token" : "{{Session::token()}}",
                },
                success:function (data) {
                    $("#contenu").empty();
                    for(var i =0; i < data.length; i++){
                        $("#contenu").append("<option value='"+data[i]["id"]+"' >"+data[i]["contenu"]+"</option>");
                    }
                },
                error:function (data) {
                    alert("Impossible de récupérer les contenus correspondant à ce type d'entretien");
                }
            });

        });

        $("#participant").change(function(){
            var valeur = $(this).val();
            showMutiUserInfo(valeur);
        });
        function showMutiUserInfo(size){
            $("#infoMultiParticipant").show();
            $("#infoContent").empty();

            for (var i = 0; i <size; i++){
                $("#infoContent").append('<div class="row" style="margin-top: 20px;">\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <label class="col-sm-3 col-form-label">N° Tél.</label>\n' +
                    '                                                            <div class="col-sm-9">\n' +
                    '                                                                <input class="form-control" type="text" name="code[]" id="code" placeholder="Numéro de téléphone" />\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="sexe[]" {{old("sexe")}} id="sexe">\n' +
                    '                                                                    <option selected disabled>Choisir le sexe</option>\n' +
                    '                                                                    <option value="M">Masculin</option>\n' +
                    '                                                                    <option value="F">Féminin</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="age[]" {{old("age")}} id="age">\n' +
                    '                                                                    <option selected disabled>Choisir l\'age</option>\n' +
                    '                                                                    @for($i = 12; $i <= 35; $i++)\n' +
                    '                                                                    <option value="{{$i}}">{{$i}}</option>\n' +
                    '                                                                    @endfor\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="statut[]" {{old("statut")}} id="statut">\n' +
                    '                                                                    <option selected disabled>Choisir le statut</option>\n' +
                    '                                                                    <option value="Nouveau">Nouveau cas</option>\n' +
                    '                                                                    <option value="Ancien">Ancien cas</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="pays[]" {{old("pays")}} id="pays">\n' +
                    '                                                                    <option selected disabled>Choisir le pays</option>\n' +
                    '                                                                    <option value="TG">Togo</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="profession[]" {{old("profession")}} id="profession">\n' +
                    '                                                                    <option selected disabled>Choisir la profession</option>\n' +
                    '                                                                    <option value="Entrepreneur">Entrepreneur</option>\n' +
                    '                                                                    <option value="Employé">Employé</option>\n' +
                    '                                                                    <option value="Fonctionnaire">Fonctionnaire</option>\n' +
                    '                                                                    <option value="Etudiant">Etudiant</option>\n' +
                    '                                                                    <option value="Elève">Elève</option>\n' +
                    '                                                                    <option value="Apprenti">Apprenti</option>\n' +
                    '                                                                    <option value="Autre">Autre</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '													 <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="region[]" {{old("region")}} id="region">\n' +
                    '                                                                    <option selected disabled>Choisir la région correspondante</option>\n' +
                    '                                                                    <option value="LC">LOME COMMUNE</option>\n' +
                    '                                                                    <option value="MT">MARITIME</option>\n' +
                    '                                                                    <option value="PT">PLATEAUX</option>\n' +
                    '                                                                    <option value="CT">CENTRALE</option>\n' +
                    '                                                                    <option value="KR">KARA</option>\n' +
                    '                                                                    <option value="SV">SAVANES</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n\n')
            }

        }
    </script>
@endsection