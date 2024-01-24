@extends("Template.newVitrineTemplate")

@section("title")
Le dépistage volontaire du VIH
@endsection

@section("referencement")

<meta name="description" content="Le test de dépistage est une analyse de sang qui permet de connaître son statut sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Conseils pratiques sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/conseil-depistage">
<meta name="robots" content="index, follow">

<meta name="image" content="https://econvivial.org/dist/img/conseils/depistage.jpg"/>

<meta property="og:url" content="https://econvivial.org/dist/conseil-depistage">
<meta property="og:image" content="https://econvivial.org/dist/img/conseils/depistage.jpg">
@endsection

@section("body")

<!--Header-Area-->
<header class="blue-bg relative fix" id="home">

  <div class="section-bg overlay-bg dewo ripple"></div>

  @include("HeaderNav.vitrineNav")
  <div class="space-80"></div>

  <div class="container text-white">
    <div class="row">

      <div class="col-xs-12 col-md-4">
        <div class="wow fadeInLeft" data-wow-delay="1s">
          <div class="item"><img src="dist/img/banniere_conseils/module1.jpeg" alt=""></div>
        </div>
      </div>

    </div>

  </div>
</header>

<section style="background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;">
  <div class="space-70"></div>
  <div class="container">
    <h2 class="text-center" style="color:#ff4081;">Le dépistage volontaire du VIH </h2>
    
    <div class="space-20"></div>
<div class="row text-center">
    <div class="col-sm-3" >
        <a href="images/conseils/PDF/M3.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M3.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M3.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
       <b> Ecouter l'audio français </b> <br/>
        <audio controls>
          <source src="images/conseils/FRANCAIS/M3.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

</div>

    <div class="space-50"></div>

    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 text-center">
        <p style="color:#3F729B;">
          <i class="fa fa-caret-right" style="font-size: 45px;margin-top: 10px;color:#ff4081;"></i>
          Le test de dépistage est une analyse de sang qui permet de connaître son statut
          sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 wow fadeInLeft">

        <p>
         <h4 style="color: #007E33;"><i class=""></i> AVANTAGES DE DEPISTAGE DU VIH</h4>
         <ul>
          <li>Connaître son statut sérologique permet de
          changer de comportement</li>
          <li>Etre rassuré et préserver son statut si on est
          séronégatif</li>
          <li>Se faire prendre en charge rapidement</li>
          <li>Permettre un suivi médical</li>
          <li>Etre rassuré avant le mariage</li>
          <li>Vivre positivement.</li>
        </ul>
      </p>

      <p>
        <h4 style="color: red; text-transform: uppercase;">NOTEZ BIEN</h4>

        <ul>
          <li>Si vous êtes séronégatif, continuez à prendre
            des mesures pour ne pas être infecté et refaire le
          test après 1 mois</li>
          <li>Si vous êtes séropositif vous devez vous
            protéger pour éviter de vous réinfecter ou
          infecter d'autres personnes</li>
          <li>Vous devez protéger vos partenaires</li>
          <li>Les femmes enceintes doivent se faire consulter
          pour éviter de transmettre le virus à leurs bébés</li>
          <li>Le séropositif ou la PVVIH doit respecter les
            règles d'hygiène de vie pour rester en bonne
          santé le plus longtemps possible.</li>
        </ul>
      </p>
    </div>
    <div class="col-sm-6 wow fadeInRight" style="padding-left :20px;">
      <div class="row">
        <p >
         <img class="img img-responsive" src="dist/img/conseils/depistage.jpg" >
       </p>

     </div>

     <div style="border: 3px solid red; border-radius: 20px;padding: 20px;text-align: center;">
      <p>
       <h4 style="color:red;">
        CENTRES DE DEPISTAGE
      </h4> 
      <p>
        Aujourd'hui, dans presque tous les Centres
        de Santé publics à Lomé et à l'intérieur du pays :
      </p>
    </p>
  </div>

</div>
</div>


</div>
<div class="space-80"></div>
</section>
@include("Footer.vitrineFooter")
<!--Footer-area-->

@include("Conseil.like")

<script>
    $(window).load(function () {
       
        setTimeout(function(){
            $("body").css("margin", "0");
            $("body").css("height", "100%");
            $("body").css("overflow", "hidden");
            $(".hover_bkgr_fricc").css("overflow-y","auto");
            $('.hover_bkgr_fricc').show();
        },10000);

        @if($user == null)
        $("#like").click(function(){
        
           var telephone = $("#telephone").val();
           var age = $("#age").val();
           var sexe = $("#sexe").val();
           var profession = $("#profession").val();
           var region = $("#region").val();

            if(telephone == null || age == null || profession == null || region == null){
              alert("Remplir tous les champs");
            }else{
              saveConseilReadSecond("{{$conseil->id}}",telephone, sexe, age, profession, region); 
                 $('.hover_bkgr_fricc').hide();
                $("body").css("overflow", "visible");
            }

        });
        @endif
    });

</script>

@endsection