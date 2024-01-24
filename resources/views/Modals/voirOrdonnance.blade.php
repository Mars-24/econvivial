
    <div class="modal fade"  id="{{$consultation->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document" style="width: 50%;">  
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Ordonance</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		
      </div>
	  <?php
	  $syndromes = DB::table("syndromes")->get();
	  $choixPs = DB::table("choix_produits")->get();
	  $produits = DB::table("produit_i_s_ts")->get();
	  ?>

     <div class="modal-body">
	 <div class="row">
			<div class="row">
		<button class="btn btn-success" onclick="printContent('formOrdonnance')">Imprimer</button> <br/>
		</div>
		<div class="col-sm-12" style="margin-top: 10px;" id="formOrdonnance">
		
		<center><h3><b><span style="text-align: center;"><img style="width:60px; height:60px" src="{{asset('images/logo.png')}}"/></span> 
						<span style="text-transform: uppercase; text-align: center;"> {{\App\FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first()->libelle}}</span>
						</b></h3></center> <br/>
		<center><h4><b><u><span style="text-align: center;"> Ordonance N° {{$consultation->id}}</span></u></b></h4></center>
			
			Nature du traitement => {{$consultation->natureTraitement}} </br></br>
			Syndrome => @foreach($syndromes as $syndrome) 		
												@if($consultation->syndrome==$syndrome->id)
													{{$syndrome->libelle}} 
												@endif
											@endforeach </br></br>
			Liste des médicaments => </br> @foreach($choixPs as $choixP) 		
												@if($consultation->choix_produit_id==$choixP->id)
													@foreach($produits as $produit) 
														@if($produit->id==$choixP->produitist_1_id)
															Médicament 1 : {{$produit->molecules}}  </br>
														@endif
														@if($produit->id==$choixP->produitist_2_id)
															Médicament 2 : {{$produit->molecules}}  </br>
														@endif
														@if($produit->id==$choixP->produitist_3_id)
															Médicament 3 : {{$produit->molecules}}  </br>
														@endif
														@if($produit->id==$choixP->produitist_4_id)
															Médicament 4 : {{$produit->molecules}}  </br>
														@endif
													@endforeach
												@endif
											@endforeach
      
                            </div>
      </div>
      </div>

          <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
    </div>
  </div>
    </div>
