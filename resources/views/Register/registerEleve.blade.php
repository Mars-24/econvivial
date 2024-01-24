@extends("Template.registerTemplate")


@section("title")
    Inscription | eCentre Convivial
@endsection


@section("body")

    <div class="container-scroller">

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


        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth register-full-bg" style="background:url('images/logo-fond.png');
    background-repeat: no-repeat; background-position: center; background-color: white;background-size: auto; ">

                    <div class="row w-100">
                        <div class="col-lg-8 mx-auto card">
                            <div class="auth-form-light text-left p-5 card-content">
                                <h5 style="text-align: center;">Inscrivez-vous gratuitement</h5>
                                <h6 class="font-weight-light" style="text-align: center;">Quelques minutes suffisent</h6>


                                @if (count($errors) > 0)
                                    <div class="alert alert-danger" >
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

                                @if(Session::has('erreur'))
                                    <div class="form-group">
                                        <div class="alert alert-danger">
                                            <p>{{Session::pull('erreur')}} </p>
                                        </div>
                                    </div>
                                @endif

                                <form class="form form-horizontal" role="form" method="POST" action="{{route('postRegisterEleve')}}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input id="nom" type="text" value="{{ old('nom') }}" class="validate" name="nom">
                                                    <label for="nom" class="mdi mdi-account" style="font-size: 15px;">Nom <i ></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input id="prenom" type="text" value="{{ old('prenom') }}" class="validate" name="prenom">
                                                    <label for="prenom" class="mdi mdi-account" style="font-size: 15px;">Prénom <i ></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input  id="age" value="{{ old('age') }}" type="text" name="age">
                                                    <label class="mdi mdi-account-card-details" for="age" style="font-size: 15px;" >Age</label>
                                                    <span class="errormsg" style="color: red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" style="font-size: 15px;">Sexe</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-radio">
                                                            <label class="form-check-label" style="font-size: 15px;">
                                                                <input type="radio" class="form-check-input"  name="sexe"  value="M" checked>
                                                                Masculin
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-radio">
                                                            <label class="form-check-label" style="font-size: 15px;">
                                                                <input type="radio" class="form-check-input" name="sexe"  value="F">
                                                                Féminin
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input id="password" type="password" class="validate" name="password">
                                                    <label for="password" class="mdi mdi-lock" style="font-size: 15px;">Mot de passe <i ></i></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input id="confirmation" type="password" class="validate" name="confirmation">
                                                    <label for="confirmation" class="mdi mdi-lock" style="font-size: 15px;">Confirmation <i ></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label ">Région</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" {{old('region')}} name="region" id=region" onchange="showEtablissement($(this).val())" required>
                                                        <option selected disabled="true">Veuillez sélectionner une région</option>
                                                        @foreach($regions as $region)
                                                            <option value="{{$region->id}}">{{$region->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Ets / Départ...</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="ecole" {{old('ecole')}} id="ecole" required>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input type="text" class="form-control bfh-phone" {{old('numero')}} id="telephone" name="numero" required  data-country="TG" placeholder="Numéro de téléphone" >
                                                    <label class="mdi mdi-phone" for="first_name" style="font-size: 15px;" >Numéro Tel</label>
                                                    <span class="errormsg2" style="color: red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <input type="hidden" value="{{Session::token()}}" name="_token" />
                                        <button class="btn btn-block btn-success btn-lg" type="submit">S'inscrire</button>
                                        <!-- <button type="button" class="btn btn-outline-success btn-rounded pull-right">S'inscrire</button> -->
                                    </div>
                                    <div class="mt-2 w-75 mx-auto">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                <!-- 	I accept terms and conditions -->
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-center ">
                                        <a href="{{route('conexion')}}" class="auth-link text-black">Avez-vous déjà un compte? <span class="font-weight-medium">Connectez-vous</span></a>
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
    </div>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
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

        $('#age').keypress(function(e){
            if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                $('.errormsg').html("Des chiffres uniquement").show().fadeOut('slow');
                return false;
            }
        });

        function showEtablissement(id){
            $.ajax({
                type : "POST",
                url : "{{route('getEcoleByRegion')}}",
                data : {
                    "id" : id,
                    "_token" : "{{Session::token()}}"
                },
                success: function (data) {
                    console.log(data);
                    $("#ecole").empty();
                    $("#edit-ecole").empty();
                    for(var i =0; i < data.length; i++){
                        $("#ecole").append("<option value='"+data[i]["id"]+"' >"+data[i]["libelle"]+"</option>");
                    }
                },
                error:function (data) {
                    alert("Une erreur s'est produite, impossible de charger les établissements");
                }
            });
        }

      /*  $("#region").on("change", function () {
            var id = $(this).val();
            alert(id);

        });  */

    </script>
@endsection