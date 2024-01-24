@extends('Template.otherTemplate')

@section('title', 'Enrégistrer un entretien | eCentre Convivial')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
@endsection

@section('body')
    <style>
        .table.details tr td {
            border: 0 !important;
        }
        .special {
            border-collapse: collapse;
        }

        .special tr:first-child td {
            border-top: 0;
        }
        .special tr td:first-child {
            border-left: 0;
            height: 100%;
        }
        .special tr:last-child td {
            border-bottom: 0;
        }
        .special tr td:last-child {
            border-right: 0;
            height: 100%;
        }
    </style>

    <div class="container-scroller">
        @include('HeaderNav.navPairEducateur')
        
        <div class="container-fluid page-body-wrapper">
            @include('Profile.peSideProfil')
            <div class="main-panel" >
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Entretiens pairs</h4>
                                    
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
                                                        <p>{{Session::pull('message') }} </p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(Session::has('error'))
                                                <div class="form-group">
                                                    <div class="alert alert-danger">
                                                        <p>{{Session::pull('error') }} </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-sm-12">
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
        
    <script>
        function changeValue(valeur) {
            $.ajax({
                type : "POST",
                url : "{{  route('getInfoUserByCode')  }}",
                data :{
                    "code" : valeur,
                    "_token" : "{{ Session::token()  }}",
                },
                success:function (data) {
                    if(data != false) {
                        $('#nom').val(data["nom"]);
                        
                        $('#prenom').val(data["prenom"]);
                        
                        $('#nameBloc').show('slow');
                    }else{
                        $('#nameBloc').hide('slow');
                        alert('Elève ou étudiant inexistant');
                    }
                },
                error:function (data) {
                    $('#nameBloc').hide('slow');
                    
                    alert('Elève ou étudiant inexistant');
                }
            });
        }


        $('#type').change(function(){

            var value = $(this).val();

            if(value == 2){

                $('#infoContent').empty();
                $('#infoMultiParticipant').hide();

                $('#typeBloc').removeClass('col-sm-6');
                $('#typeBloc').addClass('col-sm-4');

                $('#themeBloc').removeClass('col-sm-6');
                $('#themeBloc').addClass('col-sm-4');

                $('#partBloc').show();

            }else{

                showMutiUserInfo(1);

                $('#typeBloc').removeClass('col-sm-4');
                $('#typeBloc').addClass('col-sm-6');

                $('#themeBloc').removeClass('col-sm-4');
                $('#themeBloc').addClass('col-sm-6');

                $('#partBloc').hide();
            }
        });

        $('#typeEntretien').on('click', function() {
            var typeEntretien = $(this).val();
            
            $.ajax({
                type : "POST",
                url : "{{  route('getContenuEntretienByType')  }}",
                data :{
                    "id" : typeEntretien,
                    "_token" : "{{ Session::token()  }}",
                },
                success:function (data) {
                    $('#contenu').empty();
                    
                    for(var i =0; i < data.length; i++){
                        $('#contenu').append('<option value="' + data[i]["id"] + '">' + data[i]["contenu"] + '</option>');
                    }
                },
                error:function (data) {
                    alert('Impossible de récupérer les contenus correspondant à ce type d\'entretien');
                }
            });

        });

        $('#participant').change(function(){
            var valeur = $(this).val();
            
            showMutiUserInfo(valeur);
        });
        function showMutiUserInfo(size) {
            $('#infoMultiParticipant').show();
            
            $('#infoContent').empty();

            for (var i = 0; i <size; i++){
                $('#infoContent').append('<div class="row" style="margin-top: 20px;">\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <label class="col-sm-3 col-form-label">N° Tél.</label>\n' +
                    '                                                            <div class="col-sm-9">\n' +
                    '                                                                <input class="form-control" type="text" name="code[]" id="code" placeholder="Numéro de téléphone" />\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="sexe[]"{{ old('sexe') }} id="sexe">\n' +
                    '                                                                    <option selected disabled>Choisir le sexe</option>\n' +
                    '                                                                    <option value="M">Masculin</option>\n' +
                    '                                                                    <option value="F">Féminin</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="age[]"{{ old('age') }} id="age">\n' +
                    '                                                                    <option selected disabled>Choisir l\'age</option>\n' +
                    '                                                                    @for($i = 12; $i <= 35; $i++)\n' +
                    '                                                                    <option value="{{ $i }}">{{ $i}}</option>\n' +
                    '                                                                    @endfor\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="statut[]"{{ old('statut') }} id="statut">\n' +
                    '                                                                    <option selected disabled>Choisir le statut</option>\n' +
                    '                                                                    <option value="Nouveau">Nouveau cas</option>\n' +
                    '                                                                    <option value="Ancien">Ancien cas</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="pays[]"{{ old('pays') }} id="pays">\n' +
                    '                                                                    <option selected disabled>Choisir le pays</option>\n' +
                    '                                                                    <option value="TG">Togo</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '                                                    <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="profession[]"{{ old('profession') }} id="profession">\n' +
                    '                                                                    <option selected disabled>Choisir la profession</option>\n' +
                    '                                                                    <option value="Entrepreneur">Entrepreneur</option>\n' +
                    '                                                                    <option value="Employé">Employé</option>\n' +
                    '                                                                    <option value="Fonctionnaire">Fonctionnaire</option>\n' +
                    '                                                                    <option value="Etudiant">Etudiant</option>\n' +
                    '                                                                    <option value="Elève">Elève</option>\n' +
                    '                                                                    <option value="Apprenti">Apprenti</option>\n' +
                    '                                                                    <option value="Autre">Autre</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '													 <div class="col-sm-3">\n' +
                    '                                                        <div class="form-group row">\n' +
                    '                                                            <div class="col-sm-12">\n' +
                    '                                                                <select class="form-control" name="region[]"{{ old('region') }} id="region">\n' +
                    '                                                                    <option selected disabled>Choisir la région correspondante</option>\n' +
                    '                                                                    <option value="LC">LOME COMMUNE</option>\n' +
                    '                                                                    <option value="MT">MARITIME</option>\n' +
                    '                                                                    <option value="PT">PLATEAUX</option>\n' +
                    '                                                                    <option value="CT">CENTRALE</option>\n' +
                    '                                                                    <option value="KR">KARA</option>\n' +
                    '                                                                    <option value="SV">SAVANES</option>\n' +
                    '                                                                </select>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n\n')
            }

        }
    </script>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('#dt').DataTable({
                deferRender: true,
                processing: true,
                serverSide: true,
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr',
                    }
                },
                ajax: {
                    url: '{{ route("ajax.entretiens-pairs.index") }}',
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
                    },
                    dataType: 'json',
                    beforeSend: function(jqXHR) {
                        jqXHR.headers = {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        };
                    },
                },
                columnDefs: [
                    {
                        className: 'control',
                        orderable: false,
                        targets:   0
                    }
                ],
                columns: [
                    {
                        className: 'control',
                        data: null,
                        defaultContent: '',
                        orderable: false,
                        width: '15px',
                        targets: 0
                    },
                    {
                        data: null,
                        title: 'Code Bénéficiaire',
                        render: function(data, type, row, meta) {
                            return `
                                <table class="table details">
                                    ${data.entretienparticipan.map((p) => '<tr><td>' + p.code + '</td></tr>')}
            					</table>
                            `;
                        }
                    },
                    {
                        data: null,
                        title: 'Statut',
                        render: function(data, type, row, meta) {
                            return `
                                <table class="table details">
                                    ${data.entretienparticipan.map((p) => '<tr><td>' + p.statut + ' cas</td></tr>')}
            					</table>
                            `;
                        }
                    },
                    {
                        data: 'typeactivite.libelle',
                        title: 'Type activité',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'typeentretien.libelle',
                        title: 'Thème IEC/ECC',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: null,
                        title: 'Condom distribué',
                        render: function(data, type, row, meta) {
                            return `
                                <table class="table details">
                                    <tr>
            							<td>Masculin</td>
            							<td>${data.condomMasculin}</td>
            						</tr>
            						<tr>
            							<td>Féminin</td>
            							<td>${data.condomFeminin}</td>
            						</tr>
            					</table>
                            `;
                        }
                    },
                    {
                        data: 'referer',
                        title: 'Référé',
                    },
                    {
                        data: null,
                        title: 'Profession',
                        render: function(data, type, row, meta) {
                            return `
                                <table class="table details">
                                    ${data.entretienparticipan.map((p) => '<tr><td>' + p.profession + '</td></tr>')}
            					</table>
                            `;
                        }
                    },
                    {
                        data: null,
                        title: 'Région',
                        render: function(data, type, row, meta) {
                            return `
                                <table class="table details">
                                    ${data.entretienparticipan.map((p) => '<tr><td>' + p.region.libelle + '</td></tr>')}
            					</table>
                            `;
                        }
                    },
                ],
                dom: 'Bfrtip',
                buttons: true,
	            order: [[1, 'desc']],
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
	            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],	
            });
        });
    </script>
@endsection