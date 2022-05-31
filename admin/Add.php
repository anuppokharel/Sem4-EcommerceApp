<?php
    // Including all the important pages

    require_once 'sessionAdmin.php';
    require_once '../Functions.php';
    require_once '../Connection.php';

    // Setting variables empty string & error empty array.

    $error = [];
    $name = $email = $password = '';

    // Checking if the admin button is pressed and if it is pressed storing the form value onto variables.

    if(isset($_POST['addAdmin'])) {
        if(updateForm($_POST, 'name')) {
            $name = $_POST['name'];

            // Checkin for regular expression match.

            if(!preg_match ("/^[a-z A-Z]+$/", $name)) {
                $error['name'] = 'Name must only contain characters and space';
            }
        } else {
            $error['name'] = 'Enter your name';
        }
        
        if(updateForm($_POST, 'username')) {
            $username = $_POST['username'];

            // Checkin for regular expression match.

            if(!preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
                $error['username'] = 'Username must only contain characters and space';
            }
        } else {
            $error['username'] = 'Enter your username';
        }

        if(updateForm($_POST, 'email')) {
            $email = $_POST['email'];

            // Validating email address.

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Enter validate email address';
            }
        } else {
            $error['email'] = 'Enter your email address';
        }

        if(updateForm($_POST, 'password')) {

            // Encrypting password using md5 format.

            $password = md5($_POST['password']);
        } else {
            $error['password'] = 'Enter your password';
        }

        // Inititalize the database queries

        if(count($error) == 0) {
            try {
                $sql = "insert into tbl_admins(name, email, username, password) values('$name', '$email', '$username','$password');";

                // Query execution

                if(mysqli_query($connection, $sql)) {
                    $successMsg = 'You have successfully added a new admin.';
                }
            } catch(Exception $e) {
                $error['admin'] = $e -> getMessage();
            }
        }
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
                <h1 style="text-align: center">Add Admin</h1>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div>
                        <label for="name">name</label><br>
                        <input type="text" name="name" id="name" style="height: 30px; width: 100%">
                    </div>
                    <?php echo displayError($error, 'name'); ?><br>
                    <div>
                        <label for="username">username</label><br>
                        <input type="text" name="username" id="username" style="height: 30px; width: 100%">
                    </div>
                    <?php echo displayError($error, 'username'); ?><br>
                    <div>
                        <label for="email">email</label><br>
                        <input type="email" name="email" id="email" style="height: 30px; width: 100%">
                    </div>
                    <?php echo displayError($error, 'email'); ?><br>
                    <div>
                        <label for="password">password</label><br>
                        <input type="password" name="password" id="password" style="height: 30px; width: 100%">
                    </div>
                    <?php echo displayError($error, 'password'); ?><br>
                    <div>
                        <button type="submit" name="addAdmin">Add Admin</button>
                    </div>
                    <?php if(isset($successMsg)) { ?>
                        <span class="success"><?php echo $successMsg; ?></span>
                    <?php } ?>
                    <?php echo displayError($error, 'admin'); ?>
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
            >

            function menutoggle(){
            >
                {
    >
                }
                else
                {
    >
                }
            }
        </script>
    </body>
</html>