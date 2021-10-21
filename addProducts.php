<?php
include_once 'models/DBConnection.php';
include_once 'models/productsModel.php';
include_once 'controller/adminController.php';
session_start();
$role = $_SESSION['role'] ?? null;
$id = $_SESSION['id'] ?? null;
if ($role==1 or empty($id)) {
header('location: login.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3>Add Products</h3>
    <form method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="">Products name</label>
            <input type="text" name="name" required class="form-control">
            <label for="">Information</label>
            <input type="text" name="information" required class="form-control">
            <label for="">Quantity</label>
            <input type="number" name="quantity" required class="form-control">
            <label for="">Price</label>
            <input type="number" name="price" required class="form-control">
            <label for="">Image</label>
            <input type="file" name="fileToUpload" id="fileToUpload" required class="form-control">
            <label for="">Brand</label>
            <input type="text" name="brand" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product['name'] = $_POST['name'];
    $product['information'] = $_POST['information'];
    $product['quantity'] = $_POST['quantity'];
    $product['price'] = $_POST['price'];
    $product['brand'] = $_POST['brand'];
    $product['image'] = $_FILES['fileToUpload']['name'];
    echo $product['image'];

    $check = 0;
    $upload = 1;
    $target_dir = __DIR__ . '/productsImg/' . $_FILES['fileToUpload']['name'];
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

    function CheckClassName($product, $check)
    {
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
            $addProduct = new productsModel();
            $addProduct->addProduct($product);
            header('location: index.php?page=productsManager');

        } else {
            echo 'loi';
        }

    }

    CheckClassName($product, $check);
}
?>