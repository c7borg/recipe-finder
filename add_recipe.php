<?php
include 'config.php';

$title = $_POST['title'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = basename($_FILES['image']['name']);
    $target_dir = 'uploads/';
    $target_file = $target_dir . uniqid() . "_" . $image_name; // Prevent overwrites by prefixing with unique ID

    // Create the directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Insert recipe into database
        $stmt = $conn->prepare("INSERT INTO recipes (title, ingredients, instructions, image_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $ingredients, $instructions, $target_file);
        $stmt->execute();
        
        echo json_encode(['success' => true, 'message' => 'Recipe added successfully']);
    } else {
        echo json_encode(['success' => false, 'error' => 'Image upload failed']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid image file']);
}
?>
