<?php
session_start();
require_once('db/db_conn.php'); // Replace with your database connection
require_once("dbqueries/orders.php"); // Replace with your order fetching function
require_once('php_functions/getOrdersBySellerId.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Fetch order data (assuming it's in $order_data)
$order_data = getOrdersBySellerId($conn,$_SESSION['seller_id']); // Replace with actual function
//var_dump($order_data);


// Prepare Excel data (headers and rows)
$header = array("Image", "Product Name", "Price"); // Modify headers as needed
$data = [];
foreach ($order_data as $order) {
  $row = array(
    htmlspecialchars($order['product_img'], ENT_QUOTES, 'UTF-8'),
    htmlspecialchars($order['product_name'], ENT_QUOTES, 'UTF-8'),
    htmlspecialchars($order['order_product_price'], ENT_QUOTES, 'UTF-8'),
  );
  $data[] = $row;
}

// Create an object of PHPExcel class (assuming you have PHPExcel installed)
require_once 'path/to/PHPExcel.php'; // Replace with path to PHPExcel library

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);

// Set column headers
$sheet = $objPHPExcel->getActiveSheet();
$sheet->fromArray($header, null, 'A1');

// Set data rows
$sheet->fromArray($data, null, 'A2');

// Set content types for columns (optional)
$sheet->setCellValue('A1', 'Image');
$sheet->setCellValue('B1', 'Product Name');
$sheet->setCellValue('C1', 'Price');
$sheet->getColumnDimension('A')->setWidth(20); // Adjust column width as needed

// Set header and filename
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=orders.xls');

// Generate and download the Excel file
$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$writer->save('php://output');
exit;

?>