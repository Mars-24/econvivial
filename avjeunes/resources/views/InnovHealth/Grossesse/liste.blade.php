@extends("Template.otherTemplate")


@section("title")
    Enregistrer un nouveau bénéficiaire
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
                                    <h4 class="card-title">Suivi de grossesse en cours</h4>
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group row">
                                                <label class="control-label">CPN :
                                               <b> {{ DB::table('site_consults')
                                                        ->join('quartiers', 'site_consults.quartier_id', '=', 'quartiers.id')
                                                        ->where('user_id', '=', auth()->user()->id)
                                                        ->value('quartiers.libelle') }}
                                                </b></label>
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

                                                <table id="table" class="table table-bordered table-condensed table-striped table-responsive" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Code</th>
                                                        <th>Numéro Carnet</th>
                                                        <!--<th>Site</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Téléphone</th>-->
                                                        <th>Quartier</th>
                                                        <th>Langue</th>
                                                        <th>PTME</th>
                                                        <th>Nb CPN Réalisé</th>
														<th>Date Prochaine CPN</th>
                                                        <th>Durée Grossesse</th>                                                       
                                                        <th>Statut</th>
                                                        <th>Reçu</th>
                                                    </tr>
                                                    </thead>
                                                   
                                                    <tbody>
                                                    @foreach($grossesses as $grossesse)
                                                        <tr class="item{{$grossesse->id}}">
                                                            <td id="num"></td>
                                                            <td><b>{{$grossesse->code}}</b></td>
                                                            <td><b>{{$grossesse->num_carnet}}</b></td>
                                                            <!--<td></td>
                                                            <td>{{$grossesse->nom}}</td>
                                                            <td>{{$grossesse->prenom}}</td>
                                                            <td><b>{{$grossesse->telephone}}</b></td>-->
                                                            <td>@if(\App\Quartier::where("id", $grossesse->quartier_id)->first() != null) {{\App\Quartier::where("id", $grossesse->quartier_id)->first()->libelle}} @endif</td>
                                                            <td>{{\App\LanguePreference::where("beneficiaire_id",$grossesse->id)->value('libelle')}}</td>
                                                            <td>@if($grossesse->ptme) OUI @else NON @endif</td>
															<td align="center">{{\App\CPN_Suivi::where("beneficiaire_id",$grossesse->id)->value('nb_cpn')}}</td>
                                                            <td id="dateNextCPN">{{$nextCPN=date_format(date_create(\App\CPN_Suivi::where("beneficiaire_id",$grossesse->id)->value('dateProchaineCPN')),"d M Y")}}</td>
                                                            <td>{{$grossesse->dureeGrossese}} semaine(s)</td>                                                            
                                                            <td> 
                                                             @if((Carbon\Carbon::parse($nextCPN)) -> 
                                                                greaterThan(Carbon\Carbon::now()))                              
                                                                    <label class="badge badge-success badge-pill">En Attente</label>
                                                                @else
                                                                    <label class="badge badge-danger badge-pill">En Attente</label>
                                                                @endif                                                           
                                                            </td>
                                                            <td>       
                                                            <!-- <form action="{{route('detail-suivi-grossesse')}}" method="GET">
                                                                    <input type="hidden" name="ref" value="{{$grossesse->id}}" />
                                                                    <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                    <input type="hidden" name="page" value="liste" />
                                                                    <button type="submit" class="btn btn-danger btn-rounded">En attente</button>
                                                                </form>                                                       -->
                                                                <button action="{{route('detail-suivi-grossesse')}}" 
                                                                type="button" id="btrecu" data-toggle="modal" data-target="#infos" class="btn btn-primary btn-rounded btrecu" 
                                                                data-id="{{$grossesse->id}}"
                                                                data-code="{{$grossesse->code}}"
                                                                data-num_carnet="{{$grossesse->num_carnet}}"
                                                                data-dateFinSuivi="{{date_format(date_create($grossesse->dateFinSuivi),"d M Y")}}"
                                                                >Reçu</button>                                                              
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
                <div class="modal" id="infos">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close closeX" data-dismiss="modal" style="color: white;">&times;</button>
                        <div class="EnteteInfo modal-header" style="height:40px !important; min-height: 0 !important;">
                            <strong>Nouvelle Date Prochaine CPN</strong>
                        </div>
                        <br />

                       

                        <form action="" method="GET">
                                <input type="hidden" name="ref" value="{{$grossesse->id}}"  id="form-update-id"/>
                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                <input type="hidden" name="page" value="liste" />
                                
                                <div class="row">
                                <div class="col-sm-1"></div>
                                    
                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Code</label>
                                            <div class="col-sm-8">
                                                <label class="control-label ">{{$grossesse->code}}</label>
                                                
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
                                            <label class="control-label" >{{$grossesse->num_carnet}}</label>                                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                              
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10" id="dateNextCPN" >
                                        <div class="form-group row">
                                            <!-- <label class="control-label col-sm-1"></label> -->
                                            
                                            <label class="control-label col-sm-4">Date Prochaine CPN</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" name="dateNextCPN1" id="dateNextCPN1" placeholder="Date Naissance" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="button" class="btn btn-primary">Enregistrer</button>
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
@endsection

<style type="text/css">
/*-- Numerotation table --*/
    /**/table {
    counter-reset: case;
    }
    #num:before {
    counter-increment: case;
    content: counter(case);
    }
</style>
<!-- 
<script>
    $(document).ready(function () {
        $('#btrecu').on('click', function () {
            $('#infos form').attr('action', $(this).attr('action'));

            $('#dateNextCPN1').val($(this).data('dateFinSuivi'));
        })
    })
</script> -->

