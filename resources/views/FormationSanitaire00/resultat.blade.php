@extends("Template.otherTemplate")


@section("title")
    Résultats envoyés aux utilisateurs
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navFormationSanitaire")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include("Profile.formationSideProfil")

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Résultats de consultations envoyés aux utilisateurs </h4>
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

                                            <table id="table" class="table table-bordered table-striped table-responsive"  cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Code User</th>
                                                    <th>Consultant</th>
                                                    <th>Objet Consulation</th>
                                                    <th>Motif de la consultation</th>
                                                    <th>Nature du traitement</th>
                                                    <th>Syndrome</th>
                                                    <th>Traitement</th>
                                                    <th>Traitement IST</th>
                                                    <th>Voir l'ordonnance</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($consultations as $consultation)
                                                    <tr>
                                                        <td>{{date_format(date_create($consultation->date_reponse),"d M Y") }}</td>
                                                        <td>{{\App\User::where("id", $consultation->user_id)->first()->codeUser}}</td>
                                                        <td><b>{{\App\User::where("id", $consultation->user_id)->first()->username}}</b></td>
                                                        <td><b>{{\App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle}}</b></td>
                                                        <td>{{$consultation->description}}</td>
                                                        <td><b> {{\App\ResultatConsultation::where("consultation_id", $consultation->id)->first()->natureTraitement}}</b></td>
														<td><b> {{\App\ResultatConsultation::where("consultation_id", $consultation->id)->first()->syndrome}}</b></td>
														<td><b> {{\App\ResultatConsultation::where("consultation_id", $consultation->id)->first()->traitement}}</b></td>
														<td><b> @foreach($produits as $produit) 
																	@if($produit->id == $consultation->produitist_id)
																	{{$produit->molecules}}
																@endif
																@endforeach</b></td>
                                                        
														<td>
                                                            <button class="btn btn-outline-success ordonnance-button"
                                                                    data-id="{{$consultation->consultation_id}}"
                                                                    data-formation = "{{\App\FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first()->libelle}}"
                                                                    data-ordonnance="{{\App\Consultation::where("id", $consultation->consultation_id)->first()}}">Voir l'ordonnance</button>
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
                <footer class="footer">
                    @include("Footer.dashboardFooter")
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <div class="modal fade"  id="ordonnanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 50%;">

            <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ordonnance attaché</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <button class="btn btn-success" onclick="printContent('formOrdonnance')">Imprimer</button> <br/>
                            <div class="col-sm-12" style="margin-top: 10px;" id="formOrdonnance">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <table class="table table-bordered table-striped table-condensed">
                                            <thead style="text-align: center;">
                                            <tr>
                                                <th><h3><b><span style="text-align: left;"><img src="{{asset("images/logo.png")}}" /></span> <span id="formationSanitaire" style="text-transform: uppercase; text-align: center;"></span></b></h3></th>
                                            </tr>
                                            <tr>
                                                <th><h4><b><u><span id="numOrdonnance" style="text-align: center;"></span></u></b></h4></th>
                                            </tr>
                                            </thead>

                                            <tbody id="ordonnanceBody">
												<table class='table table-bordered table-striped table-responsive' cellspacing='0'>
												<thead> 
													<tr rowspan='2'> 
														<th rowspan='2'>Molécules</th>
														<th rowspan='2'>Cond</th> 
														<th rowspan='2'>Coût U</th> 
														<th rowspan='2'>Nbre kit</th>
														<th rowspan='2'>Coût Bénéficiaire </th>   
														<th rowspan='2'>Coût AV-Jeunes </th> 
													</tr> 
												</thead> 
												<tbody>
													@foreach($ordonnances as $ordonnance)
													<tr> 
														<td>{{\App\ProduitIST::where("id", $ordonnance->produitist_id)->first()->molecules}}</td> 
														<td>{{\App\ProduitIST::where("id", $ordonnance->produitist_id)->first()->cond}}</td> 
														<td>{{\App\ProduitIST::where("id", $ordonnance->produitist_id)->first()->cout_unitaire}}</td> 
														<td>{{\App\ProduitIST::where("id", $ordonnance->produitist_id)->first()->nombre_kit}}</td> 
														<td>{{\App\ProduitIST::where("id", $ordonnance->produitist_id)->first()->cout_beneficiaire}}</td> 
														<td>{{\App\ProduitIST::where("id", $ordonnance->produitist_id)->first()->cout_av_jeunes}}</td> 
													</tr> 
													@endforeach
												</tbody> 
											</table>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>

        $(".ordonnance-button").on("click", function () {
            var id = $(this).data("id");
            var formation = $(this).data("formation");
            var ordonnance = $(this).data("ordonnance");

            $("#formationSanitaire").text(formation);
            $("#numOrdonnance").text("Ordonnance N° "+id);

            $("#ordonnanceBody").empty();
            console.log(ordonnance);

            for(var i = 0; i < ordonnance.length; i++){
                $("#ordonnanceBody").append("<tr>\n" +
                    "                            <td><b>"+ordonnance[i]["ordonnance"]+"</b></td>\n" +
                    "                        </tr>")
            }
            $("#ordonnanceModal").modal("show");
        });


        function printContent(id){
            $(this).hide();
            var restorepage = document.body.innerHTML;
            var printContent = document.getElementById(id).innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = restorepage;
            window.location.reload();
        }

    </script>
@endsection