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
   
    
    
    
    $xml = new DOMDocument();
    $xml->load('quiz.xml');
    $questions = $xml->getElementsByTagName('question');
    foreach($questions as $question){
        $QID = $question->getElementsByTagName('QID')->item(0)->nodeValue;

        if($QID == $question_id) {
           if ($_GET['ansA']!='')
           {
            $ansA = $_GET['ansA'];
            $choosenElement = $question->getElementsByTagName('A')->item(0);
            $newElement = $xml->createElement('A', $ansA);
            $choosenElement->parentNode->replaceChild($newElement, $choosenElement);
           }    
           if ($_GET['ansB']!='')
           {
            $ansB = $_GET['ansB'];
            $choosenElement = $question->getElementsByTagName('B')->item(0);
            $newElement = $xml->createElement('B', $ansB);
            $choosenElement->parentNode->replaceChild($newElement, $choosenElement);
           }    
           if ($_GET['ansC']!='')
           {    
            $ansC = $_GET['ansC'];
            $choosenElement = $question->getElementsByTagName('C')->item(0);
            $newElement = $xml->createElement('C', $ansC);
            $choosenElement->parentNode->replaceChild($newElement, $choosenElement);
           } 
           if ($_GET['ansD']!='')
           {
            $ansD = $_GET['ansD'];
            $choosenElement = $question->getElementsByTagName('D')->item(0);
            $newElement = $xml->createElement('D', $ansD);
            $choosenElement->parentNode->replaceChild($newElement, $choosenElement);
           } 
           if ($_GET['ansContent']!='')
           {
            $ansContent = $_GET['ansContent'];
            $choosenElement = $question->getElementsByTagName('content')->item(0);
            $newElement = $xml->createElement('content', $ansContent);
            $choosenElement->parentNode->replaceChild($newElement, $choosenElement);
           } 
           if ($_GET['Correctans']!='')
           {
            $ansContent = $_GET['Correctans'];
            $choosenElement = $question->getElementsByTagName('correct_ans')->item(0);
            $newElement = $xml->createElement('correct_ans', $ansContent);
            $choosenElement->parentNode->replaceChild($newElement, $choosenElement);
           } 
        }
    }
    $xml->save('quiz.xml');
    header("Location: ../question_modify.php?name= + $course + &cid= + $course_id + &nq= + $num_ques + &qid= + $question_id");
    mysqli_close($conn);
?>
