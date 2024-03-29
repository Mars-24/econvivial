@extends("Template.otherTemplate")


@section("title")
    Planning famillial | Méthodes naturelle
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
                                    <h4 class="card-title">Méthodes naturelle</h4>
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

                                            <form class="form" action="{{route('save-planning-famillial')}}" enctype="multipart/form-data" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Titre du planning</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" style="text-transform: uppercase;" type="text" name="titre" placeholder="Titre du planning" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Url du planning</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text" name="url" placeholder="Url d'accès du planning" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Description du planning</label>
                                                            <div class="col-sm-8">
                                                                <textarea class="form-control" rows="5" type="text" name="description" placeholder="Description du planning" required ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Image associée</label>
                                                            <div class="col-sm-8">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;" style="border: rgba(0,0,0,0.44) 1px solid;">
                                                                        <img class="tim-fig"  src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                    <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="image" id="image" class="form-control" accept="image/jpeg, image/png" />
                                                                                     </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6" >
                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <input type="hidden" name="type" value="naturelle" />
                                                            <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <table id="table" class="table table-bordered table-condensed  @if(count($plannings) >0 ) table-responsive @endif" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Ref</th>
                                                    <th>Titre</th>
                                                    <th>Url</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($plannings as $planning)
                                                    <tr class="item{{$planning->id}}">
                                                        <td>{{$planning->id}}</td>
                                                        <td>{{$planning->titre}}</td>
                                                        <td>{{$planning->url}}</td>
                                                        <td>{{$planning->description}}</td>
                                                        <td>
                                                            <img src="images/plannings/{{$planning->image}}" alt="Aucune image" width="100" height="50">
                                                        </td>
                                                        <td>  <button class="btn btn-outline-success edit-modal"
                                                                      data-id = "{{$planning->id}}"
                                                                      data-titre = "{{$planning->titre}}"
                                                                      data-url = "{{$planning->url}}"
                                                                      data-description = "{{$planning->description}}"
                                                                      data-image = "images/plannings/{{$planning->image}}"
                                                            >Modifier</button></td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$planning->id}}">Supprimer</button></td>
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
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer une série</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer ce planning?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="serie-id" />
                    <button type="button" class="btn btn-danger delete-serie">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-color: white;">
                <form class="form" action="{{route('edit-planning-famillial')}}" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Modifier un planning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Titre du planning</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" style="text-transform: uppercase;" id="edit-titre" type="text" name="titre" placeholder="Titre du planning" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Url du planning</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" id="edit-url" name="url" placeholder="Url du planning" required />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="5" id="edit-description" type="text" name="description" placeholder="Description du planning" required ></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Image associée</label>
                                    <div class="col-sm-8">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;" style="border: rgba(0,0,0,0.44) 1px solid;">
                                                <img class="tim-fig" id="edit-image"  src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Modifier la photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="image" id="image" class="form-control" accept="image/jpeg, image/png"/>
                                                                                     </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="edit-serie-id" name="id" />
                        <input type="hidden" name="type" value="naturelle" />
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>


        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#serie-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            $("#edit-serie-id").val($(this).data("id"));
            $("#edit-titre").val($(this).data("titre"));
            $("#edit-description").val($(this).data("description"));
            $("#edit-url").val($(this).data("url"));
            $("#edit-image").prop("src", $(this).data("image"));
            $("#editModal").modal("show");
        });

        $(".delete-serie").on("click", function () {
            var id =  $("#serie-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('delete-planning-famillial')}}",
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
                    alert("Une erreur s'est produite, impossible de supprimer la ville");
                }
            });
        });

    </script>

@endsection