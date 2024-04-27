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
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <title><?php echo ucfirst($page) ? ucwords(str_replace('_', ' ', $page)) : 'Home'; ?> | QuizBK</title>
</head>

<body>
    <div id="main">
        <!-- Begin Header -->
        <div id="header">
            <ul id="nav">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Các khóa học</a></li>
                <li><a href="#">Khóa học của tôi</a></li>
                <li><a href="#">Hồ sơ</a></li>
                <li><a href="#">Chào username</a></li>
                <li><a href="#">Đăng xuất</a></li>
            </ul>
            <div class="logo">
                <img src="../asset/img/logo_light.png" alt="logo" class="logo-quizbk">
            </div>
            <div id="mobile-menu" class="mobile-menu-btn">
                <i class="menu-icon ti-menu"></i>
            </div>
        </div>

        <!-- End Header -->

        <!-- Begin Content -->
        <div id="content">
            <img src="../asset/img/banner_teacher.png" alt="banner" class="background-image">
            <div class="about-section">
                <h2 class="about-heading">Chào mừng đến với QuizBK!</h2>
                <p class="about-describe">Tạo ra những khóa học của riêng bạn để mọi người có thể tham gia. Các khóa học sẽ giúp học sinh, sinh viên củng cố kiến thức và học hỏi nhiều thêm.</p>
                <div class="buttons">
                    <a href="#" class="btn">Tạo khóa học ngay</a>
                </div>
            </div>
        </div>

        <!-- End Content -->
        <!-- Begin Footer -->

        <div id="footer">
            <img src="../asset/img/logo_dark.png" alt="logo" class="black-logo">
            <p class="copyright">&copy; QuizBK, <?php echo date('Y'); ?>. All rights reserved.</p>
            <ul class="info">
                <li><a href="#">Về chúng tôi</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Báo cáo</a></li>
            </ul>
        </div>

        <!-- End Footer -->
    </div>

    <script>
        var header = document.getElementById('header');
        var mobileMenu = document.getElementById('mobile-menu');
        var currentHeight = header.clientHeight;

        mobileMenu.onclick = function() {
            var isClose = header.clientHeight === currentHeight;
            if (isClose) {
                // If menu is closed, open it
                header.style.height = 'auto';
            } else {
                // If menu is open, close it
                header.style.height = '46px';
            }
        }


        // var menuItems = document.querySelectorAll('#nav li a[href*="#"]')
        // for (var i = 0; i < menuItems.length; i++){
        //     var menuItem = menuItems[i];

        //     menuItem.onclick = function() {
        //         header.style.height = 'null';
        //     }
        // }
    </script>
</body>

</html>