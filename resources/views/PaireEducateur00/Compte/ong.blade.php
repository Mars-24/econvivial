@extends("Template.otherTemplate")


@section("title")
    Compte des M&E ONG
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
                                    <h4 class="card-title">Création des M&E ONG</h4>
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

                                            <form class="form" action="{{route('create-encadreur-association-account')}}" method="POST">

                                                @foreach($regions as $region)
                                                    <span style="display: none;" id="code{{$region->id}}">{{$region->code}}</span>
                                                @endforeach

                                                <div class="row">
													<div class="col-sm-6">
														<div class="form-group row">
															<label class="col-form-label col-sm-3">Code M&E</label>
															<div class="col-sm-9">
																<input class="form-control" type="text" name="code" style="text-transform: uppercase;" {{old("code")}} id="code" placeholder="Code M&E ONG" required />
																<span class="errormsg" style="color: red;"></span>
															</div>
														</div>
													</div>
													
													<div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-3">N° Téléphone</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="numero" {{old("telephone")}} id="telephone" placeholder="N° de téléphone du M&E ONG" required />
                                                                <span class="errormsg" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
														<div class="form-group row">
															<label class="col-sm-3 col-form-label ">Région</label>
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

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">M&E régionaux associés</label>
                                                            <div class="col-sm-9">
                                                                <table class="table table-bordered">
                                                                    <tbody id="regionaux-liste">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6" >
                                                            <input type="hidden" name="number" value="{{$number}}" />
                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                                <div class="row">
                                                     @if(count($users) > 0)
                                                            <button style="margin-left: 10px;margin-bottom: 20px;" class="btn btn-primary" onclick="printContent('dataTable')">Imprimer</button>
                                                            <button type="button" id="exportExcel" onclick="exportTableToExcel('table', 'ListeAdminOng')" style="margin-left: 10px;margin-bottom: 20px;" class="btn btn-success">Exporter en excel</button>
                                                    @endif

                                                </div>
                                                <div id="dataTable">
                                            <table id="table" class="table table-bordered table-condensed table-striped table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Région</th>
                                                    <th>Téléphone</th>
                                                    <th>Etat du cpte</th>
                                                    <th>Nbre Sup en charge</th>
                                                    <th>Voir Sup en charge</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="item{{$user->id}}">
                                                        <td style="text-transform: uppercase;">{{$user->paireducateur->code}}</td>
                                                        <td>{{$user->paireducateur->region->libelle}}</td>
                                                        <td>{{$user->numero}}</td>
                                                        <td>@if($user->actif) <span style="color: green; font-size: 20px;">Actif</span> @else
                                                                <span style="color: red; font-size: 20px;">Non actif</span>@endif</td>
                                                        <td> <b>{{count(\App\AffectationPE::where("affectant_id", $user->id)->get())}}</b> </td>
                                                        <td>
                                                            <b>
                                                                @foreach(\App\AffectationPE::where("affectant_id", $user->id)->get() as $affectation)
                                                                    @if(\App\User::where("id", $affectation->educateur_id)->first() != null)
                                                                    {{\App\User::where("id", $affectation->educateur_id)->first()->paireducateur->code." | "}}
                                                                    @endif
                                                                @endforeach
                                                            </b>
                                                        </td>
														
														<td>
                                                            <button class="btn btn-outline-success edit-modal"
                                                                    data-id = "{{$user->id}}"
																	data-nom = "{{$user->paireducateur->nom}}"
                                                                    data-prenom = "{{$user->paireducateur->prenom}}"
                                                                    data-sexe = "{{$user->sexe}}"
                                                                    data-email = "{{$user->email}}"
                                                                    data-code = "{{$user->paireducateur->code}}"
                                                                    data-telephone = "{{$user->telephone}}"
                                                                    data-region = "{{$user->paireducateur != null && $user->paireducateur->region != null
																					? $user->paireducateur->region->libelle : 'Non défini'}}">
                                                                Modifier
                                                            </button>
                                                        </td>			

                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$user->id}}">Supprimer</button></td>
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
                <form class="form" action="{{route('edit-encadreur-association-account')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier un M&E ONG</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-nom" name="nom" placeholder="Nom du PE" required />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Prénom</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-prenom"  name="prenom" placeholder="Prénom du PE" required />
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" id="edit-email" name="email" placeholder="exemple@email.com" required />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">N° Téléphone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="edit-telephone" name="numero"  placeholder="N° de téléphone du PE" required />
                                        <span class="errormsg" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
						
							<div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Sexe</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="sexe"  id="edit-sexe" required>
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
							
                            <div class="col-sm-6">
							
								<div class="form-group row">
									<label class="col-sm-3 col-form-label ">Région</label>
									<div class="col-sm-9">
										<select class="form-control" name="region" id="edit-region" required>
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
                <form action="{{route('delete-encadreur-association-account')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un M&E ONG</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:red;">
                        <p>Voulez-vous vraiment supprimer cet utilisateur ?</p>
                        <p>Cet utilisateur sera supprimer avec toutes les opérations qu'il a eu à effectuer dans le système.</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="ong-id" name="id" />
                        <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}" />
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        $("#region").on("change", function () {
            var id = $(this).val();
            $("#code").val($("#code"+id).text()+"-");
        });

        {{--$("#region").on("change", function () {--}}
            {{--var id = $(this).val();--}}
            {{--$.ajax({--}}

                {{--type : "POST",--}}
                {{--url : "{{route('getAssociationByRegion')}}",--}}
                {{--data : {--}}
                    {{--"id" : id,--}}
                    {{--"_token" : "{{Session::token()}}"--}}
                {{--},--}}
                {{--success: function (data) {--}}
                    {{--console.log(data);--}}
                    {{--$("#association").empty();--}}
                    {{--for(var i =0; i < data.length; i++){--}}
                        {{--$("#association").append("<option value='"+data[i]["id"]+"' >"+data[i]["libelle"]+"</option>");--}}
                    {{--}--}}
                {{--},--}}
                {{--error:function (data) {--}}
                    {{--alert("Une erreur s'est produite, impossible de charger les associations");--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}



        $(".edit-modal").on("click", function (event) {
            event.preventDefault();
            $("#edit-id").val($(this).data("id"));
            $("#edit-code").val($(this).data("code"));
			$("#edit-nom").val($(this).data("nom"));
            $("#edit-prenom").val($(this).data("prenom"));
			$("#edit-email").val($(this).data("email"));
			$("#edit-telephone").val($(this).data("telephone").substr(5, 8));	
			
			if($(this).data("sexe") != null)
            $("#edit-sexe").val($(this).data("sexe"));
		
			if($(this).data("region")!= "Non défini")
            $("#edit-region").val($(this).data("region"));

            $("#editModal").modal("show");
        });
        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#ong-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });



        $("#region").on("change", function(){
            var id = $(this).val();
            $.ajax({

                type : "POST",
                url : "{{route('getRegionauxByRegion')}}",
                data : {
                    "id" : id,
                    "_token" : "{{Session::token()}}"
                },
                success: function (data) {
                    $("#regionaux-liste").empty();
                    for(var i =0; i < data.length; i++){
                        $("#regionaux-liste").append('<tr> <td><input type="checkbox"  name="regionaux[]" value="'+data[i].id+'" /></td> <td>'+data[i].code+'</td> </tr>');
                    }
                },
                error:function (data) {
                    alert("Une erreur s'est produite, impossible de charger les associations");
                }
            });
        });
    </script>

@endsection