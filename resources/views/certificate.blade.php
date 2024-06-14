<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmation</title>
    <style>
        *{
            padding:0px;
            margin:0px;
            font-family: 'Lato', sans-serif;
            font-size: 18px;
        }
        body{
            padding: 0px;
            margin: 0px;
            position: relative;
            background-image:url(data:image/png;base64,{{$image}});
            background-size:100%;
        }
        .name{
            position:absolute;
            top: 320px;
            left: 115px;
        }
        .nric{
            position:absolute;
            top: 420px;
            left: 115px;
        }
        .coin_quantity{
            position:absolute;
            top: 420px;
            left: 620px;
        }
        .asset_id{
            position:absolute;
            top: 545px;
            left: 115px;
        }
        .created_at{
            position:absolute;
            top: 655px;
            left: 115px;
        }
        .serial_number{
            position:absolute;
            top: 730px;
            left: 50px;
            color:#777;
        }
        @page {
            /* Styles for everything but the first page */
        }
        @page :first {
            /* Override with perhaps your stylesheet's defaults */
        }
        .counter_page:after{
            content:counter(page);
        }
    </style>
</head>
<body>
        <div class="name">{{$buyer[0]->buyer->name}}</div>
        <div class="nric">{{$buyer[0]->buyer_info->nric}}</div>
        <div class="coin_quantity">{{number_format($buyer[0]->coin_quantity, 0 , '.' , ',' )}}</div>
        <div class="asset_id">G4JOWGKILSW1HUE8SF2VASNTHUHJELXGASHQUGC2ZCQ6</div>
        <div class="serial_number">{{$buyer[0]->serial_number}}</div>
        <div class="created_at">{{$buyer[0]->created_at->format('d M Y')}}</div>
</body>
</html>
