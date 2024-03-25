require("dotenv").config();
var express = require("express");
var path = require("path");
var cookieParser = require("cookie-parser");
var session = require("express-session");
var logger = require("morgan");
const mongoose = require("mongoose");
var app = express();
const port = parseInt(process.env.PORT) || 3000;

const urlConnect = process.env.DB_URL;

// Connect to database
mongoose.connect(urlConnect, { useNewUrlParser: true, useUnifiedTopology: true }, err => {
    if (err) throw err;
    console.log("Connect database successfullyy!!");
});

// start session
app.use(session({
    resave: false,
    saveUninitialized: true,
    secret: process.env.SECRET_KEY,
    cookie: {
        maxAge: 86400000,
        httpOnly: false
    }
}));

// view engine setup
app.set("views", path.join(__dirname, "views"));
app.set("view engine", "ejs");

// logging
app.use(logger("dev"));

// Handle form-urlencoded request
app.use(express.urlencoded({ extended: true }));

// route setup
var indexRouter = require("./routes/index");
app.use(indexRouter);

var adminRouter = require("./routes/admin");
app.use(adminRouter);

var ticketRouter = require("./routes/ticket");
app.use(ticketRouter);

app.listen(port, () => {
    console.log(`[+] Running level6 on port ${port}, root: "${__dirname}"`);
});

module.exports = app;
