<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="eCentre Convivial vous offre des services adaptés en matière de la prise en
                                charge des Infections Sexuellement Transmissibles. A travers notre plateforme,
                                vous décrivez le mal dont vous souffrez et vous serez référez vers un centre
                                convivial ou une formation sanitaire la plus proche de votre situation géographique.
                                Un personnel de santé qualité sera aussitôt informé de votre arrivée et vous réservera un
                                accueil convivial." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Consultation IST sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/consultation">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href=" resources/css/style.css" />
    <link rel="stylesheet" href=" resources/css/footer.css" />
    <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/footer.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" resources/css/purecookie.css" />
    <link href="{{ asset('resources/css/purecookie.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="footer.css"> --}}
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
                  <h1>eConvivial au coeur de la    </h1>
                  <h1>transformation digitale  en</h1>
                  <h1>eSanté.</h1>
                </div>
                <p class="text txgr">
                  Offres de services en Santé Sexuelle et de la Reproduction : Suivi du Cycle menstruel, suivi contraceptif, suivi de la grossesse, suivi vaccinal,  Assistance en ligne, Boutique en ligne, Innovation numérique
                </p>
                <div class="cta">
                  <a href="{{route('register')}}" class="btn lg btn-color rounded-2 red">Commencez maintenant</a>
                </div>
              </div>
  
              <div class="right">
                <img src="./images/banner2.png" alt="Person Image" class="person" />
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



      <section>
        <div class="container">
            <div class="rev">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;"> Assistance en ligne</h3>
                    <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                      Notre équipe de téléconseillers est à votre disposition 7j/7 et 24h/24 pour répondre à vos  préoccupations en matière de la santé sexuelle et de la reproduction (cycle menstruel, grossesse, vie sexuelle, vie de couple, problème de santé, etc.). Disponible à partir de la messagerie de l'application eCentre Convivial ou partir du Chatbot.
                    </p>
                    <div class="topy mx-n2">
                        <a href="https://wa.me/message/5WXFXT4RUNZ4A1" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Ecrire à un Téléconseiller</a>
                      </div>
                </div>
                <div class=""><img class="img imaf " src="./images/assistance.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 

      <section>
        <div class="container">
            <div class="griflexx">
              <div class=""><img class="img imaf " src="./images/sui-reg.png" alt="" srcset=""></div>
                <div class="paraf do" >
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Suivi du cycle menstruel</h3>
                    <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                      Nous accompagnons femmes et jeunes filles dans la gestion de leur cycle et hygiène menstruels. En renseignant la date de votre dernière règle et la durée de votre cycle, vous recevrez des notifications pour le rappel de vos prochaines règles ainsi que des conseils sur l'hygiène menstriuel.
                    </p>
                    <div class="topy mx-n2">
                        <a href="{{route('connexion')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Suivre mon cycle</a>
                      </div>
                </div>
            </div>
        </div>
      </section> 

     

      <section>
        <div class="container">
            <div class="rev">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Suivi de la grossesse</h3>
                  <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                  Du rappel des rendez-vous de consultation en passant par l’accompagnement de la future mère jusqu'à l’accueil de l’enfant, eConvivial propose à la femme enceinte l'accès à l'information, la dématérialisation de son carnet CPN, la notification des rendez-vous et le suivi vaccinal du nouveau-né à travers des automates d'appels.
                </p>
                <div class="topy mx-n2">
                    <a href="{{route('connexion')}}"class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Faire suivre ma grossesse</a>
                  </div>
                </div>
                <div class=""><img class="img imaf" src="./images/fm-en.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 

      <section>
        <div class="container">
            <div class="griflexx">
              <div class=""><img class="img imaf" src="./images/fami.png" alt="" srcset=""></div>
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Suivi Contraceptif</h3>
                  <p class="text-gray txgr px-3 mb-0 mx-xl-5">
                  Après avoir opté pour la contraception de votre choix, eCentre Convivial vous accompagne dans le renouvellement de votre méthode à travers des automates d'appel délivrés à la veille de la date d'expiration.
                </p>
                <div class="topy mx-n2">
                    <a href="{{route('connexion')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Faire Suivre ma Méthode</a>
                  </div>
                </div>
            </div>
        </div>
      </section> 


      <section>
        <div class="container">
            <div class="griflexx">
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Consultation </h3>
                    <p class="txgr">
                    Services adaptés en matière de prise en charge des infections sexuellement transmissibles. En décrivant les maux dont vous souffrez, vous serez automatiquement référés vers une formation sanitaire la plus proche pour une consultation approfondie.
                    </p>
                    <div class="topy mx-n2">
                        <a href="{{route('connexion')}}" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Effectuer une Consultation</a>
                      </div>
                </div>
                <div class=""><img class="img imaf" src="./images/cons.png" alt="" srcset=""></div>
            </div>
        </div>
      </section> 

      

      <section>
        <div class="container">
            <div class="rev">
              <div class=""><img class="img imaf " src="./images/quiz.png" alt="" srcset=""></div>
                <div class="paraf">
                    <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Quiz</h3>
                    <p class="text-gray txgr px-3 mb-0 mx-xl-5">eCentre Convivial vous propose des quiz pour renforcer vos compétences de vie sexuelle.</p>
                    <div class="topy mx-n2">
                        <a href="{{route('quiz')}}"class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Jouer au Quiz</a>
                      </div>
                </div>
              
            </div>
        </div>
      </section> 
      <section>
        


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
Consultation IST
@endsection

