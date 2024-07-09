<!-- join_challenge.php -->
<?php
// Include the database connection file
include 'db.php';

// Check if the name and ID are provided in the URL parameters
if (isset($_GET['name']) && isset($_GET['id'])) {
    // Retrieve the name and ID from the URL parameters
    $name = $_GET['name'];
    $id = $_GET['id'];

    // Prepare the SQL statement to insert into the challenges table
    $sql = "INSERT INTO challenges (name, id) VALUES ('$name', '$id')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "You have joined the challenge successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Handle case when name and ID are not provided
    echo "Please provide your name and ID.";
}

// Close the database connection
$conn->close();
?>
