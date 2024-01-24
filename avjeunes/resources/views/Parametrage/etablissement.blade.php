@extends("Template.otherTemplate")


@section("title")
   Gestion des établissements scolaires
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
                                    <h4 class="card-title">Création d'établissement scolaire</h4>
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

                                            <form class="form" action="{{route('postSaveEtablissementScolaire')}}" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nom établissement / Université</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="nom" {{old("nom")}} placeholder="Nom de l'établissement" required />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-3">Région</label>
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
                                                    <th>Nom établissement/université</th>
                                                    <th>Région</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($etablissements as $etablissement)
                                                    <tr class="item{{$etablissement->id}}">
                                                        <td>{{$etablissement->libelle}}</td>
                                                        <td>{{$etablissement->region->libelle}}</td>
                                                        <td>  <button class="btn btn-outline-info edit-modal"
                                                                      data-id = "{{$etablissement->id}}"
                                                                      data-nom = "{{$etablissement->libelle}}"
                                                                      data-region = "{{$etablissement->region->id}}">Modifier</button></td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$etablissement->id}}">Supprimer</button></td>
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
                <form class="form" action="{{route('postEditEtablissementScolaire')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier un établissement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Nom établissement / Université</label></div>
                                    <div class="col-sm-9">
                                        <input type="text" name="nom" class="form-control" id="edit-etablissement" required />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Région</label></div>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="edit-region" name="region">
                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}">{{$region->libelle}}</option>
                                            @endforeach
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un établissement scolaire / université</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cet établissement ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="ecole-id" />
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
            $("#edit-etablissement").val($(this).data("nom"));
            $("#edit-region").val($(this).data("region"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#ecole-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-ecole").on("click", function(){
            var id = $("#ecole-id").val();
            $.ajax({

               type : "POST",
               url : "{{route('postDeleteEtablissementScolaire')}}",
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
                    alert("Une erreur s'est produite, impossible de supprimer l'établissement");
                }
            });
        });


    </script>

@endsection