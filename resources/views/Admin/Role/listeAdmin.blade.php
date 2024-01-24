@extends("Template.otherTemplate")


@section("title")
    Gestion administrateurs
@endsection


@section("body")

    <div class="container-scroller">
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
                                    <h4 class="card-title">Gestions des administrateurs</h4>
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <table id="table" class="table table-bordered table-condensed" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Nom utilisateur</th>
                                                    <th>Email</th>
                                                    <th>Affecter role</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="item{{$user->id}}">
                                                        <td>{{$user->username}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <form action="{{route('affecter-role-admin')}}" method="GET">
                                                            <input type="hidden" value="{{$user->id}}" name="id"/>
                                                            <input type="hidden" value="{{Session::token()}}" name="_token"/>
                                                            <button type="submit" class="btn btn-outline-success" >Affecter</button>
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