@extends("Template.otherTemplate")


@section("title")
    Conseils pratiques
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
                                    <h4 class="card-title">Enrégistrer un conseil pratique</h4>
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

                                            <form class="form" action="{{route('postConseilPratique')}}" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Titre du conseil pratique</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control"  type="text" name="titre" placeholder="Le titre du conseil pratique" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Description</label>
                                                            <div class="col-sm-9">
                                                             <textarea class="form-control" name="description" rows="8" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Bannière conseil pratique (3000 x 500)</label>
                                                            <div class="col-sm-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 200px;" style="border: rgba(0,0,0,0.44) 1px solid;">
                                                                        <img class="img img-responsive tim-fig"src="http://www.placehold.it/2000x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" style="width: 100%; height: 200px;" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; height: 200px; line-height: 20px;"></div>
                                                                    <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="banniere" id="banniere" class="form-control" accept="image/jpeg, image/png" required/>
                                                                                     </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Image (400 x 400)</label>
                                                            <div class="col-sm-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;" style="border: rgba(0,0,0,0.44) 1px solid;">
                                                                        <img class="tim-fig"src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                    <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="image" id="image" class="form-control" accept="image/jpeg, image/png" required/>
                                                                                     </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">PDF </label>
                                                            <div class="col-sm-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;" style="border: rgba(0,0,0,0.44) 1px solid;">
                                                                        <img class="tim-fig"src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                    <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir un pdf</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer le pdf</span>
                                                                                       <input type="file" name ="pdf" id="pdf" class="form-control" accept="application/pdf" required/>
                                                                                     </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Audio </label>
                                                            <div class="col-sm-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;" style="border: rgba(0,0,0,0.44) 1px solid;">
                                                                        <img class="tim-fig"src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                    <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir un audio</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'audio</span>
                                                                                       <input type="file" name ="audio" id="audio" class="form-control" accept="audio/mp3,audio/*"/>
                                                                                     </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> Big Image (1000 x 1300)</label>
                                                            <div class="col-sm-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;" style="border: rgba(0,0,0,0.44) 1px solid;">
                                                                        <img class="tim-fig"src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                    <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="bigImage" id="image" class="form-control" accept="image/jpeg, image/png" required/>
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

                                            <table id="table" class="table table-bordered table-condensed table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>PDF</th>
                                                    <th>Audio</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($conseils as $conseil)
                                                    <tr class="item{{$conseil->id}}">
                                                        <td>{{$conseil->titre}}</td>
                                                        <td>{{\Illuminate\Support\Str::limit($conseil->description, 100)}}</td>
                                                        <td><img src="public/uploads/img/{{$conseil->image}}" width="100" height="30"></td>
                                                        <td><a class="btn btn-warning" href="public/uploads/pdf/{{$conseil->pdf}}" target="_blank">Télécharger</a></td>
                                                        <td><a class="btn btn-info" href="public/uploads/audio/{{$conseil->audio}}" target="_blank">Télécharger</a></td>
                                                        <td>  <button class="btn btn-outline-info edit-modal"
                                                                      data-id = "{{$conseil->id}}"
                                                                      >Modifier</button></td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$conseil->id}}"
                                                                      data-libelle = "{{$conseil->titre}}">Supprimer</button></td>
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
                <form class="form" action="{{route('postEditVille')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier une ville</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Nom de la ville</label></div>
                                    <div class="col-sm-9">
                                        <input type="text" name="libelle" class="form-control" id="edit-libelle" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Région associée</label></div>
                                    <div class="col-sm-9">

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
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un conseil pratique</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cette ligne?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="conseil-id" />
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
            $("#edit-libelle").val($(this).data("libelle"));
            $("#edit-region").val($(this).data("region"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#conseil-id").val($(this).data("id"));
            // $("#ville-libelle").text($(this).data("libelle"));
            $("#deleteModal").modal("show");
        });

        $(".delete-ville").on("click", function () {
            var id =  $("#conseil-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('postEditConseilPratique')}}",
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