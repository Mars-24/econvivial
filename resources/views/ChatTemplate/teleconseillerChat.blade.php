
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>


<style class="cp-pen-styles">
    /*body {*/
    /*display: flex;*/
    /*align-items: center;*/
    /*justify-content: center;*/
    /*min-height: 100vh;*/
    /*background: #27ae60;*/
    /*font-family: "proxima-nova", "Source Sans Pro", sans-serif;*/
    /*font-size: 1em;*/
    /*letter-spacing: 0.1px;*/
    /*color: #32465a;*/
    /*text-rendering: optimizeLegibility;*/
    /*text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);*/
    /*-webkit-font-smoothing: antialiased;*/
    /*}*/

    #frame {
        width: 100%;
        min-width: 360px;
        max-width: 1000px;
        height: 72vh;
        min-height: 300px;
        max-height: 720px;
        background: #E6EAEA;
    }
    @media screen and (max-width: 360px) {
        #frame {
            width: 100%;
            height: 100vh;
        }
    }
    #frame #sidepanel {
        float: left;
        min-width: 280px;
        max-width: 340px;
        width: 20%;
        height: 100%;
        background: #4d9af9;
        color: #f5f5f5;
        overflow: hidden;
        position: relative;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel {
            width: 58px;
            min-width: 58px;
        }
    }
    #frame #sidepanel #profile {
        width: 80%;
        margin: 25px auto;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile {
            width: 100%;
            margin: 0 auto;
            padding: 5px 0 0 0;
            /*background: #32465a;*/
            background: #4d9af9;
        }
    }
    #frame #sidepanel #profile.expanded .wrap {
        height: 210px;
        line-height: initial;
    }
    #frame #sidepanel #profile.expanded .wrap p {
        margin-top: 20px;
    }
    #frame #sidepanel #profile.expanded .wrap i.expand-button {
        -moz-transform: scaleY(-1);
        -o-transform: scaleY(-1);
        -webkit-transform: scaleY(-1);
        transform: scaleY(-1);
        filter: FlipH;
        -ms-filter: "FlipH";
    }
    #frame #sidepanel #profile .wrap {
        height: 60px;
        line-height: 60px;
        overflow: hidden;
        -moz-transition: 0.3s height ease;
        -o-transition: 0.3s height ease;
        -webkit-transition: 0.3s height ease;
        transition: 0.3s height ease;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap {
            height: 55px;
        }
    }
    #frame #sidepanel #profile .wrap img {
        width: 50px;
        border-radius: 50%;
        padding: 3px;
        border: 2px solid #e74c3c;
        height: auto;
        float: left;
        cursor: pointer;
        -moz-transition: 0.3s border ease;
        -o-transition: 0.3s border ease;
        -webkit-transition: 0.3s border ease;
        transition: 0.3s border ease;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap img {
            width: 40px;
            margin-left: 4px;
        }
    }
    #frame #sidepanel #profile .wrap img.online {
        border: 2px solid #2ecc71;
    }
    #frame #sidepanel #profile .wrap img.away {
        border: 2px solid #f1c40f;
    }
    #frame #sidepanel #profile .wrap img.busy {
        border: 2px solid #e74c3c;
    }
    #frame #sidepanel #profile .wrap img.offline {
        border: 2px solid #95a5a6;
    }
    #frame #sidepanel #profile .wrap p {
        float: left;
        margin-left: 15px;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap p {
            display: none;
        }
    }
    #frame #sidepanel #profile .wrap i.expand-button {
        float: right;
        margin-top: 23px;
        font-size: 0.8em;
        cursor: pointer;
        color: #435f7a;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap i.expand-button {
            display: none;
        }
    }
    #frame #sidepanel #profile .wrap #status-options {
        position: absolute;
        opacity: 0;
        visibility: hidden;
        width: 150px;
        margin: 70px 0 0 0;
        border-radius: 6px;
        z-index: 99;
        line-height: initial;
        background: #435f7a;
        -moz-transition: 0.3s all ease;
        -o-transition: 0.3s all ease;
        -webkit-transition: 0.3s all ease;
        transition: 0.3s all ease;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options {
            width: 58px;
            margin-top: 57px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options.active {
        opacity: 1;
        visibility: visible;
        margin: 75px 0 0 0;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options.active {
            margin-top: 62px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 8px solid #435f7a;
        margin: -8px 0 0 24px;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options:before {
            margin-left: 23px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul {
        overflow: hidden;
        border-radius: 6px;
    }
    #frame #sidepanel #profile .wrap #status-options ul li {
        padding: 15px 0 30px 18px;
        display: block;
        cursor: pointer;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li {
            padding: 15px 0 35px 22px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul li:hover {
        background: #4d9af9;
    }
    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 5px 0 0 0;
    }

    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
            width: 14px;
            height: 14px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
        content: '';
        position: absolute;
        width: 14px;
        height: 14px;
        margin: -3px 0 0 -3px;
        background: transparent;
        border-radius: 50%;
        z-index: 0;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
            height: 18px;
            width: 18px;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul li p {
        padding-left: 12px;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #profile .wrap #status-options ul li p {
            display: none;
        }
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
        background: #2ecc71;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
        border: 1px solid #2ecc71;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
        background: #f1c40f;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
        border: 1px solid #f1c40f;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
        background: #e74c3c;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
        border: 1px solid #e74c3c;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
        background: #95a5a6;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
        border: 1px solid #95a5a6;
    }
    #frame #sidepanel #profile .wrap #expanded {
        padding: 100px 0 0 0;
        display: block;
        line-height: initial !important;
    }
    #frame #sidepanel #profile .wrap #expanded label {
        float: left;
        clear: both;
        margin: 0 8px 5px 0;
        padding: 5px 0;
    }
    #frame #sidepanel #profile .wrap #expanded input {
        border: none;
        margin-bottom: 6px;
        background: #32465a;
        border-radius: 3px;
        color: #f5f5f5;
        padding: 7px;
        width: calc(100% - 43px);
    }
    #frame #sidepanel #profile .wrap #expanded input:focus {
        outline: none;
        background: #435f7a;
    }
    #frame #sidepanel #search {
        border-top: 1px solid #32465a;
        border-bottom: 1px solid #32465a;
        font-weight: 300;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #search {
            display: none;
        }
    }
    #frame #sidepanel #search label {
        position: absolute;
        margin: 10px 0 0 20px;
    }
    #frame #sidepanel #search input {
        font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
        padding: 10px 0 10px 46px;
        width: calc(100% - 25px);
        border: none;
        background: #32465a;
        color: #f5f5f5;
    }
    #frame #sidepanel #search input:focus {
        outline: none;
        background: #435f7a;
    }
    #frame #sidepanel #search input::-webkit-input-placeholder {
        color: #f5f5f5;
    }
    #frame #sidepanel #search input::-moz-placeholder {
        color: #f5f5f5;
    }
    #frame #sidepanel #search input:-ms-input-placeholder {
        color: #f5f5f5;
    }
    #frame #sidepanel #search input:-moz-placeholder {
        color: #f5f5f5;
    }
    #frame #sidepanel #contacts {
        height: calc(100% - 177px);
        overflow-y: scroll;
        overflow-x: hidden;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts {
            height: calc(100% - 149px);
            overflow-y: scroll;
            overflow-x: hidden;
        }
        #frame #sidepanel #contacts::-webkit-scrollbar {
            display: none;
        }
    }
    #frame #sidepanel #contacts.expanded {
        height: calc(100% - 334px);
    }
    #frame #sidepanel #contacts::-webkit-scrollbar {
        width: 8px;
        background: #2c3e50;
    }
    #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
        background-color: #243140;
    }
    #frame #sidepanel #contacts ul li.contact {
        position: relative;
        padding: 10px 0 15px 0;
        font-size: 0.9em;
        cursor: pointer;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact {
            padding: 6px 0 46px 8px;
        }
    }
    #frame #sidepanel #contacts ul li.contact:hover {
        background: #78ccf9;
        /*background: #32465a;*/
    }
    #frame #sidepanel #contacts ul li.contact.active {
        /*background: #32465a;*/
        background: #6bcaf9;
        border-right: 5px solid #435f7a;
    }
    #frame #sidepanel #contacts ul li.contact.active span.contact-status {
        border: 2px solid #32465a !important;
    }
    #frame #sidepanel #contacts ul li.contact .wrap {
        width: 88%;
        margin: 0 auto;
        position: relative;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap {
            width: 100%;
        }
    }
    #frame #sidepanel #contacts ul li.contact .wrap span {
        position: absolute;
        left: 0;
        margin: -2px 0 0 -2px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 2px solid #2c3e50;
        background: #95a5a6;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.online {
        background: #2ecc71;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.away {
        background: #f1c40f;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.busy {
        background: #e74c3c;
    }
    #frame #sidepanel #contacts ul li.contact .wrap img {
        width: 40px;
        border-radius: 50%;
        float: left;
        margin-right: 10px;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap img {
            margin-right: 0px;
        }
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta {
        padding: 5px 0 0 0;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #contacts ul li.contact .wrap .meta {
            display: none;
        }
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
        font-weight: 600;
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
        margin: 5px 0 0 0;
        padding: 0 0 1px;
        font-weight: 400;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        -moz-transition: 1s all ease;
        -o-transition: 1s all ease;
        -webkit-transition: 1s all ease;
        transition: 1s all ease;
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
        position: initial;
        border-radius: initial;
        background: none;
        border: none;
        padding: 0 2px 0 0;
        margin: 0 0 0 1px;
        opacity: .5;
    }
    #frame #sidepanel #bottom-bar {
        position: absolute;
        width: 100%;
        bottom: 0;
    }
    #frame #sidepanel #bottom-bar button {
        float: left;
        border: none;
        width: 50%;
        padding: 10px 0;
        background: #32465a;
        color: #f5f5f5;
        cursor: pointer;
        font-size: 0.85em;
        font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button {
            float: none;
            width: 100%;
            padding: 15px 0;
        }
    }
    #frame #sidepanel #bottom-bar button:focus {
        outline: none;
    }
    #frame #sidepanel #bottom-bar button:nth-child(1) {
        border-right: 1px solid #2c3e50;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button:nth-child(1) {
            border-right: none;
            border-bottom: 1px solid #2c3e50;
        }
    }
    #frame #sidepanel #bottom-bar button:hover {
        /*background: #435f7a;*/
        background: #24e0f9;
    }
    #frame #sidepanel #bottom-bar button i {
        margin-right: 3px;
        font-size: 1em;
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button i {
            font-size: 1.3em;
        }
    }
    @media screen and (max-width: 735px) {
        #frame #sidepanel #bottom-bar button span {
            display: none;
        }
    }
    #frame .content {
        float: right;
        width: 70%;
        height: 100%;
        overflow: hidden;
        position: relative;
    }
    @media screen and (max-width: 735px) {
        #frame .content {
            width: calc(100% - 35.5%);
            min-width: 300px !important;
        }
    }
    @media screen and (min-width: 900px) {
        #frame .content {
            width: calc(100% - 35.5%);
        }
    }
    #frame .content .contact-profile {
        width: 100%;
        height: 60px;
        line-height: 60px;
        /*background: #f5f5f5;*/
        background: #2498ed;
    }
    #frame .content .contact-profile img {
        width: 40px;
        border-radius: 50%;
        float: left;
        margin: 9px 12px 0 9px;
    }
    #frame .content .contact-profile p {
        float: left;
    }
    #frame .content .contact-profile .social-media {
        float: right;
    }
    #frame .content .contact-profile .social-media i {
        margin-left: 14px;
        cursor: pointer;
    }
    #frame .content .contact-profile .social-media i:nth-last-child(1) {
        margin-right: 20px;
    }
    #frame .content .contact-profile .social-media i:hover {
        color: #435f7a;
    }
    #frame .content .messages {
        height: auto;
        min-height: calc(100% - 93px);
        max-height: calc(100% - 93px);
        overflow-y: scroll;
        overflow-x: hidden;
    }
    @media screen and (max-width: 735px) {
        #frame .content .messages {
            max-height: calc(100% - 105px);
        }
    }
    #frame .content .messages::-webkit-scrollbar {
        width: 8px;
        background: transparent;
    }
    #frame .content .messages::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.3);
    }
    #frame .content .messages ul li {
        display: inline-block;
        clear: both;
        float: left;
        margin: 15px 15px 5px 15px;
        width: calc(100% - 25px);
        font-size: 0.9em;
    }
    #frame .content .messages ul li:nth-last-child(1) {
        margin-bottom: 20px;
    }

    #frame .content .messages ul li.sent {
        float: left;
    }

    #frame .content .messages ul li.sent img {
        margin: 6px 8px 0 0;
    }
    #frame .content .messages ul li.sent p {
        background: #4d9af9;
        color: white;
    }
    #frame .content .messages ul li.replies img {
        float: right;
        margin: 6px 0 0 8px;
    }
    #frame .content .messages ul li.replies p {
        background: #f962a8;
        color:white;
        float: right;
    }
    #frame .content .messages ul li img {
        width: 22px;
        border-radius: 50%;
        float: left;
    }
    #frame .content .messages ul li p {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 20px;
        max-width: 205px;
        line-height: 130%;
    }
    @media screen and (min-width: 735px) {
        #frame .content .messages ul li p {
            max-width: 300px;
        }
    }
    #frame .content .message-input {
        position: absolute;
        bottom: 0;
        width: 100%;
        z-index: 99;
    }
    #frame .content .message-input .wrap {
        position: relative;
    }
    #frame .content .message-input .wrap input {
        font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
        float: left;
        border: none;
        width: calc(100% - 90px);
        padding: 11px 32px 10px 8px;
        font-size: 0.8em;
        color: #32465a;
    }
    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap input {
            padding: 15px 32px 16px 8px;
        }
    }
    #frame .content .message-input .wrap input:focus {
        outline: none;
    }
    #frame .content .message-input .wrap .attachment {
        position: absolute;
        right: 60px;
        z-index: 4;
        margin-top: 10px;
        font-size: 1.1em;
        color: #435f7a;
        opacity: .5;
        cursor: pointer;
    }
    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap .attachment {
            margin-top: 17px;
            right: 65px;
        }
    }
    #frame .content .message-input .wrap .attachment:hover {
        opacity: 1;
    }
    #frame .content .message-input .wrap button {
        float: right;
        border: none;
        width: 50px;
        padding: 12px 0;
        cursor: pointer;
        background: #2498ed;
        color: #f5f5f5;
    }
    @media screen and (max-width: 735px) {
        #frame .content .message-input .wrap button {
            padding: 16px 0;
        }
    }
    #frame .content .message-input .wrap button:hover {
        background: #435f7a;
    }
    #frame .content .message-input .wrap button:focus {
        outline: none;
    }
