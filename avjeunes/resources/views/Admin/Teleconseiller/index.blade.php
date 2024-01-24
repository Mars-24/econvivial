@extends("Template.otherTemplate")


@section("title")
    Gestion des téléconseillers
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste des téléconseillers</h4>
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

                                             <div class="row">
                                                 <a href="{{route('gestion-tele-conseiller')}}" class="btn btn-outline-primary edit-modal" style="float: right;" >Ajouter un téléconseiller</a>
                                             </div><br/>

                                            <table id="table" class="table table-bordered table-condensed table" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Nom d'utilisateur</th>
                                                    <th>Email</th>
                                                    <th>N° Téléphone</th>
                                                    <th>Profession</th>
                                                    <th>Suivre</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($conseillers as $conseiller)
                                                    <tr class="item{{$conseiller->id}}">
                                                        <td>{{$conseiller->username}}</td>
                                                        <td>{{$conseiller->email}}</td>
                                                        <td>(+228) {{$conseiller->numero}}</td>
                                                        <td>{{\App\ProfessionConseiller::where("id", $conseiller->profession_conseiller_id)->first()->libelle}}</td>

                                                        <td>
                                                            <form action="{{route('suivre-teleconseiller-chats')}}" method="GET">
                                                                <input type="hidden" name="id" value="{{$conseiller->id}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <button type="submit" class="btn btn-outline-success">Suivre</button>
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

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            @include("Footer.dashboardFooter")
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

@endsection