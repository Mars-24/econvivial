@extends('Template.otherTemplate')

@section('title', 'Envoi notification')

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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-transform: none !important;">Formulaire</h4>
                                    
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
                                            <div class="alert alert-dange">
                                                <p>{{Session::pull('error')}} </p>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <form id="send-form" method="POST" action="{{ route('send-sms.store') }}">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                        
                                        <div id="users_container" style="display: none;"></div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label style="font-size: 15px;">Titre</label>
                                                
                                                <input type="text" name="titre" class="form-control form-control-sm" required />
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label style="font-size: 15px;">Texte</label>
                                                
                                                <textarea type="text" name="description" rows="4" class="form-control form-control-sm" required></textarea>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Envoyer</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" style="width: 100%;">
                                                <div class="input-field col">
                                                    <label class="mdi mdi-calendar" style="font-size: 15px;">Période</label>
                                                    
                                                    <input type="text" name="range" class="form-control form-control-sm" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class-"col-md-12">
                                            <table id="dt" class="table table-bordered display responsive nowrap" width="100%"></table>
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
                deferRender: true,
                ajax: {
                    url: '{{ route("ajax.users.index") }}',
                    type: 'post',
                    data: function (data) {
                        for (var i = 0, len = data.columns.length; i < len; i++) {
                            if (!data.columns[i].search.value) delete data.columns[i].search;
                            
                            if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                            
                            if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                            
                            if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                            
                            const column = data.columns[i].data;
                            
                            if (column === 'created_at' || column === 'dateRegle' || column === 'dateProchainOvulation') {
                                data.columns[i].is_date = true;
                            }
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
                        className: 'control',
                        data: null,
                        defaultContent: '',
                        orderable: false,
                        searchable: false,
                        targets: 0
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        title: '<input type="checkbox" class="form-control" id="selectAll" />',
                        render: function(data, type, row, meta) {
                            return `
                                <input type="checkbox" class="select" name="checkbox" value="${data.id}" data-id="${data.id}" />
                            `;
                        },
                        
                    },
                    {
                        data: 'codeUser',
                        title: 'Code',
                    },
                    {
                        data: 'username',
                        title: 'Username',
                    },
                    {
                        data: 'numero',
                        title: 'Téléphone',
                    },
                    {
                        data: 'sexe',
                        title: 'Sexe',
                    },
                    {
                        data: 'age',
                        name: 'datenaissance',
                        title: 'Age',
                    },
                    {
                        data: 'profession',
                        title: 'Profession',
                    },
                    {
                        data: 'region.libelle',
                        title: 'Région',
                        orderable: false,
                        searchable: false,
                    },
                ],
                dom: "<'row'<'col-md-12'f>><'row'<'col-sm-12'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                order: [[0, 'desc']],
	            buttons: {
	                buttons: [
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
                iDisplayLength: -1,
	            lengthMenu: [[-1], ['Tout']],	
            });
            
            $('input[name="range"]').daterangepicker({
                showDropdowns: true,
                startDate: moment().startOf('month'),
                endDate: moment().endOf('month'),
                locale: {
                    format: "MM/DD/YYYY",
                    "applyLabel": "Appliquer",
                    "cancelLabel": "Annuler",
                },
            }, function(start, end, label) {
                if (start && end) {
                    dt.draw();
                }
            });
            
            $('#selectAll').on('change', function() {
                $(':checkbox.select').prop('checked', $(this).is(':checked'));
            });
            
            $('#send-form').submit(function() {
                $.each($('.select:checked'), function(i, checkbox) {
                    const value = $(checkbox).val();
                    
                    $('#send-form').append(`<input type="hidden" name="users[]" value="${value}">`)
                });
                
                $(this).find(':submit').attr('disabled', 'disabled');
                
                return true;
            });
        });
    </script>
@endsection