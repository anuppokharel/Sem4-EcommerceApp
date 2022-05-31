<?php
    require 'Session.php';
    require 'Connection.php';

    $token = $_GET['token'];

    $sql = "delete from tbl_cart_items where id = $token";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        header("location: My Cart.php");
    }
?>