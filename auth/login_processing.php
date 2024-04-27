<?php
    $sname= "localhost";
    $unmae= "root";
    $password = "";
    $db_name = "assignment";
    $conn = new mysqli($sname, $unmae, $password, $db_name);
    if ($conn->connect_error) {
        die( "Connection failed".$conn->connect_error); 
    }
    $Email = trim($_POST['email']);
    $Password = trim($_POST['password']);
    $sql = "SELECT * FROM teacher WHERE Email = '$Email' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows==1)
    {
        $row = $result->fetch_assoc();
        $storedPassword = $row['Password'];
        $First_name = $row['First_name'];
    if ($Password === $storedPassword) {
        session_start();
        $_SESSION['Email'] = $Email;
        $_SESSION['First_name'] = $First_name;
        setcookie("Email", $Email, time() + (86400 * 30), "/"); 
        header("Location: ");
        exit();
    } else {
        header("Location: login.php?error=incorrect_credentials");
        exit();
    }
    } else {
        header("Location: login.php?error=user_not_found");
        exit();
    }   
    $conn->close();
?>
