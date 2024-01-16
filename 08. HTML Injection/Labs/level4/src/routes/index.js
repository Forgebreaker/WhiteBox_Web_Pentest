var express = require('express');
var router = express.Router();

router.get('/', function (req, res, next) {
    res.render('index');
});

// Note search feature
router.get('/search', function (req, res, next) {
    // Don't allow script keyword
    if (req.query.q.search(/script/i) > 0) {
        res.send('Hack detected');
        return;
    }
    html = 'Your search - <b>' + req.query.q + '</b> - did not match any notes.<br><br>'
    res.send(html);
});

module.exports = router;
