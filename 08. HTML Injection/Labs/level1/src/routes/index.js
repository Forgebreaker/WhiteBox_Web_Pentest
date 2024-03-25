var express = require('express');
var router = express.Router();

router.get('/', function (req, res, next) {
    res.render('index');
});

// Note search feature
router.get('/search', function (req, res, next) {
    html = 'Your search - <b>' + req.query.q + '</b> - did not match any notes.<br><br>'
    res.send(html);
});

module.exports = router;
