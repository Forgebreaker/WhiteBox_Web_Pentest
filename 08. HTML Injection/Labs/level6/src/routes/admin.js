var express = require('express');
var Ticket = require('../models/ticket');
var router = express.Router();

//Show customers support tickets
router.get('/admin', function (req, res, next) {
    if (!req.session.isAdmin) {
        res.render('login');
    } else {
        try {
            Ticket.find({}).sort({ created_time: -1 }).limit(5).exec(function (err, tickets) {
                if (err) return console.log(err);
                res.render('admin', { tickets: tickets });
            });
        }
        catch (e) {
            console.log(e);
        }
    }
});

//Login
router.post('/admin', function (req, res, next) {
    if (!req.session.isAdmin) {
        if (req.body.username === "admin" && req.body.password === process.env.ADMIN_PASSWORD) {
            req.session.isAdmin = true;
            res.writeHead(302, { 'Location': '/admin' });
            res.end();
        } else {
            res.send('wrong username / password');
        }
    }
});

module.exports = router;
