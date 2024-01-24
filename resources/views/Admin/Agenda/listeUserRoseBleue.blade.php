@extends("Template.otherTemplate")


@section("title")
    Liste des inscris
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
                                    <h4 class="card-title">Liste des inscris à la soirée Rose Bleue</h4>
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

                                                <table id="table" class="table table-bordered table-condensed " cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th>Ref</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Téléphone</th>
                                                        <th>Type Inscription</th>
                                                        <th>Frais</th>
                                                        <th>Echographie</th>
                                                        <th>Total à payer</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                             <td>{{$user->id}}</td>
                                                            <td><b>{{$user->nom}}</b></td>
                                                            <td>{{$user->prenom}}</td>
                                                            <td><b>{{$user->telephone}}</b></td>
                                                            <td>{{$user->typeInscription}}</td>
                                                            <td>{{$user->frais}}</td>
                                                            <td><b style="font-size: 18px;">
                                                                @if($user->echo) OUI @else NON @endif
                                                                </b>
                                                            </td>
                                                            <td>
                                                                <b style="font-size: 18px; color: blue;">
                                                                    {{$user->total}}
                                                                </b>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @if(count($users) > 0)
                                                        <tr>
                                                            <td colspan="7"> <b style="font-size: 20px;">Montant Total</b> </td>
                                                            @foreach($montantTotal as $montant)
                                                            <td><b style="font-size: 20px;color: red;">{{$montant->total}}</b></td>
                                                                @endforeach
                                                        </tr>

                                                        <tr>
                                                            <td colspan="7"> <b style="font-size: 20px;">Part Rodrigue (25%)</b> </td>
                                                            @foreach($montantTotal as $part)
                                                            <td><b style="font-size: 20px;color: green;">{{$part->total / 4}}</b></td>
                                                                @endforeach
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>

                                                {{--<div class="row justify-content-center">--}}
                                                    {{--<div class="form-group justify-content-center">--}}
                                                        {{--<div class="col-sm-6 " >--}}
                                                            {{--<input type="hidden" name="_token" value="{{Session::token()}}" />--}}
                                                            {{--<button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Envoyer les SMS</button>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

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