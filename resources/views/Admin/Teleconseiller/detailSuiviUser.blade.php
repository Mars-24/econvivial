@extends("Template.otherTemplate")


@section("title")
    Détail des messages
@endsection


@section("body")

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include("HeaderNav.adminNav")
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
        @include("Profile.adminSideProfil")
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-12 ">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Messages</h4>
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

                                            <div class="col-sm-12">

                                                <h4>Liste périodique des messages échangés</h4>

                                                <form action="" method="GET">
                                                    <div class="row" style="margin-bottom: 30px;">


                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Date de :</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d')}}" value="{{$debut}}" type="date" name="debut" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Date à :</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" style="text-transform: uppercase;" max="{{date('Y-m-d')}}" value="{{$fin}}" type="date" name="fin" required />
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <input type="hidden" name="id" value="{{$userID}}" />
                                                                    <button type="submit" style="width: 250px;" class="btn btn-outline-success btn-rounded">Rechercher</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>

                                            <table id="table" class="table table-bordered table-condensed " cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Reférence</th>
                                                    <th>Message</th>
                                                    <th>Assistant</th>
                                                    <th>Statut</th>
                                                    <th>Date</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($chats as $chat)
                                                    <tr class="item{{$chat->id}}">
                                                        <td>{{$chat->id }}</td>
                                                        <td>{{$chat->message}}</td>
                                                        <td> @if($chat->receiver_id == $userID)
                                                                @if(\App\User::where("id", $chat->sender_id)->first() != null)
                                                                    {{ \App\User::where("id", $chat->sender_id)->first()->username}}
                                                                @endif
                                                            @else
                                                                @if(\App\User::where("id", $chat->receiver_id)->first() != null)
                                                                {{\App\User::where("id", $chat->receiver_id)->first()->username}}
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td><b>
                                                            @if($chat->receiver_id == $userID)
                                                                <span style="color: green;font-size: 20px;">Reçu</span>
                                                            @else
                                                                <span style="color: blue;font-size: 20px;">Envoyé</span>
                                                            @endif
                                                            </b>
                                                        </td>
                                                        <td>{{$chat->created_at}}</td>
                                                        <td>
                                                           <button type="button"  class="btn btn-outline-danger delete-modal"
                                                           data-id = "{{$chat->id}}">Supprimer</button>
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


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Supprimer un message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer ce message?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="chat-id" />
                    <button type="button" class="btn btn-danger delete-chat">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(".delete-modal").on("click", function (event) {
            event.preventDefault();
            $("#chat-id").val($(this).data("id"));
            $("#deleteModal").modal("show");
        });

        $(".delete-chat").on("click", function () {
            var id =  $("#chat-id").val();
            $.ajax({
                type : "POST",
                url:"{{route('delete-chat-message')}}",
                data:{
                    '_token': '{{Session::token()}}',
                    'id': id
                },
                success: function(data){
                    if(data === "true"){
                        $('.item'+ id).remove();
                    }else{
                        alert("Impossible de supprimer");
                    }
                    $("#deleteModal").modal("hide");
                },
                error :function(data){
                    $("#deleteModal").modal("hide");
                    alert("Une erreur s'est produite, impossible de supprimer ce message")
                }
            });
        });

    </script>

@endsection

