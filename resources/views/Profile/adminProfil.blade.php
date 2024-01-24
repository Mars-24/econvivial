@extends("Template.mainTemplate")


@section("title")
    Mon compte
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include("Profile.adminSideProfil")

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">
                            <div class="card">

                                <div class="card-body">
                                    {{--<h4 class="card-title">Suivi de règles</h4>--}}
                                    <div class="row">
                                        <div class="col-12">
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
                                                    <div class="alert alert-success">
                                                        <p>{{Session::pull('message')}} </p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(Session::has('error'))
                                                <div class="form-group">
                                                    <div class="alert alert-danger">
                                                        <p>{{Session::pull('error')}} </p>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row user-profile">
                                                <div class="col-lg-10 offset-1 side-left d-flex align-items-stretch">
                                                    <div class="row">
                                                        <div class="col-12 grid-margin stretch-card">
                                                            <div class="card">
                                                                <div class="card-body avatar">
                                                                    <h4 class="card-title">Mon compte</h4>
                                                                    <img @if($user->profil == null) @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif @else  src="images/profil/{{$user->profil}}" @endif alt="">
                                                                    <p class="name">{{$user->username}}</p>
                                                                    <a class="d-block text-center text-dark" href="#">{{$user->email}}</a>
                                                                    <a class="d-block text-center text-dark" href="#">{{$user->numero}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 stretch-card">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                                                                        <h4 class="card-title mb-0">Modifier infos</h4>
                                                                        <ul class="nav nav-tabs tab-solid tab-solid-danger mb-0" id="myTab" role="tablist">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Infos générale</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar">Photo de profil</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Changer mot de passe</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="wrapper">
                                                                        <hr>
                                                                        <div class="tab-content" id="myTabContent">
                                                                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                                                                                <form action="{{route('modifierAdminInfo')}}" method="POST">
                                                                                    <div class="form-group">
                                                                                        <label for="name">Nom d'utilisateur</label>
                                                                                        <input type="text" class="form-control" name="username" id="name" value="{{$user->username}}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="designation">Email</label>
                                                                                        <input type="email" class="form-control" name="email" onfocus="$(this).blur()" id="designation" value="{{$user->email}}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="mobile">N° Téléphone</label>
                                                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text ">+228</span>
                                                                                            </div>
                                                                                            <input type="text" class="form-control" name="numero" id="mobile" value="{{$user->numero}}">
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="form-group mt-5" style="float: right;">
                                                                                        <input type="hidden" value="{{Session::token()}}" name="_token" />
                                                                                        <button type="submit" class="btn btn-success mr-2">Modifier</button>
                                                                                        <button class="btn btn-outline-danger">Annuler</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div><!-- tab content ends -->
                                                                            <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                                                                                <div class="wrapper mb-5 mt-4">
                                                                                    <span class="badge badge-warning text-white">Note : </span>
                                                                                    <p class="d-inline ml-3 text-muted">La taille de l'image ne doit pas dépasser 1 MB.</p><br/>
                                                                                    <h6 class="d-inline ml-3 text-muted">Attachez une photo puis cliquez sur le bouton modifier.</h6>
                                                                                </div>
                                                                                <form action="{{route('modifierAdminProfile')}}" method="POST" enctype="multipart/form-data">
                                                                                    <div class="col-sm-6 col-sm-offset-3">
                                                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;" style="border: rgba(0,0,0,0.44) 1px solid;">
                                                                                                <img class="tim-fig" @if($utilisateur->profil == null) src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" @else  src="images/profil/{{$utilisateur->profil}}"  @endif alt="" />
                                                                                            </div>
                                                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                            <div>
                                                                                     <span class="btn btn-warning btn-file">
                                                                                       <span class="fileupload-new "><i class="fa fa-paper-clip"></i>Choisir une photo</span>
                                                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer l'image</span>
                                                                                       <input type="file" name ="image" id="image" class="form-control" accept="image/jpeg, image/png" required/>
                                                                                     </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group mt-5" style="float: right; margin-top: 20px;">
                                                                                        <input type="hidden" value="{{Session::token()}}" name="_token" />
                                                                                        <button type="submit" class="btn btn-success mr-2">Modifier</button>
                                                                                        <button class="btn btn-outline-danger">Annuler</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                                                                <form action="{{route('modifierAdminPassword')}}" method="POST">
                                                                                    <div class="form-group">
                                                                                        <label for="change-password">Changer mon mot de passe</label>
                                                                                        <input type="password" class="form-control" name="oldPassword" id="change-password" placeholder="Saisir votre ancien mot de passe">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="password" class="form-control" name="password" id="new-password" placeholder="Saisir votre nouveau mot de passe">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="password" class="form-control" name="confirmation" id="confirm-password" placeholder="Confirmer votre nouveau mot de passe">
                                                                                    </div>
                                                                                    <div class="form-group mt-5" style="float: right;">
                                                                                        <input type="hidden" value="{{Session::token()}}" name="_token" />
                                                                                        <button type="submit" class="btn btn-success mr-2">Modifier</button>
                                                                                        <button class="btn btn-outline-danger">Annuler</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include("Footer.dashboardFooter");
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

@endsection