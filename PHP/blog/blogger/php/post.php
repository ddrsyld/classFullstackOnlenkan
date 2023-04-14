<?php 
include('../../config/connect.php');

if(!isset($_SESSION['user_id'])){
    header('location: ../../login.php');
}

$check = array(
    " " => "-",
    ":" => "-",
    "," => "-",
    "." => "-",
    "/" => "-",
    "'" => "-",
    '"' => "-"
);

if(isset($_POST['action'])) { // METHOD POST DIGUNAKAN UNTUK TAMBAH DATA DAN UPDATE DATA
    $title = $_POST['title'];
    $slug = strtolower(strtr($title, $check));
    $user_id = $_SESSION['user_id'];
    $body = $_POST['body'];
    $date = date('Y-m-d');

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    
    $image_file = strtolower(strtr($title, $check)) . ".jpg";

    if($_POST['action'] == 'add'){
        // jika action nya add maka akan dilakukan seperti perintah dibawah ini
        $query = mysqli_query($connect, "INSERT INTO post SET title='$title', slug='$slug', user_id='$user_id', body='$body', date='$date', image='$image_file'");

        copy($temp, "../../assets/img/post/" . $image_file);

        header('location: ../posts.php');

    } elseif ($_POST['action'] == 'update'){
        // jika action nya update maka akan dilakukan seperti perintah dibawah ini
        $id = $_POST['id'];

        if(!empty($image)){
            $query = mysqli_query($connect, "UPDATE post SET title='$title', slug='$slug', user_id='$user_id', body='$body', date='$date', image='$image_file' WHERE id='$id'");

            copy($temp, "../../assets/img/post/" . $image_file);

        } else {
            $query = mysqli_query($connect, "UPDATE post SET title='$title', slug='$slug', user_id='$user_id', body='$body', date='$date' WHERE id='$id'");
        }

        header('location: ../posts.php');
    }
}   elseif(isset($_GET['action'])) { // METHOD GET DIGUNKAN UNTUK HAPUS DATA
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM post WHERE id = '$id'");

    header('location: ../posts.php');

}   else {
    header('../posts.php');
}