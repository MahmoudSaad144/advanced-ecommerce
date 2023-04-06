<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="turbolinks-visit-control" content="reload">
    <title>@yield('title')</title>
    <!-- CSS files -->
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('./back/dist/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('./back/dist/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('./back/dist/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('./back/dist/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('./back/dist/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('./back/dist/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('./back/dist/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('./back/dist/css/style.css')}}" type="text/css">

    <link href="{{asset('./back/dist/libs/ijabo/ijabo.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('./back/dist/libs/ijabocrop/ijaboCropTool.min.css')}}" rel="stylesheet"/>

        <!-- Libs JS -->
            <!-- Js Plugins -->
        <script src="{{asset('./back/dist/js/jquery-3.3.1.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/js/bootstrap.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/js/jquery.nice-select.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/js/jquery-ui.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/js/jquery.slicknav.js')}}" defer></script>
        <script src="{{asset('./back/dist/js/mixitup.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/js/owl.carousel.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/libs/ijabo/ijabo.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/libs/ijabocrop/ijaboCropTool.min.js')}}" defer></script>

    @stack('stylesheets')
    @livewireStyles
    <link rel="stylesheet" href="{{asset('./back/dist/css/style.css')}}" type="text/css">
</head>
<body >
        @include('back.layouts.inc.header')

                @yield('content')

        {{-- @include('back.layouts.inc.footer') --}}
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->        
    @stack('scripts')
    @livewireScripts
    <script>
        /*******************script-to-show-toastr-message **********/
        window.addEventListener('showToastr',function(event){
            toastr.remove();
            if (event.detail.type === 'info') {
                toastr.info(event.detail.message);
            }else if(event.detail.type === 'success'){
                toastr.success(event.detail.message);
            }else if(event.detail.type === 'error'){
                toastr.error(event.detail.message);
            }else if(event.detail.type === 'warning'){
                toastr.warning(event.detail.message);
            }else{
                return false;
            }
        });
        /******************end*script-to-show-toastr-message **********/
    </script>
        <script src="{{asset('./back/dist/js/main.js')}}" defer></script>
    @livewireScripts
    <script> window.livewire.restart(); </script>
    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>
</body>
</html>
