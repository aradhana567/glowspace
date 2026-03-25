<?php
$conn = new mysqli("localhost", "root", "", "mydb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messages</title>
    <style>
        body {
            font-family: Arial;
            background: #f3f3f3;
            text-align: center;
        }
        .box {
            background: white;
            margin: 20px auto;
            padding: 15px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h1>Messages Received</h1>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='box'>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>" . $row['email'] . "</p>";
        echo "<p>" . $row['message'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No messages yet";
}
?>

</body>
</html>