<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }
    
    $xml = new DOMDocument();
    $xml->load('quiz.xml');
    $questions = $xml->getElementsByTagName('question');
    foreach ($questions as $question) {
        
        $qidreal = $question->getElementsByTagName('QIDreal')->item(0)->textContent;
        $img_link = $question->getElementsByTagName('img_link')->item(0)->textContent;
        $level = $question->getElementsByTagName('level')->item(0)->textContent;
        $Content = $question->getElementsByTagName('content')->item(0)->textContent;
        $A = $question->getElementsByTagName('A')->item(0)->textContent;
        $B = $question->getElementsByTagName('B')->item(0)->textContent;
        $C = $question->getElementsByTagName('C')->item(0)->textContent;
        $D = $question->getElementsByTagName('D')->item(0)->textContent;
        $correct_ans = $question->getElementsByTagName('correct_ans')->item(0)->textContent;

        // Prepare SQL statement (replace with your actual table structure)
        $sql = "UPDATE question
        SET Content='$Content',Img_link='$img_link' ,Level='$level', A='$A',B='$B',C='$C',  D='$D'   WHERE QID=$qidreal";
      
        // Execute the SQL statement and handle errors (optional)   
        if (mysqli_query($conn, $sql)) {
            
        } else {
          echo "Error inserting question: " . mysqli_error($conn); 
        }
      }
      header("Location: ../mycourse.php");
?>
