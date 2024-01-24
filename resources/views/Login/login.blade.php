












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <title>eConvivial- Login</title>

    <link rel="stylesheet" href="../build/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com/"></script>
    <script>
        window.onload = function () {
            document.getElementById("toplay").play();
        }
    </script>
</head>
<body>
    
    <div class="2xl:container h-screen m-auto">
        <div hidden class="fixed inset-0 w-7/12 lg:block">
         
            <video class="w-full h-full object-cover" loop id="toplay"  src="images/video.mp4" ></video>
        </div>
        <div hidden role="hidden" class="fixed inset-0 w-6/12 ml-auto bg-white bg-opacity-70 backdrop-blur-xl lg:block"></div>
        <div class="relative h-full ml-auto lg:w-6/12">
            <div class="m-auto py-12 px-6 sm:p-20 xl:w-10/12">
                <div class="space-y-4">
                    <a href="">
                        <img  src="images/LOGO PNG.png" class="w-40" alt="eConvivial">
                    </a>
                    <p class="font-medium text-lg text-gray-600">  Connectez-vous pour commencer</p>
                </div>
                
                <form action="{{route('postLogin')}}" method="POST" class="space-y-6 py-6">

                    @csrf
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Session::has('message'))
                        <div class="form-group">
                            <div class="alert alert-success" style="background: white;">
                                <p>{{Session::pull('message')}} </p>
                            </div>
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="form-group">
                            <div class="alert alert-danger" style="background: white;">
                                <p>{{Session::pull('error')}} </p>
                            </div>
                        </div>
                    @endif

                    <div>
                        <input 
                                type="text" 
                                placeholder="entrez email ou N° de téléphone"
                                class="w-full py-3 px-6 ring-1 ring-gray-300 rounded-xl placeholder-gray-600 bg-transparent transition disabled:ring-gray-200 disabled:bg-gray-100 disabled:placeholder-gray-400 invalid:ring-red-400 focus:invalid:outline-none"
                                id="telephone" name="numero" value="{{ old('numero') }}"  
                        >
                    </div>

                    <div class="flex flex-col items-end">
                        <input 
                                type="password" 
                                placeholder=" entrez mot de passe"
                                class="w-full py-3 px-6 ring-1 ring-gray-300 rounded-xl placeholder-gray-600 bg-transparent transition disabled:ring-gray-200 disabled:bg-gray-100 disabled:placeholder-gray-400 invalid:ring-red-400 focus:invalid:outline-none"
                                id="last_name" name="password"
                        >
                        <button type="reset" class="w-max p-3 -mr-3">
                            <a href="{{route('mot-de-passe-oublier')}}" class="text-sm tracking-wide text-blue-600">Mot de passe oublié ?</a>
                        </button>
                    </div>

                    <div>
                        <button type="submit" class="w-full px-6 py-3 rounded-xl bg-sky-500 transition hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-800">
                            <input type="hidden" value="{{Session::token()}}" name="_token"/>
                            <span class="font-semibold text-white text-lg">Se connecter</span>
                        </button>
                        <a href="#" type="reset" class="w-max p-3 -ml-3">
                            <a href="{{route('register')}}" class="text-sm tracking-wide text-blue-600">Creer un compte</a>
                        </a>
                    </div>
                </form>

                <!-- <div>
                    <img src="" alt="" srcset="">
                </div> -->


                <div role="hidden" class="mt-12 border-t">
                    <span class="block w-max mx-auto -mt-3 px-4 text-center text-gray-500 bg-white">Ou</span>
                </div>

                <div class="mt-12 grid gap-6 sm:grid-cols-2">
                    <button class="py-3 px-6 rounded-xl bg-blue-100 hover:bg-blue-200 focus:bg-blue-100 active:bg-blue-200">
                        <a href="{{ route('google_register') }}">
                            <div class="flex gap-4 justify-center">
                                <img src="images/google.svg" class="w-5" alt="">
                                <span class="block w-max font-medium tracking-wide text-sm text-blue-700">Avec Google</span>
                            </div>
                        </a>
                    </button>


                    <button class="py-3 px-6 rounded-xl bg-blue-100 hover:bg-blue-200 focus:bg-blue-100 active:bg-blue-200">
                        <div class="flex gap-4 justify-center">
                            <img src="images/facebook.svg" class="w-5" alt="">
                            <span class="block w-max font-medium tracking-wide text-sm text-blue-600">Avec Facebook</span>
                        </div>
                    </button>

                  
                </div>

               

                <div class="border-t pt-12">
                    <div class="space-y-2 text-center">
                        <img src="../public/images/logo.svg" class="w-40 m-auto grayscale" alt="">
                        <span class="block text-sm tracking-wide text-gray-500"></span>
                    </div>
                </div> 
            </div>
        </div>
    </div>

   





