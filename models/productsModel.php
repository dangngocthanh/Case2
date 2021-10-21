<?php

class productsModel
{
    private $DBConnect;

    public function __construct()
    {
        $conn = new DBConnection();
        $this->DBConnect = $conn->connect();
    }

    public function addProduct($product)
    {
        $sql = 'call addProduct(?,?,?,?,?,?)';

        $stmt = $this->DBConnect->prepare($sql);

        $stmt->bindParam(1, $product['name']);
        $stmt->bindParam(2, $product['information']);
        $stmt->bindParam(3, $product['quantity']);
        $stmt->bindParam(4, $product['price']);
        $stmt->bindParam(5, $product['image']);
        $stmt->bindParam(6, $product['brand']);

        $stmt->execute();
    }

    public function selectAllProducts()
    {
        $sql='select * from products';
        $stmt=$this->DBConnect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function deleteProduct($id)
    {
        $sql='delete from products where id=:id';
        $stmt=$this->DBConnect->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }


}