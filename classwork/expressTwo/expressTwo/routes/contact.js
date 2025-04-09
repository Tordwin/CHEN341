var express = require('express');
var router = express.Router();

/* GET index page. */
router.get('/', function(req, res, next) {
  res.render('contact', { title: 'Contact' });
});

// USed for every contact route
router.use((req,res,next)=>{
  let method  = req.method;
  if (method === "POST") {
    console.log("Body: " + JSON.stringify(req.body));
  } else {
    console.log("Not a post");
  }
  next();
});

// only execute for post requests to /contact
router.post('/', (req,res,next)=>{
  const {name, message} = req.body;
  const now = new Date();
  req.data = {
    date : now,
    message,
    name
  };
  next();
});

// Get index page
router.get("/", function (req, res, next) {
  res.render("contact", { title: "Contact" });
});

//POST to index page
router.post("/", (req,res,next) => {
  var queryString =
    "name=" +
    encodeURIComponent(req.data.name) +
    "&message=" +
    encodeURIComponent(req.data.message) +
    "&date=" + encodeURIComponent(req.data.date);
  res.redirect("/contact/thanks?" + queryString);
});

router.get("/thanks", (req,res,next) => {
  res.render("thanks", {
    title: "Thanks",
    name: req.query.name,
    message: req.query.message,
    date: req.query.date
  });
});

module.exports = router;