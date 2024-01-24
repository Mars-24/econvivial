@extends("Template.registerTemplate")

@section('title', 'Inscription | eCentre Convivial')

@section('body')
    <style>
        ::placeholder {
            color: black;
            opacity: 1;
        }
    </style>

    <div class="container-scroller">
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
    
        <div class="container-scroller">
        	<div class="container-fluid page-body-wrapper full-page-wrapper">
        		<div class="content-wrapper d-flex align-items-center auth register-full-bg" style="background:url('images/logo-fond.png'); background-repeat: no-repeat; background-position: center; background-color: white;background-size: auto;">
                    <div class="row w-100">
                        <div class="col-lg-8 mx-auto card">
                            <div class="auth-form-light text-left p-5 card-content">
                                <h5 style="text-align: center;">Inscrivez-vous gratuitement</h5>
                                
                                <h6 class="font-weight-light" style="text-align: center;">Quelques minutes suffisent</h6>
        
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
                                            <p>{{ Session::pull('message') }} </p>
                                        </div>
                                    </div>
                                @endif
        
                                @if(Session::has('erreur'))
                                    <div class="form-group">
                                        <div class="alert alert-danger">
                                            <p>{{ Session::pull('erreur') }} </p>
                                        </div>
                                    </div>
                                @endif
        
                                <form class="form form-horizontal" autocomplete="off" role="form" method="POST" action="{{ route('postRegister') }}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input id="last_name" type="text" value="{{  old('username')  }}" class="validate" name="username" required>
                                                    <label for="last_name" class="mdi mdi-account" style="font-size: 15px;">Nom d'utilisateur <i ></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input id="last_name" type="email" value="{{  old('email')  }}" class="validate" name="email" required>
                                                    <label for="last_name" class="fa fa-envelope-open-o" style="font-size: 15px;">Email <i ></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input placeholder="Date de naissance" max="{{ date('Y-m-d') }}" type="text" onfocus="(this.type='date')" id="first_name" value="{{  old('datenaissance')  }}" name="datenaissance" class="datepicker"  required>
                                                    <label class="mdi mdi" for="first_name" style="font-size: 15px;" ></label>
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
                                        <div class="col-lg-6" style="margin-top: -10px;">
                                            <div class="form-group">
                                                <label class="col-sm-3 col-form-label">Pays</label>
                                                <div class="col-sm-12">
                                                    <div id="countries" class="bfh-selectbox bfh-countries" data-name="nationalite" data-country="TG" data-flags="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input type="text" class="form-control bfh-phone" id="telephone" name="numero"  required data-country="TG" placeholder="Numéro de téléphone" >
                                                    <label class="mdi mdi-calendar" for="first_name" style="font-size: 15px;" >Numéro Tel</label>
                                                    <span class="errormsg2" style="color: red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input id="last_name" type="password" class="validate" name="password" required>
                                                    <label for="last_name" class="mdi mdi-lock" style="font-size: 15px;">Mot de passe <i ></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-field col ">
                                                    <input id="last_name" type="password" class="validate" required name="confirmation">
                                                    <label for="last_name" class="mdi mdi-lock" style="font-size: 15px;">Confirmation <i ></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="region" required>
                                                        <option disabled="true" selected>Sélectionnez votre région</option>
                                                        @foreach($regions as $region)
                                                            <option value="{{ $region->code }}">{{ $region->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="profession" required>
                                                        <option disabled="true" selected>Sélectionnez votre profession</option>
                                                        <option value="Entrepreneur">Entrepreneur</option>
                                                        <option value="Employé">Employé</option>
                                                        <option value="Fonctionnaire">Fonctionnaire</option>
                                                        <option value="Étudiant">Étudiant</option>
                                                        <option value="Élève">Élève</option>
                                                        <option value="Apprenti">Apprenti</option>
                                                        <option value="Apprenti">Apprenti</option>
                                                        <option value="Autre">Autre</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="mt-5">
                                        <input type="hidden" value="{{ Session::token() }}" name="_token" />
                                        <button class="btn btn-block btn-success btn-lg" type="submit">S'inscrire</button>
                                    </div>
                        
                                    <div class="mt-2 w-75 mx-auto">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </div>
                        
                                    <div class="mt-2 text-center ">
                                        <a href="{{ route('connexion') }}" class="auth-link text-black">Avez-vous déjà un compte? <span class="font-weight-medium">Connectez-vous</span></a>
                                    </div>
                                </form>                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/picker.date.js"></script>
    <script src="js/picker.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert-success").fadeTo(5000, 500).slideUp(500, function() {
                    $(this).remove();
                });
    
                $(".alert-danger").fadeTo(5000, 500).slideUp(500, function() {
                    $(this).remove();
                });
            });
        });
    
        $('#telephone').keypress(function(e){
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $('.errormsg2').html("Des chiffres uniquement").show().fadeOut('slow');
                
                return false;
            }
        });
    </script>
@endsection