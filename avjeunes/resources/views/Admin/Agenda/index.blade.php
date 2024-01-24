@extends("Template.otherTemplate")


@section("title")
    Programmer un évènement
@endsection


@section("body")

    <div class="container-scroller">
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
                                    <h4 class="card-title">Enrégistrer un évènement</h4>
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

                                            <form class="form" action="{{route('saveamdinagenda')}}" method="POST" enctype="multipart/form-data">

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Titre  <span style="color: red;">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control"  type="text" name="titre" placeholder="Titre de l'évènement" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Description <span style="color: red;">*</span></label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" name="description" placeholder="Description de l'évènement" rows="8" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label" for="image">Image évènement (400 x 400) <span style="color: red;">*</span></label>
                                                            <div class="col-sm-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 200px;border: rgba(0,0,0,0.44) 1px solid; ">
                                                                        <img class="img img-responsive tim-fig" src="http://www.placehold.it/2000x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" style="width: 100%; height: 200px;" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; height: 200px; line-height: 20px;"></div>
                                                                    <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="image" id="image" class="form-control" accept="image/jpeg, image/png"  />
                                                                                     </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label" for="image">Bannière évènement (1400 x 400)</label>
                                                            <div class="col-sm-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 200px;border: rgba(0,0,0,0.44) 1px solid; ">
                                                                        <img class="img img-responsive tim-fig"src="http://www.placehold.it/2000x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" style="width: 100%; height: 200px;" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; height: 200px; line-height: 20px;"></div>
                                                                    <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="banniere"  class="form-control" accept="image/jpeg, image/png" />
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
                                                            <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <table id="table" class="table table-bordered table-condensed" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Bannière</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($agendas as $agenda)
                                                    <tr class="item{{$agenda->id}}">
                                                        <td>{{$agenda->titre}}</td>
                                                        <td>{{\Illuminate\Support\Str::limit($agenda->description, 200)}}</td>
                                                        <td><img src="public/uploads/agenda/{{$agenda->imageAgenda}}" width="100" height="100"></td>
                                                        <td><img src="public/uploads/agenda/{{$agenda->banniereAgenda}}" width="100" height="100"></td>
                                                        <td>  <button class="btn btn-outline-info edit-modal"
                                                                      data-id = "{{$agenda->id}}"
                                                                      data-titre = "{{$agenda->titre}}"
                                                                      data-image = "public/uploads/agenda/{{$agenda->imageAgenda}}"
                                                                      data-banniere = "public/uploads/agenda/{{$agenda->banniereAgenda}}"
                                                                      data-description = "{{$agenda->description}}"
                                                            >Modifier</button></td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$agenda->id}}"
                                                                       >Supprimer</button></td>
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
                <form class="form" action="{{route('post-save-edit-admin-agenda')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier un agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Titre</label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  type="text" name="titre" id="edit-titre" placeholder="Titre de l'évènement" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" id="edit-description" placeholder="Description de l'évènement" rows="8" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="image">Image évènement (400 x 400)</label>
                                    <div class="col-sm-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 100%; height: 200px;border: rgba(0,0,0,0.44) 1px solid;" >
                                                <img class="img img-responsive tim-fig" id="edit-image" src="http://www.placehold.it/2000x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" style="width: 400px; height: 400px;" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; height: 200px; line-height: 20px;"></div>
                                            <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="image" id="image" class="form-control" accept="image/jpeg, image/png"/>
                                                                                     </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="image">Bannière évènement (1400 x 400)</label>
                                    <div class="col-sm-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 100%; height: 200px;border: rgba(0,0,0,0.44) 1px solid; ">
                                                <img class="img img-responsive tim-fig" id="edit-banniere" src="http://www.placehold.it/2000x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" style="width: 100%; height: 200px;" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; height: 200px; line-height: 20px;"></div>
                                            <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="banniere"  class="form-control" accept="image/jpeg, image/png" />
                                                                                     </span>
                                            </div>
                                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un évènement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cette ligne?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="agenda-id" />
                    <button type="button" class="btn btn-danger delete-ville">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            $("#id").val($(this).data("id"));
            $("#edit-titre").val($(this).data("titre"));
            $("#edit-description").val($(this).data("description"));
            $("#edit-image").attr("src", $(this).data("image"));
            $("#edit-banniere").attr("src", $(this).data("banniere"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#agenda-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-ville").on("click", function () {
            var id =  $("#agenda-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('post-delete-agenda')}}",
                data:{
                    '_token': '{{Session::token()}}',
                    'id': id
                },
                success: function(data){
                    if(data != "false"){
                        $("#deleteModal").modal("hide");
                        $('.item'+ id).remove();
                    }else{
                        $("#deleteModal").modal("hide");
                        alert("Une erreur s'est produite, impossible de supprimer la ville");
                    }

                },
                error :function(data){
                    $("#deleteModal").modal("hide");
                    alert("Une erreur s'est produite, impossible de supprimer la ville");
                }
            });
        });

    </script>

@endsection