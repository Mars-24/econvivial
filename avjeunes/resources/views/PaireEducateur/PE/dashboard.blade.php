@extends('Template.otherTemplate')

@section('title', 'Enrégistrer un entretien | eCentre Convivial')

@section('body')
    <style>
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
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nouvelle activité</h4>
                                    
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
    
                                            <form class="form" action="{{route('save-pe-entretien')}}" method="POST">
                                                <div class="row">
                                                    <div id="themeBloc" class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Thème ICC/ECC</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="theme" id="theme" required>
                                                                    <option>Choisir l'activité</option>
                                                                    @foreach($themes as $theme)
                                                                        <option {{ old('theme') == $theme->id ? 'selected' : '' }} value="{{$theme->id}}">{{$theme->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div id="typeBloc" class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Type d'activité</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="type" id="type" required>
                                                                    <option>Choisir le type d'activité</option>
                                                                    @foreach($types as $type)
                                                                        <option {{ old('type') == $type->id ? 'selected' : '' }} value="{{$type->id}}">{{$type->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div id="dateActivite" class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Date d'activité:</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" max="{{date('Y-m-d')}}" type="date" name="dtactivite" required value="{{ old('dtactivite') }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-sm-4" id="partBloc" style="display: none;">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nbre Participant</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="participant" {{old("participant")}} id="participant">
                                                                    <option selected disabled>Choisir le nombre de personne</option>
                                                                    @for($i = 2; $i < 7; $i++)
                                                                        <option value="{{$i}}">{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div id="infoMultiParticipant" style="display: none;">
                                                    <div class="header" style="margin-top: 20px;">Informations de(s) participant(s)</div>
                                                    <hr/>
                                                    <div id="infoContent"></div>
                                                </div>
    
                                                <div class="header" style="margin-top: 20px;">Autres informations</div>
                                                <hr/>
    
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Condom distribué</label>
                                                            <div class="col-sm-9">
                                                                <table class="table table-bordered table-condensed">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Masculin</td>
                                                                            <td>
                                                                                <input class="form form-control" name="condomMasculin" value="{{ old('condomMasculin') }}" placeholder="Nombre condom masculin"/>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Féminin</td>
                                                                            <td>
                                                                                <input class="form form-control" name="condomFeminin" value="{{ old('condomFeminin') }}" placeholder="Nombre condom féminin"/>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-3" for="referer">Référé</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="referer" id="referer" required>
                                                                    <option>Sélectionner la réponse</option>
                                                                    <option {{ old('referer') == 'OUI' ? 'selected' : '' }} value="OUI">OUI</option>
                                                                    <option {{ old('referer') == 'NON' ? 'selected' : '' }} value="NON">NON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                                            <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">
                                                                Enrégistrer
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
    
                                        <div class="col-sm-2">
                                            <form action="{{ route('import-entretien-pair') }}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="file" name="fichierImporte" class="form-control">
                                                <br/>
                                                <button type="submit" class="btn btn-success" style="margin-left : 10px!important">Importer</button>
                                            </form>
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
                type: "POST",
                url: "{{route('getInfoUserByCode')}}",
                data: {
                    "code": valeur,
                    "_token": "{{Session::token()}}",
                },
                success: function (data) {
                    if (data != "false") {
                        $("#nom").val(data["nom"]);
                        $("#prenom").val(data["prenom"]);
                        $("#nameBloc").show("slow");
                    } else {
                        $("#nameBloc").hide("slow");
                        alert("Elève ou étudiant inexistant");
                    }
                },
                error: function (data) {
                    $("#nameBloc").hide("slow");
                    alert("Elève ou étudiant inexistant");
                }
            });
        }
    
        $("#type").change(function () {
            var value = $(this).val();
    
            if (value == 2) {
    
                $("#infoContent").empty();
                $("#infoMultiParticipant").hide();
    
                $("#typeBloc").removeClass("col-sm-6");
                $("#typeBloc").addClass("col-sm-4");
    
                $("#themeBloc").removeClass("col-sm-6");
                $("#themeBloc").addClass("col-sm-4");
    
                $("#partBloc").show();
    
            } else {
    
                showMutiUserInfo(1);
    
                $("#typeBloc").removeClass("col-sm-4");
                $("#typeBloc").addClass("col-sm-6");
    
                $("#themeBloc").removeClass("col-sm-4");
                $("#themeBloc").addClass("col-sm-6");
    
                $("#partBloc").hide();
            }
        });
    
        $("#typeEntretien").on("click", function () {
            var typeEntretien = $(this).val();
            $.ajax({
    
                type: "POST",
                url: "{{route('getContenuEntretienByType')}}",
                data: {
                    "id": typeEntretien,
                    "_token": "{{Session::token()}}",
                },
                success: function (data) {
                    $("#contenu").empty();
                    for (var i = 0; i < data.length; i++) {
                        $("#contenu").append("<option value='" + data[i]["id"] + "' >" + data[i]["contenu"] + "</option>");
                    }
                },
                error: function (data) {
                    alert("Impossible de récupérer les contenus correspondant à ce type d'entretien");
                }
            });
    
        });
    
        $("#participant").change(function () {
            var valeur = $(this).val();
            showMutiUserInfo(valeur);
        });
    
        function showMutiUserInfo(size) {
            $("#infoMultiParticipant").show();
            $("#infoContent").empty();
    
            for (var i = 0; i < size; i++) {
                $("#infoContent").append('<div class="row" style="margin-top: 20px;">\n' +
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
                        '                                                                <select class="form-control" name="sexe[]" id="sexe">\n' +
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
                        '                                                                <select class="form-control" name="age[]" id="age">\n' +
                        '                                                                    <option selected disabled>Choisir l\'age</option>\n' +
                        '                                                                    @for($i = 10; $i <= 35; $i++)\n' +
                        '                                                                    <option value="{{$i}}">{{$i}}</option>\n' +
                        '                                                                    @endfor\n' +
                        '                                                                </select>\n' +
                        '                                                            </div>\n' +
                        '                                                        </div>\n' +
                        '                                                    </div>\n' +
                        '\n' +
                        '                                                    <div class="col-sm-3">\n' +
                        '                                                        <div class="form-group row">\n' +
                        '                                                            <div class="col-sm-12">\n' +
                        '                                                                <select class="form-control" name="statut[]" id="statut">\n' +
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
                        '                                                                <select class="form-control" name="pays[]" id="pays">\n' +
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
                        '                                                                <select class="form-control" name="profession[]" id="profession">\n' +
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
                        '                                                                <select class="form-control" name="region[]"  id="region">\n' +
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