</style>

<div class="col-sm-12">
<div id="frame">
    
    <div id="sidepanel">
        <div id="profile">
            <div class="wrap">
                <img id="profile-img" @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif class="online" alt="" />
                <p>{{$utilisateur->username}}</p>

                <div id="status-options">

                </div>

            </div>
        </div>
        <div id="search">

        </div>
        <div id="contacts">
            <ul id="contact-side-bar">

                @foreach($users as $user)
                    <li class="contact">
                        <div class="wrap">
                            <span class="contact-status online"></span>
                            <img class="img" @if($user->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$user->profil}}" @endif alt="" />
                            <div class="meta">
                                <p class="name" style="">{{$user->username}} <span style="margin-left: 20px;color: white;display: none;"> |    Age : {{$user->age}} ans | Sexe : {{$user->sexe != null ? $user->sexe  : 'Non défini'}} </span></p>

                                <p class="preview">{{$user->lastMessage}}</p>
                                    <span class="count" style="position: relative;float:right;font-weight: bold; margin-left: 3px; margin-top: -30px; height: 30px; width: 30px; background-color: #0fc825;border-radius: 50%;text-align: center;@if($user->unReadAssistant == 0) display:none  @endif ">
                                        {{$user->unReadAssistant}}
                                    </span>
                                <input type="hidden" value="{{$user->id}}" class="user-id" data-id = "{{$user->id}}" />
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
        <div id="bottom-bar">

        </div>
    </div>
    
    <div class=" content">
        <div class="contact-profile">
            <img id="contact-profil" src="images/profil/profil.png" alt="" />
            <p id="conseiller-name" style="color:white;">@if(count($users) > 0 ) {{$users[0]->username}} @else User @endif
            <h3 ><b style="color:white;margin-left: 20px;">Age : <span id="age">@if(count($users) > 0 ) {{$users[0]->age}} @else 0 @endif ans</span> </b> 
           </h3></p>

            <div class="social-media">

            </div>
        </div>
        <div class="messages" id="message">
            <ul>
                @foreach($chats as $chat)
                    @if($chat->sender_id == Auth::user()->id)
                        <li class="replies" style="margin-top: 5px; margin-bottom: 15px;">
                            <img @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="" />
                            <p>{{$chat->message}} <br/> <span style="font-size: 10px;float: right">{{$chat->created_at}}</span></p>

                        </li>
                    @else
                        <li class="sent" style="margin-top: 5px; margin-bottom: 15px;">
                            <img @if(\App\User::where('id', $chat->sender_id)->first()->profil == null)  src="images/profil/profil.png" @else
                            src="images/profil/{{\App\User::where('id', $chat->sender_id)->first()->profil}}" @endif alt="" />
                            <p>{{$chat->message}} <br/> <span style="font-size: 10px;float: left;">{{$chat->created_at}}</span></p>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="message-input">
            <div class="wrap">
                <input type="text" placeholder="Votre message ..." class="form-control" 
				style="width:64%; margin-left: 10px;" />
                <!--<i class="fa fa-paperclip attachment" aria-hidden="true"></i>-->
                <button class="submit" id="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            
				<!--CAMERA ICON BUTTON-->
					<button class="form-control btn btn-fab btn-round btn-raised btn-link" 
					id="cam-icon-button" 
						style="z-index: 102; float: right; margin-left:2px; margin-left:2px; cursor: pointer;" 
						data-toggle="modal" data-target="#input-webcamSnap">
						<i class="fa fa-camera" id="cam-icon" 
						style="font-size: 1em;"></i>
					</button>
					
					<!--PHOTO ICON BUTTON-->
					<button class="text-center input-files btn btn-fab btn-round btn-raised btn-link" 
						style="margin-left:2px; cursor: pointer;" 
						data-toggle="modal" data-target="#input-picture">
						<i class="fa fa-image" id="cam-icon" 
						style="font-size: 1em;"></i>
					</button>
					
					<!--SUBMIT/RECORD BUTTON-->
					<button class="btn btn-fab btn-round btn-raised btn-white" 
					id="input-icon-button"
						style="z-index: 102; float: right; cursor: pointer;">
						<i class="fa fa-microphone" id="micro-icon" 
						data-toggle="modal" data-target="#input-record"></i>
					</button>
			
			</div>
        </div>
    </div>
