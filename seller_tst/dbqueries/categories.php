<?php
$categories_sql = "SELECT * FROM product_category";

//$order_sql = "SELECT * FROM orders";
$stmt = $conn->prepare($categories_sql);
$stmt->execute();

$product_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($product_categories as $row) {
    // For debugging
    //var_dump($row);

    $category = new ProductCategory(
        $row['product_category_id'],
        $row['product_category_name'],
        $row['product_category_is_active']
    );
    $categories[] = $category;
}//end foreach
?>