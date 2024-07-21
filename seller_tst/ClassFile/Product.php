<?php
class Product {
  // Properties
  private int $productId;
  private int $productSellerId;
  private int $productCategoryId;
  private string $productName;
  private string $productImg;
  private bool $productIsActive;
  private int $productQty;
  private float $productPrice;
  private string $productUnit;

  // Deparameterized constructor
  public function __construct(
    $productId = 0, 
    $productSellerId = 0,
    $productCategoryId = 0,
    $productName = "",
    $productImg = "",
    $productIsActive = true,
    $productQty = 0,
    $productPrice = 0.00,
    $productUnit = "",
  ) {
    $this->productId = $productId;
    $this->productSellerId = $productSellerId;
    $this->productCategoryId = $productCategoryId;
    $this->productName = $productName;
    $this->productImg = $productImg;
    $this->productIsActive = $productIsActive;
    $this->productQty = $productQty;
    $this->productPrice = $productPrice;
    $this->productUnit = $productUnit;
  }

  // Setter Methods
  public function setProductName($productName) {
    $this->productName = $productName;
  }

  public function setProductImg($productImg) {
    $this->productImg = $productImg;
  }

  // Getter Methods
  public function getProductId() {
    return $this->productId;
  }
  
  public function getProductName() {
    return $this->productName;
  }
  public function getProductImg() {
    return $this->productImg;
  }

  public function getProductIsActive() {
    return $this->productIsActive;
  }
  
  public function getProductQty() {
    return $this->productQty;
  }
  
  public function getProductPrice() {
    return $this->productPrice;
  }
  
    public function getProductUnit() {
    return $this->productUnit;
  }
}
?>

