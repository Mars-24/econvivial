<nav class="navbar navbar-success col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('formation-sanitaire')}}"><img src="images/logo-brand.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('formation-sanitaire')}}"><img src="images/logo-brand-mini.png" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
            <i class="mdi mdi-menu"></i>
        </button>
        <ul class="navbar-nav">
            <li class="nav-item" style="margin-top: 5px;">
                <a class="nav-link" href="">
                    <i class="mdi mdi-reload"></i>
                </a>
            </li>
            <li class="nav-item dropdown" style="margin-top: 5px;">

                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    @if(count(Auth::user()->unreadNotifications) > 0)
                        <span class="count" style="margin-top: -15px;margin-left: 3px; height: 20px; width: 20px; background-color: red;border-radius: 50%;text-align: center;">
                {{count(Auth::user()->unreadNotifications) }}
              </span>
                    @endif
                </a>

                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0 text-center">Notifications</h6>
                    @foreach(Auth::user()->unreadNotifications as $notification)
                        <a class="dropdown-item preview-item" href="#">
                            <div class="preview-thumbnail">
                                <img src="images/profil/{{$notification->data['user']['profil']}}" class="profile-pic">
                            </div>
                            <div class="preview-item-content">
                                <p class="mb-0"> {{$notification->data["user"]["username"]}}
                                @include('HeaderNav.Notifications.'.snake_case(class_basename($notification->type)))
                            </div>
                        </a>

                    @endforeach
                    @if(count(Auth::user()->unreadNotifications) == 0)
                        <div class="dropdown-divider"></div>
                        <p class="p-3 mb-0 text-center">Aucune nouvelle notification reçu</p>
                    @endif
                </div>
            </li>

        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-lg-flex">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                    {{$utilisateur->username}}
                    <img @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="user" style="height: 30px; height: 30px; border-radius: 100%;margin-left: 5px;">
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

            <li class="nav-item  nav-profile dropdown" style="margin-top: 5px;">
                <a class="nav-link" href="{{route('accueil')}}">
                    <i class="mdi mdi-home-circle"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>

<script>
    $("#notificationDropdown").on("click", function(){
        $.get("{{route('readNotification')}}");
    });
</script>