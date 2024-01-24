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

<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
        <span class="nav-profile-image">
          <img @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="profile" >
          <span class="login-status online"></span> <!--change to offline or busy as needed-->
        </span>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="{{route('teleconseiller-profil')}}">
                    Mon compte
                </a>
                <a class="dropdown-item" href="{{route('logOut')}}">
                    Déconnexion
                </a>
            </div>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Assistance en ligne</span>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{route('espacemembre-assistance-en-ligne')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">

                    @if($utilisateur->professionconseiller != null)

                        @if($utilisateur->professionconseiller->libelle == "Médecin")
                            Médecin
                            @elseif($utilisateur->professionconseiller->libelle == "Gynecologue")
                            Gynecologue
                            @elseif($utilisateur->professionconseiller->libelle == "Sage femme")
                            Sage femme
                            @elseif($utilisateur->professionconseiller->libelle == "Conseiller")
                            Conseiller
                            @endif
                        @endif
                </span>
            </a>
        </li>
        @if($utilisateur->professionconseiller->libelle == "Gynecologu")
        <li class="nav-item @if($page == "assistance-teleconseiller") active @endif">
            <a class="nav-link" href="{{route('assistance-en-ligne-teleconseiller')}}?ref={{\App\User::where("profession_conseiller_id", 1)->first()->id}}&token={{Session::token()}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Médécin
                </span>
            </a>
        </li>
        @endif


        @if($utilisateur->professionconseiller->libelle == "Médeci")
        <li class="nav-item @if($page == "assistance-teleconseiller") active @endif">
            <a class="nav-link" href="{{route('assistance-en-ligne-teleconseiller')}}?ref={{\App\User::where("profession_conseiller_id", 2)->first()->id}}&token={{Session::token()}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Gynécologue
                </span>
            </a>
        </li>
        @endif

        @if($utilisateur->professionconseiller->libelle == "Conseille")
        <li class="nav-item @if($page == "assistance-teleconseiller") active @endif">
            <a class="nav-link" href="{{route('assistance-en-ligne-teleconseiller')}}?ref={{\App\User::where("profession_conseiller_id", 3)->first()->id}}&token={{Session::token()}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Sage femme
                </span>
            </a>
        </li>
        @endif

        @if($utilisateur->professionconseiller->libelle == "Sage femm")
        <li class="nav-item @if($page == "assistance-teleconseiller") active @endif">
            <a class="nav-link" href="{{route('assistance-en-ligne-teleconseiller')}}?ref={{\App\User::where("profession_conseiller_id", 4)->first()->id}}&token={{Session::token()}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Conseiller
                </span>
            </a>
        </li>
        @endif

        <li class="nav-item nav-category">
            <span class="nav-link">Suivi cycle menstruel</span>
        </li>

		
        <li class="nav-item  @if($page == 'suivi-regle-demain') active @endif ">
            <a class="nav-link" href="{{route('suivi-regle-teleconseiller-demain')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Prochaine règle dans 48h
                </span>
            </a>
        </li>
		
        <li class="nav-item  @if($page == 'suivi-regle-to-day') active @endif ">
            <a class="nav-link" href="{{route('suivi-regle-teleconseiller-today')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Prochaine règle dans 24h
                </span>
            </a>
        </li>

        <li class="nav-item @if($page == 'suivi-ovulation-demain') active @endif ">
            <a class="nav-link" href="{{route('suivi-ovulation-teleconseiller-demain')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Prochaine ovulation dans 48h
                </span>
            </a>
        </li>

        
        <li class="nav-item @if($page == 'suivi-ovulation-to-day') active @endif ">
            <a class="nav-link" href="{{route('suivi-ovulation-teleconseiller-today')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Prochaine ovulation dans 24h
                </span>
            </a>
        </li>
		

		<li class="nav-item nav-category">
            <span class="nav-link">Souscription au suivi du cycle</span>
        </li>

        <li class="nav-item @if($page == 'demande-suivi-regle-teleconseiller') active @endif ">
            <a class="nav-link" href="{{route('demande-suivi-regle-teleconseiller')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                Demande de suivi des règles
                </span>
            </a>
        </li>
    
        <li class="nav-item nav-category">
            <span class="nav-link">Signaler mon départ</span>
        </li>

        <li class="nav-item @if($page == 'terminer-activite') active @endif ">
            <a class="nav-link" href="{{route('marquer-presence-depart')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">
                   Terminer mes activités
                </span>
            </a>
        </li>

    </ul>
</nav>