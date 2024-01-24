@extends("Template.otherTemplate")


@section("title")
    Enrégistrer un élève / étudiant
@endsection


@section("body")

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
                                    <h4 class="card-title">Nouvel élève / étudiant</h4>
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

                                                <form class="form" action="{{route('postCreateUserEleve')}}" method="POST">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Nom</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text" name="nom" placeholder="Nom de l'élève / étudiant" required />
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-sm-3">Prénom</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"  name="prenom" placeholder="Prénom de l'élève / étudiant" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Age</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text" id="age" name="age" placeholder="Age de l'élève / étudiant " required />
                                                                    <span class="errormsg" style="color: red;"></span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-sm-3">Sexe</label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control" name="sexe"  required>
                                                                        <option selected disabled="true">Veuillez sélectionner le sexe</option>
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
                                                                <label class="col-sm-3 col-form-label">Mot de passe</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="password" name="password" placeholder="Mot de passe de l'élève / étudiant" required />
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-sm-3">Confirmation</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="password" name="confirmation"  placeholder="Confirmer le mot de passe" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label ">Région</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"   value="{{$region->libelle}}"  onfocus="$(this).blur()" />
                                                                    <input class="form-control" type="hidden" name="region"  value="{{$region->id}}"  />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Ets / Départ...</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text"   value="{{$ecole->libelle}}"  onfocus="$(this).blur()" />
                                                                    <input class="form-control" type="hidden" name="ecole"  value="{{$ecole->id}}"  />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-sm-3">N° Téléphone</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="text" name="numero" id="telephone" placeholder="N° de téléphone " required />
                                                                    <span class="errormsg2" style="color: red;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row justify-content-center">
                                                        <div class="form-group">
                                                            <div class="col-sm-6" >
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                                <table id="table" class="table table-bordered table-condensed table-striped table-responsive" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th>Code élève / étudiant</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Téléphone</th>
                                                        <th>Age</th>
                                                        <th>Ets / Départ...</th>
                                                        <th>Région</th>
                                                        <th>Modifier</th>
                                                        <th>Supprimer</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                        <tr class="item{{$user->id}}">
                                                            <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->code}}</td>
                                                            <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->nom}}</td>
                                                            <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->prenom}}</td>
                                                            <td>{{$user->numero}}</td>
                                                            <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->age}}</td>
                                                            <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->ecole->libelle}}</td>
                                                            <td>{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->region->libelle}}</td>
                                                            <td>  <button class="btn btn-outline-info edit-modal"
                                                                          data-id = "{{$user->id}}"
                                                                          data-nom = "{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->nom}}"
                                                                          data-prenom = "{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->prenom}}"
                                                                          data-telephone = "{{$user->numero}}"
                                                                          data-age = "{{\App\PairEducateur::where('id', $user->pair_educateur_id)->first()->age}}"
                                                                          data-sexe = "{{$user->sexe}}"
                                                                            >Modifier</button></td>
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
                <form class="form" action="{{route('postEditAccountUserEleve')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier utilisateur</h5>
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
                                        <input class="form-control" type="text" id="edit-nom" name="nom" placeholder="Nom de l'élève / étudiant" required />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Prénom</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="edit-prenom" type="text"  name="prenom" placeholder="Prénom de l'élève / étudiant" required />
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Age</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-age" name="age" placeholder="Age de l'élève / étudiant " required />
                                        <span class="errormsg" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Sexe</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="sexe" id="edit-sexe"  required>
                                            <option selected disabled="true">Veuillez sélectionner le sexe</option>
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
                                    <label class="col-form-label col-sm-3">N° Téléphone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="numero" id="edit-telephone" placeholder="N° de téléphone " required />
                                        <span class="errormsg2" style="color: red;"></span>
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
                <form action="{{route('postDeleteAccountUserEleve')}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un élève / étudiant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cet utilisateur?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user-id" name="id" />
                    <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}" />
                    <button type="submit" class="btn btn-danger delete-ecole">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#region").on("change", function () {
            var id = $(this).val();
            $.ajax({

                type : "POST",
                url : "{{route('getEcoleByRegion')}}",
                data : {
                    "id" : id,
                    "_token" : "{{Session::token()}}"
                },
                success: function (data) {
                    console.log(data);
                    $("#ecole").empty();
                    for(var i =0; i < data.length; i++){
                        $("#ecole").append("<option value='"+data[i]["id"]+"' >"+data[i]["libelle"]+"</option>");
                    }
                },
                error:function (data) {
                    alert("Une erreur s'est produite, impossible de charger les établissements");
                }
            });
        });

        $('#age').keypress(function(e){
            if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                $('.errormsg').html("Des chiffres uniquement").show().fadeOut('slow');
                return false;
            }
        });

        $('#telephone').keypress(function(e){
            if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                $('.errormsg2').html("Des chiffres uniquement").show().fadeOut('slow');
                return false;
            }
        });


        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            $("#id").val($(this).data("id"));
            $("#edit-nom").val($(this).data("nom"));
            $("#edit-prenom").val($(this).data("prenom"));
            $("#edit-sexe").val($(this).data("sexe"));
            $("#edit-age").val($(this).data("age"));
            $("#edit-telephone").val($(this).data("telephone"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#user-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

    </script>
@endsection