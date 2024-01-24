@extends("Template.registerTemplate")

@section("title")
    Activez mon compte | eCentre onvivial
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
                    <div class="col-lg-5 mx-auto card">
                        <div class="auth-form-light text-left p-5 card-content">
                            <h5 style="text-align: center;">Activez votre compte</h5>
                            <h6 class="font-weight-light" style="text-align: center;">Saisir votre numéro de téléphone</h6>
                            <form action="{{route('postSaveActiverMonCompte')}}" method="POST">
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
                                                <input type="text" style="width: 100%;" class="form-control bfh-phone" required id="telephone" name="numero" value="{{ old('numero') }}"  data-country="TG" placeholder="Saisir votre numéro ou votre code d'identification" >
                                                <label class="mdi mdi-calendar" for="first_name" style="font-size: 15px;" >Saisir votre numéro de téléphone</label>
                                                <span class="errormsg2" style="color: red;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <input type="hidden" value="{{Session::token()}}" name="_token" />
                                    <button type="submit" class="btn btn-block btn-danger btn-lg">Envoyer</button>
                                </div>

                                <div class="mt-3 text-center">
                                    <a href="{{route('connexion')}}" class="auth-link text-black">Votre compte est déjà actif? connectez-vous</a>
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
        $('#telephone').keypress(function(e){
            if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                $('.errormsg2').html("Des chiffres uniquement").show().fadeOut('slow');
                return false;
            }
        });
    </script>
@endsection