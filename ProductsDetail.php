 <?php
    session_start();

    require 'Session.php';
    require 'Functions.php';
    require 'Connection.php';

    $product = [];
    $productId = $_GET['id'];

    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    }

    if (isset($type) && $type == 'featured') {
        try {
            $sql = "select tbl_featured_products.*,tbl_categories.category_name from tbl_featured_products join tbl_categories on tbl_featured_products.category_id = tbl_categories.id where tbl_featured_products.id = $productId";
    
            $query = mysqli_query($connection, $sql);
    
            if (mysqli_num_rows($query) == 1) {
                $product = mysqli_fetch_assoc($query);
                $type = 'featured';
            }
        } catch (Exception $e) {
            $error = $e -> getMessage();
        }   

    } else {
        try {
            $sql = "select tbl_products.*,tbl_categories.category_name from tbl_products join tbl_categories on tbl_products.category_id = tbl_categories.id where tbl_products.id = $productId";
    
            $query = mysqli_query($connection, $sql);
    
            if (mysqli_num_rows($query) == 1) {
                $product = mysqli_fetch_assoc($query);
            }
        } catch (Exception $e) {
            $error = $e -> getMessage();
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

        <div class="product-container">
            <div class="small-container">
                <div class="col-2">
                    <img src="images/product-img/<?php echo $product['image']; ?>" height="250px" width="500px" id="productImg" style="object-fit: contain;">
                    <p id="categoryTag"><?php echo $product['category_name']; ?></p>
                    <h1><?php echo $product['title']; ?></h1>
                    <p>NRP <?php echo $product['price']; ?></p>
                    <?php if (isset($_GET['msg'])) { ?>
                        <?php if (isset($_GET) && $_GET['msg'] == 1) { ?>
                            <span class="success"><b>Added to the cart</b></span>
                        <?php } else if (isset($_GET) && $_GET['msg'] == 2) { ?>
                            <span class="error"><b>Already added to the cart</b></span>
                        <?php }?>
                    <?php } ?>
                    
                    <br><button><a href="Add.php?token=<?php echo $_SESSION['id']; ?>&pID=<?php echo $product['id']; ?>&type=<?php if ($type == 'featured') { echo 'featured'; } ?>">Add To Cart</a></button>
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