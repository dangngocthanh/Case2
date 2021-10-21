<?php


class usersModel
{
    private $DBConnect;

    public function __construct()
    {
        $conn = new DBConnection();
        $this->DBConnect = $conn->connect();
    }

    public function addUser($user)
    {
        $sql = 'call addUser(?,?,?,?,?,?,?)';
        $stmt = $this->DBConnect->prepare($sql);

        $stmt->bindParam(1, $user['account']);
        $stmt->bindParam(2, $user['password']);
        $stmt->bindParam(3, $user['name']);
        $stmt->bindParam(4, $user['email']);
        $stmt->bindParam(5, $user['phone']);
        $stmt->bindParam(6, $user['address']);
        $stmt->bindParam(7, $user['image']);

        $stmt->execute();
    }

    public function login($account, $passwordd)
    {
        $sql = "SELECT * FROM users WHERE account=? and passwordd =?";
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $account);
        $stmt->bindParam(2, $passwordd);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
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
