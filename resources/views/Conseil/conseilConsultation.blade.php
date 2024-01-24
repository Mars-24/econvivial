

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
    <h1 class="text-center">Les Infections Sexuellement Transmissibles (IST)</h1>
   
</header>



<div class="row text-center"  style="margin-top:100px; margin-bottom:50px;">
    
    <div class="col-sm-3" >
        <a href="images/conseils/PDF/M1.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M1.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M1.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
       <b> Ecouter l'audio français </b> <br/>
        <audio controls>
          <source src="images/conseils/FRANCAIS/M1.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>
</div>
<div class="container-fluid">
    <div class="row example-basic">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                <ul class="timeline">
                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title"> Définition</h3>
                            <p>
                                Une Infection Sexuellement Transmissible (IST) est une
                    contamination/contraction de microbes pathogènes lors des
                    rapports sexuels non protégés avec un partenaire infecté.  
                            </p>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title"> PRINCIPALES IST</h3>
                            <p>
                                <ul>
                                    <li>Gonococcie</li>
                                    <li>Gonococcie</li>
                                    <li>Syphilis</li>
                                    <li>Herpès génital</li>
                                    <li>Chancre mou ou chancrelle</li>
                                    <li>Gale</li>
                                    <li>Hépatites</li>
                                    <li>Chlamidiose</li>
                                    <li>Chlamidiose</li>
                                    <li>Mycoplasmose</li>
                                </ul>
                            </p>
                        </div>
                    <!-- </li>
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
                    </li>  -->
                </ul>
            </div>            
           
        <div class="col-md-12 example-title">
            <h2>  PRINCIPAUX SIGNES ET SYMPTÔMES </h2>
            <p></p>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Les IST sont regroupées principalement sous quatre signes : </h3>
                        <p>
                            <ul>
                                <li>Les écoulements urétraux et vaginaux (Gonococcie,
                                Chlamidiose, Mycoplasmose)</li>
                                <li>Les ulcérations génitales (Syphilis, Chancre mou, Herpès
                                génital, Gale)</li>  
             
                                <li>Les ulcérations génitales (Syphilis, Chancre mou, Herpès
                                génital, Gale)</li>
             
                                <li>Les végétations vénériennes ou crête de coq</li>
             
                                <li>Les douleurs abdominales basses (Gonococcie,
                                Chlamydiose, Infections à bactéries anaérobies).</li>

                                <li><span><b>N.B.</b></span>  : Le gonocoque est dans la majorité des cas,
                                    responsable de l'inflammation aiguë de l'urètre (urétrite) et
                                    se manifeste par un écoulement purulent, abondant, jaune
                                    ou verdâtre précédé de brûlures et de picotements qui
                                    deviennent intenses lorsqu'on urine (chaude pisse). Dans le
                                    cas de l'atteinte par la chlamydia, l'écoulement est peu
                                    abondant, clair et visqueux.</li>
                            </ul> 
                        </p>
                    </div>
                </li>
                <!-- <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 23, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                        <p> Nullam vel sem. Nullam vel sem. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Donec vitae sapien ut libero venenatis faucibus. ullam dictum felis
                            eu pede mollis pretium. Pellentesque ut neque. </p>

                            
                    </div>
                </li> -->
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
                        <h3 class="timeline-title"> MODES DE TRANSMISSION DES IST</h3>
                        <p>
                            
                            <ul>
                                <li>Voie sexuelle (hétérosexuelle, homosexuelle, sodomie,
                                cunnilingus, fellation)</li>
                                <li>Voie sanguine (transfusion sanguine, utilisation en
                                commun d'objets tranchants, etc…)</li>   
                                <li>Voie non sexuelle (objets de toilette, caleçon, serviette,
                                éponge, etc...).</li>    
                            </ul>   
                        </p> 
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"> COMPLICATIONS DES IST</h3>
                        <p>
                            <ul>
                                <li><b>CHEZ L'HOMME </b> : rétrécissement urétral, amputation de la
                                verge, stérilité, décès.</li>
                                <li><b>CHEZ LA FEMME</b> : douleurs abdominales basses,
                                 avortement à répétition, stérilité, cancers du col, trompes
                             bouchées, décès.</li>   
                         
                         </ul>   
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row example-split">
        <div class="col-md-12 example-title">
            <!-- <h2>Split Timeline</h2>
            <p>Small devices (tablets, 768px and up)</p> -->
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline timeline-split">
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"> MESURES PRÉVENTIVES DES IST </h3>
                        <p>
                            <ul>
                                <li>Abstinence sexuelle</li>  
                                <li>Partenaire unique et bonne fidélité</li> 
                                <li>Utilisation correcte et systématique des préservatifs
                                (condom, fémidom)</li> 
                                <li>Eviter les toilettes intimes intempestives avec des
                                antiseptiques</li> 
                                <li>Désinfecter et faire bouillir les caleçons et les sousvêtements.   </li>
                       
                            </ul>   
                        </p>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">CONDUITE À TENIR EN CAS D'IST</h3>
                        <p>
                            <ul>
                                <li>Consulter les services de santé les plus proches et le plus
                                rapidement possible</li>
                                <li>Suivre le traitement jusqu'au bout en respectant la dose
                                et la durée.</li>
                                <li>Faire traiter les partenaires</li>
                                <li></li>
                                <li>Désinfecter et faire bouillir les slips.</li>
                        
                            </ul>   
                             
                        </P>
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
                        <h3 class="timeline-title">A NE PAS FAIRE !</h3>
                        
                            <P>
                                <ul>
                                    <li>L'automédication</li>
                                    <li>Arrêt du traitement</li>
                                    <li>Les rapports sexuels pendant le
                                    traitement.</li>
                                </ul>
                             </P>
                        
                    </div>
                </li>
                 <!-- <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 28, 2016</span>
                    </div>
                     <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                        <p>
                            <ul>
                                <li>Elle complète la préparation de l'endomètre pour la réception
                                  de l'ovule fécondé en l'épaississant, l'imprégnation
                                  progestéronique est maximale entre le 20ème le 24ème jour
                              du cycle.</li>
                      
                              <li>
                                  La glaire cervicale s'épaissit et devient impropre à la
                                  pénétration des spermatozoïdes.    
                              </li>
                      
                              <li>
                               La température du corps s'élève et reste en plateau jusqu'à la
                               fin du cycle.     
                           </li>
                       </ul>
                        </p>
                    </div> 
                </li> 
            </ul>
        </div>
    </div>
    <div class="row example-centered">
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
                </li> -->
                <!-- <li class="timeline-item">
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
@include("Conseil.like") 

</body>
</html>









{{-- 

 @extends("Template.newVitrineTemplate")

@section("title")
Conseils IST
@endsection

@section("referencement")

<meta name="description" content="Une Infection Sexuellement Transmissible (IST) est une
contamination/contraction de microbes pathogènes lors des
rapports sexuels non protégés avec un partenaire infecté." />

<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Conseils pratiques sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/conseil-ist">
<meta name="robots" content="index, follow">
<meta name="image" content="https://econvivial.org/dist/img/conseils/ist.jpg"/>

<meta property="og:url" content="https://econvivial.org/conseil-ist">
<meta property="og:image" content="https://econvivial.org/dist/img/conseils/ist.jpg">


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
        <h2 class="text-center" style="color:#ff4081;">Les Infections Sexuellement Transmissibles (IST) </h2>

        <div class="space-20"></div>
<div class="row text-center">
    <div class="col-sm-3" >
        <a href="images/conseils/PDF/M1.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M1.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M1.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
       <b> Ecouter l'audio français </b> <br/>
        <audio controls>
          <source src="images/conseils/FRANCAIS/M1.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

</div>

        <div class="space-50"></div>
        <div class="row">
            <div class="col-sm-6 wow fadeInLeft" style="border-right: 1px solid black;">
                <p style="color:#3F729B;">
                    <i class="fa fa-caret-right" style="font-size: 45px;margin-top: 10px;color:#ff4081;"></i>
                    Une Infection Sexuellement Transmissible (IST) est une
                    contamination/contraction de microbes pathogènes lors des
                    rapports sexuels non protégés avec un partenaire infecté.  
                </p>

                <p>
                   <h4 style="color: #007E33;"><i class="fa fa-star"></i>  PRINCIPALES IST</h4>
                   <ul>
                    <li>Gonococcie</li>
                    <li>Gonococcie</li>
                    <li>Syphilis</li>
                    <li>Herpès génital</li>
                    <li>Chancre mou ou chancrelle</li>
                    <li>Gale</li>
                    <li>Hépatites</li>
                    <li>Chlamidiose</li>
                    <li>Chlamidiose</li>
                    <li>Mycoplasmose</li>
                </ul>
            </p>

            <p>
               <h4 style="color: #007E33;"><i class="fa fa-star"></i> PRINCIPAUX SIGNES ET SYMPTÔMES</h4> 
               <p>Les IST sont regroupées principalement sous quatre signes :</p>
               <ul>
                   <li>Les écoulements urétraux et vaginaux (Gonococcie,
                   Chlamidiose, Mycoplasmose)</li>
                   <li>Les ulcérations génitales (Syphilis, Chancre mou, Herpès
                   génital, Gale)</li>  

                   <li>Les ulcérations génitales (Syphilis, Chancre mou, Herpès
                   génital, Gale)</li>

                   <li>Les végétations vénériennes ou crête de coq</li>

                   <li>Les douleurs abdominales basses (Gonococcie,
                   Chlamydiose, Infections à bactéries anaérobies).</li>
               </ul> 
           </p>

           <p style="border: 3px solid red; border-radius: 20px;padding: 20px;">
             <span><b>N.B.</b></span>  : Le gonocoque est dans la majorité des cas,
             responsable de l'inflammation aiguë de l'urètre (urétrite) et
             se manifeste par un écoulement purulent, abondant, jaune
             ou verdâtre précédé de brûlures et de picotements qui
             deviennent intenses lorsqu'on urine (chaude pisse). Dans le
             cas de l'atteinte par la chlamydia, l'écoulement est peu
             abondant, clair et visqueux. 
         </p>

         <p>
          <h4 style="color: #007E33;"><i class="fa fa-star"></i> MODES DE TRANSMISSION DES IST</h4>
          <ul>
           <li>Voie sexuelle (hétérosexuelle, homosexuelle, sodomie,
           cunnilingus, fellation)</li>
           <li>Voie sanguine (transfusion sanguine, utilisation en
           commun d'objets tranchants, etc…)</li>   
           <li>Voie non sexuelle (objets de toilette, caleçon, serviette,
           éponge, etc...).</li>    
       </ul>   
   </p>

   <p>
      <h4 style="color: #007E33;"> <i class="fa fa-star"></i> COMPLICATIONS DES IST</h4>
      <ul>
       <li><b>CHEZ L'HOMME </b> : rétrécissement urétral, amputation de la
       verge, stérilité, décès.</li>
       <li><b>CHEZ LA FEMME</b> : douleurs abdominales basses,
        avortement à répétition, stérilité, cancers du col, trompes
    bouchées, décès.</li>   

</ul>   
</p>


</div>
<span></span>
<div class="col-sm-6 wow fadeInRight" style="padding-left :20px;">
    <img class="img img-responsive" src="dist/img/conseils/ist.jpg">

    <p>
        <h4 style="color: #007E33;"> <i class="fa fa-star"></i> MESURES PRÉVENTIVES DES IST</h4>
        <ul>
         <li>Abstinence sexuelle</li>  
         <li>Partenaire unique et bonne fidélité</li> 
         <li>Utilisation correcte et systématique des préservatifs
         (condom, fémidom)</li> 
         <li>Eviter les toilettes intimes intempestives avec des
         antiseptiques</li> 
         <li>Désinfecter et faire bouillir les caleçons et les sousvêtements.   </li>

     </ul>   
 </p>

 <p style="margin-top: 20px;">
    <h4 style="color: #007E33;"> <i class="fa fa-star"></i> CONDUITE À TENIR EN CAS D'IST</h4>
    <ul>
        <li>Consulter les services de santé les plus proches et le plus
        rapidement possible</li>
        <li>Suivre le traitement jusqu'au bout en respectant la dose
        et la durée.</li>
        <li>Faire traiter les partenaires</li>
        <li></li>
        <li>Désinfecter et faire bouillir les slips.</li>

    </ul>   
</p>

<p>
    <div style="border: 3px solid red; border-radius: 20px;padding: 20px;">
        <h4 style="color:red;text-align: center;">A NE PAS FAIRE !</h4>
        <ul>
            <li>L'automédication</li>
            <li>Arrêt du traitement</li>
            <li>Les rapports sexuels pendant le
            traitement.</li>
        </ul>
    </div>
</p>

</div>
</div>


</div>
<div class="space-80"></div>
</section>
<!--Footer-area-->
 --}}


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
