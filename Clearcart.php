<?php
    require 'Session.php';
    require 'Connection.php';

    if (!(isset($_GET['tokenClear']) && $_GET['tokenClear'] == 0)) {
        header('location: Index.php');
    } else {
        $id = $_SESSION['id'];

        $sql = "delete from tbl_cart_items where user_id = $id";
        $query = mysqli_query($connection, $sql);

        header('location: Index.php');
    }
?>
