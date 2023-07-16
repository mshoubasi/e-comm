<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="/"><img src="{{ asset('assets/imgs/logo/logo.png') }}" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            @if ($categories->isEmpty())
                                <ul>
                                    <li>No Categories</li>
                                </ul>
                            @else
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('product.category', ['slug' => $category->slug]) }}"><i
                                                    class="surfsidemedia-font-dress"></i>{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/">Home</a>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="{{ route('shop') }}">shop</a></li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            @auth
                <div class="mobile-header-info-wrap mobile-header-border">

                    <div class="single-mobile-header-info">{{ Auth::user()->name }}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventdefault(); thisclosest('form').submit();">Logout</a>
                        </form>
                    </div>
                @else
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login') }}">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{ route('register') }}">Sign Up</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
