@extends("Template.otherTemplate")


@section("title")
    Rapports d'alertes SMS
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste des rapports</h4>
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

                                                <div class="col-sm-12">

                                                    <h4>Consulter le rapport périodique</h4>

                                                    <form action="" method="GET">
                                                        <div class="row" style="margin-bottom: 30px;">


                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Date de :</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d')}}" value="{{$debut}}" type="date" name="debut" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Date à :</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d')}}" value="{{$fin}}" type="date" name="fin" required />
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Rechercher</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>

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
                                                                <form action="{{route('detail-rapport-alerte-sms')}}" method="GET">
                                                                    <input type="hidden" value="{{$rapport->id}}" name="ref"/>
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