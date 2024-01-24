@extends("Template.otherTemplate")


@section("title")
    Likes des conseils pratiques
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
                                    <h4 class="card-title">Conseils Pratiques</h4>
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

                                                    <h4>Likes des conseils pratiques</h4>

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

                                                @if(count($likes) > 0)
                                                <a class="btn btn-success" href="{{route('export-like-conseil-pratique')}}?debut={{$debut}}&fin={{$fin}}">
                                                    Exportez en Excel
                                                </a>
                                                <br/>
                                                <br/>
                                                @endif

                                            <table id="table" class="table table-bordered table-condensed " cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Ref</th>
                                                    <th>N° Téléphone</th>
                                                    <th>Sexe</th>
                                                    <th>Age</th>
                                                    <th>Profession</th>
                                                    <th>Région</th>
                                                    <th>Thème liké</th>
                                                    <th>Date like</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($likes as $like)
                                                    <tr class="item{{$like->id}}">
                                                        <td>{{$like->id}}</td>
                                                        
                                                        <td>{{$like->telephone}}</td>
                                                        <td>{{$like->sexe}}</td>
                                                        <td> {{$like->age}} </td>
                                                        <td> {{$like->profession}} </td>
                                                        <td> {{$like->region}} </td>
                                                        <td><b style="color: green;font-size: 20px;">{{$like->conseilpratique->titre}}</b></td>
                                                        <td>{{date_format(date_create($like->created_at), "d/m/Y")}}</td>
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