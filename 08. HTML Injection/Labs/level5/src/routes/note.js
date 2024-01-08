const { application } = require('express');
var express = require('express');
var router = express.Router();

//Retrieve notes
router.get('/note', function (req, res, next) {
    res.json(req.session.notes);
});

//Add notes
router.post('/note', function (req, res, next) {
    req.session.notes.push(req.body.note);
    res.send("OK");
});

module.exports = router;
