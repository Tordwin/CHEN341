const express = require('express'),
  mongodb = require('mongodb'),
  app = express(),
  bodyParser = require('body-parser'),
  url = process.env.MONGODB_URI || 'mongodb://localhost:27017/board'


mongodb.MongoClient.connect(url, function(err, client) {
  if (err) {
    console.error(err)
    process.exit(1)
    
  }
  console.log("Connected successfully to server");

  const db = client.db("board");

  app.use(bodyParser.json())
  app.use(express.static('public'))

  app.use(function(req, res, next){
    req.messages = db.collection('messages')
    return next()
  })

  app.get('/messages', function(req, res, next) {
    req.messages.find({}, {sort: {_id: -1}}).toArray(function(err, docs){
      if (err) return next(err)
      return res.json(docs)
    })
  })
  app.post('/messages', function(req, res, next){
    console.log(req.body)
    let newMessage = {
      message: req.body.message,
      name: req.body.name
    }
    req.messages.insertOne(newMessage, function (err, result) {
      if (err) return next(err)
      return res.json(result.ops[0])
    })
  })

  app.listen(3000)
})
