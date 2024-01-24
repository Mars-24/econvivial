@extends("Template.otherTemplate")


@section("title")
   Téléconseiller | Signaler le départ
@endsection


@section("body")
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navTeleConseiller")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="padding-top: -10px;">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.teleConseillerSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Signaler le départ</h4>
                                    <div class="row">
                                        <div class="col-md-12 ">

                                            <div class="card">
                                                <div class="card-body">
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

                                                            <form class="form" action="{{route('post-save-marquer-presence-depart')}}" method="POST">

                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Nom</label>
                                                                            <div class="col-sm-9" style="margin-top: 12px;">
                                                                                <label><b >{{$presence->nom}}</b></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Prénom</label>
                                                                            <div class="col-sm-9" style="margin-top: 12px;">
                                                                                <label><b>{{$presence->prenom}}</b></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Fonction</label>
                                                                            <div class="col-sm-9" style="margin-top: 12px;">
                                                                                <label><b>{{$presence->fonction}}</b></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <hr>

                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-12 col-form-label"><b>Nombre de personnes reçu :</b></label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-6 col-form-label">Sexe masculin</label>
                                                                            <div class="col-sm-6" >
                                                                               <input type="text" class="form-control" id="recuMasculin" name="recuMasculin" placeholder="Nombre" />
                                                                                <span class="errmsg1" style="color: red;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-6 col-form-label">Sexe féminin</label>
                                                                            <div class="col-sm-6" >
                                                                                <input type="text" class="form-control" id="recuFeminin" name="recuFeminin" placeholder="Nombre" />
                                                                                <span class="errmsg2" style="color: red;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-12 col-form-label"><b>Nombre de personnes conseillées : </b></label>

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-6 col-form-label">Sexe masculin</label>
                                                                            <div class="col-sm-6" >
                                                                                <input type="text" class="form-control" id="conseillerMasculin" name="conseillerMasculin" placeholder="Nombre" />
                                                                                <span class="errmsg3" style="color: red;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-6 col-form-label">Sexe féminin</label>
                                                                            <div class="col-sm-6" >
                                                                                <input type="text" class="form-control" id="conseillerFeminin" name="conseillerFeminin" placeholder="Nombre" />
                                                                                <span class="errmsg4" style="color: red;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-12 col-form-label"><b>Nombre de personnes référées  : </b></label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-6 col-form-label">Sexe masculin</label>
                                                                            <div class="col-sm-6" >
                                                                                <input type="text" class="form-control" id="refererMasculin" name="refererMasculin" placeholder="Nombre" />
                                                                                <span class="errmsg5" style="color: red;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-6 col-form-label">Sexe féminin</label>
                                                                            <div class="col-sm-6" >
                                                                                <input type="text" class="form-control" id="refererFeminin" name="refererFeminin" placeholder="Nombre" />
                                                                                <span class="errmsg6" style="color: red;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-12 col-form-label"><b>Nombre d’incidents survenu au cours de votre journée  : </b></label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12" >
                                                                                <input type="text" class="form-control" id="incident" name="incident" placeholder="Nombre" />
                                                                                <span class="errmsg7" style="color: red;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-12 col-form-label"><b>Commentaire : </b></label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12" >
                                                                               <textarea class="form-control" rows="5" required name="commentaire" placeholder="Commentaire"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>


                                                                <div class="row justify-content-center">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-6" >
                                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                            <input type="hidden" name="presence" value="{{$presence->id}}" />
                                                                            <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
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
                            </div>
                        </div>

                    </div>


                </div>

            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    <script type="text/javascript">
        $(document).ready(function(){
            $('#recuMasculin').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errmsg1').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#recuFeminin').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errmsg2').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#conseillerMasculin').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errmsg3').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#conseillerFeminin').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errmsg4').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#refererMasculin').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errmsg5').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });
            $('#refererFeminin').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errmsg6').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

            $('#incident').keypress(function(e){
                if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    $('.errmsg7').html("Des chiffres uniquement").show().fadeOut('slow');
                    return false;
                }
            });

        });
    </script>
@endsection