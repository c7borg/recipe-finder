<?php
$servername = "localhost";
$username = "recipe_finder";        // Replace with your DB username
$password = "s8DefjmxzybB@Gro";            // Replace with your DB password
$dbname = "recipe_finder"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
