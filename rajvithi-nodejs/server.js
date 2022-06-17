var app = require('express')();
var http = require('http').Server(app);
const io = require('socket.io')(http, {
  cors: {
    origin: "*",
    credentials: true
  }
});

app.get("/", (req,res) =>
{
  res.end("test =======");
})

io.sockets.on('connection', function(socket) {

  socket.on('askforblood', function(data) {
    io.emit('askforblood',data);
  });

  socket.on('crossmatch', function(data) {
    io.emit('crossmatch',data);
  });

  socket.on('queue', function(data) {
    io.emit('queue',data);
  });

  socket.on('logout', function(data) {
    io.emit('logout',data);
  });

});

http.listen( process.env.PORT || 8089,function()
{
  console.log("********");
});