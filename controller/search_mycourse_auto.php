<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_error();
        exit();
    }

    $getdata = $_GET['term'];
    $tid = $_SESSION['TID'];

    $sql = "SELECT DISTINCT Course_name FROM course WHERE Course_name LIKE '$getdata%' AND TID = '$tid'";
    $result = mysqli_query($conn, $sql);
    $json_array = array();

    while($row = mysqli_fetch_assoc($result))
        $json_array[] = $row['Course_name'];
    echo json_encode($json_array);
    mysqli_close($conn);
?>