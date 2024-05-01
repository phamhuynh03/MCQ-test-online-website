<?php
    session_start();
    $Num_ques = $_SESSION['Num_ques'] ;
    $targetDir = "uploads/"; 
    $ti = $_SESSION['TID'];
    $cid = $_GET['cid'];

    $conn = mysqli_connect("localhost", "root", "", "assignment");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $topic=$_POST['topic'];
    for($i = 1; $i <= $Num_ques; $i++){
        $question=$_POST['qns'.$i.''];
        $imglink=$_POST['img'.$i.''];

        $a=$_POST[$i.'1'];
        $filename1='f'.$i .'1';
        if(!empty($_FILES[$filename1]["name"])){
            $fileName = basename($_FILES[$filename1]["name"]); 
            $a = $targetDir . $fileName; 
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);     
            move_uploaded_file($_FILES[$filename1]["tmp_name"], $a);

        }
        $b=$_POST[$i.'2'];
        $filename2='f'.$i .'2';
        if(!empty($_FILES[$filename2]["name"])){
            $fileName = basename($_FILES[$filename2]["name"]); 
            $b = $targetDir . $fileName; 
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);     
            move_uploaded_file($_FILES[$filename2]["tmp_name"], $b);

        }
        $c=$_POST[$i.'3'];
        $filename3='f'.$i .'3';
        if(!empty($_FILES[$filename3]["name"])){
            $fileName = basename($_FILES[$filename3]["name"]); 
            $c = $targetDir . $fileName; 
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);     
            move_uploaded_file($_FILES[$filename3]["tmp_name"], $c);

        }
        $d=$_POST[$i.'4'];
        $filename4='f'.$i .'4';
        if(!empty($_FILES[$filename4]["name"])){
            $fileName = basename($_FILES[$filename4]["name"]); 
            $d = $targetDir . $fileName; 
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);     
            move_uploaded_file($_FILES[$filename4]["tmp_name"], $d);

        }
        $ans=$_POST['ans'.$i.''];
        $level=$_POST['level'.$i.''];
            
        $sql = "INSERT INTO question (Topic,Content,Img_link, A, B, C, D, Correct_ans, Level,CID) 
        VALUES ('$topic', '$question', '$imglink', '$a', '$b', '$c', '$d','$ans','$level','$cid')";
        echo $targetFilePath;
        if(mysqli_query($conn, $sql))
            header("Location: ../mycourse.php");
        else
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
