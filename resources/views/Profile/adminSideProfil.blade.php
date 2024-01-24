<div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
    
    @if(count(Auth::user()->unreadNotifications) > 0)
        <div id="settings-trigger" style="margin-bottom: 60px; background: #ff0a18;"><i class="mdi mdi-bell-outline"></i>
            <span class="count" style="margin-top: -8px;margin-left: 3px;color: white;font-weight: bold;font-size: 12px;">{{count(Auth::user()->unreadNotifications) }}</span>
        </div>
    @endif
    
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        
        <p class="settings-heading">Paramétrage couleur</p>
        
        <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
        
        <p class="settings-heading mt-2">Choisir votre couleur</p>
        <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles pink"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
        </div>
    </div>
</div>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                <span class="nav-profile-image">
                    <img src="{{ $utilisateur->profil ?: 'images/profil/profil.png'}}" alt="profile" >

                    <span class="login-status online"></span>
                </span>
            </a>
        
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="{{ route('admin-profil') }}">
                    Mon compte
                </a>
                <a class="dropdown-item" href="{{ route('logOut') }}">
                    Déconnexion
                </a>
            </div>
        </li>
        
        <li class="nav-item">
            <a class="nav-link">
                <span class="menu-title">{{ auth()->user()->typeuser->libelle .' : '. auth()->user()->username }}</span>
            </a>
        </li>
        
        <!--utilisateurs-->
        @if(Auth::user()->hasAccess("SA"))
            <li class="nav-item nav-category">
                <span class="nav-link" style="font-size: medium; color: #79da60;">Utilisateurs</span>
            </li>
            
            <li class="nav-item @if($page == 'liste-user') active @endif ">
                <a class="nav-link" href="{{route('afficher-liste-utilisateur')}}">Liste des utilisateurs</a>
            </li>
            
            <li class="nav-item @if($page == 'send-sms') active @endif ">
                <a class="nav-link" href="{{ route('send-sms.index') }}">Envoyer une notification</a>
            </li>
        
            <li class="nav-item nav-category">
                <span class="nav-link"></span>
            </li>
        @endif

          <!-- rapport-->
          <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Rapports</span>
        </li>
        
        <li class="nav-item">
            <a class="nav-link @if($page == 'suivre-user') active @endif" href="{{route('suivre-teleconseiller')}}">
                <span class="menu-title">Liste des rapports</span>
            </a>
        </li>


          <!--ANALYSE-->
          <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Analyse des Données :</span>
        </li>
        
        <li class="nav-item @if($page == 'suivi-grossesse') active @endif ">
            <a class="nav-link" href="">Utilisateurs</a>
        </li>
        
        <li class="nav-item @if($page == 'annuler-grossesse') active @endif ">
            <a class="nav-link" href="">Consultations IST</a>
        </li>

        <li class="nav-item @if($page == 'annuler-grossesse') active @endif ">
            <a class="nav-link" href="">Suivi des règles
               </a>
        </li>

        <li class="nav-item @if($page == 'annuler-grossesse') active @endif ">
            <a class="nav-link" href=""> Assistance en ligne
                </a>
        </li>

        <li class="nav-item @if($page == 'annuler-grossesse') active @endif ">
            <a class="nav-link" href="">Résultats Quiz
                </a>
        </li>

        <li class="nav-item @if($page == 'annuler-grossesse') active @endif ">
            <a class="nav-link" href="">Auto Test COVID-19</a>
        </li>
        
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>


        
        @if(Auth::user()->hasAccess("FS"))
            <!--formation sanitaire-->
            <li class="nav-item nav-category">
                <span class="nav-link" style="font-size: medium; color: #79da60;">Formation sanitaire</span>
            </li>
            
            <li class="nav-item @if($page == 'demande-consultation') active @endif">
                <a class="nav-link" href="{{route('liste-demande-consultation-formation')}}">Demandes de consultations</a>
            </li>
            
            <li class="nav-item @if($page == 'consultation-effectuee') active @endif">
                <a class="nav-link" href="{{route('liste-consultation-effectuee-formation')}}">Consultations effectuées</a>
            </li>
            
            <li class="nav-item @if($page == 'consultation-resultat') active @endif">
                <a class="nav-link" href="{{route('liste-resultat-consultation-formation')}}">Résultats consultations</a>
            </li>
    
            <li class="nav-item @if($page == 'formation-sanitaire') active @endif ">
                <a class="nav-link" href="{{route('formation-sanitaire')}}">Créer une formation sanitaire</a>
            </li>
            
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link" href="{{route('liste-region')}}">Créer une région</a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" href="{{route('liste-ville')}}">Créer une ville</a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" href="{{route('liste-quartier')}}">Créer un quartier</a>
            </li>
            
            <li class="nav-item @if($page == 'objet-consultation') active @endif ">
                <a class="nav-link" href="{{route('objet-consultation')}}">
                    <span class="menu-title">Objet de consultation</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('liste-rapport-consultation-formation')}}">
                    <span class="menu-title">Rapports des consultations</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('historique-facturation-des-consultations')}}">
                    <span class="menu-title">Rapports des facturation</span>
                </a>
            </li> 
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('liste-medicament')}}">
                    <span class="menu-title">Liste des médicaments</span>
                </a>
            </li> 
        @endif
        
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        
        <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Assistance en ligne</span>
        </li>
        
        <li class="nav-item">
            <a class="nav-link @if($page == 'suivre-user') active @endif" href="{{route('suivre-teleconseiller')}}">
                <span class="menu-title">Liste des téléconseillers</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link @if($page == 'suivre-conseiller') active @endif" href="{{route('suivre-user-assister')}}">
                <span class="menu-title">Utilisateurs assistés</span>
            </a>
        </li>
        
       <li class="nav-item">
            <a class="nav-link @if($page == 'gestion-presence-teleconseiller') active @endif" href="{{route('gestion-presence-tele-conseiller')}}">
                <span class="menu-title">Présence des téléconseillers</span>
            </a>
        </li>
        
       <li class="nav-item">
            <a class="nav-link" href="{{route('liste-teleconseiller')}}">
                <span class="menu-title">Enrégistrement des téléconseillers</span>
            </a>
        </li>
		
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>


      
        
        <!--Cycle menstruel-->
        <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Cycle menstruel</span>
        </li>
		
		<li class="nav-item @if($page == 'demande-suivi-regle') active @endif ">
            <a class="nav-link" href="{{route('demande-suivi-regle-admin')}}">Souscription au suivi des règles</a>
        </li>
        
        <li class="nav-item @if($page == 'suivi-regle') active @endif ">
            <a class="nav-link" href="{{route('suivi-regle-admin')}}">Liste demande Suivi des règles</a>
        </li>
        
        <li class="nav-item @if($page == 'suivi-ovulation') active @endif ">
            <a class="nav-link" href="{{route('suivi-ovulation-admin')}}">Liste demande Suivi de l'ovulation</a>
        </li>
        
        <li class="nav-item @if($page == 'annuler-menstru') active @endif ">
            <a class="nav-link" href="{{route('annulation-suivi-menstruation')}}">Annulation de suivi</a>
        </li>
        
        <li class="nav-item @if($page == 'rapport-alerte') active @endif ">
            <a class="nav-link" href="{{route('liste-rapport-alerte-sms')}}">
                <span class="menu-title">Rapports SMS</span>
            </a>
        </li>
		
        <li class="nav-item">
            <a class="nav-link" href="{{route('liste-rapport-alerte-sms-manuel')}}">
                <span class="menu-title">Rapports SMS Manuel</span>
            </a>
        </li>
        
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        
        <!--Suivi de grossesse-->
        <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Suivi de grossesse</span>
        </li>
        
        <li class="nav-item @if($page == 'suivi-grossesse') active @endif ">
            <a class="nav-link" href="{{route('suivre-grossesse-admin')}}">Souscriptions au suivi</a>
        </li>
        
        <li class="nav-item @if($page == 'annuler-grossesse') active @endif ">
            <a class="nav-link" href="{{route('annulation-suivi-grossesse')}}">Annulation de suivi</a>
        </li>
        
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        
        <!--Conseils pratiques-->
        <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Conseils pratiques</span>
        </li>
        
        <li class="nav-item @if($page == 'conseil') active @endif ">
            <a class="nav-link" href="{{ route('admin-conseil-pratique') }}">
                <span class="menu-title">Liste des conseils</span>
            </a>
        </li>
        
        <li class="nav-item @if($page == 'conseil-pratique-covid-19') active @endif ">
            <a class="nav-link" href="{{ route('conseils-pratiques-covid-19.index') }}">
                <span class="menu-title">COVID-19</span>
            </a>
        </li>
        
        <li class="nav-item">
            <!--<a class="nav-link" href="https://testogo.econvivial.org/?user={{ auth()->user()->id }}" target="_blank">-->
            <a class="nav-link" href="{{ route('auto-test.vostest') }}" target="_blank">
                <span class="menu-title">Auto test</span>
            </a>
        </li>
        
        <li class="nav-item @if($page == 'auto-test-result') active @endif ">
            <a class="nav-link" href="{{ route('auto-test-result') }}">
                <span class="menu-title">Resultats auto test</span>
            </a>
        </li>
        
        <li class="nav-item @if($page == 'covid-19-case-location') active @endif ">
            <a class="nav-link" href="{{ route('covid-19-case-location.index') }}">
                <span class="menu-title">Geolocalisation des cas du COVID-19</span>
            </a>
        </li>
        
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        
        @if(Auth::user()->hasAccess("SA"))
            <!--Creation admin-->
            <li class="nav-item nav-category">
                <span class="nav-link" style="font-size: medium; color: #79da60;">Création admin</span>
            </li>
            
            <li class="nav-item @if($page == 'gestion-admin') active @endif ">
                <a class="nav-link" href="{{route('gestion-admin')}}">Super admin</a>
            </li>
            
            <li class="nav-item @if($page == 'gestion-admin-teleconseiller') active @endif ">
                <a class="nav-link" href="{{route('gestion-tele-conseiller')}}">Admin téléconseiller</a>
            </li>
            
            <li class="nav-item @if($page == 'gestion-admin-formation') active @endif ">
                <a class="nav-link" href="{{route('gestion-formation-sanitaire')}}">Admin formation sanitaire</a>
            </li>
            
            <!--<li class="nav-item @if($page == 'gestion-presence-teleconseiller') active @endif ">-->
            <!--    <a class="nav-link" href="{{route('gestion-presence-tele-conseiller')}}">Présence téléconseiller</a>-->
            <!--</li>-->
            
            <li class="nav-item @if($page == 'gestion-innov') active @endif ">
                <a class="nav-link" href="{{route('gestion-innov')}}">Admin InnovHealth</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link @if($page == 'result-quiz') active @endif" href="{{ route('liste-admin') }}">
                    <span class="menu-title">Affecter role</span>
                </a>
            </li>
            
            <li class="nav-item nav-category">
                <span class="nav-link"></span>
            </li>
        @endif
        
        <!--Gestion des PE-->
        <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Gestion des PE</span>
        </li>
        
		<li class="nav-item @if($page == 'consulter-entretiens') active @endif ">
                <a class="nav-link" href="{{ route('entretiens-participants') }}">Données des PE</a>
        </li>
            
        <li class="nav-item @if($page == 'compte-pe') active @endif">
            <a class="nav-link" href="{{route('gestion-compte-pe')}}">PE scolaire</a>
        </li>
        
        <li class="nav-item @if($page == 'pe-univ') active @endif">
            <a class="nav-link" href="{{route('pe-universite-page')}}">PE universitaire</a>
        </li>
        
        <li class="nav-item @if($page == 'compte-superviseur') active @endif">
            <a class="nav-link" href="{{route('gestion-compte-superviseur')}}">Sup scolaire</a>
        </li>
        
        <li class="nav-item @if($page == 'sup-univ') active @endif">
            <a class="nav-link" href="{{route('superviseur-universite')}}">Sup Universitaire</a>
        </li>
        
        <li class="nav-item @if($page == 'compte-encadreur-association') active @endif">
            <a class="nav-link" href="{{route('gestion-encadreur-association')}}">M&E ONG</a>
        </li>
        
        <li class="nav-item @if($page == 'compte-encadreur-regionaux') active @endif">
            <a class="nav-link" href="{{route('gestion-encadreur-regionaux')}}">M&E Régional</a>
        </li>
        
        <li class="nav-item @if($page == 'suivi-pair-educateur') active @endif">
            <a class="nav-link" href="{{route('suivi-pair-educateur')}}">Suivi PE</a>
        </li>
        
        <li class="nav-item @if($page == 'suivi-superviseur') active @endif">
            <a class="nav-link" href="{{route('suivi-pair-superviseur')}}">Suivi Superviseurs</a>
        </li>
        
        <li class="nav-item @if($page == 'suivi-admin-ong') active @endif">
            <a class="nav-link" href="{{route('suivi-admin-ong')}}">Suivi M&E ONG</a>
        </li>
        
        <li class="nav-item @if($page == 'suivi-admin-regionaux') active @endif">
            <a class="nav-link" href="{{route('suivi-admin-regionaux')}}">Suivi M&E Régionaux</a>
        </li>
        
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        
        <!--Gestion des PE-->
        <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Planning famillial</span>
        </li>

        <li class="nav-item">
            <a class="nav-link @if($page == 'result-quiz') active @endif" href="{{route('add-planning-famillial-moderne')}}">
                <!--<i class="mdi mdi-compass-outline menu-icon"></i>-->
                <span class="menu-title">Ajouter une méthode moderne</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if($page == 'result-quiz') active @endif" href="{{route('add-planning-famillial-naturelle')}}">
                <!--<i class="mdi mdi-compass-outline menu-icon"></i>-->
                <span class="menu-title">Ajouter une méthode naturelle</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if($page == 'planning-souscription') active @endif" href="{{route('souscription-planning')}}">
                <!--<i class="mdi mdi-compass-outline menu-icon"></i>-->
                <span class="menu-title">Souscriptions aux PF</span>
            </a>
        </li>
		
		<li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        
        <!--Gestion des PE-->
		@if(Auth::user()->hasAccess("AEC"))
        <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Activitées eConvivial</span>
        </li>

        <li class="nav-item">
            <a class="nav-link @if($page == 'activites') active @endif" href="{{route('admin-activite-econvivial')}}">
                <!--<i class="mdi mdi-compass-outline menu-icon"></i>-->
                <span class="menu-title">gestion des activités</span>
            </a>
        </li>
		@endif
		
		<li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
       
		{{-- <li class="nav-item nav-category">
            <span class="nav-link" style="font-size: medium; color: #79da60;">Services</span>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <i class="mdi mdi-arrow-expand-all menu-icon"></i>
                <span class="menu-title">Consultations IST</span>
                    <i class="menu-arrow"></i>                            
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('do-consultation-admin')}}">Faire une consultation</a></li>
                    <li class="nav-item "> <a class="nav-link" href="{{route('mes-consultations-en-attentes')}}">Consultations effectuées</a></li>
                    <li class="nav-item "> <a class="nav-link" href="{{route('mes-resultats-consultations')}}">Résultats de consultations</a></li>
                    
                </ul>
            </div>
        </li> --}}
        
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        
        @if(Auth::user()->hasAccess("QZ"))
            <li class="nav-item nav-category">
        		<span class="nav-link" style="font-size: medium; color: #79da60;">Quiz</span>
        	</li>
        	
        	<li class="nav-item">
        		<a class="nav-link @if($page == 'result-quiz') active @endif" href="{{ route('quiz-admin-page') }}">
        			<!--<i class="mdi mdi-compass-outline menu-icon"></i>-->
        			<span class="menu-title">Résultat de Quiz</span>
        		</a>
        	</li>
        
        	<li class="nav-item">
        		<a class="nav-link @if($page == 'new-quiz-module') active @endif" href="{{ route('add-new-quiz') }}">
        			<!--<i class="mdi mdi-compass-outline menu-icon"></i>-->
        			<span class="menu-title">Composer un QUIZ</span>
        		</a>
        	</li>
        @endif
        
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        
        @if(Auth::user()->hasAccess("WS"))
            <li class="nav-item nav-category">
                <span class="nav-link" style="font-size: medium; color: #79da60;">Web Série</span>
            </li>
    
            <li class="nav-item">
            {{--<li class="nav-item @if($page == 'web-serie') active @endif"> <a class="nav-link" href="{{route('web-serie')}}">Web Séries</a></li>--}}
                <a class="nav-link @if($page == 'web-serie') active @endif" href="{{route('web-serie')}}">
                    <!--<i class="mdi mdi-compass-outline menu-icon"></i>-->
                    <span class="menu-title">Web Séries</span>
                </a>
            </li>
            
              <li class="nav-item">
                {{--<li class="nav-item @if($page == 'web-serie') active @endif"> <a class="nav-link" href="{{route('web-serie')}}">Web Séries</a></li>--}}
                <a class="nav-link @if($page == 'web-serie-dash') active @endif" href="{{route('web-serie-dashboard')}}">
                    <!--<i class="mdi mdi-compass-outline menu-icon"></i>-->
                    <span class="menu-title">Web Séries dashboard user</span>
                </a>
            </li>
        @endif
        
        @if(Auth::user()->hasAccess("PM"))
            <li class="nav-item nav-category">
                <span class="nav-link" style="font-size: medium; color: #79da60;">Paramétrage</span>
            </li>
    
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#parametrage" aria-expanded="false" aria-controls="page-layouts">
                    <i class="mdi mdi-arrow-expand-all menu-icon"></i>
                    <span class="menu-title">Paramétrage système</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="parametrage">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item @if($page == 'etablissement') active @endif"> <a class="nav-link" href="{{route('gestion-etablissement')}}">Etablissement scolaire</a></li>
                        <li class="nav-item @if($page == 'association') active @endif"> <a class="nav-link" href="{{route('gestion-association')}}">Association/ONG</a></li>
                        <li class="nav-item @if($page == 'type-entretien') active @endif"> <a class="nav-link" href="{{route('gestion-type-entretien')}}">Type Entretien</a></li>
                        <li class="nav-item @if($page == 'contenu-entretien') active @endif"> <a class="nav-link" href="{{route('gestion-contenu-entretien')}}">Contenu entretien</a></li>
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>