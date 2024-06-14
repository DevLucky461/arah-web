@extends('layout')
@section('body')

<!-- Nav + Banner Content -->
<div class="row top-bg-cover">
    <div class="container">

        <!-- Nav -->
        <div class="row">
            <div class="col-10">
                <nav class="navbar navbar-expand-xl navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <a class="navbar-brand" href="/"><img src="/img/arah-logo.png"/></a>
                      
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ml-auto">
                            <li class="nav-item nav-padding">
                                <a class="nav-link lightgreen-text nav-font-size" href="#">{{__('landing.TOKEN ALLOCATION')}}</a>
                            </li>
                            <li class="nav-item nav-padding">
                                <a class="nav-link lightgreen-text nav-font-size" href="arah-coin">{{__('landing.ARAH COIN')}}</a>
                            </li>
                            <li class="nav-item nav-padding">
                                <a class="nav-link lightgreen-text nav-font-size" href="arah-app">{{__('landing.ARAH APP')}}</a>
                            </li>
                            <li class="nav-item nav-padding">
                                <a class="nav-link lightgreen-text nav-font-size" href="newsroom">{{__('landing.NEWS')}}</a>
                            </li>
                            <li class="nav-item nav-padding">
                                <a class="nav-link lightgreen-text nav-font-size" href="">{{__('landing.HOW TO BUY')}}</a>
                            </li>
                            <!--
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle green-text lang-nav" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__("landing.Language:")}} {{__("landing.".app()->getLocale())}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/bi">{{__("landing.bi_long")}}</a>
                                    <a class="dropdown-item" href="/en">{{__("landing.en_long")}}</a>
                                </div>
                            </li>
                            -->
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-2">
                <button class="btn btn-border-nav btn-hover-green" href="#">{{__("landing.BUY NOW")}}</button>
                <!-- <a class="btn-border-nav dark-green-text nav-font-size" href="#">{{__("landing.BUY NOW")}}</a> -->
            </div>
        </div>

        <!-- Banner Content -->
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="row">
                    <div class="col">
                        <h1 class="large-h1-margin-top arah-font">ARAH COIN</h1>
                        <h2 class="banner-h2">Official Token Of The World's First Halal Super App</h1>
                        <p class="motto">Halal, Secure, Seamless</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="btn-pos">
                            <button class="btn btn-border-1 btn-hover-green btn-hide" type="submit">DOWNLOAD NOW</button>
                            <button class="btn btn-border-2 btn-hover-green" type="submit">LEARN MORE</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-6">
                <img class="landing-phone-new" src="/img/landing-phone-new.png"/>
            </div>
        </div>

    </div>
</div>

<!-- Arah Coin + Welcome To Arah 2nd Row -->
<div class="row white-green-gradient">
    <div class="container">

        <div class="row" style="position: relative; z-index: 10">

            <div class="col-12 order-last order-xl-first col-xl-5">
                <img class="arah-coin-new" src="/img/coin-new.png"/>
            </div>

            <div class="col-12 col-xl-6 offset-xl-1">
                <div class="row">
                    <div class="col">
                        <h1 class="large-h1">The ARAH Coin</h1>
                        <p class="title-desc">As the official currency of the ARAH app, the ARAH coin can presently be used
                        to facilitate bulk purchases and special discounts. More updates to come!</p>
                        <p class="title-desc">With a wide variety of functions, the ARAH app delivers convenience, and
                        a complete range of functions designed to complement every lifestyle.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="btn-pos-2">
                            <button class="btn btn-border-3 btn-hover-green" type="submit">HOW TO BUY</button>
                            <button class="btn btn-border-4 btn-hover-green" type="submit">WHITE PAPER</button>
                            <button class="btn btn-border-4 btn-hover-green" type="submit">AIRDROP</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row welcome-to-arah-bg center">

            <div class="col-8 offset-2 offset-xl-2 col-xl-6">
                <h1 class="large-h1 arah-font">WELCOME TO ARAH</h1>
                    <p class="title-desc-white">ARAH is the World's First Halal Super App with a cryptocurrency linked e-wallet.
                    The ARAH app is powered by the largest independant Islamic organization, Nahdlatul Ulama (NU).</p>
                    <div class="btn-pos-3">
                        <button class="btn btn-border-5 btn-hover-green" type="submit">ARAH APP</button>
                        <button class="btn btn-border-1 btn-hover-green" type="submit">ARAH COIN</button>
                    </div>
                    <p class="title-desc-white">The rich features of the Arah app is the ultimate lifestyle companion for everyone
                    around the world.</p>
            </div>
        </div>
    </div>

    <!-- Curve Break Point -->
    <div class="curve-bg">
    </div>
</div>

