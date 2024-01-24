@extends("Template.otherTemplate")


@section("title")
    Bienvenue sur eCentre Convivial
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include("HeaderNav.navFormationSanitaire")
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include("Profile.formationSideProfil")

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Les demandes de consultations <b style="color: blue;"> {{\App\FormationSanitaire::where("id", $utilisateur->formation_sanitaire_id)->first()->libelle}}</b></h4>
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

                                            <table id="table" class="table table-bordered table-striped  table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Consultant</th>
                                                    <th>Objet Consulation</th>
                                                    <th>Motif de la consultation</th>
                                                    <th>Résultat de la consultation</th>
                                                    <th>Status</th>
                                                    <th>Reçu</th>
                                                    {{--<th>Action</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($consultations as $consultation)
                                                    <tr>
                                                        <td>{{date_format(date_create($consultation->created_at),"d M Y") }}</td>
                                                        <td><b>{{\App\User::where("id", $consultation->user_id)->first()->username}}</b></td>
                                                        <td><b>{{\App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle}}</b></td>
                                                        <td>{{$consultation->description}}</td>
                                                        <td><b><span style="color: red;">Non défini</span></b></td>
                                                        <td>
                                                            <label class="badge badge-danger badge-pill">Attente</label>
                                                        </td>
                                                        <td>
                                                            <form action="{{route('confirmReceptionConsultation')}}" method="POST">
                                                                <input type="hidden" name="id" value="{{$consultation->id}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                        <button type="submit" class="btn btn-outline-success">Reçu</button>
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
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="#">Centre Convivial</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed by Drigue <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::get("logged") == true)
            showSwal('success-message');
            $(".swal-title").html("Bonjour {{$utilisateur->username}} . Bienvenue sur eCentre Convivial. Vous etes associé à la formation sanitaire {{\App\FormationSanitaire::where("id", $utilisateur->formation_sanitaire_id)->first()->libelle}}
                ");
            $(".swal-text").hide();
            $(".swal-button").text("Continuer");
            @endif

            {{Session::put("logged", false)}}
        });
    </script>

@endsection