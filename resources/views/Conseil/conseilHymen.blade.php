






<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>conseils hymen</title>
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
    <h1 class="text-center">L’hymen</h1>
   
</header>


<div class="row text-center" style="margin-top: 100px; margin-bottom: 50px;">
    
    <div class="col-sm-3" >
        <a href="images/conseils/PDF/M9.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M9.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M9.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
       <b> Ecouter l'audio français </b> <br/>
        <audio controls>
          <source src="images/conseils/FRANCAIS/M9.mp3" type="audio/mpeg">
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
                            <h3 class="timeline-title"> Définition </h3>
                            <p>
                                L'hymen est la membrane qui se trouve à l'entrée du vagin.
          C'est une membrane qui chez la jeune fille ferme partiellement l'ouverture du vagin et sépare
          la cavité de ce dernier de la vulve.
                            </p>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title"></h3>
                            <p>
                                Tel que défini, l'hymen est à l'entrée du vagin d'une fille 
                                vierge. Il se déchire à la première pénétration sexuelle. D'où 
                                le saignement en ce moment de la vie d'une fille.
                            </p>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-info">
                        </div>
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title"></h3>
                            <p>
                                L'abondance de ce saignement peut être due au type de
          l'hymen. On distingue cinq (5) types d'hymens, comme le
          montre les schémas ci-dessous :
                            </p>
                        </div>
                    </li> 
                </ul>
            </div>            
           
        <!-- <div class="col-md-12 example-title">
            <h2>  L'hygiène sexuelle ce sont les soins et entretiens à apporter aux parties intimes que l'on soit garçon ou fille.</h2>
            <p></p>
        </div> -->
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                        <p>
                            Ainsi les filles ayant un hymen imperforé ou cribriforme
          saigneraient beaucoup plus que celles qui ont un hymen
          annulaire ou séparé. Celles qui ont un hymen perforé ne
          saigneraient presque pas. Dans de nombreuses cultures le
          saignement lors du premier rapport sexuel est un signe de
          virginité., surtout au mariage.
                        </p>
                    </div>
                </li>
              <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                         <p>
                            En dehors de la première pénétration sexuelle, l'hymen peut
          être rompu en faisant le sport. La gymnastique est l'exercice
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
                        <h3 class="timeline-title"></h3>
                       
                        <p>
                            physique beaucoup plus souvent cité parmi les activités sportives entrainant la rupture de l'hymen. L'équitation (aller à cheval) aussi peut favoriser la rupture de l'hymen.
                        </p>

                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                       

                        <p>
                            Bien que le saignement soit le signe principal de la rupture de l'hymen, sa cicatrisation s'effectue naturellement (sans un traitement) en deux ou trois jours ; pour ne pas dire en
          quelques heures.
                        </p>
                    </div>
                </li>

                <li class="timeline-item">
                    <div class="timeline-info">
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                       

                        <p>
                            Vu le rôle de fermeture ou de barrière que joue l'hymen, il
                            faudrait tout faire pour le conserver le plus longtemps
                            possible afin de préserver le vagin des agressions
                            microbiennes venant de l'extérieur. Donc la pratique de
                            l'abstinence sexuelle jusqu'au moment opportun ou le
                            report du premier rapport sexuel.
                        </p>
                    </div>
                <!-- </li>

                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>April 28, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                       

                        <p>
                           <ul>
                                    <li>L'insertion d'objets étrangers dans le vagin peut provoquer des
                                        blessures, des écorchures et des plaies qui pourront être infectées
                                        et vous exposer à un plus grand risque d'infection par le VIH. 
                                    </li>

                                    <li>
                                        En général, il vaut mieux ne rien placer dans votre vagin, sauf des
         tampons et médicaments prescrits par un agent de santé. Dans ces
         derniers cas, suivez attentivement les instructions.
                                    </li>


                                    <li>
                                        Quand il est convenablement entretenu, le vagin est un
                                        environnement parfaitement équilibré et autorégulateur. Il suffit de
                                        laver doucement la zone génitale quotidiennement avec de l'eau
                                        propre et du savon non agressif. Écartez les grandes lèvres pour
                                        nettoyer les sécrétions qui s'y amassent.
                                    </li>
                           </ul>
                        </p>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <div class="row example-split">
        <div class="col-md-12 example-title">
             <h2>CHEZ LES DEUX SEXES</h2>
             <p>Small devices (tablets, 768px and up)</p> 
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <ul class="timeline timeline-split">
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 12, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                        <p>
                            <ul>
                                <li>Après le bain, portez des slips propres en coton de
                                préférence de couleur claire et amples.</li>
                                <li>Changer régulièrement les sous-vêtements, les sécher</li>
                        
                                <li>Examen et soins de toutes altérations des organes génitaux.</li>
                                <li>Pendant les périodes de chaleur, les slips en nylon doivent être évités car ils conservent l'humidité et la chaleur qui favorisent la croissance des bactéries.</li>
                              </ul>
                        </p>
                    </div>
                </li>

                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 12, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Hygiène sexuelle</h3>
                        <p>
                           <ul>
                            <li>
                                En réalité, le sang menstruel est très propre. Cependant, une fois
                                hors de l'organisme, les bactéries s'y développent et causent une
                                odeur.
                            </li>
                            <li>
                                Dans certaines cultures, les femmes qui ont leurs règles sont perçues comme étant sales.
                            </li>
                            <li>
                                C'est pourquoi une bonne hygiène est particulièrement importante au cours de la menstruation.
                            </li>
                           </ul>
                        </p>
                    </div>
                </li>

                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 12, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"></h3>
                        <p>
                           <ul>
                            <li>
                                Que vous utilisiez du tissu, du papier hygiénique, des serviettes 
                                ou des tampons, changez-les fréquemment pour éviter les
                                taches et les mauvaises odeurs.
                            </li>
                            <li>
                                Lorsque le sang menstruel est en contact avec l'air, il dégage une
        odeur malodorante. Si vos slips ou vos habits sont tachés de
        sang, trempez-les dans de l'eau froide un peu salée. L'eau
        chaude fixe le sang et rendra la tache indélébile.
                            </li>
                           
                           </ul>
                        </p>
                    </div>
                </li>


                <div class="col-md-12 example-title">
                    <h2> Que faut-il utiliser ?</h2>
                    <p>Small devices (tablets, 768px and up)</p>  
                </div>
                <li class="timeline-item">
                    <div class="timeline-info">
                        <span>March 23, 2016</span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">La 3ème phase ou la phase post ovulatoire</h3>
                            
                        <p>
                            <ul>
                                <li>Serviettes hygiéniques en coton</li>
                                <li>Tampons (A ne pas porter plus de 8 h et la nuit)</li>
                                <li>Morceaux de tissus propres (à laver et sécher au
                                soleil)</li>
                                <li>Papiers-toilette non rêches/rudes.</li>
                              </ul>
                        </p>

                    </div>
                </li> -->
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
                        
                            <P>
                                Le follicule, ayant relâché l'ovule, se transforme en corps jaune. Le
                                corps jaune secrète une quantité croissante de progestérone et moins d'oestrogène.
                             </P>
                        
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
                </li>   -->
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
@include("Conseil.like") 

