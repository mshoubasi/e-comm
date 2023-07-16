<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }

        .wishlisted {
            background-color: #f15412 !important;
            border: 1px solid transparent !important;
        }

        .wishlisted {
            color: #fff !important
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Wishlist
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row product-grid-4">
                    @foreach (Cart::instance('wishlist')->content() as $item)
                        <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                            <img class="default-img"
                                                src="{{ asset('assets/imgs/products') }}/{{ $item->model->image }}"
                                                alt="{{ $item->model->name }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a
                                            href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                    </h2>
                                    <div class="product-price">
                                        <span>${{ $item->model->regular_price }} </span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted"
                                            href="#"
                                            wire:click.prevents='removeFromWishList({{ $item->model->id }})'><i
                                                class="fi-rs-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="border p-md-4 p-30 border-radius cart-totals">
                        <div class="heading_s1 mb-3">
                            <h4>Cart Totals</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Cart Subtotal</td>
                                        <td class="cart_total_amount"><span
                                                class="font-lg fw-900 text-brand">${{ Cart::subtotal() }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Tax</td>
                                        <td class="cart_total_amount"><span
                                                class="font-lg fw-900 text-brand">${{ Cart::tax() }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Shipping</td>
                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount"><strong><span
                                                    class="font-xl fw-900 text-brand">${{ Cart::total() }}</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('shop.checkout') }}" class="btn "> <i class="fi-rs-box-alt mr-10"></i>
                            Proceed To CheckOut</a>
                    </div>
                </div>
            </div>
        </section>
</div>
