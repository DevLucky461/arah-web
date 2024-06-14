const app = require('express')();
const http = require('http').Server(app);
const Redis = require('ioredis');
const { data } = require('jquery');
const redis = new Redis;
const io = require('socket.io')(http);
const dotenv = require('dotenv');
dotenv.config();

http.listen(process.env.SOCKET_PORT, function(){
    console.log("connected");
})

app.get('/', (req, res) => {
    res.send('Hello World!')
})

redis.subscribe('stream-channel', function(){
});

redis.on('message', function(channel, message){
    parsed_message = JSON.parse(message);
    if(channel === 'stream-channel'){
        let data = parsed_message.data.data;
        io.to(data.UUID).emit("socket_message", data);
        io.to('room-'+data.user_phone).emit("room_data", data );
        console.log(data);
    }
});

io.on('connection', function(socket){
	//console.log('hekelel');
    socket.on("user_connected", function(UUID, user_name){
        socket.join(UUID);
        console.log('User :' + user_name + "has enter room : " +  UUID);
    })

    socket.on("room_user", function(user){
        socket.join("room-"+user.phone);
    })
});

