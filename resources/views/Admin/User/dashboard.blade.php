<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  
  <link rel="stylesheet" href="resources/css/css/de.css">
  <link href="{{ asset('resources/css/de.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="resources/css/dashfooter.css" />
  <link href="{{ asset('resources/css/dashfooter.css') }}" rel="stylesheet">

  <link href="{{ asset('resources/css/dashtable.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/dashtable.css" />

  <link href="{{ asset('resources/css/dashboard.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/dashboard.css" />




  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;900&display=swap"
    rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <!-- 
    - material icon link
  -->
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />

    <script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }

        function drop(){
        const toggleMenu = document.querySelector('.drop');
        toggleMenu.classList.toggle('act')
    }
    </script>

</head>



<body>

  <!-- 
    - #HEADER
  -->


  
  <header class="header" data-header>
    <div class="container">

      <!-- <h1>
        <a href="#" class="logo">Dashboard</a>
      </h1> -->

      <button class="menu-toggle-btn icon-box" data-menu-toggle-btn aria-label="Toggle Menu">
        <span class="material-symbols-rounded  icon">menu</span>
      </button>

      <nav class="navbar nav-btn"> 
        <div class="container nav-links">

          <ul class="navbar-list">

            <li class=" nav-link">
              <a href="#" class="navbar-link active icon-box profile" >
                <span class="material-symbols-rounded  icon">grid_view</span>
                <span  >Utilisateurs </span>

                <div class="dropdown">
                  <ul>
                      <li class="dropdown-link">
                          <a href="{{route('afficher-liste-utilisateur')}}">Liste des utilisateurs</a>
                      </li>
                      <li class="dropdown-link">
                          <a href= "{{ route('send-sms.index') }}">Envoyer une notification</a>
                      </li>
                     
                  </ul>
              </div>
               
              </a>
            </li>

            <li class=" nav-link">
              <a href="#" class="navbar-link  icon-box">
                <span class="material-symbols-rounded  icon">folder</span>
                <span>Rapports</span><div class="dropdown">
                  <ul>
                      <li class="dropdown-link">
                          <a href="#">Liste des rapports</a>
                      </li>
                     
                      <div class="arrow"></div>
                  </ul>
              </div>

              </a>
              

            </li>

            <li class=" nav-link" >
              <a href="#" class="navbar-link icon-box profile">
                <span class="material-symbols-rounded  icon">list</span>

                <span>Analyse des Données </span>

                <div class="dropdown">
                  <ul>
                      <li class="dropdown-link">
                          <a href="#">Utilisateurs</a>
                      </li>
                      <li class="dropdown-link">
                          <a href="#">Consultations IST</a>
                      </li>
                      <li class="dropdown-link">
                          <a href="#">Suivi des règles <i class="fas fa-caret-down"></i></a>
                          
                      </li>
                      <li class="dropdown-link">
                          <a href="#">Assistance en ligne </a>
                      </li>
                      <div class="arrow"></div>
                      <li class="dropdown-link">
                        <a href="#">Résultats Quiz </a>
                    </li>
                    <div class="arrow"></div>
                    <li class="dropdown-link">
                      <a href="#">Auto Test COVID-19</a>
                  </li>
                  <div class="arrow"></div>
                  </ul>
              </div>
              
              </a>
            </li>

            <li class=" nav-link" >
              <a href="#" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">bar_chart</span>

                <span>Assistance en ligne</span>
                <div class="dropdown">
                  <ul>
                      <li class="dropdown-link">
                          <a href="{{route('suivre-teleconseiller')}}">Liste des téléconseillers </a>
                      </li>
                      <li class="dropdown-link">
                          <a href="{{route('suivre-user-assister')}}">Utilisateurs assistés</a>
                      </li>
                      <li class="dropdown-link">
                          <a href="{{route('gestion-presence-tele-conseiller')}}">Présence des téléconseillers <i class="fas fa-caret-down"></i></a>
                          
                      </li>
                      <li class="dropdown-link">
                          <a href="{{route('liste-teleconseiller')}}">Erégistrements des téléconseillers </a>
                      </li>
                      <div class="arrow"></div>
                  </ul>
              </div>
              </a>
            </li>

            <li class=" nav-link" >
            <a href="#" class="navbar-link  icon-box">
              <span class="material-symbols-rounded  icon">Cached</span>

              <span>Cycle menstruel</span>
              <div class="dropdown">
                <ul>
                    <li class="dropdown-link">
                        <a href="{{route('demande-suivi-regle-admin')}}">Souscription au suivi des règles </a>
                    </li>
                    <li class="dropdown-link">
                        <a href="{{route('suivi-regle-admin')}}">Liste demande suivi des règles</a>
                    </li>
                    <li class="dropdown-link">
                        <a href="{{route('suivi-ovulation-admin')}}">Liste demande suivi de l'ovulation <i class="fas fa-caret-down"></i></a>
                        
                    </li>
                    <li class="dropdown-link">
                      <a href="{{route('annulation-suivi-menstruation')}}">Annulation de suivi</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="{{route('liste-rapport-alerte-sms')}}">Rapports SMS</a>
                </li>
                <li class="dropdown-link">
                  <a href="{{route('liste-rapport-alerte-sms-manuel')}}">Rapports SMS manuel</a>
              </li>
                    <div class="arrow"></div>
                </ul>
            </div>
            </a>
            </li>

            <li class=" nav-link" >
            <a href="#" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">folder</span>
              <span>Suivi de grossesse</span>
              <div class="dropdown">
                <ul>
                    <li class="dropdown-link">
                        <a href="{{route('suivre-grossesse-admin')}}">Souscription au suivi</a>
                    </li>
                    <li class="dropdown-link">
                        <a href="{{route('annulation-suivi-grossesse')}}">Annulation de suivi</a>
                    </li>
                   
                    <div class="arrow"></div>
                </ul>
            </div>
            </a>
            </li>

            <li class=" nav-link" > 
            <a href="#" class="navbar-link  icon-box">
              <span class="material-symbols-rounded  icon">grid_view</span>
              <span>Conseils pratiques</span>

              <div class="dropdown">
                <ul>
                    <li class="dropdown-link">
                        <a href="{{ route('admin-conseil-pratique') }}">Liste des conseils</a>
                    </li>
                    <li class="dropdown-link">
                        <a href="{{ route('conseils-pratiques-covid-19.index') }}">COVID-19</a>
                    </li>
                    <li class="dropdown-link">
                        <a href="{{ route('auto-test.vostest') }}">Auto test<i class="fas fa-caret-down"></i></a>
                        
                    </li>
                    <li class="dropdown-link">
                        <a href="{{ route('auto-test-result') }}">Resultats auto test</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="{{ route('covid-19-case-location.index') }}">Géolocalisation des cas du COVID-19</a>
                  </li>
                    <div class="arrow"></div>
                </ul>
            </div>

            </a>
          </li>


          @if(Auth::user()->hasAccess("SA"))
          <!--creation admin-->
          <li class=" nav-link" >
            <a href="#" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">PersonAdd</span>
              <span>Création admin</span>
              <div class="dropdown">
                <ul>
                    <li class="dropdown-link">
                        <a href="{{route('gestion-admin')}}">Super admin</a>
                    </li>
                    <li class="dropdown-link">
                        <a href="{{route('gestion-tele-conseiller')}}">Admin téléconseiller</a>
                    </li>
                    <li class="dropdown-link">
                        <a href="{{route('gestion-formation-sanitaire')}}">Admin formation sanitaire<i class="fas fa-caret-down"></i></a>
                        
                    </li>
                    <li class="dropdown-link">
                        <a href="{{route('gestion-innov')}}">Admin innovHealth</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="{{ route('liste-admin') }}">Affecter role</a>
                  </li>
                    <div class="arrow"></div>
                </ul>
            </div>
            </a>
          </li>  
          @endif 

            <li class=" nav-link" >
              <a href="#" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">Business</span>
                <span>Gestion des PE</span>
                <div class="dropdown">
                  <ul>
                      <li class="dropdown-link">
                          <a href="{{ route('entretiens-participants') }}">Données des PE</a>
                      </li>
                      <li class="dropdown-link">
                        <a href="{{ route('entretiens-participants-suite') }}">Données des PE Suite</a>
                    </li>
                      <li class="dropdown-link">
                          <a href="{{route('gestion-compte-pe')}}">PE scolaire</a>
                      </li>
                      <li class="dropdown-link">
                          <a href="{{route('pe-universite-page')}}">PE universitaire<i class="fas fa-caret-down"></i></a>
                          
                      </li>
                      <li class="dropdown-link">
                          <a href="{{route('gestion-compte-superviseur')}}">Sup scolaire</a>
                      </li>
                      <li class="dropdown-link">
                        <a href="{{route('superviseur-universite')}}">Sup universitaire</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="{{route('gestion-encadreur-association')}}">M&E ONG</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="{{route('gestion-encadreur-regionaux')}}">M&E Régional</a>
                </li>
                <li class="dropdown-link">
                  <a href="{{route('suivi-pair-educateur')}}">Suivi PE</a>
              </li>
              <li class="dropdown-link">
                <a href="{{route('suivi-pair-superviseur')}}">Suivi Superviseurs</a>
            </li>
            <li class="dropdown-link">
              <a href="{{route('suivi-admin-ong')}}">Suivi M&E ONG</a>
          </li>
          <li class="dropdown-link">
            <a href="{{route('suivi-admin-regionaux')}}">Suivi M&E Régionaux</a>
        </li>
                      <div class="arrow"></div>
                  </ul>
              </div>
              </a>
            </li>


            <li class=" nav-link" >
              <a href="#" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">People</span>
                <span>Planning famillial</span>
                <div class="dropdown">
                  <ul>
                      <li class="dropdown-link">
                          <a href="{{route('add-planning-famillial-moderne')}}">Ajouter une méthode moderne </a>
                      </li>
                      <li class="dropdown-link">
                          <a href="{{route('add-planning-famillial-naturelle')}}">Ajouter une méthode naturelle</a>
                      </li>
                      <li class="dropdown-link">
                          <a href="{{route('souscription-planning')}}">Souscriptions aux PF<i class="fas fa-caret-down"></i></a>
                          
                      </li>
                     
                      <div class="arrow"></div>
                  </ul>
              </div>
              </a>
            </li>
          </ul>

          <ul class="user-action-list">

            <!-- <li>
              <a href="#" class="notification icon-box">
                <span class="material-symbols-rounded  icon">notifications</span>
              </a>
            </li> -->

            <li class="">
              <a href="#" class="header-profile " onclick="menuToggle();" >

                <figure class="profile-avatar profile" >
                  <img src="{{ auth()->user()->avatar }}" alt="" width="32" height="32">
                </figure>

                <!-- <div>
                  <p class="profile-title">Elizabeth F</p>

                  <p class="profile-subtitle">Admin</p>
                </div> -->
                <div class="action">
                 <!-- <div class="profile" onclick="menuToggle();">
                      <img src="user.png" alt=""> 
                  </div>  -->
          
                  <div class="menu">
                      <h3>
                          User Account
                          <div>
                              Operational Team
                          </div>
                      </h3>
                      <ul>
                          <li>
                              <span class="material-icons icons-size">person</span>
                              <a href="#">Mon Profile</a>
                          </li>
                          <li>
                              <span class="material-icons icons-size">mode</span>
                              <a href="#">Modifier mon profile</a>
                          </li>
                          <li>
                              <span class="material-icons icons-size">account_balance_wallet</span>
                              <a href="#">Portefeuile</a>
                          </li>
                          <li>
                              <span class="material-icons icons-size">power</span>
                              <a href="#">Deconnexion</a>
                          </li>
                      </ul>
                  </div>
              </div>

                

              </a>
            </li>

          </ul>

        </div>
      </nav>
      
    </div>

    

  </header>





   <main>
    <article class="container article">

      <h2 class="h2 article-title">Bonjour  Admin</h2>

      <p class="article-subtitle">Bienvenue au Dashboard!</p>

       
      
      

      <section class="home">

        <div class="card profile-card">

          <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
            <span class="material-symbols-rounded  icon">more_horiz</span>
          </button>

          <ul class="ctx-menu">

            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">edit</span>

                <span class="ctx-menu-text">Editer</span>
              </button>
            </li>

            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">cached</span>

                <span class="ctx-menu-text">Rafraichir</span>
              </button>
            </li>

            <li class="divider"></li>

            <li class="ctx-item">
              <button class="ctx-menu-btn red icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">delete</span>

                <span class="ctx-menu-text">Deconnexion</span>
              </button>
            </li>

          </ul>

          <div class="profile-card-wrapper">

            <figure class="card-avatar">
              <img src="{{ auth()->user()->avatar }}" alt="Administrateur" width="48" height="48">
            </figure>

            <div>
              <p class="card-title"> {{  auth()->user()->username }} </p>

              <p class="card-subtitle">{{ auth()->user()->typeuser->libelle }}</p>
            </div>

          </div>

          <ul class="contact-list">

            <li>
              <a href="mailto:xyz@mail.com" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">mail</span>

                <p class="text">{{  auth()->user()->email }}</p>
              </a>
            </li>

            <li>
              <a href="{{  auth()->user()->numero }}" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">call</span>

                <p class="text">{{  auth()->user()->numero }}</p>
              </a>
            </li>

          </ul>

          <div class="divider card-divider"></div>

          <ul class="progress-list">

            <li class="progress-item">
