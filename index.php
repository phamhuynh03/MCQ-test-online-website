<!DOCTYPE html>
<html>
    <head>
        <title>Trang chủ</title>
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
        
        <?php if(isset($logined) && $logined != "Login"){?>
            <div id="content">
                <img src="./asset/img/banner_teacher.svg" alt="banner" class="background-image">
                <div class="about-section">
                    <h1 class="about-heading">Chào mừng đến với QuizBK!</h1>
                    <h6 class="about-describe">Tạo ra những khóa học của riêng bạn để mọi người có thể tham gia. Các khóa học sẽ giúp học sinh, sinh viên củng cố kiến thức và học hỏi nhiều thêm.</h6>
                    <div class="buttons">
                        <a href="./mycourse.php" class="btn">Khóa học của tôi</a>
                    </div>
                </div>
            </div>
        <?php }else{?>
            <div id="content">
                <img src="./asset/img/banner.svg" alt="banner" class="background-image">
                <div class="about-section">
                    <h1 class="about-heading">Chào mừng đến với QuizBK!</h1>
                    <h6 class="about-describe">Tham gia với chúng tôi để có thể làm các bài kiểm tra trắc nghiệm để củng cố kiến thức, cải thiện điểm số và đạt được mục tiêu mà bạn mong muốn.</h6>
                    <div class="buttons">
                        <a href="./course.php" class="btn">Làm kiểm tra ngay</a>
                    </div>
                </div>
            </div>
        <?php }?>

        <?php include('./navbar/footer.php'); ?>
    </body>
</html>