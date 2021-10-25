<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">DNTshop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=usersManager">Users management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=productsManager">Products management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=ordersHistory">Products sold</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Brand
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?search=Macbook">Macbook</a>
                    <a class="dropdown-item" href="index.php?search=MSI">MSI</a>
                    <a class="dropdown-item" href="index.php?search=Dell">Dell</a>
                    <a class="dropdown-item" href="index.php?search=Microsoft">Microsoft</a>
                    <a class="dropdown-item" href="index.php?search=Acer">Acer</a>
                    <a class="dropdown-item" href="index.php?search=HP">HP</a>
                    <a class="dropdown-item" href="index.php?search=Gigabyte">Gigabyte</a>
                    <a class="dropdown-item" href="index.php?search=Avita">Avita</a>
                    <a class="dropdown-item" href="index.php?search=Fujitsu">Fujitsu</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="index.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a href="index.php?page=logout"><button class="btn btn-outline-success ml-2 my-2 my-sm-0" >Log out</button></a>
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
        $id = $_REQUEST['id'];
        $admin->DeleteUser($id);
        header('location: index.php?page=usersManager');
        break;
    case 'deleteHistory':
        $id=$_REQUEST['id'];
        $admin->deleteHistory($id);
        header('location: index.php?page=ordersHistory');
        break;
    case 'productsManager':
        $admin->ProductsManager();
        break;
    case 'addProduct':
        $admin->AddProduct();
        break;
    case 'deleteProduct':
        $id = $_REQUEST['id'];
        $admin->DeleteProduct($id);
        header('location: index.php?page=productsManager');
        break;
    case 'editProduct':
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $id = $_REQUEST['id'];
            $admin->EditProduct($id);}
        else {
            $admin->update();
        }
        break;
    case 'detailProduct':
        $id = $_REQUEST['id'];
        $admin->getById($id);
        break;
    case 'addOrder':
        $productId = $_REQUEST['id'];
        $userId = $_SESSION['id'];
        $admin->addOrder($userId, $productId);
        header('location: index.php?page=home');
        break;
    case 'ordersHistory':
        $admin->ordersHistory();
        break;
    case 'logout':
//        session_start();
        session_destroy();
        header('location: index.php');
        break;
    default:
        $search=$_REQUEST['search'] ?? null;
        if ($search == null){
            $admin->HomeList();
        }else {
            $admin->search($search);
        };
        break;
}
include_once('view/footer.php')
?>