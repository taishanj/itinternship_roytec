<?php
// Database connection details (replace with your own)
$host = "localhost";
$dbname = "sellersmarkt";
$username = "root";
$password = "";

try {
  // Create connection using PDO
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Set error mode to exceptions
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Define table creation queries with lowercase field names
$seller_table = "CREATE TABLE IF NOT EXISTS seller (
seller_id INT AUTO_INCREMENT PRIMARY KEY,
seller_name VARCHAR(255) NOT NULL,
seller_img VARCHAR(255),
seller_mobile VARCHAR(12),
seller_reg_datetime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
seller_last_login DATETIME
)";

$post_table = "CREATE TABLE IF NOT EXISTS post (
post_id INT AUTO_INCREMENT PRIMARY KEY,
post_datetime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
post_text TEXT,
post_img VARCHAR(255),
post_like_count INT DEFAULT 0
)";

$category_table = "CREATE TABLE IF NOT EXISTS product_category (
product_category_id INT AUTO_INCREMENT PRIMARY KEY,
product_category_name VARCHAR(255) NOT NULL,
product_category_is_active BOOLEAN DEFAULT TRUE
)";


$product_table = "CREATE TABLE IF NOT EXISTS products (
product_id INT AUTO_INCREMENT PRIMARY KEY,
product_seller_id INT,
product_category_id INT,
product_name VARCHAR(255) NOT NULL,
product_img VARCHAR(255),
product_is_active BOOLEAN DEFAULT TRUE,
product_qty INT,
product_price DECIMAL(10,2) NOT NULL,
product_unit VARCHAR(255),
FOREIGN KEY (product_category_id) REFERENCES product_category(product_category_id),
FOREIGN KEY (product_seller_id) REFERENCES seller(seller_id)
)";
  


$order_table = "CREATE TABLE IF NOT EXISTS orders (
order_id INT AUTO_INCREMENT PRIMARY KEY,
seller_id INT,
product_id INT,
order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
order_product_price DECIMAL(10,2) NOT NULL,
order_product_qty INT,
order_value DECIMAL(10,2) NOT NULL,
order_product_discount_amt DECIMAL(10,2) NOT NULL,
order_is_completed BOOLEAN DEFAULT FALSE,
FOREIGN KEY (seller_id) REFERENCES seller(seller_id),
FOREIGN KEY (product_id) REFERENCES product(product_id)
)";

$ad_table = "CREATE TABLE IF NOT EXISTS ad (
ad_id INT AUTO_INCREMENT PRIMARY KEY,
ad_date DATE NOT NULL,
ad_desc TEXT,
ad_img VARCHAR(255),
ad_vid VARCHAR(255),
ad_interaction_count INT DEFAULT 0
)";

  // Execute each CREATE TABLE statement
  $conn->exec($seller_table);
  $conn->exec($post_table);
  $conn->exec($category_table);
  $conn->exec($product_table);
  $conn->exec($order_table);
  $conn->exec($ad_table);

  echo "Tables created successfully!";

} catch(PDOException $e) {
  echo "Error creating tables: " . $e->getMessage();
}

$conn = null;  // Close connection

?>

