




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>conseils cycle menstruells</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<style>

:root
{
  
  --shadow-1: 0 12px 20px hsla(210, 10%, 23%, 0.07);
  --shadow-2: 0 2px 10px hsla(0, 0%, 0%, 0.04);
  --shadow-3: 0 2px 20px var(--black_08);

}



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




/* popup */


.login_popup{
			width: 100%;
			height: 100%;
			padding: 0 10px;
		}
		.login_popup .box{
			background-color: #fff;
      position: fixed;
			padding: 0 10px;
			width: 400px;
			height: 600px;
			border-radius: 20px;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			opacity: 0;
			transition: all 1s ease-in-out;
      box-shadow: var(--shadow-1);
		}
		.login_popup.anyname{
			visibility: visible;
			opacity: 1;
		}
		.login_popup.anyname .box{
			margin-left: 0;
			opacity: 1;
		}
		.login_popup .box .form{
			padding: 40px 30px;
		}
		.login_popup .box .form h1{
			color: #000;
			font-size: 30px;
			margin: 0 0 30px;
		}
		.popup_input{
			height: 45px;
			margin-bottom: 20px;
			width: 100%;
			border: none;
			border-bottom: 1px solid #ccc;
			font-size: 15px;
			color: #cccc;
		}
		.popup_input:focus{
			outline: none;
		}
		label{
			font-size: 18px;
			color: #555;
		}
		.btn{
			width: 100%;
			background-color: #e91e63;
			margin-top: 40px;
			height: 45px;
			border-radius: 25px;
			font-size: 25px;
			border: none;
			text-transform: uppercase;
			cursor: pointer;
			color: #fff;
		}
		.close{
			position: absolute;
			right: 10px;
			top: 0;
			font-size: 30px;
			cursor: pointer;
		}


</style>
</head>
<body>
<!-- partial:index.partial.html -->
<script src="https://use.typekit.net/bkt6ydm.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<header class="example-header">
    <h1 class="text-center">Le VIH / SIDA </h1>
   
</header>


<div class="row text-center" style="margin-top: 100px; margin-bottom: 50px;">
   
   
    <div class="col-sm-3" >
        <a href="images/conseils/PDF/M2.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M2.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M2.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
       <b> Ecouter l'audio français </b> <br/>
        <audio controls>
          <source src="images/conseils/FRANCAIS/M2.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    </div>
    
  <div class="space-50"></div>


