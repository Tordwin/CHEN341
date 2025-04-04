var express = require('express');
var router = express.Router();

/* GET users listing. */
router.get('/', function(req, res, next) {
  res.send('respond with a resource');
});

/* Get user and respond with json */
router.get('/:id', (req, res,next) => {
  console.log("The id is: " + req.params.id);
  let fakeUser = {
    age: 25,
    name: "John Doe",
    twitter: "@johnD",
    user: "jDoe",
  };
  res.json(fakeUser);
})

module.exports = router;
