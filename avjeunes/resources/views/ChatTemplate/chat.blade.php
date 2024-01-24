<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->


<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="images/favicon.jpg" />
    {{--<script src="https://use.typekit.net/hoy3lrg.js"></script>--}}
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
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
                                    <p class="name" style="">{{$user->username}}</p>
                                    <p class="preview">{{$user->lastMessage}}</p>
                                    <span class="count" style="position: relative;float:right;font-weight: bold; margin-left: 3px; margin-top: -30px; height: 30px; width: 30px; background-color: #0fc825;border-radius: 50%;text-align: center;@if($user->unReadMessage  == 0) display:none  @endif ">
                                        {{$user->unReadMessage}}
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
                <p id="conseiller-name" style="color:white;">
                    @if(count($users) > 0 ) {{$users[0]->username}} @else User @endif
                </p>

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
                    <input type="text" placeholder="Votre message ..." class="form-control" style="margin-left: 10px;" />
                    <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                    <button class="submit" id="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>


{{--<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>--}}
<script >



$(".messages").animate({ scrollTop: 1000 }, "fast");
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
      // alert(imgSource);
    });
    pullData();
    refreshAssistant();

    var objDiv = document.getElementById("message");
    $(".messages").animate({ scrollTop: objDiv.scrollHeight }, "fast");
});

function loadDataForSpecifiqUser(id){
    $.ajax({
        type : "POST",
        url:"{{route('retrieveChatForSpecificUser')}}",
        data:{
            '_token': '{{Session::token()}}',
            'id': id
        },
        success: function(data){
            if(data["error"] === false){

                for (var i=0 ; i< data["chats"].length ; i++) {
                    if(data["chats"][i].sender_id == userID){
                        $('<li class="sent" style="margin-top: 5px; margin-bottom: 15px;" ><img  @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="" /><p>' + data["chats"][i].message + ' <br/> <span style="font-size: 10px;float: right;">'+data["chats"][i].created_at+'</span></p></li>').appendTo($('.messages ul'));
                    }else{
                        //alert(data["chats"][i].sender_id);
                        $('<li class="replies"  style="margin-top: 5px; margin-bottom: 15px;"><img  src="images/profil/profil.png" alt="" /><p>' + data["chats"][i].message + ' <br/> <span style="font-size: 10px;float: left;">'+data["chats"][i].created_at+'</span> </p></li>').appendTo($('.messages ul'));
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

        $('<li class="replies"  style="margin-top: 5px; margin-bottom: 15px;"><img @if($utilisateur->profil == null) src="images/profil/profil.png" @else  src="images/profil/{{$utilisateur->profil}}" @endif alt="" /><p>' + message + '<br/> <span style="font-size: 10px;float: right;">'+output+'</span></p></li>').appendTo($('.messages ul'));
        $('.message-input input').val(null);
        $('.contact.active .preview').html('<span>Moi: </span>' + message);
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

/**
 * Récupérer la liste des utilisateurs
 */


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
                'id': userID
            },
            success: function(data){
               if(data["error"] === false){
                   $('<li class="sent"  style="margin-top: 5px; margin-bottom: 15px;"><img  src="images/profil/profil.png" alt="" /><p>' + data["chats"][0].message + '</p></li>').appendTo($('.messages ul'));
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


function refreshAssistant(){
    refreshUserList();
    setTimeout(refreshAssistant,3000);
}

function clickAction(id,age,srcImage){
    var object = $("#contact"+id);
    $("#contact-profil").prop("src", srcImage);
    userImage = srcImage;
    userID = object.find("input").val();
    var userName = object.find("p:nth-child(1)").text();
    $("#age").text(age);
    $("#conseiller-name").text(userName);
    $('.messages ul').empty();
    $('#contacts ul li').removeClass("active");
    $(this).addClass("active");
    loadDataForSpecifiqUser(userID);
}

    function refreshUserList(){
    $.ajax({
        type : "POST",
        url:"{{route('refresh-assistant-liste')}}",
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

                    console.log("***profile ===> "+profil);

                    var srcValue = profil != null ? "images/profil/"+profil : "images/profil/profil.png";

                    var age = data["timeLines"][i].age;

                    var showCount = data["timeLines"][i].unReadMessage == 0 ? "display:none" : "";

                    var unRead = data["timeLines"][i].unReadMessage;

                    console.log("***Source ==> "+srcValue)

                    var lastMsg =   data["timeLines"][i].lastMessage != null ? data["timeLines"][i].lastMessage : "Ecrire à l'assistant en ligne ";
                    $('<li class="contact" id="contact'+data["timeLines"][i].id+'" onclick="clickAction('+data["timeLines"][i].id+',\''+srcValue+'\')" >' +
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


</script>