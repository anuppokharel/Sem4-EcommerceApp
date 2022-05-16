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
                <!--- Featured Products --->

                <h2 class="title">Featured Products</h2>
                <div class="row">
                    <a href="ProductsDetail.php" target="blank" style="text-decoration: none; color: #000;">
                        <div class="col-4">
                            <img src="Images/product-1.jpg">
                            <div class="adInfo">
                                <!-- Max character 40 words  -->
                                <h4>Grey Floral Printed King Size Bedsheet With 2</h4>
                                <div id="adInfoInner">
                                    <p>NRP 1,250</p>
                                    <p id="categoryTag">Electronics</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!--- Latest Product -->

                <h2 class="title">Latest Products</h2>
                <div class="row">
                    <a href="ProductDetails.php" target="blank" style="text-decoration: none; color: #000;">
                        <div class="col-4">
                            <img src="Images/product-5.jpg">
                            <div class="adInfo">
                                <!-- Max character 40 words  -->
                                <h4>Digicom Usb Wifi Adapter</h4>
                                <div id="adInfoInner">
                                    <p>NRP 1,250</p>
                                    <p id="categoryTag">Electronics</p>
                                </div>
                            </div>
                        </div>
                    <a/>
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