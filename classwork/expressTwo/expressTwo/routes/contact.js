var express = require('express');
var router = express.Router();

/* GET index page. */
router.get('/', function(req, res, next) {
  res.render('contact', { title: 'Contact' });
});

// POST to index page
router.post('/thanks', (req,res,next) => {
  res.render('thanks', {
    title: 'Thanks',
    name: req.query.name,
    message: req.query.message
  });
});

module.exports = router;
