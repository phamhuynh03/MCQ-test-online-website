<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }
    $Course_name = $_POST['name'];
    $Num_ques = $_POST['total'];
    $Description = $_POST['desc'];
    $ti = $_SESSION['TID'];

    $Course_name = stripcslashes($Course_name);  
    $Num_ques = stripcslashes($Num_ques);  
    $Description = stripcslashes($Description);

    $sql = "INSERT INTO course (Course_name, Num_ques, TID, Description) VALUES ('$Course_name', '$Num_ques', '$ti', '$Description')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['Num_ques'] = $Num_ques;

        $sql = "SELECT LAST_INSERT_ID()";
        $result = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_array($result);
        $count = $row[0];
        header("Location: ../addquestion.php?cid=$count");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>