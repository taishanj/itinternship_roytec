<?php
session_start();
require_once('header.php');
require_once('ClassFile/Order.php');
require_once("dbqueries/orders.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Client Orders</h1>
  <table>
  <tr>
    <th>Image</th>
    <th>Product Name</th>
    <th>Price</th>
  </tr>
  
  <?php foreach ($order_data as $order) : ?>
    <tr>
      <td>
        <img src="<?= htmlspecialchars($order['product_img'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($order['product_name'], ENT_QUOTES, 'UTF-8') ?>">
      </td>
      <td>
        <h3><?= htmlspecialchars($order['product_name'], ENT_QUOTES, 'UTF-8') ?></h3>
      </td>
      <td>
        <h3><?= htmlspecialchars($order['order_product_price'], ENT_QUOTES, 'UTF-8') ?></h3>
      </td>
    </tr>
  <?php endforeach; ?>

</table>
<!--Export order data to an excel or pdf file -->
<a href="export_orders.php">Export Orders to Excel</a>  <button type="button" onclick="window.location.href='export_orders.php'">Export Orders</button>
</body>
</html>
