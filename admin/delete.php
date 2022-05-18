<?php
    require_once '../Session.php';
    require_once '../Functions.php';
    require_once '../Connection.php';

    $type = $_GET['type'];
    $token = $_GET['id'];

    try {
        if($type == 'admin') {
            $sql = "delete from tbl_admins where id = $token";
        } else if($type == 'user') {
            $sql = "delete from tbl_users where id = $token";
        } else if($type == 'product') {
            $sql = "delete from tbl_products where id = $token";
        } else if($type == 'category') {
            $sql = "delete from tbl_categories where id = $token";
        } else if($type == 'userPost') {
            $sql = "delete from tbl_forums where id = $token";
        }

        mysqli_query($connection, $sql);
        
        if($type == 'product') {
            header('location: Products.php');
        } else if($type == 'category') {
            header('location: Categories.php');
        } else {
            header('location: Status.php');
        }
    } catch(Exception $e) {
        $error['database'] = $e -> getMessage();
    }

    echo displayError($error, 'database');
?>