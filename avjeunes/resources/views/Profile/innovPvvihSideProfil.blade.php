
<div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
    {{--@if(count(Auth::user()->unreadNotifications) > 0)--}}
    {{--<div id="settings-trigger" style="margin-bottom: 60px; background: #ff0a18;"><i class="mdi mdi-bell-outline"></i>--}}
    {{--<span class="count" style="margin-top: -8px;margin-left: 3px;color: white;font-weight: bold;font-size: 12px;">{{count(Auth::user()->unreadNotifications) }}</span>--}}
    {{--</div>--}}
    {{--@endif--}}
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
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar" >
    <ul class="nav">
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

        <li class="nav-item nav-category">
            <span class="nav-link">Enrégistrer PVVIH</span>
        </li>

        <li class="nav-item @if($page == 'dashboard') active  @endif">
            <a class="nav-link" href="{{route('enregistrer-pvvih')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Enrégistrer nouvelle plainte</span>
            </a>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Validations</span>
        </li>

        <li class="nav-item @if($page == 'pvvih-non-valider') active  @endif">
            <a class="nav-link" href="{{route('liste-pvvih-attente-validation')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Plaintes en attente de validation</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'pvvih-valider') active  @endif">
            <a class="nav-link" href="{{route('liste-pvvih-valider')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Rapport de plaintes validées</span>
            </a>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Notifications & Alertes</span>
        </li>

        <li class="nav-item @if($page == 'message-pvvih') active  @endif">
            <a class="nav-link" href="{{route('diffuser-message-pvvih')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Diffuser un message aux <br/> plaignants</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'liste-message-pvvih') active  @endif">
            <a class="nav-link" href="{{route('liste-message-pvvih-diffuser')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Liste des messages diffusés</span>
            </a>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Plaintes & Assistances</span>
        </li>

        <li class="nav-item @if($page == 'plainte-mobile') active  @endif">
            <a class="nav-link" href="{{route('get-liste-plainte-user-mobile')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Liste des plaintes utilisateurs</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'liste-message-pvvih') active  @endif">
            <a class="nav-link" href="{{route('get-assistance-en-ligne-mobile')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Assistance en ligne</span>
            </a>
        </li>

    </ul>
</nav>