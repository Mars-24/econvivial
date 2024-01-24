@extends("Template.registerTemplate")


@section("title")
 Téléconseiller | Formulaire de présence
@endsection


@section("body")

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
                            <h5 style="text-align: center;">Assistance en ligne</h5>
                            <h6 class="font-weight-light" style="text-align: center;">Marquez votre présence</h6>

                            <form action="{{route('post-marquer-presence')}}" method="POST">
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
                                                <input type="text" style="width: 100%;" required class="form-control"  name="nom" value="{{ old('nom') }}"  placeholder="Nom" >
                                                <label class="mdi mdi-account" for="first_name" style="font-size: 15px;" >Nom</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group" style="width: 100%;">
                                                <div class="input-field col ">
                                                    <input type="text" style="width: 100%;" required class="form-control"  name="prenom" value="{{ old('prenom') }}"  placeholder="Prénom" >
                                                    <label class="mdi mdi-account" for="first_name" style="font-size: 15px;" >Prénom</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group" style="width: 100%;">
                                                <div class="input-field col ">
                                                    <input type="text" style="width: 100%;" required class="form-control"  name="fonction" value="{{ old('fonction') }}"  placeholder="Fonction" >
                                                    <label class="mdi mdi-account" for="first_name" style="font-size: 15px;" >Fonction</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label class="col-sm-6 col-form-label" style="font-size: 15px;color: black;">Etes-vous sur le calendrier de programmation ?</label>
                                                    <div class="col-sm-3">
                                                        <div class="form-radio">
                                                            <label class="form-check-label" style="font-size: 15px;color: black;">
                                                                <input type="radio" class="form-check-input"  name="programmer"  value="1" checked>
                                                                OUI
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-radio">
                                                            <label class="form-check-label" style="font-size: 15px;color: black;">
                                                                <input type="radio" style="border-radius: 25%;" class="form-check-input" name="programmer"  value="0">
                                                                NON
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-lg-12" >
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label class="col-sm-6 col-form-label" style="font-size: 15px;color: black;">Vous êtes programmés pour quelle période de la journée :</label>
                                                    <div class="col-sm-12">
                                                        <div class="form-radio">
                                                            <label class="form-check-label" style="font-size: 15px;color: black;">
                                                                <input type="radio" class="form-check-input"  name="periode"  value="1ère période" checked>
                                                                1ère période
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-radio">
                                                            <label class="form-check-label" style="font-size: 15px;color: black;">
                                                                <input type="radio" class="form-check-input" name="periode"  value="2ème période">
                                                                2ème période
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-radio">
                                                            <label class="form-check-label" style="font-size: 15px;color: black;">
                                                                <input type="radio" class="form-check-input" name="periode"  value="3ème période">
                                                                3ème période
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="mt-5">
                                    <input type="hidden" value="{{Session::token()}}" name="_token" />
                                    <button type="submit" class="btn btn-block btn-danger btn-lg">Valider</button>
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

@endsection