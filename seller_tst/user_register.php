<?php 
//Whatsapp registration to be built in this file
	require_once("header.php");
?>
	<body>
		<form action="user_process_register.php" method="POST">
		   <div class="container">
		      <h1>Register</h1>
	         <p>Please fill in this form to create an account.</p>   
	         <hr>
	         <label for="firstname"><b>Username</b></label>
	         <input type="text" placeholder="Enter Username" name="username" required>
	         <br>
	         
	         <!--do not slow users down with prompt for email (may not have or use)-->
	         <label for="email"><b>Phone Number</b></label>
	         <input type="text" placeholder="Enter Phone Number" name="user_mobile_phone" required>
	         <br> 
	         
	         <!--
	         <label for="dob">Date Of Birth:</label>
 		 <input type="date" id="birthday" name="dob">
 		 -->
 		 
 		 <!--user type seller or buyer?-->
 		 <input type="radio" name="age" value="user_age"> I am 18 years or older. 
 		 
	         <!--whatsapp validation required to a)create account b)sign in -->
	         <hr>
	         <p>By signing in you agree to our <a href="#">Terms & Privacy</a>.</p>
	         <button type="submit" class="registerbtn">Sign In By Whatsapp</button>
	      </div>
	      <!--
	      <div class="container signin">
		      <p>Already have an account? <a href="wa_login_form.php">Log In</a>.</p>
	      </div>
	      -->
	   </form>
	</body>
</html>
