<?php
$conn = new mysqli("localhost", "root", "", "mydb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='text-align:center;'>Message Saved Successfully</h2>";
    echo "<a href='index.html' style='display:block;text-align:center;'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}
?>