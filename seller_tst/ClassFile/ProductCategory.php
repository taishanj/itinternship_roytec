<?php
class ProductCategory {
  // Properties
  private int $productCategoryId;
  private string $productCategoryName;
  private bool $productCategoryIsActive;

  // Deparameterized constructor
  public function __construct(
    $productCategoryId = 0, 
    $productCategoryName = "",
    $productCategoryIsActive = false

  ) {
    $this->productCategoryId = $productCategoryId;
    $this->productCategoryName = $productCategoryName;
    $this->productCategoryIsActive = $productCategoryIsActive;
  }

  // Setter Methods
  public function setProductCategoryName($productCategoryName) {
    $this->productCategoryName = $productCategoryName;
  }

  public function setProductCategoryIsActive($productCategoryIsActive) {
    $this->productCategoryIsActive = $productCategoryIsActive;
  }


  // Getter Methods
  public function getProductCategoryId() {
    return $this->productCategoryId;
  }
  public function getProductCategoryName() {
    return $this->productCategoryName;
  }
  public function getProductCategoryIsActive() {
    return $this->productCategoryIsActive;
  }
}
?>

