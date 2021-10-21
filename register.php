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
    <h3>Login</h3>
    <form method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="">Account</label>
            <input type="text" name="account" required class="form-control">
            <label for="">Password</label>
            <input type="password" name="password" required class="form-control">
            <label for="">Your Name</label>
            <input type="text" name="name" required class="form-control">
            <label for="">Email</label>
            <input type="email" name="email" required class="form-control">
            <label for="">Phone</label>
            <input type="text" name="phone" required class="form-control">
            <label for="">Address</label>
            <input type="text" name="address" required class="form-control">
            <label for="">Image</label>
            <input type="file" name="fileToUpload" id="fileToUpload" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
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
include_once 'models/usersModel.php';
include_once 'models/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user['account'] = $_POST['account'];
    $user['password'] = $_POST['password'];
    $user['name'] = $_POST['name'];
    $user['email'] = $_POST['email'];
    $user['phone'] = $_POST['phone'];
    $user['address'] = $_POST['address'];
    $user['image'] = $_FILES['fileToUpload']['name'];

    $check = 0;
    $upload = 1;
    $target_dir = __DIR__ . '/upload/' . $_FILES['fileToUpload']['name'];
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $upload = 0;
    }
    $file = $_FILES["fileToUpload"]["tmp_name"];
    if ($upload == 1) {
        if (move_uploaded_file($file, $target_dir)) {
//                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
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
            $addUser->addUser($user);
            header('location: login.php');

        } else {
            echo 'loi';
        }

    }

    CheckClassName($user,$check);
}
?>
