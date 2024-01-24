@extends("Template.otherTemplate")


@section("title")
    Gestion des utilisateurs téléconseillers
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
                                    <h4 class="card-title">Gestions des utilisateurs téléconseillers</h4>
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

                                            <form class="form" action="{{route('saveUserTeleConseiller')}}" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Nom d'utilisateur</label>
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
                                                                {{--<div class="col-sm-2 input-group-prepend">--}}
                                                                    {{--<span class="input-group-text ">+228</span>--}}
                                                                {{--</div>--}}
                                                                <input class="col-sm-12 form-control" type="text" name="numero" placeholder="Le numéro de téléphone de l'utilisateur" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Profession Téléconseiller</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="profession">
                                                                    <option selected disabled >Choisir la profession</option>
                                                                @foreach($professions as $profession)
                                                                        <option value="{{$profession->libelle}}">{{$profession->libelle}}</option>
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
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Type de service</label>
                                                            
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="service">
                                                                    <option value="Assistance">Assistance</option>
                                                                    <option value="COVID-19">COVID-19</option>
                                                                </select>
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
                                                        <th>Profession</th>
                                                        <th>Modifier</th>
                                                        <th>Mot de passe</th>
                                                        <th>Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                        <tr class="item{{$user->id}}">
                                                            <td>{{$user->username}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td> {{$user->numero}}</td>
                                                            <td>{{\App\ProfessionConseiller::where("id", $user->profession_conseiller_id)->first()->libelle}}</td>
                                                            <td> {{$user->teleconseiller_service_type}}</td>
    
                                                            <td>
                                                                <button class="btn btn-outline-success edit-modal"
                                                                    data-id = "{{$user->id}}"
                                                                    data-name ="{{$user->username}}"
                                                                    data-email ="{{$user->email}}"
                                                                    data-numero ="{{$user->numero}}"
                                                                    data-service="{{ $user->teleconseiller_service_type }}"
                                                                    data-profession ="{{\App\ProfessionConseiller::where("id", $user->profession_conseiller_id)->first()->id}}"
                                                                >Modifier</button>
                                                            </td>
    
                                                            <td>
                                                                <button class="btn btn-outline-warning editPsw-modal"
                                                                    data-id = "{{$user->id}}"
                                                                >Mot de passe</button>
                                                            </td>
    
                                                            <td>
                                                                <button class="btn btn-outline-danger delete-modal"
                                                                    data-id = "{{$user->id}}"
                                                                    data-name ="{{$user->username}}"
                                                                >Supprimer</button>
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
                
                @include("Footer.dashboardFooter")
            </div>
        </div>
    </div>

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

    <!-- Modifier info teleconseiller -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content " style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Modifier information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form class="form" action="{{ route('editUserTeleConseiller') }}" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Nom d'utilisateur</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="username"  id="edit-username" placeholder="Le nom de l'utilisateur" />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" name="email" id="edit-email" placeholder="exemple@email.com" />
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">N° Téléphone</label>
                                    <div class="col-sm-9">
                                        <input class="col-sm-12 form-control" type="text" name="numero" id="edit-numero" placeholder="Le numéro de téléphone de l'utilisateur" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Profession Téléconseiller</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="profession" id="edit-profession">
                                            <option selected disabled >Choisir la profession</option>
                                            @foreach($professions as $profession)
                                                <option value="{{$profession->id}}">{{$profession->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Type de service</label>
                                    
                                    <div class="col-sm-9">
                                        <select class="form-control" id="edit-service" name="service">
                                            <option value="Assistance">Assistance</option>
                                            <option value="COVID-19">COVID-19</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <input type="hidden" id="edit-user-id" name="id" />
                        <input type="hidden" name="_token" value="{{Session::token()}}" />
                        
                        <button type="submit" class="btn btn-success edit-user">Modifier</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modifier mot de passe -->
    <div class="modal fade" id="editPswModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content " style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Modifier mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" action="{{route('editUserTeleConseillerPwd')}}" method="POST">
                <div class="modal-body">

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



                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit-psd-id"  name="id"/>
                    <input type="hidden" name="_token" value="{{Session::token()}}" />
                    <button type="submit" class="btn btn-warning">Modifier mot de passe</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            $("#edit-user-id").val($(this).data("id"));
            $("#edit-username").val($(this).data("name"));
            $("#edit-email").val($(this).data("email"));
            $("#edit-profession").val($(this).data("profession"));
            $("#edit-numero").val($(this).data("numero"));
            $('#edit-service').val($(this).data('service'))
            $("#editModal").modal("show");
        });

        $(".editPsw-modal").on("click", function (event) {
            event.preventDefault();
            $("#edit-psd-id").val($(this).data("id"));
            $("#editPswModal").modal("show");
        });


        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#user-id").val($(this).data("id"));
            $("#username").html($(this).data("name"));
            $("#deleteModal").modal("show");
        });

        $(".delete-user").on("click", function () {
            var id =  $("#user-id").val();
           
            $.ajax({
                type : "POST",
                url:"{{route('deleteUserTeleConseiller')}}",
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