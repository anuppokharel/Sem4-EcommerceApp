<?php
    require 'Functions.php';
    require 'Connection.php';

    // Collecting the values from form and storing it into variables by checking errors

    $error = [];
    $name = $username = $email = $password = $address = $phone = $gender = "";

    if (isset($_POST['submit'])) {
        if (updateForm($_POST, 'name')) {
            $name = $_POST['name'];
            if(!preg_match ("/^[a-z A-Z]+$/", $name)) {
                $error['name'] = "Name must only contain letters.";
            }
        } else {
            $error['name'] = "Enter your name.";
        }
        
        if (updateForm($_POST, 'username')) {
            $username = $_POST['username'];
        } else {
            $error['username'] = "Enter your username.";
        }

        if (updateForm($_POST, 'email')) {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Enter validate E-Mail.";
            }
        } else {
            $error['email'] = "Enter your E-Mail address.";
        }

        // Encrypting password using md5

        if (updateForm($_POST, 'password')) {
            $password = md5($_POST['password']);
        } else {
            $error['password'] = "Enter your password";
        }

        if (updateForm($_POST, 'address')) {
            $address = $_POST['address'];
        } else {
            $error['address'] = "Enter your address.";
        }

        if (updateForm($_POST, 'phone')) {
            $phone = $_POST['phone'];
        } else {
            $error['phone'] = "Enter your phone.";
        }

        if (updateForm($_POST, 'gender')) {
            $gender = $_POST['gender'];
        } else {
            $error['gender'] = "Select your Gender.";
        }

        if(isset($_FILES['image'])) {
            if($_FILES['image']['error'] == 0) {
                if($_FILES['image']['size'] <= 10240000) {
                    $imageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                    if(in_array($_FILES['image']['type'], $imageTypes)) {
                        $image = uniqid() . '_' . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], 'images/profile-img/' . $image);
                    } else {
                        $error['image'] = 'Upload valid image type';
                    }
                } else {
                    $error['image'] = 'Upload less then 512kb image';
                }   
            } else {
                $error['image'] = 'Upload valid image';
            }
        } else {
            $error['image'] = 'Upload image';
        }
        
        // If there is no error then initialize process to store the data from form to database table

        if(count($error) == 0) {
            try {
                $sql = "insert into tbl_users (name, username, email, password, address, phone, gender, image) values ('$name', '$username', '$email', '$password', '$address', '$phone', '$gender', '$image');";

                // Query execution

                if (mysqli_query($connection, $sql)) {
                    $successmsg = 'You have successfully registered.';
                    $name = $username = $email = $password = $address = $phone = $gender = "";
                }

            } catch (Exception $e) {
                $error['register'] = $e -> getMessage();
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
            <?php require 'Navigation.php'; ?>
        </div>

        <!-- Body  -->

        <div class="container">
            <div class="account-container">
                <h1>Register</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </div>
                    <?php echo displayError($error, 'name'); ?><br>
                    
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?php echo $username; ?>">
                    </div>
                    <?php echo displayError($error, 'username'); ?><br>

                    <div>
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <?php echo displayError($error, 'email'); ?><br>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password">
                    </div>
                    <?php echo displayError($error, 'password'); ?><br>

                    <div>
                        <label for="address">Address</label>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                    </div>
                    <?php echo displayError($error, 'address'); ?><br>

                    <div>
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" value="<?php echo $phone; ?>">
                    </div>
                    <?php echo displayError($error, 'phone'); ?><br>

                    <div>
                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" value="Male" <?php if($gender == "Male") { echo "checked";} ?>>Male
                        <input type="radio" name="gender" value="Female" <?php if($gender == "Female") { echo "checked";} ?>>Female
                        <input type="radio" name="gender" value="Others" <?php if($gender == "Others") { echo "checked";} ?>>Others
                    </div>
                    <?php echo displayError($error, 'gender'); ?><br>

                    <div style="display:flex; flex-direction:column;">
                        <label for="image" style="margin: 0 0 10px -185px">Profile Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <?php echo displayError($error, 'image'); ?><br>

                    <button type="submit" name="submit">Register</button>

                    <!-- Error message -->

                    <br><?php echo displayError($error, 'register'); ?>

                    <!-- Registered Message -->

                    <?php if (isset($successmsg)) { ?>
                        <h3 class="success" style="margin-top: 5px"><?php echo $successmsg; ?></h3>
                    <?php } ?>

                    <br><span>Already a member? <a href="Account.php">Log In</a> </span>
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