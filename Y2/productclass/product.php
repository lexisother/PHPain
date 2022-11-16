<?php

class Product
{
  public $productCode;
  public $productName;
  public $productLine;
  public $productScale;
  public $productVendor;
  public $productDescription;
  public $quantityInStock;
  public $buyPrice;
  public $MSRP;

  public $conn;

  function __construct()
  {
    $conn = new Connect();
    $this->conn = $conn->GetConn();
  }

  private function init(
    $productCode,
    $productName,
    $productLine,
    $productScale,
    $productVendor,
    $productDescription,
    $quantityInStock,
    $buyPrice,
    $MSRP
  ) {
    $this->productCode = $productCode;
    $this->productName = $productName;
    $this->productLine = $productLine;
    $this->productScale = $productScale;
    $this->productVendor = $productVendor;
    $this->productDescription = $productDescription;
    $this->quantityInStock = $quantityInStock;
    $this->buyPrice = $buyPrice;
    $this->MSRP = $MSRP;
  }

  public function readAll()
  {
    $sql = "SELECT
              productCode,
              productName,
              productLine,
              productScale,
              productVendor,
              productDescription,
              quantityInStock,
              buyPrice,
              MSRP
            FROM products";

    $res = $this->conn->query($sql);
    return $res->fetch_all();
  }

  public function readOne($name)
  {
    $sql = "SELECT
              productCode,
              productName,
              productLine,
              productScale,
              productVendor,
              productDescription,
              quantityInStock,
              buyPrice,
              MSRP
            FROM products WHERE productCode LIKE ? LIMIT 0,1";

    $res = $this->conn->prepare($sql);
    $res->bind_param("s", $name);
    $res->execute();
    $prod = $res->get_result()->fetch_assoc();
    $this->init($prod);
  }
}
