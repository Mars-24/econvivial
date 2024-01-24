












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
  {{-- <link rel="stylesheet" href="./assets/css/style.css"> --}}
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
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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

      <p class="article-subtitle">Souscriptions au suivi de cycle menstruel annulées</p>

       
      
      

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

                <span class="ctx-menu-text">Raffraichir</span>
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
              <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->username }}" alt="Elizabeth Foster" width="48" height="48">
            </figure>

            <div>
              <p class="card-title"> {{  auth()->user()->username }} </p>
                

              <p class="card-subtitle">Profession</p>
            </div>

          </div>

          <ul class="contact-list">

            <li>
              <a href="mailto:xyz@mail.com" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">mail</span>

                <p class="text"> {{  auth()->user()->email }}</p>
              </a>
            </li>

            <li>
              <a href="tel:00123456789" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">call</span>

                <p class="text"> {{  auth()->user()->numero }}</p>
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
              </div>  -->

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
              <data class="card-data" value="21">6</data>

              <p class="card-text">Total annulés</p>
            </div>

          </div>

          <div class="card task-card">

            <div class="card-icon icon-box blue">
              <span class="material-symbols-rounded  icon">notifications</span>
            </div>

            <div>
              <data class="card-data" value="21">0</data>
            
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

          <p class="card-title">Période</p>
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

      <section id="content">
		<!-- NAVBAR -->
		<!-- <nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav> -->
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<!-- <div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumg">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div> -->
<!-- 
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Total inscriptioin</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Solde Total</p>
					</span>
				</li>
			</ul> -->

            <!-- <div  class="table-data">  
                <div class="order">
                    <div class="head">
                        <h3> Liste des utilisateurs </h3>
                        <i class='bx bx-search' ></i>
                        <i class='bx bx-filter' ></i>
                    </div>
                </div>
               
            </div> -->


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Table de suivi de cycles menstruels annulées</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
                      
					</div>
					<table>
						<thead>
							<tr>
                                <th>Date annulation</th>
                                                    <th>Nom utilisateur</th>
                                                    <th>Email</th>
                                                    <th>N° Téléphone</th>
                                                    <th>Motif</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
								
							</tr>
						</thead>



                        
						<tbody>

                            @foreach($annulations as $annulation)
                            <tr >
                                <td>{{date_format(date_create($annulation->created_at),"d M Y")}}</td>
                                <td>{{\App\User::where("id", $annulation->user_id)->first()->username}}</td>
                                <td>{{\App\User::where("id", $annulation->user_id)->first()->email}}</td>
                                <td>(+228) {{\App\User::where("id", $annulation->user_id)->first()->numero}}</td>
                                <td>{{$annulation->motif}}</td>
                                <td>{{$annulation->suivi}}</td>
                                <td>
                                    <label class="badge badge-danger badge-pill">Souscription annulée</label>
                                </td>
                            </tr>
                        @endforeach

                            
                           
							{{-- <tr>



                                <td><p style="background-color: blue; padding : 2px ; border-radius: 18px; color: white; text-align: center;"  >  Modifier </p></td>
                                <td><p style="background-color: hsl(318, 99%, 70%); padding : 2px ; border-radius: 18px; color: #ffffff; text-align: center;"  >  Suprimer </p></td>

							</tr> --}}

						</tbody>
                        
					</table>
				</div>



                
				<!-- <div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div> -->
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->



  <!-- 
    - #FOOTER
  -->

  <footer class="footer" style="background:white;">
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
        &copy; 2022 <a href="#" class="copyright-link">eCentre convivial</a>. All Rights Reserved
      </p>

    </div>
  </footer>





  <!-- 
    - custom js link
  -->

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
{{-- <script src="./assets/js/chart.js"></script> --}}

<script type="text/javascript" src="resources/js/chart.js"></script>
<script type="text/javascript" src="resources/js/sct.js"></script>


{{-- <link href="{{ asset('resources/css/.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/dashboard.css" /> --}}

{{-- <script src="./assets/js/sct.js"></script> --}}
</body>

</html>


















{{-- @extends("Template.otherTemplate")


@section("title")
    Souscriptions au suivi du cycle menstruel annulées
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Souscriptions au suivi de cycle menstruel annulées</h4>
                                    <div class="row">
                                        <div class="col-sm-12">

                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if(Session::has('message'))
                                                <div class="form-group">
                                                    <div class="alert alert-success">
                                                        <p>{{Session::pull('message')}} </p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(Session::has('error'))
                                                <div class="form-group">
                                                    <div class="alert alert-danger">
                                                        <p>{{Session::pull('error')}} </p>
                                                    </div>
                                                </div>
                                            @endif


                                            <table id="table" class="table table-bordered table-condensed table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date annulation</th>
                                                    <th>Nom utilisateur</th>
                                                    <th>Email</th>
                                                    <th>N° Téléphone</th>
                                                    <th>Motif</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($annulations as $annulation)
                                                    <tr >
                                                        <td><b>{{date_format(date_create($annulation->created_at),"d M Y")}}</b></td>
                                                        <td><b>{{\App\User::where("id", $annulation->user_id)->first()->username}}</b></td>
                                                        <td><b>{{\App\User::where("id", $annulation->user_id)->first()->email}}</b></td>
                                                        <td><b>(+228) {{\App\User::where("id", $annulation->user_id)->first()->numero}}</b></td>
                                                        <td><b>{{$annulation->motif}}</b></td>
                                                        <td><b style="text-transform: uppercase;">{{$annulation->suivi}}</b></td>
                                                        <td>
                                                            <label class="badge badge-danger badge-pill">Souscription annulée</label>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
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

@endsection --}}







{{-- @extends("Template.otherTemplate")


@section("title")
    Souscriptions au suivi de grossesse annulées
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Souscriptions au suivi de grossesse annulées</h4>
                                    <div class="row">
                                        <div class="col-sm-12">

                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if(Session::has('message'))
                                                <div class="form-group">
                                                    <div class="alert alert-success">
                                                        <p>{{Session::pull('message')}} </p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(Session::has('error'))
                                                <div class="form-group">
                                                    <div class="alert alert-danger">
                                                        <p>{{Session::pull('error')}} </p>
                                                    </div>
                                                </div>
                                            @endif


                                            <table id="table" class="table table-bordered table-condensed table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date annulation</th>
                                                    <th>Nom utilisateur</th>
                                                    <th>Email</th>
                                                    <th>N° Téléphone</th>
                                                    <th>Motif</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($annulations as $annulation)
                                                    <tr >
                                                        <td><b>{{date_format(date_create($annulation->created_at),"d M Y")}}</b></td>
                                                        <td><b>{{\App\User::where("id", $annulation->user_id)->first()->username}}</b></td>
                                                        <td><b>{{\App\User::where("id", $annulation->user_id)->first()->email}}</b></td>
                                                        <td><b>(+228) {{\App\User::where("id", $annulation->user_id)->first()->numero}}</b></td>
                                                        <td><b>{{$annulation->motif}}</b></td>
                                                        <td>
                                                            <label class="badge badge-danger badge-pill">Souscription annulée</label>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
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

@endsection --}}