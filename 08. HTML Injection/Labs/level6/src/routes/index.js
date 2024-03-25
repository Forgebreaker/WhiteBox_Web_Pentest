var express = require('express');
var router = express.Router();

router.get('/', function (req, res, next) {
    if (!req.session.email) {
        res.render('welcome');
    }
    else {
        res.render('index', { email: req.session.email });
    }
});

// Login user with email
router.post('/user', function (req, res, next) {
    req.session.email = req.body.email;
    res.writeHead(302, { 'Location': '/' });
    res.end();
});

router.get('/logout', function (req, res, next) {
    req.session.destroy();
    res.writeHead(302, { 'Location': '/' });
    res.end();
});

module.exports = router;
