@extends('layout')
@section('body')
<div class="arah-white-circle"></div>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-1 col-md-10">
                <h1 class="large-h1">{{__("landing.ARAH App")}}:<br> {{__("arah_app.Empowering The People")}}</h1>
                <p class="title-desc">{{__('arah_app.Designed to integrate itself into and complement the lives of its users via a seamless ecosystem that makes it essential for daily use.')}}</p>
                <div class="arah-app-icons" style="background-image:url(/img/shopping.png)"></div>
                <div class="arah-app-icons" style="background-image:url(/img/mosque.png)"></div>
                <div class="arah-app-icons" style="background-image:url(/img/donation.png)"></div>
                <div class="arah-app-icons" style="background-image:url(/img/small-coin.png)"></div>
                <div class="arah-app-icons" style="background-image:url(/img/social.png)"></div>
                <div class="arah-app-icons" style="background-image:url(/img/finance.png)"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-md-1 col-md-10">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5">
                        <img class="hall" src="/img/hall.png"/>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7">
                        <h2 class="large-h2 arah-h2-title">{{__('arah_app.Digital Convenience At Your Fingertips')}}</h2>
                        <p class="title-desc">{{__("arah_app.With a wide variety of functions, the ARAH app delivers convenience, and a complete range of functions designed to complement every lifestyle.")}}</p>
                        <a class="green-btn" target='_blank' href="https://finamatrix.medium.com/worlds-largest-muslim-group-embarks-on-halal-certified-arah-global-app-and-digital-asset-islamic-695683329718"> {{__("arah_app.FIND OUT MORE")}}</a>
                        <a class="green-btn" href="/register"> {{__("landing.REGISTER NOW")}}</a>
                        <h2 class="large-h2 mt-40px">{{__('arah_app.Social Outreach')}}</h2>
                        <p class="title-desc">{{__("arah_app.With a wide variety of functions, the ARAH app delivers convenience, and a complete range of functions designed to complement every lifestyle.")}}</p>
                    </div>
                </div>
            </div>
        </div>
        @include('landing-subscribe')
    </div>
</div>
@endsection