<!-- Arah App + Tokenomic 3rd Row -->
<div class="row white-green-gradient-2">
    <div class="container">
        
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="row">
                    <div class="col">
                        <h1 class="large-h1-margin-top">ARAH App</h1>
                        <p class="title-desc">Designed to intergrate itself into and complement the lives of its users
                        via a seamless ecosystem that makes it essential for daily use.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-border-6 btn-hover-green btn-hide" type="submit"><img src="img/Icon_Android.png" alt="Android Icon" style="margin: 5px 15px 10px 0px;">DOWNLOAD</button>
                        <button class="btn btn-border-6 btn-hover-green btn-hide" type="submit"><img src="img/Icon_Apple.png" alt="Apple Icon" style="margin: 5px 10px 15px 0px;">DOWNLOAD</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <img class="landing-phone-arah-app" src="/img/landing-phone-arah-app.png"/>
            </div>
        </div>
        
        <div class="row app-box-row">
            <div class="col-12 col-xl-3">
                <div class="app-box">
                    <div class="app-box-img">
                        <img src="img/Icon_Wallet.png" alt="E-Wallet Icon">
                        <h2 class="large-h2">E-Wallet & Halal Cryptocurrency</h2>
                    </div>
                    <div>
                        <p class="app-box-desc">The E-wallets makes swaps and transactions fast and secure through a decentralised platform.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-3">
                <div class="app-box">
                    <div class="app-box-img">
                        <img src="img/Icon_Chat.png" alt="Secure Chat Icon">
                        <h2 class="large-h2">Secure Chat</h2>
                    </div>
                    <div>
                        <p class="app-box-desc">It is a safe space for users to communicate between individuals, group and communities within the app.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-3">
                <div class="app-box">
                    <div class="app-box-img">
                        <img src="img/Icon_Location.png" alt="Qibla Finder Icon">
                    </div>
                    <div>
                        <h2 class="large-h2">Qibla Finder</h2>
                    </div>
                    <div>
                        <p class="app-box-desc">The Qibla Finder operates with geolocation to make it easy for users to find the nearest Mosque to them.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-3">
                <div class="app-box">
                    <div class="app-box-img">
                        <img src="img/Icon_Cart.png" alt="Hall Icon">
                    </div>
                    <div>
                        <h2 class="large-h2">Hall</h2>
                    </div>
                    <div>
                        <p class="app-box-desc">Access a world of Islam in our Emporium, and service partners.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row chart-row-reposition">
            <div class="col-12 col-xl-6 order-last order-xl-first">
                <img src="img/Chart.png" alt="Tokenomic Chart" width="100%" height="100%">
            </div>
            <div class="col-12 col-xl-6">
                <h1 class="large-h1">Token Allocation</h1>
                <p class="title-desc">The ARAH coin will work as the native utility token across all Arah and connected platforms, and
                holders will benefit from value increasing modules such as:</p>
                <ul class="title-desc" style="color: #30afaf;">
                  <li><span style="color: dimgray">Plug-n-play (BUILD)</span></li>
                  <li><span style="color: dimgray">Transaction, sharing and exchanging of coins</span></li>
                  <li><span style="color: dimgray">CeFi, DeFi and Insurance</span></li>
                  <li><span style="color: dimgray">Private or public staking platform</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Curve Break Point -->
    <div class="curve-bg-2">
        
    </div>
</div>

