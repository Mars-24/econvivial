@extends('Template.otherTemplate')

@section('title', 'Localisation des cas du COVID-19')

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
                                    <h4 class="card-title" style="text-transform: none !important;">Localisation des cas du COVID-19</h4>
                                    
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
                                    
                                    <form id="send-form" method="POST" action="{{ route('covid-19-case-location.store') }}" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                        
                                        <button type="button" id="add-new-city" class="btn btn-sm btn-info">Ajouter une ville</button>
                                        
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Ville</th>
                                                        <th>Position</th>
                                                        @foreach($cases as $case)
                                                        <th>{{ $case->name }}</th>
                                                        @endforeach
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody id="results-container">
                                                    @forelse($cities as $city)
                                                        <tr>
                                                            <td>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <input type="hidden" name="cities[{{ $city->id }}][id]" value="{{ $city->id }}" />
                                                                        
                                                                        <input type="text" name="cities[{{ $city->id }}][name]" class="form-control form-control-sm" placeholder="Ville" required value="{{ $city->name }}" />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            <td>
                                                                <div class="form-row">
                                                                    <div class="form-group col-lg-6">
                                                                        <input type="number" name="cities[{{ $city->id }}][latitude]" step="0.01" class="form-control form-control-sm" placeholder="Latitude" required value="{{ $city->latitude }}" />
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-lg-6">
                                                                        <input type="number" name="cities[{{ $city->id }}][longitude]" step="0.01" class="form-control form-control-sm" placeholder="Longitude" required value="{{ $city->longitude }}" />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            @foreach($city->cases as $case)
                                                                <td>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-lg-12">
                                                                            <input type="number" name="cities[{{ $city->id }}][cases][{{ $case->id }}][count]" step="0.01" class="form-control form-control-sm" placeholder="Nombre de {{ $case->name }}" required value="{{ $case->pivot->count }}" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <input type="text" name="cities[0][name]" class="form-control form-control-sm" placeholder="Ville" required />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            <td>
                                                                <div class="form-row">
                                                                    <div class="form-group col-lg-6">
                                                                        <input type="number" name="cities[0][latitude]" step="0.01" class="form-control form-control-sm" placeholder="Latitude" required />
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-lg-6">
                                                                        <input type="number" name="cities[0][longitude]" step="0.01" class="form-control form-control-sm" placeholder="Longitude" required />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            @foreach($cases as $case)
                                                                <td>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-lg-12">
                                                                            <input type="number" name="cities[0][cases][{{ $case->id }}][count]" step="0.01" class="form-control form-control-sm" placeholder="Nombre de {{ $case->name }}" required />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <!--uncomment this to update case icon-->
                                        <!--@foreach($cases as $cas)-->
                                        <!--{{ $cas->name }}-->
                                        <!--<input type="file" name="icons[{{ $cas->id }}][icon]">-->
                                        <!--@endforeach-->
                                        
                                        <div class="form-row">
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
    <script>
        $(document).ready(function() {
            $('#add-new-city').on('click', function() {
                const container = $('#results-container');
                
                const length = container.children().length + 1;
                
                console.log(length);
                
                container.append(`
                    <tr>
                        <td>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" name="cities[${length}][name]" class="form-control form-control-sm" placeholder="Ville" required />
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="number" name="cities[${length}][latitude]" step="0.01" class="form-control form-control-sm" placeholder="Latitude" required />
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <input type="number" name="cities[${length}][longitude]" step="0.01" class="form-control form-control-sm" placeholder="Longitude" required />
                                </div>
                            </div>
                        </td>
                        
                        @foreach($cases as $case)
                            <td>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <input type="number" name="cities[${length}][cases][{{ $case->id }}][count]" step="0.01" class="form-control form-control-sm" placeholder="Nombre de {{ $case->name }}" required />
                                    </div>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                `);
            });
            
            $(document).on('click', '.remove', function() {
                $(this).closest('.result-container').remove();
            });
        });
    </script>
@endsection