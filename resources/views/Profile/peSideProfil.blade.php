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
            <span class="nav-link">Espace pair éducateur</span>
        </li>

        <li class="nav-item @if($page == "new-entretien") active @endif">
            <a class="nav-link" href="{{route('espace-membre-pair-educateur')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Enrégistrer une activité</span>
            </a>
        </li>



        <li class="nav-item @if($page == "generer-rapport") active @endif">
            <a class="nav-link" href="{{route('rapport-superviseur-paire-educateur-scolaire')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Générer un rapport</span>
            </a>
        </li>

        <li class="nav-item @if($page == "historique-rapport") active @endif">
            <a class="nav-link" href="{{route('historique-rapport-superviseur-educateur-ecole')}}">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Historique des rapports</span>
            </a>
        </li>



        {{--<li class="nav-item @if($page == "entretien-attente") active @endif">--}}
            {{--<a class="nav-link" href="{{route('liste-entretien-attente-validation-pe')}}">--}}
                {{--<i class="mdi mdi-compass-outline menu-icon"></i>--}}
                {{--<span class="menu-title">Entretiens en attente de validation</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        {{--<li class="nav-item @if($page == "entretien-valider") active @endif">--}}
            {{--<a class="nav-link" href="{{route('liste-entretien-valider-pe')}}">--}}
                {{--<i class="mdi mdi-compass-outline menu-icon"></i>--}}
                {{--<span class="menu-title">Entretiens validés</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        {{--<li class="nav-item @if($page == "assistance-ligne") active @endif">--}}
            {{--<a class="nav-link" href="#">--}}
                {{--<i class="mdi mdi-compass-outline menu-icon"></i>--}}
                {{--<span class="menu-title">Assistance en ligne</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        {{--<li class="nav-item nav-category">--}}
            {{--<span class="nav-link">Gestion élèves / étudiants</span>--}}
        {{--</li>--}}

        {{--<li class="nav-item @if($page == "new-utilisateur") active @endif">--}}
            {{--<a class="nav-link" href="{{route('create-eleve-account')}}">--}}
                {{--<i class="mdi mdi-compass-outline menu-icon"></i>--}}
                {{--<span class="menu-title">Enrégistrer un élève / étudiant</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        {{--<li class="nav-item @if($page == "valide-inscription") active @endif">--}}
            {{--<a class="nav-link" href="{{route('valider-inscription-user-pe')}}">--}}
                {{--<i class="mdi mdi-compass-outline menu-icon"></i>--}}
                {{--<span class="menu-title">Valider une inscription</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        {{--<li class="nav-item @if($page == "inscription-valider") active @endif">--}}
            {{--<a class="nav-link" href="{{route('liste-inscription-user-pe-valider')}}">--}}
                {{--<i class="mdi mdi-compass-outline menu-icon"></i>--}}
                {{--<span class="menu-title">Inscriptions validées</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        {{--<li class="nav-item @if($page == "inscription-rejeter") active @endif">--}}
            {{--<a class="nav-link" href="{{route('liste-inscription-user-pe-rejeter')}}">--}}
                {{--<i class="mdi mdi-compass-outline menu-icon"></i>--}}
                {{--<span class="menu-title">Inscriptions rejetées</span>--}}
            {{--</a>--}}
        {{--</li>--}}


        {{--<li class="nav-item @if($page == "liste-utilisateur") active @endif">--}}
            {{--<a class="nav-link" href="{{route('liste-utilisateur-eleve-etudiant')}}">--}}
                {{--<i class="mdi mdi-compass-outline menu-icon"></i>--}}
                {{--<span class="menu-title">Liste  élèves / étudiants</span>--}}
            {{--</a>--}}
        {{--</li>--}}

    </ul>
</nav>
<!-- partial -->