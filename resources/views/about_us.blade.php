@extends('layout')
@section('body')
<div class="about-white-circle"></div>
<img class="about-phone" src="/img/about-phone.png"/>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-1 col-md-6 offset-lg-1 col-lg-7">
                <h1 class="large-h1">{{__("about_us.About Us")}}</h1>
                <p class="title-desc">{{__('about_us.The result of an international collaboration, the ARAH Global app is proudly made by four key partners:')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-md-1 col-md-6">
                <div class="company-mobile">
                    <div class="company-wrapper">
                        <a href="https://www.nu.or.id/" target="_blank">
                            <img class="company-logo" src="/img/nu.png"/>
                            <p class="company-name">NAHDLATUL ULAMA</p>
                            <p class="company-location">(INDONESIA)</p>
                        </a>
                    </div>
                    <div class="company-wrapper">
                        <a href="http://www.mjmnetworks.sg/" target="_blank">
                            <img class="company-logo" src="/img/mjm.png"/>
                            <p class="company-name">MJM NETWORKS</p>
                            <p class="company-location">(SINGAPORE)</p>
                        </a>
                    </div>
                </div>
                <div class="company-mobile">
                    <div class="company-wrapper">
                        <a href="https://finamatrix.net/" target="_blank">
                            <img class="company-logo" src="/img/fi.png"/>
                            <p class="company-name">FINAMATRIX</p>
                            <p class="company-location">(SINGAPORE)</p>
                        </a>
                    </div>
                    <div class="company-wrapper">
                        <a href="https://www.cakexp.com/" target="_blank">
                            <img class="company-logo" src="/img/cake.png"/>
                            <p class="company-name">CAKE EXPERIENTIAL</p>
                            <p class="company-location">(MALAYSIA)</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('about-subscribe')
    </div>
</div>
@endsection