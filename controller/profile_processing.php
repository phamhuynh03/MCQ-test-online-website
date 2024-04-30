<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $tid= $_SESSION['TID'];
    $email = $_POST['Email'];
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $school = $_POST['School'];

    $email = stripcslashes($email);  
    $firstname = stripcslashes($firstname);
    $lastname = stripcslashes($lastname);
    $school = stripcslashes($school);
    $email = mysqli_real_escape_string($conn, $email); 
    $firstname = mysqli_real_escape_string($conn, $firstname); 
    $lastname = mysqli_real_escape_string($conn, $lastname);  
    $school = mysqli_real_escape_string($conn, $school);

    $sql = "SELECT * FROM teacher WHERE TID = '$tid'";  
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $email_old = $row['Email'];
    $firstname_old = $row['First_name'];
    $lastname_old = $row['Last_name'];
    $school_old = $row['School'];
    
    if($email == $email_old){
        if(($firstname == $firstname_old) && ($lastname == $lastname_old) && ($school == $school_old))
            header("Location: ../profile.php");
        else{
            $sql = "UPDATE teacher SET First_name = '$firstname', Last_name = '$lastname', School = '$school' WHERE TID = '$tid'";  
            $result = mysqli_query($conn, $sql);

            $_SESSION['First_name'] = $firstname;
            header("Location: ../profile.php?success=Successful change!");
        }
    }
    else if($email != $email_old){
        $sql = "SELECT TID FROM teacher WHERE Email = '$email'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_assoc($result);  
        $count = mysqli_num_rows($result);

        if($count > 0)
            header("Location: ../profile.php?error=Email already exists!");
        else{
            $sql = "UPDATE teacher SET Email = '$email' WHERE TID = '$tid'";  
            $result = mysqli_query($conn, $sql);
            
            if(($firstname != $firstname_old) || ($lastname != $lastname_old) || ($school != $school_old)){   
                $sql = "UPDATE teacher SET First_name = '$firstname', Last_name = '$lastname', School = '$school' WHERE TID = '$tid'";  
                $result = mysqli_query($conn, $sql);

                $_SESSION['First_name'] = $firstname;
            }
            header("Location: ../profile.php?success=Successful change!");
        }
    }
    mysqli_close($conn);
?>
