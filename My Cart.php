<?php
    session_start();

    require 'Connection.php';
    require 'Functions.php';

    $cartItems = [];
    $productPrices = [];
    
    if (isset($_SESSION['id'])) {
        $token = $_SESSION['id'];
        try {
            $sql = "select * from tbl_cart_items where user_id = $token";
            $query = mysqli_query($connection, $sql);
            if (mysqli_num_rows($query) > 0) {
                while($cartItem = mysqli_fetch_assoc($query)) {
                    array_push($cartItems, $cartItem);
                }
            }
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

            <div class="cart-container">
                <div class="small-container">
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php foreach($cartItems as $key => $cartItem) { ?>
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <?php
                                            if (!$cartItem['product_id'] == '') {
                                                $productID = $cartItem['product_id'];
                                                $sql = "select * from tbl_products where id = $productID";
                                                $query = mysqli_query($connection, $sql);
                                                $product = mysqli_fetch_assoc($query);
                                            } else {
                                                $productID = $cartItem['featured_product_id'];
                                                $sql = "select * from tbl_featured_products where id = $productID";
                                                $query = mysqli_query($connection, $sql);
                                                $product = mysqli_fetch_assoc($query);
                                            }
                                        ?>
                                        <img src="images/product-img/<?php echo $product['image']; ?>">
                                        <div>
                                            <h4><?php echo $product['title']; ?></h4>
                                            <small>Price: NRP <?php echo $product['price']; ?></small>
                                            <br>
                                            <a href="Remove.php?token=<?php echo $cartItem['id']; ?>">Remove</a>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="number" value="1"></td>
                                <td>NRP <?php echo $product['price']; ?></td>   
                                <?php $productPrices[] =  $product['price']; ?>
                            </tr>
                        <?php } ?>
                    </table>
                    <div class="total-price">
                        <table style="width: 350px; margin-top: 5px;">
                            <tr>
                                <td>Subtotal</td>
                                <td>NRP <?php echo array_sum($productPrices); ?></td>
                            </tr>
                            <tr>
                                <td>Delivery</td>
                                <td>
                                    <?php
                                    if (isset ($productPrices) && count($productPrices) > 0) {
                                        echo 'NRP ' . 100;
                                    } else {
                                        echo 'NRP ' . 0;
                                    }
                                    ?>
                                
                                </td>
                            </tr>
                            <tr style="border-top: 1.5px solid grey">
                                <td>Total</td>
                                <td>
                                    <?php
                                    if (isset ($productPrices) && count($productPrices) > 0) {
                                        echo 'NRP ' . $total = array_sum($productPrices) + 100;
                                    } else {
                                        echo 'NRP ' . 0;
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="checkoutBtn">
                        <a href="Checkout.php?tokenCart=<?php echo $total ?>"><button>Checkout</button></a>
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
            console.log(priceArray);

        </script>
        <script src="Scripts.js"></script>
    </body>
</html>