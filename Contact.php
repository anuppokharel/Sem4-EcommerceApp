<?php
    require 'Functions.php';
    require 'Connection.php';

    // Setting variables empty string & error empty array.

    $error = [];
    $name = $email = $message = '';

    // Checking if the contact button is pressed and if it is pressed storing the form value onto variables.

    if(isset($_POST['contactBtn'])) {
        if(updateForm($_POST, 'name')) {
            $name = $_POST['name'];
        } else {
            $error['name'] = 'Enter your name';
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

        if(updateForm($_POST, 'message')) {
            $message = $_POST['message'];
        } else {
            $error['message'] = 'Enter your message';
        }

        // Inititalize the database queries

        if(count($error) == 0) {
            try {
                // Insert into database

                $sql = "insert into tbl_contact(name, email, message) values('$name', '$email', '$message');";

                // Query execution

                if(mysqli_query($connection, $sql)) {
                    $successMsg = 'You have successfully placed<br>
                    a new contact message.';
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
            <?php require 'Navigation.php'; ?>
        </div>

        <!-- Body  -->

        <div class="container">
            <div class="contact-container">
                <h1 style="text-align: center">Contact</h1>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div>
                        <label for="name">name</label><br>
                        <input type="text" name="name" id="name" style="height: 30px; width: 100%">
                    </div>
                    <?php echo displayError($error, 'name'); ?><br>
                    <div>
                        <label for="email">email</label><br>
                        <input type="email" name="email" id="email" style="height: 30px; width: 100%">
                    </div>
                    <?php echo displayError($error, 'email'); ?><br>
                    <div>
                        <label for="message">Message</label><br>
                        <textarea name="message" id="message" cols="50" rows="5"></textarea>
                    </div>
                    <?php echo displayError($error, 'message'); ?><br>
                    <div style="width: 100%; text-align: center;">
                        <button type="submit" name="contactBtn">Submit</button>
                    </div>
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