</body>

</html>












{{-- @extends("Template.registerTemplate"

@section("title")
    Connexion | eCentre onvivial
@endsection

@section("body")

    <style type="text/css">
        .login {
            background: url('images/logo-fond.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
    <div class="container-scroller" style="background-color: white;">

        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper" style="background-color: white;">
                    <div class="container">
                        <a href="{{route('accueil')}}" class="brand-logo">
                            <img style="width:175px; margin-left: 0px;" src="dist/img/logo-convivial.jpg" alt="">
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth register-full-bg login" style="background:url('images/logo-fond.png');
    background-repeat: no-repeat;background-position: center; ">
                <div class="row w-100">
                    <div class="col-lg-6 mx-auto card">
                        <div class="auth-form-light text-left p-5 card-content">
                            <h5 style="text-align: center;">Connectez-vous</h5>
                            <h6 class="font-weight-light" style="text-align: center;">Accéder au centre convivial dès
                                maintenant</h6>
                            <form action="{{route('postLogin')}}" method="POST">
                                @csrf
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(Session::has('message'))
                                    <div class="form-group">
                                        <div class="alert alert-success" style="background: white;">
                                            <p>{{Session::pull('message')}} </p>
                                        </div>
                                    </div>
                                @endif

                                @if(Session::has('error'))
                                    <div class="form-group">
                                        <div class="alert alert-danger" style="background: white;">
                                            <p>{{Session::pull('error')}} </p>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" style="width: 100%;">
                                            <div class="input-field col ">
                                                <input type="text" style="width: 100%;" required class="form-control"
                                                       id="telephone" name="numero" value="{{ old('numero') }}"
                                                       placeholder="Saisir votre numéro sans indicatif, email ou code d'identification">
                                                <label class="mdi mdi-calendar" for="first_name"
                                                       style="font-size: 15px;">Saisir votre numéro sans indicatif,
                                                    email ou code d'identification</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             



                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-field col ">
                                                <input id="last_name" style="width: 100%;" required type="password"
                                                       class="form-control validate" name="password">
                                                <label for="last_name" class="mdi mdi-lock" style="font-size: 15px;">Mot
                                                    de passe <i></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              


                                <div class="mt-5">
                                    <input type="hidden" value="{{Session::token()}}" name="_token"/>
                                    <button type="submit" class="btn btn-block btn-danger btn-lg">Login</button>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="{{route('mot-de-passe-oublier')}}" class="auth-link text-black">Mot de
                                        passe oublié?</a>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="{{route('register')}}" class="auth-link text-black">Vous n'avez pas de
                                        compte?</a>
                                </div>

                                <div class="mt-3 text-center">
                                    <a href="{{route('activer-mon-compte')}}" class="auth-link text-black">Votre compte
                                        n'est pas actif? activez votre compte</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
      
    </div>

    <script>
        $(document).ready(function () {
            window.setTimeout(function () {
                $(".alert-success").fadeTo(5000, 500).slideUp(500, function () {
                    $(this).remove();
                });

                $(".alert-danger").fadeTo(5000, 500).slideUp(500, function () {
                    $(this).remove();
                });
            });
        });
    </script>
@endsection --}}
