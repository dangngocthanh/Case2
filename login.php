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
<style>
    .card.col-12.col-md-6 {
        margin: auto;
        margin-top: 5%;
    }
</style>
<body>
<div class="container justify-content-center">
    <div class="card col-12 col-md-6">
        <h3 class="col-12 col-md-12 card-header">Login</h3>
        <form method="post" action="">
            <div class="form-group card-body ">
                <label for="">Account</label>
                <input type="text" name="account" required class="form-control">
                <label for="">Password</label>
                <input type="password" name="password" required class="form-control">
                <?php session_start(); $errol=$_SESSION['errol'] ?? null;
                    echo '<p style="color: crimson">'.$errol.'</p>'; ?>
            </div>
            <button type="submit" class="btn btn-success mb-3 ml-3">Login</button>
            <a type="submit" class=" mb-3 " style="margin-left: 350px" href="register.php">Register?</a>
        </form>
    </div>
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
    $account = $_POST['account'];
    $password = $_POST['password'];
    $login = new usersModel();
    $user = $login->login($account, $password);
    if (!empty($user)) {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('location: index.php');
    } else {
        $_SESSION['errol']='Wrong account or password';
    }
}
?>