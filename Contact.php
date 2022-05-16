<?php
    require 'Functions.php';

    // Setting variables empty string & error empty array.

    $error = [];
    $name = $email = $message = $password = '';

    // Checking if the contact button is pressed and if it is pressed storing the form value onto variables.

    if(isset($_POST['contact'])) {
        if(verifyForm($_POST, 'name')) {
            $name = $_POST['name'];

            // Checkin for regular expression match.

            if(!preg_match ("/^[a-z A-Z]+$/", $name)) {
                $error['name'] = 'Name must only contain characters and space';
            }
        } else {
            $error['name'] = 'Enter your name';
        }

        if(verifyForm($_POST, 'email')) {
            $email = $_POST['email'];

            // Validating email address.

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Enter validate email address';
            }
        } else {
            $error['email'] = 'Enter your email address';
        }

        if(verifyForm($_POST, 'message')) {
            $message = $_POST['message'];
        } else {
            $error['message'] = 'Enter your message';
        }

        if(verifyForm($_POST, 'password')) {

            // Encrypting password using md5 format.

            $password = md5($_POST['password']);
        } else {
            $error['password'] = 'Enter your password';
        }

        // Inititalize the database queries

        if(count($error) == 0) {
            try {
                // Database connection

                $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

                // Insert into database

                $sql = "insert into tbl_contact(name, email, message, password) values('$name', '$email', '$message', '$password');";

                // Query execution

                if(mysqli_query($connection, $sql)) {
                    $successMsg = 'You have successfully placed a new contact message.';
                }
            } catch(Exception $e) {
                $error['contact'] = $e -> getMessage();
            }
        }
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

        <div class="container">
            <div class="contact-container">
                <h1 style="text-align: center">Contact</h1>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="items name">
                        <label for="name">name</label><br>
                        <input type="text" name="name" id="name">
                    </div><br>
                    <?php echo displayError($error, 'name'); ?>
                    <div class="items email">
                        <label for="email">email</label><br>
                        <input type="email" name="email" id="email">
                    </div><br>
                    <?php echo displayError($error, 'email'); ?>
                    <div class="items message">
                        <label for="message">Message</label><br>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div><br>
                    <div class="items password">
                        <label for="password">password</label><br>
                        <input type="password" name="password" id="password">
                    </div><br>
                    <?php echo displayError($error, 'password'); ?>
                    <div class="items btnSubmit">
                        <br><button type="submit" name="contact">Contact</button>
                    </div><br>
                    <?php if(isset($successMsg)) { ?>
                        <b><span class="success"><?php echo $successMsg; ?></span></b>
                    <?php } ?>
                    <b><?php echo displayError($error, 'contact'); ?></b>
                </form>
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