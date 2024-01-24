@extends("Template.mainTemplate")

@section('title', 'Tableau de bord administrateur')

@section('body')
    <style type="text/css">
        .widget-card-1 {
            height: 220px;
        }
    </style>
    
    <div class="container-scroller">
        @include("HeaderNav.adminNav")
    
        <div class="container-fluid page-body-wrapper">
            @include("Profile.adminSideProfil")
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @foreach($roles as $role)
                            <div class="col-md-6 col-xl-3">
                                <div class="card widget-card-1">
                                    <div class="card-block-small">
                                        {{-- <a href="{{route($role->route)}}"> --}}
                                        <a href="{{ $role->route == 'admin-conseil-pratique' ? route('tableau-de-bord-admin') : route($role->route) }}">
                                            <i class="icofont icofont-ui-home bg-c-blue card1-icon ">
                                                {{--<img src="images/icons/consultation.png" alt="No image" />--}}
                                                <span class="mdi mdi-compass-outline menu-icon"></span>
                                            </i>
                                            <span class="text-c-blue f-w-600"></span>
                                            
                                            <h4></h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>
                                                    <h4>{{ $role->libelle }}</h4>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                @include("Footer.dashboardFooter")
            </div>
        </div>
    </div>
@endsection