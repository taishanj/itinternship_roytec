<?php
require_once('db/db_conn.php');

//if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $productId = 1; // Replace with actual product ID

    // SQL query to fetch product details based on the product ID
    $sql = "SELECT * FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$productId]);
    $productData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Handle potential errors
    if (!$productData) {
        http_response_code(404);
        echo json_encode(['error' => 'Product not found']);
        exit;
    }
    var_dump($productData);

    // Set content type header to indicate JSON
   // header('Content-Type: application/json');

    // Encode product data as JSON and echo
    //echo json_encode($productData);
//}
?>