@section("referencement")
<meta name="description" content="eCentre Convivial vous offre des services adaptés en matière de la prise en
                                charge des Infections Sexuellement Transmissibles. A travers notre plateforme,
                                vous décrivez le mal dont vous souffrez et vous serez référez vers un centre
                                convivial ou une formation sanitaire la plus proche de votre situation géographique.
                                Un personnel de santé qualité sera aussitôt informé de votre arrivée et vous réservera un
                                accueil convivial." />
<meta name="keywords" lang="fr" content="grossesse,eCentre Convivial,Santé Sexuelle, Association AV-Jeunes, Santé des Jeunes, Sexualité au Togo, Education Sexuelle, Application Mobile, Application eCentre Convivial, Paire-éducateur au Togo, Santé numérique,test de dépistage, VIH, SIDA, préservatif, hymen, abstinence sexuelle, charge virale, cellule CD4, grossesse précoce, grossesse non désirée">
<meta name="category" content="Consultation IST sur eCentre Convivial">
<meta name="distribution" content="global">
<meta name="identifier-url" content="https://econvivial.org/consultation">
<meta name="robots" content="index, follow">
<meta name="image" content="https://econvivial.org/images/vitrine/img2.png">

<meta property="og:url" content="https://econvivial.org/consultation">
<meta property="og:image" content="https://econvivial.org/images/vitrine/img2.png">


@endsection

@section("body")

<header class="blue-bg relative fix" id="home">

    <div class="section-bg overlay-bg dewo ripple"></div>

    @include("HeaderNav.vitrineNav")
<div class="space-80"></div>
    
</header>

<img class="img img-responsive" src="images/services/consultation.jpg" style="width: 100%;height: 50vh;" alt="">

<section>
    <div class="space-50"></div>
    <div class="container">
        <h2 class="text-center" style="color: #6eabd1;">Consultations IST</h2>
        <div class="space-20"></div>
        <div class="row">
            <div class=" col-xs-12 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="">
                    <img class="img img-responsive" src="images/vitrine/infirmier.png" style="height: 100%; width: 100%;" />
                </div>
            </div>

            <div class="col-xs-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                <div class="" style="text-align: justify;">
                    <p>
                        eCentre Convivial vous offre des services adaptés en matière de la prise en charge des Infections Sexuellement Transmissibles. A travers notre plateforme, vous décrivez le mal dont vous souffrez et vous serez référés vers un centre convivial ou une formation sanitaire la plus proche de votre situation géographique. Un personnel de santé qualité sera aussitôt informé de votre arrivée et vous réservera un accueil convivial. 
                    </p>

                    <p>
                        En choisissant un centre convivial ou une formation sanitaire la plus proche de votre situation géographique, vous serez automatiquement informés des différentes prestations des services offerts ainsi que des frais de consultation et de la disponibilité des produits. 
                    </p>
                    <div class="space-20"></div>
                     <div class="row text-center">
         <a href="{{route('do-consultation')}}" class="btn btn-link text-uppercase">Je fais ma consultation</a>
     </div>
                     <div class="space-0"></div>
                </div>
            </div>
        </div>

    
    </div>

</section>

    @include("Footer.vitrineFooter")

 --}}

   <!-- JavaScript Files -->
    
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
   <script src="https://www.cssscript.com/demo/cookie-consent-popup-purecookie/ "></script>
   <script type="text/javascript" src="resources/js/toggle.js"></script>
   <script type="text/javascript" src="resources/js/js.js"></script>
   <script type="text/javascript" src="resources/js/purecookies.js"></script>
