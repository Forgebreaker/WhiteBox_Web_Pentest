const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const ticketSchema = new Schema({
  content: {
    type: String,
    required: true
  },
  email: {
    type: String,
    required: true
  },
  created_time: {
    type: Date,
    default: Date.now
  }
});

const ticket = mongoose.model(
  "ticket",
  ticketSchema
);
module.exports = ticket;