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

        <!--- About --->

        <div class="container">
            <div class="about-container">
                <div class="content_section">
                    <div class="about_title">
                        <h1>About Us</h1>
                    </div>
                    <div class="about_content">
                        <p>Lorem Ipsum has been the industry's standard
                        dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                        desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum has been the industry's standard
                        dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                        desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <div class="btn">
                            <a href="">Read More</a>
                        </div>
                        <div class="about_social">
                            <a href="https://www.facebook.com/anup.pokharel.703" target="blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/anup.pokharel/" target="blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com/anup_pokharel" target="blank"><i class="fab fa-twitter"></i></a>
                        </div>
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