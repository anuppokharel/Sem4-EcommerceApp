<?php
    session_start();
?>

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
                <li>
                    <?php if(isset($_SESSION['username'])) { ?>
                        <a href="Profile.php">Profile</a>                    
                        <?php } else { ?>
                            <a href="Account.php">Account</a>                            
                    <?php } ?>
                </li>
            </ul>
        </nav>
        <a href="My Cart.php" class="myCart"><i class="fas fa-shopping-cart"></i></a>
        <a href="My Cart.php"><p id="myCartNumber" style="letter-spacing: 1px">0</p></a>
        <a href="" class="menu-icon"><i class="fas fa-bars"></i></a>
    </div>
</div>