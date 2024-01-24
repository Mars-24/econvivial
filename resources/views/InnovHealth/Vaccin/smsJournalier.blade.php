@extends("Template.otherTemplate")


@section("title")
    Rapports d'alertes SMS journalier suivi grossesse
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
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
                                    <h4 class="card-title">Rapport journalier d'alerte SMS de suivi de vaccination</h4>
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

                                            <table id="table" class="table table-bordered table-condensed" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Nombre utilisateur</th>
                                                    <th>Terminer avec succès</th>
                                                    <th>Détail Rapport</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rapports as $rapport)
                                                    <tr class="item{{$rapport->id}}">
                                                        <td><b>{{date_format(date_create($rapport->created_at), "d M Y")}}</b></td>
                                                        <td>{{$rapport->description}} du {{date_format(date_create($rapport->created_at), "d M Y")}}</td>
                                                        <td>{{$rapport->nombreUser}}</td>
                                                        <td>
                                                            @if(!$rapport->terminer)
                                                                <label class="badge badge-danger badge-pill">NON</label>
                                                            @else
                                                                <label class="badge badge-success badge-pill">OUI</label>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form action="{{route('detail-rapport-suivi-grossesse')}}" method="GET">
                                                                <input type="hidden" value="{{$rapport->id}}" name="ref"/>
                                                                <input type="hidden" value="journalier" name="page"/>
                                                                <input type="hidden" value="{{Session::token()}}" name="_token"/>
                                                                <button type="submit"  class="btn btn-outline-success"
                                                                >Détail rapport</button>
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
