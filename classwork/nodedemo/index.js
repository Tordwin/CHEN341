var events = require("events");
var eventEmitter = new events.EventEmitter();
// var connectHandler = function connected() {
//     console.log("Connection successful");
//     eventEmitter.emit("data_received"); //fire another event
// };

// eventEmitter.on('connection', connectHandler);
// eventEmitter.on('data_received', function() {
//     console.log("Data received successfully");
// });

//listener 1
var listener1 = function ()
{
    console.log("listener 1 executed")
}

var listener2 = function ()
{
    console.log("listener 2 executed")
}

eventEmitter.addListener("connection", listener1);

//fire the connection event
eventEmitter.on("connection", listener2);

var eventListener = eventEmitter.listenerCount("connection");
console.log(eventListener + " listener(s) listening to connection event")

eventEmitter.emit("connection");

//remove listener1
eventEmitter.removeListener("connection", listener1);

var eventListener = eventEmitter.listenerCount("connection");
console.log(eventListener + " listener(s) listening to connection event")

console.log("Program Ended");

// var fs = require("fs");
// var data = fs.readFile("input.txt", function(err, data) {
//     if (err) return console.error(err);
//     console.log(data.toString());
// });
// console.log("Program Ended");