@extends("Template.otherTemplate")


@section("title")
    Formations Sanitaires
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovSuperAdminProfile")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Création des formations sanitaires</h4>
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

                                            <form class="form" action="{{route('super-admin-formation-sanitaire-save-formation')}}"
                                                  method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nom de la formation
                                                                sanitaire</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="formation"
                                                                       placeholder="Le nom  de la formation sanitaire"
                                                                       required/>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Ville de la formation
                                                                sanitaire</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="ville" required>
                                                                    <option selected disabled>Choisir la ville
                                                                        correspondante
                                                                    </option>
                                                                    @foreach($villes as $ville)
                                                                        <option
                                                                            value="{{$ville->libelle}}">{{$ville->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Situation
                                                                géographique</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text"
                                                                       name="situationGeo"
                                                                       placeholder="Situation géographique de la formation sanitaire"
                                                                       required/>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">N° Téléphone</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="telephone"
                                                                       id="telephone"
                                                                       placeholder="N° de téléphone du centre"
                                                                       required/>
                                                                <span class="errormsg" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Nom du point focal des
                                                                prestataires</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text"
                                                                       name="pointFocal"
                                                                       placeholder="Nom du point focal des prestataires"
                                                                       required/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Contact du point
                                                                focal des prestataires </label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" id="contact"
                                                                       name="contact"
                                                                       placeholder="Contact du point focal des prestataires"
                                                                       required/>
                                                                <span class="msgContact" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Services
                                                                offerts</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" name="service"
                                                                          id="service" rows="3"
                                                                          placeholder="Services offerts par la formation sanitaire"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Lien de
                                                                locatisation </label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text"
                                                                       id="lienLocalisation" name="lienLocalisation"
                                                                       placeholder="Renseigner le lien de localisation"
                                                                       required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <input type="hidden" name="_token"
                                                                   value="{{Session::token()}}"/>
                                                            <button type="submit" style="width: 250px;"
                                                                    class="btn btn-outline-success btn-rounded">
                                                                Enrégistrer
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <table id="table"
                                                   class="table table-bordered table-condensed table-striped table-responsive"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Formation Sanitaire</th>
                                                    <th>Ville</th>
                                                    <th>Situation géo</th>
                                                    <th>Téléphone</th>
                                                    <!--<th>Frais</th>-->
                                                    <th>Service</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($formations as $formation)
                                                    <tr class="item{{$formation->id}}">
                                                        <td>{{$formation->libelle}}</td>
                                                        <td>
                                                            @foreach($villes as $ville)
                                                                @if($ville->id == $formation->ville_id)
                                                                    {{ $ville->libelle }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{$formation->situationGeo}}</td>
                                                        <td>{{$formation->telephone}}</td>
                                                        <!--<td>{{$formation->frais}}</td>-->
                                                        <td>{{$formation->service}}</td>
                                                        <td>
                                                            <button class="btn btn-outline-info edit-modal"
                                                                    data-id="{{$formation->id}}"
                                                                    data-libelle="{{$formation->libelle}}"
                                                                    data-situation="{{$formation->situationGeo}}"
                                                                    data-telephone="{{$formation->telephone}}"
                                                                    data-frais="{{$formation->frais}}"
                                                                    data-pointfocal="{{$formation->pointFocal}}"
                                                                    data-contact="{{$formation->contact}}"
                                                                    data-service="{{$formation->service}}"
                                                                    data-lienlocalisation="{{$formation->lienLocalisation}}"
                                                                    data-ville="@foreach($villes as $ville)
                                                                    @if($ville->id == $formation->ville_id)
                                                                    {{ $ville->libelle }}
                                                                    @endif
                                                                    @endforeach">Modifier
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-danger delete-modal"
                                                                    data-id="{{$formation->id}}">Supprimer
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


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content" style="background-color: white;">
                <form class="form" action="{{route('super-admin-formation-sanitaire-update-formation')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier une formation sanitaire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Nom formation sanitaire</label></div>
                                    <div class="col-sm-9">
                                        <input type="text" name="libelle" class="form-control" id="edit-libelle"
                                               required/>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-3"><label>Ville</label></div>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="edit-ville" name="ville">
                                            @foreach($villes as $ville)
                                                <option value="{{$ville->libelle}}">{{$ville->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Situation géographique</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-situation" name="situationGeo"
                                               placeholder="Situation géographique de la formation sanitaire" required/>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">N° Téléphone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="telephone" id="edit-telephone"
                                               placeholder="N° de téléphone du centre" required/>
                                        <span class="errormsg" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Nom du point focal des prestataires</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-point" name="pointFocal"
                                               placeholder="Nom du point focal des prestataires" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Contact du point focal des
                                        prestataires </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-contact" name="contact"
                                               placeholder="Contact du point focal des prestataires" required/>
                                        <span class="msgContact" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Services offerts</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="service" id="edit-service" rows="3"
                                                  placeholder="Services offerts par la formation sanitaire"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Lien de locatisation </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-lienLocalisation"
                                               name="lienLocalisation" placeholder="Renseigner le lien de localisation"
                                               required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="id" name="id"/>
                        <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}"/>
                        <button type="submit" class="btn btn-success edit-button">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer une formation sanitaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cette ligne ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="formation-id"/>
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
            $("#edit-situation").val($(this).data("situation"));
            $("#edit-telephone").val($(this).data("telephone"));
            $("#edit-frais").val($(this).data("frais"));
            $("#edit-point").val($(this).data("pointfocal"));
            $("#edit-contact").val($(this).data("contact"));
            $("#edit-service").val($(this).data("service"));
            $("#edit-lienLocalisation").val($(this).data("lienlocalisation"));

            $("#edit-ville").val($(this).data("ville"));
            $("#editModal").modal("show");
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#formation-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-objet").on("click", function () {
            var id = $("#formation-id").val();
            $.ajax({
                type: "POST",
                url: "{{route('postDeleteFormationSanitaire')}}",
                data: {
                    '_token': '{{Session::token()}}',
                    'id': id
                },
                success: function (data) {

                    $("#deleteModal").modal("hide");
                    $('.item' + id).remove();

                },
                error: function (data) {
                    $("#deleteModal").modal("hide");
                    alert("Une erreur s'est produite, impossible de supprimer. La formation sanitaire est déjà utilisé dans le système.")
                }
            });
        });


        $(document).ready(function () {
            $('#telephone').keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $('.errormsg').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#frais').keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $('.msgFrais').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#contact').keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $('.msgContact').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#edit-telephone').keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $('.errormsg').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#edit-frais').keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $('.msgFrais').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#edit-contact').keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $('.msgContact').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });
        });

    </script>

@endsection
