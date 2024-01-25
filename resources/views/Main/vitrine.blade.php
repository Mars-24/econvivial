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
    {{-- <link rel="stylesheet" href="resources/css/chat1.css">
    <link rel="stylesheet" href="resources/css/chat2.css">
    <link rel="stylesheet" href="resources/css/typing.css"> --}}
    
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" > --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <style>
      
.slick-slide{
    margin: 0 20px;
}
.slick-slide img{
    width: 100%;
}
.slick-slider{
    position: relative;
    display: block;
    box-sizing: border-box;
}
.slick-list{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-track{
    position: relative;
    top: 0;
    left: 0;
    display: block
}
.slick-slide{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
.slick-slide img{
    display: block;
}
.slick-initialized .slick-slide{
    display: block;
}
.copy{
    padding-top: 200px;
}
    </style>
    <link rel="stylesheet" href="resources/css/style.css" />
    <link rel="stylesheet" href="resources/css/footer.css" />
    <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/footer.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" resources/css/purecookie.css" />
    <link href="{{ asset('resources/css/purecookie.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="footer.css"> --}}
    <script  src="resources/js/purecookies.js"></script>

    <script>
       $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover:false,
            responsive: [{
                breakpoint: 768,
                setting: {
                    slidesToShow:4
                }
            }, {
                breakpoint: 520,
                setting: {
                    slidesToShow: 3
                }
            }]
        });
    });
    </script>

  </head>
  <body>
    <main> 
      <div class="big-wrapper light">
        {{-- <img src="./images/shape.png" alt="" class="shape" color="#fe779d" /> --}}

        <header>
          <div class="container">
            <div class="logo">
              <a href="{{route('accueil')}}"> <img  src="./images/LOGO PNG.png" alt="Logo" /> </a>

              <h3></h3>
            </div>

            <div class="links">
              <ul>
                <li><a  href="{{route('accueil')}}" >Acceuil</a></li>
                <li><a  href="{{route('consultation')}}">Services</a></li>
                <li><a href="{{route('conseils')}}">Conseils Pratiques</a></li>
                <li><a href="https://www.webradio.media/vestaplayer/big.php?radio=eVialRadio&server=stream4.vestaradio.com&fond=431ed9&texte=ffffff&volume=50&visualizertype=0&visualizeropacity=1" target="player" onClick="window.open('https://www.webradio.media/vestaplayer/big.php?radio=eVialRadio&server=stream4.vestaradio.com&fond=431ed9&texte=ffffff&volume=50&visualizertype=0&visualizeropacity=1', 'player','width=350,height=400,left=0,top=0,scrollbars=0')">Radio</a></li>
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
                <h1>eConvivial au coeur de la</h1>
                <h1>transformation digitale en</h1>
                <h1>eSanté.</h1>
              </div>
              <p class=" txgr">
                Offres de services en Santé Sexuelle et de la Reproduction : Suivi du Cycle menstruel, suivi contraceptif, suivi de la grossesse, suivi vaccinal,  Assistance en ligne, Boutique en ligne, Innovation numérique
              </p>
              <div class="cta">
                <a href="{{route('register')}}" class="btn lg btn-color rounded-2 red">Commencez maintenant</a>
              </div>
            </div>

            <div class="right">
              <img   src="{{asset('images/banfem.png')}}"   alt="Person Image" class="person" />
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

    <section class="pt-5   sec-colo sec-colii ">
      <div class="container text-center pt-5 mt-lg-1">
        <h2 class="ptt" style=" font-family: 'Roboto Mono', monospace;
        font-family: 'Zen Maru Gothic', sans-serif;
        font-size: 18px;
        font-weight:650 ;
        color: #000000;
        text-align: center;  font-size: 2.8rem;"> Découvrez nos services </h2>
        <!-- <div id="add-slides"> -->
          <div class="row-md row-cols-md-3 no-gutters">
            <div class="col-md pt-3 px-md-3 mt-3">
              <div class="h-100">
                <img src="./images/cont2.png" alt="" srcset="">
                <div class="pt-2">
                  <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Consultation </h3>
                  <p class="text-gray txgr align px-3 mb-0 mx-xl-5" style="color: #777777">Services adaptés en matière de prise en charge des infections sexuellement transmissibles. En décrivant les maux dont vous souffrez, vous serez automatiquement référés vers une formation sanitaire la plus proche pour une consultation approfondie.</p>
                </div>
              </div>
            </div>
            <div class="col-md pt-3 px-md-3 mt-3">
              <div class="h-100">
                <img src="./images/fm-en2.png" alt="suivi de grossesse" class="img-fluid">
                <div class="pt-2">
                  <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Suivi de la grossesse</h3>
                  <p class="text-gray txgr align px-3 mb-0 mx-xl-5" style="color: #777777">
                    Du rappel des rendez-vous de consultation en passant par l’accompagnement de la future mère jusqu'à l’accueil de l’enfant, eConvivial propose à la femme enceinte l'accès à l'information, la dématérialisation de son carnet CPN, la notification des rendez-vous et le suivi vaccinal du nouveau-né à travers des automates d'appels.
                   </p>
                </div>
              </div>
            </div>
            <div class="col-md pt-3 px-md-3 mt-3">
              <div class="h-100">
                <img src="./images/famiplan2.png" alt="custom recording settings" class="img-fluid">
                <div class="pt-2">
                  <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Suivi Contraceptif</h3>
                  <p class="text-gray txgr align px-3 mb-0 mx-xl-5" style="color: #777777">
                    Après avoir opté pour la contraception de votre choix, eCentre Convivial vous accompagne dans le renouvellement de votre méthode à travers des automates d'appel délivrés à la veille de la date d'expiration.
                   </p>
                </div>
              </div>
            </div>
        </div>
    </section>
    <section class="pt-5  ">
      <div class="container text-center pt-5 mt-lg-1">
        <div id="add-slides">
          <div class="row-md row-cols-md-3 no-gutters">
            <div class="col-md pt-3 px-md-3 mt-3">
              <div class="h-100">
                <img src="./images/assistance2.png" alt="draw while recording" class="img-fluid">
                <div class="pt-2">
                  <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;"> Assistance en ligne</h3>
                  <p class="text-gray txgr align px-3 mb-0 mx-xl-5">
                    Notre équipe de téléconseillers est à votre disposition 7j/7 et 24h/24 pour répondre à vos préoccupations en matière de la santé sexuelle et de la reproduction (cycle menstruel, grossesse, vie sexuelle, vie de couple, problème de santé, etc.). Disponible à partir de la messagerie de l'application eCentre Convivial ou partir du Chatbot.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md pt-3 px-md-3 mt-3">
              <div class="h-100">
                <img src="./images/sui-reg.png" alt="switch screens while recording" class="img-fluid">
                <div class="pt-2">
                  <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Suivi du cycle menstruel</h3>
                  <p class="text-gray txgr align px-3 mb-0 mx-xl-5">
                    Nous accompagnons femmes et jeunes filles dans la gestion de leurs cycle et hygiène menstruels. En renseignant la date de votre dernière règle et la durée de votre cycle, vous recevrez des notifications pour le rappel de vos prochaines règles ainsi que des conseils sur l'hygiène menstriuel.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md pt-3 px-md-3 mt-3">
              <div class="h-100">
                <img src="./images/quiz.png" alt="custom recording settings" class="img-fluid">
                <div class="pt-2">
                  <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;">Quiz</h3>
                  <p class="text-gray txgr align px-3 mb-0 mx-xl-5">eCentre Convivial vous propose des quiz pour renforcer vos compétences de vie sexuelle.</p>
                </div>
              </div>
            </div>
            
          </div>
          <div class="swiper-pagination d-flex justify-content-center align-items-center" id="add-pagination"></div>
        </div>
        <div class="dev-desktop pt-4 mt-3">
          <div class="sys-win">
            <!-- <div class=" topy  mx-n2">
              <a href="" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Découvrez nos services</a>
            </div> -->
          </div>
          
    </section>

    <section>
      <div class="section-spaces ghost-white " style="background-color: #d1dbff!important">
        <div class="container">
          <div class="griflex">
            <div class=""><img class="img " src="./images/lopi2.png" alt="" srcset=""></div>
                <div class="paraf">
                      <div class="row flex-nowrap pt-3 mt-3 mt-lg-0 mx-n2">
                        <div class="col px-2">
                          <p class="mb-0" style="color: #ffffff">NOS SERVICES DEPUIS VOTRE SMARTPHONE.</p>
                        </div>
                      </div>
                      <div class="row flex-nowrap align-items-center pt-3 mt-3 mt-lg-n1 mx-n2">
                        <div class="col-auto d-flex px-2">
                          <i class="wsc-icon wsc-icon-lg d-inline-flex align-items-center wsc-icon-loaded" data-path="https://images.wondershare.com/videoconverter/images2021/vcu13/product/recorder_nav_tab_501.svg"><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M14.7642 39.0685C14.4881 39.0685 14.2642 39.2924 14.2642 39.5685C14.2642 39.8447 14.4881 40.0685 14.7642 40.0685V39.0685ZM32.4816 40.0685C32.7577 40.0685 32.9816 39.8447 32.9816 39.5685C32.9816 39.2924 32.7577 39.0685 32.4816 39.0685V40.0685ZM8.85841 9.3584H38.3874V8.3584H8.85841V9.3584ZM38.3874 34.3439H28.9381V35.3439H38.3874V34.3439ZM28.4381 34.8439V39.5685H29.4381V34.8439H28.4381ZM28.9381 34.3439H18.3077V35.3439H28.9381V34.3439ZM18.3077 34.3439H8.85841V35.3439H18.3077V34.3439ZM17.8077 34.8439V39.5685H18.8077V34.8439H17.8077ZM18.3077 39.0685H14.7642V40.0685H18.3077V39.0685ZM28.9381 39.0685H18.3077V40.0685H28.9381V39.0685ZM28.9381 40.0685H32.4816V39.0685H28.9381V40.0685ZM40.2497 31.3004V32.4816H41.2497V31.3004H40.2497ZM6.99609 32.4816V31.3004H5.99609V32.4816H6.99609ZM40.2497 11.2207V31.3004H41.2497V11.2207H40.2497ZM6.99609 31.3004V11.2207H5.99609V31.3004H6.99609ZM38.978 30.8004H6.49609V31.8004H38.978V30.8004ZM8.85841 34.3439C7.82988 34.3439 6.99609 33.5101 6.99609 32.4816H5.99609C5.99609 34.0624 7.2776 35.3439 8.85841 35.3439V34.3439ZM38.3874 35.3439C39.9682 35.3439 41.2497 34.0624 41.2497 32.4816H40.2497C40.2497 33.5101 39.4159 34.3439 38.3874 34.3439V35.3439ZM38.3874 9.3584C39.4159 9.3584 40.2497 10.1922 40.2497 11.2207H41.2497C41.2497 9.6399 39.9682 8.3584 38.3874 8.3584V9.3584ZM8.85841 8.3584C7.2776 8.3584 5.99609 9.6399 5.99609 11.2207H6.99609C6.99609 10.1922 7.82988 9.3584 8.85841 9.3584V8.3584Z" fill="black"></path>
                              </svg>
                          </i>
                        </div>

                        <div class="col px-2">
                          <p class="mb-0" style="color: #ffffff">
                            ASSISTANCE EN LIGNE</p>
                        </div>
                      </div>
                      <div class="row flex-nowrap align-items-center pt-3 mt-3 mt-lg-n1 mx-n2">
                        <div class="col-auto d-flex px-2">
                            <i class="wsc-icon wsc-icon-lg d-inline-flex align-items-center wsc-icon-loaded" data-path="https://images.wondershare.com/videoconverter/images2021/vcu13/product/recorder_nav_tab_502.svg"><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M11 22.5996V24.1596C11 31.3393 16.8203 37.1596 24 37.1596V37.1596C31.1797 37.1596 37 31.3393 37 24.1596V22.5996" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M21.1031 37.1602V41.3202M26.8974 37.1602V41.3202M26.8974 41.3202H21.1031M26.8974 41.3202H30.7602M21.1031 41.3202H17.2402" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M19.089 17.5C19.3652 17.5 19.589 17.2761 19.589 17C19.589 16.7239 19.3652 16.5 19.089 16.5V17.5ZM28.9113 16.5C28.6351 16.5 28.4113 16.7239 28.4113 17C28.4113 17.2761 28.6351 17.5 28.9113 17.5V16.5ZM15.6602 24.16V23H14.6602V24.16H15.6602ZM32.3402 23V24.16H33.3402V23H32.3402ZM15.6602 23V17H14.6602V23H15.6602ZM15.6602 17V15.84H14.6602V17H15.6602ZM15.1602 17.5H19.089V16.5H15.1602V17.5ZM32.3402 15.84V17H33.3402V15.84H32.3402ZM32.3402 17V23H33.3402V17H32.3402ZM32.8402 16.5H28.9113V17.5H32.8402V16.5ZM15.1602 23.5H29.8935V22.5H15.1602V23.5ZM24.0002 32.5C19.3941 32.5 15.6602 28.7661 15.6602 24.16H14.6602C14.6602 29.3183 18.8418 33.5 24.0002 33.5V32.5ZM24.0002 33.5C29.1585 33.5 33.3402 29.3183 33.3402 24.16H32.3402C32.3402 28.7661 28.6062 32.5 24.0002 32.5V33.5ZM24.0002 7.5C28.6062 7.5 32.3402 11.2339 32.3402 15.84H33.3402C33.3402 10.6817 29.1585 6.5 24.0002 6.5V7.5ZM24.0002 6.5C18.8418 6.5 14.6602 10.6817 14.6602 15.84H15.6602C15.6602 11.2339 19.3941 7.5 24.0002 7.5V6.5Z" fill="black"></path>
                              </svg>
                            </i>
                        </div>

                        <div class="col px-2">
                          <p class="mb-0" style="color: #ffffff">
                            CONSEILS PRATIQUES</p>
                        </div>
                      </div>
                      <div class="row flex-nowrap align-items-center pt-3 mt-3 mt-lg-n1 mx-n2">
                        <div class="col-auto d-flex px-2">
                          <i class="wsc-icon wsc-icon-lg d-inline-flex align-items-center wsc-icon-loaded" data-path="https://images.wondershare.com/videoconverter/images2021/vcu13/product/recorder_nav_tab_503.svg"><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M18.3077 34.3439C18.0315 34.3439 17.8077 34.5678 17.8077 34.8439C17.8077 35.12 18.0315 35.3439 18.3077 35.3439V34.3439ZM18.3077 39.0685C18.0315 39.0685 17.8077 39.2924 17.8077 39.5685C17.8077 39.8447 18.0315 40.0685 18.3077 40.0685V39.0685ZM36.0251 40.0685C36.3012 40.0685 36.5251 39.8447 36.5251 39.5685C36.5251 39.2924 36.3012 39.0685 36.0251 39.0685V40.0685ZM5.99609 19.5C5.99609 19.7761 6.21995 20 6.49609 20C6.77224 20 6.99609 19.7761 6.99609 19.5H5.99609ZM18.3077 30.8004C18.0315 30.8004 17.8077 31.0243 17.8077 31.3004C17.8077 31.5766 18.0315 31.8004 18.3077 31.8004V30.8004ZM8.85841 9.3584H38.3874V8.3584H8.85841V9.3584ZM38.3874 34.3439H28.9381V35.3439H38.3874V34.3439ZM28.9381 34.3439H18.3077V35.3439H28.9381V34.3439ZM21.8512 39.0685H18.3077V40.0685H21.8512V39.0685ZM32.4816 39.0685H21.8512V40.0685H32.4816V39.0685ZM32.4816 40.0685H36.0251V39.0685H32.4816V40.0685ZM40.2497 31.3004V32.4816H41.2497V31.3004H40.2497ZM40.2497 11.2207V31.3004H41.2497V11.2207H40.2497ZM6.99609 19.5V11.2207H5.99609V19.5H6.99609ZM38.978 30.8004H18.3077V31.8004H38.978V30.8004ZM38.3874 35.3439C39.9682 35.3439 41.2497 34.0624 41.2497 32.4816H40.2497C40.2497 33.5101 39.4159 34.3439 38.3874 34.3439V35.3439ZM38.3874 9.3584C39.4159 9.3584 40.2497 10.1922 40.2497 11.2207H41.2497C41.2497 9.6399 39.9682 8.3584 38.3874 8.3584V9.3584ZM8.85841 8.3584C7.2776 8.3584 5.99609 9.6399 5.99609 11.2207H6.99609C6.99609 10.1922 7.82988 9.3584 8.85841 9.3584V8.3584Z" fill="black"></path>
                              <path d="M2 29.3994V30.2394C2 34.1054 5.13401 37.2394 9 37.2394V37.2394C12.866 37.2394 16 34.1054 16 30.2394V29.3994" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M7.43938 37.2402V39.4802M10.5594 37.2402V39.4802M10.5594 39.4802H7.43938M10.5594 39.4802H12.6394M7.43938 39.4802H5.35938" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M6.35579 26.8846C6.63193 26.8846 6.85579 26.6608 6.85579 26.3846C6.85579 26.1085 6.63193 25.8846 6.35579 25.8846V26.8846ZM11.6447 25.8846C11.3685 25.8846 11.1447 26.1085 11.1447 26.3846C11.1447 26.6608 11.3685 26.8846 11.6447 26.8846V25.8846ZM4.74023 30.24V29.6154H3.74023V30.24H4.74023ZM13.2602 29.6154V30.24H14.2602V29.6154H13.2602ZM4.74023 29.6154V26.3846H3.74023V29.6154H4.74023ZM4.74023 26.3846V25.76H3.74023V26.3846H4.74023ZM4.24023 26.8846H6.35579V25.8846H4.24023V26.8846ZM13.2602 25.76V26.3846H14.2602V25.76H13.2602ZM13.2602 26.3846V29.6154H14.2602V26.3846H13.2602ZM13.7602 25.8846H11.6447V26.8846H13.7602V25.8846ZM4.24023 30.1154H12.1736V29.1154H4.24023V30.1154ZM9.00023 34.5C6.6475 34.5 4.74023 32.5927 4.74023 30.24H3.74023C3.74023 33.145 6.09522 35.5 9.00023 35.5V34.5ZM9.00023 35.5C11.9053 35.5 14.2602 33.145 14.2602 30.24H13.2602C13.2602 32.5927 11.353 34.5 9.00023 34.5V35.5ZM9.00023 21.5C11.353 21.5 13.2602 23.4073 13.2602 25.76H14.2602C14.2602 22.855 11.9053 20.5 9.00023 20.5V21.5ZM9.00023 20.5C6.09522 20.5 3.74023 22.855 3.74023 25.76H4.74023C4.74023 23.4073 6.6475 21.5 9.00023 21.5V20.5Z" fill="black"></path>
                              </svg>
                            </i>
                        </div>

                        <div class="col px-2">
                          <p class="mb-0"  style="color: #ffffff">CONSULTATION IST</p>
                        </div>
                      </div>
                      <div class=" topy  mx-n2">
                        <a href="https://play.google.com/store/apps/details?id=org.eConvivial2&hl=fr&gl=FR" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Télécharger gratuitement</a>
                      </div>
                      </div>
                    </div>
        </div>
        </div>
    </section>


    <section>
      <div class="container">
          <div class="rev">
              <div class="paraf">
                  <h3 class="d-inline-flex align-items-center h4 py-2 my-1" style="line-height: 1.4167;"> Stop violance</h3>
                  <p class="text-gray txgr px-3 mb-0 mx-xl-5">SOS AKOFA GF2D, le chatbot Automatisé de dénonciation 
                    des cas de violences basées sur le genre, bientôt disponible.
                    Il s'agit d'une assistante virtuelle développée par la Plateforme 
                    eCentre Convivial pour le GF2D. 
                    Grâce à cette nouvelle technologie, les victimes de violences basées 
                    sur le genre au Togo peuvent déposer leurs plaintes et se faire assister.
                  </p>
                  <div class="topy mx-n2">
                      <a href="https://wa.me/message/5WXFXT4RUNZ4A1" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Signaler un cas de violences</a>
                    </div>
              </div>
              <div class=""><img class="img imaf " src="./images/chatbox-icon.jpg" alt="" srcset=""></div>
          </div>
      </div>
    </section> 

    <section>
      <div class="container">
          <div class="griflex">
            <div class=""><img class="imaf " src="./images/suppor.png" alt="" srcset=""></div>
              <div class="paraf">
                <h2 style=" font-family: 'Roboto Mono', monospace;
                font-family: 'Zen Maru Gothic', sans-serif;
                font-size: 18px;
                font-weight:650 ;
                color: #000000;
                font-size: 2.8rem;">Découvrez notre Chatbot Whatsapp</h2>
                <div class="pp">
                  <p class="txgr">Découvrez tous nos services automatisés sur le Chatbot WhatsApp comprenant également des ressources sur la santé sexuelle et de la reproduction y compris la COVID-19.</p>
                </div>
                <div class="topy mx-n2">
                  <a href="https://wa.me/message/5WXFXT4RUNZ4A1" class=" btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Lancer le Chatbot</a>
                </div>
                <div>

                </div>
              </div>
          </div>
      </div>
    </section> 





    <div class="container">
      <h2 class="text-center font-weight-bold">Nos Partenaires</h2>
      <section class="customer-logos slider">
        <div class="item">
          <a href="dist/img/logos/CNLS.jpg" class="work-popup">
              <img src="dist/img/logos/CNLS.jpg" sty alt="">
          </a>
      </div>

      <div class="slide">
          <a href="dist/img/logos/fm.png" class="work-popup">
              <img src="dist/img/logos/fm.png" style="margin-top: 40px;" alt="">
          </a>
      </div>

      <div class="slide">
          <a href="dist/img/logos/ONUSIDA.png" class="work-popup">
              <img class="img img-responsive" src="dist/img/logos/ONUSIDA.png" alt="">
          </a>
      </div>
      <div class="slide">
          <a href="dist/img/logos/UNFPA.jpg" class="work-popup">
              <img class="img img-responsive" src="dist/img/logos/UNFPA.jpg" alt="" style="margin-top: 20px;">
          </a>
      </div>
      
      <div class="slide">
          <a href="dist/img/logos/logo-innovup.jpg" class="work-popup">
              <img class="img img-responsive" src="dist/img/logos/logo-innovup.jpg" alt="" style="margin-top: 20px;">
          </a>
      </div>
      
      <div class="slide">
          <a href="dist/img/logos/plateforme.jpg" class="work-popup">
              <img class="img img-responsive" src="dist/img/logos/plateforme.jpg" alt="" style="margin-top: 20px;">
          </a>
      </div>
      <div class="slide">
          <a href="dist/img/logos/CRL.jpg" class="work-popup">
              <img class="img img-responsive" src="dist/img/logos/CRL.jpg" alt="" style="margin-top: 40px;">
          </a>
      </div>
      <div class="slide">
          <a href="dist/img/logos/m6informatique.jpg" class="work-popup">
              <img class="img img-responsive" src="dist/img/logos/m6informatique.jpg"  alt="">
          </a>
      </div>
      
       <div class="slide">
          <a href="dist/img/logos/armoirie.jpg" class="work-popup">
              <img class="img img-responsive" src="dist/img/logos/armoirie.jpg"  alt="">
          </a>
      </div>
      
       <div class="slide">
          <a href="dist/img/logos/undp.png" class="work-popup">
              <img class="img img-responsive" width="50" height="50" src="dist/img/logos/undp.png"  alt="">
          </a>
      </div>

       <div class="slide">
          <a href="images/pf.png" class="work-popup">
              <img class="img img-responsive" style="width:100%; height:100%" src="images/pf.png"  alt="">
          </a>
      </div>


       <div class="slide">
          <a href="images/observatoire.png" class="work-popup">
              <img class="img img-responsive" style="width:200px; height:100px" src="images/observatoire.png"  alt="">
          </a>
      </div>

       <div class="slide">
          <a href="images/orabank.jpg" class="work-popup">
              <img class="img img-responsive" style="width:100%; height:100%" src="images/orabank.jpg"  alt="">
          </a>
      </div>
      </section>
  </div>
    
      
   
    




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

                <p style="font-size: 16px;
                color: #ffffff;
                text-decoration: none;
                font-weight: 300;
                color: #bbbbbb;
                display: block;
                transition: all 0.3s ease;">Togo : Agoe-Logope<br>
                  Tél. : (+228) 90 30 63 74 / 96 44 42 42<br>
                  E-mail : togo@econvivial.org
                </p>
              </div>

              <div class="">
               <p  style="font-size: 16px;
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
                <a  href="https://www.facebook.com/econvivial" target="_blank" rel="noopener noreferrer" ><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/eConvivial_tg" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/akolly-kafui-rodrigue-76086a63/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
            
          </div>
        </div>
     </footer>
   
    {{-- </section>
    <section> 
    <div class="">
      <div class="chatbox">
          <div class="chatbox__support">
              <div class="chatbox__header">
                  <div class="chatbox__image--header">
                      <img src="images/image.png" alt="image">
                  </div>
                  <div class="chatbox__content--header">
                      <h4 class="chatbox__heading--header">Chat support</h4>
                      <p class="chatbox__description--header">There are many variations of passages of Lorem Ipsum available</p>
                  </div>
              </div>
              <div class="chatbox__messages">
                  <div>
                      <div class="messages__item messages__item--visitor">
                          Can you let me talk to the support?
                      </div>
                      <div class="messages__item messages__item--operator">
                          Sure!
                      </div>
                      <div class="messages__item messages__item--visitor">
                          Need your help, I need a developer in my site.
                      </div>
                      <div class="messages__item messages__item--operator">
                          Hi... What is it? I'm a front-end developer, yay!
                      </div>
                      <div class="messages__item messages__item--typing">
                          <span class="messages__dot"></span>
                          <span class="messages__dot"></span>
                          <span class="messages__dot"></span>
                      </div>
                  </div>
              </div>
              <div class="chatbox__footer">
                  <img src="images/emojis.svg" alt="">
                  <img src="images/microphone.svg" alt="">
                  <input type="text" placeholder="Write a message...">
                  <p class="chatbox__send--footer">Send</p>
                  <img src="images/attachment.svg" alt="">
              </div>
          </div>
          <div class="chatbox__button">
             
              <img style="padding: 10px; 
              background: white;
              border: none;
              outline: none;
              border-top-left-radius: 50px;
              border-top-right-radius: 50px;
              border-bottom-left-radius: 50px;
              box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
              cursor: pointer;font-size:2px;size:2px; " class="svg" src="images/chatbox-icon.svg" alt="">
             
          </div>
      </div>
  </div>
</section> --}}
    {{-- <section class="py-5 my-5">
      <div class="container text-center py-lg-3 my-lg-3">
          <div class="py-2 my-1">
           
            <h2 class="display-4 font-weight-bold my-4">Votre boîte à outils vidéo complète</h2>
            <div class="dev-desktop">
            <div class="dev-mobile">
              <div class="row justify-content-center mx-n2">
                <a href="" class="btn btn-lg btn-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_5">Essai gratuit</a>
                <a href="" class="btn btn-lg btn-outline-color rounded-2 my-0 mx-2" ga360location="content_6_buttonLink_6">Acheter</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

<!-- <section class="sec-colo">

  <footer class="wsc-footer2020">
    <div class="wsc-footer2020-top wsc-footer202004-top">
      <div class="wsc-footer2020-container">
        <div class="wsc-footer2020-top-content">
          <div class="wsc-footer2020-nav">
            <a href="https://www.wondershare.fr/" ga360location="footer_1_buttonLink_69"><img class="wsc-footer2020-nav-logo" src="https://neveragain.allstatics.com/2019/assets/icon/logo/wondershare-slogan-vertical-white.svg" alt=""></a>
          </div>
          <div class="wsc-footer2020-subnav">
            <div class="wsc-footer2020-subnav-content">
              <div class="wsc-footer2020-dropdown">
                <nav class="wsc-footer2020-dropdown-toggle" aria-expanded="false">
                  <h5 class="wsc-footer2020-dropdown-title">Produit</h5>
                  <div class="wsc-footer2020-dropdown-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg">
                      <path d="M6 9L12 15L18 9" stroke="white" stroke-width="1.5"></path>
                    </svg>
                  </div>
                </nav>
                <div class="wsc-footer2020-dropdown-menu">
                  <ul>
                    <li class="wsc-footer2020-subnav-item"><a class="wsc-footer2020-subnav-link" href="https://videoconverter.wondershare.net/fr/store/windows-individuals.html" ga360location="footer_1_buttonLink_70">Acheter</a></li>
                    <li class="wsc-footer2020-subnav-item"><a class="wsc-footer2020-subnav-link" href="https://videoconverter.wondershare.net/fr/store/business.html" ga360location="footer_1_buttonLink_71">Pour Affaires</a></li>
                    <li class="wsc-footer2020-subnav-item"><a class="wsc-footer2020-subnav-link" href="https://videoconverter.wondershare.net/fr/reviews/video-converter-ultimate-new/" ga360location="footer_1_buttonLink_72">Commentaires</a></li>
                  </ul>
                </div>
              </div>
              <div class="wsc-footer2020-dropdown">
                <nav class="wsc-footer2020-dropdown-toggle" aria-expanded="false">
                  <h5 class="wsc-footer2020-dropdown-title">Support</h5>
                  <div class="wsc-footer2020-dropdown-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg">
                      <path d="M6 9L12 15L18 9" stroke="white" stroke-width="1.5"></path>
                    </svg>
                  </div>
                </nav>
                <div class="wsc-footer2020-dropdown-menu">
                  <ul>
                    <li class="wsc-footer2020-subnav-item"><a class="wsc-footer2020-subnav-link" href="https://videoconverter.wondershare.net/fr/guide/" ga360location="footer_1_buttonLink_73">Guide</a></li>
                    <li class="wsc-footer2020-subnav-item"><a class="wsc-footer2020-subnav-link" href="https://videoconverter.wondershare.net/fr/tech-spec.html" ga360location="footer_1_buttonLink_74">Tech Specs</a></li>
                  </ul>
                </div>
              </div>
              <div class="wsc-footer2020-dropdown">
                <nav class="wsc-footer2020-dropdown-toggle" aria-expanded="false">
                  <h5 class="wsc-footer2020-dropdown-title">Follow us</h5>
                </nav>
                <div class="wsc-footer2020-dropdown-menu">
                  <ul>
                    <li class="wsc-footer2020-subnav-item">
                      <a class="wsc-footer2020-subnav-iconlink" href="https://www.facebook.com/wondershare/" ga360location="footer_1_buttonLink_75">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M13 1C6.92487 1 2 5.92487 2 12C2 17.4558 5.97189 21.9839 11.1818 22.8504L11.1818 15H9V12H11.1818L11.1818 10C11.1818 8.93913 11.5649 7.92172 12.2469 7.17157C12.9288 6.42143 13.8538 6 14.8182 6H17V9.2H14.8182C14.6253 9.2 14.4403 9.28429 14.3039 9.43431C14.1675 9.58434 14.0909 9.78783 14.0909 10L14.0909 12H17L16.2727 15H14.0909L14.0909 22.9466C19.6539 22.3989 24 17.707 24 12C24 5.92487 19.0751 1 13 1Z" fill="white"></path>
                        </svg>
                      </a>
                      <a class="wsc-footer2020-subnav-iconlink" href="https://www.instagram.com/wondershare/" ga360location="footer_1_buttonLink_76">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M2 7C2 4.23858 4.23858 2 7 2H17C19.7614 2 22 4.23858 22 7V17C22 19.7614 19.7614 22 17 22H7C4.23858 22 2 19.7614 2 17V7ZM12.4833 8.98924C11.8591 8.89668 11.2217 9.0033 10.6616 9.29392C10.1015 9.58455 9.64727 10.0444 9.36357 10.608C9.07988 11.1717 8.98113 11.8104 9.08138 12.4334C9.18163 13.0564 9.47577 13.6319 9.92196 14.0781C10.3681 14.5243 10.9437 14.8184 11.5667 14.9187C12.1897 15.0189 12.8284 14.9202 13.392 14.6365C13.9557 14.3528 14.4155 13.8986 14.7061 13.3385C14.9968 12.7784 15.1034 12.1409 15.0108 11.5167C14.9164 10.88 14.6197 10.2906 14.1646 9.83547C13.7095 9.38034 13.12 9.08365 12.4833 8.98924ZM9.74043 7.51868C10.6739 7.0343 11.7364 6.85661 12.7767 7.01087C13.8378 7.16823 14.8203 7.6627 15.5788 8.42126C16.3374 9.17981 16.8318 10.1622 16.9892 11.2234C17.1435 12.2637 16.9658 13.3261 16.4814 14.2596C15.997 15.1931 15.2306 15.9501 14.2912 16.423C13.3518 16.8958 12.2873 17.0604 11.2489 16.8933C10.2106 16.7262 9.2514 16.236 8.50774 15.4923C7.76409 14.7487 7.27386 13.7895 7.10678 12.7511C6.9397 11.7128 7.10428 10.6482 7.5771 9.70884C8.04993 8.76944 8.80693 8.00305 9.74043 7.51868ZM17.5 5.5C16.9477 5.5 16.5 5.94772 16.5 6.5C16.5 7.05228 16.9477 7.5 17.5 7.5H17.51C18.0623 7.5 18.51 7.05228 18.51 6.5C18.51 5.94772 18.0623 5.5 17.51 5.5H17.5Z" fill="white"></path>
                        </svg>
                      </a>
                      <a class="wsc-footer2020-subnav-iconlink" href="https://twitter.com/wondershare" ga360location="footer_1_buttonLink_77">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg">
                          <path d="M23 3.00029C22.0424 3.67577 20.9821 4.1924 19.86 4.53029C19.2577 3.8378 18.4573 3.34698 17.567 3.12422C16.6767 2.90145 15.7395 2.95749 14.8821 3.28474C14.0247 3.612 13.2884 4.19469 12.773 4.95401C12.2575 5.71332 11.9877 6.61263 12 7.53029V8.53029C10.2426 8.57586 8.50127 8.1861 6.93101 7.39574C5.36074 6.60537 4.01032 5.43893 3 4.00029C3 4.00029 -1 13.0003 8 17.0003C5.94053 18.3983 3.48716 19.0992 1 19.0003C10 24.0003 21 19.0003 21 7.50029C20.9991 7.22174 20.9723 6.94388 20.92 6.67029C21.9406 5.66378 22.6608 4.393 23 3.00029Z" fill="white"></path>
                        </svg>
                      </a>
                      <a class="wsc-footer2020-subnav-iconlink" href="https://www.youtube.com/user/Wondershare" ga360location="footer_1_buttonLink_78">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M21.8386 5.15941C22.1792 5.51057 22.4212 5.94541 22.54 6.42C22.8572 8.1787 23.0112 9.96295 23 11.75C23.0063 13.5103 22.8523 15.2676 22.54 17C22.4212 17.4746 22.1792 17.9094 21.8386 18.2606C21.498 18.6118 21.0707 18.8668 20.6 19C18.88 19.46 12 19.46 12 19.46C12 19.46 5.11996 19.46 3.39996 19C2.93878 18.8738 2.51794 18.6308 2.17811 18.2945C1.83827 17.9581 1.59092 17.5398 1.45996 17.08C1.14273 15.3213 0.988741 13.537 0.999961 11.75C0.991197 9.97631 1.14518 8.20556 1.45996 6.46C1.57875 5.98541 1.82068 5.55057 2.16131 5.19941C2.50194 4.84824 2.92921 4.59318 3.39996 4.46C5.11996 4 12 4 12 4C12 4 18.88 4 20.6 4.42C21.0707 4.55318 21.498 4.80824 21.8386 5.15941ZM15.5 11.75L9.74997 15.02V8.47998L15.5 11.75Z" fill="white"></path>
                        </svg>
                      </a>
                      <a class="wsc-footer2020-subnav-iconlink" href="https://www.wondershare.com/connect/" ga360location="footer_1_buttonLink_79">
                        <svg width="16" height="4" viewBox="0 0 16 4" fill="none" xmlns="https://www.w3.org/2000/svg">
                          <circle opacity="0.8" cx="2" cy="2" r="2" fill="white"></circle>
                          <circle opacity="0.8" cx="8" cy="2" r="2" fill="white"></circle>
                          <circle opacity="0.8" cx="14" cy="2" r="2" fill="white"></circle>
                        </svg>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </footer>
</section> -->

<!-- <body>
  <div class="frem">
    <div class="cookies-card">
      <p class="title">Cookies Alert</p>
      <p class="info">En utilisant ce site internet, vous acceptez automatiquement que nous utilisions des cookies.<a href="#">Lire la suite</a>
      </p>
      <button class="cta1">Acceptez les coockies</button>
      <a href="#" class="settings"> Parrametre Cookies </a>
  </div>
  </div>
</body> -->
    
    <!-- JavaScript Files -->


    <script>
      / Geo Locate
let lat, lon;
if ('geolocation' in navigator) {
  console.log('geolocation available');
  navigator.geolocation.getCurrentPosition(async position => {
    let lat, lon, weather, air;
    try {
      lat = position.coords.latitude;
      lon = position.coords.longitude;
      document.getElementById('latitude').textContent = lat.toFixed(2);
      document.getElementById('longitude').textContent = lon.toFixed(2);
      const api_url = `weather/${lat},${lon}`;
      const response = await fetch(api_url);
      const json = await response.json();
      weather = json.weather.currently;
      console.log(weather);
      console.log(weather.temperature);
      document.getElementById('summary').textContent = weather.summary;
      document.getElementById('temp').textContent = weather.temperature;
      air = json.air_quality.results[0];
      console.log(air);
      document.getElementById('aq_city').textContent = air.city;
      document.getElementById('aq_location').textContent = air.location;
      document.getElementById('aq_parameter').textContent = air.measurements[0].parameter;
      document.getElementById('aq_value').textContent = air.measurements[0].value;
      document.getElementById('aq_units').textContent = air.measurements[0].unit;
      document.getElementById('aq_date').textContent = air.measurements[0].lastUpdated;
    } catch (error) {
      console.error(error);
      air = { value: -1 };
      document.getElementById('air').textContent = 'No air quality reading was found.';
    }

    const data = { lat, lon, weather, air };
    const options = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    };
    const db_response = await fetch('/api', options);
    const db_json = await db_response.json();
    console.log(db_json);
  });
} else {
  console.log('geolocation not available');
}

    </script>
    
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://www.cssscript.com/demo/cookie-consent-popup-purecookie/ "></script>
    <script type="text/javascript" src="resources/js/toggle.js"></script>
    <script type="text/javascript" src="resources/js/js.js"></script>
{{-- 
    <script src="resources/js/chat1.js"></script>
    <script src="resources/js/chat2.js"></script> --}}

    <script src="./app.js"></script>
    
  </body>
</html>
