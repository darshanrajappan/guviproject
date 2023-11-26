<?php
session_start();

// Database connection (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guvi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user_name'];
    $password = $_POST['user_pwd'];

    // To prevent SQL injection, consider using prepared statements
    $sql = "SELECT * FROM users_info WHERE user_name='$username' AND user_pwd='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        $_SESSION['user_name'] = $username;
        header("Location: profile.php"); // Redirect to dashboard or another page after successful login
        exit();
    } else {
        // Invalid username or password
        $error = "Invalid username or password";
    }
}

$conn->close();
?>
