@if(isset($settings['statusBannerSlide']) && $settings['statusBannerSlide'] == 1)
    <a class="header-advertise-top" target="_blank" href="{{$settings['linkBannerSlide']}}"
       style="background-image: url({{$settings['imgBannerSlide']}});"></a>
@endif

<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <div class="header-search-bar headerStyleCustomDiv d-flex align-items-center">
            <div>
                <a class="logo" href="/">
                    @isset($settings['favicon_second'])
                        <img src="/{{$settings['favicon_second']}}" class="l-dark" height="35" alt="">
                    @endisset

                    @isset($settings['favicon'])
                        <img src="/{{$settings['favicon']}}" class="l-light" height="35" alt="">
                    @endisset
                </a>
            </div>
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu nav-light">
                    @foreach ($menus->where('parent_id', null) as $menu)
                        <li class="parent-parent-menu-item{{ $menu->children->isNotEmpty() ? ' has-submenu' : '' }}">
                            <a href="{{$menu->slug}}">{{ $menu->title }}@if($menu->children->isNotEmpty())<span class="menu-arrow"></span>@endif</a>
                            @if($menu->children->isNotEmpty())
                                <ul class="submenu">
                                    @foreach ($menu->children as $submenu)
                                        <li class="parent-parent-menu-item{{ $submenu->children->isNotEmpty() ? ' has-submenu' : '' }}">
                                            <a href="{{$submenu->slug}}">{{ $submenu->title }}@if($submenu->children->isNotEmpty())<span class="submenu-arrow"></span>@endif</a>
                                            @if($submenu->children->isNotEmpty())
                                                <ul class="submenu">
                                                    @foreach ($submenu->children as $subsubmenu)
                                                        <li class="parent-parent-menu-item{{ $subsubmenu->children->isNotEmpty() ? ' has-submenu' : '' }}">
                                                            <a href="{{$subsubmenu->slug}}">
                                                                {{ $subsubmenu->title }}
                                                                @if($subsubmenu->children->isNotEmpty())<span class="submenu-arrow"></span>@endif
                                                            </a>
                                                            @if($subsubmenu->children->isNotEmpty())
                                                                <ul class="submenu">
                                                                    @foreach ($subsubmenu->children as $subsubsubmenu)
                                                                        <li class="parent-parent-menu-item{{ $subsubsubmenu->children->isNotEmpty() ? ' has-submenu' : '' }}">
                                                                            <a href="{{$subsubsubmenu->slug}}">
                                                                                {{ $subsubsubmenu->title }}
                                                                                @if($subsubsubmenu->children->isNotEmpty())<span class="submenu-arrow"></span>@endif
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                    <li>
                        <div class="buy-button">
                            @if(isset($settings['titleBtnMenu']))
                                <a href="{{$settings['linkBtnMenu']}}" target="_blank">
                                    <div class="btn btn-primary w-max-content login-btn-primary">{{$settings['titleBtnMenu']}}</div>
                                    <div class="btn btn-light w-max-content login-btn-light">{{$settings['titleBtnMenu']}}</div>
                                </a>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
