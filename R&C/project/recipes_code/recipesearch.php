<?php
// Include the database connection file
include 'db.php';

// Check if the search term is provided
if (isset($_GET['search_term'])) {
    // Sanitize the search term to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search_term']);

    // Prepare the SQL statement to search for recipes
    $sql = "SELECT * FROM recipes WHERE name LIKE '%$searchTerm%'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    // Check if any recipes are found
    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<ul>";
        // Loop through the results and display each recipe
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['name']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No recipes found.";
    }
} else {
    // Handle case when search term is not provided
    echo "Please provide a search term.";
}

// Close the database connection
$conn->close();
?>
