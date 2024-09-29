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
                <div class="col-4">
                    <img src="{{asset('image/ea26fd_009d35a5ba2d46cab1ed6f151db97449~mv2_d_1920_2097_s_2.jpg')}}" alt="">
                </div>
                <div class="col-4">
                    <img src="{{asset('image/ea26fd_de3ce029dcf54045ae136ddefd1cb5b5~mv2_d_1920_2097_s_2.jpg')}}" alt="">
                </div>
                <div class="col-4">
                    <img src="{{asset('image/ea26fd_79c443e19a9b47c8890ba50aa9dbbc48~mv2_d_1920_2097_s_2.jpg')}}" alt="">
                </div>
            </div>
    </section>
    <section id="home_section_3">
        
    </section>
    <section id="home_section_5">
        <img src="{{asset('image/11062b_ceb072d32d9c4d028abeb6e8cf16013c~mv2.jpg')}}" alt="">
    </section>
</div>
@endsection

@push('jss')

@endpush