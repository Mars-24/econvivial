@extends("Template.otherTemplate")


@section("title")
    Mes consultations effectuées
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    
         @include("HeaderNav.nav")   
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
         @include("Profile.sideProfil")   
         
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Mes consultations effectuées</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <table id="table" class="table table-bordered table-striped table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    {{--<th>Situation Matri</th>--}}
                                                    <th>Voyage Régulièrement</th>
                                                    <th>Objet Consulation</th>
                                                    <th>Formation sanitaire</th>
                                                    <th>Ma description</th>
                                                    <th>Status</th>
                                                    {{--<th>Action</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($consultations as $consultation)
                                                    <tr>
                                                        <td>{{$consultation->created_at}}</td>
                                                        {{--<td>{{$consultation->situation}}</td>--}}
                                                        <td>@if($consultation->voyage) <span><b>OUI</b></span> @else  <span><b>NON</b></span> @endif</td>
                                                        <td><b>{{\App\ObjetConsultation::where("id", $consultation->objet_consultation_id)->first()->libelle}}</b></td>
                                                        <td><b>{{\App\FormationSanitaire::where("id", $consultation->formation_sanitaire_id)->first()->libelle}}</b></td>
                                                        <td>{{$consultation->description}}</td>
                                                        <td>
                                                            <label class="badge badge-success badge-pill">Effectuée</label>
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


@endsection