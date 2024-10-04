@extends('layout.app')

@section('title','SHOP')

@push('csss')
<link rel="stylesheet" href="{{ asset('css/custom-shop.css') }}">
@endpush

@section('content')
<div class="main-content-web">
    <div>
        <span>
            <a href="">Home</a> > New Arrivals
        </span>
    </div>
    <div class="container-fluid all_pro">
        @include('fe.shop_sidebar')
        <div id="data_product">
            <div style="width:673px">
                <h1>New Arrivals</h1>
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

            </div>
        </div>
    </div>
</div>
@endsection

@push('jss')

@endpush