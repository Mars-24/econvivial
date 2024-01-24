
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
            <span class="nav-link">Suivi de grossesse</span>
        </li>

        <li class="nav-item @if($page == 'admin-fs-grossesse-en-cours') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-grossesse-en-cours')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Grossesse en cours</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-fs-grossesse-a-terme') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-grossesse-a-terme')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Grossesse à terme</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'flux') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-grossesse-flux')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Flux des grossesses en cours</span>
            </a>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Suivi de vaccination</span>
        </li>

        <li class="nav-item @if($page == 'admin-fs-vaccin-en-cours') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-vaccination-en-cours')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Vaccination en cours</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-fs-vaccin-a-terme') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-vaccination-a-terme')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Vaccination à terme</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-flux-vaccin') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-vaccination-flux')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Flux des vaccination</span>
            </a>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Suivi de planning familial</span>
        </li>

        <li class="nav-item @if($page == 'admin-fs-pf-en-cours') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-pf-en-cours')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Planning Familial en cours</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-fs-pf-a-terme') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-pf-a-terme')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Planning Familial à terme</span>
            </a>
        </li>

        <li class="nav-item @if($page == 'admin-flux-pf') active  @endif">
            <a class="nav-link" href="{{route('admin-formation-sanitaire-pf-flux')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Flux planning familial</span>
            </a>
        </li>

    </ul>
</nav>
