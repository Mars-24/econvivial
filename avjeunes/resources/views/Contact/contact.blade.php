@extends("Template.vitrineTemplate")


@section("title")
    Bienvenue sur eCentre Convivial
@endsection


@section("body")
    <style>
        body{
            background-color: #fff;
        }
    </style>
    <!--==========================
  Top Bar
============================-->

    <section id="topbar" class="d-none d-lg-block">
        <div class="container clearfix">
            {{--<div class="contact-info float-left">--}}
            {{--<i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contact@example.com</a>--}}
            {{--<i class="fa fa-phone"></i> +1 5589 55488 55--}}
            {{--</div>--}}
            {{--<div class="social-links float-right">--}}
            {{--<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>--}}
            {{--<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>--}}
            {{--<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>--}}
            {{--<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>--}}
            {{--<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>--}}
            {{--</div>--}}
            <div class="intro-content pull-right">
                <div>
                    <a href="#"  class="btn-get-started scrollto"><i class="fa fa-lock"></i> Se connecter</a>
                    <a href="#"  class="btn-projects scrollto"><i class="fa fa-user-circle"></i> S'inscrire</a>
                </div>
            </div>

        </div>
    </section>

    <!--==========================
      Header
    ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                {{--<h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1>--}}
                <h1><a href="#body" class="scrollto"><img style="width:175px;"  src="dist/img/logo-convivial.jpg"  alt=""></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="{{route('main')}}">Accueil</a></li>
                    <li><a href="#about">Web Tv</a></li>
                    <li><a href="#services">Conseils pratiques</a></li>
                    <li class="menu-has-children"><a href="">Services</a>
                        <ul>
                            <li><a href="#">CONSULTATION</a></li>
                            <li><a href="#">SUIVI DE GROSSESSE</a></li>
                            <li><a href="#">SUIVI DU CYCLE MENSTRUEL</a></li>
                            <li><a href="#">PLANNAING FAMILIAL</a></li>
                            <li><a href="#">ASSISTANCE EN LIGNE</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Agenda</a></li>
                    <li><a href="#contact">Jeux</a></li>
                    <li class="menu-active"><a href="#contact">Contact</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

        <section id="contact" class="wow fadeInUp" >
            <div class="container">
                <div class="section-header">
                    <h2>Contact Us</h2>
                    <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
                </div>

                <div class="row contact-info">

                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="ion-ios-location-outline"></i>
                            <h3>Address</h3>
                            <address>A108 Adam Street, NY 535022, USA</address>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="ion-ios-telephone-outline"></i>
                            <h3>Phone Number</h3>
                            <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="ion-ios-email-outline"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                    </div>

                </div>
            </div>

            <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>

            <div class="container">
                <div class="form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>
        </section><!-- #contact -->

    </main>

    @include("Footer.newFooter")


@endsection