@extends('Template.registerTemplate')

@section('title', 'Activer votre compte eCentre Convivial')

@section('body')
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
            <nav>
                <div class="nav-wrapper" style="background-color: white;">
                    <div class="container">
                        <a href="{{ route('accueil') }}" class="brand-logo">
                            <img style="width:175px; margin-left: 0px;" src="dist/img/logo-convivial.jpg" alt="">
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth register-full-bg login" style="background:url('images/logo-fond.png'); background-repeat: no-repeat; background-position: center;">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto card">
                        <div class="auth-form-light text-left p-5 card-content">
                            <h5 style="text-align: center;">Activation de compte</h5>
                            
                            <h6 class="font-weight-light" style="text-align: center;">Saisir le code d'activation reçu</h6>
                            
                            <form action="{{ route('postActiveMyAccount') }}" method="POST">
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

                                <div class="form-group msg" style="display: none;">
                                    <div class="alert alert-success" style="background: white;">
                                        <p id="message"></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Code d'activation</label>
                                    <input type="text" class="form-control" required  name="code" value="{{ old('code') }}" id="code" aria-describedby="emailHelp" placeholder="Code d'activation de votre compte">
                                    <i class="mdi mdi-account"></i>
                                </div>

                                <div class="mt-3 text-center">
                                    <a href="#" class="auth-link text-black" id="resendCode">J'ai pas reçu de sms. Renvoyer le code</a>
                                </div>

                                <div class="mt-5">
                                    <input type="hidden" value="{{ Session::token() }}" name="_token" />
                                    <input type="hidden" value="{{ Session::get("numero") }}" name="numero" id="userNumber" />
                                    <button type="submit" class="btn btn-block btn-danger btn-lg">Activer mon compte</button>
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

        $("#resendCode").on("click", function(e) {
            e.preventDefault();
            
            var numero = $("#userNumber").val();
            
            $.ajax({
                type : "POST",
                url: "{{ route('postRetrieveActiveMyAccount') }}",
                data: {
                    '_token': '{{ Session::token() }}',
                    'numero': numero
                },
                success: function(data) {
                    if (data == true) {
                        $("#message").text("Le code d'activation a été renvoyé");
                        
                        $(".msg").show("slow");
                        
                        alert("Le code d'activation a été renvoyé");
                        
                        window.setTimeout(function() {
                            $(".msg").fadeTo(3000,500).slideUp(500, function() { $(this).remove(); });
                        });
                    } else {
                        alert("Problème de réseau lors de l'envoie du sms. Veuillez réessayer plustard");
                    }
                },
                error: function (data) {
                    alert("Problème de réseau lors de l'envoie du sms. Veuillez réessayer plustard");
                }
            });
        });
    </script>
@endsection