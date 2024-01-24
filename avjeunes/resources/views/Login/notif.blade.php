@extends("Template.registerTemplate")

@section("title")
        Notification test
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
                            <h5 style="text-align: center;">Notification test</h5>
                            <h6 class="font-weight-light" style="text-align: center;">Test de notification android</h6>
                            <form action="{{route('send-notification')}}" method="POST">
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
                                                <input type="text" style="width: 100%;" required class="form-control" id="telephone" name="titre" value="{{ old('numero') }}"  placeholder="Titre notification" >
                                                <label class="mdi mdi-calendar" for="first_name" style="font-size: 15px;" > Titre de la notification</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" >
                                            <div class="input-field col ">
                                                <input id="last_name" style="width: 100%;" required type="text" class="form-control validate" name="message" placeholder="Description de la notif">
                                                <label for="last_name" class="mdi mdi-lock" style="font-size: 15px;">Description ou contenu de la notification <i ></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <input type="hidden" value="{{Session::token()}}" name="_token" />
                                    <button type="submit" class="btn btn-block btn-danger btn-lg">Envoyer</button>
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