<?php
    require_once '../Connection.php';
    $orders = [];

        try {
            $sql = "select tbl_cart_items_admin.*,tbl_users.*, tbl_products.* from tbl_cart_items_admin as tbl_cart_items_admin join tbl_users on tbl_cart_items_admin.user_id = tbl_users.id join tbl_products on tbl_products.id = tbl_cart_items_admin.product_id";

            // Query execution and return result object 
    
            $result = mysqli_query($connection, $sql);
    
            // Check no of rows
    
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    array_push($orders, $row);
                }
            }
        } catch(Exception $e) {
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

        <div class="container">
            <div class="contact-container">
            <h3>List Products</h3><br>
                <table border="1">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Dispatch order</th>
                    </tr>
                    <?php foreach($orders as $key => $data) { ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $data['name'] ?></td>
                            <td><img src="../images/product-img/<?php echo $data['image']; ?>" alt="" style="height: 150px; width: 250px; object-fit: contain;"></td>
                            <td><?php echo $data['title'] ?></td>
                            <td style="text-align: center;"><?php echo $data['price'] ?></td>
                            <td style="text-align: center;">
                                <a href="release.php?id=<?php echo $data['user_id']; ?>&product=<?php echo $data['product_id']; ?>&type=order" onclick="return confirm('Do u want to dispatch the order?');">Dispatch</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <p style="text-align: center; margin: 25px 0 0 0"><b><?php if (count($orders) === 0) { echo 'No orders to dispatch'; } ?></b></p>
                
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