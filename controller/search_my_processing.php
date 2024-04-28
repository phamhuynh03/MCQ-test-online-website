<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $course = $_POST['Course_search'];
    $course = stripcslashes($course);
    $course = mysqli_real_escape_string($conn, $course);

    $sql = "SELECT * FROM course WHERE Course_name LIKE '%$course%'";
    $result = mysqli_query($conn, $sql);   
    $count = mysqli_num_rows($result);

    $_SESSION['Course_search'] = $course;
    $_SESSION['School_search'] = $school;
    $_SESSION['Teacher_search'] = $teacher;

    if($count > 0)
        $_SESSION['Check'] = True; 
    else
        $_SESSION['Check'] = False;
    header("Location: ../mycourse.php");
    mysqli_close($conn);
?>