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
                    <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">{!! config('app.name', 'Lara(b)log2') !!}</a></h1>
                </div>

                <div class="col-6 mr-auto py-3 text-right" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-xl-none"><span class="icon-menu h3"></span></a>
                </div>
            </div>

            <div class="col-12 d-none d-xl-block border-top">
                <nav class="site-navigation text-center " role="navigation">

                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block mb-0">
                        <li class="active"><a href="index.html">Homepage</a></li>
                        <li><a href="category.html">Lifestyle</a></li>
                        <li class="has-children">
                            <a href="category.html">Inspiration</a>
                            <ul class="dropdown">
                                <li><a href="category.html">Architect</a></li>
                                <li><a href="category.html">Minimal</a></li>
                                <li><a href="category.html">Interior</a></li>
                                <li><a href="category.html">Furniture</a></li>
                            </ul>
                        </li>
                        <li><a href="category.html">Technology</a></li>
                        <li><a href="category.html">Latest</a></li>
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