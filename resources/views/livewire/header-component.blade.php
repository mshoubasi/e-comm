<div class="header-bottom header-bottom-bg-color sticky-bar">
    <div class="container">
        <div class="header-wrap header-space-between position-relative">
            <div class="logo logo-width-1 d-block d-lg-none">
                <a href="/"><img src="{{ asset('assets/imgs/logo/logo.png') }}" alt="logo"></a>
            </div>
            <div class="header-nav d-none d-lg-flex">
                <div class="main-categori-wrap d-none d-lg-block">
                    <a class="categori-button-active" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-large">
                        <ul>
                            @if ($categories->isempty())
                                <li>No Categories</li>
                            @else
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('product.category', ['slug' => $category->slug]) }}"><i
                                                class="surfsidemedia-font-desktop"></i>{{ $category->name }}</a></li>
                                @endforeach

                            @endif
                        </ul>
                    </div>
                </div>
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                    <nav>
                        <ul>
                            <li><a class="active" href="/">Home </a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>

                            @auth
                                <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                    @if (Auth::user()->user_type === 'admin')
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                            <li><a href="{{ route('admin.products') }}">Products</a></li>
                                            <li><a href="{{ route('admin.categories') }}">Categories</a></li>
                                            <li><a href="{{ route('admin.home.slider') }}">Manage Slider</a></li>
                                        </ul>
                                    @endif
                                </li>
                            </ul>
                        @endauth
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
