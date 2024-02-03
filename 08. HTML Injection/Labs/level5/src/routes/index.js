var express = require('express');
var router = express.Router();

var middleware = function (req, res, next) {
    if (!req.session.email) {
        console.log("chua co email");
        return res.redirect('/welcome?return_url=' + req.url);
    } else {
        console.log("da co email");
        next();
    }
};

router.get('/welcome', function (req, res, next) {
    res.render('welcome');
});

//Login user with email
router.post('/user', function (req, res, next) {
    req.session.email = req.body.email;
    res.redirect('/');
});

router.use(middleware);

router.get('/', function (req, res, next) {
    res.render('index', { email: req.session.email });
});

router.get('/logout', function (req, res, next) {
    req.session.destroy();
    res.redirect('/');
});

module.exports = router;
