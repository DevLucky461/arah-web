@extends('layout')
@section('body')
<div class="arah-white-circle"></div>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-1 col-md-8">
                <h1 class="large-h1">{{__("landing.ARAH Coin")}}</h1>
                <p class="title-desc">{{__('arah_coin.As the official currency of the ARAH app, the ARAH Coin can presently be used to facilitate bulk purchases and special discounts. More updates to come!')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-md-1 col-md-10">
                <div class="coin-top-icons-wrapper">
                    <div class="icons" style="background-image:url('/img/100b.png')"></div>
                    <div class="icons" style="background-image:url('/img/waves.png')"></div>
                </div>
                <div class="large-coin">

                </div>
                <div class="coin-app">

                </div>
                <div class="coin-text">
                    <h1 class="large-h2">{{__("arah_coin.Benefits & Exclusivity")}}</h1>
                    <p class="title-desc">{{__('arah_coin.Due to the size of it’s initial membership base, and proven economies of scale makes for an attractive buy-in rate for early bird applicants. Invest in the ARAH Coin, and benefit from the world’s largest multi-linked blockchain.')}}</p>
                    <a class="green-btn" target='_blank' href="https://link.medium.com/MoblZUDWfcb">{{__("landing.ARAH COIN T&C")}}</a> <a class="green-btn" target='_blank' href="https://link.medium.com/bH4NxHJWfcb">{{__("landing.ARAH COIN WHITE PAPER")}}</a>
                    <a class="green-btn" href="/register"> {{__("landing.REGISTER NOW")}}</a>
                </div>
            </div>
        </div>
        @include('landing-subscribe')
    </div>
</div>
@endsection