<?php
    require 'sessionAdmin.php';
    require '../Connection.php';

    if (!(isset($_GET['id']) && isset($_GET['product']))) {
        header('location: Dashboard.php');
    } else {
        $user_id = $_GET['id'];
        $product_id = $_GET['product'];

        $sql = "delete from tbl_cart_items_admin where user_id = $user_id and product_id = $product_id";
        $query = mysqli_query($connection, $sql);

        header('location: order.php');
    }
?>
