<?php
$seller_id = $_SESSION['seller_id'];

$products_sql = "SELECT * FROM product WHERE product_seller_id =?";

//$order_sql = "SELECT * FROM orders";
$stmt = $conn->prepare($products_sql);
$stmt->execute([$seller_id]);

$seller_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($seller_products as $row) {
    // For debugging
    //var_dump($row);

    $product = new Product(
        $row['product_id'],
        $row['product_seller_id'],
        $row['product_category_id'],
        $row['product_name'],
        $row['product_img'],
        $row['product_is_active'],
        $row['product_qty'],
        $row['product_price'],
        $row['product_unit'],
    );
    $products[] = $product;
}



/*
// Fetch products from database
$sql = "SELECT * FROM product";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Initialize an empty array to store products
$products = [];

// Fetch all product rows
$product_data_rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 


foreach ($product_data_rows as $row) {

    $product = new Product(
        $row['product_name'],
        $row['product_img'],
        $row['product_is_active'],
        $row['product_qty'],
        $row['product_price'],
        $row['product_unit']
    );
    $products[] = $product;  // Add the product object to the array
}
*/
//var_dump($products);

//Test display the products
/*
foreach ($products as $product) {
    print($product->getProductName());
    print($product->getProductImg());
    print($product->getProductIsActive());
}
*/
/*
foreach ($products as $product) {
  echo "<tr>";
  echo "<td><img src='" . htmlspecialchars($product->getProductImg(), ENT_QUOTES, 'UTF-8'). "' alt='" . htmlspecialchars($product->getProductName(), ENT_QUOTES, 'UTF-8') . "'></td>";
  echo "<td><h3>" . htmlspecialchars($product->getProductName(), ENT_QUOTES, 'UTF-8') . "</h3></td>";
  echo "<td><h3>" . htmlspecialchars($product->getProductPrice(), ENT_QUOTES, 'UTF-8') . "</h3></td>";
  echo "</tr>";
}

*/

?>

