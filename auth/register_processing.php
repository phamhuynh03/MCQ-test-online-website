<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $firstname = $_POST['First_name'];
    $lastname = $_POST['Last_name'];
    $school = $_POST['School'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $firstname = stripcslashes($firstname);  
    $lastname = stripcslashes($lastname);
    $school = stripcslashes($school);  
    $email = stripcslashes($email);  
    $password = stripcslashes($password);
    $firstname = mysqli_real_escape_string($conn, $firstname);  
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $school = mysqli_real_escape_string($conn, $school);  
    $email = mysqli_real_escape_string($conn, $email);  
    $password = mysqli_real_escape_string($conn, $password);
    $hashpass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM teacher WHERE Email = '$email'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_assoc($result);  
    $count = mysqli_num_rows($result);

    if($count == 0){
        $sql = "INSERT INTO teacher (Email, Password, First_name, Last_name, School) VALUES ('$email', '$hashpass', '$firstname', '$lastname', '$school')";
        mysqli_query($conn, $sql);
        
        header("Location: login.php?success=Đăng ký thành công!");
    }
    else{
        $_SESSION['first'] = $firstname;
        $_SESSION['last'] = $lastname;
        $_SESSION['school'] = $school;
        $_SESSION['reg_mail'] = $email;
        $_SESSION['reg_pass'] = $password;
        $_SESSION['confirm_pass'] = $password;
        header("Location: register.php?error=Email này đã được sử dụng!");
    }
    mysqli_close($conn);
?>