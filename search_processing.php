<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", '', "lab_web");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $search = $_POST['Search'];

    $search = stripcslashes($search);
    $search = mysqli_real_escape_string($conn, $search);  

    $sql = "SELECT * FROM products WHERE Code LIKE '%$search%' OR Name LIKE '%$search%' OR Brand LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);   
    $count = mysqli_num_rows($result);

    $_SESSION['Search'] = $search;

    if($count > 0){
        $_SESSION['Check'] = $count; 
        header("Location: course.php");
    }
    else{
        header("Location: course.php?error=No courses found!");
    }
    mysqli_close($conn);
?>