@extends("Template.otherTemplate")


@section("title")
    Planning famillial | Souscriptions
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
                                    <h4 class="card-title">Souscriptions</h4>
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


                                            <table id="table" class="table table-bordered table-condensed  @if(count($plannings) >0 ) table-responsive @endif" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Ref</th>
                                                    <th>Planning</th>
                                                    <th>Type</th>
                                                    <th>Code utilisateur</th>
                                                    <th>Date contraception</th>
                                                    <th>Durée contraception</th>
                                                    <th>Méthode</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($plannings as $planning)
                                                    <tr class="item{{$planning->id}}">
                                                        <td>{{$planning->id}}</td>
                                                        <td>{{\App\Planning::where("id", $planning->planning_id)->first() != null ?\App\Planning::where("id", $planning->planning_id)->first()->titre : "No title"}}</td>
                                                        <td>{{\App\Planning::where("id", $planning->planning_id)->first() != null ?\App\Planning::where("id", $planning->planning_id)->first()->type : "Unknown type"}}</td>
                                                        <td>{{ \App\User::where("id", $planning->user_id)->first() != null ? \App\User::where("id", $planning->user_id)->first()->codeUser : "DHJDKOD" }}</td>
                                                        <td>{{$planning->dateContraception }}</td>
                                                        <td>{{$planning->dureeContraception }}</td>
                                                        <td>{{$planning->methode }}</td>
                                                        <td>  <button class="btn btn-outline-danger delete-modal"
                                                                      data-id = "{{$planning->id}}">Supprimer</button></td>
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
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer une série</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cette souscription?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="serie-id" />
                    <button type="button" class="btn btn-danger delete-serie">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>


        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#serie-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-serie").on("click", function () {
            var id =  $("#serie-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('delete-souscription-planning')}}",
                data:{
                    '_token': '{{Session::token()}}',
                    'id': id
                },
                success: function(data){
                    $("#deleteModal").modal("hide");
                    $('.item'+ id).remove();

                },
                error :function(data){
                    $("#deleteModal").modal("hide");
                    alert("Une erreur s'est produite, impossible de supprimer la ville");
                }
            });
        });

    </script>

@endsection