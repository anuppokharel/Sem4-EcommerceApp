<?php
    // Including all the important pages

    require_once 'sessionAdmin.php';
    require_once '../Functions.php';
    require_once '../Connection.php';

    $error = [];
    $dataAdmins = [];
    $dataUsers = [];

    try {

        $sqla = "select * from tbl_admins";
        $sqlu = "select * from tbl_users";

        // Query execution and return result object 

        $resulta = mysqli_query($connection, $sqla);
        $resultu = mysqli_query($connection, $sqlu);

        // Check no of rows

        if(mysqli_num_rows($resulta) > 0) {
            while($rowa = mysqli_fetch_assoc($resulta)) {
                array_push($dataAdmins, $rowa);
            }
        }

        if(mysqli_num_rows($resultu) > 0) {
            while($rowu = mysqli_fetch_assoc($resultu)) {
                array_push($dataUsers, $rowu);
            }
        }
    } catch(Exception $e) {
        $error['database'] = $e -> getMessage();
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

        <div class="status-container">
            <div class="contact-container">
                <h3>Admin data</h3><br>
                <div class="admin">
                    <table border="1">
                        <tr>
                            <td>SN</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        <?php foreach($dataAdmins as $key => $data) { ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $data['name'] ?></td>
                                <td><?php echo $data['email'] ?></td>
                                <td><?php echo $data['status'] ?></td>
                                <td>
                                    <a href="unblock.php?id=<?php echo $data['id']; ?>&type=admin" onclick="return confirm('Unblock the admin?');">Unblock</a>
                                    <a href="block.php?id=<?php echo $data['id']; ?>&type=admin" onclick="return confirm('Block the admin?');">Block</a><br>
                                    <a href="delete.php?id=<?php echo $data['id']; ?>&type=admin" onclick="return confirm('Delete the admin informations?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div><br>
                <h3>User data</h3>
                <div class="user"><br>
                    <table border="1">
                        <tr>
                            <td>SN</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        <?php foreach($dataUsers as $key => $data) { ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $data['name'] ?></td>
                                <td><?php echo $data['email'] ?></td>
                                <td><?php echo $data['status'] ?></td>
                                <td>
                                    <a href="unblock.php?id=<?php echo $data['id']; ?>&type=user" onclick="return confirm('Unblock the user?');">Unblock</a>
                                    <a href="block.php?id=<?php echo $data['id']; ?>&type=user" onclick="return confirm('Block the user?');">Block</a><br>
                                    <a href="delete.php?id=<?php echo $data['id']; ?>&type=user" onclick="return confirm('Delete the user informations?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <?php echo displayError($error, 'database'); ?>
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