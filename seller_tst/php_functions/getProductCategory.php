<?php
require_once('db/db_conn.php');

function getProductsByCategory($categoryId) {
  global $conn;

  $sql = "SELECT product_id, product_name, product_img, product_price 
          FROM product
          WHERE product_category_id = :category_id
          AND product_is_active = TRUE;
          ORDER BY product_id DESC";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":category_id", $categoryId, PDO::PARAM_INT);
  $stmt->execute();

  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $products;
}
?>

