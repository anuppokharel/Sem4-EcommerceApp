<?php
    require 'Session.php';
    require 'Functions.php';
    require 'Connection.php';

    $username = $_SESSION['username'];

    try {
        $sql = "select * from tbl_users where username = '$username'";

        // Query execution and return result object 

        $result = mysqli_query($connection, $sql);

        // Check no of rows

        if(mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
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

        <div class="profile-container">
            <div class="user-assets">
                <div class="user-info">
                    <div class="personal-info">
                        <h2>Personal Informations</h2>
                        <p>Name - <?php echo $user['name']; ?></p>
                        <p>Username - <?php echo $user['username']; ?></p>
                        <p>Email - <?php echo $user['email']; ?></p>
                        <p>Phone - <?php echo $user['phone']; ?></p>
                    </div>
                    <div class="address-info">
                        <h2>Address Informations</h2>
                        <p>Address - <?php echo $user['address']; ?></p>
                    </div>
                </div>
                <img src="images/profile-img/<?php echo $user['image']; ?>" alt="" id="profileImg" style="object-fit: cover;">
            </div>
                <button><a href="Logout.php">Logout</a></button>
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