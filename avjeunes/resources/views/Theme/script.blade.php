<script>
    //background constants
    var navbar_classes = "navbar-danger navbar-success navbar-warning navbar-dark navbar-light navbar-primary navbar-info navbar-pink";
    var sidebar_classes = "sidebar-light sidebar-dark sidebar-blue";
    var $body = $("body");

    $(document).ready(function(){
        window.setTimeout(function(){
            $(".alert-success").fadeTo(3000,500).slideUp(500, function(){
                $(this).remove();
            });

            $(".alert-danger").fadeTo(3000,500).slideUp(500, function(){
                $(this).remove();
            });
        });

        $body.removeClass(sidebar_classes);
        $body.addClass("{{Session::get("sideColor")}}");

        $(".navbar").removeClass(navbar_classes);
        $(".navbar").addClass("{{Session::get('navColor')}}");
    });


    //sidebar backgrounds
    $("#sidebar-light-theme").on("click" , function(){
        $body.removeClass(sidebar_classes);
        $body.addClass("sidebar-light");
        changeSideBarTheme("sidebar-light");
        $(".sidebar-bg-options").removeClass("selected");
    });

    $("#sidebar-dark-theme").on("click" , function(){
        $body.removeClass(sidebar_classes);
        $body.addClass("sidebar-dark");
        changeSideBarTheme("sidebar-dark");
        $(".sidebar-bg-options").removeClass("selected");
        $(this).addClass("selected");
    });

    $("#sidebar-blue-theme").on("click" , function(){
        $body.removeClass(sidebar_classes);
        $body.addClass("sidebar-blue");
        changeSideBarTheme("sidebar-blue");
        $(".sidebar-bg-options").removeClass("selected");
        $(this).addClass("selected");
    });

    function changeSideBarTheme(theme) {
        $.ajax({
            type: "POST",
            url: "{{route('changeSideBarTheme')}}",
            data: {
                "color": theme,
                "_token" : "{{Session::token()}}"
            },
            success: function(data){
                console.log(data);
            },
            error : function(data){
                console.log(data);
            }
        });
    }

    /**
     * Script to change the navBar theme
     */

    //Navbar Backgrounds
    $(".tiles.light").on("click" , function(){
        $(".navbar").removeClass(navbar_classes);
        $(".navbar").addClass("navbar-light");
        changeNavBarTheme("navbar-light")
        $(".tiles").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".tiles.success").on("click" , function(){
        $(".navbar").removeClass(navbar_classes);
        $(".navbar").addClass("navbar-success");
        changeNavBarTheme("navbar-success")
        $(".tiles").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".tiles.warning").on("click" , function(){
        $(".navbar").removeClass(navbar_classes);
        $(".navbar").addClass("navbar-warning");
        changeNavBarTheme("navbar-warning")
        $(".tiles").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".tiles.danger").on("click" , function(){
        $(".navbar").removeClass(navbar_classes);
        $(".navbar").addClass("navbar-danger");
        changeNavBarTheme("navbar-danger")
        $(".tiles").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".tiles.pink").on("click" , function(){
        $(".navbar").removeClass(navbar_classes);
        $(".navbar").addClass("navbar-pink");
        changeNavBarTheme("navbar-pink")
        $(".tiles").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".tiles.info").on("click" , function(){
        $(".navbar").removeClass(navbar_classes);
        $(".navbar").addClass("navbar-info");
        changeNavBarTheme("navbar-info")
        $(".tiles").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".tiles.dark").on("click" , function(){
        $(".navbar").removeClass(navbar_classes);
        $(".navbar").addClass("navbar-dark");
        changeNavBarTheme("navbar-dark")
        $(".tiles").removeClass("selected");
        $(this).addClass("selected");
    });
    $(".tiles.default").on("click" , function(){
        $(".navbar").removeClass(navbar_classes);
        $(".tiles").removeClass("selected");
        $(this).addClass("selected");
    });

    function changeNavBarTheme(theme) {
        $.ajax({
            type: "POST",
            url: "{{route('changeNavBarTheme')}}",
            data: {
                "color": theme,
                "_token" : "{{Session::token()}}"
            },
            success: function(data){
                console.log(data);
            },
            error : function(data){
                console.log(data);
            }
        });
    }

</script>