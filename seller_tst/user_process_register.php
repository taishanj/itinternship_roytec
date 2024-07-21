	<?php
	session_start();
	require_once("db/db_conn.php");
	$options = array("cost"=>4);
	$seconds = 2;

  $user_name = $user_mobile_phone = "";
  $user_img = 'avatar.png';

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
	  $user_name = test_input($_POST["username"]);
	  $user_mobile_phone= test_input($_POST["user_mobile_phone"]);
  }

  function test_input($data)
   {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	try
	{
		//to be replaced with a mobile number check (instead of username)
		$is_user_registered = $conn->prepare("SELECT * FROM seller WHERE seller_mobile=?");
		$is_user_registered->execute([$user_mobile_phone]);
		$find_user = $is_user_registered->fetch();
		if ($find_user)
	   {

			$_SESSION["seller_id"] = $find_user["seller_id"];
			$_SESSION["seller_name"] = $find_user["seller_name"]; // Add user name for display

	    // email found
	    $account_exists = true;
	    //Sms authentication required prior to either of these checks (new user or returning)
		$_SESSION['logged_in'] == true;
	    echo "<script>location='index.php'</script>";
		}
		else
		{
		 	 if(!preg_match("/^[\+0-9\-]+$/",$user_mobile_phone) && strlen($user_mobile_phone))
		 	 {
   				 // Return Error - Invalid Email
   				 echo "Please enter valid mobile phone number";

	 		 }
	 		 else
	 		 {
    		//Creates a new seller account, if none already exists
    		 $add_to_database = "INSERT INTO seller(seller_name, seller_img, seller_mobile)
    		 VALUES ('$user_name','$user_img','$user_mobile_phone')";
	   		 $conn->exec($add_to_database);

				$is_user_registered->execute([$user_mobile_phone]); // Re-query for ID
				$new_user = $is_user_registered->fetch();

				$_SESSION["seller_id"] = $new_user["seller_id"];
				$_SESSION["user_name"] = $new_user["seller_name"]; // Add user name for display
				 //echo "<script>location='seller_order_dash.php'</script>";
				 echo "<script>location='index.php'</script>";

	  		 }
		}
	}//end try
	catch(PDOException $e)
	{
	    echo $add_to_database . "<br>" . $e->getMessage();
	}
	$conn = null;
	?>
