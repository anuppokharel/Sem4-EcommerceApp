<?php
    require 'Session.php';
    require 'Connection.php';
    
    $type = $_GET['type'];

    if((isset($_GET['token']) && isset($_GET['pID']) && $type == 'featured')) {
        $token = $_GET['token'];
        $productID = $_GET['pID'];

        try {
            $sql = "select * from tbl_cart_items where featured_product_id = $productID and user_id = $token";
            $query = mysqli_query($connection, $sql);
            if (mysqli_num_rows($query) > 0) {
                header("location: ProductsDetail.php?id=$productID&type=featured&msg=2");
            }
        } catch (Exception $e) {
            die($e -> getMessage());
        }

        try {
            $sql = "insert into tbl_cart_items(featured_product_id, user_id) values('$productID','$token')";
            $query = mysqli_query($connection, $sql);
            if ($query) {
                header("location: ProductsDetail.php?id=$productID&msg=1");
            }
        } catch (Exception $e) {
            die($e -> getMessage());
        }
    } elseif ((isset($_GET['token']) && isset($_GET['pID']))) {
        $token = $_GET['token'];
        $productID = $_GET['pID'];

        try {
            $sql = "select * from tbl_cart_items where product_id = $productID and user_id = $token";
            $query = mysqli_query($connection, $sql);
            if (mysqli_num_rows($query) > 0) {
                header("location: ProductsDetail.php?id=$productID&msg=2");
            }
        } catch (Exception $e) {
            die($e -> getMessage());
        }

        try {
            $sql = "insert into tbl_cart_items(product_id, user_id) values('$productID','$token')";
            $query = mysqli_query($connection, $sql);
            if ($query) {
                header("location: ProductsDetail.php?id=$productID&msg=1");
            }
        } catch (Exception $e) {
            die($e -> getMessage());
        }
    } else {
        header('location: Index.php');
    }
    
?>