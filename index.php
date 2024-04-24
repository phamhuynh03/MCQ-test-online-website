<?php
$defaultFile = 'index.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = '';
}

switch ($page) {
    case 'index':
        $includeFile = 'index.php';
        break;
    case 'courses':
        $includeFile = 'courses.php';
        break;
    case 'login':
        $includeFile = 'login.php';
        break;
    case 'register':
        $includeFile = 'register.php';
        break;
    default:
        $includeFile = $defaultFile;
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title><?php echo ucfirst($page) ? ucwords(str_replace('_', ' ', $page)) : 'Home'; ?> | QuizBK</title>
</head>

<body>
    <!-- Header -->
    <div class="header">

        <div class="logo-container">
            <img src="asset/img/logo_light.png" alt="logo">
        </div>
        <ul class="navbar">
            <li><a href="index.php?page=home">Trang chủ</a></li>
            <li><a href="#">Các khóa học</a></li>
        </ul>
        <ul class="navbar login-register">
            <li><a href="#">Đăng nhập</a></li>
            <li><a href="#">Đăng ký</a></li>
        </ul>

    </div>

    <!--End Header -->
    <!-- Context -->
    <div class="img-container">
        <img src="asset/img/banner.png" alt="banner">
        <div class="description">
            <h2>Chào mừng đến với QuizBK!</h2>
            <p>Tham gia với chúng tôi để có thể làm các bài kiểm tra trắc nghiệm để củng cố kiến thức, cải thiện điểm số và đạt được mục tiêu bạn mong muốn.</p>
            <div class="buttons">
                <a href="index.php?page=login" class="btn">Đăng nhập</a>
                <a href="index.php?page=register" class="btn">Đăng ký</a>
            </div>
        </div>
    </div>


    <div class="separator"></div>
    <!-- End Context -->
    <footer>
        <div class="footer-container">
            <img src="asset/img/logo_dark.png" alt="logo" class="black-logo">
            <p>&copy; QuizBK, <?php echo date('Y'); ?>. All rights reserved.</p>
            <ul class="info">
                <li><a href="#">Về chúng tôi</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Báo cáo</a></li>
            </ul>
        </div>
    </footer>


</body>

</html>