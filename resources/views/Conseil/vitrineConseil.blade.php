
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Favoriser l’accès des adolescents et des jeunes aux informations et aux services de soins et de santé en matière de la Santé Sexuelle.   Oeuvrer pour une Afrique où les jeunes et adolescents, en particulier les jeunes filles, accèdent facilement aux services adaptés en matière de la sexualité responsable et construisent leur équilibre." />
  <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée, planning familial">
  <meta name="category" content="Bienvenue sur eCentre Convivial">
  <meta name="distribution" content="global">
  <meta name="identifier-url" content="https://econvivial.org">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienvenue sur eConvivial</title>
  <link rel="stylesheet" href=" resources/css/style.css" />
  <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href=" resources/css/style.css" />
  <link rel="stylesheet" href=" resources/css/footer.css" />
  <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/css/footer.css') }}" rel="stylesheet">
  <link rel="stylesheet" href=" resources/css/purecookie.css" />
  <link href="{{ asset('resources/css/purecookie.css') }}" rel="stylesheet">
  <script  src="resources/js/purecookies.js"></script>
  

</head>
<body> 
    
    <main>
        <div class="big-wrapper light">
          <img src="./images/shape.png" alt="" class="shape" />
  
          <header>
            <div class="container">
              <div class="logo">
                <a href="{{route('accueil')}}"> <img  src="./images/LOGO PNG.png" alt="Logo" /> </a>

                <h3></h3>
              </div>
  
              <div class="links">
                <ul>
                    <li><a  href="{{route('accueil')}}" >Acceuil</a></li>
                    <li><a  href="{{route('consultation')}}">services</a></li>
                    <li><a href="{{route('conseils')}}">Conseils Pratiques</a></li>
                    <li><a href="{{route('agenda')}}">Boutique</a></li>
                    <li> <a href="{{route('contact')}}">Contact</a></li>
                  <li><a class="btn lg btn-color rounded-2 red" href="{{route('register')}}">S'inscrire</a></li>
                  <li><a class="btn lg btn-color rounded-2 red" href="{{route('connexion')}}">Se connecter</a></li> 
                </ul>
              </div>
              <div class="overlay"></div>
  
              <div class="hamburger-menu">
                <div class="bar"></div>
              </div>
            </div>
          </header>
  
          <div class="showcase-area">
            <div class="container">
              <div class="left">
                <div class="big-title">
                  <h1>Recevez nos conseils  </h1>
                  <H1>Pratiques</H1>
                 
                </div>
                <p class="text txgr">
                  Toute une équipe de professionnel de la Santé Sexuelle et de la
                  Reproduction pour vous offrir les meilleurs services 
                  enla matière.
                </p>
                {{-- <div class="cta">
                  <a href="{{route('register')}}" class="btn lg btn-color rounded-2 red">Commencez maintenant</a>
                </div> --}}
              </div>
  
              <div class="right">
                <img src="./images/con-prat-accui.png" alt="Person Image" class="person" />
              </div>
            </div>
          </div>
  
          <div class="bottom-area">
            <div class="container">
              <button class="toggle-btn">
                <i class="far fa-moon"></i>
                <i class="far fa-sun"></i>
              </button>
            </div>
          </div>
        </div>    
      </main>

      <section class="sec-colo "  style="background-color: #d1dbff!important">
        <div class="container">
            <div class="griflexx">
              <div class=""><img class="img imaf" src="./images/con-prat-sida.png" alt="" srcset=""></div>
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;"> Le VIH / SIDA</h3>
                    <p class="txgr">
                       
                        Le Sida (maladie) est un ensemble de signes dû à la destruction du système immunitaire par le VIH (v...
                    </p>
                    <div class="topy mx-n2">
                        <a  href="{{route('conseil-vih')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                      </div>
                </div>
            </div>
        </div>
      </section> 

      <section class=" sec-colo sec-colii">
        <div class="container">
            <div class="rev">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Le préservatif masculin</h3>
                  <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                   

                        Le préservatif masculin (condom ou capote) est un étui mince et souple imperméable au sang ainsi qu’...


                </p>
                <div class="topy mx-n2">
                    <a href="{{route('conseil-preservatif-masculin')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                  </div>
                </div>
                <div class=""><img class="img imaf" src="./images/con-prat-condom.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 



      


      
      <section class=" sec-colo sec-colii"  style="background-color: #d1dbff!important">
        <div class="container">
         

            <div class="rev">
              <div class=""><img class="img imaf" src="./images/femi.png" alt="" srcset=""></div>
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Le préservatif feminin</h3>
                  <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                   

                        Le préservatif masculin (condom ou capote) est un étui mince et souple imperméable au sang ainsi qu’...


                </p>
                <div class="topy mx-n2">
                    <a  href="{{route('conseil-preservatif-feminin')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                  </div>
                </div>
            </div>
        </div>
      </section> 








      <section class="sec-colo ">
        <div class="container">
            <div class="griflexx">
              <div class=""><img class="img imaf" src="./images/con-prat-suivi-cicle.png" alt="" srcset=""></div>
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Le cycle menstruel</h3>
                  <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                    Le cycle menstruel va du 1er jour des règles jusqu'au dernier jour qui précède les règles suivantes....
                </p>
                <div class="topy mx-n2">
                    <a  href="{{route('conseil-preservatif-masculin')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                  </div>
                </div>
            </div>
        </div>
      </section> 







      <section  style="background-color: #d1dbff!important">
        <div class="container" >
            <div class="rev">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Infection Sexuellement Transmissible (IST)</h3>
                    <p class="text-gray txgr px-3 mb-0 mx-xl-5"> Une Infection Sexuellement Transmissible (IST) est une
                      contamination/contraction de microbes pathogènes lors des
                      rapports sexuels non protégés avec un partenaire infecté.  
                    </p>
                    <div class="topy mx-n2">
                        <a   href="{{route('conseil-ist')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                      </div>
                </div>
                <div class=""><img class="img imaf " src="./images/hygien.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 


      <section class="sec-colo ">
        <div class="container">
            <div class="griflexx">
              <div class=""><img class="img imaf" src="./images/gross.png" alt="" srcset=""></div>
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Grossesse précoce et non désirée</h3>
                  <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                    Une grossesse précoce, c'est une grossesse qui survient
            avant l'âge de 18 ans. La plupart des grossesses précoces sont
          des grossesses non désirées.  
                </p>
                <div class="topy mx-n2">
                    <a  href="{{route('conseil-grossesse-precoce')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                  </div>
                </div>
            </div>
        </div>
      </section> 



      <section  style="background-color: #d1dbff!important">
        <div class="container" >
            <div class="rev">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;"> Abstinence sexuelle</h3>
                    <p class="text-gray txgr px-3 mb-0 mx-xl-5">C'est l'action de se priver ou de se retenir de l'acte sexuel.
                    </p>
                    <div class="topy mx-n2">
                        <a   href="{{route('conseil-abstinence')}}"
                        class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                      </div>
                </div>
                <div class=""><img class="img imaf " src="./images/ab.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 

      

      <section  style="background-color: #d1dbff!important">
        <div class="container" >
            <div class="rev">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">L'hymen</h3>
                    <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                      L'hymen est la membrane qui se trouve à l'entrée du vagin.
                      C'est une membrane qui chez la jeune fille ferme partiellement l'ouverture du vagin et sépare
                      la cavité de ce dernier de la vulve.
                    </p>
                    <div class="topy mx-n2">
                        <a href="{{route('conseil-hymen')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                      </div>
                </div>
                <div class=""><img class="img imaf " src="./images/hymen.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 




      <section class="sec-colo ">
        <div class="container">
            <div class="griflexx">
              <div class=""><img class="img imaf" src="./images/con-prat-suivi-cicle.png" alt="" srcset=""></div>
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Le taux de cellules CD4</h3>
                  <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                    Le taux de CD4 est la mesure du nombre de cellules CD4 par mm3 de sang et non pas dans
                    l'ensemble de l'organisme.
                </p>
                <div class="topy mx-n2">
                    <a   href="{{route('conseil-cellule-cd4')}}"  class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lire plus</a>
                  </div>
                </div>
            </div>
        </div>
      </section> 


      <section  style="background-color: #d1dbff!important">
        <div class="container" >
            <div class="rev">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">La charge virale </h3>
                    <p class="text-gray txgr px-3 mb-0 mx-xl-5">La charge virale est le terme utilisé pour décrire la quantité de VIH qui se trouve dans votre sang. Plus vous avez de VIH dans le sang (plus votre charge virale est élevée), plus votre taux de CD4 chutera, et plus vous courez le risque de tomber malade
                    </p>
                    <div class="topy mx-n2">
                        <a  href="{{route('conseil-charge-virale')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Nous contacter</a>
                      </div>
                </div>
                <div class=""><img class="img imaf " src="./images/assistance.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 









      <section  style="background-color: #d1dbff!important">
        <div class="container" >
            <div class="rev">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;"> Assistance en ligne</h3>
                    <p class="text-gray txgr px-3 mb-0 mx-xl-5">Notre équipe de téléconseiller est à votre disposition 7j/7 et 24h/24 pour repondre à toutes vos questions et preoocupations. Désirez-vous adresser à un médecin, Gynécologue, Sage-femme et Conseillers, Sociologue, Psychologue ou à un Animateur IEC? Accédez au menu et écrivez au téléconseiller de votre choix.
                    </p>
                    <div class="topy mx-n2">
                        <a href="" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Nous contacter</a>
                      </div>
                </div>
                <div class=""><img class="img imaf " src="./images/assistance.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 

      

     
      

      <section>
        <footer class="footer">
          <div class="container">
            <div class="row">
              <div class="footer-col">
                <h4>eConvivial</h4>
                <ul>
                  <li><a href="#">A propos de nous</a></li>
                  <li><a href="#">Devenir partenaire</a></li>
                  <li><a href=" https://econvivial.org/politiques-confidentialites">Politique de confidentialité</a></li>
                </ul>
              </div>
              <div class="footer-col">
                <h4>Nos services</h4>
                <ul>
                  <li><a href="#">Assistance en ligne</a></li>
                  <li><a href="#">Suivi du Cycle menstrue</a></li>
                  <li><a href="#">Suivi de la grossesse</a></li>
                  <li><a href="#"> Suivi Contraceptif</a></li>
                  <li><a href="#">Consultation IST</a></li>
                </ul>
              </div>
  
              <div class="footer-col">
                <h4>Nous contacter</h4>
                <div class="">                                         
  
                  <p class="p" style="font-size: 16px;
                  color: #ffffff;
                  text-decoration: none;
                  font-weight: 300;
                  color: #bbbbbb;
                  display: block;
                  transition: all 0.3s ease;">Togo : Agoè-Logope<br>
                    Tél. : (+228) 90 30 63 74 / 96 44 42 42<br>
                    E-mail : togo@econvivial.org
                  </p>
                </div>
  
                <div class="">
                 <p class="p"  style="font-size: 16px;
                 color: #ffffff;
                 text-decoration: none;
                 font-weight: 300;
                 color: #bbbbbb;
                 display: block;
                 transition: all 0.3s ease;" > 
                  France : 15 Rue des Halles <br>
                  75001 Paris, France<br>
                  Tél. : (+33) 182886888 / 623460756<br>
                  E-mail : france@econvivial.org
                 </p>
                  
                </div>
              </div>
  
              {{-- <div class="footer-col">
                <h4>Boutique eConvivial</h4>
                <ul>
                  <li><a href="#">API</a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                </ul>
              </div> --}}
              <div class="footer-col">
                <h4>Suivez nous </h4>
                <div class="social-links">
                  <a href="https://www.facebook.com/econvivial"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://twitter.com/eConvivial_tg"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.linkedin.com/in/akolly-kafui-rodrigue-76086a63/"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
              
            </div>
          </div>
       </footer>
     
      </section>

        




</body>
</html>




{{-- @extends("Template.newVitrineTemplate")

@section("title")
    Conseils pratiques
@endsection

@section("referencement")

    <meta name="description" content="Le test de dépistage est une analyse de sang qui permet de connaître son statut sérologique, c'est-à-dire savoir si on est contaminé par le VIH ou pas." />
    <meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
    <meta name="category" content="Conseils pratiques sur eCentre Convivial">
    <meta name="distribution" content="global">
    <meta name="identifier-url" content="https://econvivial.org/conseilspratiques">
    <meta name="robots" content="index, follow">
@endsection

@section("body")

    




    <header class="blue-bg relative fix" id="home">

        <div class="section-bg overlay-bg dewo ripple"></div>

    @include("HeaderNav.vitrineNav")

        <div class="space-70"></div>
        <div class="space-20 hidden-xs"></div>

        <div class="container text-white">
            <div class="row">

                <div class="col-xs-12 col-md-4">
                    <div class="wow fadeInLeft" data-wow-delay="1s">
                        <div class="item"><img src="images/vitrine/img3.png" alt="" style=" width: 100%;"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-8 wow fadeInUp" data-wow-delay="1.5s" >
                    <div class="space-100"></div>
                    <div class="space-10"></div>
                    <h3 class="text-white"><i>Recevez nos conseils pratiques</i></span> </h3>
                
                </div>

            </div>

        </div>
    </header>

    <section>
        <div class="space-100"></div>
        <div class="container">
            <h2 class="text-center">Les différents conseils pratiques en matière de la santé sexuelle </h2>
            <div class="space-50"></div>
            <div class="row">
                @foreach($conseils as $conseil)
                    <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="panel text-center single-blog box-conseilPratique" >
                            <a

                                   
             @if($conseil->titre == 'Infection Sexuellement Transmissible (IST)')
                href="{{route('conseil-ist')}}"

             @elseif($conseil->titre == 'Le VIH / SIDA')
                href="{{route('conseil-vih')}}"

             @elseif($conseil->titre == 'Le dépistage volontaire du VIH')
             href="{{route('conseil-depistage')}}"

             @elseif($conseil->titre == 'Le cycle menstruel')
             href="{{route('conseil-cycle-mesntruel')}}"

             @elseif($conseil->titre == 'Hygiène sexuelle et menstruelle')
             href="{{route('conseil-hygiene-sexuelle')}}"

             @elseif($conseil->titre == 'Grossesse précoce et non désirée')
             href="{{route('conseil-grossesse-precoce')}}"

             @elseif($conseil->titre == 'Le préservatif masculin')
             href="{{route('conseil-preservatif-masculin')}}"

             @elseif($conseil->titre == 'Le préservatif féminin')
             href="{{route('conseil-preservatif-feminin')}}"

             @elseif($conseil->titre == "L’hymen")
             href="{{route('conseil-hymen')}}"

             @elseif($conseil->titre == "L’abstinence sexuelle")
             href="{{route('conseil-abstinence')}}"

             @elseif($conseil->titre == "Le taux de cellules CD4")
             href="{{route('conseil-cellule-cd4')}}"

             @elseif($conseil->titre == "La charge virale")
             href="{{route('conseil-charge-virale')}}"

             @endif
                                    
                             >
                            <img  src="uploads/img/{{$conseil->image}}" class="img-full img img-responsive" width="" alt="">
                            <div class="padding-20">
                                <ul class="list-unstyled list-inline">

                                </ul>
                                <div class="space-10"></div>
                                <h4 style="color: #6eabd1;">{{\Illuminate\Support\Str::limit($conseil->titre, 70)}}</h4>
                                <div class="space-15"></div>
                                <p>{{\Illuminate\Support\Str::limit($conseil->description, 100)}}</p>
                                <div class="space-20"></div>
                                Lire la suite
                                <div class="space-20"></div>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="space-80"></div>

        <a class="trigger_popup_fricc"></a>

        <div class="hover_bkgr_fricc">
            <span class="helper"></span>
            <div>
                <div class="popupCloseButton">X</div>
                <h3>Connectez-vous pour lire cet article</h3>
                <a class="btn btn-success" href="{{route('connexion')}}">Je me connecte</a>
            </div>
        </div>
    </section>
    @include("Footer.vitrineFooter")
 --}}

<script>
    

    function showPopUp(){
        $('.hover_bkgr_fricc').show();

        $('.popupCloseButton').click(function(){
            $('.hover_bkgr_fricc').hide();
        });
    }
</script>

  <!-- JavaScript Files -->
    
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="https://www.cssscript.com/demo/cookie-consent-popup-purecookie/ "></script>
  <script type="text/javascript" src="resources/js/toggle.js"></script>
  <script type="text/javascript" src="resources/js/js.js"></script>
  <script type="text/javascript" src="resources/js/purecookies.js"></script>
