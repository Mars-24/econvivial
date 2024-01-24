

<nav class="navbar navbar-default mainmenu-area navbar-fixed-top" data-spy="affix" data-offset-top="60">
    <div class="container wow fadeInRight"  data-wow-delay="0.5s">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle" data-target="#mainmenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">
                <!--<img src="images/logo.png" alt="">-->
                <h2 class="text-white logo-text plateforme-logo @if($page == 'accueil') hidden @endif">
                    <img src="images/vitrine/logo-lg.png" style="height: 50px;width: auto;margin-top: -15px;padding: 2px;" >
                </h2>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="mainmenu">
            <ul class="nav navbar-nav">
             <li  class="@if($page == "accueil") active @endif" ><a href="{{route('accueil')}}">Accueil</a></li>
             <li class="dropdown" class="@if($page == "service") active @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">Services <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li ><a style="color: #1C2331" href="{{route('consultation')}}">Consultation</a></li>
                        <li><a style="color: #1C2331" href="{{route('suiviGrossesse')}}">Suivi de grossesse</a></li>
                        <li><a style="color: #1C2331" href="{{route('suivi-cycle-menstruel')}}">Suivi du cycle menstruel</a></li>
                        <li><a style="color: #1C2331" href="{{route('planning-familial')}}">Planning familial</a></li>
                        <li><a style="color: #1C2331" href="{{route('assistance-en-ligne')}}">Assistance en ligne</a></li>
                    </ul>
             </li>
             <li class="@if($page == "conseil") active @endif"><a href="{{route('conseils')}}">Conseils pratiques</a></li>

             <li class="@if($page == "agenda") active @endif"><a href="{{route('agenda')}}">Agenda</a></li>
             <li class="@if($page == "jeux") active @endif"><a href="{{route('quiz')}}">Jeux</a></li>
             <li class="@if($page == "contact") active @endif"><a href="{{route('contact')}}">Contact</a></li>
                @if(!Auth::check())
                <li class="dropdown" class="@if($page == "compte") active @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">Compte <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li ><a style="color: #1C2331" href="{{route('register')}}">S'inscrire</a></li>
                        <!--<li ><a style="color: #1C2331" href="{{route('inscription-agbodjandjan')}}">Compte Agbodjandjan</a></li>-->
                        <li><a style="color: #1C2331" href="{{route('connexion')}}">Se connecter</a></li>
                    </ul>
                </li>
                @else
                    {{-- if type_user_id is utilisateur or etudiant or eleve --}}
                    @if(Auth::user()->type_user_id === 1 || Auth::user()->type_user_id === 9 || Auth::user()->type_user_id === 10)
                    <li class="@if($page == "compte") active @endif"><a href="{{ route('espacemembre') }}">Mon compte</a></li>
                    @else
                    <li class="@if($page == "compte") active @endif"><a href="{{ route('tableau-de-bord-admin') }}">Tableau de bord</a></li>
                    @endif
                @endif
         </ul>
     </div>
 </div>
</nav>