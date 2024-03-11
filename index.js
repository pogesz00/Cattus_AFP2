const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.json());

// Database Connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'your_username',
  password: 'your_password',
  database: 'cattus'
});

db.connect((err) => {
  if (err) throw err;
  console.log('Connected to database');
});

// CRUD Operations for 'cats'
app.post('/cats', (req, res) => {
  const { ownerID, name, picture } = req.body;
  if (!ownerID || !name || !picture) {
    return res.status(400).send('Missing required fields');
  }

  const query = 'INSERT INTO cats (ownerID, name, picture) VALUES (?, ?, ?)';
  db.query(query, [ownerID, name, picture], (err, result) => {
    if (err) {
      res.status(500).send('Error adding cat');
    } else {
      res.status(201).send(`Cat added with ID: ${result.insertId}`);
    }
  });
});

app.get('/cats', (req, res) => {
  const query = 'SELECT * FROM cats';
  db.query(query, (err, results) => {
    if (err) {
      res.status(500).send('Error retrieving cats');
    } else {
      res.status(200).json(results);
    }
  });
});

app.get('/cats/:id', (req, res) => {
  const query = 'SELECT * FROM cats WHERE id = ?';
  db.query(query, [req.params.id], (err, results) => {
    if (err) {
      res.status(500).send('Error retrieving cat');
    } else if (results.length > 0) {
      res.status(200).json(results[0]);
    } else {
      res.status(404).send('Cat not found');
    }
  });
});

app.put('/cats/:id', (req, res) => {
  const { ownerID, name, picture } = req.body;
  const query = 'UPDATE cats SET ownerID = ?, name = ?, picture = ? WHERE id = ?';
  
  db.query(query, [ownerID, name, picture, req.params.id], (err, result) => {
    if (err) {
      res.status(500).send('Error updating cat');
    } else if (result.affectedRows === 0) {
      res.status(404).send('Cat not found');
    } else {
      res.status(200).send('Cat updated successfully');
    }
  });
});
app.delete('/cats/:id', (req, res) => {
  const query = 'DELETE FROM cats WHERE id = ?';
  db.query(query, [req.params.id], (err, result) => {
    if (err) {
      res.status(500).send('Error deleting cat');
    } else if (result.affectedRows === 0) {
      res.status(404).send('Cat not found');
    } else {
      res.status(200).send('Cat deleted successfully');
    }
  });
});


// Similar CRUD Operations for 'positions' and 'users'

//Create a Position (POST /positions)
app.post('/positions', (req, res) => {
  const { cat_id, time, x_cord, y_cord } = req.body;
  if (!cat_id || !time || x_cord === undefined || y_cord === undefined) {
    return res.status(400).send('Missing required fields');
  }

  const query = 'INSERT INTO positions (cat_id, time, x_cord, y_cord) VALUES (?, ?, ?, ?)';
  db.query(query, [cat_id, time, x_cord, y_cord], (err, result) => {
    if (err) {
      res.status(500).send('Error adding position');
    } else {
      res.status(201).send(`Position added with ID: ${result.insertId}`);
    }
  });
});

//Read All Positions (GET /positions)
app.get('/positions', (req, res) => {
  const query = 'SELECT * FROM positions';
  db.query(query, (err, results) => {
    if (err) {
      res.status(500).send('Error retrieving positions');
    } else {
      res.status(200).json(results);
    }
  });
});

//Read a Specific Position (GET /positions/:id)
app.get('/positions/:id', (req, res) => {
  const query = 'SELECT * FROM positions WHERE id = ?';
  db.query(query, [req.params.id], (err, results) => {
    if (err) {
      res.status(500).send('Error retrieving position');
    } else if (results.length > 0) {
      res.status(200).json(results[0]);
    } else {
      res.status(404).send('Position not found');
    }
  });
});

//Update a Position (PUT /positions/:id)

app.put('/positions/:id', (req, res) => {
  const { cat_id, time, x_cord, y_cord } = req.body;
  const query = 'UPDATE positions SET cat_id = ?, time = ?, x_cord = ?, y_cord = ? WHERE id = ?';

  db.query(query, [cat_id, time, x_cord, y_cord, req.params.id], (err, result) => {
    if (err) {
      res.status(500).send('Error updating position');
    } else if (result.affectedRows === 0) {
      res.status(404).send('Position not found');
    } else {
      res.status(200).send('Position updated successfully');
    }
  });
});

//Delete a Position (DELETE /positions/:id)

app.delete('/positions/:id', (req, res) => {
  const query = 'DELETE FROM positions WHERE id = ?';
  db.query(query, [req.params.id], (err, result) => {
    if (err) {
      res.status(500).send('Error deleting position');
    } else if (result.affectedRows === 0) {
      res.status(404).send('Position not found');
    } else {
      res.status(200).send('Position deleted successfully');
    }
  });
});

//Create a User (POST /users)
app.post('/users', (req, res) => {
  const { username, email, password, permission } = req.body;
  if (!username || !email || !password || permission === undefined) {
    return res.status(400).send('Missing required fields');
  }

  // Add additional logic here for password hashing if needed

  const query = 'INSERT INTO users (username, email, password, permission) VALUES (?, ?, ?, ?)';
  db.query(query, [username, email, password, permission], (err, result) => {
    if (err) {
      res.status(500).send('Error adding user');
    } else {
      res.status(201).send(`User added with ID: ${result.insertId}`);
    }
  });
});

//Read All Users (GET /users)
app.get('/users', (req, res) => {
  const query = 'SELECT * FROM users';
  db.query(query, (err, results) => {
    if (err) {
      res.status(500).send('Error retrieving users');
    } else {
      res.status(200).json(results);
    }
  });
});

// Starting the server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