<!-- Roadmap 4th Row -->
<div class="row grey-green-gradient">
    <div class="container">
        
        <div class="row">
            <div class="col-12 col-md-12">
                <h1 class="large-h1 center">Roadmap</h1>
            </div>

            <div class="roadmap-img col-12 col-md-12">
                
            </div>
        </div>

        <div class="row strect-box">
            <div class="col-12 col-xl-2">
                <div class="roadmap-box">
                    <div>
                        <h2 class="title-desc-roadmap">Q2 2021</h2>
                    </div>
                    <div>
                        <h2 class="smaller-desc">Listing on Pancake Swap</h2>
                    </div>
                    <div>
                        <p class="roadmap-box-desc">Exchanging of Arah coins will be made available on PancakeSwap.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-2">
                <div class="roadmap-box">
                    <div>
                        <h2 class="title-desc-roadmap">Q3 2021</h2>
                    </div>
                    <div>
                        <h2 class="smaller-desc">ARAH Wallet</h2>
                    </div>
                    <div>
                        <p class="roadmap-box-desc">The Arah Wallet makes it easy for users to securely store, send and receive Arah coins with dApps.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-2">
                <div class="roadmap-box">
                    <div>
                        <h2 class="title-desc-roadmap">Q4 2021</h2>
                    </div>
                    <div>
                        <h2 class="smaller-desc">Arah APP V2.0</h2>
                    </div>
                    <div>
                        <p class="roadmap-box-desc">Arah App will be releasing its version 2.0 of the app, promising more variety and benefits for its users.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-2">
                <div class="roadmap-box">
                    <div>
                        <h2 class="title-desc-roadmap">Q1 2022</h2>
                    </div>
                    <div>
                        <h2 class="smaller-desc">Staking Coin Listed</h2>
                    </div>
                    <div>
                        <p class="roadmap-box-desc">Coin holders are able to hold and lock Arah coin to accumulate rewards.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-2">
                <div class="roadmap-box">
                    <div>
                       <h2 class="title-desc-roadmap">Q2 2022</h2>
                    </div>
                    <div>
                        <h2 class="smaller-desc">Listing on Major Exchange</h2>
                    </div>
                    <div>
                        <p class="roadmap-box-desc">The Arah coin will be listed in Major Exchange.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-2">
                <div class="roadmap-box">
                    <div>
                        <h2 class="title-desc-roadmap">Q3 2022</h2>
                    </div>
                    <div>
                        <h2 class="smaller-desc">Establishing Blue Energy Foundation</h2>
                    </div>
                    <div>
                        <p class="roadmap-box-desc">Focusing on developing environmentally sustainable initiatives while increasing transparency for stakeholders
                            and maintaining privacy agreements.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row center">
            <div class="col-12">
                <h1 class="large-h1">Frequently ask questions</h1>
            </div>

            <div class="col-12">

                <div class="popup-1 custom-popup btn-border-7">
                    <h6>What is Arah?</h6>
                    <span class="caret-down-1 caret down"></span><span class="caret-up-1 caret up"></span>
                    
                    <div class="popup-content popup-content-1">
                        <p>ARAH is The World's First Halal Super App with a cryptocurrency linked e-wallet. The ARAH app could be your ultimate lifestyle companion and also for everyone around the world.</p>
                    </div>
                </div>

                <div class="popup-2 custom-popup btn-border-7">
                    <h6>Why do you call this app as a halal app?</h6>
                    <span class="caret-down-2 caret down"></span><span class="caret-up-2 caret up"></span>
                    
                    <div class="popup-content popup-content-2">
                        <p>Only halal certified products and transactions are available in this app along with a build in censorship algorithm to automatically block profanity.</p>
                    </div>
                </div>

                <div class="popup-3 custom-popup btn-border-7">
                    <h6>Is the app free?</h6>
                    <span class="caret-down-3 caret down"></span><span class="caret-up-3 caret up"></span>
                    
                    <div class="popup-content popup-content-3">
                        <p>The app is absolutely free! You can download our ARAH app on Google Play Store now. It will also be available for IOS users on Apple App store soon.</p>
                    </div>
                </div>

                <div class="popup-4 custom-popup btn-border-7">
                    <h6>Is the Arah app safe?</h6>
                    <span class="caret-down-4 caret down"></span><span class="caret-up-4 caret up"></span>
                    
                    <div class="popup-content popup-content-4">
                        <p>Our ARAH app uses the waves platform which has partnered with Deloitte and is fully compliant in KYC procedures, reports will be lodged in any case of a potential breach. Not only that ARAH gloval at all times performs necessary KYC procedures provided by the Monetary Authority of Singapore's Guidance for Effective AML/CFT Transation Monitoring Controls.</p>
                    </div>
                </div>

                <div class="popup-5 custom-popup btn-border-7">
                    <h6>How can we use Arah coins?</h6>
                    <span class="caret-down-5 caret down"></span><span class="caret-up-5 caret up"></span>
                    
                    <div class="popup-content popup-content-5">
                        <p>You can purchase the ARAH coins for group discounts for selected halal items, halal online gaming, insurance policies, halal-investments (islamic finance), collateral for credit loans with approved partners and it can also be used for any potential merchant partners and specialized investment project.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="center brand-logo-wrapper">
                    <a href="#"><img src="/img/Logo_BscScan.png"/></a>
                    <a href="#"><img src="/img/Logo_uniswap.png"/></a>
                    <a href="#"><img src="/img/Logo_pancakeswap.png"/></a>
                    <a href="#"><img src="/img/Logo_CoinMarketCap.png"/></a>
                    <a href="#"><img src="/img/Logo_CoinGecko.png"/></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $( ".popup-1" ).click(function() {
            $( ".popup-content-1" ).slideToggle();
            $( ".caret-down-1" ).toggle();
            $( ".caret-up-1" ).toggle();
        });

        $( ".popup-2" ).click(function() {
            $( ".popup-content-2" ).slideToggle();
            $( ".caret-down-2" ).toggle();
            $( ".caret-up-2" ).toggle();
        });

        $( ".popup-3" ).click(function() {
            $( ".popup-content-3" ).slideToggle();
            $( ".caret-down-3" ).toggle();
            $( ".caret-up-3" ).toggle();
        });

        $( ".popup-4" ).click(function() {
            $( ".popup-content-4" ).slideToggle();
            $( ".caret-down-4" ).toggle();
            $( ".caret-up-4" ).toggle();
        });

        $( ".popup-5" ).click(function() {
            $( ".popup-content-5" ).slideToggle();
            $( ".caret-down-5" ).toggle();
            $( ".caret-up-5" ).toggle();
        });
    });
</script>
@endsection
