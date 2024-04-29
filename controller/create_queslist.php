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

    $sql = "SELECT * FROM question WHERE CID = '$course_id'";      
    $result = mysqli_query($conn, $sql); 
    $count = mysqli_num_rows($result);

    if($count > 0){
        file_put_contents('quiz.xml', '');
        $xml = new DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = true;

        $questions = $xml->createElement('questions');
        $xml->appendChild($questions);
        $i = 0;

        while($row = mysqli_fetch_assoc($result)){
            $i++;
            $question = $xml->createElement('question');
            
            $qid = $xml->createElement('QID', $i);
            $question->appendChild($qid);

            $qid = $xml->createElement('QIDreal', $row['QID']);
            $question->appendChild($qid);
            
            $topic = $xml->createElement('topic', $row['Topic']);
            $question->appendChild($topic);
            
            $content = $xml->createElement('content', $row['Content']);
            $question->appendChild($content);
            
            $img_link = $xml->createElement('img_link', $row['Img_link']);
            $question->appendChild($img_link);
            
            $level = $xml->createElement('level', $row['Level']);
            $question->appendChild($level);
            
            $a = $xml->createElement('A', $row['A']);
            $question->appendChild($a);
            
            $b = $xml->createElement('B', $row['B']);
            $question->appendChild($b);
            
            $c = $xml->createElement('C', $row['C']);
            $question->appendChild($c);
            
            $d = $xml->createElement('D', $row['D']);
            $question->appendChild($d);
            
            $correct_ans = $xml->createElement('correct_ans', $row['Correct_ans']);
            $question->appendChild($correct_ans);

            $choosen = $xml->createElement('choosen', ' ');
            $question->appendChild($choosen);

            $questions->appendChild($question);
        }
        $xml->save('quiz.xml');
        header("Location: ../exam.php?name= + $course + &cid= + $course_id + &nq= + $num_ques + &qid=1");
    }
    mysqli_close($conn);
?>
