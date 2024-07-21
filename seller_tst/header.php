<?php
require_once('db/db_conn.php');
require_once('ClassFile/Product.php');
//require_once(dirname(__FILE__) . '/db/db_conn.php');
//require_once(dirname(__FILE__) . '/function_library/functionlib.php');
?>

<!--Created: 06/25/2024-->
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/seller_dash.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>

<body>
  <!-- wrapper navbar -->
  <div class="navbar">
    <div class="navbar__inner">
      <ul class="navbar__inner_list">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="#">About</a></li>
        <?php if (isset($_SESSION['seller_id'])): ?>
        <li class="dropdown">
          <a href="index.php"><?php echo htmlspecialchars($_SESSION['seller_name']); ?></a>
          <div class="dropdown-content">
            <a href="settings.php">My Settings</a>
            <a href="seller_product_dash.php">My Products</a>
            <a href="seller_order_dash.php">My Orders</a>
            <a href="logout.php">Logout</a>
          </div>
        </li>
        <?php else: ?>
        <li><a href="user_register.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>

    <!-- for small screen view -->
    <div class="btn_mobile">
      <div class="btn_mobile_inner">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <!-- side bar -->
  <div class="sidebar">
    <div class="sidebar_inner">
      <div class="sidebar_close justify-content-end align-items-center">
        <div class="sidebar_close_inner justify-content-center align-items-center">
          <span></span>
          <span></span>
        </div>
      </div>
      <ul class="side_list">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="#">About</a></li>
        <?php if (isset($_SESSION['seller_id'])): ?>
        <li class="dropdown">
          <a href="index.php"><?php echo htmlspecialchars($_SESSION['seller_name']); ?></a>
          <div class="dropdown-content">
            <a href="settings.php">My Settings</a>
            <a href="seller_product_dash.php">My Products</a>
            <a href="seller_order_dash.php">My Orders</a>
            <a href="logout.php">Logout</a>
          </div>
        </li>
        <?php else: ?>
        <li><a href="user_register.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <!-- bg sidebar -->
  <div class="sidebar-bg"></div>
  <script>
  $(document).ready(function() {

    /////// making navbar
    $(".btn_mobile_inner").on('click', function() {
      $(".sidebar").removeClass("removeside");
      $(".sidebar").addClass("activeside");
      $(".sidebar-bg").css("display", "block");
    })
    $('.sidebar_close_inner').on('click', function() {
      $(".sidebar").removeClass("activeside");
      $(".sidebar").addClass("removeside");
      $(".sidebar-bg").css("display", "none");
    })

  });
  </script>

</body>

</html>
