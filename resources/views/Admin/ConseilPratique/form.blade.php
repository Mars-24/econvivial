@extends('Template.otherTemplate')

@section('title', ($conseilPratique->exists ? 'Modifier un' : 'Nouveau') .' conseil pratique | Conseils pratiques')

@section('style')
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"/>-->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>-->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>-->
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
                                    <h4 class="card-title" style="text-transform: none !important;">{{ $conseilPratique->exists ? 'Modifier un' : 'Nouveau' }} conseil pratique</h4>
                                    
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
                                    
                                    <form method="POST" enctype="multipart/form-data" action="{{ $conseilPratique->exists ? route('conseils-pratiques.update', $conseilPratique->id) : route('conseils-pratiques.store') }}">
                                        {{ csrf_field() }}
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                                                
                                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" required>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                                
                                                <input type="file" class="form-control" id="image" name="image" placeholder="Image" required>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                                
                                                <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>
                                    </form>
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
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>-->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>-->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>-->
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
    <script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace( 'description' );
            
            const dt = $('#dt').DataTable({
                // responsive: true,
                // autoFill: true,
                // deferRender: true,
                processing: true,
                serverSide: true,
                // stateSave: true,
                responsive: {
                    details: {
                        type: 'inline',
                        // target: 'tr',
                    }
                },
                // scrollY: 200,
                // scroller: true,
                // scrollX: true,
                ajax: {
                    url: '{{ route("ajax.users.index") }}',
                    type: 'post',
                    data: function (data) {
                        for (var i = 0, len = data.columns.length; i < len; i++) {
                            if (!data.columns[i].search.value) delete data.columns[i].search;
                            
                            if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                            
                            if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                            
                            if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                        }
                        
                        delete data.search.regex;
                        
                        data._token =  '{{ csrf_token() }}';
                        
                        // manage period
                        // start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')
                        const range = $('input[name="range"]').data('daterangepicker');
                        
                        if (range && range.startDate && range.endDate) {
                            data.range = `${range.startDate.format('YYYY-MM-DD')}@${range.endDate.format('YYYY-MM-DD')}`;
                        }
                        
                        console.log( data );
                    },
                    dataType: 'json',
                    beforeSend: function(jqXHR) {
                        jqXHR.headers = {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        };
                    },
                },
                // columnDefs: [
                //     {
                //         className: 'control',
                //         orderable: false,
                //         targets:   0
                //     }
                // ],
                columns: [
                    // {
                    //     className: 'control',
                    //     data: null,
                    //     defaultContent: '',
                    //     orderable: false,
                    //     targets:   0
                    // },
                    {
                        data: 'created_at',
                        title: 'Créé le',
                    },
                    // {
                    //     data: 'id',
                    //     title: 'Ordre',
                    // },
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
                    {
                        data: null,
                        title: 'Modifier',
                        render: function(data, type, row, meta) {
                            return `
                                <button
                                    class="btn btn-primary btn-xs edit-modal"
                                    data-id="${data.id}"
                                    data-name="${data.username}"
                                    data-sexe="${data.sexe}"
                                    data-datenaissance="${data.datenaissance}"
                                    data-profession="${data.profession}"
                                    data-region="${data.region.id}"
                                ><i class="fa fa-edit"></i> Modifier</button>
                            `;
                        },
                    },
                    {
                        data: null,
                        title: 'Supprimer',
                        render: function(data, type, row, meta) {
                            return `
                                <button
                                    class="btn btn-danger btn-xs delete-modal"
                                    data-id = "${data.id}"
                                    data-name = "${data.username}"
                                ><i class="fa fa-trash-o"></i> Supprimer
                                </button>
                            `;
                        },
                    }
                ],
                // dom: 'Blfrtip',
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                // dom: 'Pfrtip',
                // buttons: true,
	            order: [[0, 'desc']],
	            buttons: {
	                buttons:[
	                    {
                            className: 'btn btn-light',
                            text: function (dt) {
                                return '<i class="fa fa-plus"></i> Nouveau conseil';
                            },
                            action: function (e, dt, button, config) {
                                window.location = '{{ route("conseils-pratiques.create") }}';
                            }
                        },
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
                iDisplayLength: 25,
	            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'Tout']],	
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