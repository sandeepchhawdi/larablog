<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-6 col-xl-6 logo">
                    <h1 class="mb-0"><a href="{{ route('home') }}" class="text-black h2 mb-0">{!! config('app.name', 'Lara(b)log2') !!}</a></h1>
                </div>

                <div class="col-6 mr-auto py-3 text-right" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-xl-none"><span class="icon-menu h3"></span></a>
                </div>
            </div>

            <div class="col-12 d-none d-xl-block border-top">
                <nav class="site-navigation text-center " role="navigation">

                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block mb-0">
                        <li class="{{ (Request::route()->getName() == 'home') ? 'active' : '' }}"><a href="{{ route('home') }}">Homepage</a></li>
                        @foreach ($menu_categories as $menu)
                            <li class="{{ ($menu->menuSubcategories->count()) ? 'has-children ' : '' }}{{ (Request::route()->getName() == 'category.detail') && $menu->slug == $slug ? 'active' : '' }}">
                                <a href="{{ route('category.detail', $menu->slug) }}">{{ $menu->name }}</a>
                                @if(!empty($menu->menuSubcategories))
                                    <ul class="dropdown">
                                    @foreach ($menu->menuSubcategories as $submenu)
                                        <li><a href="{{ route('category.detail', $submenu->slug) }}">{{ $submenu->name }}</a></li>
                                    @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        @guest
                            @if (Route::has('login'))
                                <li class="{{ Request::is('login') ? 'active' : null }}" >
                                    <a href="{{ route('login') }}">
                                        {!! trans('larablog.nav.login') !!}
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="{{ Request::is('register') ? 'active' : null }}">
                                    <a href="{{ route('register') }}">
                                        {!! trans('larablog.nav.register') !!}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="has-children">
                                <a href="#">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {!! trans('larablog.nav.logout') !!}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <li>
                                        <a class="dropdown-item {{ Request::is('admin') ? 'active' : null }}" href="{{ route('admin') }}">
                                            {!! trans('larablog.nav.admin') !!}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</div>