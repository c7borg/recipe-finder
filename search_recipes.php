<?php
include 'config.php';

$ingredient = $_GET['ingredient'] ?? '';
$stmt = $conn->prepare("SELECT * FROM recipes WHERE ingredients LIKE ?");
$search_term = '%' . $ingredient . '%';
$stmt->bind_param("s", $search_term);
$stmt->execute();
$result = $stmt->get_result();
$recipes = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($recipes);
?>
