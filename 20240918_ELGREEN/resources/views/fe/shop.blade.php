@extends('layout.app')

@section('title','SHOP')

@push('csss')
<link rel="stylesheet" href="{{ asset('css/custom-shop.css') }}">
@endpush

@section('content')
<div class="main-content-web">
    <div>
        <span>
            <a href="">Home</a> > All Products
        </span>
    </div>
    <div class="container-fluid all_pro">
        <div id="sidebar">
            <h2>
                <span>Browse by</span>
            </h2>
            <nav class="nav flex-column">
                <a style="padding-top:10px" href"#">All Products</a>
                <a style="padding-top:10px" href"#">Best Sellers</a>
                <a style="padding-top:10px" href"#">Jackets</a>
                <a style="padding-top:10px" href"#">Leggings</a>
                <a style="padding-top:10px" href"#">New Arrivals</a>
                <a style="padding-top:10px" href"#">Shorts</a>
                <a style="padding-top:10px" href"#">Sports Bras</a>
                <a style="padding-top:10px" href"#">Tank Tops</a>
            </nav>
            <hr>
            <h2>
                <span>Filter by</span>
            </h2>
            <div style="display:flex;flex-direction:column">
                <span data-bs-toggle="collapse" data-bs-target="#priceOp" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Price</span>
                <div class="collapse" id="priceOp">
                    <input type="range" id="vol" name="vol" min="0" max="50">
                </div>
                <span data-bs-toggle="collapse" data-bs-target="#coloOp" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Color</span>
                <div class="collapse" id="coloOp">
                    <nav class="nav">
                        <a style="background-color:rgb(51, 70, 174)"></a>
                        <a style="background-color:rgb(98, 83, 63)"></a>
                        <a style="background-color:rgb(222, 52, 109)"></a>
                        <a style="background-color:rgb(54, 131, 81)"></a>
                        <a style="background-color:rgb(67, 79, 95)"></a>
                        <a style="background-color:rgb(250, 137, 40)"></a>
                        <a style="background-color:rgb(159, 90, 242)"></a>
                        <a style="background-color:rgb(174, 22, 22)"></a>
                        <a style="background-color:rgb(45, 120, 213)"></a>
                        <a style="background-color:rgb(119, 231, 200)"></a>
                    </nav>
                </div>
                <span data-bs-toggle="collapse" data-bs-target="#sizeOp" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Size</span>
                <div class="collapse" id="sizeOp">
                    <nav class="nav flex-column">
                        <a class="nav-link" href="#">Large</a>
                        <a class="nav-link" href="#">Small</a>
                        <a class="nav-link" href="#">Medium</a>
                    </nav>
                </div>
            </div>
        </div>
        <div id="data_product">
            <div style="width:673px">
                <h1>ALL Products</h1>
                <div>This is your category description. It’s a great place to tell customers what this category is about, connect with your audience and draw attention to your products.</div>
            </div>
            <div id="all_produ">
                <div class="d-flex align-items-center justify-content-between">
                    Product
                    <div>
                        <label for="">Sort By :</label>
                        <select name="" id="">
                            <option value="">Recommended</option>
                            <option value="">Newest</option>
                            <option value="">Price ( Low to High )</option>
                            <option value="">Price ( High to Low )</option>
                            <option value="">Name ( A - Z )</option>
                            <option value="">Name ( Z - A )</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="tmp_produ" class="container-fluid">
                <div class="row">

                    @foreach ($produk as $item)
                    @php
                    $image = json_decode($item->image);
                    @endphp
                    <div class="col-3">
                        <a href="{{route('shop_detail',$item->id)}}" style="text-decoration: none">
                            <div class="bdr">
                                <img src="{{asset('product_img/'.$image[0])}}">
                                <span>{{$item->nama_produk}}</span>
                                <br>
                                <span style="color: black">Rp. {{$item->hrg_produk}}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('jss')
<script src="{{asset('bootstrap-5.3.3-dist\js\bootstrap.bundle.js')}}"></script>
@endpush