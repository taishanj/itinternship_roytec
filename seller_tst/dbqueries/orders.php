<?php
$seller_id = $_SESSION['seller_id'];

$order_sql = "SELECT o.*, p.product_name, p.product_img, p.product_qty
              FROM orders o
              INNER JOIN product p ON o.product_id = p.product_id
              WHERE seller_id =?";

//$order_sql = "SELECT * FROM orders";
$stmt = $conn->prepare($order_sql);
$stmt->execute([$seller_id]);

$order_data = $stmt->fetchAll(PDO::FETCH_ASSOC);



// Initialize an empty array to store orders and products
//$orders = [];
//$products = [];

// Fetch all order rows
//$product_order_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Fetch all product rows
//$product_data_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


//var_dump($order_rows);
/*
foreach ($product_order_rows as $row) {

    $order = new Order(
        $row['seller_id'],
        $row['product_id'],
        $row['order_product_price'],
        $row['order_product_qty'],
        $row['order_value'],
        $row['order_is_completed']
    );
    $orders[] = $order;  // Add the product object to the array
}


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

//Test display the orders
/*
foreach ($orders as $order) {
    print($order->getOrderProductPrice());
    print($order->getOrderProductQty());
    print($order->getOrderValue());
}
*/
/*
foreach ($orders as $order) {
  echo "<tr>";
  echo "<td><img src='" . htmlspecialchars($order->getOrderProductPrice(), ENT_QUOTES, 'UTF-8'). "' alt='" . htmlspecialchars($order->getOrderProductQty(), ENT_QUOTES, 'UTF-8') . "'></td>";
  echo "<td><h3>" . htmlspecialchars($product->getProductName(), ENT_QUOTES, 'UTF-8') . "</h3></td>";
  echo "<td><h3>" . htmlspecialchars($product->getProductPrice(), ENT_QUOTES, 'UTF-8') . "</h3></td>";
  echo "</tr>";
}
*/
?>
