<?php
session_start();
require_once('header.php');
require_once('ClassFile/Product.php');
require_once('php_functions/getAllProducts.php');
require_once('php_functions/displayAllProducts.php');

$products = getAllProducts($conn);
$productHtml = displayAllProductsWithoutActions($products);
//print_r($products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Products</h1>
    <div class="products">
    <table>
      <thead>
        <tr>
          <th>Image</th>
          <th>Product</th>
          <th>Quantity</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php echo $productHtml; ?>
      </tbody>
    </table>
</body>
</html>
