@extends("Template.otherTemplate")


@section("title")
   Objet de consultations
@endsection


@section("body")

    <div class="container-scroller">
        @include("HeaderNav.adminNav")
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.adminSideProfil") 
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Objet de consultation</h4>
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

                                            <form class="form" action="{{route('postObjetConsultation')}}" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Désignation de l'objet</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="libelle" placeholder="Désignation ou intitulé de l'objet de consultation" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Description de l'objet</label>
                                                            <div class="col-sm-9">
                                                               <textarea class="form-control" rows="6" name="description" placeholder="Description de l'objet de consultation"></textarea>
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
                                                    <th>Désignation</th>
                                                    <th>Description</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($objets as $objet)
                                                    <tr class="item{{$objet->id}}">
                                                        <td>{{$objet->libelle}}</td>
                                                        <td>{{$objet->description}}</td>
                                                        <td>  <button class="btn btn-outline-info edit-modal" data-toggle="modal" data-target="#exampleModal"
                                                            data-id = "{{$objet->id}}"
                                                            data-libelle = "{{$objet->libelle}}"
                                                            data-description = "{{$objet->description}}">Modifier</button></td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$objet->id}}">Supprimer</button></td>
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
                <form class="form" action="{{route('postEditObjetConsultation')}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier un objet de consultation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="col-sm-4"><label>Désignation</label></div>
                                <div class="col-sm-8">
                                    <input type="text" name="libelle" class="form-control" id="edit-libelle" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="col-sm-4"><label>Description</label></div>
                                <div class="col-sm-8">
                                   <textarea  class="form-control" name="description" id="edit-description" rows="5" required></textarea>
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
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un objet de consultation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cette ligne ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="objet-id" />
                    <button type="button" class="btn btn-danger delete-objet">Supprimer</button>
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
            $("#edit-description").val($(this).data("description"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#objet-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $("#deleteModal").on("click", function () {
            var id =  $("#objet-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('deleteObjetConsultation')}}",
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
                    alert("Une erreur s'est produite, impossible de supprimer. L'objet de consultation a déjà éte pris par un utilisateur")
                }
            });
        });

    </script>

@endsection