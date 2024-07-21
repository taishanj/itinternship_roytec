<?php
/*
Created: 18/07/2024
Function: these display product details on the home page and seller product dashboard
*/
function displayAllProductsWithActions($products) {
    $productHtml = '';
    foreach ($products as $product) {
        $productHtml .= '<tr>';
        $productHtml .= '<td><img src="' . htmlspecialchars($product->getProductImg(), ENT_QUOTES, 'UTF-8') . '"></td>';
        $productHtml .= '<td><h3>' . htmlspecialchars($product->getProductName(), ENT_QUOTES, 'UTF-8') . '</h3></td>';
        $productHtml .= '<td><h3>$' . htmlspecialchars($product->getProductPrice(), ENT_QUOTES, 'UTF-8') . '</h3></td>';
        $productHtml .= '<td><h3>' . htmlspecialchars($product->getProductIsActive(), ENT_QUOTES, 'UTF-8') . '</h3></td>';
        $productHtml .= '<td>';
        $productHtml .= '<button class="editBtn" data-product-id="' . $product->getProductId() . '">Edit</button>';
        $productHtml .= '<button class="deleteBtn" data-product-id="' . $product->getProductId() . '">Delete</button>';
        $productHtml .= '</td>';
        $productHtml .= '</tr>';
    }
    return $productHtml;
}//end displayAllProductsWithActions

function displayAllProductsWithoutActions($products) {
    $productHtml = '';
    foreach ($products as $product) {
        $productHtml .= '<tr>';
        $productHtml .= '<td><img src="' . htmlspecialchars($product->getProductImg(), ENT_QUOTES, 'UTF-8') . '"></td>';
        $productHtml .= '<td><h3>' . htmlspecialchars($product->getProductName(), ENT_QUOTES, 'UTF-8') . '</h3></td>';
        $productHtml .= '<td><h3>$' . htmlspecialchars($product->getProductPrice(), ENT_QUOTES, 'UTF-8') . '</h3></td>';
        $productHtml .= '</tr>';
    }
    return $productHtml;
}//end displayAllProductsWithActions

?>