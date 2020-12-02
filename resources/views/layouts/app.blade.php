<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset($dir.'bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset($dir.'assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset($dir.'assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset($dir.'assets/css/forms/theme-checkbox-radio.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset($dir.'assets/css/elements/alert.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset($dir.'plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset($dir.'assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 184px)!important;
        }
        .alert-light-success span{
            color: #0e1726;
        }
        .paginating-container {
            display: flex;
            justify-content: center;
            margin-bottom: 0;
        }
        .bootstrap-select.btn-group > .dropdown-toggle{
            max-height: 100%;
        }
        .list li{
            color: #212529;
        }
        .invalid-feedback {
                        display: block;
            }

    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @stack('styles')

</head>
<body class="sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="{{route('home')}}"><img alt="logo" src="{{asset(config('app.logo'))}}"> <span class="navbar-brand-name">{{config('app.name')}}</span></a>
            </div>

            <div class="nav-item dropdown language-dropdown more-dropdown mx-2">
                <div class="dropdown  custom-dropdown-icon">
                    @if(App::isLocale('ar'))
                        <a class="dropdown-toggle btn" href="javascript:void(0)" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('assets/img/eg.png')}}" class="flag-width" alt="flag"><span>Arabic</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-img-value="en" data-value="English" href="{{ route('change-lang',['name'=>'en']) }}"><img src="{{ asset('assets/img/uk-flag-england.jpg') }}" class="flag-width" alt="flag"> English</a>
                        </div>
                    @else
                        <a class="dropdown-toggle btn" href="javascript:void(0)" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('assets/img/uk-flag-england.jpg')}}" class="flag-width" alt="flag"><span>English</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-img-value="eg" data-value="Egypt" href="{{ route('change-lang',['name'=>'ar']) }}"><img src="{{ asset('assets/img/eg.png') }}" class="flag-width" alt="flag"> Arabic</a>
                        </div>
                    @endif

                </div>
            </div>
            
            @include('layouts._profile_menu')
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <div class="topbar-nav header navbar" role="banner">
            <nav id="topbar">
                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="index.html">
                            <img src="{{asset(config('app.logo'))}}" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="index.html" class="nav-link"> {{config('app.name')}} </a>
                    </li>
                </ul>
                @include('layouts._menu')
            </nav>
        </div>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <!-- CONTENT AREA -->
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        @yield('content')
                    </div>

                </div>
                <!-- CONTENT AREA -->

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class=""><p class="">Copyright © 2020 {{config('app.company')}}, All rights reserved.</p></p>
                </div>
                <div class="footer-section f-section-2">
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset($dir.'assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset($dir.'bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset($dir.'bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset($dir.'plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset($dir.'assets/js/app.js')}}"></script>
    <script src="{{asset($dir.'plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            App.init();
            function hasArabicCharacters(text){
            var regex = new RegExp("[\u0600-\u06FF]|[\u0750-\u077f]|[\ufb50-\ufdff]|[\ufe70-\ufeff]|[\u0660-\u0669]|[\u08A0-\u08FF]","gmu");
            return regex.test(text);
            }
            $('.no_arabic').on('keyup',function (e) {
                var value = (e.target.value);
                if(value === '.')return true;
                var self = $(this);
                var old = "";
                if(value.length > 1){
                    old = value.substring(0,value.length-1);
                    if(hasArabicCharacters(value[value.length-1])){
                        self.val(old);
                    }
                }else{
                    if(hasArabicCharacters(value)){
                        self.val(old);
                    }
                    old = value.substring(0,1);
                }
                return true;
            });
            $('.clone-table').on('keyup','.no_arabic',function (e) {
                var value = (e.target.value);
                if(value === '.')return true;
                var self = $(this);
                var old = "";
                if(value.length > 1){
                    old = value.substring(0,value.length-1);
                    if(hasArabicCharacters(value[value.length-1])){
                        self.val(old);
                    }
                }else{
                    if(hasArabicCharacters(value)){
                        self.val(old);
                    }
                    old = value.substring(0,1);
                }
                return true;
            });
            let numberOnlyInputs = $('.numbers-only');
            numberOnlyInputs.on('keydown',function (e) {
                if(e.target.value === '.')return true;
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
            $('.clone-table').on('keydown','.numbers-only',function (e) {
                if(e.target.value === '.')return true;
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @stack('scripts')
</body>
</html>
