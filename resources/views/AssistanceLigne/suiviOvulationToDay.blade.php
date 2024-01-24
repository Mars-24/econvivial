@extends("Template.otherTemplate")


@section("title")
    Souscriptions au suivi d'ovulation
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.navTeleConseiller")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        @include("Profile.teleConseillerSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Suivi d'ovulation : Prochaine ovulation dans 48 heures</h4>
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

                                                <form action="{{route('postAlertDeSuiviDeOvulation')}}" method="POST">
                                            <table id="table" class="table table-bordered table-condensed table" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" class="form-control" id="selectAll"/> Tout Sélectionnez </th>
                                                    <th>Nom utilisateur</th>
                                                    <th>Date dernière règle</th>
                                                    <th>Durée du cycle</th>
                                                    <th>Date probable prochaine ovulation</th>
                                                    <th>Status</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($menstruations as $menstruation)
                                                    <tr>
                                                        <td><input type="checkbox"  class="select" name="userID[]" value="{{$menstruation->id}}" /></td>
                                                        <td><b>{{\App\User::where("id", $menstruation->user_id)->first()->username}}</b></td>
                                                        <td>{{date_format(date_create($menstruation->dateRegle),"d/m/y") }}</td>
                                                        <td>{{$menstruation->dureeCycle}}</td>
                                                        <td><b>{{date_format(date_create($menstruation->dateProchainOvulation),"d/m/y")}}</b></td>
                                                        <td>
                                                            <label class="badge badge-success badge-pill">Suivi</label>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                                    <div class="row justify-content-center">
                                                        <div class="form-group justify-content-center">
                                                            <div class="col-sm-6 " >
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Envoyer les SMS</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
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

    <script>

        $("#selectAll").on("change", function(){

            var x = document.getElementById("selectAll").checked;

            if(x === true){
                $(".select").prop("checked", true);
            }else{
                $(".select").prop("checked", false);
            }
        });
    </script>

@endsection