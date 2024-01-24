@extends("Template.otherTemplate")

@section("title")
    Enrégistrer une nouvelle plainte
@endsection

@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovPvvihSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Enrégistrer une plainte</h4>
                                    <div class="row">
                                        <div class="col-sm-12">

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

                                            <form class="form" action="{{route('save-enregistrer-pvvih')}}" method="POST">

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Nom</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="name" required placeholder="Nom du patient" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Prénom</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="prenom" required placeholder="Prénom du patient" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Téléphone</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" name="telephone" required placeholder="Téléphone du patient" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Région</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="region">
                                                                    <option selected disabled="true">Sélectionner une région</option>
                                                                    @foreach($regions as $region)
                                                                        <option value="{{$region->id}}">{{$region->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Langue de préférence</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="langue"  required>
                                                                    <option selected disabled="true">Sélectionner la langue de préférence</option>
                                                                    <option value="Français">Français</option>
                                                                    <option value="Ewe">Ewe</option>
                                                                    <option value="Kabyè">Kabyè</option>
                                                                    <option value="Moba">Moba</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Sexe</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="sexe"  required>
                                                                    <option selected disabled="true">Sélectionner le sexe</option>
                                                                    <option value="M">Masculin</option>
                                                                    <option value="F">Féminin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Type de plainte</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="typePlainte"  required>
                                                                    <option selected disabled="true">Sélectionner le type de plainte</option>
                                                                    <option value="Viol">Viol</option>
                                                                    <option value="Harcelement sexuelle">Harcelement sexuelle</option>
                                                                    <option value="Discrimination">Discrimination</option>
                                                                    <option value="Licenciement">Licenciement</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">

                                                            <label class="control-label col-sm-3">Action entrepris</label>
                                                            <div class="col-sm-9">
                                                              <textarea class="form-control" placeholder="Action entrepris par le conseiller" name="action" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6"  >
                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <button type="submit" id="saveButton" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


@endsection