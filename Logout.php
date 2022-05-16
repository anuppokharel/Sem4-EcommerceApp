<?php
    session_start();
    unset($_SESSION);
    session_destroy();
    setcookie('username', null, time() - 1);
    header('location: Index.php');
?>