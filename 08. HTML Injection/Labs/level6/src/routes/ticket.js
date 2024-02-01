const { application } = require('express');
var express = require('express');
var Ticket = require('../models/ticket');
var router = express.Router();

router.post('/ticket', function (req, res, next) {
    try {
        ticket = new Ticket({ "content": req.body.content, "email": req.session.email });
        ticket.save();
        res.send("We will contact you as soon as possible.");
    }
    catch (e) {
        console.log(e);
        res.send("Error");
    }
});

module.exports = router;
