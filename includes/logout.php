<?php session_start(); ?>
<?php 
    $_SESSION['user_name'] = null;
    $_SESSION['password'] = null;
    $_SESSION['first_name'] = null;
    $_SESSION['last_name'] = null;
    $_SESSION['role'] = null;

    header("Location: ../index.php");
?>