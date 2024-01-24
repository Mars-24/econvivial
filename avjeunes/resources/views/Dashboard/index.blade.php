@extends("Template.mainTemplate")

@section("title", "Bienvenue au eCentre Convivial")

@section("body")
    <style type="text/css">
        .widget-card-1{
            height: 220px;
        }
    </style>
    
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include("HeaderNav.nav")
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include("Profile.sideProfil") 
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="{{ route('auto-test.vostest') }}">
                                        <i class="icofont icofont-ui-home bg-c-blue card1-icon ">
                                            <span class="fa fa-stethoscope"></span>
                                        </i>
                                        <span class="text-c-blue f-w-600">AUTO TEST COVID-19</span>
                                        <h4></h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                                                Passer l'auto test de COVID-19
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="{{route('conseil-pratique')}}">
                                        <i class="icofont icofont-pie-chart   bg-c-pink card1-icon">
                                            <span class="fa fa-list-alt"></span>
                                        </i>
                                        <span class=" text-c-pink f-w-600">CONSEILS PRATIQUES</span>
                                        <h4></h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                                                Recevez les conseils pratiques des professionnels sur différentes thématiques. Nous vous fournissons des informations sur la santé ...
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="{{route('do-consultation')}}">
                                        <i class="icofont icofont-ui-home bg-c-blue card1-icon ">
                                            {{--<img src="images/icons/consultation.png" alt="No image" />--}}
                                            <span class="fa fa-stethoscope"></span>
                                        </i>
                                        <span class="text-c-blue f-w-600">CONSULTATION IST</span>
                                        <h4></h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Le Centre Convivial vous offre des services adaptés en matière de la prise en charge des Infections Sexuellement Transmissibles.
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="{{route('methode-naturelle')}}">
                                        <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                                        <span class="text-c-green f-w-600">PLANNING FAMILIAL</span>
                                        <h4></h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="icofont icofont-ui-home text-c-green card1-icon">
                                                    {{--<img  class="fa fa-stethoscope" src="images/icons/planning.png" alt="No image" />--}}
                                                    <span class="fa fa-users"></span>
                                                </i>Promouvoir l’espacement de naissance et éviter des grossesses précoces ou non désirées, tel est notre objectif. eCentre Convivial vous offre.
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <a href="{{route('suivi-de-grossesse')}}" >
                                        <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                                        <span class="text-c-yellow f-w-600">SUIVI DE GROSSESSE </span>
                                        <h4></h4>
                                        <div>
                                            <span class="f-left m-t-10 text-muted">
                                                <i class="card1-icon text-c-yellow  icofont icofont-ui-home">
                                                <span class="fa fa-female"></span>
                                                </i>Notre service organise le suivi de la grossesse, l’information et l’accompagnement des futures mères et des futurs pères. Des sages-femmes proposent  ...
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                    <!--</div>-->
            
                    <!--<div class="row">-->
                      <!-- card1 start -->
                      <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                          <div class="card-block-small">
                            <a href="{{route('suivi-de-regle')}}">
                              <i class="icofont icofont-pie-chart bg-viber card1-icon">
                                <span class="fa fa-gg-circle "></span>
                              </i>
                              <span class="text-viber f-w-600">SUIVI DU CYCLE <br/>MENSTRUEL </span>
                              <h4></h4>
                              <div>
                                <span class="f-left m-t-10 text-muted">
                                  <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>
                                  Nous assistons les femmes, surtout les jeunes filles scolaires et extrascolaires dans la gestion de leur cycle menstruel et l’hygiène ...
                                </span>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <!-- card1 end -->
                      <!-- card1 start -->
                      <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                          <div class="card-block-small">
                            <a href="{{route('assistance-medecin')}}">
                              <i class="icofont icofont-ui-home bg-c-yellow card1-icon">
                                {{--<img src="images/icons/assistance.png" style="color: orange;" alt="No image" />--}}
                                <span class="fa fa-user-md"></span>
                              </i>
                              <span class="text-c-yellow f-w-600">ASSISTANCE EN LIGNE</span>
                              <h4></h4>
                              <div>
                                <span class="f-left m-t-10 text-muted">
                                  <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>
                                  Discuter 24h/24 et 7j/7 avec des professionnels de la santé (Médécin, Gynécologue, Sage-femme et conseillers) pour tous vos problèmes de sexualité.
                                </span>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <!-- card1 end -->
                      <!-- card1 start -->
                      <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                          <a href="">
                            <div class="card-block-small">
                              <a href="{{route('user-dashboard-quiz')}}" >
                                <i class="icofont icofont-warning-alt bg-googleplus card1-icon">
                                  <span class="fa fa-gamepad"></span>
                                </i>
                                <span class="text-googleplus f-w-600">JEUX</span>
                                <h4></h4>
                                <div>
                                  <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>eCentre Convivial vous propose des jeux Puzzle et des questions Quizz pouvant voous permettre de gagner des prix.
                                  </span>
                                </div>
                              </a>
                            </div>
                          </a>
                        </div>
                      </div>
                      <!-- card1 end -->
                      <!-- card1 start -->
                      <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                          <div class="card-block-small">
                            <a href="#" >
                              <i class="icofont icofont-social-twitter bg-instagram card1-icon">
                                <span class="fa fa-calendar"></span>
                              </i>
                              <span class="text-instagram f-w-600">AGENDA </span>
                              <h4></h4>
                              <div>
                                <span class="f-left m-t-10 text-muted">
                                  <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10 card1-icon">
                                    {{--<img src="images/icons/agenda.png" style="color: orange;" alt="No image" />--}}
            
                                  </i>
                                  Soyez informés de tous les événements dans votre pays, en Afrique ou dans le monde en lien avec la santé sexuelle et de la reproduction ou connexe.
                                </span>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <!-- card1 end -->
                    </div>
            
                    <div class="row" style="margin: 3px;">
                        <div class="card" style="width: 100%;">
                            <div class="card-body" >
                                <h4 class="card-title" style="margin-bottom: 20px;">Gallery & Videos</h4>
                                
                                <ul class="nav nav-tabs tab-solid tab-solid-danger" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-5-2" data-toggle="tab" href="#profile-5-2" role="tab" aria-controls="profile-5-2" aria-selected="false">Videos</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-5-1" data-toggle="tab" href="#home-5-1" role="tab" aria-controls="home-5-1" aria-selected="true">Gallery</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-5-3" data-toggle="tab" href="#contact-5-3" role="tab" aria-controls="contact-5-3" aria-selected="false">Activités</a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content tab-content-solid" style="border: rgba(0,0,0,0.4) 1px solid;padding: 10px;">
                                    <div class="tab-pane fade show active" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                                        <div id="video-gallery" class="row lightGallery">
                                            @foreach($videos as $video)
                                                <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" target="_blank" href="https://www.youtube.com/watch?v={{$video->url}}">
                                                    <img class="img img-responsive" src="images/webtv/{{$video->image}}"  />
                                                    <div class="demo-gallery-poster">
                                                        <img src="images/lightbox/play-button.png">
                                                    </div>
                                                </a>
                                            @endforeach>
                                        </div>                  
                                    </div>
            
                                    <div class="tab-pane fade show " id="home-5-1" role="tabpanel" aria-labelledby="tab-5-1">
                                        <div class="row grid-margin">
                                            <div class="col-lg-12">
                                                <div class="card px-3">
                                                    <div id="lightgallery-without-thumb" class="row lightGallery">
                                                        <a href="images/gallery/img1.jpg" target="_blank" class="image-tile" alt="image large"><img src="images/gallery/img1.jpg" alt="Aucune image"></a>
                                                        <a href="images/gallery/img2.jpg" target="_blank" class="image-tile" alt="image large"><img src="images/gallery/img2.jpg" alt="Aucune image"></a>
                                                        <a href="images/gallery/img3.jpg.jpg" target="_blank" class="image-tile" alt="image large"><img src="images/gallery/img3.jpg" alt="Aucune image"></a>
                                                        <a href="images/gallery/img4.jpg" target="_blank" class="image-tile" alt="image large"><img src="images/gallery/img4.jpg" alt="Aucune image"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="tab-pane fade" id="contact-5-3" role="tabpanel" aria-labelledby="tab-5-3">
                                        eCentre Convivial voudrait dans un premier temps résoudre le problème
                                        d’accès des jeunes et adolescents à l’information en milieu jeune et dans
                                        les familles en favorisant la communication interpersonnelle, suivant des stratégies
                                        novatrices de l’application, l’acquisition des compétences de vie pour leur avenir, le
                                        changement de comportement, des services offerts et la référence vers des centres conviviaux
                                        et formations sanitaires existants.
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
    
    @include("Dashboard.conseils-pratique")
    @include("Dashboard.consultation")
    @include("Dashboard.planning")
    @include("Dashboard.suiviGrossesse")
    @include("Dashboard.menstru")
    @include("Dashboard.assistance")
    @include("Dashboard.jeux")
    @include("Dashboard.agenda")
    
    <script type="text/javascript">
        $(document).ready(function() {
            @if (Session::get("logged") == true)
                showSwal('success-message');
                
                $(".swal-title").html("Bonjour {{$utilisateur->username}} . Bienvenue sur eCentre Convivial");
                
                $(".swal-text").hide();
                
                $(".swal-button").text("Continuer");
            @endif
        
            {{ Session::put("logged", false) }}
        });
   </script>
@endsection