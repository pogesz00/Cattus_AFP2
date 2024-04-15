<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "cattus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['first'];
$password = $_POST['password'];

// Prepare SQL statement to retrieve user from database
$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows == 1) {
    // Start session
    session_start();
    $_SESSION['username'] = $username;
    // Redirect to dashboard or home page
    header("Location: index.html");
    exit();
} else {
    // Invalid credentials, redirect back to login page with error
    header("Location: login.html?error=invalid_credentials");
    exit();
}

$stmt->close();
$conn->close();
?>
