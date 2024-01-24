@extends('Template.otherTemplate')

@section('title', 'Données Brutes de la Paire Education')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.4/css/autoFill.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.1/css/keyTable.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .dataTables_length select {
            padding 0px 20px !important;
        }
    </style>
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
                                    <h4 class="card-title" style="text-transform: none !important;">Données Brutes de la Paire Education</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" style="width: 100%;">
                                                <div class="input-field col">
                                                    <label class="mdi mdi-calendar" style="font-size: 15px;">Période</label>
                                                    
                                                    <input type="text" name="range" class="form-control form-control-sm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <table id="dt" class="table table-bordered display responsive nowrap" width="100%"></table>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.4/js/dataTables.autoFill.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.4/js/autoFill.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.1/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            const dt = $('#dt').DataTable({
                processing: true,
                serverSide: true,
                responsive: {
                    details: {
                        type: 'inline',
                        // target: 'tr',
                    }
                },
                ajax: {
                    url: '{{ route("ajax.entretiens-participants.index") }}',
                    type: 'post',
                    data: function (data) {
			console.log(data);
                        for (var i = 0, len = data.columns.length; i < len; i++) {
                            if (!data.columns[i].search.value) delete data.columns[i].search;
                            
                            if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                            
                            if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                            
                            if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                        }
                        
                        delete data.search.regex;
                        
                        data._token =  '{{ csrf_token() }}';
                        
                        const range = $('input[name="range"]').data('daterangepicker');
                        
                        if (range && range.startDate && range.endDate) {
                            data.range = `${range.startDate.format('YYYY-MM-DD')}@${range.endDate.format('YYYY-MM-DD')}`;
                        }
                    },
                    dataType: 'json',
                    beforeSend: function(jqXHR) {
                        jqXHR.headers = {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        };
                    },
                },
                columns: [
                    {
                        data: 'created_at',
                        title: 'Créé le',
                    },
                    {
                        data: 'code',
                        title: 'Code',
                    },
                    {
                        data: 'entretienpair.user.paireducateur.code',
                        title: 'Pair educateur',
                    },
                    {
                        data: 'sexe',
                        title: 'Sexe',
                    },
                    {
                        data: 'age',
                        title: 'Age',
                    },
                    {
                        data: 'statut',
                        title: 'Statut',
                    },
                    {
                        data: 'profession',
                        title: 'Profession',
                    },
                    {
                        data: 'region.libelle',
                        title: 'Région',
                    },
                    {
                        data: 'entretienpair.nbreParticipant',
                        title: 'Nombre de participants',
                    },
                    {
                        data: 'entretienpair.referer',
                        title: 'Referer',
                    },
                    {
                        data: null,
                        title: 'Condom',
                        render: function(data, type, row, meta) {
                            return `
                                <table class="table table-bordered display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Masculin</th>
                                            <th>Féminin</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td>${data.entretienpair.condomMasculin}</td>
                                            <td>${data.entretienpair.condomFeminin}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            `;
                        }
                    },
                    {
                        data: null,
                        title: 'Validé',
                        render: function(data, type, row, meta) {
                            const validated = data.entretienpair.valider !== 0;
                            
                            return `
                                <span class="badge ${validated ? 'badge-success' : 'badge-danger'}">${validated ? 'Oui' : 'Non'}</span>
                            `;
                        }
                    },
                    {
                        data: 'entretienpair.typeactivite.libelle',
                        title: 'Type activité',
                    },
                    {
                        data: 'entretienpair.typeentretien.libelle',
                        title: 'Type entretien',
                    },
                ],
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                order: [[0, 'desc']],
	            buttons: {
	                buttons:[
	                    {
	                        className: 'btn btn-light',
	                        extend: 'excelHtml5',
	                    },
	                    {
                            className: 'btn btn-light',
                            text: function (dt) {
                                return '<i class="fa fa-undo"></i> Reinitialiser';
                            },
                            action: function (e, dt, button, config) {
                                dt.search('');
                                dt.columns().search('');
                                dt.draw();
                            }
                        },
                        {
                            className: 'btn btn-light',
                            text: function (dt) {
                                return '<i class="fa fa-refresh"></i> Recharger';
                            },
                            action: function (e, dt, button, config) {
                                dt.draw(false);
                            }
                        }
	                ]
	            },
                iDisplayLength: 100,
	            lengthMenu: [[100, 5000, 10000, 15000, -1], [100, 5000, 10000, 15000, 'Tout']],	
            });
            
            $('input[name="range"]').daterangepicker({
                startDate: moment().startOf('month'),
                endDate: moment().endOf('month'),
            }, function(start, end, label) {
                if (start && end) {
                    dt.draw();
                }
                
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
