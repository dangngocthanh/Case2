<?php

class ordersModel
{
    public function __construct()
    {
        $conn = new DBConnection();
        $this->DBConnect = $conn->connect();
    }

    function deleteProduct($id){
        $sql = 'delete from orders where productId=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    function addOrder($userId, $productId)
    {
        $sql = 'insert into orders(userId,productId) value(?,?)';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $userId);
        $stmt->bindParam(2, $productId);
        $stmt->execute();
    }

    public function deleteOrder($id)
    {
        $sql = 'delete from orders where id=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function deleteAccount($id)
    {
        $sql = 'delete from orders where userId=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function getById($id)
    {
        $sql = 'call showCart(?)';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buy($id)
    {
        $sql = 'select products.id as productId,products.image,products.name,products.brand,products.price
FROM orders JOIN products ON orders.productid=products.id WHERE orders.id=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

}