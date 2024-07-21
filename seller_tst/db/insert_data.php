<?php

$host = "localhost";
$dbname = "sellersmarkt";
$username = "root";
$password = "";

try {
  // Connect to the database
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$sql_seller = "INSERT INTO seller(
	seller_name,
	seller_img,
	seller_mobile
	)
	VALUES
	('Raphie','assets/imgs/avatar.png','8686810466'),
	('Naeem','assets/imgs/avatar.png','8687334052')
	";

	$result = $conn->exec($sql_seller);
	echo "New seller record created successfully";



	// Insert data for Entity-category
	$sql_category = "INSERT INTO product_category (product_category_name) VALUES ('fruit')";
	$result = $conn->exec($sql_category);
	echo "New category record created successfully";



	// Insert data for Entity-product
	$sql_product = "INSERT INTO product (
	product_seller_id,
	product_category_id,
	product_name,
	product_img,
	product_is_active,
	product_qty,
	product_price,
	product_unit,
	product_prev_order_count
	)
	VALUES
	(1,1,'julie mango','assets/imgs/mango_product.png',TRUE,10,12.00,'lbs',3),
	(1,1,'limes','assets/imgs/limes_product.png',1,100,7.70,'lbs',40),
	(2,1,'guava','assets/imgs/guava_product.png',1,50,29.00,'lbs',200),
	(2,1,'papaya','assets/imgs/papaya_product.png',1,20,4.50,'lbs',11)
	";

	$result = $conn->exec($sql_product);

	echo "New product record created successfully";
  

    $sql_order = "INSERT INTO orders(
    seller_id,
    product_id,
    order_product_price,
    order_value,
    order_product_qty,
    order_product_discount_amt,
    order_is_completed
    )
    VALUES
    (1,1,11.00,33.00,3,0.00,FALSE),
    (2,2,25.00,500.00,20,0.00,FALSE)
    ";
    $result = $conn->exec($sql_order);
    echo "New order record created successfully";


} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null; // Close connection
?>
