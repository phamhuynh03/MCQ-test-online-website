<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    } 
    
    $course = $_SESSION['Course_search'];
    $school = $_SESSION['School_search'];
    $teacher = $_SESSION['Teacher_search'];

    $sql = "SELECT course.*, teacher.First_name, teacher.Last_name, teacher.School 
            FROM course JOIN teacher 
            ON course.TID = teacher.TID 
            WHERE course.Course_name LIKE '%$course%' AND teacher.School LIKE '%$school%' 
            AND CONCAT(teacher.Last_name, ' ', teacher.First_name) LIKE '%$teacher%'";      
    $result = mysqli_query($conn, $sql); 
    $count = mysqli_num_rows($result);

    if($count > 0){
        header('Content-Type: application/xml');
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<courses>';
        while($row = mysqli_fetch_assoc($result)){
            echo '<course>';
            if(isset($_SESSION['TID'])){
                $tid = $_SESSION['TID'];
                if($row['TID'] == $tid)
                    echo '<checkTID>' . 'True' . '</checkTID>';
            }
            else
                echo '<checkTID>' . 'False' . '</checkTID>';
            echo '<course_name>' . $row['Course_name'] . '</course_name>';
            echo '<description>' . $row['Description'] . '</description>';
            echo '<num_ques>' . $row['Num_ques'] . '</num_ques>';
            echo '<teacher>' . $row['Last_name'] . ' ' . $row['First_name'] . '</teacher>';
            echo '<school>' . $row['School'] . '</school>';
            echo '</course>';
        }
        echo '</courses>';
    }
    mysqli_close($conn);
?>