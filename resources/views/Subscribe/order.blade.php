<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-escal=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inscription-econvivial</title>
    <link href="{{ asset('resources/css/log.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/subscribe.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/js/regi.js') }}">
    <link href="{{ asset('resources/js/bootstrap.js') }}">
    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
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

                @if (Session::has('message'))
                    <div class="form-group">
                        <div class="alert alert-success">
                            <p>{{ Session::pull('message') }} </p>
                        </div>
                    </div>
                @endif

                @if (Session::has('erreur'))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <p>{{ Session::pull('erreur') }} </p>
                        </div>
                    </div>
                @endif --}}


                <div class="order-container">
                    <div class="heading">
                        <table>
                            <tr>
                                <td><img src="{{ asset('../images/econvivial.png') }}" alt="" class="img-logo">
                                </td>
                                <td class="right">Paris, le <span
                                        class="date">{{ \Carbon\Carbon::now()->translatedFormat('j/m/Y') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>ECONVIVIAL <br>
                                    Service Comptabilité</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>15, rue des halles <br>
                                    PARIS</td>

                                <td class="right"> Client : {{ \Auth::user()->codeUser }} <br>
                                    Code Pays : {{ \Auth::user()->nationalite }}</td>
                            </tr>
                            <tr>
                                <td>N° Siret : <br>
                                    N° TVA :</td>
                                <td></td>
                            </tr>
                        </table>

                        <table class="order-table">
                            <thead>
                                <tr>
                                    <td>Services</td>
                                    <td>Détails</td>
                                    <td>Tarifs</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Souscription à l’offre {{ $plan->name }} ( {{ $plan->slug }} ) – durée :
                                        <span class="quantity">3</span>
                                        mois
                                    </td>
                                    <td>
                                        <div class="detail-table" id="open">Détails <div class="detail-btn"></div>
                                        </div>
                                    </td>
                                    <td> <span class="cost">{{ $plan->price * 3 }}</span> €</td>
                                </tr>
                                <tr>
                                    <td colspan=2>Modifier la durée d’engagement : <input type="number" value="3"
                                            min="3" data-cost="{{ $plan->price }}">mois<button>Mettre a jour le
                                            devis</button></td>
                                    <td>Total HT : <span class="cost">{{ $plan->price * 3 }}</span> € <br>
                                        TVA (0,0%) :
                                        0€ <br> <span class="cost">{{ $plan->price * 3 }}</span> € TTC</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="facture-ref">
                            <p><span>FACTURE PROFORMA</span> : Référence <span>ECC-SEL-0000001</span></p>
                        </div>
                    </div>
                    @if ($plan->name == 'Sucre')
                        <div class="payement">
                            <h3>Pour régler cette facture:</h3>
                            <div class="payement-option-free">
                                <a href=""><button class="button button-pink">Souscrire a
                                        l'offre</button></a>
                            </div>
                            <form action="{{ route('submit.free') }}" method="POST" class="submit-free"
                                style="display: none">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                                <input type="hidden" name="status" value="actif">
                                <input type="hidden" class="quantity-feda" name="quantity">
                                <input type="hidden" name="type_abonnement" value="{{ $plan->name }}">
                                <input type="hidden" name="price" class="amount">

                            </form>
                        </div>
                    @else
                        <div class="payement">
                            <h3>Pour régler cette facture:</h3>
                            <div class="payement-option">
                                <div class="carte" id="open-stripe">
                                    <img src="{{ asset('../images/paypal.png') }}" alt="">
                                    <h3>Carte bancaire</h3>
                                    <h4>Sécurisé par Stripe</h4>
                                </div>
                                <div class="paypal">

                                    <div class="paypal-1">
                                        <img src="{{ asset('../images/paypal.png') }}" alt="">
                                        <h3>Paypal</h3>
                                        <h4>Sécurisé par Paypal</h4>
                                    </div>
                                    <div class="paypal-1">
                                        <img src="{{ asset('../images/paypal.png') }}" alt="">
                                        <h3>Carte bancaire</h3>
                                        <h4>Sécurisé par paypal</h4>
                                    </div>
                                    {{-- formulaire de paiemant paypal --}}
                                    <form action="{{ route('submit.paypal') }}" method="post" class="submit-paypal"
                                        style="display: none">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                                        <input type="hidden" name="status" value="actif">
                                        <input type="hidden" class="quantity-feda" name="quantity">
                                        <input type="hidden" name="type_abonnement" value="{{ $plan->name }}">
                                        <input type="hidden" name="price" class="amount-paypal" value="{{ $plan->price * 3 }}">
                                    </form>
                                </div>
                                <div class="mobile">

                                    <div class="paypal-1" id="pay-btn">
                                        <img src="{{ asset('../images/paypal.png') }}" alt="">
                                        <h3>Carte bancaire</h3>
                                        <h4>Sécurisé par Fedapay</h4>
                                    </div>
                                    {{-- formulaire de paiemant fedapay --}}
                                    <form action="{{ route('submit.feda') }}" method="POST" class="submit-feda"
                                        style="display: none">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                                        <input type="hidden" name="status" value="actif">
                                        <input type="hidden" class="quantity-feda" name="quantity">
                                        <input type="hidden" name="type_abonnement" value="{{ $plan->name }}">
                                        <input type="hidden" name="price" class="amount">

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
        <div class="modal-container" id="modal-container">
            <div class="modal">
                <h1>Details de la facture</h1>

                <table>
                    <thead>
                        <tr>
                            <td>Détails ECC-SEL-0000001</td>
                            <td>Expiration actuelle : <span
                                    class="new-date">{{ \Carbon\Carbon::now()->addMonth(3)->translatedFormat('j/m/Y') }}</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $descriptions = explode('-', $plan->description);
                        @endphp
                        <tr>
                            <td class="desc-tableau">
                                <ul>
                                    @foreach ($descriptions as $description)
                                        <li> - {{ $description }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="price">Montant total HT : <span class="cost">{{ $plan->price * 3 }}</span>
                                €
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button id="close">Fermer</button>
            </div>
        </div>
        <div class="modal-container" id="stripe-container">
            <div class="modal">
                <h2 class="title">Payement par Stripe</h2>

                <div class="small-container cart-page">
                    <table class="payement">
                        <tr class="payement-th">
                            <th class="payement-th">Information de la carte</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="">
                                    <div class="">
                                        <form id="payment-form" action="{{ route('checkout') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="plan" value="{{ $plan->id }}">
                                            <input type="hidden" name="quantity" value="3" id="qty">
                                            <input type="text" name="name" id="card-holder-name"
                                                class="form-control" placeholder="Nom">

                                            <div id="card-element">

                                            </div>
                                            <div id="card-errors" role="alert"></div>

                                            <button type="submit" class="btn-paye" id="card-button"
                                                data-secret="{{ $intent->client_secret }}">Proceder au
                                                Payement</button>


                                        </form>
                                    </div>
                                </div>

                    </table>
                </div>

                <button id="close-stripe">Retour</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('../js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('../js/modal-order.js') }}"></script>
    <script src="{{ asset('../js/stripe-code.js') }}"></script>
   
    <script>
        var submit_free = $('.button');
        submit_free.on('click', function(e) {
            e.preventDefault();
            console.log('clicker');
            $('.submit-free').submit();
        });
    </script>
    <script>
        var amount = $('.cost')[0].innerText;
        var qty = $('.quantity')[0].innerText;
        var qty_feda = $('.quantity-feda').attr('value', qty);
        var amount_feda = $('.amount').attr('value', amount);

      

        window['amount'] = parseInt((amount = $('.cost')[0].innerText) * 650);
        console.log(amount);

        FedaPay.init('#pay-btn', {
            public_key: 'pk_sandbox_dGrLjnnEvdaKhdC6c7uA_IJw',
            environment: 'sandbox',
            transaction: {
                amount: amount,
                description: 'Abonnement econvivial {{ $plan->name }}"',
            },
            form_selector: ".submit-feda",
            submit_form_on_failed:false,
            customer: {
                email: '{{ \Auth::user()->email }}',
                lastname: '',
                firstname: '',
            }
        });
        $('input[type="number"]').on('click', function() {
            window['amount'] = parseInt(amount = $('.cost')[0].innerText) * 650;
            var qty = $('.quantity')[0].innerText;

            var qty_feda = $('.quantity-feda').attr('value', qty);
            var amount_feda = $('.amount').attr('value', amount);

            FedaPay.init('#pay-btn', {
                public_key: 'pk_sandbox_dGrLjnnEvdaKhdC6c7uA_IJw',
                transaction: {
                    amount: amount,
                    description: 'Abonnement econvivial {{ $plan->name }}"',
                },
                submit_form_on_failed:false,
                customer: {
                    email: '{{ \Auth::user()->email }}',
                    lastname: '',
                    firstname: '',
                },
                form_selector: ".submit-feda",
            });

        });
    </script>

<script>
    var paypal = $('.paypal');
    console.log('test');
    console.log($('.amount')[0].innerText);

    var paypalSubmit = $('.submit-paypal');
     paypal.on('click', function(e) {
        console.log('clické');
         paypalSubmit.submit();
     });
</script>


</body>

</html>