<div class="container-fluid">
    <div class="row example-basic">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                <ul class="timeline">
                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Définitioin VIH </h3>
                            <p>
                                VIH = Virus de l'Immuno-déficience Humaine  
                            </p>
                        </div>
                    </li>
                     <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Définitioin SIDA </h3>
                            <p>
                                SIDA = Syndrome d'Immuno-déficience Acquise. 
                            </p>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Définission terme Syndrome</h3>
                            <p>
                                Le terme Syndrome désigne l'Ensemble de signes 
                            </p>
                        </div>
                    </li> 

                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Définission terme Immuno-déficience </h3>
                            <p>
                                Le terme Immuno-déficience est la destruction des agents de protection de l'organisme
                            </p>
                        </div>
                    </li>

                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Définission terme Immuno-déficience </h3>
                            <p>
                                Le terme Immuno-déficience est la destruction des agents de protection de l'organisme
                            </p>
                        </div>
                    </li>

                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title"> Définission terme Acquise </h3>
                            <p>
                                Le terme Acquise fait allusion à ce qu'on contracte au cours de la vie
                            </p>
                        </div>
                    </li>

                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title"> Définission terme SIDA </h3>
                            <p>
                                En somme, le terme Sida (maladie) est un ensemble de <br/>
                                signes dû à la destruction du système immunitaire par le VIH (virus).
                            </p>
                        </div>
                    </li>
                </ul>
            </div>            
            
        <div class="col-md-12 example-title">
            <h2> MODES DE TRANSMISSION DU VIH</h2>
            <p></p>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"> Voie sexuelle </h3>
                        <p>
                            Rapport sexuel non protégé avec une personne infectée
                        </p>
                    </div>
                </li>
              <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Voie sanguine</h3>
                         <p>
                            <ul>
                                <li>Transfusion du sang infecté</li>
                                <li>Utilisation des objets tranchants souillés de sang ou de tous autres liquides biologiques infectés (sperme, lait maternel, sécrétions vaginales,etc.).</li>
                                <li>Syphilis</li>
                            </ul>
                        </p>
                            
                    </div>
                </li>

                <li class="timeline-item period">
                    <div class="timeline-info"></div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Voie mère infectée-enfant</h3>
                       
                        <p>
                            <ul>
                                <li>Au cours des du travail</li>
                                <li> Au cours de l'accouchement.</li>
                                <li> Au cours de l'allaitement</li>
                            </ul>
                        </p>

                    </div>
                </li>
                 <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Sur l'individu</h3>
                       

                        <p>
                            Une personne infectée par le VIH peut
                            développer les IO qui peuvent entrainer la dépression,
                            l'angoisse, la nervosité. Elle peut être régulièrement absente au
                            travail. Elle peut avoir le sentiment de culpabilité et elle peut être victime d'isolement, de rejet; de stigmatisation et de
                            discrimination.
                        </p>
                    </div>
                </li>

                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"> GESTES DE LA VIE SANS
                            RISQUE D'INFECTION À VIH</h3>
                       

                        <p>
                            Le VIH ne se transmet pas
                            <ul>
                             <li>En se serrant les mains</li>
                             <li>En toussant ou en éternuant</li>
                             <li>En discutant ensemble</li>
                             <li>En partageant un repas</li>
                        </p>
                    </div>
                </li> 

                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"> </h3>
                       

                        <p>
                            Dépenses élevées dues au développement des infections opportunistes, dépression, angoisse,
                            nervosité, développe des infections opportunistes, isolement, rejet, esprit de vengeance, sentiment de
                            culpabilité, stigmatisation,
                        </p>
                    </div>
                </li> 

                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"> Sur la famille</h3>
                       

                        <p>
                            Le temps consacré par une famille pour la PEC d'une PVVIH peut entrainer une diminution de productivité baisse du pouvoir d'achat, de la productivité, dislocation du tissu familial, rejet de la PVVIH,
                            stigmatisation, dépenses élevées dues au
                            Voie mère infectée-enfant développement des infections opportunistes,
                        </p>
                    </div>
                </li> 

                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"> Sur la société</h3>
                       

                        <p>
                            manque de bras valides, diminution des ressources économiques, diminution de l'espérance de vie. 
                        </p>
                    </div>
                </li> 
            </ul>
        </div>
   </div>
    <div class="row example-split">
        <div class="col-md-12 example-title">
             <h2> MESURES DE PRÉVENTION
                CONTRE L'INFECTION À VIH</h2>
            <!-- <p>Small devices (tablets, 768px and up)</p>   -->
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline timeline-split">
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"> Le VIH ne se transmet pas</h3>
                        <p>
                            <ul>
                                <li>Abstinence pure et simple des rapports sexuels.</li>
                                <li>Fidélité envers un partenaire non infecté.</li>
                                <li>Eviter tout contact avec le sang ou instruments
                                souillés de sang ''infecté''.</li>
                                <li>S'informer davantage sur l'infection.</li>
                                <li>Utilisation correcte, régulière et systématique
                                des préservatifs (condom, fémidom)</li>
                               </ul>
                        </p>
                    </div>
                </li>
 
                <!-- <div class="col-md-12 example-title">
                    <h2>QUAND COMMENCER LE TRAITEMENT ANTIRÉTROVIRAL ?</h2>
                  <p>Small devices (tablets, 768px and up)</p>  
                </div> -->
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                      <!--  <h3 class="timeline-title">Ce qu'il ne faut pas faire :</h3>
                            
                         <p>
                            <ul>
          <li>
            N'utilisez jamais un préservatif dont l'emballage est déchiré ou endommagé.
          </li>

          <li>
           N'utilisez jamais de lubrifiants à base d'huile
         </li>
         <li>
          Ne déroulez pas le préservatif avant de le  porter. Car il est difficile de mettre un préservatif déjà déroulé.
        </li>

        <li>
          N'utilisez jamais un préservatif plus d'une fois.
        </li>

        <li>
         Ne déroulez pas le préservatif avant de le porter. Cela peut le
         rendre fragile. En outre, il est difficile de mettre un préservatif
         déjà déroulé.
       </li>

     </ul> -->
                        </p>

                    </div>
                </li>

                 <!--
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
                  <p>Small devices (tablets, 768px and up)</p>  
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
    </div> -->
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
@include("Conseil.like") 

</body>
</html>

