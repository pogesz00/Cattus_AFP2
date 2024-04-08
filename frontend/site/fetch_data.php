
<?php
// Establish database connection (replace with your database credentials)
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch leaderboard data from the database
$sql = "SELECT user, cat, score FROM leaderboard ORDER BY score DESC";
$result = $conn->query($sql);

// Display data as table rows
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["user"] . "</td><td>" . $row["cat"] . "</td><td>" . $row["score"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>