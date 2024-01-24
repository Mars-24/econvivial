<!-- partial:partials/_settings-panel.html -->
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
                <a class="dropdown-item" href="#">
                    Mon compte
                </a>
                <a class="dropdown-item" href="{{route('logOut')}}">
                    Déconnexion
                </a>
            </div>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Espace superviseur universitaire</span>
        </li>

        <li class="nav-item @if($page == "rapport") active @endif">
            <a class="nav-link" href="{{route('rapport-superviseur-universitaire')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Consulter les rapports</span>
            </a>
        </li>

        <li class="nav-item @if($page == "historique-rapport-sup") active @endif">
            <a class="nav-link" href="{{route('historique-rapport-travail')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Historique des rapports</span>
            </a>
        </li>
        
        <li class="nav-item @if($page == "pe-univ-associe") active @endif">
            <a class="nav-link" href="{{route('liste-pe-univ-associe')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Suivi de PE Universitaires</span>
            </a>
        </li>

    </ul>
</nav>
<!-- partial -->