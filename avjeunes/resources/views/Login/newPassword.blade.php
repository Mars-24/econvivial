@extends("Template.registerTemplate")

@section("title")
    Nouveau mot de passe
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
                    <div class="col-lg-4 mx-auto card">
                        <div class="auth-form-light text-left p-5 card-content">
                            <h5 style="text-align: center;">Changer votre mot de passe</h5>
                            <h6 class="font-weight-light" style="text-align: center;">Saisir le code de récupération</h6>
                            <form action="{{route('postMakeChangePassword')}}" method="POST">
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

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Code de récupération reçu</label>
                                    <input type="text" class="form-control"  required  name="code" value="{{ old('code') }}" id="code" aria-describedby="emailHelp" placeholder="Code de récupération de votre mot de passe">
                                    <i class="mdi mdi-account"></i>
                                </div>

                               <div class="form-group">
                                        <label for="password">Nouveau mot de passe</label>
                                        <input type="password" class="form-control"  required  name="password" value="{{ old('password') }}" id="password" aria-describedby="emailHelp" placeholder="Nouveau mot de passe">
                                        <i class="mdi mdi-account"></i>
                               </div>

                               <div class="form-group">
                                        <label for="password">Confirmation du mot de passe</label>
                                        <input type="password" class="form-control"  required  name="confirmation" value="{{ old('confirmation') }}" id="confirmation" aria-describedby="emailHelp" placeholder="Confirmation du mot de passe">
                                        <i class="mdi mdi-account"></i>
                               </div>

                                <div class="mt-5">
                                    <input type="hidden" value="{{Session::token()}}" name="_token" />
                                    <button type="submit" class="btn btn-block btn-danger btn-lg">Cahnger mon mot de passe</button>
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

        $("#resendCode").on("click", function(){
            $.ajax({
                type : "POST",
                url:"{{route('postRetrieveActiveMyAccount')}}",
                data:{
                    '_token': '{{Session::token()}}',
                    'numero': '{{Session::get("numero")}}'
                },
                success: function(data){
                    if(data === "true"){
                        $("#message").text("Le code d'activation été renvoyé");
                        $(".msg").show("slow");
                        alert("Le code d'activation été renvoyé");
                        window.setTimeout(function(){
                            $(".msg").fadeTo(3000,500).slideUp(500, function(){
                                $(this).remove();
                            });
                        });
                    }else{
                        alert("Problème de réseau lors de l'envoie du sms. Veuillez réessayer plustard");
                    }
                },error:function (data) {
                    alert("Problème de réseau lors de l'envoie du sms. Veuillez réessayer plustard");
                }
            });
        });
    </script>
@endsection