<?php
    $course = $_GET['name'];
    $course_id = $_GET['cid'];
    $num_ques = $_GET['nq'];
    $num_correct = 0;

    $xml = new DOMDocument();
    $xml->load('./controller/quiz.xml');
    $questions = $xml->getElementsByTagName('question');
    foreach($questions as $question){
        $correct_ans = $question->getElementsByTagName('correct_ans')->item(0)->nodeValue;
        $choosen = $question->getElementsByTagName('choosen')->item(0)->nodeValue;

        if($choosen == $correct_ans)   
            $num_correct++;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kết quả</title>
        <meta name="viewport" charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://code.jquery.com/ui/1.13.2/themes/black-tie/jquery-ui.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
        <?php include('./navbar/header.php'); ?>

        <div id="content">
            <img src="./asset/img/banner_finish.svg" alt="banner" class="background-image">
            <div class="about-section">
                <h1 class="about-heading py-1 my-1">Kết quả của bạn</h1>
                <h3 class="about-describe py-1 my-1">Bài kiểm tra - <?php echo $course; ?></h3>
                <p class="about-describe py-1 my-1">Số câu hỏi: <?php echo $num_ques; ?></p>
                <p class="about-describe py-1 my-1">Số câu trả lời đúng: <?php echo $num_correct; ?></p>
                <h4 class="about-describe py-1 my-1">Điểm Số</h4>
                <h4 class="about-describe py-1 my-1"><?php echo round($num_correct*10/$num_ques, 2); ?></h4>
                <div class="buttons">
                    <a href="./controller/create_queslist.php?name=<?php echo $course; ?>&cid=<?php echo $course_id; ?>&nq=<?php echo $num_ques; ?>" class="btn">Làm lại</a>
                </div>
                <div class="buttons">
                    <a href="index.php" class="btn">Về trang chủ</a>
                </div>
            </div>
        </div>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>