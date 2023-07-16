<div>
    <main class="main">
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @forelse ($slides as $slide)
                    <div class="single-hero-slider single-animation-wrap">
                        <div class="container">
                            <div class="row align-items-center slider-animated-1">
                                <div class="col-lg-5 col-md-6">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">{{ $slide->top_title }}</h4>
                                        <h2 class="animated fw-900">{{ $slide->title }}</h2>
                                        <h1 class="animated fw-900 text-brand">{{ $slide->sub_title }}</h1>
                                        <p class="animated">{{ $slide->offer }}</p>
                                        <a class="animated btn btn-brush btn-brush-3" href="{{ $slide->link }}"> Shop
                                            Now </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    <div class="single-slider-img single-slider-img-1">
                                        <img class="animated slider-1-1"
                                            src="{{ asset('assets/imgs/slider') }}/{{ $slide->image }}"
                                            alt="{{ $slide->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="animated fw-900 text-brand">No Slides</p>
                @endforelse
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>

        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                aria-selected="true">Featured</button>
                        </li>
                    </ul>
                </div>
                <!-- End nav-tabs -->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @forelse ($featured_products as $featured_product)
                                @php
                                    $productRoute = route('product.details', ['slug' => $featured_product->slug]);
                                    $categoryRoute = route('product.category', ['slug' => $featured_product->slug]);
                                    $imageUrl = asset("assets/imgs/products/{$featured_product->image}");
                                @endphp

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ $productRoute }}">
                                                    <img class="default-img" src="{{ $imageUrl }}"
                                                        alt="{{ $featured_product->name }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a
                                                    href="{{ $categoryRoute }}">{{ $featured_product->category->name }}</a>
                                            </div>
                                            <h2><a href="{{ $productRoute }}">{{ $featured_product->name }}</a></h2>
                                            <div class="product-price">
                                                <span>${{ $featured_product->regular_price }} </span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#"
                                                    wire:click.prevents="store({{ $featured_product->id }}, '{{ $featured_product->name }}', {{ $featured_product->regular_price }})">
                                                    <i class="fi-rs-shopping-bag-add"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No products found.</p>
                            @endforelse
                        </div>
                        <!-- End product-grid-4 -->
                    </div>
                    <!-- En tab one (Featured) -->
                </div>
                <!-- End tab-content -->
            </div>
        </section>

        <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        @forelse ($popular_categories as $popular_category)
                            @php
                                $categoryRoute = route('product.category', ['slug' => $popular_category->slug]);
                            @endphp

                            <div class="card-1">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{ $categoryRoute }}">
                                        <img src="{{ asset('assets/imgs/category/' . $popular_category->image) }}"
                                            alt="{{ $popular_category->name }}">
                                    </a>
                                </figure>
                                <h5>
                                    <a href="{{ $categoryRoute }}">
                                        {{ $popular_category->name }}
                                    </a>
                                </h5>
                            </div>
                        @empty
                            <p>No Categories</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows">
                    </div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @forelse ($latest_products as $latest_product)
                            @php
                                $productRoute = route('product.details', ['slug' => $latest_product->slug]);
                            @endphp

                            <div class="product-cart-wrap small hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ $productRoute }}">
                                            <img class="default-img"
                                                src="{{ asset('assets/imgs/products/') }}/{{ $latest_product->image }}"
                                                alt="{{ $latest_product->name }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="{{ $productRoute }}">{{ $latest_product->name }}</a></h2>
                                    <div class="product-price">
                                        <span>${{ $latest_product->regular_price }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No Products</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
