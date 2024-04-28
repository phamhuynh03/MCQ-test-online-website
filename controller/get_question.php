<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }
    
    $course_id = $_GET['cid'];

    $sql = "SELECT * FROM question WHERE CID = '$course_id'";      
    $result = mysqli_query($conn, $sql); 
    $count = mysqli_num_rows($result);

    if($count > 0){
        $i = 0;
        header('Content-Type: application/xml');
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<questions>';
        while($row = mysqli_fetch_assoc($result)){
            $i++;
            echo '<question>';
            echo '<QID>' . $i . '</QID>';
            echo '<topic>' . $row['Topic'] . '</topic>';
            echo '<content>' . $row['Content'] . '</content>';
            echo '<img_link>' . $row['Img_link'] . '</img_link>';
            echo '<level>' . $row['Level'] . '</level>';
            echo '<A>' . $row['A'] . '</A>';
            echo '<B>' . $row['B'] . '</B>';
            echo '<C>' . $row['C'] . '</C>';
            echo '<D>' . $row['D'] . '</D>';
            echo '<correct_ans>' . $row['Correct_ans'] . '</correct_ans>';
            echo '</question>';
        }
        echo '</questions>';
    }
    mysqli_close($conn);
?>