
<ul class="list-unstyled menu-categories" id="accordionMenu">
    @foreach ($rootMenu->menuNodes as $menuNode)

        <li class="menu single-menu">
            <a href="{{is_null($menuNode->item->route_name) ? 'javascript:void(0)' : route($node->item->route_name)}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                <div>
                    {!! $menuNode->item->icon_svg !!}
                    <span>{{trans('menu.'.$menuNode->item->name)}}</span>
                </div>
            </a>
            @if($menuNode->hasChildNodes())
                <ul class="collapse submenu list-unstyled">
                @foreach ($menuNode->getChildNodes() as $node)
                    <li>
                        <a href="{{$node->getRoute()}}" {{$node->getDataAttrs()}} >

                            @if($node->hasChildNodes())
                            <li class="sub-sub-submenu-list">
                                <a href="{{is_null($node->item->route_name) ? 'javascript:void(0)' : route($node->item->route_name)}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> {{trans('menu'.$node->item->name)}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </a>
                                <ul class="collapse list-unstyled sub-submenu" id="menu" data-parent="#menu">
                                    @foreach ($node->getChildNodes() as $childNode)
                                    <li>
                                        <a href="{{$childNode->getRoute()}}" data-submenu="{{$childNode->item->id}}" data-menu="{{$node->item->id}}"> {{trans($childNode->item->name)}} </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            @else
                            <span>{{trans('menu.'.$node->item->name)}}</span>
                            @endif
                        </a>
                    </li>
                @endforeach
                </ul>
            @endif
        </li>

    @endforeach

</ul>
