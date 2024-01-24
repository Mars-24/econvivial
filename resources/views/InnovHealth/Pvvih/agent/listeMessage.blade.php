@extends("Template.otherTemplate")


@section("title")
    Liste des messages diffusés
@endsection


@section("body")

    <div class="container-scroller">
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.innovPvvihSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Liste des messages diffusés</h4>
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

                                            <table id="table" class="table table-bordered table-condensed table-striped" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Ref</th>
                                                    <th>Date</th>
                                                    <th>Message</th>
                                                    <th>Emetteur</th>
                                                    <th>Nombre Destinataire</th>
                                                    <th>Reçu</th>
                                                    <th>Détail Destinataire</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($messages as $message)
                                                    <tr class="item{{$message->id}}">
                                                        <td>{{$message->id}}</td>
                                                        <td>{{date_format(date_create($message->created_at),"d M Y")}}</td>
                                                        <td>{{$message->message}}</td>
                                                        <td>{{\App\User::where("id", $message->user_id)->first()->username }}</td>
                                                        <td><b>{{$message->nbreRecu}}</b></td>
                                                        <td>
                                                            <b>
                                                                @if(!$message->delivrer)
                                                                    <label class="badge badge-danger badge-pill">NON</label>
                                                                @else
                                                                    <label class="badge badge-success badge-pill">OUI</label>
                                                                @endif
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <form action="{{route('detail-message-pvvih')}}" method="GET">
                                                                <input type="hidden" name="ref" value="{{$message->id}}" />
                                                                <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                                <input type="hidden" name="page" value="liste" />
                                                                <button type="submit"  class="btn btn-primary">Détail Destinataire</button>
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
    <!-- container-scroller -->


@endsection