<?php

class adminController
{

    function __construct()
    {
        $this->usersConnect = new usersModel();
        $this->productsConnect = new productsModel();
        $this->ordersConnect = new ordersModel();
        $this->ordersHistory = new historyModel();
    }

    function UsersManager()
    {
        $users = $this->usersConnect->selectAllUsers();
        include('view/Admin/usersList.php');
    }

    function DeleteUser($id)
    {
        $this->ordersConnect->deleteAccount($id);
        $this->usersConnect->deleteUser($id);
    }

    function DeleteProduct($id)
    {
        $this->ordersConnect->deleteProduct($id);
        $this->productsConnect->deleteProduct($id);
    }

    function ProductsManager()
    {
        $products = $this->productsConnect->selectAllProducts();
        include('view/Admin/productsList.php');
    }

    function AddProduct()
    {
        header('location: addProducts.php');
    }

    function HomeList()
    {
        $products = $this->productsConnect->selectAllProducts();
        include('view/Admin/home.php');
    }

    function getById($id)
    {
        $product = $this->productsConnect->getById($id);
        include('view/Product.php');
    }

    function editProduct($id)
    {
        $product = $this->productsConnect->getById($id);
        include('view/Admin/editProduct.php');
    }

    function addOrder($userid, $productId)
    {
        $this->ordersConnect->addOrder($userid, $productId);
    }

    public function ordersHistory()
    {
        $products = $this->ordersHistory->showHistory();
        include 'view/Admin/soldProducts.php';
    }

    public function search($key)
    {
        $products = $this->productsConnect->search($key);
        include ('view/listHome.php');
    }

    public function deleteHistory($id)
    {
       $this->ordersHistory->deleteHistory($id);
    }

    function update()
    {
        $product['id'] = $_POST['id'];
        $product['name'] = $_POST['name'];
        $product['information'] = $_POST['information'];
        $product['quantity'] = $_POST['quantity'];
        $product['price'] = $_POST['price'];
        $product['brand'] = $_POST['brand'];
        $product['image'] = $_FILES['fileToUpload']['name'];

        $check = 0;
        $upload = 1;
        $target_dir = 'C:\xampp\htdocs\CaseStudy' . '/productsImg/' . $_FILES['fileToUpload']['name'];
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
        if (!empty($product['name'])) {
            $check++;
        }
        if (!empty($product['information'])) {
            $check++;
        }
        if (!empty($product['quantity'])) {
            $check++;
        }
        if (!empty($product['price'])) {
            $check++;
        }
        if (!empty($product['brand'])) {
            $check++;
        }
        if ($check == 6) {
            $this->productsConnect->editProduct($product);
            header('location: index.php?page=productsManager');
        } else {
            echo 'loi';
        }
    }


}