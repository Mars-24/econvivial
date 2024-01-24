<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription-econvivial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                

                @if (Session::has('erreur'))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <p>{{ Session::pull('erreur') }} </p>
                        </div>
                    </div>
                @endif --}}


                <div class="subscribe-container">
                    {{-- @if (Session::has('message')) --}}
                    <div class="form-group">
                        <div class="alert alert-success">
                            {{-- <p>{{ Session::pull('message') }} </p> --}}
                            <p>Veuillez souscrire a une offre</p>
                        </div>
                    </div>
                    {{-- @endif --}}
                    @foreach ($plans as $plan)
                        <div class="subscribe-form">
                            <div class="notice"> Le plus populaire</div>
                            <section class="header">
                                <h2>{{ $plan->name }}</h2>
                                <h4>{{ $plan->slug }}</h4>
                            </section>
                            <section class="body">
                                <button class="button">Seulement</button>
                                <h2>{{ $plan->price }} €/mois</h2>

                                <a href="{{ route('order.subscribe', $plan->id) }}"><button
                                        class="button button-pink">Commander</button></a>

                                @php
                                    $descriptions = explode('-', $plan->description);
                                @endphp
                                <div class="service">
                                    <ul>
                                        @foreach ($descriptions as $description)
                                            <li> - {{ $description }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script>
        setTimeout(() => {
            $('.form-group').css('display', 'none')
        }, 7000);
    </script>


</body>

</html>
