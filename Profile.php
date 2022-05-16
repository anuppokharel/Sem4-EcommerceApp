<?php
    require 'Session.php';
    require 'Functions.php';

    if(isset($_POST['logout'])) {
        require 'logout.php';
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

        <div class="profile-container">
            <div class="user-assets">
                <div class="user-info">
                    <div class="personal-info">
                        <h2>Personal Informations</h2>
                        <p>Name - Devaka Kc</p>
                        <p>Username - Devakakc09</p>
                        <p>Email - devaka@gmail.com</p>
                        <p>Phone - 9860693558</p>
                    </div>
                    <div class="address-info">
                        <h2>Address Informations</h2>
                        <p>Address - Hattidada, Pepsicola</p>
                    </div>
                </div>
                <img src="images/user-1.png" alt="" id="profileImg">
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
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