{{-- 


 @extends("Template.newVitrineTemplate")

@section("title")
Le VIH SIDA
@endsection

@section("referencement")

<meta name="description" content="Le test de dépistage est une analyse de sang qui permet de connaître son statut sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Conseils pratiques sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/conseil-vih">
<meta name="robots" content="index, follow">
<meta name="image" content="https://econvivial.org/dist/img/conseils/sida.gif"/>

<meta property="og:url" content="https://econvivial.org/conseil-vih">
<meta property="og:image" content="https://econvivial.org/dist/img/conseils/sida.gif">

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

<section style="text-align: justify; background: url('images/logo-fond.png'); background-repeat: no-repeat;background-position: center;opacity: 90%;" >
    <div class="space-70"></div>
    <div class="container">
        <h2 class="text-center" style="color:#ff4081;">Le VIH / SIDA </h2>
       
<div class="space-20"></div>
<div class="row text-center">
    <div class="col-sm-3" >
        <a href="images/conseils/PDF/M2.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M2.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M2.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
       <b> Ecouter l'audio français </b> <br/>
        <audio controls>
          <source src="images/conseils/FRANCAIS/M2.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

</div>
        <div class="space-50"></div>

        <div class="row">
            <div class="col-sm-6">
                <p style="color:#3F729B;">
                    <i class="fa fa-caret-right" style="font-size: 45px;margin-top: 10px;color:#ff4081;"></i>
                    VIH = Virus de l'Immuno-déficience Humaine  
                </p>
                <p style="color:#3F729B;">
                    <i class="fa fa-caret-right" style="font-size: 45px;margin-top: 0px;color:#ff4081;"></i>
                    SIDA = Syndrome d'Immuno-déficience Acquise. 
                </p>  

                <p style="color:#3F729B;">
                    Le terme Syndrome désigne l'Ensemble de signes <br/>
                    Le terme Immuno-déficience est la destruction des agents de protection de l'organisme
                </p>  
            </div>

            <div class="col-sm-6"  style="color:#3F729B;">
                 <div class="space-100"></div>
                <p>
                    Le terme Acquise fait allusion à ce qu'on contracte au cours de la vie
                </p>
                <p>
                    En somme, le terme Sida (maladie) est un ensemble de <br/>
                    signes dû à la destruction du système immunitaire par le VIH (virus).
                </p> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 wow fadeInLeft">

                <p>
                   <h4 style="color: #007E33;"><i class="fa fa-star"></i>  MODES DE TRANSMISSION DU VIH</h4>

                   <h5><b><u>Voie sexuelle</u></b></h5>
                   <p>Rapport sexuel non protégé avec une personne infectée</p>
                   <h5><b><u>Voie sanguine</u></b></h5>
                   <ul>
                    <li>Transfusion du sang infecté</li>
                    <li>Utilisation des objets tranchants souillés de sang ou de tous autres liquides biologiques infectés (sperme, lait maternel, sécrétions vaginales,etc.).</li>
                    <li>Syphilis</li>
                </ul>
            </p>

            <p>
               <h5><b><u>Voie mère infectée-enfant</u></b></h5>
               Au cours des du travail. <br/>
               Au cours de l'accouchement <br/>
               Au cours de l'allaitement. <br/>
           </p>

           <p>
               <h4 style="color: #007E33;"><i class="fa fa-star"></i> QU'EST-CE QUI PEUT ARRIVER QUAND ON EST
                INFECTÉ PAR LE VIH ? CONSÉQUENCES
            PROBABLES DE L'INFECTION À VIH</h4>    </p>
            <p>
               <span><b><u>Sur l'individu </u></b></span> : Une personne infectée par le VIH peut
               développer les IO qui peuvent entrainer la dépression,
               l'angoisse, la nervosité. Elle peut être régulièrement absente au
               travail. Elle peut avoir le sentiment de culpabilité et elle peut être victime d'isolement, de rejet; de stigmatisation et de
               discrimination.
           </p>


           <div style="border: 3px solid red; border-radius: 20px;padding: 20px;">
           <p >
             <h4 style="text-align: center;color:red;">
                GESTES DE LA VIE SANS
                RISQUE D'INFECTION À VIH
            </h4> 
            Le VIH ne se transmet pas
            <ul>
             <li>En se serrant les mains</li>
             <li>En toussant ou en éternuant</li>
             <li>En discutant ensemble</li>
             <li>En partageant un repas</li>
         </ul>
     </p> </div>
 </div>
 <div class="col-sm-6 wow fadeInRight" style="padding-left :20px;">
    <div class="row">
        <div class="col-sm-4">
           <img class="img img-responsive" src="dist/img/conseils/sida.gif">
       </div>
       <div class="col-sm-8">
        <p>
            Dépenses élevées dues au développement des infections opportunistes, dépression, angoisse,
            nervosité, développe des infections opportunistes, isolement, rejet, esprit de vengeance, sentiment de
            culpabilité, stigmatisation,
        </p>

        <p style="margin-top: 0px;">
            <b><u>Sur la famille </u></b> : Le temps consacré par une famille pour la PEC d'une PVVIH peut entrainer une diminution de productivité baisse du pouvoir d'achat, de la productivité, dislocation du tissu familial, rejet de la PVVIH,
            stigmatisation, dépenses élevées dues au
            Voie mère infectée-enfant développement des infections opportunistes, <br/>

      
        </p>

    </div>
</div>
      <b><u>Sur la société </u></b>: manque de bras valides, diminution des ressources économiques, diminution de l'espérance de vie. 
<div style="border: 3px solid red; border-radius: 20px;padding: 20px;">
<p>
 <h4 style="text-align: center;color:red;">
    MESURES DE PRÉVENTION
    CONTRE L'INFECTION À VIH
</h4> 
Le VIH ne se transmet pas
<ul>
 <li>Abstinence pure et simple des rapports sexuels.</li>
 <li>Fidélité envers un partenaire non infecté.</li>
 <li>Eviter tout contact avec le sang ou instruments
 souillés de sang ''infecté''.</li>
 <li>S'informer davantage sur l'infection.</li>
 <li>Utilisation correcte, régulière et systématique
 des préservatifs (condom, fémidom)</li>
</ul>
</p>
</div>

</div>
</div>


</div>
<div class="space-80"></div>
</section>
<!--Footer-area-->


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
{{-- @endsection --}}