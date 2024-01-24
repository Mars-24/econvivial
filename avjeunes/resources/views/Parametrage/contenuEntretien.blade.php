@extends("Template.otherTemplate")


@section("title")
    Gestion des contenues d'entretien
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
                                    <h4 class="card-title">Création d'un contenu d'entretien</h4>
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

                                            <form class="form" action="{{route('postSaveContenuEntretien')}}" method="POST">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Contenu</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="contenu" {{old("contenu")}} placeholder="Contenu de l'entretien" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Type Entretien</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="type" required>
                                                                    <option selected disabled="true">Veuillez sélectionner le type d'entretien</option>
                                                            @foreach($types as $type)
                                                            <option value="{{$type->id}}">{{$type->libelle}}</option>
                                                            @endforeach
                                                                </select>
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

                                            <table id="table" class="table table-bordered table-condensed table-striped" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Contenu d'entretien</th>
                                                    <th>Type d'entretien</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($contenus as $contenu)
                                                    <tr class="item{{$contenu->id}}">
                                                        <td>{{$contenu->contenu}}</td>
                                                        <td>{{$contenu->typeentretien->libelle}}</td>
                                                        <td>  <button class="btn btn-outline-info edit-modal"
                                                                      data-id = "{{$contenu->id}}"
                                                                      data-contenu = "{{$contenu->contenu}}"
                                                                      data-type = "{{$contenu->typeentretien->id}}"
                                                            >Modifier</button></td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$contenu->id}}">Supprimer</button></td>
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
                <form class="form" action="{{route('postEditContenuEntretien')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier le contenu d'entretien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Contenu d'entretien</label></div>
                                    <div class="col-sm-9">
                                        <input type="text" name="contenu" class="form-control" id="edit-contenu" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type Entretien</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="type" required id="edit-type">
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->libelle}}</option>
                                        @endforeach
                                    </select>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer le contenu d'entretien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cette ligne ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="contenu-id" />
                    <button type="button" class="btn btn-danger delete-ecole">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            $("#id").val($(this).data("id"));
            $("#edit-contenu").val($(this).data("contenu"));
            $("#edit-type").val($(this).data("type"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#contenu-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-ecole").on("click", function(){
            var id = $("#contenu-id").val();
            $.ajax({

                type : "POST",
                url : "{{route('postDeleteContenuEntretien')}}",
                data :{
                    "id" : id,
                    "_token" : "{{Session::token()}}"
                },
                success: function(data){
                    $("#deleteModal").modal("hide");
                    $('.item'+ id).remove();

                },
                error :function(data){
                    $("#deleteModal").modal("hide");
                    alert("Une erreur s'est produite, impossible de supprimer le contenu d'entretien");
                }
            });
        });


    </script>

@endsection