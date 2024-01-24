@extends("Template.mainTemplate")


@section("title")
Prendre un RDV de consultation
@endsection


@section("body")

<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  	@include('HeaderNav.adminNav')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    @include('Profile.adminSideProfil')
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->

    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="card-title"></div>
        <div class="card widget-card-1">
          <div class="card-block-big" style="text-align: center;">
           <p><h3><b><u>Faire une consultation IST</u></b></h3></p>
           <div class="row">
            <!-- card1 start -->
            <div class="col-12 ">

              <form class="form form-horizontal" action="{{route('saveConvivialConsultationAdmin')}}" method="POST">

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

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Profession</label>
                      <div class="col-sm-9">
                        <input type="text" required class="form-control" name="profession" placeholder="Votre profession" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Situation Matrimoniale</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="situation-matri" required>
                          <option disabled selected>Votre situation matrimoniale</option>
                          <option value="Célibataire">Célibataire</option>
                          <option value="Marié(e)">Marié(e)</option>
                          <option value="Veuf(ve)">Veuf(ve)</option>
                          <option value="Divorcé(e)">Divorcé(e)</option>
                          <option value="En Concubine">En Concubine </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Région</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="region" id="region" required>
                          <option disabled selected>Sélectionner votre région</option>
                          @foreach($regions as $region)
                          <option  value="{{$region->libelle}}">{{$region->libelle}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Ville</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="ville" id="ville" required>
                          <option value=""></option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Choisir la formation sanitaire la plus proche</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="formation-sanitaire" id="formation-sanitaire" required>
                          <option></option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Objet de la consultation</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="objet" id="objet" required>
                          <option disabled selected>Choisissez l'objet</option>
                          @foreach($objets as $objet)
                          <option value="{{$objet->libelle}}">{{$objet->libelle}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nbre Enfants</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="nbre-enfant" required>
                          <option disabled selected>Sélectionner un nombre</option>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="+ de 12">+ de 12</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Voyage Régulièrement</label>
                      <div class="col-sm-9">
                        <div class="col-sm-5">
                          <div class="form-radio">
                            <label class="form-check-label" style="font-size: 15px;">
                              <input type="radio" class="form-check-input" name="voyage"  value="1" >
                              OUI
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-radio">
                            <label class="form-check-label" style="font-size: 15px;">
                              <input type="radio" class="form-check-input" name="voyage"  value="0" checked>
                              NON
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group" id="objet-desc" style="display: none; padding-left: 20px;">
                  <div class="card widget-card-1">
                    <div class="card-block-big" style="text-align: center;">
                      <h4><b><u>Description de l'objet de la consultation</u></b></h4>
                      <p><b id="objet-text" style="color: red;font-size: 15px;"></b></p>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12" style="padding-left: 20px;">

                    <h4 style="float: left;">Décrivez votre problème</h4>

                    <textarea class="form-control" name="description" rows="5" placeholder="Décrivez votre problème" required></textarea>

                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="form-group justify-content-center">
                    <div class="col-sm-6 " >
                      <input type="hidden" name="_token" value="{{Session::token()}}" />
                      <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Envoyer</button>
                    </div>
                  </div>
                </div>
              </form>

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

<div class="modal fade" id="consultation-modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 70%;">
    <div class="modal-content " style="background-color: white;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-2">Demande de consultation envoyée</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if(Session::get("formation") != null)
      <span style="display: none">{{$formation = Session::get("formation")}}</span>
      <div class="modal-body" style="position: center;vertical-align: middle;">
        <p><h4 class="text-center"><b style="color:blue; text-align: center;">{{Auth::user()->username}}, prière vous référer à la formation sanitaire suivante pour votre traitement.
        Un personnel qualifié est informé de votre arrivée et vous attend.</b></h4></p>
        <div class="row">
          <div class="form-group justify-content-center">
              <table class="table table-bordered table-condensed table-responsive table-responsive-lg" style="width: 100%;">
                <tbody>
                  <tr>
                    <td><b style="text-transform: uppercase;">Nom du centre</b></td>
                    <td>{{$formation->libelle}}</td>
                  </tr>
                  <tr>
                    <td><b style="text-transform: uppercase;">Ville</b></td>
                    <td>{{\App\Ville::where("id", $formation->ville_id)->first()->libelle}}</td>
                  </tr>
                  <tr>
                    <td><b style="text-transform: uppercase;">Situation géographique</b></td>
                    <td>{{$formation->situationGeo}}</td>
                  </tr>
                  <tr>
                    <td><b style="text-transform: uppercase;">Téléphone</b></td>
                    <td>{{$formation->telephone}}</td>
                  </tr>
                  <tr>
                    <td><b style="text-transform: uppercase;">Frais consultation</b></td>
                    <td>{{$formation->frais}}</td>
                  </tr>
                  <tr>
                    <td><b>NOM DU POINT FOCAL DES PRESTATAIRES</b></td>
                    <td>{{$formation->pointFocal}}</td>
                  </tr>
                  <tr>
                    <td><b>CONTACT DU POINT FOCAL DES PRESTATAIRES</b></td>
                    <td>{{$formation->contact}}</td>
                  </tr>
                  <tr>
                    <td><b>SERVICES OFFERTS</b></td>
                    <td>{{$formation->service}}</td>
                  </tr>
                  <tr>
                    <td><b>Lien de Localisation (Google MAP)</b></td>
                    <td>{{$formation->lienLocalisation}}</td>
                  </tr>
                </tbody>
              </table>

          </div>
        </div>
        @endif
      </div>
      <div class="modal-footer">
        <input type="hidden" id="formation-id" />
        <a class="btn btn-success" href="{{route('mes-consultations-en-attentes')}}">OK</a>
      </div>
    </div>
  </div>
</div>

<script>
  $("#region").change(function(){
          //  alert($(this).val());
          var region = $(this).val();
          $.ajax({
            type : "POST",
            url:"{{route('showVille')}}",
            data:{
              '_token': '{{Session::token()}}',
              'libelle': region
            },
            success: function(data){
              if(data["error"] === false){
                $('#ville')
                .find('option')
                .remove()
                .end();
                for (var i=0 ; i< data["villes"].length ; i++) {
                  $('#ville').append('<option value="' + data["villes"][i].libelle + '" >' + data["villes"][i].libelle  + '</option>');
                }
                       // alert(data["villes"][0].libelle);
                        // Set selected value
                      //  $('#ville').val(data["villes"][0].libelle);
                      $('#formation-sanitaire')
                      .find('option')
                      .remove()
                      .end();
                      showFormation(data["villes"][0].libelle);
                    }else{
                      alert("Impossible de récupérer les villes correspondantes. Une erreur s'est produite");
                    }
                   // alert(data["villes"][0].libelle);
                 }
               });
        });

  $("#objet").change(function(){
            //  alert($(this).val());
            var objet = $(this).val();
            $.ajax({
              type : "POST",
              url:"{{route('showObjetDesc')}}",
              data:{
                '_token': '{{Session::token()}}',
                'libelle': objet
              },
              success: function(data){
                $('#objet-text').text(data["desc"]);
                $("#objet-desc").show("slow");
                   // alert(data["desc"]);
                 }
               });
          });

  $("#ville").change(function(){
            //  alert($(this).val());
            var ville = $(this).val();
            showFormation(ville);
          });

  function showFormation(label){
    $.ajax({
      type : "POST",
      url:"{{route('showFormationSanitaire')}}",
      data:{
        '_token': '{{Session::token()}}',
        'libelle': label
      },
      success: function(data){
        if(data["error"] === false){
          $('#formation-sanitaire')
          .find('option')
          .remove()
          .end();
          for (var i=0 ; i< data["formations"].length ; i++) {
            console.log(data["formations"][i].libelle);
            $('#formation-sanitaire').append('<option value="'+ data["formations"][i].libelle +'"  selected>' + data["formations"][i].libelle  + '</option>');
          }
        }else{
          alert("Impossible de récupérer les formations sanitaires correspondantes. Une erreur s'est produite");
        }
      }
    });
  }

  $(document).ready(function(){
    @if(Session::pull("consultation") == true){
      $("#consultation-modal").modal("show");
      {{Session::put("consultation", false)}}
    }
    @endif
  });
</script>
@endsection