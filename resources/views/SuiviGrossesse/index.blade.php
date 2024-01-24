@extends("Template.mainTemplate")


@section("title")
    Suivi de grossesse
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
         @include("HeaderNav.nav")   
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
         @include("Profile.sideProfil")   
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Consultations effectuées</h4>
                                        @if($grossesse == null)
                                        <form class="form form-horizontal" action="{{route('postSaveSuiviGrossesse')}}" method="POST" style="margin-top: 20px;">

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

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Date dernière règle</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" required class="form-control" name="dateRegle" placeholder="Date de dernière règle" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Nombre de semaine de grossesse</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" name="nbreSemaine" required>
                                                                <option disabled selected>Sélectionner le nombre de semaine</option>
                                                                @for($i =1; $i <= 37 ; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                    @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="form-group justify-content-center">
                                                    <div class="col-sm-6 " >
                                                        <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                        <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Suivre grossesse</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @endif

                                    <div class="col-sm-10 offset-1">       
                                    <div class="form-group" style="margin-top: 30px;">
                                        <table class="table table-bordered table-condensed table-responsive" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Date de la dernière règle</th>
                                                <th>Semaine de grossesse</th>
                                                <th>Status</th>
                                                <th>Annuler</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($grossesses as $grossesse)
                                                <tr >
                                                    <td>{{date_format(date_create($grossesse->dateRegle),"d M Y") }}</td>
                                                    <td>{{$grossesse->nbreSemaine + $otherWeek}}</td>
                                                    <td>
                                          <label class="badge badge-success badge-pill">Grossesse en cours</label>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-outline-danger delete-modal" data-id = "{{$grossesse->id}}">Annuler</button>
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

    <!-- container-scroller -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 60%;">
            <div class="modal-content" style="background-color: white;">
                <form  action="{{route('postDeleteSuiviGrossesse')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Annulation de suivi de grossesse</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h5 style="text-align: center;color: red;">Pour quelle raison voulez-vous annuler votre souscription au suivi de grosesse ?</h5>
                        <br/>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Votre explication</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="4" name="description" placeholder="Expliquez pourquoi vous voulez annuler votre souscription au suivi de grossesse ..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id" name="id" />
                        <input type="hidden"  name="_token" value="{{Session::token()}}" />
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-danger">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            @if(Session::get("suivi") == true)
            showSwal('success-message');
            $(".swal-title").html("Information");
            $(".swal-text").html("<b>Demande de suivi de grossesse prise en compte. Vous recevrez régulièrement des notifications pour un bon suivi de la grossesse</b>");
            $(".swal-button").text("Ok");
            {{Session::put("suivi", false)}}
            @endif

            @if(Session::get("suivi-annuler") == true)
            showSwal('success-message');
            $(".swal-title").html("Information");
            $(".swal-text").html("<b>Suivi de grossesse annulé. Vous ne recevrez plus de notifications pour un bon suivi" +
                " de grossesse</b>");
            $(".swal-button").text("Ok");
            {{Session::put("suivi-annuler", false)}}
            @endif
        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });
    </script>
@endsection