<?php

class adminModel
{
    function __construct()
    {
        $conn = new DBConnection();
        $this->DBConnect = $conn->connect();
    }

    function selectAllUsers()
    {
        $sql='select * from users';
        $stmt=$this->DBConnect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function deleteUser($id)
    {
        $sql='delete from users where id=:id';
        $stmt=$this->DBConnect->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
}