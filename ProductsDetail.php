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
            <div class="navbar">
                <div class="logo">
                    <a href="Index.php"><h1>DK Store</h1></a>
                </div>
                <div class="navigation">
                    <nav>
                        <ul class="menuItems">
                            <li><a href="Index.php">Home</a></li>
                            <li><a href="Products.php">Products</a></li>
                            <li><a href="About.php">About</a></li>
                            <li><a href="Contact.php">Contact</a></li>
                            <li><a href="Account.php">Account</a></li>
                        </ul>
                    </nav>
                    <a href="My Cart.php" class="myCart"><i class="fas fa-shopping-cart"></i></a>
                    <a href="" class="menu-icon"><i class="fas fa-bars"></i></a>
                </div>
            </div>
        </div>

        <!-- Body  -->

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