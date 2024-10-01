@extends('layout.app')

@section('title', 'SHOP')

@push('csss')
    <link rel="stylesheet" href="{{ asset('css/custom-shop_detail.css') }}">
@endpush

@section('content')
    <div class="main-content-web">
        <div id="con_detail">
            <div>
                <div class="d-flex align-items-center">
                    <div>
                        <span>
                            <a href="{{ route('home') }}">Home</a> / <a href="{{ route('shop') }}">All Products</a> /
                            {{ $produk->nama_produk }}
                        </span>
                    </div>
                    <div class="ms-auto">
                        <span>
                            <a href="#">
                                <svg viewBox="0 0 16 16" fill="currentColor" width="16" height="16">
                                    <path fill="currentColor"
                                        d="M11.519 13.934c0.214 0.217 0.214 0.566 0 0.783s-0.561 0.217-0.775 0l-6.264-6.326c-0.214-0.217-0.214-0.567 0-0.783l6.264-6.326c0.214-0.217 0.561-0.217 0.775 0s0.214 0.566 0 0.783l-5.712 5.934 5.712 5.934z">
                                    </path>
                                </svg>
                                Prev
                            </a>
                            |
                            <a href="">
                                Next
                                <svg viewBox="0 0 16 16" fill="currentColor" width="16" height="16">
                                    <path fill="currentColor"
                                        d="M4.48 13.934c-0.214 0.217-0.214 0.566 0 0.783s0.561 0.217 0.775 0l6.264-6.326c0.214-0.217 0.214-0.567 0-0.783l-6.264-6.326c-0.214-0.217-0.561-0.217-0.775 0s-0.214 0.566 0 0.783l5.712 5.934-5.712 5.934z">
                                    </path>
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div id="det" class="d-flex">
                    <section>
                        <div>
                            <img src="{{ asset('product_img/' . $produk->image) }}" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('product_img/' . $produk->image) }}" alt="">
                        </div>
                        <div>
                            <p>I'm a product description. I'm a great place to add more details about your product such as
                                sizing, material, care instructions and cleaning instructions.</p>
                        </div>
                    </section>
                    <section class="ms-auto" id="d_frm">
                        <div>
                            <div>
                                <h1>{{ $produk->nama_produk }}</h1>
                            </div>
                            <div>
                                <h4>Rp. {{ $produk->hrg_produk }}</h4>
                            </div>
                            <form method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="size">Size</label>
                                    <select name="size" class="form-select" id="size">
                                        <option value="a">a</option>
                                        <option value="a">a</option>
                                        <option value="a">a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Color : <span id="col_pick"></span></label>
                                </div>
                                <div>
                                    <input type="radio" name="c_pick" value="a">
                                    <input type="radio" name="c_pick" value="a">
                                    <input type="radio" name="c_pick" value="a">
                                    <input type="radio" name="c_pick" value="a">
                                    <input type="radio" name="c_pick" value="a">
                                </div>
                                <div>
                                    <label class="form-label" for="qty">Quantity</label>
                                </div>
                                <div>
                                    <input name="qty" id="qty" class="form-input" type="number" pattern="0-9"
                                        max="999" min="1" value="1">
                                </div>
                                @if (Auth()->check())
                                    <div>
                                        <button class="btn add_to_cart" name="add" type="submit">Add to Cart</button>
                                    </div>
                                    <div>
                                        <a href="https://api.whatsapp.com/send?phone=6285706291308&text=%2ANAma%20Produk%2A%0D%0Aaskpas%0D%0Aasa%0D%0A%2ANAma%20Produk%2A%0D%0Aqiwoqwi%0D%0A2323%0D%0A%2ATotal%2A%0D%0Aajdajsdja"
                                            target="_blank" class="btn buy_now" name="buy" type="submit">Buy
                                            Now</button>
                                    </div>
                                @else
                                    <div>
                                        <a href="{{ route('login') }}" class="btn add_to_cart">Add to Cart</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('login') }}" class="btn buy_now">Buy Now</a>
                                    </div>
                                @endif
                            </form>
                        </div>
                        <div>
                            <h4 data-bs-toggle="collapse" href="#product_info" aria-expanded="false"
                                aria-controls="product_info">
                                Product Info
                            </h4>
                            <div class="collapse" id="product_info">
                                <div class="card card-body">
                                    I'm a product detail. I'm a great place to add more information about your product such
                                    as sizing, material, care and cleaning instructions. This is also a great space to write
                                    what makes this product special and how your customers can benefit from this item.
                                </div>
                            </div>
                            <hr>
                            <h4 data-bs-toggle="collapse" href="#collapseExample2" aria-expanded="false"
                                aria-controls="collapseExample2">
                                Return & Refund Policy
                            </h4>
                            <div class="collapse" id="collapseExample2">
                                <div class="card card-body">
                                    I’m a Return and Refund policy. I’m a great place to let your customers know what to do
                                    in case they are dissatisfied with their purchase. Having a straightforward refund or
                                    exchange policy is a great way to build trust and reassure your customers that they can
                                    buy with confidence.
                                </div>
                            </div>
                            <hr>
                            <button data-bs-toggle="collapse" href="#ship" aria-expanded="false" aria-controls="ship">
                                Shipping Info
                            </button>
                            <div class="collapse" id="ship">
                                <div class="card card-body">
                                    I'm a shipping policy. I'm a great place to add more information about your shipping
                                    methods, packaging and cost. Providing straightforward information about your shipping
                                    policy is a great way to build trust and reassure your customers that they can buy from
                                    you with confidence.
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('jss')
    <script src="{{ asset('bootstrap-5.3.3-dist\js\bootstrap.bundle.js') }}"></script>
@endpush
