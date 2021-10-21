<?php

class adminController
{

    function __construct()
    {
        $this->adminConnect = new adminModel();
    }

    function ProductManager()
    {
        $users = $this->adminConnect->selectAllUsers();
        include('view/Admin/usersList.php');
    }
    function DeleteUser($id)
    {
         $this->adminConnect->deleteUser($id);
    }

}