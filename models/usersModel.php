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
        $sql = 'select * from users';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function deleteUser($id)
    {
        $sql = 'delete from users where id=:id';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function buy($id)
    {
        $sql = 'select users.id as userId,users.image,users.account,users.name FROM orders JOIN users ON orders.userId=users.id WHERE orders.id=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getById($id)
    {
        $sql = 'select * from users where id=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateUser($user)
    {
        $sql = 'update users set account=?,passwordd=?,name=?,phone=?,email=?,address=?,image=? where id=?';
        $stmt = $this->DBConnect->prepare($sql);
        $stmt->bindParam(1,$user['account']);
        $stmt->bindParam(2,$user['password']);
        $stmt->bindParam(3,$user['name']);
        $stmt->bindParam(4,$user['phone']);
        $stmt->bindParam(5,$user['email']);
        $stmt->bindParam(6,$user['address']);
        $stmt->bindParam(7,$user['image']);
        $stmt->bindParam(8,$user['id']);
        $stmt->execute();
    }
}
