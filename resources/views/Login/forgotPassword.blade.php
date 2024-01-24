@extends("Template.registerTemplate")

@section("title")
    Mot de passe oublié | eCentre onvivial
@endsection

@section("body")

    <style type="text/css">
        .login{
            background:url('images/logo-fond.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
    <div class="container-scroller" style="background-color: white;">

        <div class="navbar-fixed">
            <nav >
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
                            <h5 style="text-align: center;">Récupérer mon mot de passe</h5>
                            <h6 class="font-weight-light" style="text-align: center;">Mot de passe oublié</h6>
                            <form action="{{route('postRecupererPassword')}}" method="POST">
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

                                {{--<div class="form-group">--}}
                                    {{--<label for="exampleInputEmail1">Email ou code d'identification</label>--}}
                                    {{--<input type="text" class="form-control"  required name="email" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Saisir votre email ou votre code d'identification">--}}
                                    {{--<i class="mdi mdi-account"></i>--}}
                                {{--</div>--}}

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group" style="width: 100%;">
                                                <div class="input-field col ">
                                                    <input type="text" style="width: 100%;" required class="form-control" id="telephone" name="numero" value="{{ old('numero') }}"  placeholder="Saisir votre numéro sans indicatif, email ou code d'identification" >
                                                    <label class="mdi mdi-calendar" for="first_name" style="font-size: 15px;" >Saisir votre numéro sans indicatif, email ou code d'identification</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <div class="mt-5">
                                    <input type="hidden" value="{{Session::token()}}" name="_token" />
                                    <button type="submti" class="btn btn-block btn-danger btn-lg">Récupérer</button>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="{{route('connexion')}}" class="auth-link text-black">Se connecter</a>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="{{route('register')}}" class="auth-link text-black">Vous n'avez pas de compte?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    
        <script>
        $(document).ready(function(){
            window.setTimeout(function(){
                $(".alert-success").fadeTo(5000,500).slideUp(500, function(){
                    $(this).remove();
                });

                $(".alert-danger").fadeTo(5000,500).slideUp(500, function(){
                    $(this).remove();
                });
            });
        });
    </script>
@endsection