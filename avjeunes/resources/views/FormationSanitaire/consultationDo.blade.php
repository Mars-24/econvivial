@extends("Template.otherTemplate")


@section("title")
   Les consultations effectuées aux utilisateurs
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navFormationSanitaire")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include("Profile.formationSideProfil")

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Consultations effectuées  <b style="color: blue;"> {{\App\FormationSanitaire::where("id", $utilisateur->formation_sanitaire_id)->first()->libelle}}</b></h4>
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

                                            <table id="table" class="table table-bordered table-striped table-responsive"  cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Consultant</th>
                                                    <th>Objet Consulation</th>
                                                    <th>Motif de la consultation</th>
                                                    <th>Résultat de la consultation</th>
                                                    <th>Status</th>
                                                    <th>Attachez le résultat</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($consultations as $consultation)
                                                    <tr>
                                                        <td>{{date_format(date_create($consultation->created_at),"d M Y") }}</td>
                                                        <td><b>{{\App\User::where("id", $consultation->user_id)->first()->username}}</b></td>
                                                        <td><b>{{\App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle}}</b></td>
                                                        <td>{{$consultation->description}}</td>
                                                        <td><b> @if(!$consultation->result) <span style="color: red;"> Non défini</span> @else  <a class="btn btn-outline-success" href="#" target="_blank">Voir</a>  @endif</b></td>
                                                        <td>
                                                            <label class="badge badge-success badge-pill">Reçu</label>
                                                        </td>
                                                        <td>
                                                                <button class="btn btn-outline-success attach-button"
                                                                data-id="{{$consultation->id}}">Attachez le résultat</button>
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
                <footer class="footer">
                  @include("Footer.dashboardFooter");
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <div class="modal fade"  id="attachModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 50%;">

            <div class="modal-content" style="background-color: white;">
                <form class="form" action="{{route('send-result-to-user')}}" id="medocForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Envoyer le résultat de la consultation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 style="color: red;text-align: center;">Veuillez bien vérifier les informations du formulaire avant de l'envoyer. Il n'est plus possible de revenir en arrière après l'envoie.</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Recommandation <span style="color:red;font-size:15px;">*</span></label>
                                        <div class="col-sm-8">
                                        <input class="form-control" type="text" name="recommandation" placeholder="Recommandation au patient" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="ordonnaceRow">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Ordonnance <span style="color:red;font-size:15px;">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="nbreMedoc">
                                                <option selected disabled="true">Sélectionner le nombre de médicament</option>
                                            @for($i = 1 ; $i <= 10; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="blocMedoc" class="hidden">

                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"> <input id="noOrdonnance" type="checkbox" value="false"  name="noOrdonnance" /></label>
                                        <div class="col-sm-10">
                                            <label for="noOrdonnance" ><b style="color: red;margin-top: 10px;">Aucune ordonnance à attacher</b></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="id" name="id" />
                        <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}" />
                        <button type="button" class="btn btn-success submit-button">Envoyer</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade"  id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 50%;">

            <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmer l'envoie du résultat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 style="text-align: center;color: #1C2331;"><b>Voulez-vous vraiment envoyer le résultat à l'utilisateur ? Aucune annulation ou modification n'est possible après envoie.</b></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success send-button">OUI</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">NON</button>
                    </div>
            </div>
        </div>
    </div>
    <script>
        $(".attach-button").on("click", function () {
            $("#id").val($(this).data("id"));
            $("#attachModal").modal("show");
        })

        /**
         * Aucune ordonnance à attacher
         */

        $("#noOrdonnance").on("change", function () {
           var x = document.getElementById("noOrdonnance").checked;
           if(x === true){
               $("#ordonnaceRow").hide("slow");
               $("#blocMedoc").hide("slow");
               $("#noOrdonnance").val(true);
           }else{
               $("#ordonnaceRow").show("slow");
               $("#blocMedoc").show("slow");
               $("#noOrdonnance").val(false);
           }
        });

        $(".submit-button").on("click", function () {
            $("#confirmModal").modal("show");
        });

        $(".send-button").on("click", function () {
            $("#medocForm").submit();
        });

        $("#nbreMedoc").on("click", function () {

            $nbre = $(this).val();
            $("#blocMedoc").empty();
            for(var i = 1; i <= $nbre ; i++){
                var bloc = "  <div class='col-sm-12'>\n" +
                    "                                <div class='form-group'>\n" +
                    "                                    <div class='form-group row'>\n" +
                    "                                        <label class='col-sm-4 col-form-label'>Nom Médicament "+i+" <span style='color:red;font-size:15px;'>*</span></label>\n" +
                    "                                        <div class='col-sm-8'>\n" +
                    "                                         <input class='form-control' name='medicament[]' placeholder='Nom du médicament N° "+i+" ' required  />\n" +
                    "                                        </div>\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                            </div>";
                $("#blocMedoc").append(bloc);
            }
        });
    </script>
@endsection