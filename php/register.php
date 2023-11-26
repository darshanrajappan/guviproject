<?php
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
    $email = $_POST['user_email'];
    $password = $_POST['user_pwd'];

    $sql = "INSERT INTO users_info (user_name, user_email, user_pwd) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // Just return a simple string
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
