@extends('Template.otherTemplate')

@section('title', 'Gestion de présence des téléconseillers')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
@endsection

@section('body')
    <div class="container-scroller">
        @include('HeaderNav.adminNav')
        
        <div class="container-fluid page-body-wrapper">
            @include('Profile.adminSideProfil')
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Fiche de présence</h4>
                                    
                                    <hr/>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Consulter le rapport périodique</h4>

                                            <form action="" method="GET">
                                                <div class="row" style="margin-bottom: 30px;">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Date de :</label>
                                                            
                                                            <div class="col-sm-9">
                                                                <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d') }}" value="{{ $debut }}" type="date" name="debut" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Date à :</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d') }}" value="{{ $fin }}" type="date" name="fin" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Rechercher</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        
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

                                            <table id="table" class="table table-bordered table-condensed table" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Fonction</th>
                                                        <th>Détail prestation</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach($presences as $presence)
                                                        <tr class="item{{ $presence->id }}">
                                                            <td>{{ $presence->nom }}</td>
                                                            <td>{{ $presence->prenom }}</td>
                                                            <td>{{ $presence->fonction }}</td>
                                                            <td>
                                                                <form action="{{route('gestion-presence-individuel-tele-conseiller') }}" method="GET">
                                                                    <input type="hidden" name="ref" value="{{ $presence->id }}" />
                                                                    <input type="hidden" name="debut" value="{{ $debut }}" />
                                                                    <input type="hidden" name="fin" value="{{ $fin }}" />
                                                                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                                                    <button type="submit" class="btn btn-outline-success">Détail prestation</button>
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
                
                @include('Footer.dashboardFooter')
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
    </script>
@endsection