@extends('layout.app')

@section('title','ABOUT')

@push('csss')
<link rel="stylesheet" href="{{ asset('css/custom-about.css') }}">
@endpush

@section('content')
<div class="main-content-web">
    <section id="about_section_1">
        <div id="about1">
            <div>
                <h1>
                    <span>ABOUT</span>
                </h1>
            </div>
        </div>
        <div id="about2">
            <img src="{{asset('image/ea26fd_ba54804b29174f51a12b307eee34b4f2~mv2.jpg')}}" alt="">
        </div>
    </section>
    <section id="about_section_2">
        <div id="about_box">
            <div>
                <h2>
                    <span>THE IN.EX<br>STORY</span>
                </h2>
            </div>
            <div>
                <svg preserveAspectRatio="xMidYMid meet" data-bbox="10.305 4.552 131.804 131.5" xmlns="http://www.w3.org/2000/svg" viewBox="10.305 4.552 131.804 131.5" role="presentation" aria-hidden="true">
                    <g>
                        <path d="M142.109 4.552H10.305V136.052l131.804-131.5z"></path>
                    </g>
                </svg>
            </div>
        </div>
        <div id="tul_im">
            <div>
                <img src="{{asset('image/ea26fd_f31158283e3c4d81af74bbbac4309ab0~mv2_d_1920_3354_s_2.jpg')}}" alt="">
            </div>
        </div>
    </section>
    <section id="about_section_3">
        <div style="width: 354px;">
            <p class="font_8 wixui-rich-text__text" style="line-height:1.5em; font-size:16px;">I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.</p>
            <p class="font_8 wixui-rich-text__text" style="line-height:1.5em; font-size:16px;">​</p>
            <p class="font_8 wixui-rich-text__text" style="line-height:1.5em; font-size:16px;">This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors. Make your company stand out and show your visitors who you are.</p>
        </div>
    </section>
</div>
@endsection

@push('jss')

@endpush