<?php

class historyModel
{

    public function __construct()
    {
        $conn = new DBConnection();
        $this->DBConnect = $conn->connect();
    }

    function getById($id)
    {
        $sql = 'select * from history where userId=? order by historyId DESC limit 1';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function addHistory($user, $product)
    {
        $sql = 'call addHistory(?,?,?,?,?,?,?,?,?)';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $user['userId']);
        $stmt->bindParam(2, $user['image']);
        $stmt->bindParam(3, $user['account']);
        $stmt->bindParam(4, $user['name']);
        $stmt->bindParam(5, $product['productId']);
        $stmt->bindParam(6, $product['image']);
        $stmt->bindParam(7, $product['name']);
        $stmt->bindParam(8, $product['brand']);
        $stmt->bindParam(9, $product['price']);
        $stmt->execute();
    }

    function deleteAccount($id)
    {
        $sql = 'delete from history where userId=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    function showHistory()
    {
        $sql = 'select * from history order by userId ASC ';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getHistory($id)
    {
        $sql = 'select * from history where userId=? order by historyId DESC ';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteHistory($id)
    {
        $sql = 'delete from history where historyId=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

}
