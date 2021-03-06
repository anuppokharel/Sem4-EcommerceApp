<?php
    require '../Functions.php';
    require '../Connection.php';

    // Collecting the values from form and storing it into variables by checking errors

    $error = [];
    
    if (isset($_POST['login'])) {
        // Collecting username from form
        
        if (updateForm($_POST, 'username')) {
            $username = trim($_POST['username']);
            if (strlen($username) < 4) {
                $error['username'] = 'Enter minimum 8 characters';
            }
        } else {
            $error['username'] = 'Enter your username';
        }
        // Collecting password from form

        if (updateForm($_POST, 'password')) {
            $password = $_POST['password'];
        } else {
            $error['password'] = 'Enter password';
        }
        // Initialize the database if there is no error 

        if (count($error) == 0) {
            try {
                $encpass = md5($password);

                $sql = "select * from tbl_admins where username = '$username' and password = '$encpass' and status = 1";

                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) == 1 ) {

                    $admin = mysqli_fetch_assoc($result);

                    // Initialize session

                    session_start();

                    // Store extra data into session

    				$_SESSION['username'] = $username;
                    $_SESSION['name'] = $admin['name'];
	    
                    // If check remember is selected store the data into cookie
		    
                    if (isset($_POST['remember'])) {
					    // Set cookie to store cookie value

					    setcookie('username', $username, time()+(7*24*60*60));
                    }
                    // Redirect to defined page
                
				    header('location: Dashboard.php');
                } else {
                    $error['login'] = 'Admin not found';
                }
				
            } catch (Exception $e) {
                // Catching any errors and storing it into variable e 

                $error['database'] = $e -> getMessage();
            }
        }
    }
?>

<html>
    <head>
        <title>DK Online Shopping in Nepal</title>
        <link rel="stylesheet" href="../Style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="header">
            <?php require '../Navigation.php' ?>
        </div>

        <!-- Body  -->

        <div class="container">
            <div class="account-container">
                <h1>Admin Login</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div>
                        <label for="username">username</label>
                        <input type="text" name="username" id="username" value="<?php echo isset($username) ? $username : ''; ?>" >
                    </div>
                    <?php echo displayError($error, 'username'); ?><br>

                    <div>
                        <label for="password">password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <?php echo displayError($error, 'password'); ?><br>

                    <input type="checkbox" name="remember" value="remember"> Remember me
                    <br><button type="submit" name="login">Login</button>

                    <!-- Error message -->

                    <br><?php echo displayError($error, 'login'); ?>
                    <?php echo displayError($error, 'database'); ?>

                    <!-- Logout message -->
                
                    <?php
                        if (isset($_GET['msg']) && $_GET['msg'] == 1) {
                            echo '<b><span class="error">Please login to continue</span></b>';
                        } else if (isset($_GET['msg']) && $_GET['msg'] == 2) {
                            echo '<span class="success">' . '<b>Logout successful</b>' . '</span>';
                        }
                    ?>

                    <br><span>Not Admin? <a href="../Account.php">User Login</a> </span>
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