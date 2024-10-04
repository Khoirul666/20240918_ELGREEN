@extends('layout.app')

@section('title','SHOP')

@push('csss')
<link rel="stylesheet" href="{{ asset('css/custom-shop.css') }}">
@endpush

@section('content')
<div class="main-content-web">
    <div>
        <span>
            <a href="">Home</a> > Best Sellers
        </span>
    </div>
    <div class="container-fluid all_pro">
        @include('fe.shop_sidebar')
        <div id="data_product">
            <div style="width:673px">
                <h1>Best Sellers</h1>
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
                    <p class="d-inline-flex gap-1">
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Link with href
                        </a>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Button with data-bs-target
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('jss')

@endpush