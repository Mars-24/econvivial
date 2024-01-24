@extends("Template.otherTemplate")


@section("title")
    Liste des suivi de grossesse à terme
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Suivi de grossesse à terme</h4>
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
                                                    <th>Code</th>
                                                    <!--<th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Téléphone</th>-->
                                                    <th>Quartier</th>
                                                    <th>Langue</th>
                                                    <th>PTME</th>
                                                    <th>Nombre CPN déja Réalisé</th>
                                                    <th>Date Prochaine CPN</th>
                                                    <th>Durée Grossesse</th>
                                                    <th>Date Acouchement</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($grossesses as $grossesse)
                                                    <tr class="item{{$grossesse['id']}}">
                                                        <td>{{$grossesse['code']}}</td>
                                                        <td>
                                                            <b>@if(\App\Quartier::where("id", $grossesse['quartier_id'])->first() != null) {{\App\Quartier::where("id", $grossesse['quartier_id'])->first()->libelle}}  @endif</b>
                                                        </td>
                                                        <td>{{\App\LanguePreference::where("beneficiaire_id",$grossesse['id'])->first()->libelle}}</td>
                                                        <td>@if($grossesse['ptme']) OUI @else NON @endif</td>
                                                        <td>{{\App\CPN_Suivi::where("beneficiaire_id",$grossesse['id'])->first()->nb_cpn}}</td>
                                                        <td>{{date_format(date_create(\App\CPN_Suivi::where("beneficiaire_id",$grossesse['id'])->first()-> dateProchaineCPN),"d M Y")}}</td>
                                                        <td><b>{{$grossesse['dureeGrossese']}} semaine(s)</b></td>
                                                        <td>
                                                            <b>{{date_format(date_create($grossesse['dateFinSuivi']),"d M Y")}}</b>
                                                        </td>
                                                        <td>
                                                            <button
                                                                type="button" id="btrecu"
                                                                data-toggle="modal"
                                                                data-target="#migrerModal"
                                                                @if($grossesse['isMigration'] == true) disabled @endif
                                                                class="btn {{$grossesse['isMigration'] == true ? 'btn-info':'btn-primary'}} btn-rounded btrecu"
                                                                data-id="{{$grossesse['id']}}"
                                                                data-code="{{$grossesse['code']}}"
                                                                data-num_carnet="{{$grossesse['num_carnet']}}"
                                                                data-rhesus="{{$grossesse['reshus']}}"
                                                                data-rhesus_conjoint="{{$grossesse['conjoint_reshus']}}">
                                                                Migrer
                                                            </button>
                                                        </td>

                                                    <!--
                                                        <td>
                                                            <form action="{{route('detail-suivi-grossesse')}}" method="GET">
                                                                <input type="hidden" name="ref" value="{{$grossesse['id']}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <input type="hidden" name="page" value="terme" />
                                                                <button type="submit"  class="btn btn-primary">Voir date CPN</button>
                                                            </form>
                                                        </td>
-->
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

                <div class="modal fade" id="migrerModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close closeX" data-dismiss="modal" style="color: white;">
                                &times;
                            </button>
                            <div class="EnteteInfo modal-header"
                                 style="height:40px !important; min-height: 0 !important;">
                                <strong>Migrer un bénéficiaire</strong>
                            </div>
                            <br/>
                            <form action="{{route("migrer-beneficiare")}}" method="POST">
                                <input type="hidden" name="id" id="form-migrer-id"/>
                                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                <input type="hidden" name="page" value="liste"/>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Code</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-migrer-code"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Num&eacute;ro Carnet</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-migrer-numCarnet"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Rhesus</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-migrer-rhesus"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Rhesus conjoint</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-migrer-rhesus_conjoint"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Migrer vers</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="typeMigration" required>
                                                    <option selected disabled="true">Sélectionner
                                                    </option>
                                                    <option value="VC">Vaccination</option>
                                                    <option value="PF">Planing Familial</option>
                                                    <option value="ALL">Les deux</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary">Migrer</button>
                                </div>
                            </form>
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
    <script>
        $(document).ready(function () {
            $('#migrerModal').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                var rhesus = $(e.relatedTarget).data('rhesus');
                var rhesus_conjoint = $(e.relatedTarget).data('rhesus_conjoint');
                var code = $(e.relatedTarget).data('code');
                var num_carnet = $(e.relatedTarget).data('num_carnet');
                $('#form-migrer-id').val(id);
                $('#form-migrer-rhesus').text(rhesus);
                $('#form-migrer-rhesus_conjoint').text(rhesus_conjoint);
                $('#form-migrer-code').text(code);
                $('#form-migrer-numCarnet').text(num_carnet);
            });
        });
    </script>

@endsection
