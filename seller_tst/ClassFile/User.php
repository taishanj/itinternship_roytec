<?php
// Define table creation queries with lowercase field names
$user_table = "CREATE TABLE IF NOT EXISTS user (
user_id INT AUTO_INCREMENT PRIMARY KEY,
user_name VARCHAR(255) NOT NULL,
user_img VARCHAR(255),
user_type ENUM('buyer', 'seller', 'admin'),  -- Adjust allowed user types as needed
user_mobile VARCHAR(12),
user_reg_datetime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
user_last_login DATETIME
)";

class User {
  // Properties
  private int $userID;
  private string $userName;
  private string $userImg;
  private string $userType;
  private string $userMobile;
  private DateTime $userRegDateTime;
  private DateTime $userLastLogin;


  // Deparameterized constructor
  public function __construct(
	  string $userName = "",
	  string $userImg = "",
	  string $userType = "",
	  string $userMobile = "",
  ) {
    $this->userName = $userName;
    $this->userImg = $userImg;
    $this->userType = $userType;
    $this->userMobile = $userMobile;
  }

  // Setter Methods
  public function setUserName($userName) {
    $this->userName = $userName;
  }

  public function setUserImg($userImg) {
    $this->userImg = $userImg;
  }

  // Getter Methods
  public function getUserName() {
    return $this->userName;
  }
}
?>

