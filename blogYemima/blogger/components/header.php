<?php
include('../config/connect.php');

    if (!isset($_SESSION['users_id'])) {
        header('location: ../login.php');
    }

$user_logged = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM users WHERE id ='$_SESSION[users_id]'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Dev</title>
    <link rel="stylesheet" href="../assets/vendors/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container">
            <a href="" class="navbar-brand text-uppercase">Blog.Dev</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav gap-3 me-auto">
                    <li class="nav-items"><a href="." class="nav-link active">Dashboard</a></li>
                    <li class="nav-items"><a href="post.php" class="nav-link">Post</a></li>
                    <li class="nav-items"><a href="create-post.php" class="nav-link">Create Post</a></li>
                    <li class="nav-items"><a href="profile.php" class="nav-link">Profile</a></li>
                </ul>
                <ul class="navbar-nav gap-3">
                    <li class="nav-items">
                        <p class="nav-link active">Hi, <?= $user_logged['name'] ?></p>
                    </li>
                    <li class="nav-items"><a href="php/logout.php" class="nav-link">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    