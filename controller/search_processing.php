<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $course = $_POST['Course_search'];
    $school = $_POST['School_search'];
    $teacher = $_POST['Teacher_search'];
    $course = stripcslashes($course);
    $school = stripcslashes($school);
    $teacher = stripcslashes($teacher);
    $course = mysqli_real_escape_string($conn, $course); 
    $school = mysqli_real_escape_string($conn, $school);
    $teacher = mysqli_real_escape_string($conn, $teacher);  

    $sql = "SELECT course.*, teacher.First_name, teacher.Last_name, teacher.School 
            FROM course JOIN teacher 
            ON course.TID = teacher.TID 
            WHERE course.Course_name LIKE '%$course%' AND teacher.School LIKE '%$school%' 
            AND CONCAT(teacher.Last_name, ' ', teacher.First_name) LIKE '%$teacher%'";
    $result = mysqli_query($conn, $sql);   
    $count = mysqli_num_rows($result);

    $_SESSION['Course_search'] = $course;
    $_SESSION['School_search'] = $school;
    $_SESSION['Teacher_search'] = $teacher;

    if($count > 0)
        $_SESSION['Check'] = True; 
    else
        $_SESSION['Check'] = False;
    header("Location: ../course.php");
    mysqli_close($conn);
?>