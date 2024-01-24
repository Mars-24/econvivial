@extends("Template.otherTemplate")


@section("title")
    Suivis de vaccination à terme
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
                                    <h4 class="card-title">Suivi de vaccination à terme</h4>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group row">
                                                <label class="control-label">CPN :
                                                @if($formationSanitaire != null)
                                                    {{$formationSanitaire->libelle}}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-8"></div>
                                    </div>
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
                                                    <th>Date Acouchement</th>
                                                    <th>Age bébé</th>
                                                    <th>Nom bébé</th>
                                                    <th>Voir Date vaccination</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($grossesses as $grossesse)
                                                    <tr class="item{{$grossesse->id}}">
                                                        <td>{{$grossesse->code}}</td>
                                                        <td>{{$grossesse->nom}}</td>
                                                        <td>{{$grossesse->prenom}}</td>
                                                        <td><b>{{$grossesse->telephone}}</b></td>
                                                        <td>{{\App\LanguePreference::where("beneficiaire_id",$grossesse->id)->first()->libelle}}</td>
                                                        <td>@if($grossesse->ptme) OUI @else  NON @endif</td>
                                                        <td>{{date_format(date_create($grossesse->dateAccouchement),"d M Y")}}</td>
                                                        <td><b>{{$grossesse->ageBebe}} mois(s)</b></td>
                                                        <td><b>{{$grossesse->nomBebe}}</b></td>

                                                        <td>
                                                            <form action="{{route('detail-suivi-vaccination')}}" method="GET">
                                                                <input type="hidden" name="ref" value="{{$grossesse->id}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <input type="hidden" name="page" value="terme" />
                                                                <button type="submit"  class="btn btn-primary">Vaccination</button>
                                                            </form>
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
