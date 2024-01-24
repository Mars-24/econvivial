@extends("Template.otherTemplate")


@section("title")
    Liste des suivis planning familial
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovAdminProfile")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Suivi de vaccination</h4>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group row">
                                                <label class="control-label">CPN :
                                                @if($formationSanitaire != null)
                                                    {{$formationSanitaire->libelle}}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-8"></div>
                                    </div>
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

                                            <table id="table"
                                                   class="table table-bordered table-condensed table-striped table-responsive"
                                                   cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Code</th>
                                                    <th>Nom</th>
                                                    <th>Prénoms</th>
                                                    <th>Téléphone</th>
                                                    <th>Contraception</th>
                                                    <th>Durée</th>
                                                    <!--<th>Statu</th>
                                                    <th>Reçu</th>-->
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($benefs as $benef)
                                                    <tr class="item{{$benef->id}}">
                                                        <td id="num"></td>
                                                        <td>{{$benef->code}}</td>
                                                        <td><b>{{$benef->nom}}</b></td>
                                                        <td><b>{{$benef->prenom}}</b></td>
                                                        <td><b>{{$benef->telephone}}</b></td>
                                                        <td>@if(\App\Planning::where("id", $benef->planning_id)->first() != null) {{\App\Planning::where("id", $benef->planning_id)->first()->titre}} @endif</td>
                                                        <td><b>{{$benef->dureeContraception}}</b></td>
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

                <!-- fenetre modale -->

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
    <script>
        $(document).ready(function () {

            $('#infos').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var code = $(e.relatedTarget).data('code');
                var num_carnet = $(e.relatedTarget).data('num_carnet');
                $('#form-update-id').val(id);
                $('#form-update-code').text(code);
                $('#form-update-numCarnet').text(num_carnet);
            });
        });

    </script>

@endsection
<style type="text/css">
    /*-- Numerotation table --*/
    /**/
    table {
        counter-reset: case;
    }

    #num:before {
        counter-increment: case;
        content: counter(case);
    }
</style>
