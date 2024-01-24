@extends("Template.otherTemplate")


@section("title")
   Administrateurs formations sanitaires pour les Jeunes
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
                                    <h4 class="card-title">Administrateurs formations sanitaires pour les Jeunes</h4>
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

                                            <form class="form" action="{{route('saveUserFormationSanitaire')}}" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Nom du Centre</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="username" placeholder="Le nom de l'utilisateur" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Email</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="email" name="email" placeholder="exemple@email.com" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">N° Téléphone</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="numero" placeholder="Le numéro de téléphone de l'utilisateur" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Formation Sanitaire Associée</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="formation">
                                                                    <option selected disabled >Choisir la formation sanitaire associée</option>
                                                                    @foreach($formations as $formation)
                                                                        <option value="{{$formation->libelle}}">{{$formation->libelle}}</option>
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
                                                                <input class="form-control" type="password" name="password" placeholder="Mot de passe" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Confirmation</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="password" name="confirmation" placeholder="Confirmation du mot de passe" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6"  >
                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <table id="table" class="table table-bordered table-condensed" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Nom utilisateur</th>
                                                    <th>Email</th>
                                                    <th>N° Téléphone</th>
                                                    <th>Formation Sanitaire associée</th>
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
														   {{$comp->libelle}}
														   @endif
														   @endforeach
														</td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal" data-id = "{{$user->id}}" data-name ="{{$user->username}}" >Supprimer</button></td>
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
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer l'utilisateur <span ><b id="username"></b></span> ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user-id" />
                    <button type="button" class="btn btn-danger delete-user">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>


        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#user-id").val($(this).data("id"));
            $("#username").html($(this).data("name"));
            $("#deleteModal").modal("show");
        });

        $("#deleteModal").on("click", function () {
            var id =  $("#user-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('deleteUserFormationSanitaire')}}",
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
                    alert("Une erreur s'est produite, impossible de supprimer cet utilisateur")
                }
            });
        });

    </script>

@endsection
