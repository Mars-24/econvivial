
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
                  <h1>Voulez-vous entrer en contact avec nous </h1>
                  <H1></H1>
                 
                </div>
                <p class="text txgr">
                    Notre équipe de téléconseiller est à votre disposition 7j/7 et 24h/24 pour repondre à toutes vos questions et preoocupations. Désirez-vous adresser à un médecin, Gynécologue, Sage-femme et Conseillers, Sociologue, Psychologue ou à un Animateur IEC? Accédez au menu et écrivez au téléconseiller de votre choix.
                </p>
                <div class="cta">
                  <a href="{{route('register')}}" class="btn lg btn-color rounded-2 red">Nous contacter</a>
                </div>
              </div>
  
              <div class="right">
                <img src="./images/tell.png" alt="Person Image" class="person" />
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

      

      <section class="section-contact">

        <style>
            *{margin:0;padding:0;-webkit-box-sizing:border-box;box-sizing:border-box;font-family:'Fira Sans', sans-serif}.section-contact{min-height:100vh;padding-top:100px;padding-bottom:100px;background-image:linear-gradient(175deg, #EEE 50%, #FF9FDB 50%, #9B75D7)}.section-contact .container{max-width:1280px;margin:0 auto;padding-left:32px;padding-right:32px}@media (min-width: 768px){.section-contact .container{padding-left:64px;padding-right:64px}}@media (min-width: 1024px){.section-contact .container{padding-left:128px;padding-right:128px}}.section-contact .container h1{color:#666;font-size:36px;text-transform:uppercase;text-align:center;margin-bottom:16px}.section-contact .container p{color:#888;font-size:18px;line-height:1.5;margin-bottom:32px}.section-contact .container form{display:-ms-grid;display:grid;-ms-grid-columns:1fr;grid-template-columns:1fr;grid-gap:16px;background-color:#FFF;padding:32px;border-radius:16px;-webkit-box-shadow:0px 6px 12px rgba(0,0,0,0.2);box-shadow:0px 6px 12px rgba(0,0,0,0.2)}@media (min-width: 768px){.section-contact .container form{-ms-grid-columns:(1fr)[2];grid-template-columns:repeat(2, 1fr)}}.section-contact .container form .form-group.full{grid-column:1 / -1}.section-contact .container form .form-group label{display:block;margin-bottom:5px;color:#888;font-size:14px}.section-contact .container form .form-group .form-element{-webkit-appearance:none;-moz-appearance:none;appearance:none;outline:none;border:none;display:block;width:100%;border-radius:8px;padding:12px 16px;background-color:#F3F3F3;-webkit-transition:0.4s;transition:0.4s}.section-contact .container form .form-group .form-element:focus{-webkit-box-shadow:0px 0px 6px rgba(0,0,0,0.2);box-shadow:0px 0px 6px rgba(0,0,0,0.2);background-color:#FFF}.section-contact .container form .form-group textarea{resize:none;min-height:100px}.section-contact .container form .submit-group{grid-column:1 / -1;text-align:right}.section-contact .container form .submit-group input[type="submit"]{-webkit-appearance:none;-moz-appearance:none;appearance:none;border:none;outline:none;background:none;padding:12px 16px;background-color:#FF9FDB;border-radius:8px;color:#FFF;cursor:pointer;-webkit-transition:0.4s;transition:0.4s}.section-contact .container form .submit-group input[type="submit"]:hover{background-color:#9B75D7}
        </style>
        <div class="container">
            <h1>Contactez nous </h1>
            <p></p>

            <form>
                <div class="form-group">
                    <label for="firstname">Nom*</label>
                    <input 
                        type="text" 
                        name="firstname" 
                        id="firstname" 
                        required 
                        class="form-element"
                        placeholder="John" />
                </div>
                <div class="form-group">
                    <label for="lastname">Prenoms*</label>
                    <input type="text" name="lastname" id="lastname" required class="form-element" placeholder="Doe" />
                </div>
                <div class="form-group">
                    <label for="email"> Address email *</label>
                    <input type="email" name="email" id="email" required class="form-element" placeholder="john.doe@example.com" />
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" name="company" id="company" class="form-element" placeholder="john.doe@example.com" />
                </div>
                <div class="form-group full">
                    <label for="message">Ecrivez nous quelques choses</label>
                    <textarea name="message" id="message" class="form-element" placeholder="I want a website please..."></textarea>
                </div>
                <div class="submit-group">
                    <input type="submit" value="SEND MESSAGE" />
                </div>
            </form>
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
                    Tél. : (+228) 90 3 63 74 / 96 44 42 42<br>
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
