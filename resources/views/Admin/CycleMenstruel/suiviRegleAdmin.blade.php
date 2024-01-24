




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
                              <a href="{{ route('logOut') }}">Deconnexion</a>
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
        <article class=" article center ">

            <form  action="{{route('postSuiviRegleTeleconseiller')}}" method="POST" style="background: #ffffff; border-radius: 11px; padding: 20px; margin-left: 43px; margin-right: 43px ; margin-top: 40px;">
                <script src="https://cdn.tailwindcss.com"></script>
        
                <div>
                    <p>Suivi des règles </p>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <script src="https://cdn.tailwindcss.com"></script>
        
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  name="nom" placeholder="Nom du demandeur" >
                    </div>
                    <div>
                        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Télephone</label>
                        <input type="text" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  name="numero" placeholder="N° de téléphone"  required  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                    </div>  
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date de votre dernière règle</label>
                        <input type="date" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="dateRegle" placeholder="Date de dernière règle" required>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Durée de votre cycle </label>
                        <select id="edit-dureeCycle" name="dureeCycle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <option disabled selected>Sélectionner la durée de votre cycle</option>
                            @for($i =21; $i <= 40 ; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                   
                </div>
               
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Suivre règle
                    <input type="hidden" name="_token" value="{{Session::token()}}" />
                </button>
            </form>
          
    
        </article>

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
						<h3>Table des suivis de règle</h3>
						<i class='bx bx-search' ></i>
						<i ><div class="  card profile-card" ><button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
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
                
                          </ul></div></i>
                      
					</div>
					<table>
						<thead>
							<tr>
                                <th>Date de votre dernière règle</th>
                                                    <th>Durée de votre cycle</th>
                                                    <th>Date probable de votre prochaine règle</th>
                                                    <th>Username</th>
                                                    <th>N° Téléphone</th>
                               
							</tr>
						</thead>



                        
						<tbody>

                            <style>
                                td {
                                    font-size: 15.5px;
                                    font-weight: 400;
                                }
                               
                              
                            </style>
                           @foreach($menstruations as $menstruation)
                           <tr>
                               <td>{{date_format(date_create($menstruation->dateRegle),"d M Y") }}</td>
                               <td><b>{{$menstruation->dureeCycle}}</b></td>
                               <td><b>{{date_format(date_create($menstruation->dateProchainRegle),"d M Y")}}</b></td>
                               <!--<td>
                               <button class="btn btn-outline-danger delete-modal" data-id = "{{$menstruation->id}}">Annuler</button>
                               </td>-->
                               <td>
                               @foreach($users as $user)
                                   <b>@if($menstruation->tele_id == $user->id)
                                       {{$user->username}}
                                       @endif
                                   </b>
                               @endforeach
                               </td>
                               <td>
                               @foreach($users as $user)
                                   <b>@if($menstruation->tele_id == $user->id)
                                       {{$user->numero}}
                                       @endif
                                   </b>
                               @endforeach
                               </td>
                           </tr>
                       @endforeach

                              
                            
                           
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

<script type="text/javascript" src="resources/js/chart.js"></script>
<script type="text/javascript" src="resources/js/sct.js"></script>





</body>

</html>





{{-- @extends('Template.otherTemplate')

@section('title', 'Souscriptions au suivi d\'ovulation')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.4/css/autoFill.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.1/css/keyTable.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .dataTables_length select {
            padding 0px 20px !important;
        }
    </style>
@endsection

@section('body')
    <div class="container-scroller">
        @include('HeaderNav.adminNav')
        
        <div class="container-fluid page-body-wrapper">
            @include('Profile.adminSideProfil')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <fieldset>
                                                <legend><h3>Suivi des règles</h3></legend>
                                                
                                                <form class="form form-horizontal" action="{{route('postSuiviRegleTeleconseiller')}}" method="POST">

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

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Username</label>
                                                                <div class="col-sm-8">
                                                                    <input type="texte" required class="form-control" name="nom" placeholder="Nom du demandeur" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">N° téléphone</label>
                                                                <div class="col-sm-8">
                                                                <input type="text" class="form-control bfh-phone" id="telephone" name="numero"  required data-country="TG" placeholder="Numéro de téléphone" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Date de votre dernière règle</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" required class="form-control" name="dateRegle" placeholder="Date de dernière règle" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Durée de votre cycle</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" name="dureeCycle" required>
                                                                        <option disabled selected>Sélectionner la durée de votre cycle</option>
                                                                        @for($i =21; $i <= 40 ; $i++)
                                                                            <option value="{{$i}}">{{$i}}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="form-group justify-content-center">
                                                            <div class="col-sm-6 " >
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Suivre règle</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                    
                                            </fieldset>

                                            <table  class="table table-bordered  table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date de votre dernière règle</th>
                                                    <th>Durée de votre cycle</th>
                                                    <th>Date probable de votre prochaine règle</th>
                                                    <th>Username</th>
                                                    <th>N° Téléphone</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($menstruations as $menstruation)
                                                    <tr>
                                                        <td>{{date_format(date_create($menstruation->dateRegle),"d M Y") }}</td>
                                                        <td><b>{{$menstruation->dureeCycle}}</b></td>
                                                        <td><b>{{date_format(date_create($menstruation->dateProchainRegle),"d M Y")}}</b></td>
                                                        <!--<td>
                                                        <button class="btn btn-outline-danger delete-modal" data-id = "{{$menstruation->id}}">Annuler</button>
                                                        </td>-->
                                                        <td>
                                                        @foreach($users as $user)
                                                            <b>@if($menstruation->tele_id == $user->id)
                                                                {{$user->username}}
                                                                @endif
                                                            </b>
                                                        @endforeach
                                                        </td>
                                                        <td>
                                                        @foreach($users as $user)
                                                            <b>@if($menstruation->tele_id == $user->id)
                                                                {{$user->numero}}
                                                                @endif
                                                            </b>
                                                        @endforeach
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('postEditSuiviRegle')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Modification de suivi de votre règle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date de votre dernière règle</label>
                                    <div class="col-sm-8">
                                        <input type="date" required class="form-control" id="edit-dateRegle" name="dateRegle" placeholder="Date de dernière règle" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Durée de votre cycle</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="edit-dureeCycle" name="dureeCycle" required>
                                            <option disabled selected>Sélectionner la durée de votre cycle</option>
                                            @for($i =21; $i <= 40 ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="edit-id" name="id" />
                        <input type="hidden"  name="_token" value="{{Session::token()}}" />
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success" >Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- container-scroller -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 60%;">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('postDeleteSuiviRegle')}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Annulation de suivi de règle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <h5 style="color: red;text-align: center;">Pour quelle raison voulez-vous annuler votre souscription au suivi de règle ?</h5>
                      <br/>  <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Votre explication</label>
                                <div class="col-sm-8">
                            <textarea class="form-control" rows="4" name="description" required placeholder="Expliquez pourquoi vous voulez annuler votre souscription au suivi de règle ..."></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id" name="id" />
                    <input type="hidden"  name="_token" value="{{Session::token()}}" />
                    <button type="submit" class="btn btn-danger">Envoyer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.4/js/dataTables.autoFill.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.4/js/autoFill.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.1/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
	
<script>
    $(document).ready(function(){
        @if(Session::get("suivi-regle") == true)
        showSwal('success-message');
        $(".swal-title").html("Information");
        $(".swal-text").html("<b>{{Session::pull("regle-message")}}</b>");
        $(".swal-button").text("Ok");
        {{Session::put("suivi-regle", false)}}
        @endif

        @if(Session::get("suivi-regle-annuler") == true)
        showSwal('success-message');
        $(".swal-title").html("Information");
        $(".swal-text").html("<b>Suivi de règle annulé. Vous ne recevrez plus de notifications pour un bon suivi" +
            " de vos règles</b>");
        $(".swal-button").text("Ok");
        {{Session::put("suivi-regle-annuler", false)}}
        @endif
    });

    $('.edit-modal').on("click", function () {
      //  alert($(this).data("dateregle"));
        $("#edit-id").val($(this).data("id"));
        $("#edit-dateRegle").val($(this).data("dateregle"));
        $("#edit-dureeCycle").val($(this).data("dureecycle"));
        $("#editModal").modal("show");
    });

    $(".delete-modal").on("click", function (event) {
        event.preventDefault();
        $("#id").val($(this).data("id"));
        $("#deleteModal").modal("show");
    });
</script>
@endsection --}}