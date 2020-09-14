<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('assets/img/logo-no-text.png')}}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{route('home')}}" class="nav-link"> ISKRAEMECO </a>
            </li>
            <li class="nav-item toggle-sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-arrow-left sidebarCollapse">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </li>
        </ul>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionMenu">
            <li class="menu">
                <a href="{{route('home')}}" data-toggle="collapse" data-link="true" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                    </div>
                </a>
            </li>
            @foreach ($rootMenu->menuNodes as $menuNode)
                <li class="menu menu-heading">
                    <div class="heading">
                        {!! $menuNode->item->icon_svg !!}
                        <span>{{$menuNode->item->name}}</span>
                    </div>
                </li>
                @if($menuNode->hasChildNodes())
                    @foreach ($menuNode->getChildNodes() as $node)
                        <li class="menu">
                            <a href="{{$node->getRoute()}}" {{$node->getDataAttrs()}}  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    {!! $node->item->icon_svg !!}
                                    <span>{{$node->item->name}}</span>
                                </div>
                                @if($node->hasChildNodes())
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                                @endif
                            </a>
                            @if($node->hasChildNodes())
                                <ul class="collapse submenu list-unstyled" id="menu_{{$node->item->id}}" data-parent="#accordionMenu">
                                    @foreach ($node->getChildNodes() as $childNode)
                                    <li>
                                        <a href="{{$childNode->getRoute()}}" data-submenu="{{$childNode->item->id}}" data-menu="{{$node->item->id}}"> {{$childNode->item->name}} </a>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

        </ul>

    </nav>

</div>
