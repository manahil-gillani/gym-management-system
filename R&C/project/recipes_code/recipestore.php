<?php
// Include the database connection file
include 'db.php';

// Array of hardcoded recipe names
$recipeNames = array(
    "Strawberry Smoothie",
    "Avocado Toast",
    "Chocolate Lava Cake",
    "Fish Tacos",
    "Falafel Waffles",
    "Greek Baked Salmon"
);

// Loop through the array and insert each recipe name into the recipes table
foreach ($recipeNames as $recipeName) {
    // Prepare the SQL statement to insert the recipe name into the recipes table
    $sql = "INSERT INTO recipes (name) VALUES ('$recipeName')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Recipe '$recipeName' stored successfully!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
