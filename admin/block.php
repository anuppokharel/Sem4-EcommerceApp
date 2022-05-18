<?php
    require_once 'sessionAdmin.php';
    require_once '../Connection.php';

    // Get the id from the url and add onto variable

    $type = $_GET['type'];
    $token = $_GET['id'];

    try {
        // Selecting data and storing it into variable

        if($type == 'admin') {
            $sql = "update tbl_admins set status = 0 where id = $token";
        } else if($type == 'user') {
            $sql = "update tbl_users set status = 0 where id = $token";
        } else if($type == 'product') {
            $sql = "update tbl_products set status = 0 where id = $token";
        } else if($type == 'category') {
            $sql = "update tbl_categories set status = 0 where id = $token";
        }

        // Query execution

        mysqli_query($connection, $sql);
        
        // Redirecting to the original page

        if($type == 'product') {
            header('location: Products.php');
        } else if($type == 'category') {
            header('location: Categories.php');
        } else {
            header('location: Status.php');
        }
    } catch (Exception $e) {
        $error['database'] = $e -> getMessage();
    }
?>