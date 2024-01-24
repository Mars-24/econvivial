@extends('Template.otherTemplate')

@section('title', 'Résultats de consultations envoyés aux utilisateurs')

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
                                    <h4 class="card-title" style="text-transform: none !important;">Résultats de consultations envoyés aux utilisateurs</h4>
                                    
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
    
    <div class="modal fade"  id="ordonnanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 50%;">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ordonnance attaché</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <button class="btn btn-success" onclick="printContent('formOrdonnance')">Imprimer</button> <br/>
                        
                        <div class="col-sm-12" style="margin-top: 10px;" id="formOrdonnance">
                            <div class="form-group">
                                <div class="form-group row">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th>
                                                    <h3>
                                                        <b>
                                                            <span style="text-align: left;">
                                                                <img src="{{asset("images/logo.png")}}" />
                                                            </span>
                                                                
                                                            <span id="formationSanitaire" style="text-transform: uppercase; text-align: center;"></span>
                                                        </b>
                                                    </h3>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th><h4><b><u><span id="numOrdonnance" style="text-align: center;"></span></u></b></h4></th>
                                            </tr>
                                        </thead>

                                        <tbody id="ordonnanceBody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
                </form>
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
                    url: '{{ route("ajax.resultat-consultations") }}',
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
                        title: 'Date',
                        responsivePriority: 1,
                    },
                    {
                        data: 'user.codeUser',
                        title: 'Code utilisateur',
                        orderable: false,
                        searchable: false,
                        responsivePriority: 1,
                    },
                    {
                        data: 'user.username',
                        title: 'Consultant',
                        orderable: false,
                        searchable: false,
                        responsivePriority: 1,
                    },
                    {
                        data: 'objet_consultation.libelle',
                        title: 'Objet Consulation',
                        orderable: false,
                        searchable: false,
                        responsivePriority: 1,
                    },
                    {
                        data: 'description',
                        title: 'Motif de la consultation',
                        responsivePriority: 2,
                    },
                    {
                        data: 'resultat_consultations[0].recommandation',
                        title: 'Recommandation',
                        orderable: false,
                        searchable: false,
                        responsivePriority: 2,
                    },
                    {
                        data: 'formation_sanitaire.libelle',
                        title: 'Formation Sanitaire',
                        responsivePriority: 1,
                    },
                    {
                        data: null,
                        title: 'Voir l\'ordonnance',
                        render: function(data, type, row, meta) {
                            return `
                                <button class="btn btn-sm btn-outline-success ordonnance-button"
                                    data-id="${data.id}"
                                    data-formation = "${data.formation_sanitaire.libelle}"
                                    data-ordonnance='${JSON.stringify(data.resultat_consultations)}'>Voir l'ordonnance</button>
                            `;
                        }
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
    <script>
        $(document).on('click', '.ordonnance-button', function () {
            const id = $(this).data('id');
            
            const formation = $(this).data('formation');
            
            // const ordonnance = JSON.parse($(this).data('ordonnance'));
            const ordonnance = $(this).data('ordonnance');
            
            console.log(ordonnance);

            $('#formationSanitaire').text(formation);
            
            $('#numOrdonnance').text('Ordonnance N° '+ id);

            $('#ordonnanceBody').empty();

            for(let i = 0; i < ordonnance.length; i++) {
                $('#ordonnanceBody').append(`<tr><td><b>${ordonnance[i]['ordonnance']}</b></td></tr>`);
            }
            
            $('#ordonnanceModal').modal('show');
        });

        function printContent(id) {
            $(this).hide();
            
            var restorepage = document.body.innerHTML;
            
            var printContent = document.getElementById(id).innerHTML;
            
            document.body.innerHTML = printContent;
            
            window.print();
            
            document.body.innerHTML = restorepage;
            
            window.location.reload();
        }
    </script>
@endsection