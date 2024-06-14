<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <title>Document</title>
</head>
<style>
    .list-group-item:hover{
        background-color: rgb(6, 144, 199);
        color: #fff;
    }

    .user_image{
        width: 80px;
        height: 80px;
        border-radius: 10px
    }

    .receiver_border{
        border: 1px solid black;
        padding: 10px;
        border-radius: 5px;
    }

    .message_border{
        border: 1px solid black;
        padding: 10px;
        border-radius: 5px;
    }

    .message_m{
        background-color: rgb(6, 144, 199);
        color: white;
        padding: 3px;
        margin-bottom:10px; 
        border-radius: 10px;
    }

    .input_request{
        border: 1px solid black;
        padding: 10px;
        border-radius: 5px;
    }
</style>
<body>
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <div class="receiver_border ">
                    <div class="row">
                        <div class="col-6"> <img src="data:image/png;base64, {{$receiver->image}}" class="user_image" alt="" > </div>
                        <div class="col-6"><span>{{$receiver->name}}</span></div>
                       
                    </div>    
                </div>

                <div class="message_border">
                    @foreach ($message as $item)
                        <div class="message_m">
                            {{$item->sender_name}}{{$item->message}}
                        </div>
                    @endforeach
                </div>

                <div class="input_request">
                        <div class="row">
                            <div class="col-10"><input type="text" name="message" class="form-control" placeholder="Enter Text Here"></div>
                            <div class="col-2">
                                <button class="btn btn-primary w-100" onclick="send_message()">Send</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

<script>
      let ip_address = "https://staging-socket.arahglobal.com";
      var socket = io.connect(ip_address);

      socket.on("connect", () => {
        console.log(socket.id);
            socket.emit("user_connected", '{{$UUID}}', '{{$user->name}}');
         // ojIckSD2jqNzOqIrAGzL
        });

        socket.on("socket_message",(data) => {
            console.log(data);
        })
        
        function send_message() {

            console.log($('input[name=message]').val());
            $.ajax({
                url: "{{ url('/api/send-message') }}",
                method: 'post',
                data: {
                    'token' : "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvc3RhZ2luZy5hcmFoZ2xvYmFsLmNvbVwvYXBpXC9nZXQtcGhvbmUiLCJpYXQiOjE2MTEwNDE0OTQsImV4cCI6MTYxMTA0NTA5NCwibmJmIjoxNjExMDQxNDk0LCJqdGkiOiJUVGRxaWVjalpwM3dIZGlPIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.m0nNguIk2humyxwkZla5EvvsURhLhb7sTSczkelbktk",
                    'receiver_phone' : '{{$receiver->phone}}',
                    'UUID' : '{{$UUID}}',
                    'message' : $('input[name=message]').val(),
                },
                success: function (response) {
                   console.log(response)
                }
            });
        }
</script>
</html> 