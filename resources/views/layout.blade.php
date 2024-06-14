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
        <link href='https://fonts.googleapis.com/css?family=El Messiri' rel='stylesheet'> <!-- added new fonts -->
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
        <div class="container-fluid">
            @yield('body')
        </div>
        <div class="container-fluid white-bg" >
            <div class="row footer-curve">
                <div class="divider">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center get-involved">
                                <p class ="white-text">Want to get involved?</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button class="join-community">JOIN THE COMMUNITY</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center learn-how-to-build">
                                <p class ="white-text">or learn about how to build on arah coin</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-12 text-center social-wrapper">
                                <a href="https://www.instagram.com/arah.global/"><img src="/img/Icon_Instagram.png"/></a>
                                <a href="https://www.facebook.com/ArahGlobal/"><img src="/img/Icon_Facebook.png"/></a>
                                <a href="https://www.youtube.com/channel/UCYaf9q6OTYnQkHi-6guZPtg"><img src="/img/Icon_Telegram.png"/></a>
                                <a href="https://twitter.com/ArahGlobal"><img src="/img/Icon_Twitter.png"/></a>
                                <a href="https://www.tiktok.com/@arahglobal"><img src="/img/Icon_Whatsapp.png"/></a>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center copyright">
                                <p class="white-text">2021 Arah Global. All rights reserved. | <a href="https://www.instagram.com/arah.global/">ABOUT</a> | <a href="https://www.instagram.com/arah.global/">TERMS AND CONDITIONS</a></p>
                            </div>         
                        </div>
                    </div>
                    {{-- <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 arah-logo-footer">
                        <img src="/img/Footer/Logo_Arah.png"/>
                    </div> --}}
                    <img class="arah-logo-footer" src="/img/Logo_Arah.png"/>
                </div>
            </div>
        </div>
    </body>
</html>
