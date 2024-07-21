<?php
/*17/07/2024 - Returns the products that a seller has uploaded*/
function getAllProducts($conn){
    $products_sql = "SELECT * FROM product WHERE product_is_active = TRUE" ;

    $stmt = $conn->prepare($products_sql);
    $stmt->execute();

    $product_data_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($product_data_rows as $row) {

        $product = new Product(
            $row['product_id'],
            $row['product_seller_id'],
            $row['product_category_id'],
            $row['product_name'],
            $row['product_img'],
            $row['product_is_active'],
            $row['product_qty'],
            $row['product_price'],
            $row['product_unit']
        );
        $products[] = $product;  // Add the product object to the array
    }//end foreach
    return $products;
}//end getAallProducts()


function getAllProductsBySellerId($conn,$sellerId) {
    $productsBySellerId = "SELECT * FROM product WHERE product_seller_id=?" ;
    $stmt = $conn->prepare($productsBySellerId);
    $stmt->execute([$sellerId]);

    $product_data_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($product_data_rows as $row) {

        $product = new Product(
            $row['product_id'],
            $row['product_seller_id'],
            $row['product_category_id'],
            $row['product_name'],
            $row['product_img'],
            $row['product_is_active'],
            $row['product_qty'],
            $row['product_price'],
            $row['product_unit']
        );
        $products[] = $product;  // Add the product object to the array
    }//end foreach
    return $products;
}//end getAllProductsBySellerId()
?>