</body>
</html>




{{-- 
 @extends("Template.newVitrineTemplate")

@section("title")
L’hymen
@endsection

@section("referencement")

<meta name="description" content="L'hymen est la membrane qui se trouve à l'entrée du vagin.
C'est une membrane qui chez la jeune fille ferme partiellement l'ouverture du vagin et sépare
la cavité de ce dernier de la vulve." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Conseils pratiques sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/conseil-hymen">
<meta name="robots" content="index, follow">

<meta name="image" content="https://econvivial.org/dist/img/conseils/hymen.jpg"/>

<meta property="og:url" content="https://econvivial.org/conseil-hymen">
<meta property="og:image" content="https://econvivial.org/dist/img/conseils/hymen.jpg">

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
    <h2 class="text-center" style="color:#ff4081;">L'hymen</h2>
   
       <div class="space-20"></div>
<div class="row text-center">
    <div class="col-sm-3" >
        <a href="images/conseils/PDF/M9.pdf" style="margin-top: 20px;" class="btn btn-link text-uppercase">Télécharger le pdf</a>        
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio éwé</b> <br/>
        <audio controls>
          <source src="images/conseils/EWE/M9.mp3" type="audio/mpeg">
           Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
        <b>Ecouter l'audio kabyè </b> <br/>
        <audio controls>
          <source src="images/conseils/KABYE/M9.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

    <div class="col-sm-3">
       <b> Ecouter l'audio français </b> <br/>
        <audio controls>
          <source src="images/conseils/FRANCAIS/M9.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas les contenues audio
        </audio>
    </div>

</div>

    <div class="space-50"></div>

    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 text-center">
        <p style="color:#3F729B;">
          <i class="fa fa-caret-right" style="font-size: 45px;margin-top: 10px;color:#ff4081;"></i>
          L'hymen est la membrane qui se trouve à l'entrée du vagin.
          C'est une membrane qui chez la jeune fille ferme partiellement l'ouverture du vagin et sépare
          la cavité de ce dernier de la vulve.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 wow fadeInLeft">

        <p>
          Tel que défini, l'hymen est à l'entrée du vagin d'une fille 
          vierge. Il se déchire à la première pénétration sexuelle. D'où 
          le saignement en ce moment de la vie d'une fille.
        </p>

        <p>
          L'abondance de ce saignement peut être due au type de
          l'hymen. On distingue cinq (5) types d'hymens, comme le
          montre les schémas ci-dessous :
        </p>

        <p>
          Ainsi les filles ayant un hymen imperforé ou cribriforme
          saigneraient beaucoup plus que celles qui ont un hymen
          annulaire ou séparé. Celles qui ont un hymen perforé ne
          saigneraient presque pas. Dans de nombreuses cultures le
          saignement lors du premier rapport sexuel est un signe de
          virginité., surtout au mariage.
        </p>

        <p>
          En dehors de la première pénétration sexuelle, l'hymen peut
          être rompu en faisant le sport. La gymnastique est l'exercice
        </p>
      </div>
      <div class="col-sm-6 wow fadeInRight" style="padding-left :20px;">
        <p>
          physique beaucoup plus souvent cité parmi les activités sportives entrainant la rupture de l'hymen. L'équitation (aller à cheval) aussi peut favoriser la rupture de l'hymen.
        </p>

        <p>
          Bien que le saignement soit le signe principal de la rupture de l'hymen, sa cicatrisation s'effectue naturellement (sans un traitement) en deux ou trois jours ; pour ne pas dire en
          quelques heures.
        </p>

        <p>
          Vu le rôle de fermeture ou de barrière que joue l'hymen, il
          faudrait tout faire pour le conserver le plus longtemps
          possible afin de préserver le vagin des agressions
          microbiennes venant de l'extérieur. Donc la pratique de
          l'abstinence sexuelle jusqu'au moment opportun ou le
          report du premier rapport sexuel.
        </p>

      </div>
    </div>

    <div class="row">
      <div class="container">
        <h3 style="color: blue; text-align: center">Différents types d'hymen</h3>

        <p>
          <img width="100%" class="img img-responsive" src="dist/img/conseils/capture-hymen.png" >
        </p>
      </div>
    </div>


  </div>
  <div class="space-80"></div>
</section>
<!--Footer-area--> --}}



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