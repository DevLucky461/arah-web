<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="facebook-domain-verification" content="18dgeocc70u59jf5a9m25uvj6pstsu" />
        <link rel="shortcut icon" type="image/jpg" href="/img/favicon.ico"/>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-LHQRG0J57D"></script>
        <link href="/css/app.css" rel="stylesheet">
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-LHQRG0J57D');
        </script>

        <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {
            if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)
        }
        (window,document,'script','https://connect.facebook.net/en_US/fbevents.js'); 
        fbq('init', '843792486452192'); fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=843792486452192&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    </head>
    <body>
        <div class="container-fluid green-bg">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <nav class="navbar navbar-expand-xl navbar-light">
                        <a class="navbar-brand" href="/"><img src="/img/arah-logo.png"/></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav  ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link green-text" href="arah-app">{{__('landing.ARAH App')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link green-text" href="arah-coin">{{__('landing.ARAH Coin')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link green-text" href="newsroom">{{__('landing.Newsroom')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link green-text" href="about-us">{{__('landing.About Us')}}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle green-text lang-nav" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      {{__("landing.Language:")}} {{__("landing.".app()->getLocale())}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/bi">{{__("landing.bi_long")}}</a>
                                        <a class="dropdown-item" href="/en">{{__("landing.en_long")}}</a>
                                    </div>
                                  </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            @yield('body')
        </div>
        <div class="container-fluid white-bg">
            <div class="row">
                <img class="divider" src="/img/landing-divider.png"/>
            </div>
            <div class="row ">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center social-wrapper">
                            <a href="https://www.instagram.com/arah.global/"><img src="/img/ig.png"/></a>
                            <a href="https://www.facebook.com/ArahGlobal/"><img src="/img/fb.png"/></a>
                            <a href="https://www.youtube.com/channel/UCYaf9q6OTYnQkHi-6guZPtg"><img src="/img/yt.png"/></a>
                            <a href="https://twitter.com/ArahGlobal"><img src="/img/twitter.png"/></a>
                            <a href="https://www.tiktok.com/@arahglobal"><img src="/img/tt.png"/></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center copyright">
                            <p class="grey-text">&copy; {{__('landing.2020 Arah Global')}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
