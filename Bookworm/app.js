// app.js
const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

const app = express();

// Connect to MongoDB
mongoose.connect('mongodb://localhost/myapp', { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('MongoDB connected...'))
  .catch(err => console.log(err));

// Create a schema for the user
const userSchema = new mongoose.Schema({
  username: String,
  password: String,
  age: Number,
  genre: String
});

// Create a model for the user
const User = mongoose.model('User', userSchema);

// Use body-parser middleware to parse form data
app.use(bodyParser.urlencoded({ extended: false }));

// Serve the index.html file
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/login.html');
});

// Handle the form submission
app.post('/login', (req, res) => {
  const { username, password, age, genre } = req.body;

  // Create a new user object
  const user = new User({
    username,
    password,
    age,
    genre
  });

  // Save the user to the database
  user.save((err) => {
    if (err) {
      console.log(err);
      res.status(500).send('Internal server error');
    } else {
      res.send(`Welcome, ${user.username}!`);
    }
  });
});

// Start the server
app.listen(3005, () => console.log('Server started on port 3005...'));
