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
        @include('fe.shop_sidebar')
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

@endpush