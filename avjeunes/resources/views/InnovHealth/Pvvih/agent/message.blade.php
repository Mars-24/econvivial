@extends("Template.otherTemplate")


@section("title")
    Diffuser un message aux PVVIH
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
                                    <h4 class="card-title">Diffuser un message aux plaignants</h4>
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

                                            <form class="form" action="{{route('post-message-pvvih')}}" method="POST">

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="control-label col-sm-3">Message à diffuser</label>
                                                            <div class="col-sm-9">

                                                                <textarea required class="form-control" rows="3" value="{{old('message')}}" name="message" placeholder="Message à diffuser" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        <div class="form-group row">

                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <th><input type="checkbox" class="form-control" id="selectAll"/>  Sélectionnez tout</th>
                                                                    <th>Code</th>
                                                                    <th>Nom</th>
                                                                    <th>Prénom</th>
                                                                    <th>Téléphone</th>
                                                                </thead>

                                                                <tbody>
                                                                @foreach($pvvihs as $pvvih)
                                                                    <tr class="item{{$pvvih->id}}">
                                                                        <td><input type="checkbox" class="form-control select" name="choix[]" value="{{$pvvih->id}}" /></td>
                                                                        <td>{{$pvvih->code}}</td>
                                                                        <td>{{$pvvih->nom}}</td>
                                                                        <td>{{$pvvih->prenom}}</td>
                                                                        <td><b>{{$pvvih->telephone}}</b></td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6"  >
                                                            <input type="hidden" name="_token" value="{{Session::token()}}" />
                                                            <button type="submit" id="saveButton" style="width: 250px;" class="btn btn-outline-success btn-rounded">Diffuser le message</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


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



    <script>

        $("#selectAll").on("change", function(){

            var x = document.getElementById("selectAll").checked;

            if(x === true){
                $(".select").prop("checked", true);
            }else{
                $(".select").prop("checked", false);
            }
        });
    </script>
@endsection