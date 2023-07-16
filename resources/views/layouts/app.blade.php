<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Delta Tech</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @livewireStyles()
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info items-start">
                            @auth
                                <ul>
                                    <li><i class="fi-rs-user"></i>{{ Auth::user()->name }} /
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventdefault(); thisclosest('form').submit();">Logout</a>
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <ul>
                                    <li><i class="fi-rs-key"></i><a href="{{ route('login') }}">Log In </a> / <a
                                            href="{{ route('register') }}">Sign Up</a></li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="header-wrap">
                        <div class="logo logo-width-1">
                            <a href="/"><img src="{{ asset('assets/imgs/logo/logo.png') }}" alt="logo"></a>
                        </div>
                        <div class="header-right">
                            @livewire('header-search-component')
                            <div class="header-action-right">
                                <div class="header-action-2">
                                    @livewire('wishlist-icon-component')
                                    @livewire('cart-icon-component')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @livewire('header-component')
            @livewire('mobileview-component')

        </header>

        {{ $slot }}

        <footer class="main">
            <hr>
            <section class="section-padding footer-mid">
                <div class="container pt-15 pb-20">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="widget-about font-md mb-md-5 mb-lg-0">
                                <div class="logo logo-width-1 wow fadeIn animated">
                                    <a href="/"><img src="{{ asset('assets/imgs/logo/logo.png') }}"
                                            alt="logo"></a>
                                </div>
                                <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                                <p class="wow fadeIn animated">
                                    <strong>Address: </strong>Place
                                </p>
                                <p class="wow fadeIn animated">
                                    <strong>Phone: </strong>+xxxxxxxxxxx
                                </p>
                                <p class="wow fadeIn animated">
                                    <strong>Email: </strong>deltatech@example.com
                                </p>
                                <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                                <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                    <a href="https://www.facebook.com/deltatech" target="_blank"><img
                                            src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                    <a href="https://www.instagram.com/deltatech.syria/" target="_blank"><img
                                            src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <h5 class="widget-title wow fadeIn animated">About</h5>
                            <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2  col-md-3">
                            <h5 class="widget-title wow fadeIn animated">My Account</h5>
                            <ul class="footer-list wow fadeIn animated">
                                <li><a href="{{ route('shop.cart') }}">View Cart</a></li>
                                <li><a href="{{ route('shop.wishlist') }}">My Wishlist</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 mob-center">
                            <h5 class="widget-title wow fadeIn animated">Install App</h5>
                            <div class="row">
                                <div class="col-md-8 col-lg-12">
                                    <p class="wow fadeIn animated">From App Store or Google Play</p>
                                    <div class="download-app wow fadeIn animated mob-app">
                                        <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active"
                                                src="assets/imgs/theme/app-store.jpg" alt=""></a>
                                        <a href="#" class="hover-up"><img src="assets/imgs/theme/google-play.jpg"
                                                alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                    <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                    <img class="wow fadeIn animated" src="assets/imgs/theme/payment-method.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container pb-20 wow fadeIn animated mob-center">
                <div class="row">
                    <div class="col-12 mb-20">
                        <div class="footer-bottom"></div>
                    </div>
                    <div class="col-lg-6">
                        <p class="float-md-left font-sm text-muted mb-0">
                            <a href="{{ route('policy') }}">Privacy Policy</a> | <a href="{{ route('terms') }}">Terms &
                                Conditions</a>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="text-lg-end text-start font-sm text-muted mb-0">
                            &copy; <strong class="text-brand">DeltaTech</strong> All rights reserved
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Vendor JS-->
        <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
        <!-- Template  JS -->
        <script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
        <script src="{{ asset('assets/js/shop.js?v=3.3') }}"></script>
        @livewireScripts()
        @stack('scripts')
    </body>

    </html>
