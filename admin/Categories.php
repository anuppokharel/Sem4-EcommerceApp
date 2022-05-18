<?php
    require_once 'sessionAdmin.php';
    require_once '../Functions.php';
    require_once '../Connection.php';
    
    $error = [];
    $categories = [];
    $title = '';

    if(isset($_POST['submit'])) {
        if(updateForm($_POST, 'title')) {
            $title = $_POST['title'];
        } else {
            $error['title'] = 'Enter the title';
        }
        
        if(count($error) == 0) {
            try {
                $sql = "insert into tbl_categories(category_name) values('$title');";
                
                if(mysqli_query($connection, $sql)) {
                    $successMsg = 'Added Category';
                }
                
            } catch(Exception $e) {
                $error['database'] = $e -> getMessage(); 
            }
        }
    }

    try {
        $sql = "select * from tbl_categories";
        
        $result = mysqli_query($connection, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($categories, $row);
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
        <meta name="port" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="header">
            <?php require 'AdminNavigation.php'; ?>
        </div>

        <!-- Body  -->

        <div class="container">
            <div class="contact-container">
                <h3>View Categories</h3><br>
                <table border="1">
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($categories as $key => $data) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $data['category_name']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                                <a href="unblock.php?id=<?php echo $data['id']; ?>&type=category" onclick="return confirm('Unblock category?');">Unblock</a>
                                <a href="block.php?id=<?php echo $data['id']; ?>&type=category" onclick="return confirm('Block category?');">Block</a><br>
                                <a href="delete.php?id=<?php echo $data['id']; ?>&type=category" onclick="return confirm('Delete category?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table><br>
                <h3>Add Category</h3><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="items title">
                        <label for="title">Title</label><br>
                        <input type="text" name="title" id="title">
                    </div>
                    <?php echo displayError($error, 'title'); ?><br>
                    <div class="items btnSubmit">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
                    <div class="error">
                        <?php echo displayError($error, 'database'); ?>
                        <?php echo displayError($error, 'submit'); ?>
                    </div>
                    <div class="success">
                        <?php if(isset($successMsg)) { ?>
                            <b><span class="success"><?php echo $successMsg; ?></span></b>
                        <?php } ?>
                    </div>
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