<!-- 
              <div class="progress-label">
                <p class="progress-title">Project Completion</p>

                <data class="progress-data" value="85">85%</data>
              </div> -->

              <div class="progress-bar">
                <div class="progress" style="--width: 85%; --bg: var(--blue-ryb);"></div>
              </div>

            </li>

            <li class="progress-item">

              <!-- <div class="progress-label">
                <p class="progress-title">Overall Rating</p>

                <data class="progress-data" value="7.5">7.5</data>
              </div> -->

              <div class="progress-bar">
                <div class="progress" style="--width: 75%; --bg: var(--coral);"></div>
              </div>

            </li>

          </ul>

        </div>

        <div class="card-wrapper">

          <div class="card task-card">

            <div class="card-icon icon-box green">
              <span class="material-symbols-rounded  icon">task_alt</span>
            </div>

            <div>
              <data class="card-data" value="21">23</data>

              <p class="card-text">Total inscription</p>
            </div>

          </div>

          <div class="card task-card">

            <div class="card-icon icon-box blue">
              <span class="material-symbols-rounded  icon">notifications</span>
            </div>

            <div>
              <data class="card-data" value="21">00</data>

              <p class="card-text">Nouvel notification</p>
            </div>

          </div>

        </div>

        <div class="card revenue-card">

          <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
            <span class="material-symbols-rounded  icon">more_horiz</span>
          </button>

          <ul class="ctx-menu">

            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">edit</span>

                <span class="ctx-menu-text">Editer</span>
              </button>
            </li>

            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">cached</span>

                <span class="ctx-menu-text">Raffraichir</span>
              </button>
            </li>

          </ul>

          <p class="card-title">Recherche</p>

          <li>
           
          <span style="margin-left: 8px;">De</span>
          <input type="date" style="background-color:none ; padding-bottom: 15px; margin-bottom: 15px ; ">
        </li>
        <li>
          <span style="margin-left: 8px;">au</span>
          <input type="date" style="background-color:none ; border:1px solid dark; border-radius: 8px;">
        </li>
    </ul>

        </div>

      </section>




      <!-- 
        - #PROJECTS
      -->

      <section class="projects">

        <div class="section-title-wrapper">
          <h2 class="section-title">Autres acces disponibles</h2>

          <button class="btn btn-link icon-box">
            <span>Tout voir</span>

            <span class="material-symbols-rounded  icon" aria-hidden="true">arrow_forward</span>
          </button>
        </div>



        <ul class="project-list">


            @foreach($roles as $role)

          <li class="project-item">
            <div class="card project-card">

              <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
                <span class="material-symbols-rounded  icon">more_horiz</span>
              </button>

              <ul class="ctx-menu">

                <li class="ctx-item">
                  <button class="ctx-menu-btn icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">visibility</span>

                    <span class="ctx-menu-text">Voir</span>
                  </button>
                </li>

                <li class="ctx-item">
                  <button class="ctx-menu-btn icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">edit</span>

                    <span class="ctx-menu-text">Edit</span>
                  </button>
                </li>

                <li class="divider"></li>

                <li class="ctx-item">
                  <button class="ctx-menu-btn red icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">delete</span>

                    <span class="ctx-menu-text">Delete</span>
                  </button>
                </li>
              </ul>
              <p class="card-date" id="da"></p>
              <h3 class="card-title">
                <a href="#">{{ $role->libelle }}</a>
              </h3>
              <div class="card-badge blue">Dashboard</div>
              <div>
                <button class="btn btn-primary" data-load-more>
                  <span class="spiner"></span>
        
                  <span><a href="{{ $role->route == 'admin-conseil-pratique' ? route('tableau-de-bord-admin') : route($role->route) }}">Acceder</a></span>
                </button>
              </div>
          </li>
          @endforeach


        </ul>

      </section>




      <!-- 
        - #TASKS
    
      

      <section class="tasks">

        <div class="section-title-wrapper">
          <h2 class="section-title">Tasks</h2>

          <button class="btn btn-link icon-box">
            <span>View All</span>

            <span class="material-symbols-rounded  icon" aria-hidden="true">arrow_forward</span>
          </button>
        </div>

        <ul class="tasks-list">

          <li class="tasks-item">
            <div class="card task-card">

              <div class="card-input">
                <input type="checkbox" name="task-1" id="task-1">

                <label for="task-1" class="task-label">
                  Draft the new contract document for sales team
                </label>
              </div>

              <div class="card-badge cyan radius-pill">Today 10pm</div>

              <ul class="card-meta-list">

                <li>
                  <div class="meta-box icon-box">
                    <span class="material-symbols-rounded  icon">list</span>

                    <span>3/7</span>
                  </div>
                </li>

                <li>
                  <div class="meta-box icon-box">
                    <span class="material-symbols-rounded  icon">comment</span>

                    <data value="21">21</data>
                  </div>
                </li>

                <li>
                  <div class="card-badge red">High</div>
                </li>

              </ul>

            </div>
          </li>

          <li class="tasks-item">
            <div class="card task-card">

              <div class="card-input">
                <input type="checkbox" name="task-2" id="task-2">

                <label for="task-2" class="task-label">
                  iOS App home page design
                </label>
              </div>

              <div class="card-badge cyan radius-pill">Today 5pm</div>

              <ul class="card-meta-list">

                <li>
                  <div class="meta-box icon-box">
                    <span class="material-symbols-rounded  icon">list</span>

                    <span>10/11</span>
                  </div>
                </li>

                <li>
                  <div class="meta-box icon-box">
                    <span class="material-symbols-rounded  icon">comment</span>

                    <data value="5">5</data>
                  </div>
                </li>

                <li>
                  <div class="card-badge orange">Medium</div>
                </li>

              </ul>

            </div>
          </li>

          <li class="tasks-item">
            <div class="card task-card">

              <div class="card-input">
                <input type="checkbox" name="task-3" id="task-3">

                <label for="task-3" class="task-label">
                  Enable analytics tracking
                </label>
              </div>

              <div class="card-badge radius-pill">Tomorrow 5pm</div>

              <ul class="card-meta-list">

                <li>
                  <div class="meta-box icon-box">
                    <span class="material-symbols-rounded  icon">list</span>

                    <span>5/11</span>
                  </div>
                </li>

                <li>
                  <div class="meta-box icon-box">
                    <span class="material-symbols-rounded  icon">comment</span>

                    <data value="7">7</data>
                  </div>
                </li>

                <li>
                  <div class="card-badge orange">Medium</div>
                </li>

              </ul>

            </div>
          </li>

          <li class="tasks-item">
            <div class="card task-card">

              <div class="card-input">
                <input type="checkbox" name="task-4" id="task-4">

                <label for="task-4" class="task-label">
                  Kanban board design
                </label>
              </div>

              <div class="card-badge radius-pill">Sep 11, 3pm</div>

              <ul class="card-meta-list">

                <li>
                  <div class="meta-box icon-box">
                    <span class="material-symbols-rounded  icon">list</span>

                    <span>0/5</span>
                  </div>
                </li>

                <li>
                  <div class="meta-box icon-box">
                    <span class="material-symbols-rounded  icon">comment</span>

                    <data value="3">3</data>
                  </div>
                </li>

                <li>
                  <div class="card-badge green">Low</div>
                </li>

              </ul>

            </div>
          </li>

        </ul>

        <button class="btn btn-primary" data-load-more>
          <span class="spiner"></span>

          <span>Load More</span>
        </button>

      </section>

    </article>
  </main>
 -->




  <!-- 
    - #FOOTER
  -->

  <footer class="footer">
    <div class="container">

      <ul class="footer-list">

        <li class="footer-item">
          <a href="#" class="footer-link">Acceuil</a>
        </li>

        <!-- <li class="footer-item">
          <a href="#" class="footer-link"></a>
        </li>

        <li class="footer-item">
          <a href="#" class="footer-link"></a>
        </li> -->

        <li class="footer-item">
          <a href="#" class="footer-link">A propos de nous</a> 
        </li>

        <li class="footer-item">
          <a href="#" class="footer-link">Support</a>
        </li>

        <li class="footer-item">
          <a href="#" class="footer-link">Politique de confidentialité</a>
        </li>

      </ul>

      <p class="copyright">
        &copy; 2023 <a href="#" class="copyright-link">eCentre convivial</a>. All Rights Reserved
      </p>

    </div>
  </footer>





  <!-- 
    - custom js link
  -->

  <script>

    let time = document.getElementById ('da');
 
    let date = new Date();
    let year =date.getFullYear();
    let month = date.getMonth()+1;
    let jour = date.getDate();
 
    time.innerHTML= +jour +'-'+month+'-'+year;
   
 
   </script>
  <script>
    function menuToggle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
    }

    function drop(){
        const toggleMenu = document.querySelector('.drop');
        toggleMenu.classList.toggle('act')
    }
