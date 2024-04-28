<?php
    session_start();
    if(isset($_SESSION['First_name']) && $_SESSION['First_name']!="")
        session_unset();
    session_destroy();
    setcookie("user", "", time() - (86400 * 30));
    header("Location: ../index.php");
?>