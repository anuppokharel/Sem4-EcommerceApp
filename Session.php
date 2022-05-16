<?php    
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location: Account.php?msg=1');
    }
?>