







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

    <!-- google font link
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


   

    

      <main>

        

        <form  style="background: #ffffff; border-radius: 11px; padding: 20px; margin-left: 43px; margin-right: 43px ; margin-top: 40px;">
            <script src="https://cdn.tailwindcss.com"></script>
            <div class="mb-6">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Titre du message</label>
              <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
           
           

<div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
    <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
        <label for="comment" class="sr-only">Entrer le messageage </label>
        <textarea id="comment" rows="4" class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" ></textarea>
    </div>
    <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
        <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
            Envoyer
        </button>
        <div class="flex pl-0 space-x-1 sm:pl-2">
            <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Attach file</span>
            </button>
            <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Set location</span>
            </button>
            <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Upload image</span>
            </button>
        </div>
    </div>
</div>

<p class="ml-auto text-xs text-gray-500 dark:text-gray-400">Remember, Vous êtes sur le point d'envoyer un messager aux utilisateurs</p>

          </form>
        
      </main>

      <section id="content">



		<main>
           
           
              

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Tables des utilisateurs</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
                      
					</div>
					<table>
						<thead>
							<tr>
								<th>Code</th>
								<th>Username</th>
								<th>Téléphone</th>
								<th> Sexe</th>
                                <th>Age</th>
                                <th>Profession</th>
                                <th> Region</th>

								
						
								
							</tr>
						</thead>
						<tbody>

                             <style>
                                td {
                                    font-size: 13.5px;
                                    font-weight: 400;
                                }
                               
                              
                            </style> 
                            @foreach($users as $user)

                            <tr >
                                {{-- <td><<input type="checkbox" name="" id=""> <td> --}}
                                <td>{{$user->codeUser}}</td> 
                                <td>{{$user->username}}</td>
                                <td>{{$user->numero}}</td> 
                                <td>{{$user->sexe}}</td>
                                <td name="datenaissance" >{{$user->age}}</td>
                                <td>{{$user->profession}}</td>
                                <td>{{$user->region->libelle}}</td> 
                                <td><input type="checkbox" name="checkbox" id=""><td> 

                              

                              
                                {{-- <td></td> --}}
                                {{-- <td><p style="background-color: hsl(318, 99%, 70%); padding : 2px ; border-radius: 18px; color: #ffffff; text-align: center;"  >  Suprimer </p></td>  --}}


                                
                            </tr>
                        @endforeach

						</tbody>

					</table>
				</div>



                
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

@section('title', 'Envoi notification')

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
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-transform: none !important;">Formulaire</h4>
                                    
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
                                            <div class="alert alert-dange">
                                                <p>{{Session::pull('error')}} </p>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <form id="send-form" method="POST" action="{{ route('send-sms.store') }}">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                        
                                        <div id="users_container" style="display: none;"></div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label style="font-size: 15px;">Titre</label>
                                                
                                                <input type="text" name="titre" class="form-control form-control-sm" required />
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label style="font-size: 15px;">Texte</label>
                                                
                                                <textarea type="text" name="description" rows="4" class="form-control form-control-sm" required></textarea>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Envoyer</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" style="width: 100%;">
                                                <div class="input-field col">
                                                    <label class="mdi mdi-calendar" style="font-size: 15px;">Période</label>
                                                    
                                                    <input type="text" name="range" class="form-control form-control-sm" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class-"col-md-12">
                                            <table id="dt" class="table table-bordered display responsive nowrap" width="100%"></table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @include('Footer.dashboardFooter')
            </div>
        </div>
    </div>
@endsection

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
        $(document).ready(function() {
            const dt = $('#dt').DataTable({
                processing: true,
                serverSide: true,
                responsive: {
                    details: {
                        type: 'inline',
                        // target: 'tr',
                    }
                },
                deferRender: true,
                ajax: {
                    url: '{{ route("ajax.users.index") }}',
                    type: 'post',
                    data: function (data) {
                        for (var i = 0, len = data.columns.length; i < len; i++) {
                            if (!data.columns[i].search.value) delete data.columns[i].search;
                            
                            if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                            
                            if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                            
                            if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                            
                            const column = data.columns[i].data;
                            
                            if (column === 'created_at' || column === 'dateRegle' || column === 'dateProchainOvulation') {
                                data.columns[i].is_date = true;
                            }
                        }
                        
                        delete data.search.regex;
                        
                        data._token =  '{{ csrf_token() }}';
                        
                        const range = $('input[name="range"]').data('daterangepicker');
                        
                        if (range && range.startDate && range.endDate) {
                            data.range = `${range.startDate.format('YYYY-MM-DD')}@${range.endDate.format('YYYY-MM-DD')}`;
                        }
                    },
                    dataType: 'json',
                    beforeSend: function(jqXHR) {
                        jqXHR.headers = {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        };
                    },
                },
                columns: [
                    {
                        className: 'control',
                        data: null,
                        defaultContent: '',
                        orderable: false,
                        searchable: false,
                        targets: 0
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        title: '<input type="checkbox" class="form-control" id="selectAll" />',
                        render: function(data, type, row, meta) {
                            return `
                                <input type="checkbox" class="select" name="checkbox" value="${data.id}" data-id="${data.id}" />
                            `;
                        },
                        
                    },
                    {
                        data: 'codeUser',
                        title: 'Code',
                    },
                    {
                        data: 'username',
                        title: 'Username',
                    },
                    {
                        data: 'numero',
                        title: 'Téléphone',
                    },
                    {
                        data: 'sexe',
                        title: 'Sexe',
                    },
                    {
                        data: 'age',
                        name: 'datenaissance',
                        title: 'Age',
                    },
                    {
                        data: 'profession',
                        title: 'Profession',
                    },
                    {
                        data: 'region.libelle',
                        title: 'Région',
                        orderable: false,
                        searchable: false,
                    },
                ],
                dom: "<'row'<'col-md-12'f>><'row'<'col-sm-12'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                order: [[0, 'desc']],
	            buttons: {
	                buttons: [
    	                {
                            className: 'btn btn-light',
                            text: function (dt) {
                                return '<i class="fa fa-refresh"></i> Recharger';
                            },
                            action: function (e, dt, button, config) {
                                dt.draw(false);
                            }
                        }
    	            ]
	            },
                iDisplayLength: -1,
	            lengthMenu: [[-1], ['Tout']],	
            });
            
            $('input[name="range"]').daterangepicker({
                showDropdowns: true,
                startDate: moment().startOf('month'),
                endDate: moment().endOf('month'),
                locale: {
                    format: "MM/DD/YYYY",
                    "applyLabel": "Appliquer",
                    "cancelLabel": "Annuler",
                },
            }, function(start, end, label) {
                if (start && end) {
                    dt.draw();
                }
            });
            
            $('#selectAll').on('change', function() {
                $(':checkbox.select').prop('checked', $(this).is(':checked'));
            });
            
            $('#send-form').submit(function() {
                $.each($('.select:checked'), function(i, checkbox) {
                    const value = $(checkbox).val();
                    
                    $('#send-form').append(`<input type="hidden" name="users[]" value="${value}">`)
                });
                
                $(this).find(':submit').attr('disabled', 'disabled');
                
                return true;
            });
        });
    </script>
@endsection --}}