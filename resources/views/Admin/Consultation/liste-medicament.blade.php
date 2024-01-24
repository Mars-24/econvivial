@extends("Template.otherTemplate")


@section("title")
    Gestion des Téléconseillers
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
                                    <h4 class="card-title">Gestion des médicaments</h4>
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

                                            <form class="form" action="{{route('postSaveProduitIST')}}" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Molécule </label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" style="text-transform: uppercase;" type="text" name="molecule" placeholder="Molécule" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Condition </label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" style="text-transform: none;" type="text" name="cond" placeholder="Condition" required />
                                                            </div>
                                                        </div>
                                                    </div>
													
													<div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Coût unitaire </label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control"  style="text-transform: none;" type="number" name="cout_u" placeholder="Coût unitaire" required />
                                                            </div>
                                                        </div>
                                                    </div>
													
													<div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nombre de kit </label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" style="text-transform: none;" type="number" name="nbre_kit" placeholder="Nombre de Kit" required />
                                                            </div>
                                                        </div>
                                                    </div>
													
													<div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Coût m kit </label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" style="text-transform: none;" type="number" name="cout_m_kit" placeholder="Coût m kit" required />
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

                                            <table id="table" class="table table-bordered table-condensed table" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Molécule</th>
                                                    <th>Cond</th>
                                                    <th>Coût unitaire</th>
                                                    <th>Nombre de Kit</th>
                                                    <th>Coût_m_kit</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($produits as $produit)
                                                    <tr class="item{{$produit->id}}">
                                                        <td>{{$produit->molecules}}</td>
                                                        <td>{{$produit->cond}}</td>
                                                        <td>{{$produit->cout_unitaire}}</td>
                                                        <td>{{$produit->nombre_kit}}</td>
                                                        <td>{{$produit->cout_m_kit}}</td>
                                                        <td>  
															<button class="btn btn-outline-info edit-modal"
															  data-id = "{{$produit->id}}"
															  data-molecule = "{{$produit->molecules}}"
															  data-cond = "{{$produit->cond}}"
															  data-cout_u = "{{$produit->cout_unitaire}}"
															  data-nbre_kit = "{{$produit->nombre_kit}}"
															  data-cout_m_kit = "{{$produit->cout_m_kit}}"
															  >Modifier
															</button>
														</td>
                                                        <td>  
															<button class="btn btn-outline-danger delete-modal"
															  data-id = "{{$produit->id}}"
															  data-molecules = "{{$produit->molecules}}"
															  >Supprimer
															</button>
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
                <form class="form" action="{{route('postEditProduitIST')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier un produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Molécule </label></div>
                                    <div class="col-sm-9">
                                        <input type="text" name="molecule" class="form-control" id="edit-nom" required />
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Condition </label></div>
                                    <div class="col-sm-9">
                                        <input type="text" name="cond" class="form-control" id="edit-prenom" required />
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Coût unitaire </label></div>
                                    <div class="col-sm-9">
                                        <input type="number" name="cout_u" class="form-control" id="edit-telephone" required />
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Nombre de kit </label></div>
                                    <div class="col-sm-9">
                                        <input type="number" name="nbre_kit" class="form-control" id="edit-email" required />
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Coût m kit </label></div>
                                    <div class="col-sm-9">
                                        <input type="number" name="cout_m_kit" class="form-control" id="edit-cout" required />
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
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer "<span><b id="tele-nom"></b></span> <span><b id="tele-prenom"></b></span>" ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="tele-id" />
                    <button type="button" class="btn btn-danger delete-tele">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            $("#id").val($(this).data("id"));
            $("#edit-nom").val($(this).data("molecule"));
            $("#edit-prenom").val($(this).data("cond"));
            $("#edit-telephone").val($(this).data("nbre_kit"));
            $("#edit-email").val($(this).data("cout_u"));
            $("#edit-cout").val($(this).data("cout_m_kit"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#tele-id").val($(this).data("id"));
            $("#tele-nom").text($(this).data("molecules"));
            $("#tele-prenom").text($(this).data("cond"));
            $("#deleteModal").modal("show");
        });

        $(".delete-tele").on("click", function () {
            var id =  $("#tele-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('postDeleteProduitIST')}}",
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
                    alert("Une erreur s'est produite, impossible de supprimer le produit");
                }
            });
        });

    </script>

@endsection