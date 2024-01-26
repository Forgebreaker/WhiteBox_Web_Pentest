var express = require('express');
var router = express.Router();

router.get('/', function (req, res, next) {
    res.render('index');
});

// Note search feature
router.get('/search', function (req, res, next) {
    // Sử dụng regex để replace <script> tag
    // Flag g: dùng để match tất cả ký tự trong mẫu tìm kiếm
    // Flag i: case insensitve không phân biệt chữ hoa chữ thường
    sanitized_q = req.query.q.replace(/<script>|<\/script>/gi, "");
    html = 'Your search - <b>' + sanitized_q + '</b> - did not match any notes.<br><br>'
    res.send(html);
});

module.exports = router;
