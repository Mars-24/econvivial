{{-- 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>conseils cellules CD4</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<style>
    body {
  color: #768390;
  background: #FFF;
  font-family: "Effra", Helvetica, sans-serif;
  padding: 0;
  -webkit-font-smoothing: antialiased;
}

h1, h2, h3, h4, h5, h6 {
  color: #3D4351;
  margin-top: 0;
}

a {
  color: #FF6B6B;
}
a:hover {
  color: #ff9a9a;
  text-decoration: none;
}

.example-header {
  background: #3D4351;
  color: #FFF;
  font-weight: 300;
  padding: 3em 1em;
  text-align: center;
}
.example-header h1 {
  color: #FFF;
  font-weight: 300;
  margin-bottom: 20px;
}
.example-header p {
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-weight: 700;
}

.container-fluid .row {
  padding: 0 0 4em 0;
}
.container-fluid .row:nth-child(even) {
  background: #F1F4F5;
}

.example-title {
  text-align: center;
  margin-bottom: 60px;
  padding: 3em 0;
  border-bottom: 1px solid #E4EAEC;
}
.example-title p {
  margin: 0 auto;
  font-size: 16px;
  max-width: 400px;
}

/*==================================
    TIMELINE
==================================*/
/*-- GENERAL STYLES
------------------------------*/
.timeline {
  line-height: 1.4em;
  list-style: none;
  margin: 0;
  padding: 0;
  width: 100%;
}
.timeline h1, .timeline h2, .timeline h3, .timeline h4, .timeline h5, .timeline h6 {
  line-height: inherit;
}

/*----- TIMELINE ITEM -----*/
.timeline-item {
  padding-left: 40px;
  position: relative;
}
.timeline-item:last-child {
  padding-bottom: 0;
}

/*----- TIMELINE INFO -----*/
.timeline-info {
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 3px;
  margin: 0 0 0.5em 0;
  text-transform: uppercase;
  white-space: nowrap;
}

/*----- TIMELINE MARKER -----*/
.timeline-marker {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 15px;
}
.timeline-marker:before {
  background: #FF6B6B;
  border: 3px solid transparent;
  border-radius: 100%;
  content: "";
  display: block;
  height: 15px;
  position: absolute;
  top: 4px;
  left: 0;
  width: 15px;
  transition: background 0.3s ease-in-out, border 0.3s ease-in-out;
}
.timeline-marker:after {
  content: "";
  width: 3px;
  background: #CCD5DB;
  display: block;
  position: absolute;
  top: 24px;
  bottom: 0;
  left: 6px;
}
.timeline-item:last-child .timeline-marker:after {
  content: none;
}

.timeline-item:not(.period):hover .timeline-marker:before {
  background: transparent;
  border: 3px solid #FF6B6B;
}

/*----- TIMELINE CONTENT -----*/
.timeline-content {
  padding-bottom: 40px;
}
.timeline-content p:last-child {
  margin-bottom: 0;
}

/*----- TIMELINE PERIOD -----*/
.period {
  padding: 0;
}
.period .timeline-info {
  display: none;
}
.period .timeline-marker:before {
  background: transparent;
  content: "";
  width: 15px;
  height: auto;
  border: none;
  border-radius: 0;
  top: 0;
  bottom: 30px;
  position: absolute;
  border-top: 3px solid #CCD5DB;
  border-bottom: 3px solid #CCD5DB;
}
.period .timeline-marker:after {
  content: "";
  height: 32px;
  top: auto;
}
.period .timeline-content {
  padding: 40px 0 70px;
}
.period .timeline-title {
  margin: 0;
}

/*----------------------------------------------
    MOD: TIMELINE SPLIT
----------------------------------------------*/
@media (min-width: 768px) {
  .timeline-split .timeline, .timeline-centered .timeline {
    display: table;
  }
  .timeline-split .timeline-item, .timeline-centered .timeline-item {
    display: table-row;
    padding: 0;
  }
  .timeline-split .timeline-info, .timeline-centered .timeline-info,
.timeline-split .timeline-marker,
.timeline-centered .timeline-marker,
.timeline-split .timeline-content,
.timeline-centered .timeline-content,
.timeline-split .period .timeline-info {
    display: table-cell;
    vertical-align: top;
  }
  .timeline-split .timeline-marker, .timeline-centered .timeline-marker {
    position: relative;
  }
  .timeline-split .timeline-content, .timeline-centered .timeline-content {
    padding-left: 30px;
  }
  .timeline-split .timeline-info, .timeline-centered .timeline-info {
    padding-right: 30px;
  }
  .timeline-split .period .timeline-title, .timeline-centered .period .timeline-title {
    position: relative;
    left: -45px;
  }
}

/*----------------------------------------------
    MOD: TIMELINE CENTERED
----------------------------------------------*/
@media (min-width: 992px) {
  .timeline-centered,
.timeline-centered .timeline-item,
.timeline-centered .timeline-info,
.timeline-centered .timeline-marker,
.timeline-centered .timeline-content {
    display: block;
    margin: 0;
    padding: 0;
  }
  .timeline-centered .timeline-item {
    padding-bottom: 40px;
    overflow: hidden;
  }
  .timeline-centered .timeline-marker {
    position: absolute;
    left: 50%;
    margin-left: -7.5px;
  }
  .timeline-centered .timeline-info,
.timeline-centered .timeline-content {
    width: 50%;
  }
  .timeline-centered > .timeline-item:nth-child(odd) .timeline-info {
    float: left;
    text-align: right;
    padding-right: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(odd) .timeline-content {
    float: right;
    text-align: left;
    padding-left: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(even) .timeline-info {
    float: right;
    text-align: left;
    padding-left: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(even) .timeline-content {
    float: left;
    text-align: right;
    padding-right: 30px;
  }
  .timeline-centered > .timeline-item.period .timeline-content {
    float: none;
    padding: 0;
    width: 100%;
    text-align: center;
  }
  .timeline-centered .timeline-item.period {
    padding: 50px 0 90px;
  }
  .timeline-centered .period .timeline-marker:after {
    height: 30px;
    bottom: 0;
    top: auto;
  }
  .timeline-centered .period .timeline-title {
    left: auto;
  }
}

/*----------------------------------------------
    MOD: MARKER OUTLINE
----------------------------------------------*/
.marker-outline .timeline-marker:before {
  background: transparent;
  border-color: #FF6B6B;
}
.marker-outline .timeline-item:hover .timeline-marker:before {
  background: #FF6B6B;
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<script src="https://use.typekit.net/bkt6ydm.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<header class="example-header">
    <h1 class="text-center">Le taux de cellules CD4</h1>
   
</header>


<div class="row text-center" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="col-sm-3" >
        <a href="images/conseils/PDF/M11.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
      </div>

      <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M11.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
         </audio>
       </div>

       <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M11.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
          </audio>
        </div>

        <div class="col-sm-3">
         <b> Ecouter l'audio français </b> <br/>
         <audio controls>
          <source src="images/conseils/FRANCAIS/M11.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
          </audio>
        </div>

    </div>
    
  <div class="space-50"></div>
<!-- 

<div class="container-fluid">
    <div class="row example-basic">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                <ul class="timeline">
                    <li class="timeline-item">
                        <div class="timeline-info">
                            <span>March 12, 2016</span>
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title"> 1er jour des règles</h3>
                            <p>
                                Le cycle menstruel va du 1er jour des règles jusqu'au
                                dernier jour qui précède les règles suivantes.
                            </p>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-info">
                            <span>March 23, 2016</span>
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">21 à 35 jours des règles</h3>
                            <p>
                                Elle peut varier entre 21 à 35 jours. On a pris la durée
                        de 28 jours comme norme pour les documents. Toute
                        femme qui a un cycle régulier (donc à des intervalles
                        identiques) que ce soit de 21, 28 ou 35 jours a un cycle
                        normal.
                            </p>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-info">
                            <span>March 23, 2016</span>
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">14 jours avant le 1er jour
                                des règles</h3>
                            <p>
                                L'ovulation a toujours lieu 14 jours avant le 1er jour
                        des règles suivantes. Les règles durent en moyenne 3
                        à 7 jours.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>            
            -->
        <div class="col-md-12 example-title">
            <h2>Le taux de CD4 est la mesure du nombre de cellules CD4 par mm3 de sang et non pas dans
                l'ensemble de l'organisme. </h2>
            <p></p>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 12, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">La 1ère phase ou la phase pré-ovulatoire</h3>
                        <p>
                            Le taux de cellules CD4 chez les personnes séronégatives peut aller de 500 à 1 500* 
                        </p>
                    </div>
                </li>
              <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 23, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                         <p>
                            Le taux de CD4 peut monter ou descendre en réponse à certains 
                            facteurs, notamment une infection ou une maladie.
                        </p>
                            
                    </div>
                </li>

                <li class="timeline-item period">
                    <div class="timeline-info"></div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h2 class="timeline-title">April 2016</h2>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 02, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">La plupart des cas</h3>
                       
                        <p>
                            Si vous souffrez d'une infection, telle que grippe ou herpès, il
           vaut mieux retarder l'examen de CD4 jusqu'à ce que vous vous
            sentiez mieux.
                        </p>

                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 28, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Cas chez l'homme et chez la femme</h3>
                       

                        <p>
                            Si vous êtes une PVVIH n'ayant aucun symptôme et si vous ne
                            prenez pas de médicaments contre le VIH, votre taux de CD4 ne
                             sera mesuré que tous les trois ou quatre mois.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row example-split">
        <div class="col-md-12 example-title">
             <h2>QUE PEUT PRÉDIRE VOTRE TAUX DE CELLULES CD4 ?</h2>
            <!-- <p>Small devices (tablets, 768px and up)</p>  -->
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline timeline-split">
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 12, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">La 2ème phase ou la phase ovulatoire </h3>
                        <p>
                            Le contrôle du taux de CD4 peut vous aider à prendre des
                            décisions importantes avec votre médecin sur votre traitement
                             antirétroviral et sur vos soins.
                        </p>
                    </div>
                </li>

                <div class="col-md-12 example-title">
                    <h2>QUAND COMMENCER LE TRAITEMENT ANTIRÉTROVIRAL ?</h2>
                   <!-- <p>Small devices (tablets, 768px and up)</p>  -->
                </div>
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 23, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">La 3ème phase ou la phase post ovulatoire</h3>
                            
                        <p>
                            On recommande en général de commencer le traitement
                            antirétroviral lorsque le taux de cellules CD4 d'un individu
                            descend à 350 ou 200*. Ce taux n'est pas un standard. Le taux
                            peut toutefois varier selon le protocole national de PEC. Et quelque fois le traitement commence dès que la personne est dépistée positive au VIH.
                        </p>

                    </div>
                </li>
                <li class="timeline-item period">
                    <div class="timeline-info"></div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h2 class="timeline-title">April 2016</h2>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 02, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Event Title</h3>
                        
                        <p>
                            Une fois le traitement antirétroviral commencé, votre taux de
                            cellules CD4 augmentera probablement petit à petit. La vitesse
                            à laquelle ceci se produira varie beaucoup selon les individus.
                          </p>
                    </div>
                </li>
                <div class="col-md-12 example-title">
                    <h2>LE POURCENTAGE DE CELLULES CD4</h2>
                   <!-- <p>Small devices (tablets, 768px and up)</p>  -->
                </div>

                 <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 28, 2016</span>
                    </div>
                     <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">La progestérone a trois effets :</h3>
                        <p>
                            Chez une personne séronégative, le pourcentage de cellules
                            CD4 se trouverait aux environs de 40%.
                        </p>
                    </div> 
                </li>  


                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 28, 2016</span>
                    </div>
                     <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">La progestérone a trois effets :</h3>
                        <p>
                            Un pourcentage de cellules CD4 aux alentours de 14% est
                            sensé indiquer le même risque de maladie qu'un taux de cellules CD4 égal à 200*.
                        </p>
                    </div> 
                </li>  
            </ul>
        </div>
    </div>
    <!-- <div class="row example-centered">
        <div class="col-md-12 example-title">
            <h2>MÉCANISME DE SURVENUE DES RÈGLES</h2>
             <p>Medium devices (desktops, 992px and up).</p>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline timeline-centered">
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 12, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Mécanisme 1</h3>
                        <p> En l'absence de la nidation d'un ovule fécondé, le corps
                            jaune meurt au bout de 12 à 14 jours. La sécrétion de
                            progestérone baisse.</p>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 23, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Mécanisme 2</h3>
                        <p>
                            L'endomètre devient caduque, se détache et saigne :
                            c'est la menstruation ou les règles.
                        </p>
                    </div>
                </li>
                <li class="timeline-item period">
                    <div class="timeline-info"></div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h2 class="timeline-title">April 2016</h2>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 02, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Mécanisme 3</h3>
                        <p>
                            La baisse de progestérone stimule le cerveau qui à son
tour envoie des directives à son organe évoqué à la
première phase. Celui-ci produit de nouveau le FSH, et le
cycle recommence.
                        </p>
                    </div>
                </li> 
               <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 28, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Event Title</h3>
                        <p>Nullam vel sem. Nullam vel sem. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Donec vitae sapien ut libero venenatis faucibus. ullam dictum felis
                            eu pede mollis pretium. Pellentesque ut neque. </p>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- partial -->
  
</body>
</html>


 --}}



 @extends("Template.newVitrineTemplate")

@section("title")
Le taux de cellules CD4
@endsection

@section("referencement")

<meta name="description" content="Le taux de CD4 est la mesure du nombre de cellules CD4 par mm3 de sang et non pas dans l'ensemble de l'organisme." />

<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">

<meta name="category" content="Conseils pratiques sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/conseil-cellule-cd4">
<meta name="robots" content="index, follow">

<meta name="image" content="https://econvivial.org/dist/img/conseils/cd4.jpg"/>

<meta property="og:url" content="https://econvivial.org/conseil-cellule-cd4">
<meta property="og:image" content="https://econvivial.org/dist/img/conseils/cd4.jpg">
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
    <h2 class="text-center" style="color:#ff4081;"> Le taux de cellules CD4 </h2>
    

    <div class="space-20"></div>
    <div class="row text-center">
      <div class="col-sm-3" >
        <a href="images/conseils/PDF/M11.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
      </div>

      <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M11.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
         </audio>
       </div>

       <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M11.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
          </audio>
        </div>

        <div class="col-sm-3">
         <b> Ecouter l'audio français </b> <br/>
         <audio controls>
          <source src="images/conseils/FRANCAIS/M11.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
          </audio>
        </div>

      </div>
      
    <div class="space-50"></div>

    <div class="row">
        <h4 class="text-center" style="color: blue;"><b>Le taux de CD4 est la mesure du nombre de cellules CD4 par mm3 de sang et non pas dans
l'ensemble de l'organisme.</b></h4>

      <div class="col-sm-6">

        <p>
      Le taux de cellules CD4 chez les personnes séronégatives peut aller de 500 à 1 500* 

        </p>  

        <p>
          Le taux de CD4 peut monter ou descendre en réponse à certains 
          facteurs, notamment une infection ou une maladie.
        </p>

        <p>
          Si vous souffrez d'une infection, telle que grippe ou herpès, il
           vaut mieux retarder l'examen de CD4 jusqu'à ce que vous vous
            sentiez mieux.
        </p>

        <p>
          Si vous êtes une PVVIH n'ayant aucun symptôme et si vous ne
           prenez pas de médicaments contre le VIH, votre taux de CD4 ne
            sera mesuré que tous les trois ou quatre mois.
        </p>

        <h4 style="color: green;">QUE PEUT PRÉDIRE VOTRE TAUX DE CELLULES CD4 ?</h4>

        
        <p>
          Le contrôle du taux de CD4 peut vous aider à prendre des
           décisions importantes avec votre médecin sur votre traitement
            antirétroviral et sur vos soins.
        </p>

      </div>

      <div class="col-sm-6"  style="color:#3F729B;">

        <h4 style="color: green;">QUAND COMMENCER LE TRAITEMENT ANTIRÉTROVIRAL ?</h4>

        
        <p>
          On recommande en général de commencer le traitement
           antirétroviral lorsque le taux de cellules CD4 d'un individu
           descend à 350 ou 200*. Ce taux n'est pas un standard. Le taux
           peut toutefois varier selon le protocole national de PEC. Et quelque fois le traitement commence dès que la personne est dépistée positive au VIH.
        </p>

        <p>
          Une fois le traitement antirétroviral commencé, votre taux de
          cellules CD4 augmentera probablement petit à petit. La vitesse
          à laquelle ceci se produira varie beaucoup selon les individus.
        </p>

        <h4 style="color: green;">LE POURCENTAGE DE CELLULES CD4</h4>

        <p>
          Chez une personne séronégative, le pourcentage de cellules
          CD4 se trouverait aux environs de 40%.
        </p>

        <p>
          Un pourcentage de cellules CD4 aux alentours de 14% est
sensé indiquer le même risque de maladie qu'un taux de cellules CD4 égal à 200*.
        </p>
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