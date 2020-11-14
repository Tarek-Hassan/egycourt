<ul class="navbar-item flex-row nav-dropdowns ml-auto">
    <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media">
                <img src="{{Auth::user()->getAvatarUrl()}}" class="img-fluid rounded-circle" alt="admin-profile">
                <div class="media-body align-self-center">
                    <h6><span>Hi,</span> {{Auth::user()->name}}</h6>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
            <div class="">
                <div class="dropdown-item">
                    <a class="" href="{{route('profile')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> {{trans('home.my_profile')}}</a>
                </div>
                <div class="dropdown-item">
                    @if(config('app.multi_lang'))
                        @if(App::isLocale('ar'))
                        <a class="" href="{{ route('change-lang',['name'=>'en']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                            <img style="width: 20px; margin: 0 8px 0 0px;" src="{{asset('assets/img/uk-flag-england.jpg')}}" class="flag-width" alt="flag"><span> English </span>
                        </a>
                        @else
                        <a class="" href="{{ route('change-lang',['name'=>'ar']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                            <img style="width: 20px; margin: 0 8px 0 0px;" src="{{asset('assets/flags/EG.png')}}" class="flag-width" alt="flag"><span> العربيه </span>
                        </a>
                        @endif
                    @endif

                </div>
                <div class="dropdown-item">
                <a class="" href="{{route('user.reset-password')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>  {{trans('home.reset_password')}}</a>
                </div>
                <div class="dropdown-item">
                    <form action="{{route('logout')}}" method="post" id="logoutForm">@csrf</form>
                    <a class="" href="javascript:void(0)" onclick="document.getElementById('logoutForm').submit()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>  {{trans('login.sign_out')}}</a>
                </div>
            </div>
        </div>

    </li>
</ul>
