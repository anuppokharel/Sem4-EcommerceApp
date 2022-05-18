<?php
    require_once 'Functions.php';
    require_once 'Connection.php';

    $error = [];
    $products = [];
    $categories = [];

    try {
        $sql = "select tbl_products.*, tbl_categories.category_name from tbl_categories as tbl_categories join tbl_products on tbl_products.category_id = tbl_categories.id";

        // Query execution and return result object 

        $result = mysqli_query($connection, $sql);

        // Check no of rows

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($products, $row);
            }
        }
    } catch(Exception $e) {
        $error['database'] = $e -> getMessage();
    }

?>

<html>
    <head>
        <title>DK Online Shopping in Nepal</title>
        <link rel="stylesheet" href="Style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
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
                <h2 class="title">All Products</h2>
                <div class="row">
                    <?php foreach($products as $key => $product) { ?>
                        <a href="ProductsDetail.php?id=<?php echo $product['id']; ?>" target="blank" style="text-decoration: none; color: #000;">
                            <div class="col-4">
                                <img src="images/product-img/<?php echo $product['image']; ?>">
                                <div class="adInfo">
                                    <h4><?php echo $product['title']; ?></h4>
                                    <div id="adInfoInner">
                                        <p>NRP <?php echo $product['price']; ?></p>
                                        <p id="categoryTag"><?php echo $product['category_name']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Footer  -->
        
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