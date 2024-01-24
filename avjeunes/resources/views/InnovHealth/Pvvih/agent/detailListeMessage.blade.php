@extends("Template.otherTemplate")


@section("title")
   Liste des destinataires du message
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
                                    <h4 class="card-title">Liste des destinataires du message diffusé le {{date_format(date_create($message->created_at),"d M Y")}}</h4>
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

                                                <table id="table" class="table table-bordered table-condensed table-striped table-responsive" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Téléphone</th>
                                                        <th>Langue</th>
                                                        <th>PTME</th>
                                                        <th>Dernière Règle</th>
                                                        <th>Durée Grossesse</th>
                                                        <th>Date Acouchement</th>
                                                        <th>Reçu</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($detailMessages as $detail)
                                                        <tr class="item{{$detail->beneficiaire->id}}">
                                                            <td>{{$detail->beneficiaire->code}}</td>
                                                            <td>{{$detail->beneficiaire->nom}}</td>
                                                            <td>{{$detail->beneficiaire->prenom}}</td>
                                                            <td><b>{{$detail->beneficiaire->telephone}}</b></td>
                                                            <td>{{\App\LanguePreference::where("beneficiaire_id",$detail->beneficiaire->id)->first()->libelle}}</td>
                                                            <td>@if($detail->$beneficiaire->ptme) OUI @else  NON @endif</td>
                                                            <td>{{date_format(date_create($detail->beneficiaire->dateRegle),"d M Y")}}</td>
                                                            <td><b>{{$detail->$beneficiaire->dureeGrossese}} semaine(s)</b></td>
                                                            <td><b>{{date_format(date_create($detail->beneficiaire->dateFinSuivi),"d M Y")}}</b></td>

                                                            <td>
                                                                @if(!$detail->recu)
                                                                    <label class="badge badge-danger badge-pill">NON</label>
                                                                @else
                                                                    <label class="badge badge-success badge-pill">OUI</label>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

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