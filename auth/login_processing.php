<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $email = stripcslashes($email);  
    $password = stripcslashes($password);
    $email = mysqli_real_escape_string($conn, $email);  
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM teacher WHERE Email = '$email'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_assoc($result);  
    $count = mysqli_num_rows($result);
    
    if($count == 1 && password_verify($password, $row['Password'])){
        $_SESSION['First_name'] = $row['First_name'];
        $_SESSION['TID'] = (string)$row['TID'];
        setcookie("user", $row['Email'], time() + (86400 * 30), "/");
        header("Location: ../index.php");
    }
    else{
        $_SESSION['login_email'] = $email;
        $_SESSION['login_pass'] = $password;
        header("Location: login.php?error=Your email and password do not match!");
    }
    mysqli_close($conn);
?>