</script>
  <script src="resources/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js">

</script>

<script type="text/javascript" src="resources/js/chart.js"></script>
<script type="text/javascript" src="resources/js/sct.js"></script>


</body>

</html>









{{-- @extends("Template.mainTemplate")

@section('title', 'Tableau de bord administrateur')

@section('body')
    <style type="text/css">
        .widget-card-1 {
            height: 220px;
        }
    </style>
    
    <div class="container-scroller">
        @include("HeaderNav.adminNav")
    
        <div class="container-fluid page-body-wrapper">
            @include("Profile.adminSideProfil")
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @foreach($roles as $role)
                            <div class="col-md-6 col-xl-3">
                                <div class="card widget-card-1">
                                    <div class="card-block-small">
                                        {{-- <a href="{{route($role->route)}}"> --}}
                                        <a href="{{ $role->route == 'admin-conseil-pratique' ? route('tableau-de-bord-admin') : route($role->route) }}">
                                            <i class="icofont icofont-ui-home bg-c-blue card1-icon ">
                                                {{--<img src="images/icons/consultation.png" alt="No image" />
                                                <span class="mdi mdi-compass-outline menu-icon"></span>
                                            </i>
                                            <span class="text-c-blue f-w-600"></span>
                                            
                                            <h4></h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>
                                                    <h4>{{ $role->libelle }}</h4>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                @include("Footer.dashboardFooter")
            </div>
        </div>
    </div>
@endsection --}}
