<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription-econvivial</title>
    <link href="{{ asset('resources/css/log.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/subscribe.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/js/regi.js') }}">
    <link href="{{ asset('resources/js/bootstrap.js') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.2/css/all.min.css"
        integrity="sha512-NicFTMUg/LwBeG8C7VG+gC4YiiRtQACl98QdkmfsLy37RzXdkaUAuPyVMND0olPP4Jn8M/ctesGSB2pgUBDRIw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="page" class="site">
        <div class="container">
            <div class="form-box">
                <div class="progress">
                    <div class="logo"><a href="/"><img src="images/LOGO PNG.png" alt=""
                                srcset=""></a></div>
                    <ul class="progress-steps">
                        <li class="step active">
                            <span>1</span>
                            <p>personal <br><span>25 secs pour completer </span></p>
                        </li>
                        <li class="step ">
                            <span>2</span>
                            <p>Contact <br><span>60 secs pour completer </span></p>
                        </li>
                        <li class="step">
                            <span>3</span>
                            <p>Securité <br><span>25 secs pour completer </span></p>
                        </li>

                    </ul>
                    <div class="social-sign">
                        <ul>
                            {{-- <li class="btn-facebook"> <a href="{{ route('facebook_register') }}" class="btn ">Inscription avec Facebook<i class="fab fa-facebook-f fa-fw"></i></a> --}}
                            </li>
                            {{-- <li class="btn-google"> <a href="{{ route('google_register') }}" class="btn btn-google">Inscription avec Google <i class="fab fa-google"></i></a> --}}
                            </li>
                        </ul>
                    </div>
                </div>


               

                @if (Session::has('message'))
                    <div class="form-group">
                        <div class="alert alert-success">
                            <p>{{ Session::pull('message') }} </p>
                        </div>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <p>{{ Session::pull('error') }} </p>
                        </div>
                    </div>
                @endif

                <form role="form" method="POST" action="{{ route('postRegister') }}">
                    <div class="form-one form-step active">
                        <div class="bg-svg">
                            <?xml version="1.0" ?><svg height="24" version="1.1" width="24"
                                xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#"
                                xmlns:dc="http://purl.org/dc/elements/1.1/"
                                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                                <g transform="translate(0 -1028.4)">
                                    <path
                                        d="m8.4062 1041.1c-2.8856 1.3-4.9781 4-5.3437 7.3 0 1.1 0.8329 2 1.9375 2h14c1.105 0 1.938-0.9 1.938-2-0.366-3.3-2.459-6-5.344-7.3-0.649 1.3-2.011 2.3-3.594 2.3s-2.9453-1-3.5938-2.3z"
                                        fill="#2c3e50" />
                                    <path d="m17 4a5 5 0 1 1 -10 0 5 5 0 1 1 10 0z" fill="#34495e"
                                        transform="translate(0 1031.4)" />
                                    <path
                                        d="m12 11c-1.277 0-2.4943 0.269-3.5938 0.75-2.8856 1.262-4.9781 3.997-5.3437 7.25 0 1.105 0.8329 2 1.9375 2h14c1.105 0 1.938-0.895 1.938-2-0.366-3.253-2.459-5.988-5.344-7.25-1.1-0.481-2.317-0.75-3.594-0.75z"
                                        fill="#34495e" transform="translate(0 1028.4)" />
                                </g>
                            </svg>
                        </div>
                        <h2>Informations personnelles</h2>
                        <p>Entrez correctement vos informations personnelles</p>
                    
                        <div>
                            <label>Nom d'utilisateur</label>
                            <input type="text" value="{{ old('username') }}" name="username" required
                                placeholder="e.g Akolly">
                        </div>
                        <div class="birth">
                            <label>Date de naissance</label>
                            <div class="grouping">
                                <input type="date" name="datenaissance" value="{{ old('datenaissance') }}" required>
                            </div>
                        </div>
                        <div>
                            <label>Sexe</label>
                            <select name="sexe" required>
                                <option disabled="true" selected>Sélectionnez votre sexe</option>
                                <option value="M">Masculin</option>
                                <option value="F">Feminin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-two form-step">
                        <div class="bg-svg">
                            <?xml version="1.0" ?><svg data-name="Livello 1" id="Livello_1" viewBox="0 0 128 128"
                                xmlns="http://www.w3.org/2000/svg">
                                <title />
                                <path
                                    d="M91,0H37A11,11,0,0,0,26,11V117a11,11,0,0,0,11,11H91a11,11,0,0,0,11-11V11A11,11,0,0,0,91,0ZM32,22.69H96V99.58H32ZM37,6H91a5,5,0,0,1,5,5v5.69H32V11A5,5,0,0,1,37,6ZM91,122H37a5,5,0,0,1-5-5V105.58H96V117A5,5,0,0,1,91,122Z" />
                                <circle cx="64" cy="113.91" r="6" />
                                <path d="M56.13,14.22H71.88a3,3,0,1,0,0-6H56.13a3,3,0,1,0,0,6Z" />
                            </svg>
                        </div>
                        <h2>Contact</h2>

                        <div>
                            <label for="">Pays</label>
                            <select id="countries_states1" class="form-control bfh-countries" data-country="Default"
                                name="country" required> <option value="" selected="selected">-- Selectionnez un pays --</option></select>
                        </div>
                        <div>
                            <label for="states">Region</label>
                            <select class="form-control bfh-states" id="countries_state"
                                data-country="countries_states1" name="region" required>  <option value="" selected="selected">-- Selectionnez une Region --</option></select>
                        </div>
                        <div>
                            <label>N° de téléphone</label>
                            <input type="text" name="numero" id="number">
                        </div>
                        <div>
                            <label>Profession</label>
                            <select class="form-control" name="profession" required>
                                <option disabled="true" selected>Sélectionnez votre profession</option>
                                <option value="Entrepreneur">Entrepreneur</option>
                                <option value="Employé">Employé</option>
                                <option value="Fonctionnaire">Fonctionnaire</option>
                                <option value="Étudiant">Etudiant</option>
                                <option value="Élève">Elève</option>
                                <option value="Apprenti">Apprenti</option>

                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-three form-step">
                        <div class="bg-svg">
                            <?xml version="1.0" ?><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #0e6ae0;
                                        }

                                        .cls-2 {
                                            fill: #0593ff;
                                        }
                                    </style>
                                </defs>
                                <title />
                                <g id="Unlock">
                                    <path class="cls-1"
                                        d="M13,14a1,1,0,0,1-1-1V10a4,4,0,0,1,8,0,1,1,0,0,1-2,0,2,2,0,0,0-4,0v3A1,1,0,0,1,13,14Z" />
                                    <rect class="cls-2" height="14" rx="3" ry="3"
                                        width="14" x="9" y="12" />
                                    <path class="cls-1"
                                        d="M18,18a2,2,0,1,0-3,1.72V21a1,1,0,0,0,2,0V19.72A2,2,0,0,0,18,18Z" />
                                </g>
                            </svg>
                        </div>
                        <h2>Securité</h2>
                        <div>
                            <label>Email</label>
                            <input type="email" value="{{ old('email') }}" class="validate" name="email"
                                required placeholder="exemple@gmail.com">
                        </div>
                        <div>
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="validate" placeholder="mot de passe">
                        </div>
                        <div>
                            <label>Confirmer le mot de passe </label>
                            <input type="password" name="confirmation" class="validate"
                                placeholder="confirmez le mot de passe">
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn-pr btn-prev" disabled>Retour</button>
                        <button type="button" class="btn-pr btn-nex">Suivant</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token" />
                        <button type="submit" name="submit" class="btn-pr btn-submit ">Envoyer</button>
                    </div>
                    <div style="text-align-last: right"><a href="{{ route('connexion') }}"></a>déja un compte ? se
                        connecter</div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        const nexbutton = document.querySelector('.btn-nex');
        const prevbutton = document.querySelector('.btn-prev');
        const steps = document.querySelectorAll('.step');
        const form_steps = document.querySelectorAll('.form-step');

        let active = 1;


        nexbutton.addEventListener('click', () => {
            active++;

            if (active > steps.length) {
                active = steps.length
            }
            updateProgress();
        })

        prevbutton.addEventListener('click', () => {
            active--;
            if (active < 1) {
                active = 1
            }
            updateProgress();
        })

        const updateProgress = () => {
            console.log('steps.length' + steps.length);
            console.log('active' + active)


            // toggle active class for each item
            steps.forEach((step, i) => {
                if (i == (active - 1)) {
                    step.classList.add('active');
                    form_steps[i].classList.add('active')
                    console.log('i=>' + i);
                } else {
                    step.classList.remove('active');
                    form_steps[i].classList.remove('active')
                }
            });

            // enable or disable prev next button 


            if (active === 1) {
                prevbutton.disabled = true;
            } else if (active === steps.length) {
                nexbutton.disabled = true;
            } else {
                prevbutton.disabled = false;
                nexbutton.disabled = false
            }




        };
        
    </script>
    <script src="js/country_code.js"></script>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert-success").fadeTo(5000, 500).slideUp(500, function() {
                $(this).remove();
            });

            $(".alert-danger").fadeTo(9000, 500).slideUp(500, function() {
                $(this).remove();
            });
        });
    });

    $('#telephone').keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('.errormsg2').html("Des chiffres uniquement").show().fadeOut('slow');

            return false;
        }
    });
</script>
