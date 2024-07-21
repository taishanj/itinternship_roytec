<?php
session_start();
require_once('db/db_conn.php');
header('Content-Type: application/json');

//Insufficient time to implement select list with product units
$product_unit = "lbs";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $response = ['success' => false, 'message' => ''];
  $product_seller_id = intval($_SESSION['seller_id']); // Using session for seller ID
  $product_category_id = intval($_POST['product_category_id']); // Assuming it's an integer
  $product_name = trim($_POST['product_name']); // Trim leading/trailing whitespace
  $product_price = floatval($_POST['product_price']); // Convert to float for price
  $product_is_active = $_POST['product_is_active']; // Convert to float for price
  $product_qty = intval($_POST['product_qty']); // Convert to integer for quantity

  // Validate input data
  if (empty($product_name)) {
    $response['message'] = 'Product name is required.';
    echo json_encode($response);
    exit;
  }
  if ($product_price <= 0) {
    $response['message'] = 'Product price must be positive.';
    echo json_encode($response);
    exit;
  }
  if ($product_qty <= 0) {
    $response['message'] = 'Product quantity must be positive.';
    echo json_encode($response);
    exit;
  }

  // Image upload (optional security improvements)
  $product_img = null;
  if (isset($_FILES['product_img']) && !empty($_FILES['product_img']['name'])) {
    $target_dir = "assets/imgs/";
    $target_file = $target_dir . basename($_FILES['product_img']['name']);

    // Check for valid image types (optional)
    $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['product_img']['type'], $allowed_mime_types)) {
      $response['message'] = 'Invalid image format. Please upload JPEG, PNG, or GIF images.';
      echo json_encode($response);
      exit;
    }

    // Check for upload errors
    if (move_uploaded_file($_FILES['product_img']['tmp_name'], $target_file)) {
      $product_img = $target_file;
    } else {
      $response['message'] = 'Error uploading image.';
      echo json_encode($response);
      exit;
    }
  }

  // Database connection
  try {
    $sql = "INSERT INTO product (product_seller_id,product_category_id, product_name, product_img, product_price, product_is_active, product_qty,product_unit) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$product_seller_id, $product_category_id, $product_name, $product_img, $product_price, $product_is_active, $product_qty, $product_unit]);

    $response['success'] = true;
  } catch (PDOException $e) {
    $response['message'] = 'Database error: ' . $e->getMessage();
  }

  echo json_encode($response);
  $conn = null;
}