</div>
</div>

<script >

    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
    var userID = $("#contacts ul li:nth-child(1)").find("input").val();

    var userImage;
    $(document).ready(function(){
        $("#contacts ul li:nth-child(1)").addClass("active");

        $("#contacts ul li").click(function(){
            userID = $(this).find("input").val();
            var userName = $(this).find("p:nth-child(1)").text();
          
            $("#conseiller-name").text(userName);
            $('.messages ul').empty();
            $('#contacts ul li').removeClass("active");
            $(this).addClass("active");
            loadDataForSpecifiqUser(userID);
        });
        pullData();
        refreshUser();

        var objDiv = document.getElementById("message");
        $(".messages").animate({ scrollTop: objDiv.scrollHeight }, "fast");
    });


    function loadDataForSpecifiqUser(id){

        var userID = "{{\Illuminate\Support\Facades\Auth::user()->id}}"
        $.ajax({
            type : "POST",
            url:"{{route('retrieveChatForSpecificUser')}}",
            data:{
                '_token': '{{Session::token()}}',
                'id': id
            },
            success: function(data){
                if(data["error"] === false){
                    //  alert(userID);
                    for (var i=0 ; i< data["chats"].length ; i++) {
                        if(data["chats"][i].sender_id == userID){
                            $('<li class="replies" style="margin-top: 5px; margin-bottom: 15px;"><img  @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="" /><p>' + data["chats"][i].message + ' <br/> <span style="font-size: 10px;float: right;">'+data["chats"][i].created_at+'</span></p></li>').appendTo($('.messages ul'));
                        }else{
                            //alert(data["chats"][i].sender_id);
                            $('<li class="sent" style="margin-top: 5px; margin-bottom: 15px;"><img  src="'+userImage+'" alt="" /><p>' + data["chats"][i].message + ' <br/> <span style="font-size: 10px;float: left;">'+data["chats"][i].created_at+'</span></p></li>').appendTo($('.messages ul'));
                        }
                    }
                    var objDiv = document.getElementById("message");
                    $(".messages").animate({ scrollTop: objDiv.scrollHeight }, "fast");
                }
            },
            error :function(data){
                alert("Une erreur s'est produite, impossible de récupérer les messages");
            }
        });
    }

    $("#profile-img").click(function() {
        $("#status-options").toggleClass("active");
    });

    $(".expand-button").click(function() {
        $("#profile").toggleClass("expanded");
        $("#contacts").toggleClass("expanded");
    });

    $("#status-options ul li").click(function() {
        $("#profile-img").removeClass();
        $("#status-online").removeClass("active");
        $("#status-away").removeClass("active");
        $("#status-busy").removeClass("active");
        $("#status-offline").removeClass("active");
        $(this).addClass("active");

        if($("#status-online").hasClass("active")) {
            $("#profile-img").addClass("online");
        } else if ($("#status-away").hasClass("active")) {
            $("#profile-img").addClass("away");
        } else if ($("#status-busy").hasClass("active")) {
            $("#profile-img").addClass("busy");
        } else if ($("#status-offline").hasClass("active")) {
            $("#profile-img").addClass("offline");
        } else {
            $("#profile-img").removeClass();
        };

        $("#status-options").removeClass("active");
    });

    function newMessage() {
        message = $(".message-input input").val();
        if($.trim(message) == '') {
            return false;
        }

        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        var hour = d.getHours();
        var minute = d.getMinutes();
        var seconde = d.getSeconds();

        var output = d.getFullYear() + '-' +
            (month<10 ? '0' : '') + month + '-' +
            (day<10 ? '0' : '') + day+ " "+hour+":"+(minute<10 ? '0' : '') + minute+":"+ (seconde<10 ? '0' : '') + seconde;

        $('<li class="replies" style="margin-top: 5px; margin-bottom: 15px;"><img @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="" /><p>' + message + ' <br/> <span style="font-size: 10px;float: right;">'+output+'</span></p></li>').appendTo($('.messages ul'));

        $('.message-input input').val(null);
        $('.contact.active .preview').html('<span>You: </span>' + message);

        var objDiv = document.getElementById("message");
        $(".messages").animate({ scrollTop: objDiv.scrollHeight }, "fast");

        $.ajax({
            type : "POST",
            url:"{{route('sendChatMessage')}}",
            data:{
                '_token': '{{Session::token()}}',
                'message': message,
                'receiverID': userID
            },
            success: function(data){
                if(!data["error"]){
                    // alert(data["chat"]);
                }else{
                    //  alert(data["chat"]);
                }
            },
            error :function(data){
                alert("Une erreur s'est produite, le message n'a pas été envoyé");
            }
        });
    };

    $('.submit').click(function() {
        newMessage();
    });

    $(window).on('keydown', function(e) {
        if (e.keyCode == 13) {
            newMessage();
            return false;
        }else{

        }
    });

    function pullData(){
        retrieveChat();
        setTimeout(pullData,3000);
    }

    function retrieveChat(){
        $.ajax({
            type : "POST",
            url:"{{route('retrieveChat')}}",
            data:{
                '_token': '{{Session::token()}}',
                'id': userID,
            },
            success: function(data){
                if(data["error"] === false){
                    $('<li class="sent" style="margin-top: 5px; margin-bottom: 15px;"><img  src="images/profil/profil.png" alt="" /><p>' + data["chats"][0].message + '</p></li>').appendTo($('.messages ul'));
                    $('.contact.active .preview').html('<span> </span>' + message);

                    var objDiv = document.getElementById("message");
                    $(".messages").animate({ scrollTop: objDiv.scrollHeight }, "fast");
                }
            },
            error :function(data){
                // alert("Une erreur s'est produite, le message n'a pas été envoyé");
            }
        });
    }

    /**
     * Récupérer la liste des utilisateurs
     */


    function refreshUser(){
        refreshUserList();
        setTimeout(refreshUser,3000);
    }

    function clickAction(id,sexe,age,srcImage){
        var object = $("#contact"+id);
       $("#contact-profil").prop("src", srcImage);
        userImage = srcImage;
        userID = object.find("input").val();
        var userName = object.find("p:nth-child(1)").text();
        $("#age").text(age+" | Sexe : "+sexe);
        $("#conseiller-name").text(userName);
        $('.messages ul').empty();
        $('#contacts ul li').removeClass("active");
        $(this).addClass("active");
        loadDataForSpecifiqUser(userID);
    }

    function refreshUserList(){
        $.ajax({
            type : "POST",
            url:"{{route('refresh-user-liste')}}",
            data:{
                '_token': '{{Session::token()}}',
                'id': '{{Auth::user()->id}}',
            },
            success: function(data){

                console.log("Data =====> "+data);
                if(data["error"] === false){

                    $("#contact-side-bar").empty();

                    for (var i=0 ; i< data["timeLines"].length ; i++) {

                        var profil = data["timeLines"][i].profil;

                        console.log("***sexe ===> "+data["timeLines"][i].sexe);

                        var srcValue = profil != null ? "images/profil/"+profil : "images/profil/profil.png";

                        var age = data["timeLines"][i].age ;
                        
                        var sexe = data["timeLines"][i].sexe;
                        
                

                        var showCount = data["timeLines"][i].unReadAssistant == 0 ? "display:none" : "";

                        var unRead = data["timeLines"][i].unReadAssistant;

                        console.log("***Source ==> "+srcValue)

                        var lastMsg =   data["timeLines"][i].lastMessage != null ? data["timeLines"][i].lastMessage : "Ecrire à l'utilisateur";

                        $('<li class="contact" id="contact'+data["timeLines"][i].id+'" onclick="clickAction('+data["timeLines"][i].id+',\''+sexe+'\','+age+',\''+srcValue+'\')" >' +
                            '<div class="wrap">' +
                            '                            <span class="contact-status online"></span>' +
                            '                            <img class="img" src="'+srcValue+'" alt="" />' +
                            '                            <div class="meta">\n' +
                            '                                <p class="name" style="">'+data["timeLines"][i].username+'</p>' +
                            '                                <p class="preview">'+lastMsg+'</p>\n' +
                            '                                    <span class="count" style="position: relative;float:right;font-weight: bold; margin-left: 3px; margin-top: -30px; height: 30px; width: 30px; background-color: #0fc825;border-radius: 50%;text-align: center; '+showCount+' ">' +
                            '' +unRead+
                            '                                    </span>' +
                            '                                <input type="hidden" value="'+data["timeLines"][i].id+'" class="user-id" data-id = "'+data["timeLines"][i].id+'" />' +
                            '                            </div>' +
                            '                        </div> ' +
                            '</li>').appendTo($("#contact-side-bar"));
                    }
                }
            },
            error :function(data){
                // alert("Une erreur s'est produite, le message n'a pas été envoyé");
            }
        });
    }

    function isTyping(){
        $.ajax({
            type : "POST",
            url:"",
            data:{
                '_token': '{{Session::token()}}',
                'id': "{{Auth::user()->id}}"
            },
            success: function(data){
                notTyping();
            },
            error :function(data){
                alert("Une erreur s'est produite, le message n'a pas été envoyé");
            }
        });
    }

    function notTyping(){
        $.ajax({
            type : "POST",
            url:"",
            data:{
                '_token': '{{Session::token()}}',
                'id': "{{Auth::user()->id}}"
            },
            success: function(data){
                notTyping();
            },
            error :function(data){
                alert("Une erreur s'est produite, le message n'a pas été envoyé");
            }
        });
    }
