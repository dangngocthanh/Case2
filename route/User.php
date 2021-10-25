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
                <a class="nav-link" href="index.php?page=profile">My Profile</a>
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
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=cart">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=ordersHistory">Products sold</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="index.php?page=search" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a href="index.php?page=logout">
            <button class="btn btn-outline-success ml-2 my-2 my-sm-0">Log out</button>
        </a>
    </div>
</nav>
<?php
$page = $_REQUEST['page'] ?? null;
$user = new userController();
switch ($page) {
    case 'cart':
        $id = $_SESSION['id'];
        $user->cartList($id);
        break;
    case 'ordersHistory':
        $id = $_SESSION['id'];
        $user->history($id);
        break;
    case 'detailProduct':
        $id = $_REQUEST['id'];
        $user->getById($id);
        break;
    case 'deleteOrder':
        $id = $_REQUEST['id'];
        $user->deleteOrder($id);
        break;
    case 'addOrder':
        $productId = $_REQUEST['id'];
        $userId = $_SESSION['id'];
        $user->addOrder($userId, $productId);
        header('location: index.php?page=cart');
        break;
    case 'buy':
        $orderId = $_REQUEST['id'];
//        $id=$_SESSION['id'];
        $user->buy($orderId);
        break;
    case 'home':
        $user->HomeList();
        break;
    case 'profile':
        $id = $_SESSION['id'];
        $user->Profile($id);
        break;
    case 'logout':
//        session_start();
        session_destroy();
        header('location: index.php');
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('location: index.php?');
            $user->update();
        } else {
            $id = $_SESSION['id'];
            $user->editProfile($id);
        }
        break;
    default:
        $search = $_REQUEST['search'] ?? null;
        if ($search == null) {
            $user->HomeList();
        } else {
            $user->search($search);
        };
        break;
}
include_once('view/footer.php')
?>

