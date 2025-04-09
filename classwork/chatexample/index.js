const http = require('http');
const server = http.createServer((req, res)=>{});
server.listen('1234', ()=>{
    console.log(new Date() + "Server is listening on port 1234");
})

const WebSocketServer = require('websocket').server;
let wsServer = new WebSocketServer({ httpServer: server });

var count = 0;
var clients = {};

//listen for connections
wsServer.on('request', (request)=>{
    //what do we want to do on a connection?

    //accept connection
    let connection = request.accept(null, request.origin);

    let id = count++;
    
    //store the connection so we can loop through later
    clients[id] = connection;
    console.log(new Date() + "Connection accepted [" +id+ "]");

    //listen for messages and broadcast
    connection.on('message', (message)=>{
        //you validate, sanitize, etc including makign sure only text of UTF8
        let msgString = message.utf8Data;

        //loop through all of our clients
        for (var i in clients) {
            clients[i].sendUTF(msgString);
        }

        //listen for disconnect
        connection.on('close', (reasonCode, description)=>{
            delete clients[id];
        });
    });
});  