</script>


<!--====MODALS SECTION====-->
        
        <!--WEBCAM SNPASHOT MODAL-->
        <div class="modal fade" id="input-webcamSnap" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 480px; height: auto; border-radius: 12px; background: #000;">

                    <i class="fa fa-spinner fa-spin spinner" style="position: absolute; color: #fff; font-size: 5em; margin: 200px 0 0 200px;"></i>
                   
                    <div id="user_camera" style="border-radius: 10px;">
                        <!--WEBCAM LIBRARY SCRIPT-->
                        <script language="Javascript" src="{{asset('js/_special/webcam.min.js')}}"></script>
                        
                        <!--WEBCAM SETTINGS SCRIPT-->
                        <script language="Javascript">
                            $('#cam-icon-button').on('click', function(){
                                // WECAM INITIALISATION
                                Webcam.reset();

                                // TURNING SPINNER BEFORE ACCESS TO CAMERA 
                                Webcam.on( 'live', function() {
                                    $('.spinner').fadeOut('slow');
                                });

                                // WEBCAM CONFIGURATION
                                Webcam.set({
                                    // LIVE PREVIEW SIZE
                                    width: 640,
                                    height: 480,
                                    
                                    // DEVICE CAPTURE SIZE
                                    dest_width: 640,
                                    dest_height: 480,
                                    
                                    // FINAL CROPPED SIZE
                                    crop_width: 480,
                                    crop_height: 480,
                                    
                                    // FORMAT AND QUALITY
                                    image_format: 'jpeg',
                                    jpeg_quality: 100,
                                    
                                    // MIRROR MODE
                                    flip_horiz: false,

                                    // FRAME PER SECOND
                                    fps: 60
                                });

                                // DOM ELEMENT ATTACHEMENT FOR LIVE PREVIEW 
                                Webcam.attach('#user_camera');
                           });
                        
                            // SHUTTER AUDIO CLIP
                            var shutter = new Audio();
                            shutter.autoplay = false;
                            shutter.src = navigator.userAgent.match(/Firefox/) ? '{{asset("audio/shutter.ogg")}}' : "{{asset('audio/shutter.mp3')}}";
                            
                            // SNAPSHPOT PREVIEW FUNCTION
                            function preview_snapshot() {
                                // PLAY SOUND AFTER SNAP
                                try { 
                                    shutter.currentTime = 0; 
                                } 
                                catch(e) {
                                    ;
                                } // RETURN NOTHING IF FALL
                                shutter.play();
                                
                                // FREEZE CAMERA TO PREVIEW CURRENT FRAME
                                Webcam.freeze();
                                
                                // SNAP BUTTONS SET IN PREVIEW MODE
                                $('#pre_take_buttons').fadeOut('slow').css({'display':'none'}).removeClass('animated fadeIn');
                                $('#post_take_buttons').fadeIn('slow').css({'display':''}).addClass('animated bounce');
                            }
                            
                            // CANCELING PREVIEW FUNCTION
                            function cancel_preview() {
                                // CANCEL FREEZE TO RETRUN LIVE CAMERA
                                Webcam.unfreeze();
                                
                                // SNAP BUTTONS SET IN CANCEL MODE
                                $('#pre_take_buttons').fadeIn('slow').css({'display':''}).addClass('animated fadeIn');
                                $('#post_take_buttons').fadeOut('slow').css({'display':'none'}).removeClass('animated bounce');
                            }
                            
                            // SAVING SNAPSHOT FUNCTION
                            function save_photo() {
                                // SNAP PHOTO TO ACTUAL FREEZE
                                Webcam.snap( function(data_uri) {
                                    // UPLOADING TO SERVER AND CLOSE CAM
                                    Webcam.upload( data_uri, "{{asset('ajax/upload-webcamCapture.ajax.php')}}", function(){
                                        close_camera();
                                        $('#input-webcamSnap').modal('hide');
                                        success_upload_audio.play();
                                        swal("Effectué !", "Capture d'image effectué avec succès !", "success");
                                    });
                                });
                            }

                            // CLOSING CAMERA FUNCTION
                            function close_camera(){
                                document.getElementById('pre_take_buttons').style.display = '';
                                document.getElementById('post_take_buttons').style.display = 'none';
                                $('#input-webcamSnap').modal('hide');
                                $('.spinner').fadeIn('slow');
                                Webcam.reset();
                            }
                        </script>
                     
                    </div>

                    <!--WEBCAM ACTION BUTTONS-->
                    <div style="position: absolute;">
                        <!--WEBCAM DISMISS/CLOSE BUTTON-->
                        <button type="button" class="btn btn-round btn-raised btn-fab btn-link animated fadeIn" onClick="close_camera()"  data-dismiss="modal" style="position: absolute; margin: 0 0 0 440px;"><i class="material-icons white-text">Fermé</i></button>
                        <!--WEBCAM SNAPSHOT TITLE-->
                        <h6 class="text-center white-text animated fadeInDown delay-1s" style="position: absolute; margin: 10px 0 0 10px;">
                           <i class="fa fa-camera"></i> eConvivial | Prendre photo
                        </h6>

                        <form method="post" action="">
                            <div id="pre_take_buttons" class="">
                                <!--THIS BUTTON IS SHOWN BEFORE USER TAKE A SNAPSHOT-->
                                <button type="button" class="btn btn-round btn-raised btn-fab btn-link animated fadeInUp" onClick="preview_snapshot()" style="margin: 420px 0 0 220px; border: 1px solid #fff;">
                                    <i class="fa fa-camera white-text"></i>
                                </button>
                            </div>

                            <div id="post_take_buttons" style="display: none;">
                                <!--THIS BUTTON IS SHOWN AFTER USER TAKE A SNAPSHOT-->
                                <button type="button" class="btn btn-round btn-raised btn-fab btn-link" onClick="cancel_preview()" style="position: absolute; margin: 400px 0 0 200px; border: 1px solid #fff;">
                                    <i class="fa fa-undo white-text"></i>
                                </button>

                                <button type="button" class="btn btn-round btn-raised btn-fab btn-link" onClick="save_photo()" style="position: absolute; margin: 400px 0 0 250px; border: 1px solid #fff;">
                                    <i class="fa fa-check white-text"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


