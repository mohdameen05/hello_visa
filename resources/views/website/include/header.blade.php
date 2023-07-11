<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hello Visa</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content=" " />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/swiper/swiper.min.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendors/treck-icons/style.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/treck.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/treck-responsive.css') }}" />
</head>

<body class="custom-cursor">

    <!-- <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div> -->





    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->


    <div class="page-wrapper">
        <header class="main-header-three">
            <nav class="main-menu main-menu-three">
                <div class="main-menu-three__wrapper">
                    <div class="main-menu-three__wrapper-inner">
                        <div class="main-menu-three__logo">
                            <a href="index.html"><img src="{{ asset('assets/images/resources/logo-1.png') }}" alt=""></a>
                        </div>
                    
                        <div class="main-menu-three__bottom">
                            <div class="main-menu-three__bottom-inner">
                                <div class="main-menu-three__main-menu-box">
                                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                    <ul class="main-menu__list one-page-scroll-menu">
                                        <li class="scrollToLink">
                                            <a href="#home">Home </a>
                                          
                                        </li>
                                        <li class="scrollToLink">
                                            <a href="#about">About</a>
                                        </li>
                                        <li class="scrollToLink">
                                            <a href="#visa">Visa</a>
                                        </li>
                                        <li class="scrollToLink">
                                            <a href="#countries">Countries</a>
                                        </li>
                                      
                                        <li class="scrollToLink">
                                            <a href="#blog">Blog</a>
                                        </li>
                                        <li class="scrollToLink">
                                            <a href="#contact">Contact</a>
                                        </li>
                                        <li>
                                            <div class="main-menu-three__btn ct_account_btn">
                                                <a href="{{route('agent.login')}}">Log In</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>