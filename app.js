// Import required modules
var express = require('express');
var bodyParser = require('body-parser');
var jwt = require('jsonwebtoken');
var app = express();

// Middleware to parse JSON data
app.use(bodyParser.json());

// Dummy user for sign-in (you can replace this with a real database)
const users = [
    { username: 'test', password: 'password123' }
];

// Home route to check if server is running
app.get('/', (req, res) => {
    res.send('Server is running');
});

// Sign-in route (POST)
app.post('/auth/signin', function (req, res) {
    const { username, password } = req.body;

    // Dummy authentication logic (replace this with your own logic)
    const user = users.find(u => u.username === username && u.password === password);

    if (user) {
        // Generate a JWT token valid for 1 hour
        const token = jwt.sign({ username: user.username }, 'your_secret_key', { expiresIn: '1h' });
        res.status(200).json({ message: 'Sign-in successful', token: token });
    } else {
        res.status(400).json({ message: 'Invalid username or password' });
    }
});

// Sign-out route (POST)
app.post('/auth/signout', function (req, res) {
    // Invalidate the token on the client side (no server-side action required)
    res.status(200).json({ message: 'Sign-out successful' });
});

// Error handling for 404 route
app.use(function (req, res, next) {
    res.status(404).json({ error: 'Not Found' });
});

// Start the server
app.listen(4000, () => {
    console.log('Server is running on http://localhost:4000');
});