<!--RECORD AUDIO MODAL-->
        <div class="message-input modal fade" id="input-record" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onClick="close_recorder()">
                            <i class="material-icons">Effacer</i>
                        </button>
                    </div>
                    <h6 class="modal-title text-center">
                       <i class="fa fa-microphone"></i> eConvivial | Faire audio
                    </h6>
                    
                    <div class="modal-body">
                        <div style="margin: -10px 0 0 0;">
                            <center>
                                <!--RECORDER BUTTON-->
                                <div class="btn btn-raised btn-round btn-danger animated swing" id="recordButton" style="width: 120px; height: 120px; border-radius: 100%;">
                                   <i class="fa fa-microphone" id="recorderFile" style="font-size: 100px; margin: 0 0 0 0"></i>
                                </div>

                                <!--RECODER CONTROLS-->
                                <div id="recorder-controls" style="margin-left: 10px;" class="hide">
                                    <i class="btn btn-fab btn-raised btn-round btn-danger fa fa-pause" id="pauseButton" style="margin-right: 10px;"></i>
                                    <i class="btn btn-fab btn-raised btn-round btn-danger fa fa-stop" id="stopButton"></i>

                                    <div style="position: absolute; margin-left: 25px; font-size: 0.8em;" class="grey-text">
                                        <i class="fa fa-clock-o"></i> 00:00
                                    </div>
                                </div>

                                <!--RECORDER INFO-->
                                <h6 id="recorder-info"></h6>

                                <!--RECORDING LIST-->
                                <div id="recordingsList"></div>
                            </center>
                        </div>

                        <!--RECORDING PLUGIN-->
                        <script type="text/javascript" src="{{asset('js/_special/recorder-plugin.js')}}"></script>
                        <!--RECORDING SCRIPT-->
                        <script type="text/javascript">
                        
                            URL = window.URL || window.webkitURL;

                            var gumStream; //STREAM FROM getUserMedia() 
                            var rec;       //RECORDER.js OBJECT
                            var input;     //MediaStreamAudioSourceNode WE'LL BE RECORDING

                            // AUDIO CONTEXT SHIMING IF ONE NOT AVAILABLE
                            var AudioContext = window.AudioContext || window.webkitAudioContext;
                            var audioContext; //AUDIO CONTEXT HEP US TO RECORD

                            var recordButton = $('#recordButton');
                            var stopButton = $('#stopButton');
                            var pauseButton = $('#pauseButton');

                            var recorder_start=null;

                            var clickFx= new Audio("{{asset('audio/notification.mp3')}}");

                            //RECORDER EVENTS BUTTONS 
                            recordButton.on('click', function(){
                                clickFx.play();
                                setTimeout(startRecording, 300);
                            } );
                            stopButton.on('click', stopRecording);
                            pauseButton.on('click', pauseRecording);

                            // START RECORDING FUNCTION
                            function startRecording() {
                                

                                console.log("recordButton clicked");

                                var constraints = { audio: true, video:false }
                                

                                navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
                                    console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

                                    audioContext = new AudioContext();

                                    //UPDATE RECORDER INFO
                                    $('#recorder-info').css({'margin':'-10px 0 0 150px'});
                                    document.getElementById("recorder-info").innerHTML="Enregistrement en cours ...";

                                    // ASSIGN STREAM TO ANOTHER VAR FOR LATER USE
                                    gumStream = stream;
                                
                                    // STREAM USING
                                    input = audioContext.createMediaStreamSource(stream);

                                   // WE RECORD ON MONO CHANNEL TO REDUCE FILE WEIGHT
                                    rec = new Recorder(input,{numChannels:1});

                                    // IF getUserMedia() SUCCESS
                                    recordButton.addClass('waves').css({'pointer-events':'none'});
                                    $('#recorder-controls').fadeIn('slow').removeClass('hide').addClass('animated heartBeat').css({'display':'inline-block'});

                                    $('#recordingsList').html("");

                                    //START RECORDING PROCESS
                                    rec.record();

                                    recorder_start=true;

                                    console.log("Recording started ....");

                                }).catch(function(err) {
                                    // IF getUserMedia() FAILS
                                    recordButton.removeClass('waves').css({'pointer-events':''});
                                    $('#recorder-controls').fadeOut('slow').addClass('hide').removeClass('animated heartBeat').css({'display':'none'});
                                });
                            }

                            // PAUSE/RESUME RECORDING FUNCTION
                            function pauseRecording(){
                                console.log("pauseButton clicked rec.recording=",rec.recording );
                                // IF PAUSE BUTTON CLICKED
                                if (rec.recording){
                                    //PAUSE RECORD
                                    rec.stop();
                                    recordButton.removeClass('waves').addClass('animated flash infinite slow');
                                    $('#pauseButton').fadeIn('slow').removeClass('fa-pause').addClass('fa-play');

                                    //UPDATE RECORDER INFO
                                    document.getElementById("recorder-info").innerHTML="Enregistrement en pause ...";
                                }
                                // IF RESUME BUTTON CLICKED
                                else{
                                    //RESUME RECORD
                                    rec.record();
                                    recordButton.addClass('waves').removeClass('animated flash infinite slow');
                                    $('#pauseButton').fadeIn('slow').removeClass('fa-play').addClass('fa-pause');

                                    //UPDATE RECORDER INFO
                                    document.getElementById("recorder-info").innerHTML="Enregistrement en cours ...";
                                }
                            }

                            // STOP RECORDING FUNCTION
                            function stopRecording() {
                                console.log("stopButton clicked");

                                //UPDATE RECORDER INFO
                                document.getElementById("recorder-info").innerHTML="Enregistrement terminé ...";
                                $('#recorder-info').css({'margin':'0'});

                                //WE DISBALE THE RECORD CONTROLS BUTTONS
                                recordButton.removeClass('waves flash infinite slow').css({'pointer-events':''});
                                $('#recorder-controls').fadeOut('slow').addClass('hide').removeClass('animated heartBeat').css({'display':'none'});
                                
                                // WE RESET PAUSE BUTTON IN CASE OF THE RECORDING IS STOPPED WHILE PAUSED
                                $('#pauseButton').fadeIn('slow').removeClass('fa-play').addClass('fa-pause');
                                
                                //WE TELL THE RECORDER TO STOP RECORDING
                                rec.stop();
                                recorder_start=false;

                                //WE STOP THE MICROPHONE ACCESS
                                gumStream.getAudioTracks()[0].stop();

                                //WE CREATE BLOB FILE AND PASS IT IN DOWNLOAD LINK
                                rec.exportWAV(createDownloadLink);
                            }

                            // DOWNLOAD/UPLOAD LINK FUNCTION
                            function createDownloadLink(blob) {
                                
                                var url = URL.createObjectURL(blob);

                                var au = new Audio();
                                au.autoplay = false;
                             
                                var div = document.createElement('div');
                      
                                // WE GIVE THE DATETIME MOMENT FOR THE NAME OF FILE WITHOUT EXTENSION
                                var filename = new Date().toISOString();

                                // WE ADD CONTROLS AND SCR TO THE AUDIO ELEMENT
                                au.controls = true;
                                au.src = url;

                                //ADDING THE NEW AUDIO IN DIV ELEMENT
                                div.appendChild(au);
                                
                                
                                //**UPLOAD LINK !IMPORTANT
                                var upload = document.createElement('a');
                                upload.href="#";
                                upload.className="btn btn-fab btn-round btn-raised btn-danger";
                                upload.style.margin="-25px 0 0 0";
                                upload.innerHTML = '<i class="fa fa-send"></i>';
                                
                                upload.addEventListener("click", function(event){
                                    var xhr=new XMLHttpRequest();
                                    xhr.onload=function(e) {
                                        if(this.readyState === 4) {
                                            console.log("Server returned: ",e.target.responseText);
                                        }
                                    };
                                    var fd=new FormData();
                                    fd.append("audio_data",blob, filename);
                                    xhr.open("POST","{{asset('ajax/upload-microphoneCapture.ajax.php')}}",true);
                                    xhr.send(fd);
                                    close_recorder();
                                    success_upload_audio.play();
                                    swal("Effectué !", "Enregistrement effectué avec succès !", "success");
                                })

                                div.appendChild(upload);//WE ADD UPLOAD LINK
                                recordingsList.appendChild(div); //WE ADD AUDIO ELEMENT IN RECORDING LIST
                            }

                            // CLOSING MICROPHONE FUNCTION
                            function close_recorder(){
                                console.log("Closing recorder ...")
                                // WE RESET RECORDER BUTTON
                                recordButton.removeClass('waves flash infinite slow').css({'pointer-events':''});
                                $('#recorder-controls').fadeOut('slow').addClass('hide').removeClass('animated heartBeat').css({'display':'none'});
                                
                                // WE RESET PAUSE BUTTON IN CASE OF THE RECORDING IS STOPPED WHILE PAUSED
                                $('#pauseButton').fadeIn('slow').removeClass('fa-play').addClass('fa-pause');
                                
                                $('#recordingsList').html("");
                                //UPDATE RECORDER INFO
                                document.getElementById("recorder-info").innerHTML="";
                                $('#recorder-info').css({'margin':'0'});
                                
                                // HIDING MODAL
                                $('#input-record').modal('hide');

                                if (recorder_start) {
                                    //WE STOP THE MICROPHONE ACCESS
                                    gumStream.getAudioTracks()[0].stop();

                                    //WE TELL THE RECORDER TO STOP RECORDING
                                    rec.stop();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>


        <!--PICTURE UPLOAD MODAL-->
        <div class="modal fade" id="input-picture" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">Effacer</i>
                        </button>
                    </div>
                    <h6 class="modal-title text-center">
                       <i class="fa fa-file-image-o"></i> eConvivial | Joindre photo
                    </h6>
                    
                    <div class="modal-body">

                        <form method="post" action="" enctype="multipart/form-data">
                            <div style="margin: 0px 0 0 20px; height: 210px;">
                                <input type="file" name="picsfiles[]" id="input-picture-file" 
								class="inputpicfile" data-single-caption="{count} Photo" data-multiple-caption="{counts} Photos" 
								accept="image/*" multiple="" style="opacity: 0; overflow: hidden; 
								position: absolute; display: none; z-index: -1;">

                                <label for="input-picture-file" style="cursor: pointer; z-index: 9999;">
                                    <div class="btn btn-fab btn-round btn-yellow animated swing" 
									id="picture-preview-box" style="z-index:99; width:200px; height: 200px; margin-right: 5px;">
                                        <i class="fa fa-camera" id="pictureFile" style="font-size: 5em; margin: 80px 0 0 0"></i>
                                       <img src="" id="picture-preview" class="hide" style="width: 100%; height: 100%;">
                                    </div>
                                    <div class="btn btn-yellow"><span id="pic-label">Photo</span></div>
                                </label>

                                <button type="button" class="btn btn-round btn-fab btn-yellow" id="sending-picture-button" 
								style="position: absolute; margin: 85px 0 0 10px;">
                                    <i class="fa fa-send"></i>
                                </button>

                                <h6 id="picUploadSpin" class="yellow-text" 
								style="display: none; position: absolute; margin: -60px 0 0 205px;">
                                    <i class="fa fa-spinner fa-spin" style=""></i> Transfert en cours ...
                                </h6>

                                <h6 id="picUploadInfo" class="yellow-text" style="margin: -60px 0 0 205px;"></h6>

                                <div id="max-picture-file" class="hide" style="margin: -90px 0 5px 150px">
                                    <h6 class="grey-text text-center" style="">
                                        <i class="fa fa-ban"></i> Limite max de photo | 15
                                        <i class="material-icons red-text dismiss-max-picture-limit" 
										style="position: absolute; display: inline-block;  
										margin: -3px 0 0 5px; cursor: pointer;">close</i>
                                    </h6>
                                </div>
                            </div>
                        </form>

                        <script type="text/javascript">
                            // PREPARE THE PICTURE FOR PREVIEW
                            $("#input-picture-file").change(function(){
                                readPictureURL(this);
                            });
                            function readPictureURL(input) {
                                if (input.files && input.files[0]) {
                                    if(input.files.length==1){
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#picture-preview').attr('src', e.target.result).fadeIn('slow');
                                            $("#pictureFile").fadeIn('slow').addClass('hide').hide();
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                    else{
                                        $("#picture-preview").fadeOut('slow').addClass('hide');
                                        $("#pictureFile").fadeIn('slow').removeClass('hide');
                                    }
                                }
                                else{
                                    $("#picture-preview").fadeOut('slow').addClass('hide');
                                    $("#pictureFile").fadeIn('slow').removeClass('hide');
                                }
                            }

                            'use strict';

                            ;( function( $, window, document, undefined ){
                                $( '.inputpicfile' ).each( function(){

                                    var $input   = $( this ),
                                        $label   = $input.next( 'label' ),
                                        labelVal = $label.html();

                                    $input.on( 'change', function( e ){
                                        var fileName = '';
                                        $('#picUploadInfo').html('');

                                        if( this.files && this.files.length <= 1 ){
                                            fileName = ( this.getAttribute( 'data-single-caption' ) || '' ).replace( '{count}', this.files.length );
                                        }
                                        else if (this.files && this.files.length > 1) {
                                            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{counts}', this.files.length );
                                        }

                                        else if( e.target.value ){
                                            fileName = e.target.value.split( '\\' ).pop();
                                        }

                                        if( fileName ){
                                            $label.find( 'span' ).html( fileName );
                                            
                                            if (this.files.length>15) {
                                                $("#picture-preview-box").fadeIn('slow').removeClass("animated swing slow").addClass("animated infinite shake");
                                                $("#max-picture-file").fadeIn('slow').removeClass('hide').addClass('animated fadeInUp');
                                                $('#sending-picture-button').css({'pointer-events':'none'});
                                                $(".dismiss-max-picture-limit").on('click', function(){
                                                    $("#max-picture-file").fadeOut('slow').removeClass('animated fadeInUp').addClass('hide');
                                                });
                                            }
                                            else{
                                                if (this.files.length==0) {
                                                    $("#picture-preview-box").fadeIn('slow').removeClass("animated infinite shake swing");
                                                    $("#max-picture-file").fadeOut('slow').removeClass('animated fadeInUp').addClass('hide');
                                                    $('#sending-picture-button').css({'pointer-events':''});
                                                }
                                                else{   
                                                    $("#picture-preview-box").fadeIn('slow').removeClass("animated infinite shake").addClass("animated swing slow");

                                                    if(this.files.length<=15){
                                                        $("#max-picture-file").fadeOut('slow').removeClass('animated fadeInUp').addClass('hide');
                                                        $('#sending-picture-button').css({'pointer-events':''});
                                                    }
                                                }
                                            }
                                        }
                                        else{
                                            $label.html( labelVal );
                                        }
                                    });

                                    // Firefox bug fix
                                    $input
                                    .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
                                    .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
                                });
                            })( jQuery, window, document )


                            // SENDING PICTURE
                            $('#sending-picture-button').on('click', function(e){
                                if ($('#input-picture-file').val()!='') {
                                    var form_data=new FormData($(this).parents('form')[0]);
                                    e.preventDefault();
                                    $.ajax({
                                        url :"{{asset('ajax/upload-pictureFile.ajax.php')}}",
                                        type: 'post',
                                        data: form_data,
                                        contentType: false,
                                        processData: false,
                                        cache: false,
                                        
                                        beforeSend: function(){
                                            $('#picUploadSpin').show();
                                        },
                                        success: function(data){
                                            $("#picture-preview-box").fadeIn('slow').removeClass("animated infinite shake heartBeat");
                                            $('#input-picture-file').val('');
                                            $('#pic-label').html('Photo');
                                            $('#picUploadSpin').hide();

                                            // IF THE HAVE ERROR WE DISPLAY ERROR AND HIDE MODAL
                                            if (data!='') {
                                                //$('#picUploadInfo').html(data);
                                                error_upload_audio.play();
                                                swal("Oops !", data, "warning");
                                                $('#input-picture').modal('hide');
                                            }
                                            // IF WE HAVEN'T ERROR WE HIDE MODAL AFTER SUCCESS UPLOAD
                                            else{
                                                $('#input-picture').modal('hide');
                                                success_upload_audio.play();
                                                swal("Effectué !", "Upload d'image effectué avec succès !", "success");
                                            }
                                        }
                                    });
                                }
                                else{
                                    $('#picUploadInfo').html('Veuillez choisir une image');
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!--AUDIO UPLOAD MODAL-->
        <div class="modal fade" id="input-audio" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">Effacer</i>
                        </button>
                    </div>
                    <h6 class="modal-title text-center">
                       <i class="fa fa-file-audio-o"></i> eConvivial | Audio
                    </h6>
                    
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div style="margin: -20px 0 0 20px; height: 210px;">
                                <input type="file" name="audiofiles[]" id="input-audio-file" 
								class="inputaudiofile" data-single-caption="{count} Audio" 
								data-multiple-caption="{counts} Audios" accept="audio/*" 
								multiple="" style="opacity: 0; overflow: hidden; position: absolute; display: none; z-index: -1;">

                                <label for="input-audio-file" style="cursor: pointer; z-index: 9999;">
                                    <div class="btn btn-fab btn-raised btn-round btn-info animated swing" 
									id="audio-preview-box" style="z-index:99; width:200px; height: 200px; 
									margin-right: 5px;"><i class="fa fa-volume-up" id="audioFile" 
									style="font-size: 5em; margin: 80px 0 0 0"></i>
                                    </div>
                                    <div class="btn btn-info"><span id="audio-label">Audio</span></div>
                                </label>

                                <button type="button" class="btn btn-round btn-raised btn-fab btn-info" id="sending-audio-button" style="position: absolute; margin: 85px 0 0 10px;"><i class="fa fa-send"></i></button>

                                <h6 id="audioUploadSpin" class="info-text" style="display: none; position: absolute; margin: -60px 0 0 205px;">
                                    <i class="fa fa-spinner fa-spin"></i> Transfert en cours ...
                                </h6>

                                <h6 id="audioUploadInfo" class="info-text" style="margin: -60px 0 0 205px;"></h6>
                                    
                                <div id="max-audio-file" class="hide" style="margin: -80px 0 5px 130px">
                                    <h6 class="grey-text text-center" style="">
                                        <i class="fa fa-ban"></i> Limite max d'audio | 5
                                        <i class="material-icons red-text dismiss-max-audio-limit" style="position: absolute; display: inline-block;  margin: -3px 0 0 5px; cursor: pointer;">close</i>
                                    </h6>
                                </div>
                            </div>
                        </form>

                        <script type="text/javascript">
                            'use strict';

                            ;( function( $, window, document, undefined ){
                                $( '.inputaudiofile' ).each( function(){

                                    var $input   = $( this ),
                                        $label   = $input.next( 'label' ),
                                        labelVal = $label.html();

                                    $input.on( 'change', function( e ){
                                        var fileName = '';
                                        $('#audioUploadInfo').html('');

                                        if( this.files && this.files.length <= 1 ){
                                            fileName = ( this.getAttribute( 'data-single-caption' ) || '' ).replace( '{count}', this.files.length );
                                        }
                                        else if (this.files && this.files.length > 1) {
                                            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{counts}', this.files.length );
                                        }

                                        else if( e.target.value ){
                                            fileName = e.target.value.split( '\\' ).pop();
                                        }

                                        if( fileName ){
                                            $label.find( 'span' ).html( fileName );
                                            
                                            if (this.files.length>5) {
                                                $("#audio-preview-box").fadeIn('slow').removeClass("animated swing slow waves-blue").addClass("animated infinite shake");
                                                $("#max-audio-file").fadeIn('slow').removeClass('hide').addClass('animated fadeInUp');
                                                $('#sending-audio-button').css({'pointer-events':'none'});
                                                $(".dismiss-max-audio-limit").on('click', function(){
                                                    $("#max-audio-file").fadeOut('slow').removeClass('animated fadeInUp').addClass('hide');
                                                });
                                            }
                                            else{
                                                if (this.files.length==0) {
                                                    $("#audio-preview-box").fadeIn('slow').removeClass("animated infinite shake swing waves-blue");
                                                    $("#max-audio-file").fadeOut('slow').removeClass('animated fadeInUp').addClass('hide');
                                                    $('#sending-audio-button').css({'pointer-events':''});
                                                }
                                                else{   
                                                    $("#audio-preview-box").fadeIn('slow').removeClass("animated infinite shake waves-blue").addClass("animated swing slow");

                                                    if(this.files.length<=5){
                                                        $("#audio-preview-box").addClass("waves-blue");
                                                        $("#max-audio-file").fadeOut('slow').removeClass('animated fadeInUp').addClass('hide');
                                                        $('#sending-audio-button').css({'pointer-events':''});
                                                    }
                                                }
                                            }
                                        }
                                        else{
                                            $label.html( labelVal );
                                        }
                                    });

                                    // Firefox bug fix
                                    $input
                                    .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
                                    .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
                                });
                            })( jQuery, window, document )


                            // SENDING AUDIO
                            $('#sending-audio-button').on('click', function(e){
                                if ($('#input-audio-file').val()!='') {
                                    var form_data=new FormData($(this).parents('form')[0]);
                                    e.preventDefault();
                                    $.ajax({
                                        url :"{{asset('ajax/upload-audioFile.ajax.php')}},
                                        type: 'post',
                                        data: form_data,
                                        contentType: false,
                                        processData: false,
                                        cache: false,
                                        
                                        beforeSend: function(){
                                            $('#picUploadSpin').show();
                                        },
                                        success: function(data){
                                            $("#audio-preview-box").fadeIn('slow').removeClass("animated infinite shake heartBeat");
                                            $('#input-audio-file').val('');
                                            $('#audio-label').html('Audio');
                                            $('#audioUploadSpin').hide();

                                            // IF THE HAVE ERROR WE DISPLAY ERROR AND HIDE MODAL
                                            if (data!='') {
                                                //$('#audioUploadInfo').html(data);
                                                error_upload_audio.play();
                                                swal("Oops !", data, "warning");
                                                $('#input-audio').modal('hide');
                                            }
                                            // IF WE HAVEN'T ERROR WE HIDE MODAL AFTER SUCCESS UPLOAD
                                            else{
                                                $('#input-audio').modal('hide');
                                                success_upload_audio.play();
                                                swal("Effectué !", "Upload d'audio effectué avec succès !", "success");
                                            }
                                        }
                                    });
                                }
                                else{
                                    $('#audioUploadInfo').html('Veuillez choisir un audio');
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>