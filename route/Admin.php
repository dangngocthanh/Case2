<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=usersManager">Users management </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=productsManager">Products Management</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
    </div>
</nav>
<?php
$page = $_REQUEST['page'] ?? null;
$admin = new adminController();
switch ($page) {
    case 'usersManager':
        $admin->UsersManager();
        break;
    case 'deleteUser':
        $id = $_REQUEST['id'] ;
        $admin->DeleteUser($id);
        header('location: index.php?page=usersManager');
        break;
    case 'productsManager':
        $admin->ProductsManager();
        break;
    case 'addProduct':
        $admin->AddProduct();
        break;
    case 'deleteProduct':
        $id = $_REQUEST['id'] ;
        $admin->DeleteProduct($id);
        header('location: index.php?page=productsManager');
        break;
//    case 'editProduct':
//        break;
    default:
        include_once 'view/Admin/home.php';
        break;
}
?>
