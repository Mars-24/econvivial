<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription-econvivial</title>
    <link href="{{ asset('resources/css/log1.css') }}" rel="stylesheet">
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

                    </ul>

                </div>


                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                    @csrf
                    @foreach ($retrieveData as $item)
                        <input type="hidden" name="someData[]" value="{{ $item }}">
                    @endforeach
                    <div class="">
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
                        <div>
                            <label for="">Pays</label>
                            <select id="countries_states1" class="form-control bfh-countries" data-country="Default"
                                name="country" required></select>
                        </div>
                        <div>
                            <label for="states">Region</label>
                            <select class="form-control bfh-states" id="countries_state"
                                data-country="countries_states1" name="region" required> </select>
                        </div>
                        <div>
                            <label>N° de téléphone</label>
                            <input type="text" name="numero" id="number" placeholder="e.g 70xxxxxx">
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
                    <div class="btn-group">
                        <button type="submit" name='submit' class="btn-pr btn-submit ">Envoyer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/country_code.js') }}"></script>

</body>

</html>
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

    $('#telephone').keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('.errormsg2').html("Des chiffres uniquement").show().fadeOut('slow');

            return false;
        }
    });
</script>
