<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124602412-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag(){dataLayer.push(arguments);}

            gtag('js', new Date());

            gtag('config', 'UA-124602412-1');
        </script>
		<script>
(function(I,n,f,o,b,i,p){
I[b]=I[b]||function(){(I[b].q=I[b].q||[]).push(arguments)};
I[b].t=1*new Date();i=n.createElement(f);i.async=1;i.src=o;
p=n.getElementsByTagName(f)[0];p.parentNode.insertBefore(i,p)})
(window,document,'script','https://livechat.infobip.com/widget.js','liveChat');

liveChat('init', '35365e2f-f63a-4c5f-8a8a-0339630c9eed');
</script>

        <title>@yield("title")</title>
        

        <link rel="stylesheet" href="css/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="css/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="css/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="node_modules/jvectormap/jquery-jvectormap.css" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap-fileupload.css">
        <link rel="stylesheet" href="css/bootstrap-formhelpers.min.css">
        <link rel="shortcut icon" href="images/favicon.jpg" />

        
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/perfect-scrollbar.min.js"></script>
        <script src="js/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/jquery.avgrund/jquery.avgrund.min.js"></script>
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/misc.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/todolist.js"></script>
        <script src="js/todolist.js"></script>
        <script src="js/dashboard.js"></script>
        <script src="js/alerts.js"></script>
        <script src="js/avgrund.js"></script>
        <script src="js/bootstrap-fileupload.js"></script>
        <script src="js/bootstrap-formhelpers.min.js"></script>
        <script src="js/pusher.min.js"></script>
        <style>
            .content-wrapper {
                background: #d6f3ed;
            }
            .form-control{
                background-color: #fff;
                background-image: none;
                -webkit-background-clip: padding-box;
                background-clip: padding-box;
                border: 1px solid rgba(0,0,0,.15);
                border-radius: .25rem;
                box-shadow: inset 0 1px 1px rgba(5, 255, 246, 0.1);
            }

            .nav-item{
                /*font-weight: bold;*/
            }
            .sidebar .nav .nav-item .nav-link {
                color: #210505; }
            .main-panel{
                margin-top: 55px;
            }
            .sidebar{
                margin-top: 30px;
            }
        </style>

        @yield('style')
    </head>

    <body>
        @yield("body")

        @include("Theme.script")

        @yield('script')

        <script>
            function printContent(id){
                $("#print").hide();
                //$("#retour").hide();
                var restorepage = document.body.innerHTML;
                var printContent = document.getElementById(id).innerHTML;
                document.body.innerHTML = printContent;
                window.print();
                document.body.innerHTML = restorepage;
                $("#print").show();
                //$("#retour").show();
            }
        </script>

        <script>
            var notificationsWrapper   = $('.dropdown-notifications');
            var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
            var notificationsCountElem = notificationsToggle.find('i[data-count]');
            var notificationsCount     = parseInt(notificationsCountElem.data('count'));
            var notifications          = notificationsWrapper.find('ul.dropdown-menu');

            if (notificationsCount <= 0) {
                notificationsWrapper.hide();
            }

            // Enable pusher logging - don't include this in production
            // Pusher.logToConsole = true;

            var pusher = new Pusher('6c82ca66b047e195212e', {
                cluster : 'eu',
                encrypted: true
            });

            // Subscribe to the channel we specified in our Laravel Event
            var channel = pusher.subscribe('notification-event');

            // Bind a function to a Event (the full Laravel class)
            channel.bind('App\\Events\\NotificationEvent', function(data) {
                var existingNotifications = notifications.html();
                var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
                var newNotificationHtml =
                 "<li class='notification active'> " +
                    "<div class='media'> " +
                        "<div class='media-left'> " +
                            "<div class='media-object'> " +
                                "<img src='' class='img-circle' alt='50x50' style='width: 50px; height: 50px;'> " +
                            "</div> " +
                        "</div> " +

                        "<div class='media-body'> " +
                            "<strong class='notification-title'>"+data.message+"</strong> " +
                            "<div class='notification-meta'> " +
                                 "<small class='timestamp'>about a minute ago</small>"+
                            "</div>"+
                        "</div>"+
                      "</div>"+
                  "</li>";
                notifications.html(newNotificationHtml + existingNotifications);

                notificationsCount += 1;
                notificationsCountElem.attr('data-count', notificationsCount);
                notificationsWrapper.find('.notif-count').text(notificationsCount);
                notificationsWrapper.show();
            });
        </script>

        <script>
            function exportTableToExcel(tableID, filename){
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                // Specify file name
                filename = filename?filename+'.xls':'excel_data.xls';

                // Create download link element
                downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);

                if(navigator.msSaveOrOpenBlob){
                    var blob = new Blob(['\ufeff', tableHTML], {
                        type: dataType
                    });
                    navigator.msSaveOrOpenBlob( blob, filename);
                }else{
                    // Create a link to the file
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                    // Setting the file name
                    downloadLink.download = filename;

                    //triggering the function
                    downloadLink.click();
                }
            }
        </script>
    </body>
</html>
