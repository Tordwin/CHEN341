const express = require("express");
const app = express();

app.use(express.static("public"));

app.get('/index.html', (req, res)=>{
    res.sendFile(__dirname + "/index.html");
});

app.get("/process_get", (req,res) => {
    var response = {
        first_name:req.query.first_name,
        last_name:req.query.last_name
    };
    console.log(response);
    res.end(JSON.stringify(response));
    //res.json(response);
});

app.get('/', (req, res)=>{
    console.log("Got a GET request for the home page!")
    res.send("Hello GET!");
});

app.post("/", (req, res) => {
    console.log("Got a POST request for the home page!")
    res.send("Hello POST!");
});

app.delete("/del_user", (req, res) => {
    console.log("Got a DELETE request for the /del_user page!")
    res.send("Hello DELETE!");
});

app.get("/list_user", (req, res) => {
    console.log("Got a GET request for the /list_user page!")
    res.send("User Listing");
});

app.get("/ab*cd", (req, res) => {
    console.log("Got a GET request for the /ab*cd page!")
    res.send("Pattern Match");
});

let server = app.listen(8081, ()=> {
    let host = server.address().address
    let port = server.address().port
    console.log("Example app listening at http://%s:%s", host, port);
});