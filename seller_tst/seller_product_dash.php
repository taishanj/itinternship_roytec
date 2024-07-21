<?php
session_start();
require_once('header.php');
require_once('ClassFile/Product.php');
require_once('ClassFile/ProductCategory.php');
require_once("dbqueries/categories.php");
require_once('php_functions/getAllProducts.php');
require_once('php_functions/displayAllProducts.php');
$sellerId = $_SESSION['seller_id'];
$seller_products = getAllProductsBySellerId($conn,$sellerId);
$productHtml = displayAllProductsWithActions($seller_products);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Product List</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>My Products</h1>
<button id="addProductBtn">Add Product</button>
<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Available</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $productHtml; ?>
    </tbody>
</table>
    <?php //foreach ($categories as $category) : ?>
     <?php //echo $category->getProductCategoryName(); ?>
    <?php //endforeach; ?>
    <!-- Modal for Adding/Editing Products -->
    <div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalTitle">Add Product</h2>
        <form id="productForm" action="save_product.php" method="POST" enctype="multipart/form-data">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="product_name" required>

            <label for="productCategoryId">Product Category:</label>
            <select name="product_category_id" id="productCategoryId">
                <option value="">Select Category</option>
                <?php foreach ($categories as $category) : ?>
                <!--How to output values here?-->
                <option value="<?= $category->getProductCategoryId() ?>"><?= $category->getProductCategoryName() ?></option>                <?php endforeach; ?>
            </select>

            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="product_price" required>

            <label for="productQty">Product Quantity:</label>
            <input type="number" id="productQty" name="product_qty" required>
            
            <label for="productIsActive">Product Available:</label>
            <input type="checkbox" id="productIsActive" name="product_is_active">

            <label for="productImg">Product Image:</label>
            <input type="file" id="productImg" name="product_img" accept="image/*" required>
            <img id="imagePreview" src="assets/imgs/default_product_img.png" alt="Image Preview" style="max-width: 100px; max-height: 100px;">

            <button type="submit">Save</button>
        </form>
    </div>
</div>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('productModal');
    var addProductBtn = document.getElementById('addProductBtn');
    var closeBtn = document.querySelector('.close');
    var productForm = document.getElementById('productForm');
    var imagePreview = document.getElementById('imagePreview');

    addProductBtn.onclick = function() {
        document.getElementById('modalTitle').innerText = 'Add Product';
        productForm.reset();
        imagePreview.src = '';
        modal.style.display = 'block';
    };

    closeBtn.onclick = function() {
        modal.style.display = 'none';
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
/*
//successfully displayed data to console
document.querySelectorAll('.editBtn').forEach(function(button) {
  button.onclick = function() {
    var productId = this.getAttribute('data-product-id');
    fetch('dbqueries/getProductDetails.php?id=' + productId)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        // You can now use the data object here
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  };
});
*/

document.querySelectorAll('.editBtn').forEach(function(button) {
    button.onclick = function() {
        var productId = this.getAttribute('data-product-id');
        fetch('dbqueries/getProductDetails.php?id=' + productId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalTitle').innerText = 'Edit Product';
                document.getElementById('productName').value = data.product_name;
                document.getElementById('productPrice').value = data.product_price;
                document.getElementById('productQty').value = data.product_qty;
                imagePreview.src = data.product_img;
                modal.style.display = 'block';
            })
            .catch(error => {
                console.error('Error fetching product details:', error);
            });
    };
});


    productForm.product_img.onchange = function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    };
/*how to submit properly */
    productForm.onsubmit = function(e) {
        e.preventDefault();
        var formData = new FormData(productForm);
        fetch('save_product.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              } else {
                  alert('Error saving product: ' + data.message);
              }
          })
          .catch(error => {
              alert('Error: ' + error.message);
          });
    };
});

</script>
</body>
</html>






