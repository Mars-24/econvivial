
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
          <img @if($utilisateur->profil == null) src="images/profil/profil2.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="profile" >
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
            <span class="nav-link">Formations sanitaires</span>
        </li>

        <li class="nav-item @if($page == 'super-admin-creer-formation-sanitaire') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-formation-sanitaire')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Créer formation sanitaire</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'responsable-fs') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-responsable-fs')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Créer responsable</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'prestataire-fs') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-prestataire-fs')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Créer prestataire</span>
            </a>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Suivi de la grossesse</span>
        </li>

        <li class="nav-item @if($page == 'admin-principal-fs-grossesse-en-cours') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-grossesses-en-cours')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Grossesses en cours</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-principal-fs-grossesse-a-terme') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-grossesses-a-terme')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Grossesses à terme</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-principal-fs-grossesse-ht') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-grossesses-historique-transfert')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Historique transfert</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'flux-grossesse') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-flux-grossesse')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Flux grossesse</span>
            </a>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Suivi vaccinal</span>
        </li>

        <li class="nav-item @if($page == 'admin-principal-fs-vaccination-en-cours') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-vaccination-en-cours')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Vaccination en cours</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-principal-fs-vaccination-a-terme') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-vaccination-a-terme')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Vaccination à terme</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'flux-vaccination') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-flux-vaccination')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Flux Vaccination</span>
            </a>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Suivi planning familial</span>
        </li>

        <li class="nav-item @if($page == 'admin-principal-fs-pf-en-cours') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-pf-en-cours')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Planning en cours</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-principal-fs-pf-a-terme') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-get-pf-a-terme')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Planning à terme</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'flux-pf') active  @endif">
            <a class="nav-link" href="{{route('super-admin-formation-sanitaire-flux-pf')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Flux planning familial</span>
            </a>
        </li>
    </ul>
</nav>
