@extends('layout.app')

@section('title','HOME')

@push('csss')
<link rel="stylesheet" href="{{ asset('css/custom-home.css') }}">
@endpush

@section('content')
<div class="main-content-web">
    <section id="home_section_1">
        <div id="hs11">
            <img src="{{asset('image/11062b_5e8ddb6c66f349109d00fa81c430a038~mv2.jpg')}}" alt="">
            <div id="crd">
                <h1>
                    IT'S TIME
                    <br>
                    TO STEP UP
                    <br>
                    YOUR GAME
                    <br>
                </h1>
                <a href="{{route('shop')}}">SHOP NOW</a>
            </div>
        </div>
        <div id="hs12">
            <img src="{{asset('image/11062b_93b95b0efb6641cf91bcc9e6d0bcddf2~mv2.jpg')}}" alt="">
            <div id="img_hs12">
                <img src="{{asset('image/nsplsh_b89b4a3f13904490b806301b40ffb79f~mv2.jpg')}}" alt="">
            </div>
        </div>
    </section>
    <section id="home_section_2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4" id="hc21">
                    <div>
                        <a href="#ne_arr">
                            <span>SHOP NEW</span>
                            <br>
                            <span>ARRIVALS</span>
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="1.95 9.05 56.15 42" xmlns="http://www.w3.org/2000/svg" viewBox="1.95 9.05 56.15 42" role="presentation" aria-hidden="true">
                                <g transform="scale(-1, 1) translate(-60, 0)">
                                    <path d="M56.5 27.6H10.4l14.7-14.7c.6-.6.6-1.6 0-2.2L24 9.5c-.6-.6-1.6-.6-2.2 0L2.4 28.9c-.6.6-.6 1.6 0 2.2l1.2 1.2 18.3 18.3c.6.6 1.6.6 2.2 0l1.2-1.2c.6-.6.6-1.6 0-2.2L10.4 32.4h46.1c.9 0 1.6-.7 1.6-1.6v-1.7c0-.8-.7-1.5-1.6-1.5z"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-4" id="hc22">
                    <div>
                        <a href="#">
                            <span>SHOP NEW</span>
                            <br>
                            <span>BEST SELLERS</span>
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="1.95 9.05 56.15 42" xmlns="http://www.w3.org/2000/svg" viewBox="1.95 9.05 56.15 42" role="presentation" aria-hidden="true">
                                <g transform="scale(-1, 1) translate(-60, 0)">
                                    <path d="M56.5 27.6H10.4l14.7-14.7c.6-.6.6-1.6 0-2.2L24 9.5c-.6-.6-1.6-.6-2.2 0L2.4 28.9c-.6.6-.6 1.6 0 2.2l1.2 1.2 18.3 18.3c.6.6 1.6.6 2.2 0l1.2-1.2c.6-.6.6-1.6 0-2.2L10.4 32.4h46.1c.9 0 1.6-.7 1.6-1.6v-1.7c0-.8-.7-1.5-1.6-1.5z"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-4" id="hc23">
                    <div>
                        <a href="#">
                            <span>JOIN OUR</span>
                            <br>
                            <span>COMMUNITY</span>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="1.95 9.05 56.15 42" xmlns="http://www.w3.org/2000/svg" viewBox="1.95 9.05 56.15 42" role="presentation" aria-hidden="true">
                                <g transform="scale(-1, 1) translate(-60, 0)">
                                    <path d="M56.5 27.6H10.4l14.7-14.7c.6-.6.6-1.6 0-2.2L24 9.5c-.6-.6-1.6-.6-2.2 0L2.4 28.9c-.6.6-.6 1.6 0 2.2l1.2 1.2 18.3 18.3c.6.6 1.6.6 2.2 0l1.2-1.2c.6-.6.6-1.6 0-2.2L10.4 32.4h46.1c.9 0 1.6-.7 1.6-1.6v-1.7c0-.8-.7-1.5-1.6-1.5z"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
    </section>
    <section id="home_section_3">
        <div id="motiv_1">
            <div id="motiv_2">
                <div>
                    <h1>
                        <span>WORKOUT</span><br>
                        <span>ANYTIME,</span><br>
                        <span>ANYWHERE</span>
                    </h1>
                </div>
                <div>
                    <p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font.</p>
                </div>
                <div>
                    <a href="">Read More</a>
                </div>
            </div>
            <div id="img_b">
                <div id="img_s"></div>
                <div id="box_h"></div>
            </div>
        </div>
        <div id="space_f"></div>
        <div id="ne_arr">
            <div>
                <h2>NEW ARRIVALS</h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @foreach ($produk as $item)
                    <div class="col-3">
                        <a href="{{route('shop_detail',$item->id)}}">
                            <div class="card" style="width: 18rem;">
                                <div class="card-img-overlay">
                                    <span class="lbel_ne">New Arrival</span>
                                </div>
                                @php
                                $image = json_decode($item->image);
                                @endphp
                                <img src="{{asset('product_img/'.$image[0])}}" class="card-img-top" alt="...">
                                <div class="card-body dtl">
                                    <p class="card-text">{{$item->nama_produk}}</p>
                                    <hr>
                                    <p class="card-text">Rp. {{$item->hrg_produk}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
                <div>
                    <a href="{{route('shop')}}">Shop All</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('jss')

@endpush