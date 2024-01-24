@extends("Template.otherTemplate")


@section("title")
    Liste des bénéficiaire migrés pour vaccination
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
                                                    <th>Nom</th>
                                                    <th>Prénoms</th>
                                                    <th>Code</th>
                                                    <th>Numéro Carnet</th>
                                                    <th>Téléphone</th>
                                                    <th>Rhesus</th>
                                                    <th>Rhesus conjoint</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($grossesses as $grossesse)
                                                    <tr class="item{{$grossesse['id']}}">
                                                        <td id="num"></td>
                                                        <td>{{$grossesse['nom']}}</td>
                                                        <td>{{$grossesse['prenom']}}</td>
                                                        <td>{{$grossesse['code']}}</td>
                                                        <td>{{$grossesse['num_carnet']}}</td>
                                                        <td><b>{{$grossesse['telephone']}}</b></td>
                                                        <td><b>{{$grossesse['reshus']}}</b></td>
                                                        <td><b>{{$grossesse['reshusConjoint']}} mois</b></td>
                                                        <td>
                                                            <button
                                                                type="button" id="btrecu" data-toggle="modal"
                                                                data-target="#infos"
                                                                class="btn btn-primary btn-rounded btrecu"
                                                                data-id="{{$grossesse['id']}}"
                                                                data-code="{{$grossesse['code']}}"
                                                                data-num_carnet="{{$grossesse['num_carnet']}}"
                                                            >Completer
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


                            <form action="{{route("save-beneficiaire-migrer-pour-vaccin")}}" method="POST">
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
                                    <div class="col-sm-10"  id="telConjoint">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Nom du bébé</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="nomBebe" placeholder="Nom du bébé" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextVacc">
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->
                                            <label class="control-label col-sm-4">Date Accouchement</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" max="{{date("Y-m-d")}}"
                                                       name="dateAccouchement" id="dateAccouchement"
                                                       placeholder="Date Naissance"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Age du Bébé</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="hidden" name="ageBebe" id="ageBeb"   />
                                                <input class="form-control" type="text" onfocus="$(this).blur()" id="ageBebe"
                                                       placeholder="Age du nouveau né"  style="color: blue;font-size: 20px;height: 45px;" />
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

                                            <label class="control-label col-sm-4">Date Vacination</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" min="{{date("Y-m-d")}}"
                                                       name="dateVaccin" id="dateNextVac"
                                                       placeholder="Date Naissance"/>
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

        var nbreSemaine = 0;
        function diff_in_week_vaccination(dateAccouchement) {
            var dateJour = new Date();
            var dateAccouchementObject = new Date(dateAccouchement);
            var diff = (dateJour.getTime() - dateAccouchementObject.getTime()) / 1000;
            diff /= (60 * 60 * 24 * 7);
            nbreSemaine = Math.abs(Math.round(diff));
            return nbreSemaine;
        }



        $("#dateAccouchement").on("change", function () {

            diff_in_week_vaccination($(this).val());

            $("#ageBebe").val(nbreSemaine + " semaine(s)");
            $("#ageBeb").val(nbreSemaine);

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
