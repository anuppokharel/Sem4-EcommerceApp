<?php
    require 'Session.php';
    require 'Connection.php';

    error_reporting(0);

    if (isset($_GET['tokenCart']) && !($_GET['tokenCart'] === '')) {
        $total = $_GET['tokenCart'];
    } else {
        header('location: Index.php');
    }

    $cartItems = [];
    $id = $_SESSION['id'];

        try {
            $sql = "select * from tbl_cart_items where user_id = $id";
            $query = mysqli_query($connection, $sql);
            if (mysqli_num_rows($query) > 0) {
                while($cartItem = mysqli_fetch_assoc($query)) {
                    array_push($cartItems, $cartItem);
                }
            }
        } catch (Exception $e) {
            die($e -> getMessage());
        }

        foreach($cartItems as $key => $cartItem) {
            $productID = $cartItem['product_id'];
            try {
                $sql = "insert into tbl_cart_items_admin(product_id, user_id) values('$productID','$id')";
                $query = mysqli_query($connection, $sql);
                
            } catch (Exception $e) {
                die($e -> getMessage());
            }
        }
?>

<html>
    <head>
        <title>DK Online Shopping in Nepal</title>
        <link rel="stylesheet" href="Style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="header">
            <?php require 'Navigation.php'; ?>
        </div>

        <!-- Body  -->

        <div class="container">
            <div class="small-container">
                <div id="checkoutMsg">
                    <h1>Payment method is via Cash on Delivery only.<br>Your total is NRP <?php echo $total; ?>, You will recieve your product after 3 days. We will ring you. Thank you!</h1>
                    <a href="Clearcart.php?tokenClear=0"><button>Clear Cart</button></a>
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
        <script src="Script.js"></script>
    </body>
</html>