@extends("Template.otherTemplate")


@section("title")
    Mes RDV de consultations en attentes
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
         @include("HeaderNav.nav")   
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
         @include("Profile.sideProfil")        
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Consultations effectuées</h4>
                                    <div class="row">
                                        <div class="col-12">

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

                                            <table id="table" class="table table-bordered table-striped table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Objet Consulation</th>
                                                    <th>Formation sanitaire</th>
                                                    <th>Motif de la consultation</th>
                                                    <th>Résultat de la consultation</th>
                                                    <th>Status</th>
                                                    {{--<th>Action</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($consultations as $consultation)
                                                <tr>
                                                    <td>{{date_format(date_create($consultation->created_at),"d M Y") }}</td>
                                                    <td><b>{{\App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle}}</b></td>
                                                    <td><b>{{\App\FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first()->libelle}}</b></td>
                                                    <td>{{$consultation->description}}</td>
                                                    <td><b> @if(!$consultation->result) <span style="color: red;"> Non défini</span> @else  <a class="btn btn-outline-success" href="#" target="_blank">Télécharger</a>  @endif</b></td>
                                                    <td>
                                                        @if(!$consultation->result)
                                                        <label class="badge badge-danger badge-pill">Attente</label>
                                                            @else
                                                            <label class="badge badge-success badge-pill">Effectuée</label>
                                                        @endif
                                                    </td>
                                                    {{--<td>--}}
                                                        {{--<button class="btn btn-outline-primary">Voir</button>--}}
                                                    {{--</td>--}}
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