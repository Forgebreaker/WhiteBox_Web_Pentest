require("dotenv").config();
var createError = require("http-errors");
var express = require("express");
var path = require("path");
var cookieParser = require("cookie-parser");
var session = require("express-session");
var logger = require("morgan");
var app = express();
const port = parseInt(process.env.PORT) || 3000;

var router = express.Router();

// start session
app.use(session({
    resave: false,
    saveUninitialized: true,
    secret: process.env.SECRET_KEY,
    cookie: {
        httpOnly: false,
        maxAge: 86400000
    }
}));

// view engine setup
app.set("views", path.join(__dirname, "views"));
app.set("view engine", "ejs");

// logging
app.use(logger("dev"));

// setup configs
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cookieParser());

// Create notes list
app.use(function (req, res, next) {
    if (!req.session.notes) req.session.notes = [];
    next();
});

// route setup
var indexRouter = require("./routes/index");
app.use(indexRouter);

var noteRouter = require("./routes/note");
app.use(noteRouter);

app.listen(port, () => {
    console.log(`[+] Running level5 on port ${port}, root: "${__dirname}"`);
});

module.exports = app;
