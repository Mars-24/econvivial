<div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
    @if(count(Auth::user()->unreadNotifications) > 0)
        <div id="settings-trigger" style="margin-bottom: 60px; background: #ff0a18;"><i class="mdi mdi-bell-outline"></i>
            <span class="count" style="margin-top: -8px;margin-left: 3px;color: white;font-weight: bold;font-size: 12px;">{{count(Auth::user()->unreadNotifications) }}</span>
        </div>
    @endif
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <p class="settings-heading">Paramétrage thème</p>
    
        <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Blanc</div>
    
        <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Sombre</div>
        
        <div class="sidebar-bg-options" id="sidebar-blue-theme"><div class="img-ss rounded-circle bg-blue border mr-3"></div>Bleu</div>
    
        <p class="settings-heading mt-2">Choisir votre thème</p>
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

<nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar"  style="min-height: calc(100vh) !important;">
    <ul class="nav" style="max-height: calc(100vh) !important;">
        <li class="nav-item nav-profile dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                <span class="nav-profile-image">
                    <img @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="profile" >
                    <span class="login-status online"></span> <!--change to offline or busy as needed-->
                </span>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="{{route('mon-compte')}}">
                    Mon compte
                </a>
                <a class="dropdown-item" href="{{route('logOut')}}">
                    Déconnexion
                </a>
            </div>
        </li>
    
        <li class="nav-item @if($page == 'dashboard') active  @endif">
            <a class="nav-link" href="{{route('espacemembre')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Tableau de bord</span>
            </a>
        </li>
    
        <li class="nav-item nav-category">
            <span class="nav-link">Assistance en ligne</span>
        </li>
        <li class="nav-item @if($page == 'assistance-medecin') active  @endif">
            <a class="nav-link" href="{{route('assistance-medecin')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Téléconseiller</span>
            </a>
        </li>
    
        <li class="nav-item nav-category">
            <span class="nav-link">Suivi du cycle menstruel</span>
        </li>
        
        <li class="nav-item @if($page == 'suivi-regele') active  @endif">
            <a class="nav-link" href="{{route('suivi-de-regle')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Suivi des règles</span>
            </a>
        </li>
        
        <li class="nav-item @if($page == 'suivi-ovulation') active  @endif">
            <a class="nav-link" href="{{route('suivi-ovulation')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Suivi de l'ovulation</span>
            </a>
        </li>
    
        @if(!(Auth::user()->typeuser->libelle == "etudiant" || Auth::user()->typeuser->libelle == "eleve"))
        <li class="nav-item">
            <li class="nav-item  @if($page == 'suivi-grossesse') active  @endif">
                <a class="nav-link" href="{{route('suivi-de-grossesse')}}">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Suivi de grossesse</span>
                </a>
            </li>
        </li>
        @endif
    
        <li class="nav-item nav-category">
            <span class="nav-link">Services</span>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <i class="mdi mdi-arrow-expand-all menu-icon"></i>
                <span class="menu-title">Consultations IST</span>
                    <i class="menu-arrow"></i>                            
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block @if($page == 'consultation') active  @endif"> <a class="nav-link" href="{{route('do-consultation')}}">Faire une consultation</a></li>
                    <li class="nav-item @if($page == 'consultation-do') active  @endif"> <a class="nav-link" href="{{route('mes-consultations-en-attentes')}}">Consultations effectuées</a></li>
                    <li class="nav-item @if($page == 'consultation-resultat') active  @endif"> <a class="nav-link" href="{{route('mes-resultats-consultations')}}">Résultats de consultations</a></li>
                    <!--           <li class="nav-item"> <a class="nav-link" href="{{route('mes-consultations-effectuees')}}">Mes consutations effectuées</a></li> -->
                </ul>
            </div>
        </li>
    
        <li class="nav-item @if($page == 'conseils') active  @endif">
            <a class="nav-link" href="{{route('conseil-pratique')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Conseils pratiques</span>
            </a>
        </li>
    
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Planning familial</span>
                <i class="menu-arrow"></i>                            
            </a>
            <div class="collapse" id="sidebar-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item @if($page == 'planning-moderne') active  @endif"> <a class="nav-link" href="{{route('methode-moderne')}}">Méthode moderne</a></li>
                    <li class="nav-item @if($page == 'planning-naturelle') active  @endif"> <a class="nav-link" href="{{route('methode-naturelle')}}">Méthode naturelle</a></li>
                </ul>
            </div>
        </li>
    
        <li class="nav-item @if($page == 'quiz') active  @endif">
            <a class="nav-link" href="{{route('user-dashboard-quiz')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Jouez au QUIZ</span>
            </a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link" href="{{ route('auto-test.vostest') }}" target="_blank">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Passer l'auto test</span>
            </a>
        </li>
    </ul>
</nav>