<?php

class adminController
{

    function __construct()
    {
        $this->usersConnect = new usersModel();
        $this->productsConnect = new productsModel();
    }

    function UsersManager()
    {
        $users = $this->usersConnect->selectAllUsers();
        include('view/Admin/usersList.php');
    }

    function DeleteUser($id)
    {
        $this->usersConnect->deleteUser($id);
    }

    function DeleteProduct($id)
    {
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



}