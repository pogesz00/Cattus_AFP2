var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
const mysql = require('mysql');

var indexRouter = require('./routes');
var usersRouter = require('./routes/users');

var app = express();

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'cattus'
});

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', indexRouter);
app.use('/users', usersRouter);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
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

module.exports = app;