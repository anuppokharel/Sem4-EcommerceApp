<?php
    require_once 'sessionAdmin.php';
    require_once '../Functions.php';
    require_once '../Connection.php';

    $error = [];
    $products = [];
    $categories = [];

    try {
        $sql = "select tbl_products.*, tbl_categories.category_name from tbl_categories as tbl_categories join tbl_products on tbl_products.category_id = tbl_categories.id";

        // Query execution and return result object 

        $result = mysqli_query($connection, $sql);

        // Check no of rows

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($products, $row);
            }
        }
    } catch(Exception $e) {
        $error['database'] = $e -> getMessage();
    }
    
    try {
        $sql = "select * from tbl_categories";

        // Query execution and return result object 

        $result = mysqli_query($connection, $sql);

        // Check no of rows

        if(mysqli_num_rows($result) > 0) {
            while($category = mysqli_fetch_assoc($result)) {
                array_push($categories, $category);
            }
        }
    } catch(Exception $e) {
        $error['database'] = $e -> getMessage();
    }

    if(isset($_POST['submit'])) {
        if(updateForm($_POST, 'title')) {
            $title = $_POST['title'];
        } else {
            $error['title'] = 'Enter the title';
        }

        if(isset($_FILES['image'])) {
            if($_FILES['image']['error'] == 0) {
                if($_FILES['image']['size'] <= 10240000) {
                    $imageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                    if(in_array($_FILES['image']['type'], $imageTypes)) {
                        $image = uniqid() . '_' . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], '../images/product-img/' . $image);
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

        if(updateForm($_POST, 'category')) {
            $category = $_POST['category'];
        } else {
            $error['category'] = 'Enter the category';
        }
        
        if(updateForm($_POST, 'price')) {
            $price = $_POST['price'];
        } else {
            $error['price'] = 'Enter the price';
        }
        
        if(count($error) == 0) {
            try {
                $sql = "insert into tbl_products(title, image, category_id, price) values('$title', '$image', '$category', '$price');";
                
                if(mysqli_query($connection, $sql)) {
                    header('location: Products.php');
                }
                
            } catch(Exception $e) {
                $error['database'] = $e -> getMessage(); 
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
                <h3>List Products</h3><br>
                <table border="1">
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($products as $key => $data) { ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $data['title'] ?></td>
                            <td><img src="../images/product-img/<?php echo $data['image']; ?>" alt="" style="height: 150px; width: 250px; object-fit: contain;"></td>
                            <td><?php echo $data['category_name'] ?></td>
                            <td><?php echo $data['price'] ?></td>
                            <td style="text-align: center;"><?php echo $data['status'] ?></td>
                            <td>
                                <a href="unblock.php?id=<?php echo $data['id']; ?>&type=product" onclick="return confirm('Unblock the post?');">Unblock</a>
                                <a href="block.php?id=<?php echo $data['id']; ?>&type=product" onclick="return confirm('Block the post?');">Block</a><br>
                                <a href="delete.php?id=<?php echo $data['id']; ?>&type=product" onclick="return confirm('Delete the product post?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table><br>
                <h3>Add Products</h3><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="items title">
                        <label for="title">title</label><br>
                        <input type="text" name="title" id="title">
                    </div>
                    <?php echo displayError($error, 'title'); ?><br>
                    <div class="items image">
                        <label for="image">image</label><br>
                        <input type="file" name="image" id="image">
                    </div>
                    <?php echo displayError($error, 'image'); ?><br>
                    <div class="items category">
                        <select name="category" id="category" style="padding: 5px; 10px">
                            <option value="">Select the product category</option>
                            <?php foreach($categories as $key => $category) { ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php echo displayError($error, 'category'); ?><br>
                    <div class="items price">
                        <label for="price">price</label><br>
                        <input type="number" name="price" id="price">
                    </div>
                    <?php echo displayError($error, 'price'); ?><br>
                    <div class="items btnSubmit">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
                    <div class="error">
                        <?php echo displayError($error, 'database'); ?>
                        <?php echo displayError($error, 'submit'); ?>
                    </div>
                </form>
                <?php echo displayError($error, 'database'); ?>
            </div>
        </div>

        <!--- Footer --->
        
        <div class="footer">
            <center>
                <p>Copyright &copy DK </a> Store. All Rights Reserved.</p>
                <p>WELCOME</p>
            </center>
        </div>

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