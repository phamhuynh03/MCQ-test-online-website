<?php
    $course = $_GET['name'];
    $course_id = $_GET['cid'];
    $num_ques = $_GET['nq'];
    $question_id = $_GET['qid'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kiểm tra</title>
        <meta name="viewport" charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://code.jquery.com/ui/1.13.2/themes/black-tie/jquery-ui.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>

        <div class="container-fluid px-5 py-4">
            <h1 class="text-primary">Bài kiểm tra - <?php echo $course; ?></h1>
        </div>
        <div class="container-fluid p-5 bg-secondary bg-opacity-10 text-white">
            <div class="row">
                <div class="col-sm-3 p-3">
                    <h5 class="text-primary">Câu hỏi</h5>
                    <p class="text-dark">Bài kiểm tra có <?php echo $num_ques; ?> câu hỏi</p>
                    <div class="row row-cols-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
                        <?php
                            for($i = 1; $i <= $num_ques; $i++){?>
                                <div class="col">
                                    <a class="nav-link text-dark text-center bg-primary bg-opacity-25 p-1 my-1" href="./exam.php?name=<?php echo $course; ?>&cid=<?php echo $course_id; ?>&nq=<?php echo $num_ques; ?>&qid=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </div>
                            <?php }
                        ?>
                    </div>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-9 p-3" id="main-ques">
                    <script>
                        $(document).ready(function(){
                            $.ajax({
                                url: './controller/get_question.php?cid=<?php echo $course_id; ?>',
                                dataType: 'xml',
                                success: function(data){
                                    $(data).find('question').each(function(){
                                        var QID = $(this).find('QID').text();
                                        var topic = $(this).find('topic').text();
                                        var content = $(this).find('content').text();
                                        var img_link = $(this).find('img_link').text();
                                        var level = $(this).find('teacher').text();
                                        var A = $(this).find('A').text();
                                        var B = $(this).find('B').text();
                                        var C = $(this).find('C').text();
                                        var D = $(this).find('D').text();
                                        var correct_ans = $(this).find('correct_ans').text();
                                        if(QID == <?php echo $question_id; ?>){
                                            var questionHTML = '<h2 class="text-primary">Câu hỏi số ' + QID + '</h2>'
                                                            + '<p class="text-dark">' + content + '</p>';
                                            if(img_link != ''){
                                                questionHTML += '<div class="text-center">'
                                                                    + '<img src="' + img_link + '" alt="Câu hỏi số ' + QID + '" title="Câu hỏi số ' + QID + '" width="50%" height="50%">'
                                                                + '</div>';
                                            }
                                                questionHTML += '<h4 class="text-primary">Đáp án</h4>'
                                                            + '<ul class="nav nav-pills flex-column">'
                                                                + '<li class="nav-item">'
                                                                    + '<a class="nav-link text-dark bg-primary bg-opacity-10 my-2" href="#">A. ' + A + '</a>'
                                                                + '</li>'
                                                                + '<li class="nav-item">'
                                                                    + '<a class="nav-link text-dark bg-primary bg-opacity-10 my-2" href="#">B. ' + B + '</a>'
                                                                + '</li>'
                                                                + '<li class="nav-item">'
                                                                    + '<a class="nav-link text-dark bg-primary bg-opacity-10 my-2" href="#">C. ' + C + '</a>'
                                                                + '</li>'
                                                                + '<li class="nav-item">'
                                                                    + '<a class="nav-link text-dark bg-primary bg-opacity-10 my-2" href="#">D. ' + D + '</a>'
                                                                + '</li>'
                                                            + '</ul>';
                                            $('#main-ques').append(questionHTML);
                                        }
                                    });
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>
