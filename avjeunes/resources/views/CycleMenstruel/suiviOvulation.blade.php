@extends("Template.otherTemplate")


@section("title")
Suivi d'ovulation
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
                                {{--<h4 class="card-title">Suivi de règles</h4>--}}
                                <div class="row">
                                    <div class="col-12">
                                        <fieldset>
                                            <legend><h3>Suivi d'ovulation</h3></legend>
                                            @if(!$suivi)
                                            <form class="form form-horizontal" action="{{route('postSuiviOvulation')}}" method="POST">

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
                                                            <label class="col-sm-4 col-form-label">Durée du cycle</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="dureeCycle" required>
                                                                    <option disabled selected>Sélectionner la durée du cycle</option>
                                                                    @for($i =21; $i <= 40 ; $i++)
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
                                                            <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Suivre ovulation</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @endif
                                        </fieldset>

                                        <table  class="table table-bordered table-responsive " cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Date de votre dernière règle</th>
                                                    <th>Durée de votre cycle</th>
                                                    <th>Date probable de votre prochaine ovulation</th>
                                                    <th>Annuler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($menstruations as $menstruation)
                                                <tr>
                                                    {{--<td>{{$menstruation->created_at->format("d M Y")}}</td>--}}
                                                    <td>{{date_format(date_create($menstruation->dateRegle),"d M Y")}}</td>
                                                    <td><b>{{$menstruation->dureeCycle}}</b></td>
                                                    <td><b>{{date_format(date_create($menstruation->dateProchainOvulation),"d M Y")}}</b></td>
                                                    <td>
                                                            <button class="btn btn-outline-danger delete-modal"
                                                            data-id = "{{$menstruation->id}}">Annuler</button>
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
        <div class="modal-dialog modal-lg" role="document" style="width: 60%;">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('postDeleteSuiviOvulation')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Annulation de suivi de période d'ovulation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 style="text-align: center;color: red;">Pour quelle raison voulez-vous annuler votre souscription au suivi de période d'ovulation ?</h5>
                        <br/>
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Votre explication</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="4" name="description" placeholder="Expliquez pourquoi vous voulez annuler votre souscription au suivi de période d'ovulation ..." required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id" name="id" />
                        <input type="hidden"  name="_token" value="{{Session::token()}}" />
                        <button type="submit" class="btn btn-danger">Envoyer</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            @if(Session::get("suivi-ovulation") == true)
            showSwal('success-message');
            $(".swal-title").html("Information");
            $(".swal-text").html("<b>{{Session::pull("ovulation-message")}}</b>");
            $(".swal-button").text("Ok");
            {{Session::put("suivi-ovulation", false)}}
            @endif

            @if(Session::get("suivi-ovulation-annuler") == true)
            showSwal('success-message');
            $(".swal-title").html("Information");
            $(".swal-text").html("<b>Suivi de période d'ovulation annulé. Vous ne recevrez plus de notifications pour un bon suivi" +
                " de vos périodes d'ovulation</b>");
            $(".swal-button").text("Ok");
            {{Session::put("suivi-ovulation-annuler", false)}}
            @endif

        });

        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });
    </script>
    @endsection