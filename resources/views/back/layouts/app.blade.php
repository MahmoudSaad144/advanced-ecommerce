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
    <link href="{{asset('./back/dist/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('./back/dist/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('./back/dist/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('./back/dist/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('./back/dist/libs/ijabo/ijabo.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('./back/dist/libs/ijabocrop/ijaboCropTool.min.css')}}" rel="stylesheet"/>

        <!-- Libs JS -->
        <script src="{{asset('./back/dist/libs/jquery/jquery-3.6.0.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/libs/ijabo/ijabo.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/libs/ijabocrop/ijaboCropTool.min.js')}}" defer></script>
        <script src="{{asset('./back/dist/libs/apexcharts/dist/apexcharts.min.js')}}" defer></script>
        <!-- Tabler Core -->
        <script src="{{asset('./back/dist/js/tabler.min.js')}}" defer></script>

    @stack('stylesheets')
    @livewireStyles
    <link href="{{asset('./back/dist/css/demo.min.css')}}" rel="stylesheet"/>
</head>
<body >
    <div class="wrapper">
        @include('back.layouts.inc.header')
        <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
        @include('back.layouts.inc.footer')
        </div>
    </div>
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
    <script src="{{asset('./back/dist/js/demo.min.js')}}" defer></script>
    @livewireScripts
    <script> window.livewire.restart(); </script>
    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>
</body>
</html>
