<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_error();
        exit();
    }

    $getdata = $_GET['term'];

    $sql = "SELECT DISTINCT CONCAT(Last_name, ' ', First_name) AS Fullname FROM teacher WHERE CONCAT(Last_name, ' ', First_name) LIKE '$getdata%'";
    $result = mysqli_query($conn, $sql);
    $json_array = array();

    while($row = mysqli_fetch_assoc($result))
        $json_array[] = $row['Fullname'];
    echo json_encode($json_array);
    mysqli_close($conn);
?>