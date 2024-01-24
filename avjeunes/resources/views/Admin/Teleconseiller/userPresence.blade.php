@extends('Template.otherTemplate')

@section('title', 'Présence du téléconseiller')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
@endsection

@section('body')
    <div class="container-scroller">
        @include("HeaderNav.adminNav")
        
        <div class="container-fluid page-body-wrapper">
            @include("Profile.adminSideProfil")
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body" id="fiche">
                                    <button type="button" class="btn btn-outline-success" style="margin-left: 45px;" id="print" onclick="printContent('fiche')">Imprimer</button>
                                    <a href="javascript:history.go(-1)"  id="retour" class="btn btn-outline-danger" style="margin-left: 45px;"  >Retour</a>

                                    <h4 class="card-title" style="text-align: center;margin-top: 10px;"><u>Fiche de prestation du téleconseiller {{$presences[0]->nom. " ".$presences[0]->prenom }} @if($debut != null && $fin != null)  du {{date_format(date_create($debut),"d M Y")}} au {{date_format(date_create($fin),"d M Y")}} @endif </u></h4>
                                    <h4 class="card-title" style="text-align: center;margin-top: 10px;"><u>Fonction  : {{$presences[0]->fonction }} </u></h4>

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

                                            <table id="table" class="table table-bordered display responsive nowrap" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Programmer</th>
                                                        <th>Période</th>
                                                        <th>Date et heure arriver</th>
                                                        <th>Date et heure départ </th>
                                                        <th>Visualiser le rapport</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($presences as $presence)
                                                        <tr class="item{{$presence->id }}">
                                                            <td>{{ $presence->programmer ? 'Oui' : 'Non' }}</td>
                                                            <td>{{ $presence->periode }}</td>
                                                            <td>{{ $presence->created_at }}</td>
                                                            <td>{{ $presence->heureDepart ?: 'Non défini' }}</td>
                                                            <td>
                                                                <form action="{{ route('detail-presence-tele-conseiller') }}" method="GET">
                                                                    <input type="hidden" name="ref" value="{{ $presence->id }}" />
                                                                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                                                    <button type="submit" class="btn btn-outline-success">Visualiser le rapport</button>
                                                                </form>
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
                    
                @include("Footer.dashboardFooter")
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#table').DataTable({
            responsive: {
                details: {
                    type: 'inline',
                    // target: 'tr',
                }
            },
            iDisplayLength: 25,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'Tout']],
        });
        
        function printContent(id) {
            $("#print").hide();
            
            $("#retour").hide();
            
            var restorepage = document.body.innerHTML;
            
            var printContent = document.getElementById(id).innerHTML;
            
            document.body.innerHTML = printContent;
            
            window.print();
            
            document.body.innerHTML = restorepage;
            
            $("#print").show();
            
            $("#retour").show();
        }
    </script>
@endsection