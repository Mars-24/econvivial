@extends("Template.otherTemplate")


@section("title")
    Activités eConvivial
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
                                    <h4 class="card-title">Enrégistrer une activité</h4>
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

                                            <form class="form" action="{{route('postActiviteeConvivial')}}" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Titre de l'activité</label>
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
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($activites as $activite)
                                                    <tr class="item{{$activite->id}}">
                                                        <td>{{$activite->titre}}</td>
                                                        <td>{{\Illuminate\Support\Str::limit($activite->description, 100)}}</td>
                                                        <td><img src="{{$activite->image}}" width="100" height="30"></td>
                                                        
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$activite->id}}"
                                                                      data-libelle = "{{$activite->titre}}">Supprimer</button></td>
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
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer une activité </h5>
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
                url:"{{route('postEditActiviteeConvivial')}}",
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
                    alert("Une erreur s'est produite, impossible de supprimer l'activité");
                }
            });
        });

    </script>

@endsection