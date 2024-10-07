@extends('layout.app')

@section('title', 'SHOP')

@push('csss')
<link rel="stylesheet" href="{{ asset('css/custom-shop.css') }}">
<!-- noUiSlider CSS -->
<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">

<style>
    .noUi-target {
        margin-top: 20px;
    }

    .value-labels {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .value-labels span {
        font-weight: bold;
    }
</style>
@endpush

@section('content')
<div class="main-content-web">
    <div>
        <span>
            <a href="">Home</a> >
        </span>
    </div>
    <div class="container-fluid all_pro">
        @include('fe.shop_sidebar')
        <div id="data_product">
            <div style="width:673px">
                <h1>ALL Products</h1>
                <div>This is your category description. It’s a great place to tell customers what this category is
                    about, connect with your audience and draw attention to your products.</div>
            </div>
            <div id="all_produ">
                <div class="d-flex align-items-center justify-content-between">
                    Product
                    <div>
                        <label for="sby">Sort By :</label>
                        <select name="sby" id="sby">
                            <option value="recommended">Recommended</option>
                            <option value="newest">Newest</option>
                            <option value="price_ascending">Price ( Low to High )</option>
                            <option value="price_descending">Price ( High to Low )</option>
                            <option value="name_ascending">Name ( A - Z )</option>
                            <option value="name_descending">Name ( Z - A )</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="tmp_produ" class="container-fluid">
                <div class="row" id="show_data">
                    {{-- @foreach ($produk as $item)
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
                @endforeach --}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('jss')
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

<!-- JS noUiSlider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js"></script>
<script>
    let min = @json($min);
    let max = @json($max);
    
    let data_array = [];
    let data_array_color = [];
    let data_array_size = [];
    let menu_saat_ini = "best_seller"
    let url = "shop_get_data"
</script>
<script src="{{ asset('js/custom-shop.js') }}"></script>
@endpush