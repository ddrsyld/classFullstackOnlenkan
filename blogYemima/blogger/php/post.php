<?php 
include('../../config/connect.php');

if(!isset($_SESSION['users_id'])) {
    header('location: ../../login.php');
}

$check = array(
    " " => "-",
    ":" => "",
    "," => "",
    "." => "",
    "-" => "",
    "/" => "",
    "`" => "",
    "'" => "",
    '"' => "",
);

if(isset($_POST['action'])){
    $title = $_POST['title'];
    $slug = strtolower(strtr($title, $check));
    $users_id = $_SESSION['users_id'];
    $body = $_POST['body'];
    $date = date('y-m-d');

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    $image_file = strtolower(strtr($title, $check)) . ".jpg";

    if($_POST['action'] == 'add') {


        $query = mysqli_query($connect, "INSERT INTO post SET title='$title', slug='$slug', 
        users_id= '$users_id', body='$body', date='$date', image='$image_file'");



        copy($temp, "../../assets/img/post/" . $image_file);


        header('location: ../post.php');
    } elseif($_POST['action'] = 'update') {

        $id = $_POST['id'];
        if(!empty($image)) {
            $query = mysqli_query($connect, "UPDATE post SET title='$title', slug='$slug', 
            users_id= '$users_id', body='$body', date='$date', image='$image_file' 
            WHERE id='$id'");

        copy($temp, "../../assets/img/post/" . $image_file);
        } else {
            $query = mysqli_query($connect, "UPDATE post SET title='$title', slug='$slug', 
            users_id= '$users_id', body='$body', date='$date' WHERE id='$id'");
            
        }

        header('location: ../post.php');
    }
} elseif (isset($_GET['action'])){
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM post WHERE id = '$id'");
    header('location: ../post.php');
} else{
    header('../post.php');
}
?>