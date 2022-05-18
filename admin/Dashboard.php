<?php
    require_once 'sessionAdmin.php';
    require_once '../Functions.php';
    require_once '../Connection.php';

    $categories = [];
    $products = [];
    $users = [];
    $admins = [];

    try {
        $sql = "select * from tbl_categories";

        $query = mysqli_query($connection, $sql);

        if (mysqli_num_rows($query) > 0) {
            while($category = mysqli_fetch_assoc($query)) {
                array_push($categories, $category);
            }
        }

    } catch (Exception $e) {
        $error['database'] = $e -> getMessage();
    }

    try {
        $sql = "select * from tbl_products";

        $query = mysqli_query($connection, $sql);

        if (mysqli_num_rows($query) > 0) {
            while($product = mysqli_fetch_assoc($query)) {
                array_push($products, $product);
            }
        }

    } catch (Exception $e) {
        $error['database'] = $e -> getMessage();
    }

    try {
        $sql = "select * from tbl_users";

        $query = mysqli_query($connection, $sql);

        if (mysqli_num_rows($query) > 0) {
            while($user = mysqli_fetch_assoc($query)) {
                array_push($users, $user);
            }
        }
    } catch (Exception $e) {
        $error['database'] = $e -> getMessage();
    }

    try {
        $sql = "select * from tbl_admins";

        $query = mysqli_query($connection, $sql);

        if (mysqli_num_rows($query) > 0) {
            while($admin = mysqli_fetch_assoc($query)) {
                array_push($admins, $admin);
            }
        }

    } catch (Exception $e) {
        $error['database'] = $e -> getMessage();
    }
?>


<html>
    <head>
        <title>Admin Panel - DK Store</title>
        <link rel="stylesheet" href="../Style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="header">
            <?php require 'AdminNavigation.php'; ?>
        </div>

        <!-- Body  -->

        <div class="dashboard-container">
            <div class="small-container">
                <div class="content">
                    <div class="total">
                        <h3>Categories</h3>
                        <span><?php echo count($categories); ?></span>
                    </div>
                    <div class="total">
                        <h3>Products</h3>
                        <span><?php echo count($products); ?></span>
                    </div>
                    <div class="total">
                        <h3>Users</h3>
                        <span><?php echo count($users); ?></span>
                    </div>
                    <div class="total">
                        <h3>Admins</h3>
                        <span><?php echo count($admins); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!--- Footer --->
        
        <footer class="footer">
            <center>
                <p>Copyright &copy DK </a> Store. All Rights Reserved.</p>
                <p>WELCOME</p>
            </center>
        </footer>

        <!--- JS for toggle menu --->

        <script>
            var MenuItems = document.getElementById("menuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
                else
                {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
    </body>
</html>