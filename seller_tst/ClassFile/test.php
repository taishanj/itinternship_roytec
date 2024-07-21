<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('Product.php');
require_once('User.php');

$myProduct = new Product();
$myUser = new User();

//Test Product
$productName = $myProduct->getProductName();
echo "Product Name: " . $productName . PHP_EOL;

$myProduct->setProductName("mangoes");
$newProductName = $myProduct->getProductName();
echo "Product Name after setProductName: " . $newProductName . PHP_EOL;


//Test User
$newUserName = $myUser->getUserName();
echo "User name: " . $userName . PHP_EOL;

$myUser->setUserName("Raphael");
$newUserName = $myUser->getuserName();
echo "User name after setUserName " . $newUserName . PHP_EOL;

?>
