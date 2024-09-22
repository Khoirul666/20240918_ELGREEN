@extends('layout.app')

@section('title','HOME')

@section('content')
<!-- start banner Area -->
<section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="img/header-bg.jpg">
    <div class="overlay-bg overlay"></div>
    <h1 class="template-name">arclabs</h1>
    <div class="container">
        <div class="row fullscreen">
            <div class="banner-content col-lg-12">
                <p>Building for society</p>
                <h1>
                    Future <br>
                    Architechure
                </h1>
                <a href="#" class="primary-btn">View project</a>
            </div>
        </div>
    </div>
    <div class="head-bottom-meta">
        <div class="d-flex meta-left no-padding">
            <a href="#"><span class="fa fa-facebook-f"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-instagram"></span></a>
        </div>
    </div>
</section>
<!-- End banner Area -->
@endsection