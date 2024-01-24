  
  
<!-- partial -->
<div class="login_popup" id="popup_form">
	<div class="box">
		<div class="form">
			<!-- <div class="close" id="close_btn">&times;</div> -->
            <h4 style="font-size: 16px; font-weight:400;">Vous aimez cet article ? Merci de remplir le formulaire ci-après pour continuer la lecture</h4>  

      <form > 
			<!-- <div class="form_group">
				<input type="text" placeholder="Enter your email" class="popup_input">
			</div> -->
			<div class="form_group">
        <div class=""><input class="popup_input" placeholder="Numéro de téléphone sans indicatif" type="text" name="telephone" id="telephone" /></div>

			</div>
			<div class="form_group">
        <select class="popup_input" name="age" id="age">
          <option disabled="true"  selected="true">Choisir votre age</option>
          @for($i = 13; $i < 70 ; $i++)
          <option value="{{$i}}">{{$i}}</option>
          @endfor
      </select>
			</div>
			<div class="form_group">
        <select class="popup_input" name="sexe" id="sexe">
          <option disabled="true"  selected="true">Choisir votre sexe</option>
          <option value="Masculin">Masculin</option>
          <option value="Féminin">Féminin</option>
      </select>
			</div>
			<div class="form_group">
				<select class="popup_input" name="profession" id="profession">
          <option disabled="true" selected>Sélectionnez votre profession</option>
                     <option value="Entrepreneur">Entrepreneur</option>
                     <option value="Employé">Employé</option>
                     <option value="Fonctionnaire">Fonctionnaire</option>
                     <option value="Étudiant">Étudiant</option>
                     <option value="Élève">Élève</option>
                     <option value="Apprenti">Apprenti</option>
                     <option value="Autre">Autre</option>
     </select>
			</div>

			<div class="form_group">
     
          <select class="popup_input" name="region" id="region" required>
              <option disabled="true" selected>Sélectionnez votre région</option>
              @foreach($regions as $region)
                  <option value="{{$region->libelle}}">{{$region->libelle}}</option>
              @endforeach
          </select>
      
			</div>
			<button class="btn btn-success " id="like" onclick="close();" class="btn close">Envoyer</button>
            
    </form> 
		</div>
	</div>
</div>



<script type="text/javascript">
	var popup_login = document.getElementById('popup_form');
	var close = document.getElementById('close_btn');

	window.addEventListener("load", function (){

		setTimeout(function(){

			popup_login.classList.add('anyname');

		 },5000) // 1 secon is 1000ms so 5 second is = to 5000ms.


	}) // 5 second popup are working count our time and check it now 
	// create close btn event
	close.addEventListener("click", function close(){
			popup_login.classList.remove('anyname');
		 }) //friends create 5 second popup form you are check for pouse video check the and after i am close btn is work properly 
	// now add transition


</script>
 
  
  
  
  
  
  
  
  
  
  
  
  
{{--   
  <a class="trigger_popup_fricc"></a>

<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>

        <div class="row"> 
              <img style="text-align: center;" src="images/favicon.jpg"/>  
              <h4>Vous aimez cet article ? Merci de remplir le formulaire ci-après pour continuer la lecture</h4>  
        </div>    

         <div class="row"> 
            <div class="col-sm-3"><label class="control-label">Téléphone</label></div>
            <div class="col-sm-9"><input class="form-control" placeholder="Numéro de téléphone sans indicatif" type="text" name="telephone" id="telephone" /></div>
         </div> 

         <div class="row"> 
            <div class="col-sm-3"><label class="control-label">Age</label></div>
            <div class="col-sm-9">
                <select class="form-control" name="age" id="age">
                    <option disabled="true"  selected="true">Choisir votre age</option>
                    @for($i = 13; $i < 70 ; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
         </div> 

        <div class="row"> 
            <div class="col-sm-3"><label class="control-label">Sexe</label></div>
            <div class="col-sm-9">
                <select class="form-control" name="sexe" id="sexe">
                    <option disabled="true"  selected="true">Choisir votre sexe</option>
                    <option value="Masculin">Masculin</option>
                    <option value="Féminin">Féminin</option>
                </select>
            </div>
         </div>


        <div class="row"> 
            <div class="col-sm-3"><label class="control-label">Profession</label></div>
            <div class="col-sm-9">
                <select class="form-control" name="profession" id="profession">
                     <option disabled="true" selected>Sélectionnez votre profession</option>
                                <option value="Entrepreneur">Entrepreneur</option>
                                <option value="Employé">Employé</option>
                                <option value="Fonctionnaire">Fonctionnaire</option>
                                <option value="Étudiant">Étudiant</option>
                                <option value="Élève">Élève</option>
                                <option value="Apprenti">Apprenti</option>
                                <option value="Autre">Autre</option>
                </select>
            </div>
         </div>

            <div class="row">
                     <div class="col-sm-3"><label class="control-label">Région</label></div>
                        <div class="col-sm-9">
                            <select class="form-control" name="region" id="region" required>
                                <option disabled="true" selected>Sélectionnez votre région</option>
                                @foreach($regions as $region)
                                    <option value="{{$region->libelle}}">{{$region->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                    
            </div>

        <button class="btn btn-success" id="like">Envoyer </button>
    </div>
</div> --}}