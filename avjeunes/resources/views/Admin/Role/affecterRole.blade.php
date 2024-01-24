@extends("Template.otherTemplate")


@section("title")
   Affecter roles
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
                                    <h4 class="card-title">Affecter role</h4>
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
                                            <div class="col-sm-6 offset-3 justify-content-center">
                                                <form action="{{route('save-affecter-role-admin')}}" method="POST">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <th>Choix</th>
                                                            <th>Role</th>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($roles as $role)
                                                            <tr>
                                                                <td><input type="checkbox" class="select" name="roleID[]" value="{{$role->id}}" /></td>
                                                                <td>{{$role->libelle}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                        <br/>
                                                    <div class="row justify-content-center">
                                                        <div class="form-group justify-content-center">
                                                            <div class="col-sm-6 " >
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <input type="hidden" name="userID" value="{{$userID}}" />
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Affecter</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>


                                        <div class="col-sm-12">

                                            <table id="table" class="table table-bordered table-condensed" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Ref</th>
                                                    <th>Role</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($affectations as $affectation)
                                                    <tr class="item{{$affectation->id}}">
                                                        <td>{{$affectation->role->id}}</td>
                                                        <td>{{$affectation->role->libelle}}</td>
                                                        <td>
                                                          <button type="button" class="btn btn-outline-danger delete-modal"
                                                          data-id="{{$affectation->id}} "
                                                          >Supprimer</button>
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

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('delete-affecter-role-admin')}}" method="POST">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Retirer un role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment retirer ce role ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user-id" name="affectationID" />
                    <input type="hidden" name="_token" value="{{Session::token()}}" />
                    <button type="submit" class="btn btn-danger">Retirer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script>
        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#user-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });
    </script>
@endsection