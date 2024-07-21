  
<?php  
  class Order {
  // Properties
  private int $orderId;
  private int $sellerId;
  private int $userId;
  private int $productId;
  private DateTime $orderDate;
  private float $orderProductPrice;
  private int $orderProductQty;
  private float $orderValue;
  private float $orderProductDiscountAmt;
  private bool $orderIsCompleted;

  // Deparameterized constructor
  public function __construct(
    $orderProductPrice = 0.00,
    $orderProductQty = 0,
    $orderValue = 0.00,
    $orderProductDiscountAmt = 0.00,
    $orderIsCompleted = false
  ) {
    $this->orderProductPrice = $orderProductPrice;
    $this->orderProductQty = $orderProductQty;
    $this->orderValue = $orderValue;
    $this->orderProductDiscountAmt = $orderProductDiscountAmt;
    $this->orderIsCompleted = $orderIsCompleted;
  }

  // Setter Methods
  public function setOrderProductPrice($productPrice) {
    $this->orderProductPrice = $orderProductPrice;
  }

public function setProductImg($orderProductQty) {
    $this->orderProductQty = $orderProductQty;
  }

  // Getter Methods
  public function getOrderProductPrice() {
    return $this->orderProductPrice;
  }
  
    public function getOrderProductQty() {
    return $this->orderProductQty;
  }
  
  public function getOrderValue() {
    return $this->orderValue;
  }
  
  public function getOrderProductDiscountAmt() {
    return $this->orderProductDiscountAmt;
  }
  
    public function getOrderIsCompleted() {
    return $this->orderIsCompleted;
  }

}
