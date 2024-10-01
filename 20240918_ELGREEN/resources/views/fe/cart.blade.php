@extends('layout.app')

@section('title', 'SHOP')

@push('csss')
<link rel="stylesheet" href="{{ asset('css/custom-cart.css') }}">
@endpush

@section('content')
<div class="main-content-web">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            MY CART
                        </div>
                        @foreach($produk as $produk)
                        <div class="card-header row">
                            <div class="col-4">
                                @php
                                $d_produk = App\Models\Product::find($produk->id_produk);
                                $image = json_decode($d_produk->image);
                                @endphp
                                <img src="{{asset('product_img/'.$image[0])}}" alt="">
                            </div>
                            <div class="col-8 d-flex t_produk">
                                <div class="flex-grow-1">
                                    {{$d_produk->nama_produk}}
                                    <br>
                                    {{$d_produk->hrg_produk}}
                                    <br>
                                    {{App\Models\Color::find($produk->color)['show']}}
                                    <br>
                                    {{App\Models\Size::find($produk->size)['show']}}
                                </div>
                                <div>
                                    {{$produk->qty_produk}}
                                </div>
                                <div>
                                    {{$d_produk->hrg_produk}}
                                </div>
                                <div>
                                    <form method="POST">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="produk" value="{{$produk->id}}">
                                        <button type="submit">
                                            <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                                                <path fill-rule="evenodd" d="M13.5,3 C14.327,3 15,3.673 15,4.5 L15,4.5 L15,5 L19,5 L19,6 L18,6 L18,17.5 C18,18.879 16.878,20 15.5,20 L15.5,20 L7.5,20 C6.122,20 5,18.879 5,17.5 L5,17.5 L5,6 L4,6 L4,5 L8,5 L8,4.5 C8,3.673 8.673,3 9.5,3 L9.5,3 Z M17,6 L6,6 L6,17.5 C6,18.327 6.673,19 7.5,19 L7.5,19 L15.5,19 C16.327,19 17,18.327 17,17.5 L17,17.5 L17,6 Z M10,9 L10,16 L9,16 L9,9 L10,9 Z M14,9 L14,16 L13,16 L13,9 L14,9 Z M13.5,4 L9.5,4 C9.224,4 9,4.225 9,4.5 L9,4.5 L9,5 L14,5 L14,4.5 C14,4.225 13.776,4 13.5,4 L13.5,4 Z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            Order Summary
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>Sub Total</div>
                            <div>{{$subtotal}}</div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('cart_checkout')}}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('jss')
<script src="{{ asset('bootstrap-5.3.3-dist\js\bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/custom-cart.js') }}"></script>
@endpush