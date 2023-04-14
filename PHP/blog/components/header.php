<?php
    include('config/connect.php');
    
    $user_logged = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM users WHERE id= '$_SESSION[user_id]'"));

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Blog Dev</title>
    <link rel="stylesheet" href="assets/vendors/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container">
            <a href="" class="navbar-brand text-uppercase">Blog.Dev</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav gap-3 mx-auto">
                    <li class="nav-items"><a href="."
                            class="nav-link <?= ($title == 'Homepage') ? 'active' : '' ?>">Home</a></li>
                    <li class="nav-items"><a href="."
                            class="nav-link <?= ($title == 'Detail') ? 'active' : '' ?>">Blog</a></li>
                    <li class="nav-items"><a href="." class="nav-link">Services</a></li>
                    <li class="nav-items"><a href="." class="nav-link">About Us</a></li>
                </ul>
                <ul class="navbar-nav gap-3">
                    <?php 
                        if(!isset($_SESSION['user_id'])){
                            ?>
                    <li class="nav-items"><a href="login.php" class="nav-link">Login</a></li>
                    <li class="nav-items"><a href="register.php"
                            class="btn btn-primary rounded-pill fw-medium px-4 py-2">Register</a></li>
                    <?php
                        } else {
                            ?>

                    <li class="nav-items">
                        <a href="blogger/" class="nav-link active">Hi, <?= $user_logged['name']?></a>
                    </li>
                    <li class="nav-items"><a href="php/logout.php" class="nav-link">Log Out</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>