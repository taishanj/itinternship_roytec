<?php
/*16/07/2024 - Returns the orders that a seller has received*/
function getOrdersBySellerId($conn,$seller_id){
$orders_sql = "SELECT * FROM orders WHERE seller_id =?" ;

$stmt = $conn->prepare($orders_sql);
$stmt->execute([$seller_id]);

$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $orders;
}
?>
