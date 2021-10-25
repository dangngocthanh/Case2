<?php

class userController
{
    function __construct()
    {
        $this->usersConnect = new usersModel();
        $this->productsConnect = new productsModel();
        $this->ordersConnect = new ordersModel();
        $this->ordersHistory = new historyModel();
    }

    function cartList($id)
    {
        $products = $this->ordersConnect->getById($id);
        include('view/user/cart.php');
    }

    function HomeList()
    {
        $products = $this->productsConnect->selectAllProducts();
        include('view/listHome.php');
    }

    public function search($key)
    {
        $products = $this->productsConnect->search($key);
        include('view/listHome.php');
    }

    function getById($id)
    {
        $product = $this->productsConnect->getById($id);
        include('view/Product.php');
    }

    function addOrder($userid, $productId)
    {
        $this->ordersConnect->addOrder($userid, $productId);
    }

    function buy($orderId)
    {
        $product = $this->ordersConnect->buy($orderId);
        $user = $this->usersConnect->buy($orderId);
//        var_dump($user);
//        echo '<br>';
//        var_dump($product);
//        die();
        $this->ordersHistory->addHistory($user, $product);
        $this->ordersConnect->deleteOrder($orderId);
        header('location: index.php?page=cart');

    }

    public function history($id)
    {
        $products=$this->ordersHistory->getHistory($id);
        include ('view/user/history.php');
    }

    public function deleteOrder($id)
    {
        $this->ordersConnect->deleteOrder($id);
        header('location: index.php?page=cart');
    }

    public function editProfile($id){
        $data=$this->usersConnect->getById($id);
        $product=$this->ordersHistory->getById($id);
        include  ('view/edit.php');
    }

    public function Profile($id){
        $data=$this->usersConnect->getById($id);
        $product=$this->ordersHistory->getById($id);
        include  ('view/profile.php');
    }

    function update()
    {
        $user['id'] = $_POST['id'];
        $user['name'] = $_POST['name'];
        $user['account'] = $_POST['account'];
        $user['password'] = $_POST['password'];
        $user['email'] = $_POST['email'];
        $user['phone'] = $_POST['phone'];
        $user['address'] = $_POST['address'];
        $user['image'] = $_FILES['fileToUpload']['name'];

        $check = 0;
        $upload = 1;
        $target_dir = 'C:\xampp\htdocs\CaseStudy' . '/upload/' . $_FILES['fileToUpload']['name'];
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $upload = 0;
        }
        $file = $_FILES["fileToUpload"]["tmp_name"];

        if ($upload == 1) {
            if (move_uploaded_file($file, $target_dir)) {
                $check++;
            }

        }
        function CheckClassName($user,$check)
        {
            $account = '/[_\w]{6,50}/';
            $email = '/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/';
            $phone = '/^0\d{9}/';
            if (preg_match($account, $user['account'])) {
                $check++;
            }
            if (preg_match($email, $user['email'])) {
                $check++;
            }
            if (!empty($user['name'])) {
                $check++;
            }
            if (preg_match($phone, $user['phone'])) {
                $check++;
            }
            if (!empty($user['password'])) {
                $check++;
            }
            if (!empty($user['address'])) {
                $check++;
            }
            if ($check == 7) {
                $addUser = new usersModel();
                $addUser->updateUser($user);
                header('location: index.php?page=profile');
            } else {
                echo 'loi';
            }

        }

        CheckClassName($user,$check);
    }

}