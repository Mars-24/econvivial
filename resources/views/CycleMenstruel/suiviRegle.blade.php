@extends("Template.otherTemplate")


@section("title")
  Suivi de règle
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
                                    {{--<h4 class="card-title">Suivi de règles</h4>--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <fieldset>
                                                <legend><h3>Suivi des règles</h3></legend>
                                                @if(!$suivi)
                                                <form class="form form-horizontal" action="{{route('postSuiviRegle')}}" method="POST">

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
                                                                <label class="col-sm-4 col-form-label">Date de votre dernière règle</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" required class="form-control" name="dateRegle" placeholder="Date de dernière règle" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Durée de votre cycle</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control" name="dureeCycle" required>
                                                                        <option disabled selected>Sélectionner la durée de votre cycle</option>
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
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Suivre règle</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                    @endif
                                            </fieldset>

                                            <table  class="table table-bordered  table-responsive" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Date de votre dernière règle</th>
                                                    <th>Durée de votre cycle</th>
                                                    <th>Date probable de votre prochaine règle</th>
                                                    <th>Annuler</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($menstruations as $menstruation)
                                                    <tr>
                                                        <td>{{date_format(date_create($menstruation->dateRegle),"d M Y") }}</td>
                                                        <td><b>{{$menstruation->dureeCycle}}</b></td>
                                                        <td><b>{{date_format(date_create($menstruation->dateProchainRegle),"d M Y")}}</b></td>
                                                        <td>
                                                        <button class="btn btn-outline-danger delete-modal" data-id = "{{$menstruation->id}}">Annuler</button>
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('postEditSuiviRegle')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Modification de suivi de votre règle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date de votre dernière règle</label>
                                    <div class="col-sm-8">
                                        <input type="date" required class="form-control" id="edit-dateRegle" name="dateRegle" placeholder="Date de dernière règle" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Durée de votre cycle</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="edit-dureeCycle" name="dureeCycle" required>
                                            <option disabled selected>Sélectionner la durée de votre cycle</option>
                                            @for($i =21; $i <= 40 ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="edit-id" name="id" />
                        <input type="hidden"  name="_token" value="{{Session::token()}}" />
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success" >Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- container-scroller -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 60%;">
            <div class="modal-content" style="background-color: white;">
                <form action="{{route('postDeleteSuiviRegle')}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Annulation de suivi de règle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <h5 style="color: red;text-align: center;">Pour quelle raison voulez-vous annuler votre souscription au suivi de règle ?</h5>
                      <br/>  <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Votre explication</label>
                                <div class="col-sm-8">
                            <textarea class="form-control" rows="4" name="description" required placeholder="Expliquez pourquoi vous voulez annuler votre souscription au suivi de règle ..."></textarea>
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
        @if(Session::get("suivi-regle") == true)
        showSwal('success-message');
        $(".swal-title").html("Information");
        $(".swal-text").html("<b>{{Session::pull("regle-message")}}</b>");
        $(".swal-button").text("Ok");
        {{Session::put("suivi-regle", false)}}
        @endif

        @if(Session::get("suivi-regle-annuler") == true)
        showSwal('success-message');
        $(".swal-title").html("Information");
        $(".swal-text").html("<b>Suivi de règle annulé. Vous ne recevrez plus de notifications pour un bon suivi" +
            " de vos règles</b>");
        $(".swal-button").text("Ok");
        {{Session::put("suivi-regle-annuler", false)}}
        @endif
    });

    $('.edit-modal').on("click", function () {
      //  alert($(this).data("dateregle"));
        $("#edit-id").val($(this).data("id"));
        $("#edit-dateRegle").val($(this).data("dateregle"));
        $("#edit-dureeCycle").val($(this).data("dureecycle"));
        $("#editModal").modal("show");
    });

    $(".delete-modal").on("click", function (event) {
        event.preventDefault();
        $("#id").val($(this).data("id"));
        $("#deleteModal").modal("show");
    });
</script>
@endsection