<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $tid= $_SESSION['TID'];
    $oldpass = $_POST['Oldpass2'];
    $newpass = $_POST['Newpass2'];

    $oldpass = stripcslashes($oldpass);  
    $newpass = stripcslashes($newpass);
    $oldpass = mysqli_real_escape_string($conn, $oldpass);  
    $newpass = mysqli_real_escape_string($conn, $newpass);

    $sql = "SELECT Password FROM teacher WHERE TID = '$tid'";  
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if(!password_verify($oldpass, $row['Password']))
        header("Location: ../password_change.php?error=Mật khẩu của bạn bị sai!");
    else{
        $hashpass = password_hash($newpass, PASSWORD_DEFAULT);
        
        $sql = "UPDATE teacher SET Password = '$hashpass' WHERE TID = '$tid'";  
        $result = mysqli_query($conn, $sql);
        header("Location: ../password_change.php?success=Mật khẩu thay đổi thành công!");
    }
    mysqli_close($conn);
?>
