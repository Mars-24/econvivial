@extends("Template.otherTemplate")


@section("title")
   Modules de Quiz
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
                                    <h4 class="card-title">Nouveau module de QUIZ</h4>
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
                                                <form action="{{route('save-new-quiz')}}" method="POST">
                                                    <div class="row" style="margin-bottom: 30px;">
                                                        <div class="row">

                                                            <div class="col-sm-12">
                                                                <div class="form-group row">

                                                                    <label class="control-label col-sm-3">Thème</label>
                                                                    <div class="col-sm-9">
                                                                        <input class="form-control" type="text" name="theme" placeholder="Thème du quiz" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Description du thème</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control" rows="4" type="text" name="description" placeholder="Description du thème" ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <div class="form-group">
                                                            <div class="col-sm-6"  >
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Enrégistrer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


                                            <br/>

                                            <table id="table" class="table table-bordered table-condensed " cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Ref</th>
                                                    <th>Libellé</th>
                                                    <th>Description</th>
                                                    <th>Nombre Question associé</th>
                                                    <th>Etat du  QUIZ</th>
                                                    <th>Activer / Désactiver</th>
                                                    <th>Détail</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($modules as $module)
                                                    <tr class="item{{$module->id}}">
                                                        <td>{{$module->id}}</td>
                                                        <td>{{$module->libelle}}</td>
                                                        <td>{{$module->description}}</td>
                                                        <td> {{count(\App\QuizQuestion::where("quiz_module_id", $module->id)->get())}} </td>
                                                        <td><b>{{$module->actif ? "ACTIF" : "NON ACTIF"}}</b></td>

                                                        <td>
                                                            <form action="{{route('change-quiz-statut')}}" method="POST">
                                                                <input type="hidden" name="id" value="{{$module->id}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <button type="submit" class="btn @if($module->actif) btn-danger @else btn-success @endif">
                                                                    @if($module->actif) Désactiver @else Activer @endif
                                                                </button>
                                                            </form>
                                                        </td>

                                                        <td>
                                                            <form action="{{route('detail-add-new-qui-question')}}" method="GET">
                                                                <input type="hidden" name="ref" value="{{$module->id}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <button type="submit" class="btn btn-primary">Détail</button>
                                                            </form>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-outline-danger delete-modal" data-id = "{{$module->id}}" >Supprimer</button>
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
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un QUIZ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer ce QUIZ ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="module-id" />
                    <button type="button" class="btn btn-danger delete-module">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>


        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#module-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-module").on("click", function () {
            var id =  $("#module-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('delete-quiz-module')}}",
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
                    alert("Une erreur s'est produite, impossible de supprimer ce QUIZ")
                }
            });
        });

    </script>

@endsection