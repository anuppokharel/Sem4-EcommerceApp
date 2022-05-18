<?php
    require_once '../Connection.php'; 

    session_start();

    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        try {
            $sql = "select * from tbl_admins where username = '$username';";
    
            $result = mysqli_query($connection, $sql);
    
            if(mysqli_num_rows($result) == 1) {
    
                $admin = mysqli_fetch_assoc($result);
    
                $_SESSION['name'] = $admin['name'];
                $checkedusername = $admin['username'];
    
                if(!isset($_SESSION['username'])) {
                    header('location: Dashboard.php');       
                }
            } else {
                $error['login'] = 'No admin found';
            }
        } catch(Exception $e) {
            die('Database connection error' . '<br>' . $e -> getMessage());
        }

        if($_SESSION['username'] == $checkedusername) {
        } else {
            header("location: ../Account.php?msg=1");
        }
    } else {
        header("location: ../Account.php?msg=1");
    }     
?>