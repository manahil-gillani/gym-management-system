<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "user_db";

// Create connection
$conn = new mysqli($server_name, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from POST request
$name = $_POST['name'];
$totalPrice = $_POST['totalPrice'];
$orderId = $_POST['orderId'];

// Prepare INSERT statement
$stmt = $conn->prepare("INSERT INTO order_data (username, totalprice, order_id) VALUES (?, ?, ?)");

// Bind parameters
$stmt->bind_param("sss", $name, $totalPrice, $orderId);

// Execute statement
if ($stmt->execute()) {
    echo "Order data inserted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
