<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $cid= $_GET['cid'];
    $page= $_GET['page'];

    $sql = "DELETE FROM course WHERE CID = '$cid'";  
    $result = mysqli_query($conn, $sql);
    $sql = "DELETE FROM question WHERE CID = '$cid'";  
    $result = mysqli_query($conn, $sql);
    if($page == 'course')
        header("Location: ../course.php?");
    else if($page == 'mycourse')
        header("Location: ../mycourse.php?");
    mysqli_close($conn);
?>
