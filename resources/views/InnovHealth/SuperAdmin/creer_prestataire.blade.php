@extends("Template.otherTemplate")


@section("title")
    Prestataire Formation Sanitaire
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovSuperAdminProfile")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Prestataire Formation Sanitaire</h4>
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

                                            <form class="form"
                                                  action="{{route('super-admin-formation-sanitaire-save-prestataire-fs')}}"
                                                  method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Nom
                                                                d'utilisateur</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="username"
                                                                       placeholder="Le nom d'utilisateur de l'administrateur"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Email</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="email" name="email"
                                                                       placeholder="exemple@email.com"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Téléphone</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="tel" name="telephone"
                                                                       placeholder="99999999"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Type admin</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="typeAdmin"
                                                                        id="typeAdmin" required>
                                                                    <option selected disabled="true">Choisir le type d'admin</option>
                                                                    <option value="Femmes Enceintes">Consultation Prénatale</option>
                                                                    <option value="Vaccination">Vaccination</option>
                                                                    <option value="Planning FA">Planning Familial</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Formation Sanitaire
                                                                Associée</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="formation">
                                                                    <option selected disabled>Choisir la formation
                                                                        sanitaire associée
                                                                    </option>
                                                                    @foreach($formations as $formation)
                                                                        <option
                                                                            value="{{$formation->libelle}}">{{$formation->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Mot de passe</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="password"
                                                                       name="password" placeholder="Mot de passe"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Confirmation</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="password"
                                                                       name="confirmation"
                                                                       placeholder="Confirmation du mot de passe"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <input type="hidden" name="_token"
                                                                   value="{{Session::token()}}"/>
                                                            <button type="submit" style="width: 250px;"
                                                                    class="btn btn-outline-success btn-rounded">
                                                                Enrégistrer
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <table id="table" class="table table-bordered table-condensed"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Nom utilisateur</th>
                                                    <th>Email</th>
                                                    <th>Téléphone</th>
                                                    <th>Formation Sanitaire associée</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="item{{$user->id}}">
                                                        <td>{{$user->username}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->numero}}</td>
                                                        <td>
                                                            @foreach($formations as $comp)
                                                                @if( $user->formation_sanitaire_id==$comp->id)
                                                                    {{$formation = $comp->libelle}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-info edit-modal"
                                                                    data-id="{{$user->id}}"
                                                                    data-username="{{$user->username}}"
                                                                    data-email="{{$user->email}}"
                                                                    data-telephone="{{$user->numero}}"
                                                                    data-type="{{$user->type_user_id}}"
                                                                    data-formation="{{$formation}}">
                                                                Modifier
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-danger delete-modal"
                                                                    data-id="{{$user->id}}"
                                                                    data-name="{{$user->username}}">Supprimer
                                                            </button>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content" style="background-color: white;">
                <form class="form" action="{{route('super-admin-formation-sanitaire-update-responsable-fs')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier responsable sanitaire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Nom
                                        d'utilisateur</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="username" name="username"
                                               placeholder="Le nom d'utilisateur de l'administrateur"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" id="email" name="email"
                                               placeholder="exemple@email.com"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Téléphone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="tel" id="telephone" name="telephone"
                                               placeholder="99999999"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Type admin</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="typeAdmin"
                                                id="typeadmin" required>
                                            <option selected disabled="true">Choisir le type d'admin</option>
                                            <option value="Femmes Enceintes">Consultation Prénatale</option>
                                            <option value="Vaccination">Vaccination</option>
                                            <option value="Planning FA">Planning Familial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Formation Sanitaire
                                        Associée</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="formation" name="formation">
                                            <option selected disabled>Choisir la formation
                                                sanitaire associée
                                            </option>
                                            @foreach($formations as $formation)
                                                <option
                                                    value="{{$formation->libelle}}">{{$formation->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">

                                    <label class="control-label col-sm-3">Mot de passe</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password"
                                               name="password" placeholder="Mot de passe"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Confirmation</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password"
                                               name="confirmation"
                                               placeholder="Confirmation du mot de passe"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="user-id" name="id"/>
                        <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}"/>
                        <button type="submit" class="btn btn-success edit-button">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer l'utilisateur <span><b id="username"></b></span> ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user-id"/>
                    <button type="button" class="btn btn-danger " id="delete-user">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        $("#typeAdmin").on("change", function (event) {
            var valeur = $(this).val();
            if (valuer = "Femmes Enceintes") {
                $("#typeCPN").show("slow");
            }
        });

        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            var type = $(event.relatedTarget).data('type');
            $("#user-id").val($(this).data("id"));
            $("#username").val($(this).data("username"));
            $("#email").val($(this).data("email"));
            $("#telephone").val($(this).data("telephone"));
            switch ($(this).data("type")) {
                case 12:
                    $('#typeadmin').val("Femmes Enceintes");
                    break;
                case 18:
                    $('#typeadmin').val("Vaccination");
                    break;
                case 19:
                    $('#typeadminn').val("Planning FA");
                    break;
            }
            $("#formation").val($(this).data("formation"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#user-id").val($(this).data("id"));
            $("#username").html($(this).data("name"));
            $("#deleteModal").modal("show");
        });

        $("#delete-user").on("click", function () {
            var id = $("#user-id").val();
            $.ajax({
                type: "POST",
                url: "{{route('postDeleteUser')}}",
                data: {
                    '_token': '{{Session::token()}}',
                    'id': id
                },
                success: function (data) {

                    $("#deleteModal").modal("hide");
                    $('.item' + id).remove();

                },
                error: function (data) {
                    $("#deleteModal").modal("hide");
                    alert("Une erreur s'est produite, impossible de supprimer cet utilisateur")
                }
            });
        });

    </script>

@endsection
