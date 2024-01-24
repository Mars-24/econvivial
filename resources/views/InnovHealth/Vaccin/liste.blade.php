@extends("Template.otherTemplate")


@section("title")
    Liste des suivis de vaccination
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovVacciProfil")
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
                                                    <th>Numéro Carnet</th>
                                                    <th>Téléphone</th>
                                                    <th>Date Acouchement</th>
                                                    <th>Age bébé</th>
                                                    <th>Nom bébé</th>
                                                    <th>Vaccin</th>
                                                    <th>Date prochain vaccin</th>
                                                    <th>Statu</th>
                                                    <th>Reçu</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($grossesses as $grossesse)
                                                    <tr class="item{{$grossesse['id']}}">
                                                        <td id="num"></td>
                                                        <td>{{$grossesse['code']}}</td>
                                                        <td>{{$grossesse['num_carnet']}}</td>
                                                        <td><b>{{$grossesse['telephone']}}</b></td>
                                                        <td><b>{{$grossesse['dateAccouchement']}}</b></td>
                                                        <td><b>{{$grossesse['ageBebe']}} mois</b></td>
                                                        <td><b>{{$grossesse['nomBebe']}}</b></td>
                                                        <td>{{$grossesse['vaccin']}}</td>
                                                        <td>{{$grossesse['dateprochain_vaccin']}}</td>
                                                        <td>
                                                            @if($grossesse['dateprochain_vaccin'] == "Pas encore programmé")
                                                                <label
                                                                    class="badge badge-success badge-pill">{{$grossesse['dateprochain_vaccin']}}</label>
                                                            @else
                                                                @if((Carbon\Carbon::parse(date_format(date_create($grossesse['dateprochain_vaccin']),"d M Y"))) ->greaterThan(Carbon\Carbon::now()))
                                                                    <label class="badge badge-success badge-pill">En
                                                                        Attente</label>
                                                                @else
                                                                    <label class="badge badge-danger badge-pill">En
                                                                        Attente</label>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button
                                                                type="button" id="btrecu" data-toggle="modal"
                                                                data-target="#infos"
                                                                class="btn btn-primary btn-rounded btrecu"
                                                                data-id="{{$grossesse['id']}}"
                                                                data-code="{{$grossesse['code']}}"
                                                                data-num_carnet="{{$grossesse['num_carnet']}}"
                                                            >Reçu
                                                            </button>
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

                <!-- fenetre modale -->
                <div class="modal fade" id="infos">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close closeX" data-dismiss="modal" style="color: white;">
                                &times;
                            </button>
                            <div class="EnteteInfo modal-header"
                                 style="height:40px !important; min-height: 0 !important;">
                                <strong>Nouvelle Date Prochaine CPN</strong>
                            </div>
                            <br/>


                            <form action="{{route("beneficiaire-recu-vaccin")}}" method="POST">
                                <input type="hidden" name="id" id="form-update-id"/>
                                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                <input type="hidden" name="page" value="liste"/>

                                <div class="row">
                                    <div class="col-sm-1"></div>

                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Code</label>
                                            <div class="col-sm-8">
                                                <label class="control-label" id="form-update-code"></label>

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
                                                <label class="control-label" id="form-update-numCarnet"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Type de vaccin</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="typeVaccin" name="typeVaccin" required>
                                                    <option selected disabled="true">Sélectionner le vaccin</option>
                                                    @foreach($VaccinNats as $VN)
                                                        <option
                                                            value="{{$VN->code_vacci_typ}}">{{$VN->lib_vacci_typ}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Date Prochaine CPN</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" min="{{date("Y-m-d")}}"
                                                       name="dateNextVac" id="dateNextVac"
                                                       placeholder="Date Naissance"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->

                                            <label class="control-label col-sm-4">Dernier vaccin</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="checkbox" name="dernier"
                                                       id="dernier"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
