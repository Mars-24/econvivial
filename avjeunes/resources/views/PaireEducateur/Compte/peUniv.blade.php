@extends("Template.otherTemplate")


@section("title")
    Compte de PE universitaire
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
            <div class="main-panel" >
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Création des PE universitaires</h4>
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

                                            <form class="form" action="{{route('post-save-pe-univ')}}" method="POST">

                                                @foreach($regions as $region)
                                                    <span style="display: none;" id="code{{$region->id}}">{{$region->code}}</span>
                                                @endforeach

                                                @foreach($universites as $universite)
                                                    <span style="display: none;" id="univ{{$universite->id}}">{{$universite->code}}</span>
                                                @endforeach

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label ">Université</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="universite" {{old("universite")}} id="universite" required>
                                                                    <option selected disabled>Choisir l'université correspondante</option>
                                                                    @foreach($universites as $universite)
                                                                        <option value="{{$universite->id}}">{{$universite->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label ">Région</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="region" {{old("region")}} id="region" required>
                                                                    <option selected disabled>Choisir la région correspondante</option>
                                                                    @foreach($regions as $region)
                                                                        <option value="{{$region->id}}">{{$region->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-3">N° Téléphone</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="numero" {{old("numero")}} id="telephone" placeholder="N° de téléphone du PE universitaire" required />
                                                                <span class="errormsg" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-3">Code PE Univ</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="code" style="text-transform: uppercase;" {{old("code")}} id="code" placeholder="Code PE" required />
                                                                <span class="errormsg" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-6">

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label ">Superviseur associé</label>
                                                            <div class="col-sm-9">
                                                                <select style='text-transform: uppercase;' class="form-control" name="superviseur" {{old("superviseur")}} id="superviseur" required>
                                                                    <option selected disabled>Choisir le superviseur associé</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6" >
                                                            <input type="hidden" name="number" value="{{$number}}" />
                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>



                                                <div class="row">
                                                    @if(count($users) > 0)
                                                        <button style="margin-left: 10px;margin-bottom: 20px;" class="btn btn-primary" onclick="printContent('dataTable')">Imprimer</button>
                                                        <button type="button" id="exportExcel" onclick="exportTableToExcel('table', 'ListePEUniversitaire')" style="margin-left: 10px;margin-bottom: 20px;" class="btn btn-success">Exporter en excel</button>
                                                    @endif

                                                </div>
                                                <div id="dataTable">
                                            <table id="table" class="table table-bordered table-condensed table-striped " cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Région</th>
                                                    <th>Téléphone</th>
                                                    <th>Université</th>
                                                    <th>Superviseur Associé</th>
                                                    <th>Etat du compte</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="item{{$user->id}}">
                                                        <td>{{$user->paireducateur->code}}</td>
                                                        <td>{{$user->paireducateur->region->libelle}}</td>
                                                        <td>{{$user->numero}}</td>
                                                        <td>{{$user->paireducateur->ecole->libelle}}</td>
                                                        <td style="text-transform: uppercase;">
                                                            @if(\App\AffectationPE::where("educateur_id", $user->id)->first() != null)
                                                                @if(\App\User::where("id", \App\AffectationPE::where("educateur_id", $user->id)->first()->affectant_id)->first() != null)
                                                                    @if(\App\User::where("id", \App\AffectationPE::where("educateur_id", $user->id)->first()->affectant_id)->first()->paireducateur != null)
                                                                        {{\App\User::where("id", \App\AffectationPE::where("educateur_id", $user->id)->first()->affectant_id)->first()->paireducateur->code}}
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>@if($user->actif) <span style="color: green; font-size: 20px;">Actif</span> @else
                                                                <span style="color: red; font-size: 20px;">Non actif</span>@endif</td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$user->id}}">Supprimer</button></td>
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


    <div class="modal fade"  id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content" style="background-color: white;">
                <form class="form" action="{{route('edit-superviseur-account')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier le compte d'un superviseur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-nom" name="nom" placeholder="Nom du PE" required />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Prénom</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-prenom"  name="prenom" placeholder="Prénom du PE" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" id="edit-email" name="email" placeholder="exemple@email.com" required />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">N° Téléphone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-telephone" name="numero" id="telephone" placeholder="N° de téléphone du PE" required />
                                        <span class="errormsg" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Sexe</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="sexe"  id="edit-sexe" required>
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label ">Région</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="region" id="edit-region" required>
                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}">{{$region->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ets / Départ...</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="ecole" id="edit-ecole" required>

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="id" name="id" />
                        <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}" />
                        <button type="submit" class="btn btn-success edit-button">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('delete-superviseur-account')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un superviseur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:red;">
                        <p>Voulez-vous vraiment supprimer cet utilisateur ?</p>
                        <p>Cet utilisateur sera supprimer avec toutes les opérations qu'il a eu à effectuer dans le système.</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="superviseur-id" name="id" />
                        <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}" />
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        var univ;

        $("#universite").on("change", function () {
            var id = $(this).val();
            univ = $("#univ"+id).text();
        });


        $("#region").on("change", function () {
            var id = $(this).val();
            var codeReg = $("#code"+id).text();
            $("#code").val(codeReg+"-PE-"+univ);
            var universite = $("#universite").val();

            $.ajax({
                type : "POST",
                url:"{{route('superviseur-univ-liste')}}",
                data:{
                    '_token': '{{Session::token()}}',
                    'id': id,
                    'univ': universite,
                },
                success: function(data){
                    $("#superviseur").empty();
                    $("#superviseur").append("<option selected disabled >Choisir le superviseur associé</option>");
                    for(var i =0; i < data.length; i++){
                        $("#superviseur").append("<option  value='"+data[i]["id"]+"' >"+data[i]["code"]+"</option>");
                    }
                },
                error :function(data){
                    alert("Impossible de récupérer la liste des superviseurs")
                }
            });
        });

        $("#edit-region").on("change", function(){
            var id = $(this).val();
            $.ajax({

                type : "POST",
                url : "{{route('getEcoleByRegion')}}",
                data : {
                    "id" : id,
                    "_token" : "{{Session::token()}}"
                },
                success: function (data) {
                    $("#edit-ecole").empty();
                    for(var i =0; i < data.length; i++){
                        $("#edit-ecole").append("<option value='"+data[i]["id"]+"' >"+data[i]["libelle"]+"</option>");
                    }
                },
                error:function (data) {
                    alert("Une erreur s'est produite, impossible de charger les établissements");
                }
            });
        });

        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            var ecoles = $(this).data("ecoles");
            //  alert("Region :"+$(this).data("region")+" & ecoles :"+ecoles);
            for(var i = 0; i < ecoles.length; i++){
                $("#edit-ecole").append("<option value='"+ecoles[i]["id"]+"'>"+ecoles[i]["libelle"]+"</option>");
            }
            $("#id").val($(this).data("id"));
            $("#edit-nom").val($(this).data("nom"));
            $("#edit-prenom").val($(this).data("prenom"));
            $("#edit-telephone").val($(this).data("telephone"));
            $("#edit-sexe").val($(this).data("sexe"));
            $("#edit-email").val($(this).data("email"));
            $("#edit-region").val($(this).data("region"));
            $("#edit-ecole").val($(this).data("ecole"));

            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#superviseur-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-objet").on("click", function () {
            var id =  $("#formation-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('postDeleteFormationSanitaire')}}",
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
                    alert("Une erreur s'est produite, impossible de supprimer. La formation sanitaire est déjà utilisé dans le système.")
                }
            });
        });


        $(document).ready(function(){
            $('#telephone').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errormsg').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#frais').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.msgFrais').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#contact').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.msgContact').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#edit-telephone').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errormsg').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#edit-frais').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.msgFrais').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#edit-contact').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.msgContact').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });
        });

    </script>

@endsection