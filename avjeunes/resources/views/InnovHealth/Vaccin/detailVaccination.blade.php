@extends("Template.otherTemplate")


@section("title")
   Calendrier de vaccination
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovVacciProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Dates probables des CPN</h4>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-8">

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

                                            <table id="table" class="table table-bordered table-condensed table-striped" cellspacing="0">

                                                <tbody>

                                                <tr>
                                                    <td><b>Nom du bénéficiaire</b></td>
                                                    <td>{{$beneficiaire->nom}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Prénom du bénéficiaire</b></td>
                                                    <td>{{$beneficiaire->prenom}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Numéro Téléphone</b></td>
                                                    <td>{{$beneficiaire->telephone}}</td>
                                                </tr>

                                                @if($beneficiaire->region_id != null)
                                                <tr>
                                                    <td><b>Région</b></td>
                                                    <td>{{\App\Region::where("id", $beneficiaire->region_id)->first()->libelle}}</td>
                                                </tr>
                                                @endif

                                                @if(\App\LanguePreference::where("beneficiaire_id",$beneficiaire->id )->first() != null)
                                                <tr>
                                                    <td><b>Langue de préférence</b></td>
                                                    <td>{{\App\LanguePreference::where("beneficiaire_id",$beneficiaire->id )->first()->libelle}}</td>
                                                </tr>
                                                @endif

                                                <tr>
                                                    <td><b>Patient PTME</b></td>
                                                    <td>@if($beneficiaire->ptme) OUI @else  NON @endif</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="text-align: center;"><b style="font-size: 20px;">Dates probables des vaccinations</b></td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <th>Ieme CPN</th>
                                                <th>Date probable Vaccination</th>
                                                <th>Vaccin</th>
                                                </thead>

                                                <tbody >

                                                @foreach($dateVaccinations as $dateVaccination)
                                                    <tr>
                                                        <td> <b>{{$dateVaccination->semaine}}</b></td>
                                                        <td>  <b> Semaine du {{$dateVaccination->dateProbable}}</b></td>
                                                        <td>  <b> Semaine du {{$dateVaccination->libelleVaccin}}</b></td>
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