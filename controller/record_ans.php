<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "assignment");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ".mysqli_connect_error();
        exit();
    }

    $course = $_GET['name'];
    $course_id = $_GET['cid'];
    $num_ques = $_GET['nq'];
    $question_id = $_GET['qid'];
    $ans = $_GET['ans'];
    
    $xml = new DOMDocument();
    $xml->load('quiz.xml');
    $questions = $xml->getElementsByTagName('question');
    foreach($questions as $question){
        $QID = $question->getElementsByTagName('QID')->item(0)->nodeValue;

        if($QID == $question_id){
            $choosenElement = $question->getElementsByTagName('choosen')->item(0);
            $newElement = $xml->createElement('choosen', $ans);
            $choosenElement->parentNode->replaceChild($newElement, $choosenElement);    
        }
    }
    $xml->save('quiz.xml');
    header("Location: ../exam.php?name= + $course + &cid= + $course_id + &nq= + $num_ques + &qid= + $question_id");
    mysqli_close($conn);
?>