@extends('layout')
@section('body')
<div class="white-circle"></div>
<img class="landing-phone" src="/img/landing-phone.png"/>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-1 col-md-5">
                <h1 class="large-h1">{{__("landing.The World's First Halal Super App")}}</h1>
                <p class="title-desc">{{__('landing.With a cryptocurrency linked e-wallet, the ARAH app is the ultimate lifestyle companion for everyone around the world.')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-md-1 col-md-5">
                <img class="subicons" src="/img/home-secure.png"/>
                <img class="subicons" src="/img/home-coin.png"/>
                <img class="subicons" src="/img/home-halal.png"/>
                <p class="smaller-desc">{{__('landing.With additional feature updates coming soon!')}}</p>
                <a class="green-btn" target='_blank' href="https://finamatrix.medium.com/worlds-largest-muslim-group-embarks-on-halal-certified-arah-global-app-and-digital-asset-islamic-695683329718"> {{__("landing.LEARN MORE")}}</a>
                <a class="green-btn" href="/register">{{__("landing.REGISTER NOW")}}</a>
            </div>
        </div>
        <div class="row mt-40px">
            <div class="col-12 offset-md-1 col-md-10">
                <h2 class="large-h2">{{__('landing.Discover the ARAH App')}}</h2>
                <p class="title-desc">{{__("landing.Everything you need to know in under 2 minutes.")}}</p>
                <div class="video-responsive">
                    <iframe width="560" height="315" src="{{__('landing.youtube_video')}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row coin-row">
            <div class="col-12 offset-md-1 col-md-4 col-lg-3">
                <img class='arah-coin' src="/img/coin.png"/>
            </div>
            <div class="col-12 col-md-6 col-lg-7">
                <h2 class="large-h2">{{__('landing.ARAH Coin')}}</h2>
                <p class="title-desc">{{__("landing.Explore a world of group discounts for online shopping, insurance, travel, gadgets, and more!")}}</p>
                <a class="green-btn" target='_blank' href="https://link.medium.com/MoblZUDWfcb">{{__("landing.ARAH COIN T&C")}}</a> <a class="green-btn" target='_blank' href="https://link.medium.com/bH4NxHJWfcb">{{__("landing.ARAH COIN WHITE PAPER")}}</a>
                <a class="green-btn" href="/register"> {{__("landing.REGISTER NOW")}}</a>
            </div>
        </div>
        @include('landing-subscribe')
    </div>
</div>
@endsection